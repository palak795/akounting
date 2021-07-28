@extends('layouts.app')
@section('content')
<!-- BEGIN: Content-->
<div class="row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Computer Details Form</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a>Home</a>
                    </li>
                    <li class="breadcrumb-item"><a>List</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="content-body">
    <!-- Basic form layout section start -->
    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Create</h4>
                        <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                        </a>
                    </div>
                    <form class="form" method="post" action="{{ route('computers.update',$crud->id) }}">
                        @csrf
                        @method('patch')
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">                                                   
                                            <label for="eventRegInput1">Model</label>
                                                <input type="text" id="eventRegInput1" class="form-control"
                                                    placeholder="model" name="model" value="{{$crud->model}}">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Brand</label>
                                                <input type="text" id="eventRegInput2" class="form-control"
                                                    placeholder="Brand" name="brand" value="{{$crud->brand}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="eventRegInput2">Date_of_manufacture</label>
                                            <input type="date" id="eventRegInput2" class="form-control"
                                                name="date_of_manufacture" value="{{$crud->date_of_manufacture}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="eventRegInput2">RAM</label>
                                        <input type="text" id="eventRegInput2" class="form-control"  placeholder="RAM" 
                                            name="ram" value="{{$crud->ram}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="eventRegInput2">processor</label>
                                                <input type="text" id="eventRegInput2" class="form-control" value="{{$crud->processor}}" placeholder="processor" name="processor">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="eventRegInput2">Display</label>
                                            <input type="text" id="eventRegInput2" class="form-control" placeholder="display" 
                                                name="display" value="{{$crud->display}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="eventRegInput4" class="form-check-label">Accessories</label>
                                        <div class="form-check">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="checkbox" id="eventRegInput4" class="form-check-input" 
                                                    name="accessories[]" value="mouse"{{in_array('mouse',explode(',',$crud->accessories))?'checked':''}}>
                                                    <label class="form-check-label">Mouse</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="checkbox" id="eventRegInput4" class="form-check-input" 
                                                    name="accessories[]" value="keyboard"{{in_array('keyboard',explode(',',$crud->accessories))?'checked':''}}>
                                                    <label class="form-check-label">Keyboard</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="checkbox" id="eventRegInput4" class="form-check-input"
                                                    name="accessories[]" value="usb"{{in_array('usb',explode(',',$crud->accessories))?'checked':''}}>
                                                    <label class="form-check-label">USB</label>
                                                </div>
                                                <div class="col-lg-6">  <input type="checkbox" id="eventRegInput4"
                                                    class="form-check-input" placeholder="education"
                                                    name="accessories[]" VALUE="monitor"{{in_array('monitor',explode(',',$crud->accessories))?'checked':''}}>
                                                    <label class="form-check-label">Monitor</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="eventRegInput2">warranty</label>
                                            <input type="text" id="eventRegInput2" class="form-control" placeholder="warranty" 
                                                name="warranty" value="{{$crud->warranty}}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="eventRegInput5">description</label>
                                            <textarea id="projectinput9" rows="5" class="form-control" name="description" placeholder="About Computer">{{$crud->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="eventRegInput2">storage</label>
                                            <input type="text" id="eventRegInput2" class="form-control"
                                                placeholder="storage" name="storage" value="{{$crud->storage}}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                    <div class="form-group">
                                    <label for="eventRegInput2">Battery-capacity</label>
                                    <input type="text" id="eventRegInput2" class="form-control"
                                        placeholder="battery_capacity" name="battery_capacity" value="{{$crud->battery_capacity}}">
                                    </div>
                                    </div>
                                    <div class="col-md-8">
                                        <button type="update" class="btn btn-primary">
                                            <i class="la la-check-square-o">Update</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>   
                </div>
                
            </div>
        </div>



</section>
<!-- // Basic form layout section end -->
</div>
@endsection