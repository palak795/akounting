<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $crud=new Post;
        $crud->title=$request->get('title');
        $crud->description=$request->get('description');
        $filename = '';
        if($request->hasFile('picture'))
        {
	            $picture=$request->file('picture');
	            $filename=time().'.'.$picture->getClientOriginalExtension();
	            $picture->move('picture',$filename);
        }
        $crud->picture=$filename;
        $crud->states=implode(',',$request->states);
        $crud->save();
        return redirect()->route('post.index')->with('success','data inserted successfully');

    }


    public function storeComment(Request $request)
    { 

        $cruds=new Comment;
        $cruds->enter_text=$request->get('enter_text');
        $cruds->post_id=$request->get('post_id');
        $cruds->save();
        return redirect()->route('post.index')->with('success','data inserted successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crud=Post::find(decrypt($id));
        return view('post.show',compact('crud')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crud=Post::find(decrypt($id));
        return view('post.edit',compact('crud')); 
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
        $crud=Post::findorfail($id);
        $crud->title=$request->get('title');
        $crud->description=$request->get('description');
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
        
        $crud->states=implode(',',$request->states);
        $crud->save();
        return redirect()->route('post.index')->with('success','data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $crud=Post::find(decrypt($id));
        $crud->delete();
        return redirect()->route('post.index')->with('error','data deleted successfully');
    }
    
     public function getPageResult(Request $request)
    {
        $totalData = 0;
        
        $columns = array(
            0 => 'id',
            1 => 'title',
            2 => 'description',
            3 => 'picture',
            4 => 'states',
            5 => 'action',
        );
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start ? $start / $limit : 0;
        $order = $columns[$request->input('order.0.column')];
        $dir =   $request->input('order.0.dir');
        $students = Post::orderBy('id', 'Asc');
        $totalData = $students->count();

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $cruds = $students->where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        }
        $students = $students->paginate($limit, ['*'], 'page', $start + 1);
        $totalFiltered = $students->total();
        $data = array();
        if (!empty($students)) {
            foreach ($students as $key => $crud) {
                // $nestedData['#']='<input type="checkbox" name="bulk_delete[]" class="checkboxes" value="'.$crud->id.'"/>';
                $nestedData['id'] = $crud->id;
                $nestedData['title'] = $crud->title;
                $nestedData['description'] = $crud->description;
                $nestedData['picture'] =  "<img src='" . asset('picture/' . $crud->picture) . "' style='width:100px'>";
                $nestedData['states'] = $crud->states;
                $nestedData['enabled'] = $crud->enabled;
                $show = route('post.show', encrypt($crud->id));
                $edit = route('post.edit', encrypt($crud->id));
                $delete = route('post.destroy', encrypt($crud->id));
                $exist = $crud;
                $nestedData['action'] = view('post.setting-action', compact('show','edit', 'delete', 'exist'))->render();
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
