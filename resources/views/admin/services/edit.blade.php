@extends('admin.app')
@section('title')
    Service
@endsection
@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card pb-5">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Service</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('services')}}">Service</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Service</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('services')}}" class="add-new">Service<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <form action="{{ route('service.update',['id' => $service->id]) }}" method="POST"
                        class="row g-3 mt-0">

                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="form-label custom-label custom-label">Category</label>
                                        <select class="form-control custom-input" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $service->category_id ? 'selected' : ' ' }}>{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category_id'))
                                            <div class="error_msg">
                                                {{ $errors->first('category_id') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label custom-label">Service Title</label>
                                        <input type="text" class="form-control custom-input" name="title" value="{{$service->title}}">
                                        @if($errors->has('title'))
                                            <div class="error_msg">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label custom-label">Service Subtitle</label>
                                        <input type="text" class="form-control custom-input" name="subtitle" value="{{$service->subtitle}}">
                                        @if($errors->has('subtitle'))
                                            <div class="error_msg">
                                                {{ $errors->first('subtitle') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                        <label for="" class="form-label custom-label custom-label">Service Description</label>
                                        
                                        <textarea name="description" class="form-control custom-input" id="description" rows="5" style="resize: none; height: auto">
                                            {{$service->description}}
                                        </textarea>
                                        @if($errors->has('description'))
                                            <div class="error_msg">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 px-0">
                                <div class="col-12 text-end px-0">
                                    <button type="submit" class="btn submit-button"> 
                                        Update
                                        <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                        </span>
                                    </button>
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
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>

    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        // ckeditor init js
        setTimeout(function(){
                CKEDITOR.replace('description', {
                    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
                });
            },100);
    </script>
@endpush
