@extends('admin.app')

@section('title')
conferences
@endsection

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card pb-5">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">conference</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('conferences') }}">Conference</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Create conference</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('conferences') }}" class="add-new">conferences<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <form action="{{ route('conferences.store') }}" method="POST" class="row g-3 mt-0">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-12">
                                        <label for="conference_category_id" class="form-label custom-label">conference</label>
                                        <select class="form-control custom-input single-select2" name="conference_category_id" required>
                                            <option value="" disabled selected> -- Select conference --</option>
                                            @foreach ($conferences as $conference)
                                                <option value="{{ $conference->id }}" {{ old('conference') == $conference->id ? 'selected' : '' }}>
                                                    {{ $conference->title }}  {{-- এখানে conference এর title দেখাবে --}}
                                                </option>
                                            @endforeach
                                        </select>


                                        @error('conference_category_id')
                                        <div class="error_msg">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="title" class="form-label custom-label">conference Title</label>
                                        <input type="text" class="form-control custom-input" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                                        @error('title')
                                        <div class="error_msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="subtitle" class="form-label custom-label">conference Subtitle</label>
                                        <input type="text" class="form-control custom-input" name="subtitle" id="subtitle" placeholder="Subtitle" value="{{ old('subtitle') }}">
                                        @error('subtitle')
                                        <div class="error_msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="description" class="form-label custom-label">conference Description</label>
                                        <textarea name="description" class="form-control custom-input" id="description" rows="5" style="resize: none; height: auto">{{ old('description') }}</textarea>
                                        @error('description')
                                        <div class="error_msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 px-0">
                                <div class="col-12 text-end px-0">
                                    <button type="submit" class="btn submit-button">
                                        Submit
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
