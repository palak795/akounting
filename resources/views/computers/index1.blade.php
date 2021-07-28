@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection
@section('content')
    <!--BEGIN content-->
    <style>
        .layout_btns {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

    </style>
    <div class="row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Details</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                   {{--  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('student.create')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('student.index')}}">List</a>
                        </li>
                    </ol> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!--Form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="height: 50px;">
                            <div class="card-title layout_btns" id="basic-layout-form">
                                <h3>List</h3>

                                <div class="btns-right-side">
                                    <a href="{{ route('create.step1') }}" method="post"
                                        class="btn mr-1 mb-1 btn-success btn-sm" type="submit">Add</a>
                                        
                                 </div>
                        </div>
                        <!--Card Content start-->
                        <div class="card-content collapse show">
                            <div class="card-body">
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ \Session::get('success') }}
                                    </div>
                                @endif
                                @if (\Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ \Session::get('error') }}
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    {{-- <form class="form" action="{{route('student.multi-delete')}}" method="POST" id="{{'delete_all'}}"> --}}
                                        @csrf
                                        <div style="overflow:auto">
                                        <table class="table table-striped table-bordered zero-configuration" id="details"
                                            style="width: 100%; display: table;">
                                            <thead>
                                                <tr>
                                                    <th>Model</th>
                                                    <th>Brand</th>
                                                    <th>Date_of_manufacturer</th>
                                                    <th>ram</th>
                                                    <th>processor</th>
                                                    <th>display</th>
                                                    {{-- <th>Accessories</th> --}}
                                                    <th>warranty</th>
                                                    <th>description</th>
                                                    <th>storage</th>
                                                    <th>battery_capacity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($computers as $computer)
                                                    <tr>
                                                        <td>{{$computer->model}}</td>
                                                        <td>{{$computer->brand}}</td>
                                                        <td>{{$computer->date_of_manufacture}}</td>
                                                        <td>{{$computer->ram}}</td>
                                                        <td>{{$computer->processor}}</td>
                                                        <td>{{$computer->display}}</td>
                                                        <td>{{$computer->warranty}}</td>
                                                        <td>{{$computer->description}}</td>
                                                        <td>{{$computer->storage}}</td>
                                                        <td>{{$computer->battery_capacity}}</td>
                                                        <td>{{$computer->Action}}</td>
                                                        <td>
                                                            <span class="dropdown">
                                                                <button id="btnSearchDrop12" type="button" class="btn btn-sm btn-icon btn-pure font-medium-2 btnSearchDrop12"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="ft-more-vertical"></i>
                                                                </button>
                                                                <span aria-labelledby="btnSearchDrop12" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="bottom-end"
                                                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(55px, 27px, 0px);">
                                                                    <a class="dropdown-item" href="{{route('computers.edit',$computer->id)}}">
                                                                        <i class="ft-edit-2"></i>Edit
                                                                    </a>
                                                                    <a href="#" data-form_id="" class="delete dropdown-item"><i
                                                                            class="ft-trash-2"></i>Delete
                                                                    </a>
                                                                    <form action="" method="post" id="">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </span>
                                                            </span>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Model</th>
                                                    <th>Brand</th>
                                                    <th>Date_of_manufacture</th>
                                                    <th>ram</th>
                                                    <th>processor</th>
                                                    <th>display/th>
                                                    {{-- <th>Accessories</th> --}}
                                                    <th>warranty</th>
                                                    <th>description</th>
                                                    <th>storage</th>
                                                    <th>battery_capacity</th>
                                                    <th>Action</th>  
                                                </tr>
                                            </tfoot>
                                        </table>
                                        </div>
                                    {{-- </form> --}}
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript">
    </script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('https://unpkg.com/promise-polyfill')}}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.js') }}" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->
    <script>
        $(document).ready(function() {
            // Data table for serverside
            $('#details').DataTable();
        });

    </script>
    <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
@endsection
