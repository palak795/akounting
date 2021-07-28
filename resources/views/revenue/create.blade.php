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
</style>
</head>

<div class="row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">New Revenue</h3>
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
                    <h4 class="card-title" id="basic-layout-form">Create New Revenue</h4>
                        <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                        </a>                       
                     </div>
                    <form enctype="multipart/form-data" method="post" action="{{ route('revenue.store') }}"> 
                       @csrf
                      <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">                                       
                                                <label for="eventRegInput1">Date
                                                </label>
                                                <span class ="required-field">
                                                <input type="date" id="eventRegInput1" class="form-control"s name="date">
                                                @error('date')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Amount</label>
                                                <input type="text" id="eventRegInput2" class="form-control"
                                                    placeholder="amount" name="amount">
                                                @error('amount')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div> 

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Account</label>
                                                <input type="text" id="eventRegInput2" class="form-control"
                                                    placeholder="account" name="account">
                                                @error('account')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div> 

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Customer</label>
                                                <input type="text" id="eventRegInput2" class="form-control"
                                                    placeholder="customer" name="customer">
                                                @error('customer')
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
                                                <label for="eventRegInput2">Recurring</label>
                                                <input type="text" id="eventRegInput2" class="form-control"
                                                    placeholder="Recurring" name="recurring">
                                                    @error('recurring')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="eventRegInput2">Attachment
                                                </label>
                                                <input type="file" id="eventRegInput2" class="form-control" name="attachment">
                                                    @error('attachment')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
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