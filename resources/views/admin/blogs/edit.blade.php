@extends('admin.app')
@section('title')
    Blog
@endsection
@section('content')


<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Blog</div>
                        <nav aria-label="breadcrumb"> 
                            <ol class="breadcrumb mb-0"> 
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li> 
                                <li class="breadcrumb-item">
                                    <a href="{{route('blogs')}}">Blog</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Edit Blog</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('blogs')}}" class="add-new">Blog<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">
                    <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="POST"
                    enctype="multipart/form-data" class="row g-3 mt-0">

                        @csrf
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="form-label custom-label">Blog Category</label>
                                    <select class="form-control custom-input" name="blog_category_id">
                                        <option value="" disabled selected> -- Select Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $blog->blog_category_id ? 'selected' : ' ' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('blog_category_id'))
                                        <div class="error_msg">
                                            {{ $errors->first('blog_category_id') }}
                                        </div>
                                    @endif
                                </div>
                                

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Title</label>
                                    <input type="text" class="form-control custom-input" name="title" value="{{$blog->title}}">
                                    @if($errors->has('title'))
                                        <div class="error_msg">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Subtitle</label>
                                    <input type="text" class="form-control custom-input" name="subtitle" value="{{$blog->subtitle}}">
                                    @if($errors->has('subtitle'))
                                        <div class="error_msg">
                                            {{ $errors->first('subtitle') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-md-12">
                                    <label for="description" class="form-label custom-label">Description</label>
                                    <textarea class="form-control custom-input" name="description" id="description" rows="5"  placeholder="Description"  style="resize: none; height: auto">{{$blog->description}}</textarea>
                                    @if($errors->has('description'))
                                        <div class="error_msg">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="image-select-file">
                                        <p>Cover Image</p>
                                        <label class="form-label custom-label" for="cover_image">
                                            <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                                            <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                            <div class="user-image">
                                                <img id="cover_imagePreview" src="{{ $blog->image ? asset($blog->image) : asset('admin/assets/images/default.jpg') }}" alt="background-image" class="image-preview">
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
