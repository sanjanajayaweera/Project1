@extends('layouts.app')

@section('title')
<div class="row  py-4">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="col-lg-6 col-7">
                <h2 class="h2 text-dark d-inline-block mb-0">Tag Management <small>[all]</small></h2>
                <nav aria-label="breadcrumb" class="d-none d-md-block mt-2">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tag Management</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-4 text-right">
                <a href="{{route('tag.create')}}" class=" btn btn-sm btn-neutral float-right">
                    <i class="fas fa-plus-circle"></i> Add New
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
   <div class="row" > 
    <div class="col-12">
        <livewire:tags.tag-datatables/> 
    </div>

   </div>

@endsection
