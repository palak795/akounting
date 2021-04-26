@extends('layouts.app')
@section('content')



    <!-- BEGIN: Content-->

    <div class="row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Student form</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('student.create') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('student.index') }}">List</a>
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
                       <form class="form" method="post" action="{{ route('student.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="eventRegInput1">Student Name</label>
                                                    <input type="text" id="eventRegInput1" class="form-control"
                                                        placeholder="name" name="studentname">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="eventRegInput2">Father Name</label>
                                                    <input type="text" id="eventRegInput2" class="form-control"
                                                        placeholder="father name" name="fathername">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="eventRegInput3">Mothername</label>
                                                        <input type="text" id="eventRegInput3" class="form-control"
                                                            placeholder="mother name" name="mothername">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="eventRegInput3">Email</label>
                                                        <input type="email" id="eventRegInput3" class="form-control"
                                                            placeholder="email" name="email">
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="eventRegInput3">Date of birth</label>
                                                            <input type="date" id="eventRegInput3" class="form-control"
                                                                placeholder="date" name="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="eventRegInput5">Image</label>
                                                            <input type="file" id="eventRegInput5" class="form-control"
                                                                name="image" placeholder="image">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                <div class="col-lg-6">

                                                    <label for="eventRegInput4" class="form-check-label">Education</label>
                                                    <div class="form-check">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="checkbox" id="eventRegInput4"
                                                                    class="form-check-input" placeholder="education"
                                                                    name="education[]" value="BCA"><label
                                                                    class="form-check-label">BCA</label>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="checkbox" id="eventRegInput4"
                                                                    class="form-check-input" placeholder="education"
                                                                    name="education[]" value="MCA"><label
                                                                    class="form-check-label">MCA</label>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="checkbox" id="eventRegInput4"
                                                                    class="form-check-input" placeholder="education"
                                                                    name="education[]" value="BBA"><label
                                                                    class="form-check-label">BBA</label>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="checkbox" id="eventRegInput4"
                                                                    class="form-check-input" placeholder="education"
                                                                    name="education[]" VALUE="MBA"><label
                                                                    class="form-check-label">MBA</label>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="label-control"
                                                        for="projectinput7">Country</label>
                                                    
                                                        <select id="projectinput7" name="country" class="form-control">
                                                            <option value="0" selected="" disabled="">Country</option>
                                                            <option value="India">India</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="switzerland">switzerland</option>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="eventRegInput5">Address</label>
                                                    <textarea id="projectinput9" rows="5" class="form-control"
                                                        name="address" placeholder="About Address"></textarea>
                                                </div>

                                        </div>
                                    </div>

                                    <div class="form-actions center">
                                        <button type="button" class="btn btn-danger mr-1">
                                            <i class="ft-x"></i> Cancel
                                        </button>
                                        <button type="reset" class="btn btn-danger mr-1">
                                            <i class="ft-x"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>
                        </form>

                    </div>
                </div>
            </div>

        </section>
        <!-- // Basic form layout section end -->

    </div>
@endsection
