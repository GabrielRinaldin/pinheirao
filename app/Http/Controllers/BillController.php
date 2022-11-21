<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bill;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Pdf;

class BillController extends Controller
{
    public function index()
    {
        return view('bill.index');
    }

    public function create($id)
    {
        $user = User::find($id);
        return view('bill.create', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'amount' => 'required',
                'due_at' => 'required',
                'description' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('/bill/create/' . $request->user_id)
                    ->withErrors($validator)
                    ->withInput();
            }
            $bill = new Bill();
            $bill->user_id = $request->user_id;
            $bill->amount = $request->amount;
            $bill->due_at = $request->due_at;
            $bill->description = $request->description;
            $bill->status = "pending";
            $bill->save();

            $user = User::find($request->user_id);

            $billPdf = $this->createBillPdf($bill, $user);

            Mail::to('gabrielrinaldin@hotmail.com')->queue(new \App\Mail\BillCreated($billPdf, $bill, $user));

            return redirect('/user')->with('status', 'Fatura Gerada com Sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao gerar fatura');
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            Log::error($e->getLine());
            return redirect()->back()->with('error', 'Erro ao cadastrar fatura');
        }
    }

    public function createBillPdf($bill, $user)
    {
        try {

            $file = storage_path() . "/app/public/bills/bill_" . $bill->id . $user->name . ".pdf";
            $pdf = PDF::loadView('pdf.bill', compact('bill',  'user'))
                ->setPaper('a4')
                ->setOptions([
                    'dpi' => 150,
                    'defaultPaperSize' => 'a4',
                    'isHtml5ParserEnabled' => true,
                ])->save($file);

            return $file;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            Log::error($e->getLine());
        }
    }

    public function update($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->update(['status' => "paid", 'paid_at' => now()]);

        $movement = new \App\Models\Movement();
        $movement->user_id = $bill->user_id;
        $movement->type_of_movement = "credit";
        $movement->value = str_replace(",", ".", $bill->amount);
        $movement->description = "Pagamento casa número " . $bill->user->house_number;
        $movement->date = $bill->paid_at;
        $movement->house_number = $bill->user->house_number;
        $movement->save();

        return view('bill.update', compact('bill'));
    }
}
