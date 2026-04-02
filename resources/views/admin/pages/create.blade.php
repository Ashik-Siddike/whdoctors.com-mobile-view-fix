@extends('admin.app')
@section('title')
    Page
@endsection
@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card pb-5">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Page</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('pages')}}">Page</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page"> Create Page</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('pages')}}" class="add-new">Page<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <form action="{{ route('page.store') }}" method="POST"
                        enctype="multipart/form-data" class="row g-3 mt-0">

                            @csrf
                            <div class="col-md-4">
                                
                                <label for="" class="form-label custom-label custom-label">Name</label>
                                <input type="text" class="form-control custom-input" name="title" placeholder="Title">
                                @if($errors->has('title'))
                                    <div class="error_msg">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif

                            </div>

                            <div class="row">
                                <div class="col-4 text-end px-0">
                                    <button type="submit" class="btn submit-button"> 
                                        Submit
                                        <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('custom-scripts')
    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>
@endpush
