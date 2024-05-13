<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublicController extends Controller
{
    public function index()
    {
       // $seoInfo = $this->getSEOInfo('home');
//        return view('public.index'/*,$seoInfo*/);
        return view('public.home');
    }

    public function about()
    {
        /*$seoInfo = $this->getSEOInfo('about');*/
        return view('public.about');
    }
    public function downloads()
    {
        /*$seoInfo = $this->getSEOInfo('about');*/
        return view('public.downloads');
    }


    public function mazoon45()
    {
        /*$seoInfo = $this->getSEOInfo('mazoon45');*/
        return view('public.products.mazoon45');
    }



    public function contact()
    {
       /* $seoInfo = $this->getSEOInfo('contact');*/
        return view('public.contact'/*,$seoInfo*/);
    }


    //save a contact message to db
    public function contact_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:50',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contact = Contact::create($validator->validated());

        return redirect()->back()->with('success', 'Contact message saved successfully.');
    }

    public function download()
    {
        return view('public.products.contact');
    }

    public function dashboard()
    {
        return view('public.products.contact');
    }
}
