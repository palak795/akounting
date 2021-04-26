
@extends('layouts.app')
@section('content')



<!-- BEGIN: Content-->

<div class="row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Student form</h3>
    </div>
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('student.index')}}">List</a>
                            </li>
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>
            <div class="content-header-right col-md-4 col-12 d-block d-md-none"><a class="btn btn-warning btn-min-width float-md-right box-shadow-4 mr-1 mb-1" href="chat-application.html"><i class="ft-mail"></i> Email</a></div>
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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Simple Form</h4>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse">
                                                <i class="ft-minus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="reload">
                                                <i class="ft-rotate-cw"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="expand">
                                                <i class="ft-maximize"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="close">
                                                <i class="ft-x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                          
                                               
                                    <form class="form" method="post"action="{{route('student.update',$crud->id)}}" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label for="eventRegInput1">Student Name</label>
                                                        <input type="text" id="eventRegInput1" class="form-control" placeholder="name" name="studentname" value="{{$crud->studentname}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="eventRegInput2">Father Name</label>
                                                        <input type="text" id="eventRegInput2" class="form-control" placeholder="father name" name="fathername" value="{{$crud->fathername}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="eventRegInput3">Mothername</label>
                                                        <input type="text" id="eventRegInput3" class="form-control" placeholder="mother name" name="mothername"value="{{$crud->mothername}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="eventRegInput3">Email</label>
                                                        <input type="email" id="eventRegInput3" class="form-control" placeholder="mother name" name="email"value="{{$crud->email}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="eventRegInput3">Date</label>
                                                        <input type="date" id="eventRegInput3" class="form-control" placeholder="mother name" name="date"value="{{$crud->date}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="eventRegInput4">Education</label>
                                                        <input type="checkbox" id="eventRegInput4" class="form-control" placeholder="education" name="education[]" value="BCA" {{in_array('BCA',explode(',',$crud->education))?'checked':''}}>BCA
                                                        <input type="checkbox" id="eventRegInput4" class="form-control" placeholder="education" name="education[]" value="MCA" {{in_array('MCA',explode(',',$crud->education))?'checked':''}}>MCA
                                                        <input type="checkbox" id="eventRegInput4" class="form-control" placeholder="education" name="education[]" value="BBA" {{in_array('BBA',explode(',',$crud->education))?'checked':''}}>BBA
                                                        <input type="checkbox" id="eventRegInput4" class="form-control" placeholder="education" name="education[]" value="MBA" {{in_array('MBA',explode(',',$crud->education))?'checked':''}}>MBA
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="projectinput7">Country</label>
                                                        <div class="col-md-9">
                                                            <select id="projectinput7" name="country" class="form-control">
                                                                <option value="0" selected="" disabled="">Country</option>
                                                                <option value="India"{{in_array("India",explode(',',$crud->country))?'selected':''}}>India</option>
                                                                <option value="Pakistan"{{in_array("Pakistan",explode(',',$crud->country))?'selected':''}}>Pakistan</option>
                                                                <option value="Canada"{{in_array("canada",explode(',',$crud->country))?'selected':''}}>Canada</option>
                                                                <option value="switzerland"{{in_array("switzerland",explode(',',$crud->country))?'selected':''}}>switzerland</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="eventRegInput5">Image</label>
                                                        <input type="file" id="eventRegInput5" class="form-control" name="image" placeholder="image" value="{{$crud->image}}">
                                                        <img src="{{asset('image/'.$crud->image)}}" width="100px">
                                                    </div>

                                                    <div class="form-group row">
                                           
                                                        <label for="eventRegInput5">Address</label>
                                                            <textarea id="projectinput9" rows="5" class="form-control" name="address"
                                                                placeholder="About Address">{{$crud->address}}</textarea>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions center">
                                            <button type="button" class="btn btn-danger mr-1">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    
                    
                
            </section>
            <!-- // Basic form layout section end -->
    
</div>
@endsection
