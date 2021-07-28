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
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('create.step1')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('computers.index')}}">List</a>
                        </li>
                    </ol> 
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
                        <div class="card-header" >
                            <div class="card-title layout_btns" id="basic-layout-form">
                                <h3>List</h3>

                                <div class="btns-right-side">
                                    <a href="{{ route('create.step1') }}" method="post"
                                        class="btn mr-1 mb-1 btn-success btn-sm" type="submit">Add</a>

                                         <a href="{{ route('computers.import-export') }}" method="post"
                                        class="btn mr-1 mb-1 btn-success btn-sm" type="submit">Import</a>

                                        <a class="btn mr-1 mb-1 btn-success btn-sm" href="{{ route('export') }}">Export Bulk Data</a>

                                         <a href="{{ route('computers.restore_view') }}" method="post"
                                    class="btn mr-1 mb-1 btn-danger btn-sm" type="submit">Restore Deleted values</a>
                                @if ($computers> 0) 
                                    <button type="button" id="deleteTrigger"
                                        class="btn mr-1 mb-1 btn-danger btn-sm">Delete</button>
                                @endif 
                                        
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
                                     <form class="form" action="{{route('computers.multi-delete')}}" method="POST" id="{{'delete_all'}}">
                                        @csrf
                                        <div style="overflow:auto">
                                        <table class="table table-striped table-bordered zero-configuration" id="details"
                                            style="width: 100%; display: table;">
                                            <thead>
                                                <tr>
    <th><input type="checkbox" name="" class="checkboxes" id="checkAll" /> </th>
                                                    <th>Model</th>
                                                    <th>Brand</th>
                                                    <th>Date_of_manufacture</th>
                                                    <th>ram</th>
                                                    <th>processor</th>
                                                    <th>display</th>
                                                    <th>Accessories</th>
                                                    <th>warranty</th>
                                                    <th>description</th>
                                                    <th>storage</th>
                                                    <th>battery_capacity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                            </tbody>
                                            <tfoot>
                                                <tr>
        <th><input type="checkbox" name="" class="checkboxes" id="checkAll" /> </th>
                                                    <th>Model</th>
                                                    <th>Brand</th>
                                                    <th>Date_of_manufacture</th>
                                                    <th>ram</th>
                                                    <th>processor</th>
                                                    <th>display</th>
                                                    <th>Accessories</th> 
                                                    <th>warranty</th>
                                                    <th>description</th>
                                                    <th>storage</th>
                                                    <th>battery_capacity</th>
                                                    <th>Action</th>  
                                                </tr>
                                            </tfoot>
                                        </table>
                                        </div>
                                    </form>  
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
            $('#details').DataTable({
                "pageLength": 10,
                "aasorting" :[
                [1,'desc']
            ],    
                "order":[
                    [1,'desc']
            ],
                
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('get.computers_details') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}",
                        route: '{{ route('computers.index') }}'
                    }
                },
                "columns": [{
                        "data": "#"
                    },
                    {
                        "data": "model"
                    },
                    {
                        "data": "brand"
                    },
                    {
                        "data": "date_of_manufacture"
                    },
                    {
                        "data":"ram"
                    },
                    {
                        "data":"processor"
                    },
                    {
                        "data": "display"
                    },
                    {
                        "data": "accessories"
                    },
                    {
                        "data":"warranty"
                    },
                    {
                        "data": "description"
                    },
                    {
                        "data": "storage"
                    },
                    {
                        "data": "battery_capacity"
                    },
                    {
                        "data": "action"
                    }
                ],
                aoColumnDefs: [{
                    bSortable: false,
                    aTargets: [-1, 0]
                }]
            });
        });

    </script>
    <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
@endsection
