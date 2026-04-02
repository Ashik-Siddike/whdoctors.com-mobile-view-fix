
<div class="study-in-australia-container03">
    {{-- a nav tab for private and public uiversity --}}

    <style>
        .nav-item{
            border: 1px solid #f5edd9!important;
            border-radius: 8px 8px 0 0;
        }
        .nav-link{
            color: #fff!important;
            cursor: pointer;
        }
        .active{
            background: #f5edd9!important;
            color: #EC2128;
        }






    </style>

    <div class="study-in-australia-container04">
        <ul class="nav nav-tabs" id="universityTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link active "
                    id="public-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#public-university"
                    type="button" role="tab"
                    aria-controls="public-university"
                    aria-selected="true"
                    style="font-family: 'Times New Roman', serif; color: black !important;"
                >
                    Public University
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link"
                    id="private-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#private-university"
                    type="button" role="tab"
                    aria-controls="private-university"
                    aria-selected="false"
                    style="font-family: 'Times New Roman', serif; color: black !important;"
                >
                    Private University
                </button>
            </li>
        </ul>

        <div class="tab-content" id="universityTabContent">
            <div
                class="tab-pane fade show active tab-block"
                id="public-university"
                role="tabpanel"
                aria-labelledby="public-tab"
            >
                @if($publicUniversities->count() > 0)
                    @include('frontend.includes.public-university')
                @else
                    <h2 style="color:black; margin-top: 10px; font-family: 'Times New Roman', serif;">
                        No Public University here
                    </h2>
                @endif
            </div>

            <div
                class="tab-pane fade tab-block"
                id="private-university"
                role="tabpanel"
                aria-labelledby="private-tab"
            >
                @if($privateUniversities->count() > 0)
                    @include('frontend.includes.privet-university')
                @else
                    <h2 style="color:black; margin-top: 10px; font-family: 'Times New Roman', serif;">
                        No Private University here
                    </h2>
                @endif
            </div>
        </div>
    </div>


    {{--  <div class="study-in-australia-container04">--}}
{{--    <div class="nav-tab">--}}
{{--        <ul class="nav nav-tabs" id="myTab" role="tablist">--}}
{{--            <li class="nav-item" role="presentation">--}}
{{--                <a class="nav-link tab-link active" data-id="public-university" style="font-family:Times New Roman;color:black !important">Public University</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item" role="presentation">--}}
{{--                <a class="nav-link tab-link" data-id="private-university" style="font-family:Times New Roman; color:black !important">Private University</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <div id="public-university" class="tab-block active">--}}
{{--            @if($publicUniversities->count() > 0)--}}
{{--                @include('frontend.includes.public-university')--}}
{{--            @else--}}
{{--                <h2 style="color:black !important; margin-top: 10px; font-family:Times New Roman">No Public University here</h2>--}}
{{--            @endif--}}
{{--        </div>--}}

{{--        <div id="private-university" class="tab-block">--}}
{{--            @if($privateUniversities->count() > 0)--}}
{{--                 @include('frontend.includes.privet-university')--}}
{{--            @else--}}
{{--                <h2 style="color:black !important; margin-top: 10px; font-family:Times New Roman">No Private University here</h2>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


  <div class="study-in-australia-container10">
    <div
      class="apply-now-form-container apply-now-form-root-class-name"
    >
      <form action="{{ route('apply.store.university') }}" method="POST" enctype="multipart/form-data" class="apply-now-form-form">
        @csrf

        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <input type="hidden" name="country" value="{{$country->name}}">
        <span class="apply-now-form-text"><span style="font-family:Times New Roman">Apply Now</span></span>
        <div class="apply-now-form-name">
          <span class="apply-now-form-text01"><span style="font-family:Times New Roman">Name*</span></span>
          <input
            type="text"
            enctype="Write your Name"
            placeholder="Write your Name"
            class="apply-now-form-input input"
            name="name"
          />
            @if($errors->has('name'))
                <div class="error_msg">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="apply-now-form-email">
          <span class="apply-now-form-text02">
            <span style="font-family:Times New Roman">email address*</span>
          </span>
          <input
            type="text"
            enctype="Write your Name"
            placeholder="Write your Email Address"
            class="apply-now-form-input1 input"\
            name="email"
          />
            @if($errors->has('email'))
                <div class="error_msg">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="apply-now-form-mobile">
          <span class="apply-now-form-text03">
            <span style="font-family:Times New Roman">Mobile no*</span>
          </span>
          <input
            type="text"
            enctype="Write your Name"
            placeholder="Write your Mobile No"
            class="apply-now-form-input2 input"
            name="phone"
          />
            @if($errors->has('phone'))
                <div class="error_msg">
                    {{ $errors->first('phone') }}
                </div>
            @endif
        </div>
        <div class="apply-now-form-address">
          <span class="apply-now-form-text04">
            <span style="font-family:Times New Roman">Address*</span>
          </span>
          <input
            type="text"
            enctype="Write your Name"
            placeholder="Write your Address"
            class="apply-now-form-input3 input"
            name="address"
          />
            @if($errors->has('address'))
                <div class="error_msg">
                    {{ $errors->first('address') }}
                </div>
            @endif
        </div>
        <div class="apply-now-form-passpoart-front">
            <span class="apply-now-form-text05">
                <span style="font-family:Times New Roman"> Upload passport front side</span>
            </span>
            <div class="image-select-file">
                <label class="form-label custom-label" for="logo_image">
                    <input type="hidden" id="logo_image_data" class="form-control custom-input" name="logo_image_data">
                    <input type="file" id="logo_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="passport_front_image">
                    <div class="user-image">
                        <span class="formate-error logo_imageerror"></span>
                    </div>
                    <span class="upload-btn" style="width:130px; font-family:Times New Roman">Upload Image</span>
                    <span id="logo_imageName"></span>
                </label>
            </div>

            @if($errors->has('passport_front_image'))
                <div class="error_msg">
                    {{ $errors->first('passport_front_image') }}
                </div>
            @endif
        </div>
        <div class="apply-now-form-passpoart-back">
            <span class="apply-now-form-text07">
                <span style="font-family:Times New Roman">Upload passport back side</span>
            </span>
            <div class="image-select-file">
                <label class="form-label custom-label" for="cover_image">
                    <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                    <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="passport_back_image">
                    <div class="user-image">
                        <span class="formate-error cover_imageerror"></span>
                    </div>
                    <span class="upload-btn" style="width:130px; font-family:Times New Roman">Upload Image</span>
                    <span id="cover_imageName"></span>
                </label>
            </div>

            {{-- <div class="delete-btn mt-2 d-none remove-image" id="cover_imageDelete" onclick="removeImage('cover_image')">Remove image</div> --}}

            @if($errors->has('passport_back_image'))
                <div class="error_msg">
                    {{ $errors->first('passport_back_image') }}
                </div>
            @endif
        </div>
        <div class="apply-now-form-documents">
            <span class="apply-now-form-text09">
                <span style="font-family:Times New Roman">Upload documents</span>
                <br />
            </span>
            <div class="image-select-file">
                <label class="form-label custom-label" for="document">
                    <input type="hidden" id="document_data" class="form-control custom-input" name="document_data">
                    <input type="file" id="document" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="document">
                    <span class="formate-error documenterror text-danger text-center"></span>
                    <span class="upload-btn" style="font-family:Times New Roman">Upload document</span>
                    <span id="documentName" class="text-dark text-center"></span>
                </label>
            </div>

            {{-- <div class="delete-btn mt-2 d-none remove-image" id="documentDelete" onclick="removeFile('document')">Remove file</div> --}}

            @if($errors->has('document'))
                <div class="error_msg">
                    {{ $errors->first('document') }}
                </div>
            @endif
        </div>
        <div class="apply-now-form-cv">
            <span class="apply-now-form-text13">
                <span style="font-family:Times New Roman">Upload your CV</span>
            </span>
            <div class="image-select-file">
                <label class="form-label custom-label" for="cv">
                    <input type="hidden" id="cv_data" class="form-control custom-input" name="cv_data">
                    <input type="file" id="cv" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="cv">

                    <span class="formate-error cverror text-danger text-center"></span>
                    <span class="upload-btn" style="font-family:Times New Roman">Upload CV</span>
                    <span id="cvName" class="text-dark text-center"></span>
                </label>
            </div>

            @if($errors->has('cv'))
                <div class="error_msg">
                    {{ $errors->first('cv') }}
                </div>
            @endif
        </div>

        <div class="apply-now-form-container10">
          <span class="apply-now-form-text16">
            <span style="font-family:Times New Roman">University Name</span>
          </span>
          <select class="apply-now-form-select1" name="university">
            <optio style="font-family:Times New Roman" disabled selected>----Select University----</option>
            @foreach ($universities as $university)
                <option style="font-family:Times New Roman" value="{{$university->name}}">{{$university->name}}</option>
            @endforeach
          </select>
          @if($errors->has('university'))
            <div class="error_msg">
                {{ $errors->first('university') }}
            </div>
        @endif
        </div>
        <div class="apply-now-form-container11">
          <span class="apply-now-form-text17">
            <span style="font-family:Times New Roman">Course Name</span>
          </span>
          <select class="apply-now-form-select2" name="course_name">
            <option style="font-family:Times New Roman" disabled selected>----Select Course----</option>
            @foreach ($courses as $course)
                <option style="font-family:Times New Roman" value="{{$course->name}}">{{$course->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="apply-now-form-container12">
          <span class="apply-now-form-text18"><span style="font-family:Times New Roman">Year</span></span>
          <select class="apply-now-form-select3" name="year">
            <option value="Option 1" style="font-family:Times New Roman">-- Select Year --</option>
            <option value="Option 1" style="font-family:Times New Roman">2023</option>
            <option value="Option 1" style="font-family:Times New Roman">2024</option>
            <option value="Option 1" style="font-family:Times New Roman">2025</option>
            <option value="Option 1" style="font-family:Times New Roman">2026</option>
            <option value="Option 2" style="font-family:Times New Roman">2027</option>
            <option value="Option 2" style="font-family:Times New Roman">2028</option>
            <option value="Option 2" style="font-family:Times New Roman">2029</option>
            <option value="Option 2" style="font-family:Times New Roman">2030</option>
            <option value="Option 3" style="font-family:Times New Roman">2031</option>
            <option value="Option 3" style="font-family:Times New Roman">2032</option>
            <option value="Option 3" style="font-family:Times New Roman">2033</option>
          </select>
        </div>
        <button type="submit" class="apply-now-form-button button">
          <span class="apply-now-form-text19">
            <span class="apply-now-form-text20" style="font-family:Times New Roman">Submit</span>
            <br />
          </span>
        </button>
      </form>

    </div>
  </div>

</div>


<style>
    /* .tab-block { display: none; }
    .tab-block.active { display: block; } */
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabBlocks = document.querySelectorAll('.tab-block');

        tabLinks.forEach(link => {
            link.addEventListener('click', function () {
                tabLinks.forEach(l => l.classList.remove('active'));
                tabBlocks.forEach(b => b.classList.remove('active'));

                this.classList.add('active');
                const tabId = this.getAttribute('data-id');
                const targetBlock = document.getElementById(tabId);
                if (targetBlock) targetBlock.classList.add('active');
            });
        });
    });
</script>

