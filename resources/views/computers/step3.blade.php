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
            </div>
        </div>
    </div>
</div>
{{-- @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif --}}
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
                    <form class="form" method="post"  action="{{ route('store.step3') }}">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                                                              
                                        <div class="form-group row">
                                            <label for="eventRegInput5">description</label>
                                            <textarea id="projectinput9" rows="5" class="form-control" name="description" placeholder="About Computer"></textarea>
                                            @error('description')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                    
                                
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                        <label for="eventRegInput2">storage</label>
                                        <input type="text" id="eventRegInput2" class="form-control"
                                            placeholder="storage" name="storage">
                                            @error('storage')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="eventRegInput2">Battery-capacity</label>
                                    <input type="text" id="eventRegInput2" class="form-control"
                                        placeholder="battery_capacity" name="battery_capacity">
                                        @error('battery_capacity')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <a href="{{route('create.step2')}}" style="color: white" type="button" class="btn btn-primary">
                                <i class="la la-check-square-o"></i>Previous
                                </a>
                                <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i>save
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        
</div>
</form>
</div>
</div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
@endsection