<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index' , [
            'contacts'  =>  Contact::latest()->get() ,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(Contact::rules());

        $contact = Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success' , " Thanks " .  $contact->name ." I will get back to you as soon as possible!  ");
    }


    public function show($id)
    {
        $contact = Contact::findOrfail($id);
        return view('admin.contact.show' , [
            'contact'   =>  $contact ,
        ]);
    }

    public function delete($id)
    {
        $contact = Contact::findOrfail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success' , " Message has Been Deleted ");

    }
}
