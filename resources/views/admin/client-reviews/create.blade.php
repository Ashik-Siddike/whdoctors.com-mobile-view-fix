@extends('admin.app')
@section('title')
    Client Review
@endsection
@section('content')


<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Client Review</div>
                        <nav aria-label="breadcrumb"> 
                            <ol class="breadcrumb mb-0"> 
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li> 
                                <li class="breadcrumb-item">
                                    <a href="{{route('client-review')}}">Client Review</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Create Client Review</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('client-review')}}" class="add-new">Client Review<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">
                    <form action="{{ route('client-review.store') }}" method="POST"
                    enctype="multipart/form-data" class="row g-3 mt-0">

                        @csrf
                        <div class="col-md-8">
                            <div class="row">
                                

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Name</label>
                                    <input type="text" class="form-control custom-input" name="name" placeholder="Name">
                                    @if($errors->has('name'))
                                        <div class="error_msg">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Designation</label>
                                    <input type="text" class="form-control custom-input" name="designation" placeholder="Designation">
                                    @if($errors->has('designation'))
                                        <div class="error_msg">
                                            {{ $errors->first('designation') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-md-12">
                                    <label for="review" class="form-label custom-label">Review</label>
                                    <textarea class="form-control custom-input" name="review" id="review" rows="5"  placeholder="Review"  style="resize: none; height: auto"></textarea>
                                    @if($errors->has('review'))
                                        <div class="error_msg">
                                            {{ $errors->first('review') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="image-select-file">
                                        <p>Client Image</p>
                                        <label class="form-label custom-label" for="cover_image">
                                            <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                                            <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                            <div class="user-image">
                                                <img id="cover_imagePreview" src="{{asset('admin/assets/images/default.jpg')}}" alt="" class="image-preview">
                                                <span class="formate-error cover_imageerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Iamge</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="cover_imageDelete" onclick="removeImage('cover_image')">Remove image</div>

                                    @if($errors->has('cover_image'))
                                        <div class="error_msg">
                                            {{ $errors->first('cover_image') }}
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>

                        
                        <div class="col-12 text-center">
                            <button type="submit" class="btn submit-button"> 
                                Submit
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
