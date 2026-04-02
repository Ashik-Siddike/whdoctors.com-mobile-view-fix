@extends('admin.app')
@section('title')
    University
@endsection
@section('styles')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('content')

<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">University</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('university')}}">University</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Add University</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('university')}}" class="add-new">University List<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">
                    <form action="{{ route('university.store') }}" method="POST"
                    enctype="multipart/form-data" class="row g-3 mt-0">

                        @csrf
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="form-label custom-label">Type</label>
                                    <select class="form-control custom-input single-select2" name="type">
                                        <option value="" disabled selected> -- Select Type --</option>
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>
                                    </select>
                                    @if($errors->has('type'))
                                        <div class="error_msg">
                                            {{ $errors->first('type') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Name</label>
                                    <input type="text" class="form-control custom-input" name="name" placeholder="Name">
                                    @if($errors->has('name'))
                                        <div class="error_msg">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>

                            {{-- <div class="col-md-6">
                                <label for="" class="form-label custom-label">Country</label>
                                <select class="form-control custom-input single-select2" name="country_id" id="country-select">
                                    <option value="" disabled selected> -- Select Country --</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('country_id'))
                                    <div class="error_msg">
                                        {{ $errors->first('country_id') }}
                                    </div>
                                @endif

                                <!-- নিচে দেশের নাম দেখানোর জায়গা -->
                                <div id="selected-country" style="margin-top: 10px; font-weight: bold;"></div>
                            </div> --}}


                              <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Country</label>
                                   <select class="form-control custom-input" name="country_id" id="multiple-course1" multiple="multiple">
                                @foreach ($countries as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>

                                    @if($errors->has('country_id'))
                                        <div class="error_msg">
                                            {{ $errors->first('country_id') }}
                                        </div>
                                    @endif
                                </div>




                              <div class="col-md-12">
                                    <label for="" class="form-label custom-label">Course</label>
                                   <select class="form-control custom-input" name="course_id[]" id="multiple-course" multiple="multiple">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>

                                    @if($errors->has('course_id'))
                                        <div class="error_msg">
                                            {{ $errors->first('course_id') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Program</label>
                                    <input type="text" class="form-control custom-input" name="program" placeholder="Program">
                                    @if($errors->has('program'))
                                        <div class="error_msg">
                                            {{ $errors->first('program') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Tuition Fee</label>
                                    <input type="text" class="form-control custom-input" name="tuition_fee" placeholder="Tution Fee">
                                    @if($errors->has('tuition_fee'))
                                        <div class="error_msg">
                                            {{ $errors->first('tuition_fee') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Living Cost</label>
                                    <input type="text" class="form-control custom-input" name="living_cost" placeholder="Living Cost">
                                    @if($errors->has('living_cost'))
                                        <div class="error_msg">
                                            {{ $errors->first('living_cost') }}
                                        </div>
                                    @endif
                                </div>

                              <div class="col-md-6">
                                <label for="application_date" class="form-label custom-label">Application Date</label>
                                <input id="application_date" type="date" class="form-control custom-input" name="application_date" placeholder="Application Date">
                                @if($errors->has('application_date'))
                                    <div class="error_msg">{{ $errors->first('application_date') }}</div>
                                @endif
                            </div>


                                 <div class="col-md-6">
                                    <label for="application_date2" class="form-label custom-label">Application Date 2</label>
                                    <input id="application_date2" type="date" class="form-control custom-input" name="application_date_2" placeholder="Application Date_2">
                                    @if($errors->has('application_date2'))
                                        <div class="error_msg">
                                            {{ $errors->first('application_date_2') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <label for="application_date2" class="form-label custom-label">Application Date 3</label>
                                    <input id="application_date2" type="date" class="form-control custom-input" name="application_date_3" placeholder="Application Date 3">
                                    @if($errors->has('application_date_3'))
                                        <div class="error_msg">{{ $errors->first('application_date_3') }}</div>
                                    @endif
                                </div>
{{--
                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Meta Title</label>
                                    <input type="text" class="form-control custom-input" name="meta_title" placeholder="Meta Title">
                                    @if($errors->has('meta_title'))
                                        <div class="error_msg">
                                            {{ $errors->first('meta_title') }}
                                        </div>
                                    @endif
                                </div> --}}

                                {{-- meta_keyword --}}
                                {{-- <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Meta Keywords</label>
                                    <input type="text" class="form-control custom-input" name="meta_keywords" placeholder="Meta Keywords">
                                    @if($errors->has('meta_keywords'))
                                        <div class="error_msg">
                                            {{ $errors->first('meta_keywords') }}
                                        </div>
                                    @endif
                                </div> --}}

                                {{-- meta_description --}}
                                {{-- <div class="col-md-12">
                                    <label for="" class="form-label custom-label">Meta Description</label>
                                    <input type="text" class="form-control custom-input" name="meta_description" placeholder="Meta Description">
                                    @if($errors->has('meta_description'))
                                        <div class="error_msg">
                                            {{ $errors->first('meta_description') }}
                                        </div>
                                    @endif
                                </div> --}}

                                <div class="col-md-6 my-2">
                                    <input type="checkbox" class="form-check-input custom-checkbox" id="customCheckBox1" name="is_show_homepage">
                                    <label class="form-check-label custom-checkbox-label" for="customCheckBox1">Is Show Homepage</label>
                                </div>
                                <div class="col-md-6 my-2">
                                    <input type="checkbox" class="form-check-input custom-checkbox" id="customCheckBox1" name="is_partner">
                                    <label class="form-check-label custom-checkbox-label" for="customCheckBox1">Is Partner</label>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="form-label custom-label">Address</label>

                                    <textarea class="form-control custom-input" name="address" rows="5" id="address"  placeholder="Address"  style="resize: none; height: auto"></textarea>
                                    @if($errors->has('address'))
                                        <div class="error_msg">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>


                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="image-select-file">
                                        <label class="form-label custom-label" for="logo_image">
                                            <input type="hidden" id="logo_image_data" class="form-control custom-input" name="logo_image_data">
                                            <input type="file" id="logo_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                            <div class="user-image">
                                                <img id="logo_imagePreview" src="{{asset('admin/assets/images/default.jpg')}}" alt="" class="image-preview">
                                                <span class="formate-error logo_imageerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Logo</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="logo_imageDelete" onclick="removeImage('logo_image')">Remove image</div>

                                    @if($errors->has('image'))
                                        <div class="error_msg">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="image-select-file">
                                        <label class="form-label custom-label" for="cover_image">
                                            <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                                            <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="cover_image">
                                            <div class="user-image">
                                                <img id="cover_imagePreview" src="{{asset('admin/assets/images/default.jpg')}}" alt="" class="image-preview">
                                                <span class="formate-error cover_imageerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Cover Image</span>
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
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="image-select-file">
                                        <label class="form-label custom-label" for="meta_image">
                                            <input type="hidden" id="meta_image_data" class="form-control custom-input" name="meta_image_data">
                                            <input type="file" id="meta_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="meta_image">
                                            <div class="user-image">
                                                <img id="meta_imagePreview" src="{{asset('admin/assets/images/default.jpg')}}" alt="" class="image-preview">
                                                <span class="formate-error meta_imageerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Meta Image</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="meta_imageDelete" onclick="removeImage('meta_image')">Remove image</div>

                                    @if($errors->has('meta_image'))
                                        <div class="error_msg">
                                            {{ $errors->first('meta_image') }}
                                        </div>
                                    @endif
                                </div>

                            </div> --}}
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label custom-label">Application Requirements</label>

                            <textarea class="form-control custom-input" name="admission_requirements" id="admission-requirements" rows="5"  placeholder="Application Requirements"  style="resize: none; height: auto"></textarea>
                            @if($errors->has('admission_requirements'))
                                <div class="error_msg">
                                    {{ $errors->first('admission_requirements') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label custom-label">Description</label>
                            <textarea class="form-control custom-input" name="description" rows="5" id="description"  placeholder="Description"  style="resize: none; height: auto"></textarea>
                            @if($errors->has('description'))
                                <div class="error_msg">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
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
    <script script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
        $('#multiple-course1').select2({
            placeholder: "Select courses",
            allowClear: true
        });
    });

     $(document).ready(function() {
        $('#multiple-course').select2({
            placeholder: "Select courses",
            allowClear: true
        });
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



       function formatDate(date) {
    return moment(date).format('DD/MMM/YYYY'); // e.g. 23/May/2025
}

$('#datepicker, [name="application_date"],  [name="application_date_2"], [name="application_date_3"]').datepicker({
    autoclose: true,
    todayHighlight: true
}).on('changeDate', function (e) {
    const formatted = formatDate(e.date);
    $(this).val(formatted);
});






    </script>
@endpush
