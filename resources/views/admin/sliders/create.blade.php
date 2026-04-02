@extends('admin.app')
@section('title')
slider
@endsection
@section('content')

<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">slider</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('slider.index')}}">slider</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Add slider</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('slider.index')}}" class="add-new">slider List<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">
                    <form action="{{ route('slider.store') }}" method="POST"
                    enctype="multipart/form-data" class="row g-3 mt-0">

                        @csrf
                        <div class="col-md-8">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Title</label>
                                    <input type="text" class="form-control custom-input" name="title" placeholder="title" value="{{ old('title') }}">
                                    @if($errors->has('title'))
                                        <div class="error_msg">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Subtitle</label>
                                    <input type="text" class="form-control custom-input" name="subtitle" placeholder="subtitle" value="{{ old('subtitle') }}">
                                    @if($errors->has('subtitle'))
                                        <div class="error_msg">
                                            {{ $errors->first('subtitle') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Sort</label>
                                    <input type="number" class="form-control custom-input" name="sort" placeholder="sort" value="{{ old('sort') }}">
                                    @if($errors->has('sort'))
                                        <div class="error_msg">
                                            {{ $errors->first('sort') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <label for="status" class="form-label custom-label">Status</label>
                                    <select name="status" id="status" class="form-control custom-input">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @if($errors->has('status'))
                                        <div class="error_msg">
                                            {{ $errors->first('status') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6 " style="padding-left: 370px">
                                    <div class="image-select-file">
                                        <label class="form-label custom-label" for="logo_image">
                                            <input type="hidden" id="logo_image_data" class="form-control custom-input" name="logo_image_data">
                                            <input type="file" id="logo_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                            <div class="user-image">
                                                <img id="logo_imagePreview" src="{{asset('admin/assets/images/default.jpg')}}" alt="" class="image-preview">
                                                <span class="formate-error logo_imageerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Image</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="logo_imageDelete" onclick="removeImage('logo_image')">Remove image</div>

                                    @if($errors->has('image'))
                                        <div class="error_msg">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @endif
                                </div>






                        <div class="col-12 text-center pt-5">
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
    <script script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#multiple-course').select2();
        });
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
        setTimeout(function(){
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.replace('admission-requirements', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
            });
            CKEDITOR.replace('address', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
                toolbarGroups: [
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    '/',
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                ],
                removeButtons: 'Source,Save,NewPage,ExportPdf,Preview,Print,Templates,PasteFromWord,PasteText,Paste,Replace,Find,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,BidiLtr,BidiRtl,Language,Anchor,ShowBlocks,About'
            });
        },100);
    </script>
@endpush
