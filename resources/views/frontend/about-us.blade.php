<!DOCTYPE html>
<html lang="en">
  <head>
    <title>About-Us - {{ getContentData(83, 'title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />


    <!-- Meta data -->
    <meta name="author" content="WH Doctors" />
    <meta name="title" content="{{ trim($seo->seo_title) }}"/>
    <meta name="description" content="{{ trim($seo->seo_description) }}"/>
    <meta name="keywords" content="{{ trim($seo->seo_keywords) }}">
    <link rel="image_src" href="{{ asset(trim($seo->seo_image)) }}"/>





    @include('frontend.includes.favicon')
    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.55;
        color: var(--dl-color-gray-900);
        background-color: var(--dl-color-gray-white);
      }

      @media screen and (max-width: 768px) {
    .header-header {
        padding-left: 20px !important;
        padding-right: 20px !important;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
}

@media(max-width: 1600px) {
  .about-us-container {
    width: 90%;
    margin: 0 auto;
    padding: var(--dl-space-space-doubleunit);
  }
  .about-us-image {
    max-width: 200px;
  }
}

@media(max-width: 1200px) {
  .about-us-about-menu {
    flex-wrap: wrap;
    gap: var(--dl-space-space-halfunit);
  }
  .about-us-container06,
  .about-us-container12,
  .about-us-container17 {
    width: 80%;
  }
}

@media(max-width: 991px) {
  .about-us-hero {
    flex-direction: column;
    height: auto;
  }
  .about-us-container06,
  .about-us-container12,
  .about-us-container17 {
    width: 100%;
    align-items: center;
  }
  .about-us-text-block {
    text-align: justify;
    padding: 0 var(--dl-space-space-unit);
  }
}

@media(max-width: 768px) {
  .about-us-main {
    padding: 0 var(--dl-space-space-unit);
  }
  .about-us-image {
    width: 100%;
    margin-bottom: var(--dl-space-space-unit);
  }
  .about-us-text {
    font-size: clamp(2rem, 5vw, 3.5rem);
  }
  .about-us-main {
    padding: 0 var(--dl-space-space-unit);
  }

  .about-us-container05 {
    width: 100%;
    height: auto;
    flex-direction: column;
    align-items: center; /* পরিবর্তন করেছি: কেন্দ্র করে দেখানোর জন্য */
    justify-content: center;
    padding: var(--dl-space-space-unit);
    gap: var(--dl-space-space-unit); /* আইটেমগুলোর মধ্যে ফাঁকা রাখতে চাইলে */
  }

  .about-us-container05 img {
    width: 100%;
    height: auto;
    padding-right: 0px !important; /* padding-right সরিয়ে দিয়েছি */
    object-fit: contain; /* ইমেজ ডিস্টরশন ঠেকাতে */
  }

  .about-us-image {
    width: 100%;
    margin-bottom: var(--dl-space-space-unit);
  }

  .about-us-text {
    font-size: clamp(2rem, 5vw, 3.5rem);
    text-align: center;
  }
}

@media(max-width: 479px) {
  .about-us-container {
    padding: var(--dl-space-space-halfunit);
  }
  .about-us-underline,
  .about-us-underline1,
  .about-us-underline2 {
    width: 60px;
  }
  .about-us-container06 {
    gap: 0;
  }
  .about-us-text-block {
    text-align: center;
    padding: 0 var(--dl-space-space-unit);
  }
}
    </style>

    <style>
      [data-thq="thq-dropdown"]:hover > [data-thq="thq-dropdown-list"] {
          display: flex;
        }

        [data-thq="thq-dropdown"]:hover > div [data-thq="thq-dropdown-arrow"] {
          transform: rotate(90deg);
        }
    </style>
  </head>
  <body>
    <div>
      <link href="{{asset('css/about-us.css')}}" rel="stylesheet" />
      <script
        type="text/javascript"
        src="https://unpkg.com/@lottiefiles/lottie-player@1.6.0/dist/lottie-player.js"
      ></script>

      <div class="about-us-container " style="padding: 0px;margin: 0px;">
        {{-- @include('frontend.includes.top-header') --}}
        <div class="home-container">
            @include('frontend.includes.top-header')
        </div>
        <div class="about-us-main">
          <div class="about-us-hero" style="max-height: 100%">
            <div class="about-us-container01">
              <h1 class="about-us-text" style="font-family:Times New Roman;">About us</h1>

            </div>
          </div>
        </div>

        <div class="about-us-hero1">
          <div class="about-us-about-company">
            <div class="about-us-about-menu">
              <a href="#about" class="about-us-link">
                <div class="about-us-container02 button">
                  <span class="about-us-text01" style="font-family:Times New Roman;">About US</span>
                </div>
              </a>
              <a href="#chairman" class="about-us-link1">
                <div class="about-us-container03 button">
                  <span class="about-us-text02" style="font-family:Times New Roman;">Message From Chairman</span>
                </div>
              </a>
              <a href="#md" class="about-us-link2">
                <div class="about-us-container04 button">
                  <span class="about-us-text03" style="font-family:Times New Roman;">
                    Message From Managing Director
                  </span>
                </div>
              </a>
            </div>
            <div id="about" class="about-us-about-us">
              <div class="about-us-container05">
                <img
                  alt="image"
                  src="{{ asset('images/wh%20logo%404x-400w.png')}}"
                  class="about-us-image"
                />
              </div>
              <div class="about-us-container06">
                <div class="about-us-container07">
                  <h1 class="about-us-text04">
                    <span></span>
                    <span class="about-us-text06" style="font-family:Times New Roman;">About</span>
                    <br class="about-us-text07" />
                    <span class="about-us-text08" style="font-family:Times New Roman;">
                      {{ getContentData(83, 'title') }}
                    </span>
                    <br class="about-us-text09" />
                    <span></span>
                  </h1>
                </div>
                <h2 class="about-us-text11" style="font-family:Times New Roman;">{{ getContentData(83, 'subtitle') }}</h2>
                <p class="about-us-text12" style="font-family:Times New Roman !important;">
                    {!! getContentData(83, 'description'); !!}
                </p>

              </div>
              <lottie-player
                src="https://assets3.lottiefiles.com/packages/lf20_DULiNmy7AC.json"
                loop=""
                speed="1"
                autoplay="on"
                background="transparent"
                class="about-us-lottie-node"
              ></lottie-player>
            </div>
            <div class="about-us-our-mission">
                <div class="about-us-container08">
                    @foreach ($aboutNab as $aboutNabs)
                        <h1 class="about-us-text17" style="font-family:Times New Roman;">
                            <span></span>
                            <span style="font-family:Times New Roman;">
                                {{ $aboutNabs->title }}
                            </span>
                            <span style="font-family:Times New Roman;">
                                {{ $aboutNabs->subtitle }}
                            </span>
                            <br />
                            <span></span>
                        </h1>
                        <span class="about-us-text22" style="font-family:Times New Roman;">
                            <span style="font-family:Times New Roman;">
                                {!! $aboutNabs->description !!}
                            </span>
                        </span>
                    @endforeach
                </div>


              <img
                alt="image"
                src="{{ asset('images/quote-mark.svg')}}"
                class="about-us-image1"
              />
            </div>


            @foreach($users as $user)
            {{-- check forEach loop index is odd or even --}}
              @if($loop->index % 2 == 0)
                <div id="chairman" class="about-us-chairman">
                  <div class="about-us-container10">
                    <div class="about-us-container11">
                        @if($user->image)
                      <img
                        alt="image"
                        src="{{ asset($user->image)}}"
                        class="about-us-image2"
                      />
                      @else
                        <img
                            alt="image"
                            src="{{ asset('images/avatar-3637561_1280.png')}}"
                            class="about-us-image2"
                        />
                        @endif
                    </div>
                  </div>
                  <div class="about-us-container12">
                    <div class="about-us-container13">
                      <h1 class="about-us-text42" style="font-family:Times New Roman;">
                        {{ $user->name }}</h1>
                    </div>
                    <h2 class="about-us-text43" style="font-family:Times New Roman;">
                      {{ $user->designation }}</h2>
                    <span class="about-us-text44" style="font-family:Times New Roman;">
                      {{ $user->description }}
                      <br class="about-us-text46" />
                    </span>
                    <h2 class="about-us-text47" style="font-family:Times New Roman;">Contact</h2>
                    <div class="about-us-container14">
                      <div class="about-us-container15">
                        <div class="about-us-call-to-action" style="font-family:Times New Roman;">
                            @if ($user->address)

                                <div class="about-us-address">
                                    <svg viewBox="0 0 1024 1024" class="about-us-icon">
                                    <path
                                        d="M512 490q44 0 75-31t31-75-31-75-75-31-75 31-31 75 31 75 75 31zM512 86q124 0 211 87t87 211q0 62-31 142t-75 150-87 131-73 97l-32 34q-12-14-32-37t-72-92-91-134-71-147-32-144q0-124 87-211t211-87z"
                                    ></path>
                                    </svg>
                                    <span style="font-family:Times New Roman;">
                                        {{ $user->address }}
                                    </span>
                                </div>

                            @endif
                          @if ($user->phone)

                            <div class="about-us-mobile">
                                <svg viewBox="0 0 1024 1024" class="about-us-icon02">
                                <path
                                    d="M854 656q18 0 30 12t12 30v148q0 50-42 50-298 0-512-214t-214-512q0-42 50-42h148q18 0 30 12t12 30q0 78 24 150 8 26-10 44l-82 72q92 192 294 290l66-84q12-12 30-12 10 0 14 2 72 24 150 24z"
                                ></path>
                                </svg>
                                <span>
                                {{ $user->phone }}</span>
                            </div>

                          @endif

                          @if($user->email)
                          <div class="about-us-email">
                            <svg viewBox="0 0 1024 1024" class="about-us-icon04">
                              <path
                                d="M854 342v-86l-342 214-342-214v86l342 212zM854 170q34 0 59 26t25 60v512q0 34-25 60t-59 26h-684q-34 0-59-26t-25-60v-512q0-34 25-60t59-26h684z"
                              ></path>
                            </svg>
                            <span>
                            {{ $user->email }}</span>
                          </div>
                            @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <lottie-player
                    src="https://assets3.lottiefiles.com/packages/lf20_DULiNmy7AC.json"
                    loop=""
                    speed="1"
                    autoplay="on"
                    background="transparent"
                    class="about-us-lottie-node1">
                  </lottie-player>
                </div>

              @elseif($loop->index % 2 == 1)
                <div id="md" class="about-us-managingdirector">
                  <div class="about-us-container17">
                    <div class="about-us-container18">
                      <h1 class="about-us-text49" style="font-family:Times New Roman;">
                      {{ $user->name }}</h1>
                    </div>
                    <div class="about-us-container19"></div>
                    <h2 class="about-us-text50" style="font-family:Times New Roman;">{{ $user->designation }} </h2>
                    <span class="about-us-text51">
                      {{ $user->description }}
                      <br class="about-us-text53" />
                    </span>
                    <h2 class="about-us-text54" style="font-family:Times New Roman;">Contact</h2>
                    <div class="about-us-container20">
                      <div class="about-us-container21">
                        <div class="about-us-call-to-action1" style="font-family:Times New Roman;">
                            @if ($user->address)

                          <div class="about-us-address2">
                            <span class="about-us-address3" style="font-family:Times New Roman;">
                              {{ $user->address }}
                            </span>
                            <svg viewBox="0 0 1024 1024" class="about-us-icon12">
                              <path
                                d="M512 490q44 0 75-31t31-75-31-75-75-31-75 31-31 75 31 75 75 31zM512 86q124 0 211 87t87 211q0 62-31 142t-75 150-87 131-73 97l-32 34q-12-14-32-37t-72-92-91-134-71-147-32-144q0-124 87-211t211-87z"
                              ></path>
                            </svg>
                          </div>

                          @endif
                          @if ($user->phone)
                          <div class="about-us-mobile1">
                            <span>
                              {{ $user->phone }}</span>
                            <svg viewBox="0 0 1024 1024" class="about-us-icon14">
                              <path
                                d="M854 656q18 0 30 12t12 30v148q0 50-42 50-298 0-512-214t-214-512q0-42 50-42h148q18 0 30 12t12 30q0 78 24 150 8 26-10 44l-82 72q92 192 294 290l66-84q12-12 30-12 10 0 14 2 72 24 150 24z"
                              ></path>
                            </svg>
                          </div>
                            @endif

                            @if($user->email)
                          <div class="about-us-email2">
                            <span>
                              {{ $user->email }}</span>
                            <svg viewBox="0 0 1024 1024" class="about-us-icon16">
                              <path
                                d="M854 342v-86l-342 214-342-214v86l342 212zM854 170q34 0 59 26t25 60v512q0 34-25 60t-59 26h-684q-34 0-59-26t-25-60v-512q0-34 25-60t59-26h684z"
                              ></path>
                            </svg>
                          </div>
                          @endif
                        </div>
                        <div class="about-us-container22">
                          <div class="about-us-social-bar1">
                            <!-- <span>Connect with social</span>
                            <svg
                              viewBox="0 0 950.8571428571428 1024"
                              class="about-us-icon18">
                              <path
                                d="M925.714 233.143c-25.143 36.571-56.571 69.143-92.571 95.429 0.571 8 0.571 16 0.571 24 0 244-185.714 525.143-525.143 525.143-104.571 0-201.714-30.286-283.429-82.857 14.857 1.714 29.143 2.286 44.571 2.286 86.286 0 165.714-29.143 229.143-78.857-81.143-1.714-149.143-54.857-172.571-128 11.429 1.714 22.857 2.857 34.857 2.857 16.571 0 33.143-2.286 48.571-6.286-84.571-17.143-148-91.429-148-181.143v-2.286c24.571 13.714 53.143 22.286 83.429 23.429-49.714-33.143-82.286-89.714-82.286-153.714 0-34.286 9.143-65.714 25.143-93.143 90.857 112 227.429 185.143 380.571 193.143-2.857-13.714-4.571-28-4.571-42.286 0-101.714 82.286-184.571 184.571-184.571 53.143 0 101.143 22.286 134.857 58.286 41.714-8 81.714-23.429 117.143-44.571-13.714 42.857-42.857 78.857-81.143 101.714 37.143-4 73.143-14.286 106.286-28.571z"
                              ></path></svg>
                              <svg
                              viewBox="0 0 602.2582857142856 1024"
                              class="about-us-icon20"
                            >
                              <path
                                d="M548 6.857v150.857h-89.714c-70.286 0-83.429 33.714-83.429 82.286v108h167.429l-22.286 169.143h-145.143v433.714h-174.857v-433.714h-145.714v-169.143h145.714v-124.571c0-144.571 88.571-223.429 217.714-223.429 61.714 0 114.857 4.571 130.286 6.857z"
                              ></path></svg>
                              <svg viewBox="0 0 1024 1024" class="about-us-icon22">
                              <path
                                d="M1013.8 307.2c0 0-10-70.6-40.8-101.6-39-40.8-82.6-41-102.6-43.4-143.2-10.4-358.2-10.4-358.2-10.4h-0.4c0 0-215 0-358.2 10.4-20 2.4-63.6 2.6-102.6 43.4-30.8 31-40.6 101.6-40.6 101.6s-10.2 82.8-10.2 165.8v77.6c0 82.8 10.2 165.8 10.2 165.8s10 70.6 40.6 101.6c39 40.8 90.2 39.4 113 43.8 82 7.8 348.2 10.2 348.2 10.2s215.2-0.4 358.4-10.6c20-2.4 63.6-2.6 102.6-43.4 30.8-31 40.8-101.6 40.8-101.6s10.2-82.8 10.2-165.8v-77.6c-0.2-82.8-10.4-165.8-10.4-165.8zM406.2 644.8v-287.8l276.6 144.4-276.6 143.4z"
                              ></path>
                            </svg> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="about-us-container23">
                    <div class="about-us-container24">
                      <img
                        alt="image"
                        src="{{ asset($user->image)}}"
                        class="about-us-image3"
                      />
                    </div>
                  </div>
                  <lottie-player
                    src="https://assets3.lottiefiles.com/packages/lf20_DULiNmy7AC.json"
                    loop=""
                    speed="1"
                    autoplay="on"
                    background="transparent"
                    class="about-us-lottie-node2"
                  ></lottie-player>
                </div>
              @endif
            @endforeach
          </div>
          <div class="about-us-siteber">
            <h1 class="about-us-text56" style="font-family:Times New Roman;">
              {{ getContentData(86, 'title') }}</span></h1>
              @foreach ($universities as $university)
                <div class="feature-card1-feature-card feature-card1-root-class-name2" style="background-image: radial-gradient(circle at center, rgba(1, 38, 64, 0.6) 69.00%,rgba(149, 58, 17, 0.39) 100.00%),url({{ $university->image }});">
                    <a href="{{route('abroad.university', $university->country->name)}}" class="feature-card1-link">
                        <h2 class="feature-card1-text">
                            <span style="font-family:Times New Roman;">{{ $university->name }}</span>
                        </h2>
                        <div class="feature-card1-container">
                        <h2 class="feature-card1-text1" style="font-family:Times New Roman;"><span>{{ $university->application_date }}</span></h2>
                        <h2 class="feature-card1-text2">
                            <span style="font-family:Times New Roman;">{{ $university->country->name }}</span>
                        </h2>
                        </div>
                    </a>
                </div>
              @endforeach

          </div>
        </div>

        </div>
        @include('frontend.includes.ctastatus')
      </div>
    </div>
    <script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
  </body>
</html>


@extends('frontend.app')
{{-- @section('seo_title')
{{ getContentData(124, 'title') }}
@endsection

@section('seo_description')
{{ getContentData(124, 'description') }}
@endsection

@section('seo_keywords')
{{ getContentData(124, 'subtitle') }}
@endsection

@section('seo_image')
{{ asset(getContentData(124, 'image')); }}
@endsection --}}

@section('body')


@endsection
