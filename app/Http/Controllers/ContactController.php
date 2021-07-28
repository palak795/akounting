<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Models\ContactModel;

class ContactController extends Controller

{
    public function create()

    {
 
      return view('create'); 

    }


    public function store(Request $request)

    {
        // dd($request->all());
        
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'phone'=>'max:10|required',
        ]);

            $crud = new ContactModel();
            $crud->fname = $request->get('fname');
            $crud->lname=$request->get('lname');    
            $crud->email=$request->get('email');    
            $crud->phone=$request->get('phone');    
            $crud->message=$request->get('message'); 
            $crud->save();
                
            $data = $crud->toArray();

            Mail::send('email', $data, function($message) use ($data)
                
             {
                 $message->to($data['email'], 'Tutorials Point')->subject
                    ('Laravel Basic Testing Mail');
            });


            Mail::send('email_owner', $data, function($message) use ($data) {

                 $message->to('palaktalwar795@gmail.com', 'Tutorials Point')->subject
                    ('Laravel Basic Testing Mail');
            });


            return redirect()->back()->with(['message'=>'The success message!']);

    }

}

















