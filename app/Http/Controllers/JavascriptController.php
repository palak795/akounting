<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Billing;

class JavascriptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajax.search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showView()
    
    {
        return view('ajax.search');
    }

    public function search(Request $request)
       
        {
            // return $request->all();

            if ($request->search_keyword == null) {

                $cruds = Billing::all();

            }else{
                
                $cruds = Billing::
                 where('first_name','LIKE','%'.$request->search_keyword.'%')
                ->orWhere('email','LIKE','%'.$request->search_keyword.'%')
                ->orWhere('address','LIKE','%'.$request->search_keyword.'%')
                ->orWhere('city','LIKE','%'.$request->search_keyword.'%')
                ->orWhere('state','LIKE','%'.$request->search_keyword.'%')
                ->orWhere('zip','LIKE','%'.$request->search_keyword.'%')
                ->orWhere('cardname','LIKE','%'.$request->search_keyword.'%')
                ->orWhere('cardnumber','LIKE','%'.$request->search_keyword.'%')
                ->get();  
            }

            return $cruds;
                 

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

        return response()->json(['success'=>'Search is successfully submitted!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
