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
                <form class="form" method="post"  action="{{ route('store.step2') }}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="eventRegInput2">processor</label>
                                            <input type="text" id="eventRegInput2" class="form-control"
                                                placeholder="processor" name="processor">
                                                @error('processor')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="eventRegInput2">Display</label>
                                        <input type="text" id="eventRegInput2" class="form-control"
                                            placeholder="display" name="display">
                                            @error('display')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="eventRegInput4" class="form-check-label">Accessories</label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="checkbox" id="eventRegInput4"
                                                    class="form-check-input" 
                                                    name="accessories[]" value="mouse"><label
                                                    class="form-check-label">Mouse</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="checkbox" id="eventRegInput4"
                                                    class="form-check-input" 
                                                    name="accessories[]" value="keyboard"><label
                                                    class="form-check-label">Keyboard</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="checkbox" id="eventRegInput4"
                                                    class="form-check-input" 
                                                    name="accessories[]" value="usb"><label
                                                    class="form-check-label">USB</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="checkbox" id="eventRegInput4"
                                                    class="form-check-input" placeholder="education"
                                                    name="accessories[]" VALUE="monitor"><label
                                                    class="form-check-label">Monitor</label>
                                            </div>
                                            @error('accessories')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="eventRegInput2">warranty</label>
                                        <input type="text" id="eventRegInput2" class="form-control" placeholder="warranty" name="warranty">
                                        @error('warranty')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                                    <div class="col-md-8">
                                        <a style="color:white" type="button" class="btn btn-primary" href="{{route('create.step1')}}">
                                        <i class="la la-check-square-o"></i>Previous
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o "></i>Next
                                        </button>
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