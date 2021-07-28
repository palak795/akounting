<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds=Account::all();
        return view('akounting.index',compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akounting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
        $crud=new Account;
        $crud->name=$request->get('name');
        $crud->tax=$request->get('tax');
        $crud->description=$request->get('description');
        $crud->sale_price=$request->get('sale_price');
        $crud->purchase_price=$request->get('purchase_price');
        $crud->category=$request->get('category');
        $filename = '';
        if($request->hasFile('picture'))
        {
            $picture=$request->file('picture');
            $filename=time().'.'.$picture->getClientOriginalExtension();
            $picture->move('picture',$filename);
        }
        $crud->picture=$filename;
        $crud->enabled=$request->has('enabled')?1:0;
        $crud->save();
        return redirect()->route('account.index')->with('success','data inserted successfully');

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
        $crud=Account::find(decrypt($id));
        return view('akounting.edit',compact('crud')); 
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
        $crud=Account::findorfail($id);
        $crud->name=$request->get('name');
        $crud->tax=$request->get('tax');
        $crud->description=$request->get('description');
        $crud->sale_price=$request->get('sale_price');
        $crud->purchase_price=$request->get('purchase_price');
        $crud->category=$request->get('category');
        $filename = '';
        if($request->hasFile('picture'))
        {
            $picture=$request->file('picture');
            $filename=time().'.'.$picture->getClientOriginalExtension();
            $picture->move('picture',$filename);
        }
        else
        {
        $filename=$crud->picture; 
        }
        $crud->picture=$filename;
        
        $crud->enabled=$request->has('enabled')?1:0;
        $crud->save();
        return redirect()->route('account.index')->with('success','data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud=Account::find(decrypt($id));
        $crud->delete();
        return redirect()->route('account.index')->with('success','data deleted successfully');

    }
     public function getPageResult(Request $request)
    {
        $totalData = 0;
        
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'tax',
            3 => 'description',
            4 => 'sale_price',
            5 =>'purchase_price',
            6 => 'category',
            7 =>'picture',
            8 => 'enabled',
            9 =>'action',
        );
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start ? $start / $limit : 0;
        $order = $columns[$request->input('order.0.column')];
        $dir =   $request->input('order.0.dir');
        $students = Account::orderBy('id', 'Asc');
        $totalData = $students->count();

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $cruds = $students->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('sale_price', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        }
        $students = $students->paginate($limit, ['*'], 'page', $start + 1);
        $totalFiltered = $students->total();
        $data = array();
        if (!empty($students)) {
            foreach ($students as $key => $crud) {
                // $nestedData['#']='<input type="checkbox" name="bulk_delete[]" class="checkboxes" value="'.$crud->id.'"/>';
                $nestedData['id'] = $crud->id;
                $nestedData['name'] = $crud->name;
                $nestedData['tax'] = $crud->tax;
                $nestedData['description'] = $crud->description;
                $nestedData['sale_price'] = $crud->sale_price;
                $nestedData['purchase_price'] = $crud->purchase_price;
                $nestedData['category'] = $crud->category;
                $nestedData['picture'] =  "<img src='" . asset('picture/' . $crud->picture) . "' style='width:100px'>";
                $nestedData['enabled'] = $crud->enabled;
                $edit = route('account.edit', encrypt($crud->id));
                 $delete = route('account.destroy', encrypt($crud->id));
                 $exist = $crud;
                 $nestedData['action'] = view('akounting.setting-action', compact('edit', 'delete', 'exist'))->render();
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        return json_encode($json_data);
    }
}
