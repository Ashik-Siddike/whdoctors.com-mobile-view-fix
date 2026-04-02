
<div class="study-in-australia-container03">
  <div class="study-in-australia-container04">
    <div class="study-in-australia-container05">
      <div class="study-in-australia-container06">

        <div class="study-in-australia-container08">
            <span class="study-in-australia-text109">
                <span class="study-in-australia-text039"><b>Name : </b></span>
                <span>
                {{ $university->name }}
                </span>
                <br />
            </span>
            <span class="study-in-australia-text109">
                <span class="study-in-australia-text039"><b>Program : </b></span>
                <span>
                {{ $university->program }}
                </span>
                <br />
            </span>
            <span class="study-in-australia-text109">
                <span class="study-in-australia-text039"><b>Tuition Fee : </b></span>
                <span>
                {{ $university->tuition_fee }}
                </span>
                <br />
            </span>
            {{-- if $courses has atleast one course --}}
            @if ($courses->count() > 0)
                <span class="study-in-australia-text109">
                    <span class="study-in-australia-text039"><b>Course : </b></span>
                    <span>
                    @foreach ($courses as $course)
                        {{ $course->name }}
                        @if ($loop->last)
                            .
                            @break
                        @endif
                        ,
                    @endforeach
                    </span>
                    <br />
                </span>
            @endif
        </div>

        @if ($university -> admission_requirements != null)
            <div class="study-in-australia-container08">
                <span class="study-in-australia-text038">
                    <span class="study-in-australia-text039">Admission Requirements</span>
                    <br class="study-in-australia-text051" />
                </span>
                <span class="study-in-australia-text109">

                    <span>
                    {!! $university->admission_requirements !!}
                    </span>
                    <br />

                    <br />
                </span>
            </div>
        @endif

        @if ($university -> address != null)
            <div class="study-in-australia-container09">
            <span class="study-in-australia-text081">

                <span>Address</span>
                <br class="study-in-australia-text108" />
                <span class="study-in-australia-text109">
                {!! $university -> address  !!}
                </span>
                <span class="study-in-australia-text110"></span>
                <br class="study-in-australia-text111" />
            </span>
            </div>
        @endif

        @if ($university -> description != null)
            <div class="study-in-australia-container09">
            <span class="study-in-australia-text081">

                <span>Description</span>
                <br class="study-in-australia-text108" />
                <span class="study-in-australia-text109">
                {!! $university -> description  !!}
                </span>
                <span class="study-in-australia-text110"></span>
                <br class="study-in-australia-text111" />
            </span>
            </div>
        @endif
      </div>
    </div>




  </div>
  <div class="study-in-australia-container10">
    <div
      class="apply-now-form-container apply-now-form-root-class-name"
    >
      <form action="{{ route('apply.store.university') }}" method="POST" enctype="multipart/form-data" class="apply-now-form-form" style="margin-top: 0px">
        @csrf
        <input type="hidden" name="country" value="{{$country->name}}">
        <span class="apply-now-form-text"><span>Apply Now</span></span>
        <div class="apply-now-form-name">
          <span class="apply-now-form-text01"><span>Name*</span></span>
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
            <span>email address*</span>
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
            <span>Mobile no*</span>
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
            <span>Address*</span>
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
                <span>Upload passport front side</span>
            </span>
            <div class="image-select-file">
                <label class="form-label custom-label" for="logo_image">
                    <input type="hidden" id="logo_image_data" class="form-control custom-input" name="logo_image_data">
                    <input type="file" id="logo_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="passport_front_image">
                    <div class="user-image">
                        <span class="formate-error logo_imageerror"></span>
                    </div>
                    <span class="upload-btn" style="width:130px">Upload Image</span>
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
                <span>Upload passport back side</span>
            </span>
            <div class="image-select-file">
                <label class="form-label custom-label" for="cover_image">
                    <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                    <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="passport_back_image">
                    <div class="user-image">
                        <span class="formate-error cover_imageerror"></span>
                    </div>
                    <span class="upload-btn" style="width:130px">Upload Image</span>
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
                <span>Upload documents</span>
                <br />
            </span>
            <div class="image-select-file">
                <label class="form-label custom-label" for="document">
                    <input type="hidden" id="document_data" class="form-control custom-input" name="document_data">
                    <input type="file" id="document" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="document">
                    <span class="formate-error documenterror text-danger text-center"></span>
                    <span class="upload-btn">Upload document</span>
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
                <span>Upload your CV</span>
            </span>
            <div class="image-select-file">
                <label class="form-label custom-label" for="cv">
                    <input type="hidden" id="cv_data" class="form-control custom-input" name="cv_data">
                    <input type="file" id="cv" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="cv">

                    <span class="formate-error cverror text-danger text-center"></span>
                    <span class="upload-btn">Upload CV</span>
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
            <span>University Name</span>
          </span>
          <select class="apply-now-form-select1" name="university">
            <option disabled selected>----Select University----</option>
            @foreach ($universities as $university)
                <option value="{{$university->name}}">{{$university->name}}</option>
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
            <span>Course Name</span>
          </span>
          <select class="apply-now-form-select2" name="course_name">
            <option disabled selected>----Select Course----</option>
            @foreach ($courses as $course)
                <option value="{{$course->name}}">{{$course->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="apply-now-form-container12">
          <span class="apply-now-form-text18"><span>Year</span></span>
          <select class="apply-now-form-select3" name="year">
            <option value="Option 1">-- Select Year --</option>
            <option value="Option 1">2023</option>
            <option value="Option 1">2024</option>
            <option value="Option 1">2025</option>
            <option value="Option 1">2026</option>
            <option value="Option 2">2027</option>
            <option value="Option 2">2028</option>
            <option value="Option 2">2029</option>
            <option value="Option 2">2030</option>
            <option value="Option 3">2031</option>
            <option value="Option 3">2032</option>
            <option value="Option 3">2033</option>
          </select>
        </div>
        <button type="submit" class="apply-now-form-button button">
          <span class="apply-now-form-text19">
            <span class="apply-now-form-text20">Submit</span>
            <br />
          </span>
        </button>
      </form>
    </div>
  </div>

</div>
