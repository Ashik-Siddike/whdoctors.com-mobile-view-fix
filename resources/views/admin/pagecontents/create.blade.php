@extends('admin.app')
@section('title')
    Page Content
@endsection
@section('content')


<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Page Content</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('page-contents')}}">Page Content</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Create Page Content</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('page-contents')}}" class="add-new">Page Content<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">
                    <form action="{{ route('page-content.store') }}" method="POST"
                    enctype="multipart/form-data" class="row g-3 mt-0">
                        @csrf
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="form-label custom-label">Page Name</label>
                                    <select class="form-control custom-input single-select2" name="page_id">
                                        <option value="" disabled selected> -- Select Category --</option>
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('page_id'))
                                        <div class="error_msg">
                                            {{ $errors->first('page_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Hints</label>
                                    <input type="text" class="form-control custom-input" name="hints" placeholder="Hint">
                                    @if($errors->has('hints'))
                                        <div class="error_msg">
                                            {{ $errors->first('hints') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Title</label>
                                    <input type="text" class="form-control custom-input" name="title" placeholder="Title">
                                    @if($errors->has('title'))
                                        <div class="error_msg">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Subtitle</label>
                                    <input type="text" class="form-control custom-input" name="subtitle" placeholder="Subtitle">
                                    @if($errors->has('subtitle'))
                                        <div class="error_msg">
                                            {{ $errors->first('subtitle') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Number</label>
                                    <input type="number" class="form-control custom-input" name="number" placeholder="Number">
                                    @if($errors->has('number'))
                                        <div class="error_msg">
                                            {{ $errors->first('number') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Button Text</label>
                                    <input type="text" class="form-control custom-input" name="button_text" placeholder="Button Text">
                                    @if($errors->has('button_text'))
                                        <div class="error_msg">
                                            {{ $errors->first('button_text') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Button Link</label>
                                    <input type="text" class="form-control custom-input" name="button_link" placeholder="Button Link">
                                    @if($errors->has('button_link'))
                                        <div class="error_msg">
                                            {{ $errors->first('button_link') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="form-label custom-label">Description</label>
                                    <textarea class="form-control custom-input" name="description" rows="5"  placeholder="Description"  style="resize: none; height: auto"></textarea>
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
                                        <p>Image</p>
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
@endpush
