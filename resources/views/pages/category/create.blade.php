@extends('layouts.app')
@section('title')
<div class="row  py-4">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="col-lg-6 col-7">
                <h2 class="h2 text-dark d-inline-block mb-0">Category Management <small>[new]</small></h2>
                <nav aria-label="breadcrumb" class="d-none d-md-block mt-2">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Category Management</li>
                    </ol>
                </nav>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 ml-5 ">
        <div class="card">
            <div class="card-body">
                <form action="{{route('category.store')}}" method="post" id="activity-type-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inp_title"><b>Title </b> </label>
                                <input id="inp_title" class="form-control" type="text" name="title"
                                    placeholder="Enter a title">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <h6 class="text-center responsive-moblile">
                                    <span id="activityType-form-span"></span>
                                    <input id="submit-btn" type="submit" class="btn btn-success" value="Create">
                                </h6>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
