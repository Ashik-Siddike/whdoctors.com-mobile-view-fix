@extends('admin.app')

@section('title')
    Edit conference
@endsection

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card pb-5">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Edit Conference</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('conferences') }}">conference</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit conference</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('conferences') }}" class="add-new">conference<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <form action="{{ route('conferences.update',['id' =>  $conference->id]) }}" method="POST" class="row g-3 mt-0">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="conference_category_id" class="form-label custom-label">conferences</label>
                                        <select class="form-control custom-input single-select2" name="conference_category_id" required>
                                            <option value="" disabled> -- Select conferences --</option>
                                            @foreach ($conferences as $category)
                                                <option value="{{ $category->id }}" {{ $category->conference_category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('conference_category_id')
                                        <div class="error_msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title" class="form-label custom-label">conference Title</label>
                                        <input type="text" class="form-control custom-input" name="title" id="title" value="{{ old('title', $conference->title) }}" required>
                                        @error('title')
                                        <div class="error_msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="subtitle" class="form-label custom-label">conference Subtitle</label>
                                        <input type="text" class="form-control custom-input" name="subtitle" id="subtitle" value="{{ old('subtitle', $conference->subtitle) }}" required>
                                        @error('subtitle')
                                        <div class="error_msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="description" class="form-label custom-label">conference Description</label>
                                        <textarea name="description" class="form-control custom-input" id="description" rows="5" required>{{ old('description', $conference->description) }}</textarea>
                                        @error('description')
                                        <div class="error_msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 px-0">
                                <div class="col-12 text-end px-0">
                                    <button type="submit" class="btn submit-button">
                                        Update
                                        <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
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
        $('.submit-button').click(function() {
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        setTimeout(function() {
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });
        });
    </script>
@endpush

