<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Automobile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class AutomobileController extends Controller
{
    public function index()
    {
        return view('bill.index');
    }

    public function create($id)
    {
        $user = User::find($id);
        return view('automobile.create', compact('user'));
    }

    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'identifier' => 'required',
                'year' => 'required',
                'type' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('/user/automobile/' . $request->user_id)
                    ->withErrors($validator)
                    ->withInput();
            }

            Automobile::create($request->all());

            return back()->with('status', 'Veículo Registrado!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            Log::error($e->getLine());
            return redirect()->back()->with('error', 'Erro ao adicionar veículo');
        }
    }
}
