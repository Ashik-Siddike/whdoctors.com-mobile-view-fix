@extends('admin.app')
@section('title')
aboutNav
@endsection
@section('content')

<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">aboutNav</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('aboutNav.index')}}">aboutNav</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Add aboutNav</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('aboutNav.index')}}" class="add-new">aboutNav List<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">
                    <form action="{{ route('aboutNav.store') }}" method="POST"
                    enctype="multipart/form-data" class="row g-3 mt-0">

                        @csrf
                        <div class="col-md-12">
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
                                    <label for="status" class="form-label custom-label">Status</label>
                                    <select name="status" id="status" class="form-control" >
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @if($errors->has('status'))
                                        <div class="error_msg">
                                            {{ $errors->first('status') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label for="description" class="form-label custom-label"> Description</label>
                                    <textarea name="description" class="form-control custom-input" id="description" rows="5" style="resize: none; height: auto">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- <div class="col-md-6">
                                    <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                                    <div class="col-sm-6">
                                        <select name="status" id="status" class="form-control" >
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div> --}}




                        <div class="col-12 text-center pt-3">
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

{{--
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
@endpush --}}


@push('custom-scripts')
    <script>
        $('.submit-button').click(function() {
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>

    {{-- CK Editor --}}
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        // CKEditor initialization
        setTimeout(function() {
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });
        });


    </script>
@endpush
