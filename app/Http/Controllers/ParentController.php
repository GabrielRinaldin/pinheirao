<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\UserHistory;

class ParentController extends Controller
{

    public function index($id)
    {
        $user = User::findOrFail($id);
        $childrens = User::where('parent_id', $id)->get();

        return view('user.parents.index', compact('user', 'childrens'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function updateDateIn($id)
    {
        try {
            $history = UserHistory::create([
                'date_in' => now(),
                'user_id' => $id
            ]);
            return response()->json(['status' => 'Success', "history" => $history->date_in->format("d/m/Y H:i:s")]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            return response()->json(['status' => 'Error']);
        }
    }
    public function updateDateOut($id)
    {
        try {
            $history = UserHistory::where('user_id', $id)
                ->orderBy('id', 'desc')
                ->first()
                ->update([
                    'date_out' => now(),
                ]);
            return response()->json(['status' => 'Success', "history" => $history->date_out->format("d/m/Y H:i:s")]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            return response()->json(['status' => 'Error']);
        }
    }


    public function destroy($id)
    {
        //
    }
}
