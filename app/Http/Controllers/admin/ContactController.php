<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::all(); // Get all messages from contacts table
        return view('admin.contact.index', compact('messages')); // Pass messages to the view
    }
}
