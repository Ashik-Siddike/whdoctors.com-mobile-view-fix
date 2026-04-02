@extends('admin.app')
@section('title')
    Subpage
@endsection
@section('content')


<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Subpage</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('subpage')}}">Subpage</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Create Subpage</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('subpage')}}" class="add-new">Subpage<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>
                <div class="card-body custom-form">
                    <form action="{{ route('subpage.store') }}" method="POST" class="row g-3 mt-0">
                        @csrf
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="page_id" class="form-label custom-label">Page</label>
                                    <select class="form-control custom-input" name="page_id" id="page_id">
                                        <option value="" disabled selected>-- Select Page --</option>
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}" {{ old('page_id') == $page->id ? 'selected' : '' }}>
                                                {{ $page->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('page_id'))
                                        <div class="error_msg">
                                            {{ $errors->first('page_id') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <label for="name" class="form-label custom-label"> Name </label>
                                    <input type="text" class="form-control custom-input" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="error_msg">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>



                                <div class="col-md-12">
                                    <label for="content" class="form-label custom-label">Subpage Content</label>
                                    <textarea class="form-control custom-input" name="content" id="content" rows="5" placeholder="Description">{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                        <div class="error_msg">
                                            {{ $errors->first('content') }}
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

    {{-- CK Editor --}}
    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        setTimeout(function(){
            CKEDITOR.replace('content', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        },100);
    </script>
@endpush
