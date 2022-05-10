<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendContact;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        $adquirentes = Contact::ADQUIRENTE;
        $archives = Contact::ARCHIVES;
        return view('contact.index', compact('adquirentes', 'archives'));
    }

    public function sendContact(Request $request)
    {
        try {

            // $validated = $request->validate([
            //     'name' => 'required|max:255',
            //     'email' => 'required',
            //     'phone' => 'required',
            //     'cnpj' => 'required',
            //     // 'file' => 'required|mimes:docx,doc,pdf|max:5000',

            // ]);

            $files = [];

            $images = $request->file('file');

            if ($images != null) {
                foreach ($images as $key => $image) {
                    if ($request->hasFile('file') && $request->file('file')[$key]->isValid()) {
                        $path = $request->file[$key]->store('public/img');
                        $files[] = url(Storage::url($path));
                    }
                }
            }

            $data = $request->all();
            // Mail::to('jrinaldin@gmail.com')->queue(new SendContact($request->all()));
            // Mail::to('gabrielrinaldin@hotmail.com')->queue(new SendContact($data));
            Log::info('enviando email');
            return back()->with('success', 'Contato enviado!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            Log::error($e->getLine());
            Log::error('falha no email');
        
        }
    }
}
