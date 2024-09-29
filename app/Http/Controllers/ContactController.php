<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ContactUs;
use App\Models\AdminInfo;
use App\Models\Contact;
use App\Notifications\SendContactForm;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function submit(Request $request)
    {
        // Validate the form input
       $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|max:255',
            'message' => 'required|string|max:500',
        ]);
       $contact=new Contact();
       $contact->name = $request->name;
       $contact->email = $request->email;
       $contact->subject = $request->subject;
       $contact->desc = $request->message;
       $contact->created_at = now();
       $contact->save();


        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function contact_inquiries(Request $request)
    {
        // Initialize the query builder
        $query = Contact::query();
        $word='';

// Add conditions based on search inputs
        if ($request->ser_by_name) {
            $query->where('name', 'LIKE', '%' . $request->ser_by_name . '%');
            $word = $request->ser_by_name;
        }

        if ($request->ser_by_email) {
            $query->where('email', 'LIKE', '%' . $request->ser_by_email . '%');
            $word = $request->ser_by_email;
        }

// Order the results by 'id' in descending order and paginate
        $contact_inquiries = $query->orderBy('id', 'DESC')->paginate(10);
        return view('admin.contact_inquiries',compact('contact_inquiries','word'));
    }

    public function delete_contact_inquirie($id)
    {
        Contact::FindOrFail($id)->delete();
        return redirect()->back()->with('success', 'Inquirie has been Deleted successfully!');
    }

}
