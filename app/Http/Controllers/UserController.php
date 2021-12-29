<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'house_number' => 'required',
                'user_type' => 'required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('/user/create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = new User();
            $user->name = strtolower($request->name);
            $user->house_number = $request->house_number;
            $user->user_type = $request->user_type;
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect('/user')
                ->with('status', 'Morador cadastrado!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            Log::error($e->getLine());
            return redirect()->back()->with('error', 'Erro ao cadastrar usuário');
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'house_number' => 'required',
                'user_type' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('/user/edit/' . $user->id)
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = User::findOrFail($id);
            $user->name = strtolower($request->name);
            $user->house_number = $request->house_number;
            $user->user_type = $request->user_type;

            if ($request->password != null) {
                $user->password = bcrypt($request->password);
            }
            $user->save();

            return redirect('/user')
                ->with('status', 'Morador atualizado!');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            Log::error($e->getLine());
            return redirect()->back()->with('error', 'Erro ao cadastrar usuário');
        }
    }

    public function destroy(){
        
    }
}
