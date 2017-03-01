<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index', [
            'pageTitle' => 'Liên hệ'
        ]);
    }

    public function store(Request $request)
    {
        Mail::to(config('app.email'))->send(new ContactMail($request->all()));
        return redirect('/contact');
    }
}
