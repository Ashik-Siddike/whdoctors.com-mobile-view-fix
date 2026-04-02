@extends('admin.app')
@section('title')
    Employee
@endsection
@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Employee</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('employee')}}">Employee</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Employee</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{route('employee')}}" class="add-new">Employee List<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <form action="{{ route('employee.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="row g-3 mt-0">

                            @csrf

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label custom-label">Name</label>
                                        <input type="text" class="form-control custom-input" name="name" value="{{$user->name}}">
                                        @if($errors->has('name'))
                                            <div class="error_msg">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Email</label>
                                        <input type="email" class="form-control custom-input" name="email" value={{$user->email}}>
                                        @if($errors->has('email'))
                                            <div class="error_msg">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Password</label>
                                        <input type="password" class="form-control custom-input" name="password" placeholder="Password">
                                        @if($errors->has('password'))
                                            <div class="error_msg">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Confirm Password</label>
                                        <input type="password" class="form-control custom-input" name="password_confirmation" placeholder="Confirm Password">
                                        @if($errors->has('password_confirmation'))
                                            <div class="error_msg">
                                                {{ $errors->first('password_confirmation') }}
                                            </div>
                                        @endif
                                    </div>


                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Phone No</label>
                                        <input type="text" class="form-control custom-input" name="phone_no" value="{{$user->phone_no}}">
                                        @if($errors->has('phone_no'))
                                            <div class="error_msg">
                                                {{ $errors->first('phone_no') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Designation</label>
                                        <input type="text" class="form-control custom-input" name="designation" value="{{$user->designation}}">
                                        @if($errors->has('designation'))
                                            <div class="error_msg">
                                                {{ $errors->first('designation') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <label for="" class="form-label custom-label">Employee</label> 

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="is_employee" {{ $user->is_employee == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineCheckbox1">Is Employee</label>
                                        </div>
                                        @if($errors->has('is_employee'))
                                            <div class="error_msg">
                                                {{ $errors->first('is_employee') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Facebook Link</label>
                                        <input type="text" class="form-control custom-input" name="facebook_link" value="{{$user->facebook_link}}" placeholder="Facebook Link">
                                        @if($errors->has('facebook_link'))
                                            <div class="error_msg">
                                                {{ $errors->first('facebook_link') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Twitter Link</label>
                                        <input type="text" class="form-control custom-input" name="twitter_link" value="{{$user->twitter_link}}" placeholder="Twitter Link">
                                        @if($errors->has('twitter_link'))
                                            <div class="error_msg">
                                                {{ $errors->first('twitter_link') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Instagram Link</label>
                                        <input type="text" class="form-control custom-input" name="instagram_link" value="{{$user->instagram_link}}" placeholder="Instagram Link">
                                        @if($errors->has('instagram_link'))
                                            <div class="error_msg">
                                                {{ $errors->first('instagram_link') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Linkdin Link</label>
                                        <input type="text" class="form-control custom-input" name="linkdin_link" value="{{$user->linkdin_link}}" placeholder="Linkdin Link">
                                        @if($errors->has('linkdin_link'))
                                            <div class="error_msg">
                                                {{ $errors->first('linkdin_link') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Address</label>
                                        <textarea class="form-control custom-input" name="address" rows="5"  placeholder="Address"  style="resize: none; height: auto">{{$user->address}}</textarea>
                                        @if($errors->has('address'))
                                            <div class="error_msg">
                                                {{ $errors->first('address') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label">Description</label>
                                        <textarea class="form-control custom-input" name="description" rows="5"  placeholder="Description"  style="resize: none; height: auto">{{$user->description}}</textarea>
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
                                            <p>Profile Image</p>
                                            <label class="form-label custom-label" for="cover_image">
                                                <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                                                <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                                <div class="user-image">
                                                    <img id="cover_imagePreview" src="{{ $user->image ? asset($user->image) : asset('admin/assets/images/default.jpg') }}" alt="" class="image-preview">
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
            // $(this).css('width', '90px');
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>
@endpush
