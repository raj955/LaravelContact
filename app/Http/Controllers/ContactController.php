<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::paginate(20); // Fetch 20 records per page
        return view('contacts.index', compact('contacts'));
    }

    public function create() {
        return view('contacts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required|digits_between:10,15' // Phone number must be between 10 to 15 digits
        ]);
    
        Contact::create($request->all());
    
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }
    
    public function edit(Contact $contact) {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact) {
        $request->validate([
            'name' => 'required',
            'lastName' => 'required',
            'phone' => 'required'
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact) {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

    
}
