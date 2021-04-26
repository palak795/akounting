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
                        <li class="breadcrumb-item"><a href="{{route('student.index')}}">List</a>
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
                        <div class="card-header" style="height: 50px;">
                            <div class="card-title layout_btns" id="basic-layout-form">
                                <h3>List</h3>

                                <div class="btns-right-side">
                                    <a href="{{ route('student.index') }}" method="post"
                                        class="btn mr-1 mb-1 btn-success btn-sm" type="submit">List</a>
                                @if ($crud > 0)
                                    <button type="button" id="restoreTrigger"
                                        class="btn mr-1 mb-1 btn-danger btn-sm">Restore all values</button>
                                @endif

                                </div>
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
                                    <form class="form" action="{{route('student.multi-restore')}}" method="POST" id="{{'restore_all'}}">
                                        @csrf
                                        <table class="table table-striped table-bordered zero-configuration" id="details"
                                            style="width: 50%; display: table;">
                                            <thead>
                                                <tr>
                                            <th><input type="checkbox" name="" class="checkboxes" id="checkAll" />
                                            </th>

                                            <th> Student Name</th>
                                            <th>Father Name</th>
                                            <th>Mother Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Education</th>
                                            <th>Country</th>
                                            <th>Image</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th><input type="checkbox" name="" class="checkboxes" id="checkAll" />
                                                    </th>
                                                    <th> Student Name</th>
                                                    <th>Father Name</th>
                                                    <th>Mother Name</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Education</th>
                                                    <th>Country</th>
                                                    <th>Image</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
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
    <script src="https://unpkg.com/promise-polyfill" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.js') }}" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->
    <script>
        $(document).ready(function() {
            // Data table for serverside
            $('#details').DataTable({
                "pageLength": 25,
                "aaSorting": [
                    [1, 'desc']
                ],
                "order":[
                    [1,'desc']
            ],
                
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('get.deleted_values') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}",
                        route: '{{ route('student.restore_view') }}'
                    }
                },
                "columns": [
                    {
                       "data":"#"
                    },
                    {
                        "data": "studentname"
                    },
                    {
                        "data": "fathername"
                    },
                    {
                        "data": "mothername"
                    },
                    {
                        "data":"email"
                    },
                    {
                        "data":"date"
                    },
                    {
                        "data": "education"
                    },
                    {
                        "data":"country"
                    },
                    {
                        "data": "image"
                    },
                    {
                        "data": "address"
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
