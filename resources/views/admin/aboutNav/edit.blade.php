@extends('admin.app')
@section('title')
Edit aboutNav
@endsection
@section('content')

<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Edit aboutNav</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('aboutNav.index')}}">aboutNav</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Edit aboutNav</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{route('aboutNav.index')}}" class="add-new">aboutNav List<i class="ms-1 ri-list-ordered-2"></i></a>
                </div>

                <div class="card-body custom-form">
                    <form action="{{ route('aboutNav.update', $aboutNav->id) }}" method="POST" enctype="multipart/form-data" class="row g-3 mt-0">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="form-label custom-label">Title</label>
                                    <input type="text" class="form-control custom-input" name="title" value="{{ old('title', $aboutNav->title) }}" placeholder="Title">
                                    @error('title')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label custom-label">Subtitle</label>
                                    <input type="text" class="form-control custom-input" name="subtitle" value="{{ old('subtitle', $aboutNav->subtitle) }}" placeholder="Subtitle">
                                    @error('subtitle')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label custom-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ old('status', $aboutNav->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $aboutNav->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label custom-label">Description</label>
                                    <textarea name="description" class="form-control custom-input" id="description" rows="5" style="resize: none; height: auto">{{ old('description', $aboutNav->description) }}</textarea>
                                    @error('description')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
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
