<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ImportContactController extends Controller
{
   
    public function showImportForm() {
        return view('contacts.import');
    }
    
    public function import(Request $request) {
        $request->validate([
            'xml_file' => 'required|file|mimes:xml'
        ]);
    
        $xmlFile = $request->file('xml_file');
        $xmlData = simplexml_load_file($xmlFile);
    
        foreach ($xmlData->contact as $contact) {
            Contact::create([
                'name' => (string) $contact->name,
                'lastName' => (string) $contact->lastName,
                'phone' => (string) $contact->phone
            ]);
        }
    
        return redirect()->route('contacts.index')->with('success', 'Contacts imported successfully.');
    }
    
}
