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


    public function store(Request $request, $id)
    {
        $parent = User::find($id);
        $user = new User();
        $user->name = $request->name;
        $user->parent_id = $parent->id;
        $user->house_number = $parent->house_number;
        $user->user_type  ="morador";
        $user->password  = bcrypt("123456789");
        $user->save();

        return back();
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
                ->first();
            $history->update([
                'date_out' => now(),
            ]);    
            return response()->json(['status' => 'Success', "history" => $history->date_out->format("d/m/Y H:i:s")]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            return response()->json(['status' => 'Error']);
        }
    }


    public function destroy($id){
        try{
            User::find($id)->delete();
            return redirect('/user')
            ->with('status', 'Morador Excluído!');
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            Log::error($e->getLine());
            return redirect()->back()->with('error', 'Erro ao excluír usuário');
        }
        
        
    }
}
