@extends('admin.app')

@section('title')
Edit Office Section
@endsection

@section('content')

<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Edit Office Section</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('Office.index')}}">Office Section</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Edit Office Section</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('Office.index')}}" class="add-new">Office Section List<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>

                <div class="card-body custom-form">
                    <form action="{{ route('Office.update', $office->id) }}" method="POST"
                    enctype="multipart/form-data" class="row g-3 mt-0">

                        @csrf
                        @method('PUT') <!-- Specify the PUT method for updating the resource -->

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title" class="form-label custom-label">Title</label>
                                    <input type="text" class="form-control custom-input" name="title" placeholder="Title" value="{{ old('title', $office->title) }}">
                                    @if($errors->has('title'))
                                        <div class="error_msg">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="address" class="form-label custom-label">Address</label>
                                    <input type="text" class="form-control custom-input" name="address" placeholder="Address" value="{{ old('address', $office->address) }}">
                                    @if($errors->has('address'))
                                        <div class="error_msg">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label custom-label">Phone</label>
                                    <input type="text" class="form-control custom-input" name="phone" placeholder="Phone" value="{{ old('phone', $office->phone) }}">
                                    @if($errors->has('phone'))
                                        <div class="error_msg">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label custom-label">Email</label>
                                    <input type="text" class="form-control custom-input" name="email" placeholder="Email" value="{{ old('email', $office->email) }}">
                                    @if($errors->has('email'))
                                        <div class="error_msg">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="working_hour" class="form-label custom-label">Working Hours</label>
                                    <input type="text" class="form-control custom-input" name="working_hour" placeholder="Working Hours" value="{{ old('working_hour', $office->working_hour) }}">

                                    @if($errors->has('working_hour'))
                                        <div class="error_msg">
                                            {{ $errors->first('working_hour') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="status" class="form-label custom-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $office->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $office->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @if($errors->has('status'))
                                        <div class="error_msg">
                                            {{ $errors->first('status') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-12 text-center pt-3">
                                    <button type="submit" class="btn submit-button">
                                        Update
                                        <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                    </button>
                                </div>
                            </div>
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
        $('.submit-button').click(function() {
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>

    {{-- CKEditor --}}
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        setTimeout(function() {
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });
        }, 100);
    </script>
@endpush
