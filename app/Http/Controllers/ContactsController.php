<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactsQuery;

class ContactsController extends Controller
{
    public function __invoke(Request $request)
    {
       $input = $this->validate($request, [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'description' => ['required']
        ]);

        ContactsQuery::create($input);
        //TODO send a mail to the user regarding his interest and tell them that we will get back to them soon
        session()->flash('flash-success', 'Thank you for sending.');
        return back(); 
    }
}
