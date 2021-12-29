<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SuggestionController extends Controller
{
    public function index()
    {
        $suggestions = Suggestion::all();
        return view('suggestion.index', compact('suggestions'));
    }

    public function create()
    {
        return view('suggestion.create');
    }

    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'suggestion' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('/suggestion/create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $suggestion = new Suggestion();
            $suggestion->user_id = Auth::user()->id;
            $suggestion->suggestion = $request->suggestion;
            $suggestion->cellphone = json_encode($request->cellphone);
            $suggestion->save();

            return redirect('/suggestion')->with('status', 'Obrigado pela sugestão, juntos faremos um Condomínio melhor!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar sugestão');
        }
    }

    public function show()
    {
        return view('suggestion.index');
    }
}
