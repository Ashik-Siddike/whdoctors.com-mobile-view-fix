@extends('admin.app')

@section('title')
    Edit SEO Data
@endsection

@section('content')
<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="table-title">Edit SEO Data</div>
                    <a href="{{ route('seo-data.index') }}" class="btn btn-secondary btn-sm">
                        <i class="ri-arrow-left-line"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                   <form action="{{ route('seo-data.update', $seoData->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="mb-3 position-relative">
                            <label for="route_name" class="form-label">Route Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-2" id="route_name" name="route_name"
                                value="{{ old('route_name', $seoData->route_name) }}" autocomplete="off" required oninput="filterRoutes(this.value)">
                            <ul class="list-group position-absolute w-100 z-3" id="routeSuggestions" style="max-height: 200px; overflow-y: auto; display: none;"></ul>
                            <div class="form-text">Type to search route names (e.g., 'home')</div>
                        </div>

                        <div class="mb-3">
                            <label for="seo_title" class="form-label">SEO Title</label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title"
                                value="{{ old('seo_title', $seoData->seo_title) }}">
                            <div class="form-text">Optimal length: 50–60 characters.</div>
                        </div>

                        <div class="mb-3">
                            <label for="seo_keywords" class="form-label">SEO Keywords</label>
                            <input type="text" class="form-control" id="seo_keywords" name="seo_keywords"
                                value="{{ old('seo_keywords', $seoData->seo_keywords) }}">
                            <div class="form-text">Comma-separated keywords (e.g., keyword1, keyword2, keyword3).</div>
                        </div>

                        <div class="mb-3">
                            <label for="seo_description" class="form-label">SEO Description</label>
                            <textarea class="form-control" id="seo_description" name="seo_description" rows="3">{{ old('seo_description', $seoData->seo_description) }}</textarea>
                            <div class="form-text">Optimal length: 150–160 characters.</div>
                        </div>

                        <div class="mb-3">
                            <label for="seo_image" class="form-label">Upload SEO Image</label>
                            <input type="file" class="form-control" id="seo_image" name="seo_image">
                            <div class="form-text">Recommended: 1200x630px. Max size: 2MB.</div>

                            @if ($seoData->seo_image)
                                <div class="mt-2">
                                    <p>Current Image:</p>
                                    <img src="{{ asset('uploads/' . $seoData->seo_image) }}" alt="SEO Image" style="max-height: 150px;">
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="ri-save-line"></i> Update SEO Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script>
    const allRoutes = @json($routeNames ?? []);
    const suggestionBox = document.getElementById('routeSuggestions');
    const input = document.getElementById('route_name');

    function filterRoutes(value) {
        const filtered = allRoutes.filter(route => route.toLowerCase().includes(value.toLowerCase()));
        suggestionBox.innerHTML = '';

        if (value.trim() === '' || filtered.length === 0) {
            suggestionBox.style.display = 'none';
            return;
        }

        filtered.forEach(route => {
            const li = document.createElement('li');
            li.className = 'list-group-item list-group-item-action';
            li.textContent = route;
            li.onclick = () => {
                input.value = route;
                suggestionBox.style.display = 'none';
            };
            suggestionBox.appendChild(li);
        });

        suggestionBox.style.display = 'block';
    }

    document.addEventListener('click', function (e) {
        if (!suggestionBox.contains(e.target) && e.target !== input) {
            suggestionBox.style.display = 'none';
        }
    });
</script>
@endpush
