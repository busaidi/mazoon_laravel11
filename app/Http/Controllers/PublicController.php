<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function download()
    {
        return view('public.products.contact');
    }

    public function dashboard()
    {
        return view('public.products.contact');
    }
}
