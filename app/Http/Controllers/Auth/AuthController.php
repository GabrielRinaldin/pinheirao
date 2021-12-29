<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        try{
            $request->validate([
                'name_house_number' => 'required',
                'password' => 'required|string|min:6'
            ]);
    
            $attrName = [
                'name' => $request->name_house_number,
                'password' => $request->password
            ];
            $attrNumber = [
                'house_number' => $request->name_house_number,
                'password' => $request->password
            ];
    
            if (!Auth::attempt($attrName) && !Auth::attempt($attrNumber)) {
                return redirect()->back()->with('error', 'Credencial inválida');
            }
    
            $request->session()->regenerate();
            return redirect()->back();
        }
      catch(\Exception $e){
        Log::error($e->getMessage());
        Log::error($e->getTraceAsString());
        Log::error($e->getLine());
        return redirect()->back()->with('error', 'Erro ao logar');
      }
    }
}
