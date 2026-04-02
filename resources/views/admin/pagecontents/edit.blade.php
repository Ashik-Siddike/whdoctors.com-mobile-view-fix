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
                                <li class="breadcrumb-item active" aria-current="page"> Edit Page Content</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('page-contents')}}" class="add-new">Page Content<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">

                    <form action="{{ route('page-content.update', ['id' => $page_content->id]) }}" method="POST"
                    enctype="multipart/form-data" class="row g-3 mt-0">

                        @csrf
                        <div class="col-md-8">
                            <div class="row">

                                @if (Auth::user()->hasRole('superadmin'))
                                    <div class="col-md-12">
                                        <label for="" class="form-label custom-label">Page Name</label>
                                        <select class="form-control custom-input single-select2" name="page_id">
                                            @foreach ($pages as $page)
                                                <option value="{{ $page->id }}" {{ $page->id == $page_content->page_id ? 'selected' : ' ' }}>
                                                    {{ $page->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('page_id'))
                                            <div class="error_msg">
                                                {{ $errors->first('page_id') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                @if (Auth::user()->hasRole('superadmin'))
                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Hints</label>
                                    <input type="text" class="form-control custom-input" name="hints" value="{{$page_content->hints}}">
                                    @if($errors->has('hints'))
                                        <div class="error_msg">
                                            {{ $errors->first('hints') }}
                                        </div>
                                    @endif
                                </div>
                                @endif
                                @if($page_content->title)
                                    <div class="col-md-6">
                                        @if($page_content->button_text == 'seo')
                                            <label for="" class="form-label custom-label">SEO Title</label>
                                        @else
                                            <label for="" class="form-label custom-label">Title</label>
                                        @endif
                                        <input type="text" class="form-control custom-input" name="title"  value="{{$page_content->title}}">
                                        @if($errors->has('title'))
                                            <div class="error_msg">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                @if($page_content->subtitle)
                                <div class="col-md-6">
                                    @if($page_content->button_text == 'seo')
                                        <label for="" class="form-label custom-label">SEO Keywords</label>
                                    @else
                                        <label for="" class="form-label custom-label">Subtitle</label>
                                    @endif
                                    <input type="text" class="form-control custom-input" name="subtitle"  value="{{$page_content->subtitle}}">
                                    @if($errors->has('subtitle'))
                                        <div class="error_msg">
                                            {{ $errors->first('subtitle') }}
                                        </div>
                                    @endif
                                </div>
                                @endif

                                @if ($page_content->number)
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Number</label>
                                        <input type="text" class="form-control custom-input" name="number"  value="{{$page_content->number}}">
                                        @if($errors->has('number'))
                                            <div class="error_msg">
                                                {{ $errors->first('number') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                @if ($page_content->button_text && $page_content->button_text != 'seo')
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Button Text</label>
                                        <input type="text" class="form-control custom-input" name="button_text"  value="{{$page_content->button_text}}">
                                        @if($errors->has('button_text'))
                                            <div class="error_msg">
                                                {{ $errors->first('button_text') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                @if ($page_content->button_link)
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Button Link</label>
                                        <input type="text" class="form-control custom-input" name="button_link"  value="{{$page_content->button_link}}">
                                        @if($errors->has('button_link'))
                                            <div class="error_msg">
                                                {{ $errors->first('button_link') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                @if ($page_content->description)
                                    <div class="col-md-12">
                                        @if($page_content->button_text == 'seo')
                                            <label class="form-label custom-label">SEO Description</label>
                                        @else
                                            <label class="form-label custom-label">Description</label>
                                        @endif

                                        <textarea class="form-control custom-input" name="description" rows="5"  placeholder="Description" id="description" style="resize: none; height: auto">{{$page_content->description}}</textarea>
                                        @if($errors->has('description'))
                                            <div class="error_msg">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if($page_content->image)
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="image-select-file">
                                        @if($page_content->button_text == 'seo')
                                            <p> SEO Image</p>
                                        @else
                                            <p>Image</p>
                                        @endif
                                        <label class="form-label custom-label" for="cover_image">
                                            <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data" >
                                            <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                            <div class="user-image">
                                                <img id="cover_imagePreview" src="{{ asset($page_content->image) }}" alt="" class="image-preview">
                                                <span class="formate-error cover_imageerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Iamge</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="cover_imageDelete" onclick="removeImage('cover_image')">Remove image</div>

                                    @if($errors->has('image'))
                                        <div class="error_msg">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        @endif

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
    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>
    <script type="text/javascript">
        setTimeout(function(){
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
            });
        },100);
    </script>
@endpush
