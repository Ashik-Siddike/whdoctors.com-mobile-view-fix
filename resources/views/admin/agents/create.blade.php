@extends('admin.app')
@section('title')
    Agent
@endsection
@push('custom-style')
    <style>
        .content-body .table-card .custom-form .id-card-image .custom-label .user-image .no-image-preview {
            font-size: 75px;
            line-height: 1;
            height: auto;
            width: auto;
            padding: 0 10px;
            border: 3px solid rgba(132, 90, 223, 0.5);
            border-radius: 0;
            text-align: center;
            color: rgba(132, 90, 223, 0.5);
            margin-bottom: 16px;
        }

        .content-body .table-card .custom-form .id-card-image .custom-label .user-image .image-preview {
            height: 65px;
            width: 125px;
            -o-object-fit: cover;
            object-fit: cover;
            border: 3px solid rgba(132, 90, 223, 0.5);
            border-radius: 0;
            padding: 0;
            text-align: center;
            color: rgba(132, 90, 223, 0.5);
            margin-bottom: 0;
        }
        .content-body .table-card .custom-form .id-card-image .custom-label .upload-btn {
            margin-top: 8px;
        }
    </style>
    
@endpush
@section('content')

    <div class="container-fluid my-4">
        <form action="{{ route('agent.store') }}" method="POST"  enctype="multipart/form-data" autocomplete="off">
        @csrf
            <div class="row">
                <div class="col-8">
                    <div class="card table-card">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Agent</div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{route('agent')}}">Agent</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"> Create Agent</li>
                                    </ol>
                                </nav>
                            </div>
                            <a href="{{route('agent')}}" class="add-new">Agent List<i class="ms-1 ri-list-ordered-2"></i></a>
                        </div>
                        <div class="card-body custom-form">
                            
                            <div class="row">



                                <div class="col-md-6">
                                    <label for="name" class="form-label custom-label">Name</label>
                                    <input type="text" class="form-control custom-input" name="name" placeholder="Name" id="name">
                                    @if($errors->has('name'))
                                        <div class="error_msg">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label custom-label">Email</label>
                                    <input type="email" class="form-control custom-input" name="email" placeholder="Email" id="email">
                                    @if($errors->has('email'))
                                        <div class="error_msg">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>

                                
                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Phone No</label>
                                    <input type="text" class="form-control custom-input" name="phone" placeholder="Phone No">
                                    @if($errors->has('phone'))
                                        <div class="error_msg">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Commission Rate</label>
                                    <input type="number" class="form-control custom-input" name="commission_rate" placeholder="Commission Rate">
                                    @if($errors->has('commission_rate'))
                                        <div class="error_msg">
                                            {{ $errors->first('commission_rate') }}
                                        </div>
                                    @endif
                                </div>

                                

                                {{-- n_id --}}
                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">NID</label>
                                    <input type="text" class="form-control custom-input" name="n_id" placeholder="NID">
                                    @if($errors->has('n_id'))
                                        <div class="error_msg">
                                            {{ $errors->first('n_id') }}
                                        </div>
                                    @endif
                                </div>

                                {{-- date_of_birth --}}
                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Date of Birth</label>
                                    <input type="date" class="form-control custom-input" name="date_of_birth" placeholder="Date of Birth">
                                    @if($errors->has('date_of_birth'))
                                        <div class="error_msg">
                                            {{ $errors->first('date_of_birth') }}
                                        </div>
                                    @endif
                                </div>



                                <div class="col-12">
                                    <label for="" class="form-label custom-label">Address</label>
                                    <textarea class="form-control custom-input" name="address" rows="5"  placeholder="Address"  style="resize: none; height: auto"></textarea>
                                    @if($errors->has('address'))
                                        <div class="error_msg">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-12">
                                    <label for="" class="form-label custom-label">Details</label>
                                    <textarea class="form-control custom-input" name="details" rows="5"  placeholder="Details"  style="resize: none; height: auto"></textarea>
                                    @if($errors->has('details'))
                                        <div class="error_msg">
                                            {{ $errors->first('details') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                

                <div class="col-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">Action</div>
                                </div>
                                <div class="custom-form card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn save-button">Save
                                                <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                                </span>
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{route('agent')}}" class="btn leave-button">Leave</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">Profile Image</div>
                                </div>
                                <div class="custom-form card-body">
                                    <div class="image-select-file">
                                        <label class="form-label custom-label" for="image">
                                            <input type="hidden" id="image_data" class="form-control custom-input" name="image_data">
                                            <input type="file" id="image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                            <div class="user-image">
                                                <img id="imagePreview" src="{{asset('admin/assets/images/default.jpg')}}" alt="" class="image-preview">
                                                <span class="formate-error imageerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Iamge</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="imageDelete" onclick="removeImage('image')">Remove image</div>

                                    @if($errors->has('image'))
                                        <div class="error_msg">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-xxl-6 col-lg-12">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">Id Card Front Image</div>
                                </div>
                                <div class="custom-form card-body">
                                    <div class="image-select-file id-card-image">
                                        <label class="form-label custom-label" for="id_card_front_image">
                                            <input type="hidden" id="id_card_front_image_data" class="form-control custom-input" name="id_card_front_image_data">
                                            <input type="file" id="id_card_front_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="id_card_front_image">
                                            <div class="user-image" style="height: 100px">
                                                <img id="id_card_front_imagePreview" src="{{asset('admin/assets/images/nid.png')}}" alt="" class="image-preview">
                                                <span class="formate-error id_card_front_imageerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Iamge</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="id_card_front_imageDelete" onclick="removeImage('id_card_front_image')">Remove image</div>

                                    @if($errors->has('id_card_front_image'))
                                        <div class="error_msg">
                                            {{ $errors->first('id_card_front_image') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-12">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">Id Card Back Image</div>
                                </div>
                                <div class="custom-form card-body">
                                    <div class="image-select-file id-card-image">
                                        <label class="form-label custom-label" for="id_card_back_image">
                                            <input type="hidden" id="id_card_back_image_data" class="form-control custom-input" name="id_card_back_image_data">
                                            <input type="file" id="id_card_back_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="id_card_back_image">
                                            <div class="user-image" style="height: 100px">
                                                <img id="id_card_back_imagePreview" src="{{asset('admin/assets/images/nid.png')}}" alt="" class="image-preview">
                                                <span class="formate-error id_card_back_imageerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Iamge</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="id_card_back_imageDelete" onclick="removeImage('id_card_back_image')">Remove image</div>

                                    @if($errors->has('id_card_back_image'))
                                        <div class="error_msg">
                                            {{ $errors->first('id_card_back_image') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>


            </div>
        </form>
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

    
    {{-- image upload and preview js --}}
    <script>
        function imageUpload( e ) {
            var imgPath = e.value;
            var ext = imgPath.substring( imgPath.lastIndexOf( '.' ) + 1 ).toLowerCase();
            if ( ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
                readURL( e, e.id );
                $( '.' + e.id + 'error' ).hide()
                $( '#' + e.id + 'Delete' ).removeClass( 'd-none' );
            } else {
                $( '.' + e.id + 'error' ).html( 'Select a jpg, jpeg, png type image file.' ).show();
                $("#" + e.id + "_data").attr("value", "");
                $( '#' + e.id + 'Preview' ).attr( 'src', "" );
                $( '#' + e.id ).val( null );
                $( '#' + e.id + 'Delete' ).addClass( 'd-none' );
            }
        }

        var imageName;
        function readURL( input, id ) {
            if ( input.files && input.files[ 0 ] ) {
                imageName = input.files[0].name;
                var reader = new FileReader();
                reader.readAsDataURL( input.files[ 0 ] );
                reader.onload = function ( e ) {
                    $( '#' + id + 'Preview' ).attr( 'src', e.target.result ).show();
                    $( '#' + id + 'Delete' ).css( 'display', 'flex' );
                    $( '#' + id + 'Delete' ).removeClass( 'd-none' );
                    $( '#' + id + 'Name' ).html( input.files[ 0 ].name );
                    $("#" + id + "_data").attr("value", imageName);
                };
            }
        }
        function removeImage(id) {
            var noImage = "{{asset('admin/assets/images/default.jpg')}}";
            $( "#" + id ).val( null );
            $( '#' + id + 'Preview' ).attr( 'src', noImage  );
            $( "#" + id + "_data").attr("value", "");
            $( '#' + id + 'Name' ).html( 'Not selected' );
            $( '#' + id + 'Delete' ).css( 'display', 'none' );
            $( '#' + id + 'Delete' ).addClass( 'd-none' );
        }
    </script>


@endpush
