@extends('admin.app')
@section('title')
    User
@endsection

@push('custom-style')
    <style>
        .update_info_title{
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 0;
        }
        .update_info_subtitle{
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 0;
        }
        .error-messages{
            color: red;
            font-size: 14px;
            list-style: none;
            padding-left: 0;
        }
    </style>
@endpush

@section('content')
    
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="p-4 bg-white rounded-3">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="p-4 bg-white rounded-3">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

    </div>
@endsection

@push('custom-scripts')
    @if(session('status'))
    <script>
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            button: "OK",
        });
    </script>
    @endif
@endpush
