@extends('admin.app')
@section('title')
    Show Appointments
@endsection
@section('content')

    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Show Appointments</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('appointments.index')}}">Appointments</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Show Appointments</li>
                                </ol>
                            </nav>
                        </div>

{{--                        <a href="{{ route('slider.index') }}" class="add-new">Slider List <i class="ms-1 ri-list-ordered-2"></i></a>--}}
{{--                  --}}
                    </div>

                    <div class="card-body custom-form">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Appointment Details</h1>
                            <a href="{{ route('appointments.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="row g-3 mt-0">
                            <div class="col-md-8">
                                <div class="card-header py-3 bg-primary text-white">
                                    <h6 class="m-0 font-weight-bold">Visitor Information</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label custom-label">Full Name</label>
                                        <input type="text" class="form-control custom-input" value="{{ $appointment->name }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label custom-label">Email</label>
                                        <input type="text" class="form-control custom-input" value="{{ $appointment->email }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label custom-label">Phone</label>
                                        <input type="text" class="form-control custom-input" value="{{ $appointment->purpose }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label custom-label">Visit Time</label>
                                        <input type="text" class="form-control custom-input" value="{{ \Carbon\Carbon::parse($appointment->visit_time)->format('d M Y, h:i A') }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label custom-label">Purpose</label>
                                        <input type="text" class="form-control custom-input" value="{{ $appointment->purpose ?? 'N/A' }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label custom-label">Created At</label>
                                        <input type="text" class="form-control custom-input" value="{{ $appointment->created_at->format('d M Y, h:i A') }}" readonly>
                                    </div>
                                    <div class="card-footer text-end">
                                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this appointment?')">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">
                                            <i class="fa fa-arrow-left"></i> Back
                                        </a>
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
