<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Imports\ComputerImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ComputerExport;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Computer::count();
        return view('computers.index',compact('computers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep1()
    {
        return view('computers.step1');
    }
    public function createStep2()
    {
        return view('computers.step2');
    }
    public function createStep3()
    {
        return view('computers.step3');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStep1(Request $request)
    {
        $this->validate($request,[
            'model'=>'required',
            'brand'=>'required',
            'date_of_manufacture'=>'required',
            'ram'=>'required',
        ]);
        $crud = new computer;
        $crud->model=$request->get('model');
        $crud->brand=$request->get('brand');
        $crud->date_of_manufacture=$request->get('date_of_manufacture');
        $crud->ram=$request->get('ram');
        $crud->save();

        $request->session()->put('crud_id', $crud->id);
        return redirect()->route('create.step2');
    }

    public function storeStep2(Request $request)
    {
        $this->validate($request,[
            'processor'=>'required',
            'display'=>'required',
            'accessories'=>'required',
            'warranty'=>'required',
        ]);

        if(!empty($request->session()->get('crud_id'))){
            $crud = computer::find($request->session()->get('crud_id'));
            $crud->processor=$request->get('processor');
            $crud->display=$request->get('display');
            $crud->accessories=implode(',',$request->accessories);
            $crud->warranty=$request->get('warranty');
            $crud->save();
            $request->session()->put('crud_id', $crud->id);
        }
    
            
        return redirect()->route('create.step3');

    }
    public function storeStep3(Request $request)
    {
        $this->validate($request,[
            'description'=>'required',
            'storage'=>'required',
            'battery_capacity'=>'required',
        ]);
        if(!empty($request->session()->get('crud_id'))){
            $crud = computer::find($request->session()->get('crud_id'));
            $crud->description=$request->get('description');
            $crud->storage=$request->get('storage');
            $crud->battery_capacity=$request->get('battery_capacity');
            $crud->save();
        }

        return redirect()->route('computers.index');        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cruds=Computer::onlyTrashed()->count();
        return view('computers.restore',compact('cruds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $crud=Computer::find(decrypt($id));
        return view('computers.edit',compact('crud'));
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
        $crud=Computer::find($id);
        $crud->model=$request->get('model');
        $crud->brand=$request->get('brand');
        $crud->date_of_manufacture=$request->get('date_of_manufacture');
        $crud->ram=$request->get('ram');
        $crud->processor=$request->get('processor');
        $crud->display=$request->get('display');
        $crud->accessories=implode(',',$request->accessories);
        $crud->warranty=$request->get('warranty');
        $crud->description=$request->get('description');
        $crud->storage=$request->get('storage');
        $crud->battery_capacity=$request->get('battery_capacity');
        $crud->save();
        return redirect()->route('computers.index')->with('success','data updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud=Computer::find(decrypt($id));
        $crud->delete();
        return redirect()->route('computers.index')->with('success','data deleted successfully');
    }

    public function getPageResult(Request $request)
    {
        $totalData = 0;
        
        $columns = array(
            1 => 'model',
            2 => 'brand',
            3 => 'date_of_manufacture',
            4 => 'ram',
            5 =>'processor',
            6 => 'display',
            7 =>'accessories',
            8 => 'warranty',
            9 => 'description',
            10 => 'storage',
            11 =>'battery_capacity',
            12 =>'action',
        );
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start ? $start / $limit : 0;
        $order = $columns[$request->input('order.0.column')];
        $dir =   $request->input('order.0.dir');
        $students = Computer::orderBy('created_at', 'desc');
        $totalData = $students->count();

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $cruds = $students->where('ram', 'LIKE', "%{$search}%")
                ->orWhere('model', 'LIKE', "%{$search}%")
                ->orWhere('brand', 'LIKE', "%{$search}%")
                ->orWhere('warranty', 'LIKE', "%{$search}%");
        }
        $students = $students->paginate($limit, ['*'], 'page', $start + 1);
        $totalFiltered = $students->total();
        $data = array();
        if (!empty($students)) {
            foreach ($students as $key => $crud) {
             $nestedData['#']='<input type="checkbox" name="bulk_delete[]" class="checkboxes" value="'.$crud->id.'"/>';
                $nestedData['model'] = $crud->model;
                $nestedData['brand'] = $crud->brand;
                $nestedData['date_of_manufacture'] = $crud->date_of_manufacture;
                $nestedData['ram'] = $crud->ram;
                $nestedData['processor'] = $crud->processor;
                $nestedData['display'] = $crud->display;
                $nestedData['accessories'] = $crud->accessories;             
                $nestedData['warranty'] = $crud->warranty;
                $nestedData['description'] = $crud->description;
                $nestedData['storage'] = $crud->storage;
                $nestedData['battery_capacity'] = $crud->battery_capacity;
                $edit = route('computers.edit', encrypt($crud->id));
                $delete = route('computers.destroy', encrypt($crud->id));
                $exist = $crud;
                $nestedData['action'] = view('computers.setting-action', compact('edit', 'delete', 'exist'))->render();
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
      public function getRestoreResult(Request $request)
    {
        $totalData = 0;
        $columns = array(
            1 => 'model',
            2 => 'brand',
            3 => 'date_of_manufacture',
            4 => 'ram',
            5 =>'processor',
            6 => 'display',
            7 =>'accessories',
            8 => 'warranty',
            9 => 'description',
            10 => 'storage',
            11 =>'battery_capacity',
            12 =>'action',
        );
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start ? $start / $limit : 0;
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $students = Computer::onlyTrashed()->orderBy('created_at', 'desc');
        $totalData = $students->count();
          
          if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $cruds = $students->where('ram', 'LIKE', "%{$search}%")
                ->orWhere('model', 'LIKE', "%{$search}%")
                ->orWhere('brand', 'LIKE', "%{$search}%")
                ->orWhere('warranty', 'LIKE', "%{$search}%");
        }

        $students = $students->paginate($limit, ['*'], 'page', $start + 1);
        $totalFiltered = $students->total();
        $data = array();
        if (!empty($students)) {
            foreach ($students as $key => $crud) {
                $nestedData['#']='<input type="checkbox" name="bulk_restore[]" class="checkboxes" value="'.$crud->id.'"/>';
                $nestedData['model'] = $crud->model;
                $nestedData['brand'] = $crud->brand;
                $nestedData['date_of_manufacture'] = $crud->date_of_manufacture;
                $nestedData['ram'] = $crud->ram;
                $nestedData['processor'] = $crud->processor;
                $nestedData['display'] = $crud->display;
                $nestedData['accessories'] = $crud->accessories;             
                $nestedData['warranty'] = $crud->warranty;
                $nestedData['description'] = $crud->description;
                $nestedData['storage'] = $crud->storage;
                $nestedData['battery_capacity'] = $crud->battery_capacity;
                $exist = $crud;

                $restore = route('computers.restore', encrypt($crud->id));
                $nestedData['action'] = view('computers.restore-action', compact('restore','exist'))->render();
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


    public function restore($id)
    {
        Computer::withTrashed()->find(decrypt($id))->restore();
        return back()->with('success', 'data restored sucessfully');
    }
    /**
     * Multi-Restore Data from the storage
     */
    public function multiRestore(Request $request)
    {
        $id=$request->bulk_restore;
        
        if (!empty($id) && count($id) > 0) 
        {
            Computer::withTrashed()->whereIn('id',$id)->restore();
            return back()->with('success', 'data restored sucessfully');
        }
        else
        {
            return back()->with('error', __('Please select value to restore.'));

        }
    }
    /**
     * multi-delete Data from the storage
     */
    public function multiDelete(Request $request)
    {
        $id=$request->bulk_delete;
        if (!empty($id) && count($id) > 0) 
    {
        Computer::withTrashed()->whereIn('id',$id)->delete();
        return back()->with('success', 'data deleted  sucessfully');
    }
        else{
            return back()->with('error', __('Please select value to delete.'));
        }

    }
    public function importExportView()
    {
       return view('computers.import-export');
    }
    public function import() 
    {
        Excel::import(new ComputerImport,request()->file('file'));
           
        return back();
    }
    public function export() 
    {
        return Excel::download(new ComputerExport, 'bulkData.xlsx');
    }
}
