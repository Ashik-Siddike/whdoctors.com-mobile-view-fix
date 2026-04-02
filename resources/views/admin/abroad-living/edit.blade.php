@extends('admin.app')

@section('title')
    Edit abroad
@endsection

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card pb-5">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Edit abroad</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('abroad.index') }}">abroad</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit abroad</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('abroad.index') }}" class="add-new">abroad<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <form action="{{ route('abroad.update', ['id' => $abroad->id]) }}" method="POST" class="row g-3 mt-0">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="abroad_category_id" class="form-label custom-label">Abroad</label>
                                        <select class="form-control custom-input single-select2" name="abroad_category_id" required>
                                            <option value="" disabled selected> -- Select abroad --</option>
                                            @foreach ($abroadsCategory as $category)
                                                <option value="{{ $category->id }}" 
                                                    {{ isset($abroad) && $abroad->abroad_category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('abroad_category_id')
                                            <div class="error_msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title" class="form-label custom-label">Abroad Title</label>
                                        <input type="text" class="form-control custom-input" name="title" id="title" value="{{ old('title', $abroad->title) }}" required>
                                        @error('title')
                                            <div class="error_msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="subtitle" class="form-label custom-label">Abroad Subtitle</label>
                                        <input type="text" class="form-control custom-input" name="subtitle" id="subtitle" value="{{ old('subtitle', $abroad->subtitle) }}" required>
                                        @error('subtitle')
                                            <div class="error_msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="description" class="form-label custom-label">Abroad Description</label>
                                        <textarea name="description" class="form-control custom-input" id="description" rows="5" required>{{ old('description', $abroad->description) }}</textarea>
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

