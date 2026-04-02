@extends('admin.app')
@section('title')
    Course
@endsection
@section('content')


<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Course</div>
                        <nav aria-label="breadcrumb"> 
                            <ol class="breadcrumb mb-0"> 
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li> 
                                <li class="breadcrumb-item">
                                    <a href="{{route('course')}}">Course</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Edit Course</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('course')}}" class="add-new">Course<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">
                    <form action="{{ route('course.update', ['id' => $course->id]) }}" method="POST"
                    enctype="multipart/form-data" class="row g-3 mt-0">

                        @csrf
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Course Name</label>
                                    <input type="text" class="form-control custom-input" name="name" value="{{$course->name}}">
                                    @if($errors->has('name'))
                                        <div class="error_msg">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-md-12">
                                    <label for="description" class="form-label custom-label">Description</label>
                                    <textarea class="form-control custom-input" name="description" id="description" rows="5"  placeholder="Description"  style="resize: none; height: auto">{{$course->description}}</textarea>
                                    @if($errors->has('description'))
                                        <div class="error_msg">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 text-center">
                            <button type="submit" class="btn submit-button"> 
                                Update
                                <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                </span>
                            </button>
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

    {{-- CK Editor --}}
    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        setTimeout(function(){
                CKEDITOR.replace('description', {
                    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
                });
            },100);
    </script>
@endpush
