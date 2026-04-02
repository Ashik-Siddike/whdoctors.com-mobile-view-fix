@extends('admin.app')
@section('title')
    Office Details
@endsection

@section('content')
<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Office Section Details</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('Office.index')}}">Office Section</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Office Section Details</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('Office.index')}}" class="add-new">Back to Office Section List<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label custom-label">Title</label>
                            <p class="form-control-static">{{ $office->title }}</p>
                        </div>

                        <div class="col-md-6">
                            <label for="address" class="form-label custom-label">Address</label>
                            <p class="form-control-static">{{ $office->address }}</p>
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label custom-label">Phone</label>
                            <p class="form-control-static">{{ $office->phone }}</p>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label custom-label">Email</label>
                            <p class="form-control-static">{{ $office->email }}</p>
                        </div>

                        <div class="col-md-6">
                            <label for="working_hour" class="form-label custom-label">Working Hours</label>
                            <p class="form-control-static">{{ $office->working_hour }}</p>
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label custom-label">Status</label>
                            <p class="form-control-static">
                                @if($office->status == 1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </p>
                        </div>



                    </div>
                    {{-- <div class="col-12 text-center pt-3">
                        <a href="{{ route('Office.edit', $office->id) }}" class="btn submit-button">
                            Edit
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
