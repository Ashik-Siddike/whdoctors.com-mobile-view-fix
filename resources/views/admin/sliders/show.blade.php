@extends('admin.app')
@section('title')
Show Slider
@endsection
@section('content')

<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Show Slider</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('slider.index')}}">Slider</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Show Slider</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{ route('slider.index') }}" class="add-new">Slider List <i class="ms-1 ri-list-ordered-2"></i></a>
                </div>

                <div class="card-body custom-form">
                    <div class="row g-3 mt-0">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label custom-label">Title</label>
                                    <input type="text" class="form-control custom-input" value="{{ $slider->title }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label custom-label">Subtitle</label>
                                    <input type="text" class="form-control custom-input" value="{{ $slider->subtitle }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label custom-label">Sort</label>
                                    <input type="number" class="form-control custom-input" value="{{ $slider->sort }}" readonly>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Existing Image</label>
                                    <div class="col-sm-3">
                                        <img src="{{asset('uploads/' . $slider->image) }}" width="120" alt="{{ $slider->image }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" disabled>
                                            <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> <!-- .row -->
                </div> <!-- .card-body -->
            </div>
        </div>
    </div>
</div>

@endsection
