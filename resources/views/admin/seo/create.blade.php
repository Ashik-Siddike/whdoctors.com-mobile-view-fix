@extends('admin.app') {{-- আপনার অ্যাডমিন লেআউট --}}

@section('title')
    Create SEO Data
@endsection

@section('content')
<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="table-title">Create New SEO Data</div>
                        <a href="{{ route('seo-data.index') }}" class="btn btn-secondary btn-sm"> {{-- আপনার রুটের নাম সঠিক করুন --}}
                            <i class="ri-arrow-left-line"></i> Back to List
                        </a>
                    </div>
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

                    <form action="{{ route('seo-data.store') }}" method="POST" enctype="multipart/form-data"> {{-- আপনার রুটের নাম সঠিক করুন --}}
                        @csrf


                        <div class="mb-3 position-relative">
                        <label for="route_name" class="form-label">Route Name <span class="text-danger">*</span></label>

                        {{-- Input --}}
                        <input type="text" class="form-control mb-2" id="route_name" name="route_name" value="{{ old('route_name') }}" autocomplete="off" required oninput="filterRoutes(this.value)">

                        {{-- Suggestion box --}}
                        <ul class="list-group position-absolute w-100 z-3" id="routeSuggestions" style="max-height: 200px; overflow-y: auto; display: none;"></ul>

                        <div class="form-text">Type to search route names (e.g., 'home')</div>
                    </div>


                        <div class="mb-3">
                            <label for="seo_title" class="form-label">SEO Title</label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ old('seo_title') }}">
                            <div class="form-text">Optimal length: 50-60 characters.</div>
                        </div>


                        <div class="mb-3">
                            <label for="seo_keywords" class="form-label">SEO Keywords</label>
                            <input type="text" class="form-control" id="seo_keywords" name="seo_keywords" value="{{ old('seo_keywords') }}">
                            <div class="form-text">Comma-separated keywords (e.g., keyword1, keyword2, keyword3).</div>
                        </div>


                        <div class="mb-3">
                            <label for="seo_description" class="form-label">SEO Description</label>
                            <textarea class="form-control" id="seo_description" name="seo_description" rows="3">{{ old('seo_description') }}</textarea>
                            <div class="form-text">Optimal length: 150-160 characters.</div>
                        </div>

                        <div class="mb-3">
                            <label for="seo_image" class="form-label">SEO Image URL</label>
                            <input type="file" class="form-control" id="seo_image" name="seo_image" value="{{ old('seo_image') }}"> {{-- ✅ Correct version --}}

                            {{-- <input type="file" class="form-control" id="seo_image" name="seo_image" value="{{ old('seo_image') }}"> --}}
                            <div class="form-text">Enter the full URL of the image for social sharing (Open Graph image). Recommended size: 1200x630 pixels.</div>
                        </div>

                        {{-- অথবা যদি ইমেজ ফাইল আপলোড করতে চান --}}
                        {{-- <div class="mb-3">
                            <label for="seo_image_file" class="form-label">Upload SEO Image</label>
                            <input type="file" class="form-control" id="seo_image_file" name="seo_image_file" accept="image/*">
                            <div class="form-text">Recommended size: 1200x630 pixels. Max file size: 2MB.</div>
                        </div> --}}


                        <button type="submit" class="btn btn-primary">
                            <i class="ri-save-line"></i> Save SEO Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
{{-- যদি এই পেজের জন্য বিশেষ কোনো JS লাগে --}}
{{-- <script>
    // Example: Character counter for title and description
    function countChars(inputId, displayId, maxLength) {
        const input = document.getElementById(inputId);
        const display = document.getElementById(displayId);
        input.addEventListener('input', function() {
            const currentLength = this.value.length;
            display.textContent = currentLength + '/' + maxLength;
            if (currentLength > maxLength) {
                display.style.color = 'red';
            } else {
                display.style.color = 'inherit';
            }
        });
    }
    // countChars('seo_title', 'title_char_count', 60); // HTML এ <span id="title_char_count"></span> যোগ করতে হবে
    // countChars('seo_description', 'desc_char_count', 160); // HTML এ <span id="desc_char_count"></span> যোগ করতে হবে
</script> --}}

<script>
     // Pass the route names dynamically from backend to JS
    const allRoutes = @json($routeNames ?? []);
    const suggestionBox = document.getElementById('routeSuggestions');
    const input = document.getElementById('route_name');

    // Function to filter routes based on input
    function filterRoutes(value) {
        const filtered = allRoutes.filter(route => route.toLowerCase().includes(value.toLowerCase()));

        // Clear previous suggestions
        suggestionBox.innerHTML = '';

        // If there are no matches, hide the suggestion box
        if (value.trim() === '' || filtered.length === 0) {
            suggestionBox.style.display = 'none';
            return;
        }

        // Loop through filtered routes and add them to the suggestion box
        filtered.forEach(route => {
            const li = document.createElement('li');
            li.className = 'list-group-item list-group-item-action';
            li.textContent = route;

            // On click, set input value to selected route
            li.onclick = () => {
                input.value = route;
                suggestionBox.style.display = 'none';  // Hide the suggestions after selecting one
            };

            suggestionBox.appendChild(li);
        });

        // Show the suggestion box
        suggestionBox.style.display = 'block';
    }

    // Hide suggestion box when clicking outside the input or the suggestion box
    document.addEventListener('click', function (e) {
        if (!suggestionBox.contains(e.target) && e.target !== input) {
            suggestionBox.style.display = 'none';
        }
    });
</script>

@endpush
