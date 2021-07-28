@extends('layouts.app')
@section('content')
<!-- BEGIN: Content-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.required-field::before {
  content: "*";
  color: red;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}


}
</style>
</head>

<div class="row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">New Item</h3>
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
<div class="content-body">
    <!-- Basic form layout section start -->
    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Create New Items</h4>
                        <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                        </a>                       
                     </div>
                    <form enctype="multipart/form-data" method="post" action="{{ route('account.store') }}"> 
                       @csrf
                      <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">                                       
                                                <label for="eventRegInput1">Name
                                                </label>
                                                <span class ="required-field">
                                                <input type="text" id="eventRegInput1" class="form-control"
                                                    placeholder="name" name="name">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Tax</label>
                                                <input type="text" id="eventRegInput2" class="form-control"
                                                    placeholder="tax" name="tax">
                                                @error('tax')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div> 

                                        <div class="col-md-12">                      
                                            <div class="form-group">
                                                <label for="eventRegInput5">description</label>
                                            <textarea id="projectinput9" rows="5" class="form-control" name="description" placeholder="About Computer"></textarea>
                                            @error('description')
                                                    <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                 </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Sale Price</label>
                                                <input type="text" id="eventRegInput2" class="form-control"
                                                    placeholder="Sale Price" name="sale_price">
                                                    @error('sale_price')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Purchase Price</label>
                                                <input type="text" id="eventRegInput2" class="form-control"
                                                    placeholder="Purchase Price" name="purchase_price">
                                                    @error('purchase_price')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                         <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Category
                                                </label>
                                                <input type="text" id="eventRegInput2" class="form-control" name="category"
                                                 placeholder="category">
                                                    @error('category')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Picture
                                                </label>
                                                <input type="file" id="eventRegInput2" class="form-control" name="picture">
                                                    @error('picture')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Enabled
                                                </label>
                                                <label class="switch">
                                                <input type="checkbox" name="enabled">
                                                <span class="slider"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8 text-right">
                                            <div class="form-group">
                                                <a href ="">
                                              <button type="submit" class="btn btn-primary">
                                              <i class="la la-check-square-o"></i>Cancel</button> </a> 
                                                <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save
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