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
                    <form class="form" method="post" action="{{ route('store.step1') }}">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">                                                   
                                                <label for="eventRegInput1">Model</label>
                                                <input type="text" id="eventRegInput1" class="form-control"
                                                    placeholder="model" name="model">
                                                @error('model')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Brand</label>
                                                <input type="text" id="eventRegInput2" class="form-control"
                                                    placeholder="Brand" name="brand">
                                                @error('brand')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Date_of_manufacture</label>
                                                <input type="date" id="eventRegInput2" class="form-control"
                                                    name="date_of_manufacture">
                                                    @error('date_of_manufacture')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="eventRegInput2">RAM</label>
                                                <input type="text" id="eventRegInput2" class="form-control"
                                                    placeholder="RAM" name="ram">
                                                    @error('ram')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-8 text-right">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Next
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
</div>
</section>
<!-- // Basic form layout section end -->
</div>
@endsection