<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Contact;
use App\Model\communicate;

class ContactController extends Controller
{
    public function view(){
        $contacts = Contact::all();
        $contactCount = Contact::count();
        return view('backend.contact.view-contact', ['contacts'=> $contacts, 'contactCount'=>$contactCount]);
    }

    public function add(){
        return view('backend.contact.add-contact');
    }

    public function store(Request $request){
        $contact = new contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->fb_link = $request->fb_link;
        $contact->yt_link = $request->yt_link;
        $contact->address = $request->address;
        $contact->created_by = Auth::user()->id;
        $contact->save();
        return redirect()->route('contacts.view')->with('success', 'contact Saved Successfully');
    }

    public function edit($id){
        $contact = Contact::find($id);
        return view('backend.contact.edit-contact', ['contact'=>$contact]);
    }

    public function update($id, Request $request){
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->fb_link = $request->fb_link;
        $contact->yt_link = $request->yt_link;
        $contact->address = $request->address;
        $contact->updated_by = Auth::user()->id;
        $contact->save();
        return redirect()->route('contacts.view')->with('success', 'contact Updated Successfully');
    }

    public function delete($id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contacts.view')->with('success', 'contact Deleted Successfully');
    }

    public function communicateView(){
        $communicates = communicate::orderBy('id', 'desc')->get();
        return view('backend.contact.communicate-view', ['communicates'=>$communicates]);
    }

    public function communicateDelete(Request $request){
        $communicate = Communicate::find($request->id);
        $communicate->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully!');
    }
}
