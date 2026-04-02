@extends('admin.app')
@section('title')
Show contentus Section
@endsection

@section('content')

<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header d-flex justify-content-between align-items-center">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">contentus Section Details</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('contentus.index') }}">contentus Point</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{ route('contentus.index') }}" class="add-new">Back to List <i class="ms-1 ri-arrow-go-back-line"></i></a>
                </div>

                <div class="card-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Title:</label>
                            <div class="form-control">{{ $content->title }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Subtitle:</label>
                            <div class="form-control">{{ $content->subtitle }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Status:</label>
                            <div class="form-control">
                                @if($content->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-bold">Description:</label>
                            <div class="p-3 border rounded">
                                {!! $content->description !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
