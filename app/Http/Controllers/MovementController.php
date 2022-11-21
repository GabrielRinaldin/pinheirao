<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class MovementController extends Controller
{
    public function index()
    {
        $credits = Movement::where('type_of_movement', 'credit')->orderBy('date', 'desc')->get();
        $debits = Movement::where('type_of_movement', 'debit')->orderBy('date', 'desc')->get();
        $movements = Movement::selectRaw("sum(value) as value ,type_of_movement, to_char(date, 'YYYY-MM') as date")
            ->orderBy('date', 'asc')
            ->groupBy(DB::raw("to_char(date, 'YYYY-MM'), type_of_movement"))
            ->get();
        return view('movement.index', compact('credits', 'debits', 'movements'));
    }

    public function create()
    {
        $houseNumbers = User::HOUSE_NUMBERS;
        return view('movement.create', compact('houseNumbers'));
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'type_of_movement' => 'required',
                'date' => 'required',
                'description' => 'required',
                'value' => 'required',
                'house_number' => Rule::requiredIf($request->type_of_movement == 'credit')
            ]);

            if ($validator->fails()) {
                return redirect('/movement/create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $movement = new Movement();
            $movement->user_id = Auth::user()->id;
            $movement->type_of_movement = $request->type_of_movement;
            $movement->value = str_replace(",", ".",$request->value);
            $movement->description = $request->description;
            $movement->date = $request->date;

            if ($request->has('house_number') && $request->house_number != null) {
                $movement->house_number = $request->house_number;
            }

            $movement->save();
            return redirect('/movement')->with('status', 'Movimentação adicionada!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            Log::error($e->getLine());
            return back()->with('error', 'Erro ao cadastrar movimentação');
        }
    }
}
