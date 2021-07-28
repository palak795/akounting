<?php

namespace App\Http\Controllers;

use App\Models\Billing;

use Mail;

use App\Notifications\SendEmailToOwner;

use App\Notifications\SendEmailToUser;

use Illuminate\Http\Request;

class BillingController extends Controller

{
    
        public function create()

        {

        return view('mail.create');

        }

        public function search(Request $request)

        {
            // dd($request->all());


            $search_keyword = '';

            if ($request->has('search'))

            {

                $cruds = Billing::
                    where('first_name','LIKE','%'.$request->search.'%')
                    ->orWhere('email','LIKE','%'.$request->search.'%')
                    ->orWhere('address','LIKE','%'.$request->search.'%')
                    ->orWhere('city','LIKE','%'.$request->search.'%')
                    ->orWhere('state','LIKE','%'.$request->search.'%')
                    ->orWhere('zip','LIKE','%'.$request->search.'%')
                    ->orWhere('cardname','LIKE','%'.$request->search.'%')
                    ->orWhere('cardnumber','LIKE','%'.$request->search.'%')
                    ->get();  
                    $search_keyword = $request->search; 

            }

            else

            {
                $cruds = Billing::all();            
            }

            return view('mail.search',compact('cruds','search_keyword'));     

        }    


        public function store(Request $request)

        {

        // dd($request->all());

        $this->validate($request,[

        'first_name' => 'required',
        'email'      => 'required',
        'address'    => 'required',
        'cardnumber' => 'required',

        ]);

        $crud = new Billing();

        $crud->first_name = $request->get('first_name');
        $crud->email = $request->get('email');
        $crud->address = $request->get('address');
        $crud->city = $request->get('city');
        $crud->state = $request->get('state');
        $crud->zip = $request->get('zip');
        $crud->cardname = $request->get('cardname');
        $crud->cardnumber = $request->get('cardnumber');
        $crud->save();



        // \Notification::route('mail', 'palaktalwar795@gmail.com')->notify(new SendEmailToOwner);
        
        // \Notification::route('mail',$request->get('email'))->notify(new SendEmailToUser);


    }


}



































// $data = $crud->toArray();

// Mail::send('mail.email', $data, function($message) use ($data)
            // {
            //      $message->to($data['email'], 'Tutorials Point')->subject
            //         ('Laravel Basic Testing Mail');
            // });


            // Mail::send('mail.email_owner', $data, function($message) use ($data) 
            // {

            //      $message->to('palaktalwar795@gmail.com', 'Tutorials Point')->subject
            //         ('Laravel Basic Testing Mail');
            // });