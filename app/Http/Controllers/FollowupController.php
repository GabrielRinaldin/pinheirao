<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Suggestion;
use App\Models\Movement;
use App\Models\Critics;
use Illuminate\Support\Facades\Auth;

class FollowupController extends Controller
{
    public function index()
    {
        $suggestions = Suggestion::where('user_id', Auth::user()->id)->get();
        $critics = Critics::where('user_id', Auth::user()->id)->get();
        $movements = Movement::where('house_number', Auth::user()->house_number)
            ->where('type_of_movement', 'credit')
            ->orderBy('date', 'asc')->get();
        return view('followup.index', compact('suggestions', 'movements', 'critics'));
    }
}
