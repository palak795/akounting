<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudenExport;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds=Student::count();
        return view('student.index',compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'studentname'=>'required',
            'fathername'=>'required',
            'mothername'=>'required',
            'email'=>'required',
            'date'=>'required',
            'education'=>'required',
            'country'=>'required',
            'image'=>'required|mimes:jpg,bmp,png',
            'address'=>'required',
         ]);
        $crud = new Student;
        $crud->studentname=$request->get('studentname');
        $crud->fathername=$request->get('fathername');
        $crud->mothername=$request->get('mothername');
        $crud->email=$request->get('email');
        $crud->date=$request->get('date');
        $crud->education=implode(',',$request->education);
        $crud->country=$request->get('country');
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $image=time().'.'.$file->getClientOriginalExtension();
            $file->move('image',$image);
        }
        $crud->image=$image;
        $crud->address=$request->get('address');
        $crud->save();
      
        return redirect()->route('student.index')->with('success','data inserted successfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crud=Student::onlyTrashed()->count();
        return view('student.restore',compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crud=Student::find(decrypt($id));
        return view('student.update',compact('crud'));
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
        $this->validate($request,[
            'studentname'=>'required',
            'fathername'=>'required',
            'mothername'=>'required',
            'email'=>'required',
            'date'=>'required',
            'education'=>'required',
            'country'=>'required',
            'image'=>'mimes:jpg,bmp,png',
            'address'=>'required',
         ]);
        $crud=Student::findOrFail($id);

        $crud->studentname=$request->get('studentname');
        $crud->fathername=$request->get('fathername');
        $crud->mothername=$request->get('mothername');
        $crud->email=$request->get('email');
        $crud->date=$request->get('date');
        $crud->education=implode(',',$request->education);
        $crud->country=$request->get('country');
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $image=time().'.'.$file->getClientOriginalExtension();
            $file->move('image',$image);
        }
        else
        {
           $image=$crud->image; 
        }
        $crud->image=$image;
        $crud->address=$request->get('address');
        $crud->save();
        return redirect()->route('student.index')->with('success','data updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud=Student::find(decrypt($id));
        $crud->delete();
        return redirect()->route('student.index')->with('success','data deleted successfully');
    }
    /**
     * Pagination of index page
     */
    
    public function getPageResult(Request $request)
    {
        $totalData = 0;
        $columns = array(
            1 => 'studentname',
            2 => 'fathername',
            3 => 'mothername',
            4 => 'email',
            5 =>'date',
            6 => 'education',
            7 =>'country',
            8 => 'image',
            9 => 'address',
           10 => 'action',
        );
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start ? $start / $limit : 0;
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $students = Student::orderBy('created_at', 'desc');
        $totalData = $students->count();

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $cruds = $students->where('fathername', 'LIKE', "%{$search}%")
                ->orWhere('mothername', 'LIKE', "%{$search}%")
                ->orWhere('education', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%");
        }
        $students = $students->paginate($limit, ['*'], 'page', $start + 1);
        $totalFiltered = $students->total();
        $data = array();
        if (!empty($students)) {
            foreach ($students as $key => $crud) {
                $nestedData['#']='<input type="checkbox" name="bulk_delete[]" class="checkboxes" value="'.$crud->id.'"/>';
                $nestedData['studentname'] = $crud->studentname;
                $nestedData['fathername'] = $crud->fathername;
                $nestedData['mothername'] = $crud->mothername;
                $nestedData['email'] = $crud->email;
                $nestedData['date'] = $crud->date;
                $nestedData['education'] = $crud->education;
                $nestedData['country'] = $crud->country;
                $nestedData['image'] = "<img src='" . asset('image/' . $crud->image) . "' style='width:100px'>";
                $nestedData['address'] = $crud->address;
                $edit = route('student.edit', encrypt($crud->id));
                $delete = route('student.destroy', encrypt($crud->id));
                $exist = $crud;
                $nestedData['action'] = view('student.partials.settings-action', compact('edit', 'delete', 'exist'))->render();
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
    /**
     * Pagination of restore page
     */
    public function getRestoreResult(Request $request)
    {
        $totalData = 0;
        $columns = array(
            1 => 'studentname',
            2 => 'fathername',
            3 => 'mothername',
            4 =>'email',
            5 =>'date',
            6 => 'education',
            7 =>'country',
            8 => 'image',
            9 => 'address',
            10=> 'action',
        );
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start ? $start / $limit : 0;
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $students = Student::onlyTrashed()->orderBy('created_at', 'desc');
        $totalData = $students->count();

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $cruds = $students->where('fathername', 'LIKE', "%{$search}%")
                ->orWhere('mothername', 'LIKE', "%{$search}%")
                ->orWhere('education', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%");
        }
        $students = $students->paginate($limit, ['*'], 'page', $start + 1);
        $totalFiltered = $students->total();
        $data = array();
        if (!empty($students)) {
            foreach ($students as $key => $crud) {
                $nestedData['#']='<input type="checkbox" name="bulk_restore[]" class="checkboxes" value="'.$crud->id.'"/>';
                $nestedData['studentname'] = $crud->studentname;
                $nestedData['fathername'] = $crud->fathername;
                $nestedData['mothername'] = $crud->mothername;
                $nestedData['email'] = $crud->email;
                $nestedData['date'] = $crud->date;
                $nestedData['education'] = $crud->education;
                $nestedData['country'] = $crud->country;
                $nestedData['image'] = "<img src='" . asset('image/' . $crud->image) . "' style='width:100px'>";
                $nestedData['address'] = $crud->address;
                $restore = route('student.restore', encrypt($crud->id));
                $exist = $crud;
                $nestedData['action'] = view('student.partials.restore-settings-action', compact('restore', 'exist'))->render();
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
    
    /**
     * Restore Data from the storage
     */
    public function restore($id)
    {
        Student::withTrashed()->find(decrypt($id))->restore();
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
            Student::withTrashed()->whereIn('id',$id)->restore();
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
        Student::withTrashed()->whereIn('id',$id)->delete();
        return back()->with('success', 'data deleted  sucessfully');
    }
        else{
            return back()->with('error', __('Please select value to delete.'));
        }

    }
    public function importExportView()
    {
       return view('student.importexport');
    }
    public function import() 
    {
        Excel::import(new StudentImport,request()->file('file'));
           
        return back();
    }
    public function export() 
    {
        return Excel::download(new StudenExport, 'bulkData.xlsx');
    }
}
