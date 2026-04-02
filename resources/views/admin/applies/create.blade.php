@extends('admin.app')
@section('title')
    Apply
@endsection
@section('content')


<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Apply</div>
                        <nav aria-label="breadcrumb"> 
                            <ol class="breadcrumb mb-0"> 
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li> 
                                <li class="breadcrumb-item">
                                    <a href="{{route('applies')}}">Apply</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Create Page Content</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('applies')}}" class="add-new">Apply<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">
                    <form action="{{ route('apply.store') }}" method="POST"
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
                                    <label for="" class="form-label custom-label">Email</label>
                                    <input type="text" class="form-control custom-input" name="email" placeholder="Email">
                                    @if($errors->has('email'))
                                        <div class="error_msg">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Phone No</label>
                                    <input type="text" class="form-control custom-input" name="phone" placeholder="Phone">
                                    @if($errors->has('phone'))
                                        <div class="error_msg">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Address</label>
                                    <input type="text" class="form-control custom-input" name="address" placeholder="Address">
                                    @if($errors->has('address'))
                                        <div class="error_msg">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Country</label>
                                    <input type="text" class="form-control custom-input" name="country" placeholder="Country">
                                    @if($errors->has('country'))
                                        <div class="error_msg">
                                            {{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">University</label>
                                    <input type="text" class="form-control custom-input" name="university" placeholder="University">
                                    @if($errors->has('university'))
                                        <div class="error_msg">
                                            {{ $errors->first('university') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Course</label>
                                    <input type="text" class="form-control custom-input" name="course_name" placeholder="Course Name">
                                    @if($errors->has('course_name'))
                                        <div class="error_msg">
                                            {{ $errors->first('course_name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Year</label>
                                    <input type="text" class="form-control custom-input" name="year" placeholder="Year">
                                    @if($errors->has('year'))
                                        <div class="error_msg">
                                            {{ $errors->first('year') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <span class="form-label custom-label">Document</span>
                                    <div class="image-select-file">
                                        <label class="form-label custom-label" for="document">
                                            <input type="hidden" id="document_data" class="form-control custom-input" name="document_data">
                                            <input type="file" id="document" class="form-file-input form-control custom-input d-none" onchange="fileUpload(this)" name="document">
                                            <div class="file-image">
                                                <i id="documentPreview" class="ri-file-pdf-2-fill file-preview text-dark"></i>
                                            </div>
                                            <span class="formate-error documenterror text-danger text-center"></span>
                                            <span id="documentName" class="text-dark text-center"></span>
                                            <span class="upload-btn">Upload document</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="documentDelete" onclick="removeFile('document')">Remove file</div>

                                    @if($errors->has('document'))
                                        <div class="error_msg">
                                            {{ $errors->first('document') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <span class="form-label custom-label">CV</span>
                                    <div class="image-select-file">
                                        <label class="form-label custom-label" for="cv">
                                            <input type="hidden" id="cv_data" class="form-control custom-input" name="cv_data">
                                            <input type="file" id="cv" class="form-file-input form-control custom-input d-none" onchange="fileUpload(this)" name="cv">
                                            <div class="file-image">
                                                <i id="cvPreview" class="ri-pass-valid-fill file-preview text-dark"></i>
                                            </div>
                                            <span class="formate-error cverror text-danger text-center"></span>
                                            <span id="cvName" class="text-dark text-center"></span>
                                            <span class="upload-btn">Upload CV</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="cvDelete" onclick="removeFile('cv')">Remove file</div>

                                    @if($errors->has('cv'))
                                        <div class="error_msg">
                                            {{ $errors->first('cv') }}
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
                                            <input type="file" id="logo_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="passport_front_image">
                                            <div class="user-image">
                                                <img id="logo_imagePreview" src="{{asset('admin/assets/images/default.jpg')}}" alt="" class="image-preview">
                                                <span class="formate-error logo_imageerror"></span>
                                            </div>
                                            <span class="upload-btn" style="width:180px">Upload Passport Front Image</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="logo_imageDelete" onclick="removeImage('logo_image')">Remove image</div>

                                    @if($errors->has('passport_front_image'))
                                        <div class="error_msg">
                                            {{ $errors->first('passport_front_image') }}
                                        </div>
                                    @endif
                                </div>

                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="image-select-file">
                                        <label class="form-label custom-label" for="cover_image">
                                            <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                                            <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="passport_back_image">
                                            <div class="user-image">
                                                <img id="cover_imagePreview" src="{{asset('admin/assets/images/default.jpg')}}" alt="" class="image-preview">
                                                <span class="formate-error cover_imageerror"></span>
                                            </div>
                                            <span class="upload-btn" style="width:180px">Upload Passport Back Image</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="cover_imageDelete" onclick="removeImage('cover_image')">Remove image</div>

                                    @if($errors->has('passport_back_image'))
                                        <div class="error_msg">
                                            {{ $errors->first('passport_back_image') }}
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

    <script>
        var noImage = "text-dark";
        var selectedImage = "text-danger";
        function fileUpload( e ) {
            var imgPath = e.value;
            var ext = imgPath.substring( imgPath.lastIndexOf( '.' ) + 1 ).toLowerCase();
            if ( ext == "pdf" || ext == "docx" || ext == "doc") {
                readFileURL( e, e.id );
                $( '.' + e.id + 'error' ).hide()
                $( '#' + e.id + 'Delete' ).removeClass( 'd-none' );
                $( '#' + e.id + 'Preview' ).addClass( "text-success" );
                $( '#' + e.id + 'Preview' ).removeClass( "text-dark" );
                $( '.btn-submit' ).prop( "disabled", false );
            } else {
                $( '.' + e.id + 'error' ).html( 'Select a pdf, docx or doc type file.' ).show();
                $("#" + e.id + "_data").attr("value", "");
                $( '#' + e.id + 'Preview' ).addClass( "text-dark" );
                $( '#' + e.id + 'Preview' ).removeClass( "text-success" );
                $( '#' + e.id ).val( null );
                $( '#' + e.id + 'Delete' ).addClass( 'd-none' );
                $( '.btn-submit' ).prop( "disabled", true );
            } 
        }

        var imageName;
        function readFileURL( input, id ) {
            if ( input.files && input.files[ 0 ] ) {
                imageName = input.files[0].name;
                var reader = new FileReader();
                reader.readAsDataURL( input.files[ 0 ] );
                reader.onload = function ( e ) {
                    // $( '#' + id + 'Preview' ).attr( 'src', e.target.result ).show();
                    $( '#' + e.id + 'Preview' ).removeClass( "text-dark" );
                    $( '#' + e.id + 'Preview' ).addClass( "text-success" );

                    $( '#' + id + 'Delete' ).css( 'display', 'flex' );
                    $( '#' + id + 'Delete' ).removeClass( 'd-none' );
                    $( '#' + id + 'Name' ).html( input.files[ 0 ].name );
                    $("#" + id + "_data").attr("value", imageName);
                };
            }
        }
        function removeFile(id) {
            console.log("object");
            $( "#" + id ).val( null );
            // $( '#' + id + 'Preview' ).attr( 'src', noImage  );
            $( '#' + id + 'Preview' ).addClass("text-dark");
            $( '#' + id + 'Preview' ).removeClass("text-success");
            $( "#" + id + "_data").attr("value", "");
            $( '#' + id + 'Name' ).html( '' );
            $( '#' + id + 'Delete' ).css( 'display', 'none' );
            $( '#' + id + 'Delete' ).addClass( 'd-none' );
        }
    </script>
@endpush
