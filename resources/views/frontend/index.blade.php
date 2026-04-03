@extends('frontend.app')

@section('title')
Home Page
@endsection

{{-- @section('seo_title')
{{ getContentData(123, 'title'); }} seo
@endsection

@section('seo_description')
{{ getContentData(123, 'description'); }}
@endsection

@section('seo_keywords')
{{ getContentData(123, 'subtitle'); }}
@endsection

@section('seo_image')
{{ asset(getContentData(123, 'image')); }}
@endsection --}}

@isset($seo)
    @section('seo_title')
        {{ $seo->seo_title }}
    @endsection

    @section('seo_description')
        {{ $seo->seo_description }}
    @endsection

    @section('seo_keywords')
        {{ $seo->seo_keywords }}
    @endsection

    @section('seo_image')
        {{ $seo->seo_image }}
    @endsection
@endisset




@section('body')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- Demo styles -->
<style>
  html,
  body {
    position: relative;
    height: 100%;
  }

  body {
    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #000;
    margin: 0;
    padding: 0;
    background-color: #f7941fff
  }
  a{
    text-decoration: none!important;
  }

  .swiper {
    width: 100%;
    padding-bottom: 50px;
    /* background: #441316; */
  }

  .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 100%;
    /* height: 600px; */
  }


  .swiper-slide img {
    display: block;
    width: 100%;
  }
  .tab-link {
    cursor: pointer;
  }
  .tab-link.active {
    color: #F7941F;
    font-weight: 700;
    border-color: #ffffff;
  }
  .home-details .d-none {
    display: none;
  }
  .animeslide-slide {
  color:#fff;
}

.animeslide-slide {
  position: relative;
  height: calc(100vh - 121px);
  background-size: cover;
  display: flex;
  justify-content: center;
}
.animeslide-slide .container {
  position: relative;
  width: 60%;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.animeslide-slide.swiper-slide-active [data-animate] {
  opacity: 1;
  transform: none;
}
.animeslide-slide.swiper-slide-active .animeslide-heading {
  transition-delay: 0.6s;
  text-align: center;
}
.animeslide-slide.swiper-slide-active .animeslide-desc {
  transition-delay: 1s;
}
.animeslide-heading {
  transition-delay: 5s;
  font-size: 50px;
  font-weight: 700;
  gap: 10px;
}
.animeslide-heading span {
  font-size: 30px;
  color: #f08723;
  font-weight: 600;
  margin-top: -20px !important;
}
.animeslide-desc {
  padding: 15px 22px;
  border-radius: 8px;
  background-color: #202238a4;
  max-width: 480px;
  opacity: 0.9;
  justify-content: center;
  display: none;
}

[data-animate] {
  opacity: 0;
  transition: all 0.8s ease-out;
}
[data-animate="bottom"] {
  transform: translate3d(0, 15px, 0);
}

.animeslide-bottom {
  position: absolute;
  bottom: 0;
  width: 100%;
  border-radius: 8px;
  background-color: #202238;
  max-width: 600px;
  z-index: 1;
  padding: 35px 35px;
  right: 0;
  font-size: 14px;
}
.animeslide-bottom .cell {
  position: relative;
  opacity: 1;
  z-index: 2;
  height: 40px;
  bottom: inherit;
}
.animeslide-bottom .animeslide-scrollbar {
  margin-top: 16px;
}
.animeslide-bottom .animeslide-scrollbar-drag {
  height: 6px;
}
.animeslide-bottom .animeslide-pagination {
  font-size: 25px;
  bottom: inherit;
  color:#fff;
}
.animeslide-bottom .animeslide-pagination b {
  font-size: 28px;
  margin-top: -5px;
}

.animeslide-bottom .animeslide-pagination span {
  padding-left: 5px;
  padding-right: 5px;
}
.animeslide-button-next,
.animeslide-button-prev {
  outline: none;
}
.animeslide-button-next::after,
.animeslide-button-prev::after {
  font-size: 22px;
  color: #fff;
}
.error_msg{
    color: white;
    font-size: 12px;
    font-weight: 700;
    margin-top: 2px;
}
.employee-card {
        background-color: #f7941fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .employee-card:hover {
        transform: translateY(-10px); /* Slight upward movement */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
    }

    /* Mobile devices (up to 767px) */

  @media (max-width: 430px) {
      .animeslide-slide {
          background-size: cover !important;
          background-position: center !important;
          height: 250px !important; /* Reduced height */
      }

      .animeslide-heading {
          font-size: 18px !important;
          line-height: 1.2 !important;
          text-align: center !important;
      }

      .animeslide-heading span {
          font-size: 14px !important;
          display: block !important;
          margin-top: 5px !important;
      }

      .swiper-slide .container {
          padding: 15px !important;
      }
      .swiper{
          height: 200px !important;
      }
  }
  /* akj krche na */

  @media (max-width: 767px) {
  .animeslide-slide {
    height: auto;
    padding: 20px 10px;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .animeslide-slide .container {
    width: 90%;
  }

  .animeslide-heading {
    font-size: 30px;
  }

  .animeslide-heading span {
    font-size: 20px;
    margin-top: -10px !important;
  }

  .animeslide-desc {
    max-width: 100%;
    font-size: 14px;
    padding: 10px 15px;
  }

  .animeslide-bottom {
    position: relative;
    max-width: 100%;
    padding: 20px;
    font-size: 12px;
  }

  .animeslide-bottom .animeslide-pagination {
    font-size: 18px;
  }

  .animeslide-bottom .animeslide-pagination b {
    font-size: 20px;
  }

  .employee-card {
    margin: 10px auto;
    width: 90%;
  }
}

/* Tablets (768px - 991px) */
@media (min-width: 768px) and (max-width: 991px) {
  .animeslide-slide .container {
    width: 80%;
  }

  .animeslide-heading {
    font-size: 40px;
  }

  .animeslide-heading span {
    font-size: 24px;
  }

  .animeslide-desc {
    max-width: 90%;
    font-size: 15px;
  }

  .animeslide-bottom {
    max-width: 90%;
    font-size: 13px;
  }

  .employee-card {
    width: 95%;
  }
}

@media screen and (max-width: 480px) {
  .single-image {
    width: 100% !important;
    height: auto !important; /* Also add this to keep image proportion */
    padding: 10px !important; /* Optional: Reduce padding for smaller screens */
  }
}


  .modal-content {
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      border: none;
  }

  .card-content {
      padding: 3rem 2rem;
      text-align: center;
  }

  .fas.fa-envelope {
      color: #fff;
      font-size: 2rem;
      background: linear-gradient(90deg, #ff9966, #ff5e62);
      padding: 1.5rem;
      border-radius: 100%;
      margin: 0 0 1.5rem 0;
      box-shadow: 0 5px 15px rgba(255, 94, 98, 0.3);
  }

  .card-content h1 {
      text-transform: uppercase;
      margin: 0 0 1rem 0;
      font-weight: 700;
      color: #333;
  }

  .card-content p {
      font-size: 1rem;
      margin: 0 0 2rem 0;
      color: #666;
      line-height: 1.6;
  }

  .form-input {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 1.5rem;
  }

  input {
      padding: 0.8rem 1.5rem;
      width: 60%;
      border-radius: 5rem;
      outline: none;
      border: 1px solid #ddd;
      font-size: 0.9rem;
      transition: all 0.3s;
  }

  input:focus {
      border-color: #ff9966;
      box-shadow: 0 0 0 0.25rem rgba(255, 153, 102, 0.25);
  }

  ::placeholder {
      color: #aaa;
  }

  .subscribe-btn {
      padding: 0.8rem 1.8rem;
      border-radius: 5rem;
      background: linear-gradient(90deg, #ff9966, #ff5e62);
      color: #fff;
      font-size: 0.9rem;
      border: none;
      outline: none;
      cursor: pointer;
      transition: all 0.3s;
      font-weight: 600;
  }

  .subscribe-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(255, 94, 98, 0.4);
  }

  .trigger-btn {
      background: linear-gradient(90deg, #ff9966, #ff5e62);
      border: none;
      border-radius: 5rem;
      padding: 0.8rem 1.8rem;
      font-weight: 600;
      box-shadow: 0 5px 15px rgba(255, 94, 98, 0.3);
      transition: all 0.3s;
  }

  .trigger-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(255, 94, 98, 0.4);
  }

  .modal-backdrop {
      background-color: rgba(0, 0, 0, 0.5);
  }

  @media (max-width: 576px) {
      .form-input {
          flex-direction: column;
          align-items: center;
      }

      input {
          width: 100%;
          margin-bottom: 10px;
      }

      .card-content {
          padding: 2rem 1.5rem;
      }
  }



</style>



<!-- Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg border-0">
            <div class="modal-header border-0" style="position: absolute; right: 0; z-index: 1;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="wrapper">
                <form action="{{ route('subscribe') }}" method="POST" class="card-content">
                    @csrf
                    <div class="container">
                        <div class="image">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h1>Subscribe</h1>
                        <p>Subscribe to our newsletter and never miss an update!</p>
                    </div>
                    <div class="form-input">
                        <label for="email" data-name="email" class="visually-hidden">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="Your Email Address" required>
                        <button type="submit" class="subscribe-btn">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content rounded-4 shadow-lg border-0">--}}

{{--            <!-- হেডার সেকশন -->--}}
{{--            <div class="modal-header bg-danger text-white rounded-top-4">--}}
{{--                <h5 class="modal-title fw-semibold" id="emailModalLabel">📬Get the Latest Updates</h5>--}}
{{--                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            </div>--}}

{{--            <!-- বডি সেকশন -->--}}
{{--            <div class="modal-body px-4 py-3">--}}
{{--                <p class="mb-4 text-muted">Subscribe to our newsletter and never miss an update!</p>--}}

{{--                <!-- ফর্ম সেকশন -->--}}
{{--                <form action="{{ route('subscribe') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="emailInput" class="form-label fw-semibold">Email address</label>--}}
{{--                        <input type="email" class="form-control form-control-lg rounded-3"--}}
{{--                               id="email" name="email" placeholder="you@example.com" required>--}}
{{--                    </div>--}}

{{--                    <!-- সাবমিট বাটন -->--}}
{{--                    <button type="submit" class="btn btn-danger w-100 py-2 fw-semibold shadow-sm">--}}
{{--                        🚀 Subscribe Now--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="home-container">
  @include('frontend.includes.top-header')
  <!-- Swiper -->
  <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        @foreach ($sliders as $slider)
            <div class="swiper-slide animeslide-slide" style="background-image: url('{{asset('uploads/' . $slider->image)}}');">
                <div class="container">
                    <h2 data-animate="bottom" class="animeslide-heading" style="font-family:Times New Roman;">
                        {{ $slider->title }} <br />
                    <span>{{ $slider->subtitle }}</span>
                    </h2>
                </div>
            </div>
        @endforeach

    </div>
    <div class="swiper-button-next" style="color: #F7941F "></div>
    <div class="swiper-button-prev" style="color: #F7941F "></div>
    <div class="swiper-pagination"></div>
  </div>


    <!-- Sticky Sidebar CSS -->






{{--  <div class="home-tab-silector" style="background-image: url('{{ asset('images/wbg.png') }}');">--}}
    <div class="home-tab-silector" style="
    border: 40px solid transparent;
    /*border-image: url(http://127.0.0.1:8000/images/wbg.png) 40 round;*/
    border-radius: 20px;
    background-color: #de855352;;

    ">

        <div class="home-sidebar" style="background-color:#DC4D01; ">
            <nav class="home-nav">
                <span data-id="home-features" class="home-text01 tab-link active" style="font-weight: bold;font-family:Times New Roman; font-size: 18px; color:#000">ABOUT</span>
                <span data-id="service-features" class="home-text02 tab-link" style="font-weight: bold;font-family:Times New Roman; font-size: 18px; color:#000">EMPLOYEE TEAM</span>
                <span data-id="service-point" class="home-text03 tab-link" style="font-weight: bold;font-family:Times New Roman; font-size: 18px; color:#000">SERVICE POINT</span>
                <span data-id="contact" class="home-text04 tab-link" style="font-weight: bold;font-family:Times New Roman; font-size: 18px; color:#000">CONTACTS</span>
            </nav>
            <div class="home-company">
                <div class="home-profile">
                    <div class="home-container02">
                        <div class="border"></div>
                        <img alt="image" src="{{asset('images/wh%20logo%404x-600w.png')}}"
                             class="home-image1"/>
                    </div>
                </div>
                <div class="home-profile1">
                    <img
                        alt="image"
                        src="{{asset('images/external/l2-200h.png')}}"
                        class="home-image2"
                    />
                </div>
            </div>
        </div>
        <div class="home-details">


            <div id="home-features" class="home-features tab-block" style="    background-color: #DC4D01;">

                @foreach($aboutSections as $aboutSection)
                    <h2 class="home-text06 Headline2" style="font-size: 25px !important; font-family:Times New Roman; color:#000 !important">
                        {{ $aboutSection->title }}
                    </h2>
                    <span class="home-text07" style="font-family:Times New Roman;color:#000">
                {{ $aboutSection->subtitle }}
            </span>
                    <div class="home-container03">
                <span class="home-text08" style="font-size: 16px !important">
                    {!! $aboutSection->description !!}
                </span>
                    </div>
                @endforeach
            </div>

            <div id="service-features" class="home-features tab-block d-none" style="background-color: #DC4D01">
                <h2 class="home-text06 Headline2" style="font-size: 25px !important;font-family:Times New Roman">
                    {{ getContentData(107, 'title'); }}
                </h2>
                <span class="home-text07" style="font-size: 18px !important;font-family:Times New Roman">
          {{ getContentData(107, 'subtitle'); }}
        </span>
                <br>

                <style>
                    /* Desktop & Global fixes to prevent squishing and oval images */
                    .employee-card {
                        transition: transform 0.35s cubic-bezier(.2,.9,.2,1), box-shadow 0.35s ease;
                        transform-style: preserve-3d;
                        cursor: pointer;
                        will-change: transform;
                        perspective: 1000px;
                        background: #dc4d01;
                        border-radius: 15px;
                        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
                        min-width: 200px; /* Safe minimum width */
                        max-width: 320px; /* Professional max width */
                        margin: 0 auto;
                        width: 100%;
                    }

                    /* Hover: subtle lift + 3D tilt */
                    .employee-card:hover {
                        box-shadow: 0 25px 50px rgba(0,0,0,0.2);
                    }

                    /* Image lift for depth */
                    .employee-card img {
                        transition: transform 0.4s cubic-bezier(.2,.9,.2,1), box-shadow 0.4s;
                        transform: translateZ(10px);
                        box-shadow: 0 6px 15px rgba(0,0,0,0.15);
                        border-radius: 50%;
                        width: 110px !important;
                        height: 110px !important;
                        min-width: 110px !important;
                        object-fit: cover !important;
                        aspect-ratio: 1/1 !important;
                        margin: 0 auto 15px auto !important;
                    }

                    /* floating idle animation */
                    @keyframes floaty {
                        0% { transform: translateY(0) rotateX(0) rotateY(0); }
                        50% { transform: translateY(-5px) rotateX(1deg) rotateY(1deg); }
                        100% { transform: translateY(0) rotateX(0) rotateY(0); }
                    }
                    .employee-card.idle {
                        animation: floaty 6s ease-in-out infinite;
                    }
                </style>

                <div class="row justify-content-center align-items-stretch mt-3 mb-4" style="gap: 60px;">
                    @foreach ($employees as $employee)
                        <div class="col-12 col-sm-8 col-md-5 col-lg-4 d-flex justify-content-center">
                            <div class="card h-100 text-center employee-card p-4">
                                <img src="{{ $employee->image ? asset($employee->image) : asset('images/avatar-3637561_1280.png') }}"
                                     class="card-img-top rounded-circle mx-auto"
                                     alt="{{ $employee->name }}">

                                <div class="card-body d-flex flex-column justify-content-center">
                                    <h5 class="card-title" style="font-family: 'Times New Roman', serif; font-size: 18px; margin-bottom: 8px;">
                                        {{ $employee->name }}
                                    </h5>
                                    <p class="card-text text-dark" style="font-family: 'Times New Roman', serif; font-size: 15px;">
                                        {{ $employee->designation }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>



                <script>
                    (function(){
                        const cards = document.querySelectorAll('.employee-card');

                        cards.forEach(card => {
                            // idle floating
                            card.classList.add('idle');

                            card.addEventListener('mousemove', (e) => {
                                const rect = card.getBoundingClientRect();
                                const px = (e.clientX - rect.left) / rect.width; // 0..1
                                const py = (e.clientY - rect.top) / rect.height; // 0..1

                                const rotateY = (px - 0.5) * 20; // -10 .. +10 deg
                                const rotateX = (0.5 - py) * 12; // -6 .. +6 deg
                                const translateZ = 12;

                                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(${translateZ}px) scale(1.04)`;
                                card.style.boxShadow = `${-rotateY*1.5}px ${20 + Math.abs(rotateX)*1.2}px 45px rgba(0,0,0,0.2)`;

                                const img = card.querySelector('img');
                                if(img) img.style.transform = `translateZ(${translateZ + 15}px)`;
                                card.classList.remove('idle');
                            });

                            card.addEventListener('mouseleave', () => {
                                card.style.transform = '';
                                card.style.boxShadow = '';
                                const img = card.querySelector('img');
                                if(img) img.style.transform = '';
                                setTimeout(() => card.classList.add('idle'), 200);
                            });

                            // keyboard focus support
                            card.addEventListener('focusin', () => {
                                card.style.transform = 'translateY(-6px) scale(1.03)';
                                card.classList.remove('idle');
                            });
                            card.addEventListener('focusout', () => {
                                card.style.transform = '';
                                setTimeout(()=> card.classList.add('idle'), 200);
                            });
                        });
                    })();
                </script>


                <div class="home-features1">
                    <div class="home-container04"></div>
                </div>
            </div>

            <div id="service-point" class="home-features tab-block d-none rounded" style="background-color: #DC4D01">

                @foreach($servicePoints as $servicePoint)
                    <h2 class="home-text06 Headline2" style="font-size: 25px !important; font-family:Times New Roman; color:#000 !important">
                        {{ $servicePoint->title }}
                    </h2>
                    <span class="home-text07" style="font-family:Times New Roman;color:#000">
            {{ $servicePoint->subtitle }}
        </span>
                    <div class="home-container03">
            <span class="home-text08" style="font-size: 16px !important">
                {!! $servicePoint->description !!}
            </span>
                    </div>
                @endforeach


                {{-- <h2 class="home-text06 Headline2" style="font-size: 25px !important; font-family:Times New Roman" >
                  {{ getContentData(114, 'title'); }}
                </h2>
                <span class="home-text07" style="font-family:Times New Roman;color:#000">
                  {{ getContentData(114, 'subtitle'); }}
                </span>
                <br>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                  @foreach ($servicePoints as $servicePoint)
                      <div class="col">
                          <div class="card h-100 text-center employee-card">
                             <div class="card-body">
                              <h4 class="card-title mt-0 fw-bold text-white" style="font-family:Times New Roman; color:#000 !important">{{ $servicePoint->title }}</h4>
                              <p class="card-text "> {!! $servicePoint->description !!}</p>

                              </div>
                          </div>
                      </div>
                  @endforeach
              </div> --}}

            </div>

            <div id="contact" class="home-features tab-block " style="background-color: #DC4D01">


                @foreach($contentus as $content)
                    <h2 class="home-text06 Headline2" style="font-size: 25px !important; font-family:Times New Roman; color:#000 !important">
                        {{ $content->title }}
                    </h2>
                    <span class="home-text07" style="font-family:Times New Roman;color:#000">
            {{ $content->subtitle }}
        </span>
                    <div class="home-container03">
            <span class="home-text08" style="font-size: 16px !important">
                {!! $content->description !!}
            </span>
                    </div>
                @endforeach


                {{-- <h2 class="home-text06 Headline2"  style="font-size: 25px !important;font-family:Times New Roman ;color:#000" >
                  {{ getContentData(115, 'title'); }}
                </h2>
                <span class="home-text07" style="font-family:Times New Roman; color:#000 !important">
                  {{ getContentData(115, 'subtitle'); }}
                </span>
                <div class="home-container03">
                  <span class="home-text08">
                    {!! getContentData(115, 'description'); !!}
                  </span>
                </div> --}}
            </div>
        </div>

    </div>


</div>


  <div class="home-testimonials-section" style="background-color:#dc4d01a8" >
    <div class="home-testimonial-section" style="background-color:#dc4d01a8">
      <div class="home-testimonial" style="background-color: #dc4d01a8;">
        <h1 class="home-text22" style="font-family:Times New Roman ;color:#000 !important">
          {{ getContentData(38, 'title'); }}
          <br />
          <span></span>
        </h1>

        <div class="home-testimonial-details" >

            @foreach($client_reviews as $client_review)

                <div class="testimonial-card1-testimonial-card testimonial-card1-root-class-name3 employee-card" style="background-color: #DC4D01 !important; color:black !important;">
                    <svg
                    viewBox="0 0 950.8571428571428 1024"
                    class="testimonial-card1-icon"
                    >
                    <path
                        d="M438.857 182.857v402.286c0 161.143-131.429 292.571-292.571 292.571h-36.571c-20 0-36.571-16.571-36.571-36.571v-73.143c0-20 16.571-36.571 36.571-36.571h36.571c80.571 0 146.286-65.714 146.286-146.286v-18.286c0-30.286-24.571-54.857-54.857-54.857h-128c-60.571 0-109.714-49.143-109.714-109.714v-219.429c0-60.571 49.143-109.714 109.714-109.714h219.429c60.571 0 109.714 49.143 109.714 109.714zM950.857 182.857v402.286c0 161.143-131.429 292.571-292.571 292.571h-36.571c-20 0-36.571-16.571-36.571-36.571v-73.143c0-20 16.571-36.571 36.571-36.571h36.571c80.571 0 146.286-65.714 146.286-146.286v-18.286c0-30.286-24.571-54.857-54.857-54.857h-128c-60.571 0-109.714-49.143-109.714-109.714v-219.429c0-60.571 49.143-109.714 109.714-109.714h219.429c60.571 0 109.714 49.143 109.714 109.714z"
                    ></path>
                    </svg>
                    <div class="testimonial-card1-testimonial">
                        <img
                            alt="profile"
                            src="{{ $client_review->image ? asset($client_review->image) : asset('images/user.jpeg') }}"
                            class="testimonial-card1-image"
                        />
                        <span class="testimonial-card1-text1" style="font-family:Times New Roman ; color:#000 !important">
                        {{ $client_review->name }}
                    </span>
                        <span class="testimonial-card1-text2" style="font-family:Times New Roman; color:#000 !important">
                        {{ $client_review->designation }}
                    </span>
                    <span class="testimonial-card1-text" style="font-family:Times New Roman; color:#000 !important">
                        {{ $client_review->review }}
                    </span>


                    </div>
                </div>

          @endforeach



        </div>

      </div>
    </div>
  </div>


  <div class="home-feature2">
    <div class="home-container07">
      <h2 class="home-text27 Headline2" style="font-family:Times New Roman ;color:#000 !important">
        {{ getContentData(42, 'title'); }}
      </h2>
      <span class="home-text28 Lead1" style="font-family:Times New Roman ;color:#000 !important">
        {{ getContentData(42, 'subtitle'); }}
      </span>
    </div>
  </div>

  <div class="home-why-us-section" style="background-color: #84d6707a;">
    <img id="why-us-logo"
      alt="image"
      src="{{asset('images/wh%20logo%404x-600w.png')}}"
      class="home-logo"
    />
    <div class="home-why-us">
      <div class="home-heading-tagline">
        <h3 class="home-text29" style="font-family:Times New Roman; color:#000 !important">
          {{ getContentData(43, 'subtitle'); }}
          {{ getContentData(43, 'title'); }}</h3>
        <span class="home-text30" style="font-family:Times New Roman; color:#000 !important">
          {!! getContentData(43, 'description'); !!}
        </span>
      </div>
      <div class="home-details1">
        <div class="home-feature-card">
          <svg viewBox="0 0 1024 1024" class="home-icon14">
            <path
              d="M810 298v-84h-426v84h426zM640 640v-86h-256v86h256zM810 470v-86h-426v86h426zM854 86q34 0 59 25t25 59v512q0 34-25 60t-59 26h-512q-34 0-60-26t-26-60v-512q0-34 26-59t60-25h512zM170 256v598h598v84h-598q-34 0-59-25t-25-59v-598h84z"
            ></path>
          </svg>
          <h2 class="home-text31" style="font-size: 20px !important; font-family:Times New Roman; color:#000 !important">
            {{ getContentData(44, 'title'); }}
          </h2>
        </div>
        <div class="home-feature-card1">
          <svg viewBox="0 0 1024 1024" class="home-icon16">
            <path
              d="M512 490q44 0 75-31t31-75-31-75-75-31-75 31-31 75 31 75 75 31zM512 86q124 0 211 87t87 211q0 62-31 142t-75 150-87 131-73 97l-32 34q-12-14-32-37t-72-92-91-134-71-147-32-144q0-124 87-211t211-87z"
            ></path>
          </svg>
          <h2 class="home-text32" style="font-size: 20px !important;font-family;cursive; color:#000 !important">
            {{ getContentData(45, 'title'); }}</h2>
        </div>
        <div class="home-feature-card2">
          <svg viewBox="0 0 1024 1024" class="home-icon18">
            <path
              d="M512 128l470 256v342h-86v-296l-384 210-470-256zM214 562l298 164 298-164v172l-298 162-298-162v-172z"
            ></path>
          </svg>
          <h2 class="home-text33" style="font-size: 20px !important; font-family:Times New Roman;">
            <span style="color:#000 !important">
              {{ getContentData(46, 'title'); }}</span>
            <br />
          </h2>
        </div>
        <div class="home-feature-card3" style="font-size: 20px !important">
          <svg viewBox="0 0 1024 1024" class="home-icon20">
            <path
              d="M726 298q88 0 150 63t62 151-62 151-150 63h-172v-82h172q54 0 93-39t39-93-39-93-93-39h-172v-82h172zM342 554v-84h340v84h-340zM166 512q0 54 39 93t93 39h172v82h-172q-88 0-150-63t-62-151 62-151 150-63h172v82h-172q-54 0-93 39t-39 93z"
            ></path>
          </svg>
          <h2 class="home-text36" style="font-size: 20px !important; font-family:Times New Roman; color:#000 !important">
            {{ getContentData(47, 'title'); }}</span>
          </h2>
        </div>
      </div>
    </div>
  </div>


  <div class="home-university-section">
    <div class="home-heading-button">
      <h1 class="home-text40" style="font-family:Times New Roman;color:#000 !important">
        {{ getContentData(48, 'title'); }}</span>
      </h1>
      <div class="home-container08" >

        <a href="{{route('abroad')}}" class="home-text41" style="font-family:Times New Roman;">Apply Today</a>
        <svg viewBox="0 0 1024 1024" class="home-icon22">
          <path
            d="M512 0c-282.77 0-512 229.23-512 512s229.23 512 512 512 512-229.23 512-512-229.23-512-512-512zM512 928c-229.75 0-416-186.25-416-416s186.25-416 416-416 416 186.25 416 416-186.25 416-416 416z"
          ></path>
          <path
            d="M354.744 706.744l90.512 90.512 285.254-285.256-285.256-285.254-90.508 90.508 194.744 194.746z"
          ></path>
        </svg>
      </div>
    </div>
  </div>

  <div class="home-contact-section">
    <div class="home-contact">
      <div class="home-info">
        <div class="home-info-text">
          <h3 class="HeadingTwo">
            <span>
              <span style="font-family:Times New Roman; color:#000 !important">{{ getContentData(128, 'title'); }}</span>
            </span>
          </h3>
          <span class="home-text47" style="font-family:Times New Roman;color:#000 !important">
            {{ getContentData(128, 'subtitle'); }}
          </span>
          <div class="home-contacts">
            <div class="home-container09">
              <svg viewBox="0 0 1024 1024" class="home-icon25">
                <path
                  d="M742 460l-94-94q-18-18-10-44 24-72 24-152 0-18 12-30t30-12h150q18 0 30 12t12 30q0 300-213 513t-513 213q-18 0-30-12t-12-30v-150q0-18 12-30t30-12q80 0 152-24 24-10 44 10l94 94q186-96 282-282z"
                ></path>
              </svg>
              <a href="tel:+40 772 100 200" class="home-link Small" style="font-family:Times New Roman;color:#000 !important">
                {{getAddressData(2, 'phone');}}
              </a>
            </div>
            <div class="home-container10">
              <svg viewBox="0 0 1024 1024" class="home-icon27">
                <path
                  d="M854 342v-86l-342 214-342-214v86l342 212zM854 170q34 0 59 26t25 60v512q0 34-25 60t-59 26h-684q-34 0-59-26t-25-60v-512q0-34 25-60t59-26h684z"
                ></path>
              </svg>
              <a
                href="mailto:hello@creative-tim.com?subject="
                class="Small" style="font-family:Times New Roman;color:#000 !important">
                {{getAddressData(2, 'email');}}
              </a>
            </div>
            <div class="home-container11">
              <svg viewBox="0 0 1024 1024" class="home-icon29">
                <path
                  d="M512 490q44 0 75-31t31-75-31-75-75-31-75 31-31 75 31 75 75 31zM512 86q124 0 211 87t87 211q0 62-31 142t-75 150-87 131-73 97l-32 34q-12-14-32-37t-72-92-91-134-71-147-32-144q0-124 87-211t211-87z"
                ></path>
              </svg>
              <span class="Small">
                <span class="Small" style="font-family:Times New Roman;color:#000 !important">
                  {{getAddressData(2, 'full_address');}}
                </span>
                <br class="Small" />
              </span>
            </div>
          </div>
          <div class="home-social">
            <button>
              <a href="https://www.facebook.com/harun.rashid.56884761?mibextid=wwXIfr&rdid=8ONij1q4pLoQw6LN#" target="_blank" >
                <svg viewBox="0 0 877.7142857142857 1024" class="home-icon31" target="_blank">
                  <path
                  d="M713.143 73.143c90.857 0 164.571 73.714 164.571 164.571v548.571c0 90.857-73.714 164.571-164.571 164.571h-107.429v-340h113.714l17.143-132.571h-130.857v-84.571c0-38.286 10.286-64 65.714-64l69.714-0.571v-118.286c-12-1.714-53.714-5.143-101.714-5.143-101.143 0-170.857 61.714-170.857 174.857v97.714h-114.286v132.571h114.286v340h-304c-90.857 0-164.571-73.714-164.571-164.571v-548.571c0-90.857 73.714-164.571 164.571-164.571h548.571z" ></path>
                </svg>
              </a>
            </button>
              <button>
                  <a href="https://web.wechat.com/uklccp?lang=en_US&t=v2/index" target="_blank">
                      <svg width="30px" height="30px" class="home-icon33" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.8088 7.05902C11.3508 7.06746 10.9637 7.45766 10.9718 7.90277C10.9802 8.36421 11.3599 8.7252 11.8309 8.7196C12.3031 8.71385 12.6613 8.3491 12.6568 7.87785C12.6529 7.41534 12.2749 7.05051 11.8088 7.05902ZM7.35079 7.91557C7.36789 7.47215 6.98366 7.07275 6.52729 7.05933C6.06002 7.04561 5.67572 7.40269 5.66207 7.8632C5.64827 8.32985 6.0052 8.70373 6.47584 8.71569C6.94241 8.72757 7.33354 8.36996 7.35079 7.91557ZM15.8953 8.67099C14.0388 8.76798 12.4244 9.33078 11.1137 10.6023C9.7894 11.887 9.18488 13.4611 9.35012 15.4126C8.62446 15.3226 7.96351 15.2237 7.2988 15.1678C7.06924 15.1484 6.7968 15.1759 6.60235 15.2856C5.95689 15.6498 5.33812 16.061 4.60471 16.5195C4.73928 15.9108 4.82638 15.3778 4.98058 14.8652C5.09398 14.4884 5.04146 14.2788 4.69434 14.0333C2.46568 12.4599 1.52624 10.1051 2.22929 7.68071C2.87973 5.43794 4.47705 4.07778 6.64744 3.36875C9.60982 2.4011 12.939 3.38815 14.7404 5.74012C15.391 6.58969 15.7899 7.54323 15.8953 8.67099Z" fill="#fff"/>
                          <path d="M17.6884 12.3843C17.3253 12.3818 17.0167 12.6791 17.0019 13.046C16.9861 13.4383 17.2912 13.7605 17.6794 13.7615C18.055 13.7627 18.3517 13.4787 18.3655 13.105C18.38 12.7117 18.0749 12.387 17.6884 12.3843ZM13.3745 13.7662C13.7489 13.7666 14.057 13.4737 14.0711 13.1041C14.0861 12.7127 13.7713 12.3845 13.3795 12.3828C12.9915 12.381 12.6664 12.714 12.6799 13.0994C12.6927 13.4678 13.003 13.7658 13.3745 13.7662ZM20.0664 20.2452C19.4785 19.9835 18.9392 19.5907 18.3652 19.5308C17.7932 19.471 17.1919 19.801 16.5936 19.8622C14.771 20.0486 13.138 19.5407 11.7916 18.2956C9.23081 15.927 9.59671 12.2954 12.5594 10.3543C15.1925 8.62927 19.0542 9.20435 20.9107 11.598C22.5307 13.6866 22.3403 16.4592 20.3626 18.2139C19.7903 18.7217 19.5843 19.1397 19.9515 19.809C20.0193 19.9326 20.027 20.0891 20.0664 20.2452Z" fill="#fff"/>
                      </svg>
                  </a>
              </button>
             <button>
              <a href="https://x.com/harunra15855182?s=21&t=iflyIj4frFfr1lYxLwOKFw" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" class="home-icon33" viewBox="0 0 448 512"><path fill="#ffffff" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"/></svg>
              </a>
            </button>
            <button>
                <a href="https://wa.me/+60 19-568 6867" target="_blank">
                  <svg width="30px" height="30px" class="home-icon33" viewBox="0 0 32 32" fill="#25D366" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 .004C7.164.004 0 7.17 0 16c0 2.821.733 5.466 2.014 7.778L.03 32l8.391-2.003A15.956 15.956 0 0 0 16 31.996c8.836 0 16-7.166 16-16S24.836.004 16 .004zm0 29.404c-2.57 0-5.036-.687-7.207-1.988l-.514-.304-4.985 1.188 1.06-5.057-.333-.52a13.375 13.375 0 0 1-2.028-7.12c0-7.384 6.015-13.397 13.397-13.397 7.382 0 13.397 6.013 13.397 13.397S23.383 29.408 16 29.408zm7.523-10.67c-.412-.206-2.44-1.206-2.82-1.343-.38-.138-.656-.206-.933.206-.276.412-1.07 1.343-1.313 1.62-.243.276-.487.31-.9.103-.412-.207-1.741-.642-3.317-2.045-1.227-1.093-2.055-2.44-2.296-2.852-.243-.413-.026-.635.18-.84.184-.183.412-.478.618-.72.206-.243.275-.412.412-.688.137-.275.07-.516-.034-.72-.103-.207-.933-2.25-1.28-3.08-.337-.813-.68-.704-.933-.72l-.797-.014c-.276 0-.72.103-1.098.516-.38.412-1.44 1.407-1.44 3.43s1.474 3.975 1.678 4.248c.206.275 2.9 4.428 7.023 6.211 2.862 1.236 3.977 1.34 5.41 1.176 1.1-.138 2.44-1 2.783-1.964.343-.963.343-1.79.24-1.964-.103-.173-.38-.275-.793-.48z"/>
                  </svg>
                </a>
              </button>
            <button>
             <a href="{{ getContentData(61, 'button_link'); }}" target="_blank">
             <svg width="30px" class="home-icon33" height="30px" viewBox="0 -3 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7442.000000)" fill="#fff">
                        <g id="icons" transform="translate(56.000000, 160.000000)">
                            <path d="M251.988432,7291.58588 L251.988432,7285.97425 C253.980638,7286.91168 255.523602,7287.8172 257.348463,7288.79353 C255.843351,7289.62824 253.980638,7290.56468 251.988432,7291.58588 M263.090998,7283.18289 C262.747343,7282.73013 262.161634,7282.37809 261.538073,7282.26141 C259.705243,7281.91336 248.270974,7281.91237 246.439141,7282.26141 C245.939097,7282.35515 245.493839,7282.58153 245.111335,7282.93357 C243.49964,7284.42947 244.004664,7292.45151 244.393145,7293.75096 C244.556505,7294.31342 244.767679,7294.71931 245.033639,7294.98558 C245.376298,7295.33761 245.845463,7295.57995 246.384355,7295.68865 C247.893451,7296.0008 255.668037,7296.17532 261.506198,7295.73552 C262.044094,7295.64178 262.520231,7295.39147 262.895762,7295.02447 C264.385932,7293.53455 264.28433,7285.06174 263.090998,7283.18289" id="youtube-[#168]">

            </path>
                        </g>
                    </g>
                </g>
            </svg>
             </a>
           </button>
          </div>
        </div>

      </div>
      <div class="home-form">
        <h2 class="home-text55" style="font-size: 28px !important; font-family:Times New Roman;color:#000 !important">
          Hey, we’d like to know you better too!
        </h2>
        <span class="home-text56" style="font-family:Times New Roman;color:#000 !important">Our Team Will Contact You Soon!</span>
        <form id="myForm"class="home-form1" action="{{ route('message.store') }}"
              method="POST">
            @csrf
          <label class="home-text57" style="font-family:Times New Roman;color:#000 !important">Full Name</label>
          <input
            type="text"
            name="name"
            placeholder="Enter Your Full Name Here"
            class="home-textinput input Small"
            style="background-color:#f08723 !important ; broder:1px"
          />
            @if($errors->has('name'))
                <div class="error_msg" style="font-family:cursiv;color:#000 !importante">
                    {{ $errors->first('name') }}
                </div>
            @endif


          <label class="home-text58 Label" style="font-family:Times New Roman;color:#000 !important">Contact Number</label>
          <input
            type="text"
            rows=""
            name="phone"
            placeholder="Please Enter Your Mobile Number"
            class="home-textinput1 input Small"
             style="background-color:#f08723 !important ; broder:1px"
          />
            @if($errors->has('phone'))
                <div class="error_msg" style="font-family:Times New Roman">
                    {{ $errors->first('phone') }}
                </div>
            @endif
          <label class="home-text59" style="font-family:Times New Roman;color:#000 !important">Your Message</label>
          <textarea
            rows="8"
            name="message"
            placeholder="Please Let Us Know Your Quarries"
            class="home-textarea Small textarea"
             style="background-color:#f08723 !important ; broder:1px"
          ></textarea>
            @if($errors->has('message'))
                <div class="error_msg">
                    {{ $errors->first('message') }}
                </div>
            @endif

        <div class="home-sand-massage-button">
          <div class="home-button">
            <button type="submit" class="home-text60" style="font-family:Times New Roman;">Send Massage</button>
            <svg viewBox="0 0 1024 1024" class="home-icon39">
              <path
                d="M512 0c-282.77 0-512 229.23-512 512s229.23 512 512 512 512-229.23 512-512-229.23-512-512-512zM512 928c-229.75 0-416-186.25-416-416s186.25-416 416-416 416 186.25 416 416-186.25 416-416 416z"
              ></path>
              <path
                d="M354.744 706.744l90.512 90.512 285.254-285.256-285.256-285.254-90.508 90.508 194.744 194.746z"
              ></path>
            </svg>
          </div>
        </div>
    </form>
      </div>
    </div>
  </div>

  <svg
  xmlns="http://www.w3.org/2000/svg"
  viewBox="0 0 35.28 2.2"
  preserveAspectRatio="none"
  class="home-divider1"
>
  <path
    d="M0 1c3.17.8 7.29-.38 10.04-.55 2.75-.17 9.25 1.47 12.67 1.3 3.43-.17 4.65-.84 7.05-.87 2.4-.02 5.52.88 5.52.88V0H0z"
    fill="%23ffffff"
  ></path>
</svg>


  <div class="home-universities-partners">
    <div class="home-universities">
      <h1 class="home-text61" style="font-family:Times New Roman;color:#000 !important">{{ getContentData(63, 'title'); }}</h1>
      <div class="home-universities-list">
        <div class="swiper university" style="height: 180px">
            <div class="swiper-wrapper">
                @foreach ($universities as $university)
                    <div class="swiper-slide">
                        <div class="single-container single-root-class-name52" style="width:100%; height:auto; padding:0">
                            <img
                                alt="image"
                                src={{ asset($university->image) }}
                                class="single-image" style="width:85%; padding: 15px; height: 150px;"
                            />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      </div>
    </div>
    <div class="home-partners">
      <h1 class="home-text62" style="font-family:Times New Roman;color:#000 !important">Our Partners</h1>
      <div class="home-partner-list">

        <div class="swiper university" style="height: 180px">
            <div class="swiper-wrapper">
                @foreach ($partners as $partner)
                    <div class="swiper-slide">
                        <div class="single-container single-root-class-name52" style="width:100%; height:auto; padding:0">
                            <img
                                alt="image"
                                src={{ asset($partner->image) }}
                                class="single-image" style="width:85%; padding: 15px; height: 150px;"
                            />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

      </div>
    </div>
  </div>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 35.28 2.2"
    preserveAspectRatio="none"
    class="home-divider2"
  >
    <path
      d="M0 1c3.17.8 7.29-.38 10.04-.55 2.75-.17 9.25 1.47 12.67 1.3 3.43-.17 4.65-.84 7.05-.87 2.4-.02 5.52.88 5.52.88V0H0z"
      fill="%23ffffff"
    ></path>
  </svg>
  <div class="home-blog-section">
    <div class="home-blog">
      <h1 class="home-text63" style="font-family:Times New Roman;color:#000 !important">{{ getContentData(76, 'title'); }}</h1>
      <div class="home-blogs">


        <div class="blog-post-card4-blog-post-card blog-post-card4-root-class-name5">
            <a href="{{route('blog.details',['id'=>$blogs[0]->id])}}">
                <img alt="image"
                    src="{{asset($blogs[0]->image)}}"
                    class="blog-post-card4-image"/>
                <div class="blog-post-card4-container">
                    <span class="blog-post-card4-text">
                        <span style="font-family:Times New Roman;color:#000 !important">
                            @php
                                use Carbon\Carbon;
                                $carbonDate = Carbon::parse($blogs[0]->created_at);
                                $formattedDate1 = $carbonDate->format('d M, Y');
                            @endphp
                            {{$formattedDate1}}
                        </span>
                    </span>
                    <span class="blog-post-card4-text1">
                    <span style="font-family:Times New Roman;color:#000 !important">
                        {{$blogs[0]->title}}
                    </span>
                    </span>
                    <div class="blog-post-card4-separator"></div>
                    <span class="blog-post-card4-text2">
                    <span style="font-family:Times New Roman;color:#000 !important">{{$blogs[0]->title}}</span>
                    </span>
                </div>
            </a>
        </div>

        <div class="home-container12">
            <div class="blog-post-card4-blog-post-card blog-post-card4-root-class-name7" >
                <a href="{{route('blog.details',['id'=>$blogs[1]->id])}}">
                    <img
                    alt="image"
                    src="{{asset($blogs[1]->image)}}"
                    class="blog-post-card4-image"
                    />
                    <div class="blog-post-card4-container">
                    <span class="blog-post-card4-text">
                        <span style="font-family:Times New Roman;color:#000 !important"> @php
                            $carbonDate = Carbon::parse($blogs[1]->created_at);
                            $formattedDate2 = $carbonDate->format('d M, Y');
                        @endphp
                        {{$formattedDate2}}</span>
                    </span>
                    <span class="blog-post-card4-text1">
                        <span style="font-family:Times New Roman;color:#000 !important">
                            {{$blogs[1]->title}}
                        </span>
                    </span>
                    <div class="blog-post-card4-separator"></div>
                    <span class="blog-post-card4-text2">
                        <span style="font-family:Times New Roman;color:#000 !important">{{$blogs[1]->subtitle}}</span>
                    </span>
                    </div>
                </a>
            </div>
            <div class="blog-post-card4-blog-post-card blog-post-card4-root-class-name8">
                <a href="{{route('blog.details',['id'=>$blogs[2]->id])}}">
                    <img
                    alt="image"
                    src="{{asset($blogs[2]->image)}}"
                    class="blog-post-card4-image"
                    />
                    <div class="blog-post-card4-container">
                    <span class="blog-post-card4-text">
                        <span style="font-family:Times New Roman;color:#000 !important">
                            @php
                                $carbonDate = Carbon::parse($blogs[2]->created_at);
                                $formattedDate3 = $carbonDate->format('d M, Y');
                            @endphp
                            {{$formattedDate3}}
                        </span>
                    </span>
                    <span class="blog-post-card4-text1">
                        <span style="font-family:Times New Roman;color:#000 !important">{{$blogs[2]->title}}</span>
                    </span>
                    <div class="blog-post-card4-separator"></div>
                    <span class="blog-post-card4-text2">
                        <span style="font-family:Times New Roman;color:#000 !important">{{$blogs[2]->subtitle}}</span>
                    </span>
                    </div>
                </a>
            </div>
        </div>
        <div class="blog-post-card4-blog-post-card blog-post-card4-root-class-name6">
            <a href="{{route('blog.details',['id'=>$blogs[3]->id])}}">
                <img
                    alt="image"
                    src="{{asset($blogs[3]->image)}}"
                    class="blog-post-card4-image"
                />
                <div class="blog-post-card4-container" style="font-family:Times New Roman;color:#000 !important">
                    <span class="blog-post-card4-text"><span>
                        @php
                            $carbonDate = Carbon::parse($blogs[3]->created_at);
                            $formattedDate4 = $carbonDate->format('d M, Y');
                        @endphp
                        {{$formattedDate4}}
                    </span></span>
                    <span class="blog-post-card4-text1">
                    <span>
                        {{$blogs[3]->title}}
                    </span>
                    </span>
                    <div class="blog-post-card4-separator"></div>
                    <span class="blog-post-card4-text2">
                    <span>{{$blogs[3]->subtitle}}</span>
                    </span>
                </div>
            </a>
        </div>



      </div>
        <div class="all-blog">
            <a href="{{route('blog')}}" style="font-family:Times New Roman;color:#000 !important;background-color:#e27033 !important">Show All Post</a>
        </div>
    </div>

  </div>

  <svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 35.28 2.2"
    preserveAspectRatio="none"
    class="home-divider3"
  >
    <path
      d="M0 1c3.17.8 7.29-.38 10.04-.55 2.75-.17 9.25 1.47 12.67 1.3 3.43-.17 4.65-.84 7.05-.87 2.4-.02 5.52.88 5.52.88V0H0z"
      fill="%23ffffff"
    ></path>
  </svg>

  <div class="ctasts" style="width: 100%">
    @include('frontend.includes.ctastatus')
  </div>



<style>
    .employee-card {
        transition: transform 0.35s cubic-bezier(.2,.9,.2,1), box-shadow 0.35s ease;
        transform-style: preserve-3d;
        cursor: pointer;
        will-change: transform;
        perspective: 1000px;
        border-radius: 15px;
        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
        background: #DC4D01; /* default background if inline not used */
        color: black;
        padding: 20px;
    }

    /* Hover: subtle lift + 3D tilt */
    .employee-card:hover {
        box-shadow: 0 25px 50px rgba(0,0,0,0.25);
    }

    /* Text & icons can stay black */
    .employee-card h3, .employee-card h5, .employee-card span {
        color: #000 !important;
        font-family: "Times New Roman", Times, serif;
    }

    /* floating idle animation */
    @keyframes floaty {
        0% { transform: translateY(0) rotateX(0) rotateY(0); }
        50% { transform: translateY(-5px) rotateX(1deg) rotateY(1deg); }
        100% { transform: translateY(0) rotateX(0) rotateY(0); }
    }
    .employee-card.idle {
        animation: floaty 6s ease-in-out infinite;
    }

</style>

{{--  <div class="home-testimonials-section" style="background-color:#84d6707a" >--}}
{{--    <div class="home-testimonial-section" >--}}
{{--      <div class="home-testimonial" style="background-color: #DC4D01;">--}}

{{--        <div class="home-testimonial-details" >--}}

{{--            @foreach ($offices as $office)--}}

{{--                <div class="testimonial-card1-testimonial-card testimonial-card1-root-class-name3 employee-card" style="background-color: #DC4D01 !important; color:black !important;">--}}

{{--                    <div class="testimonial-card1-testimonial">--}}
{{--                    <h3 class="testimonial-card1-text" style="font-family:Times New Roman; color:#000 !important">--}}
{{--                        {{ $office->title }}--}}
{{--                    </h3>--}}

{{--                    <h5 class="testimonial-card" style="font-family:Times New Roman ; color:#000 !important;font-size: 18px">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="15" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>--}}
{{--                        {{ $office->address }}--}}
{{--                    </h5>--}}

{{--                    <span class="testimonial-card1-text1" style="font-family:Times New Roman ; color:#000 !important;font-size: 18px">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>--}}
{{--                        {{ $office->phone }}--}}
{{--                    </span>--}}


{{--                    <span class="testimonial-card1-text1" style="font-family:Times New Roman ; color:#000 !important;font-size: 18px">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>--}}
{{--                        {{ $office->email }}--}}
{{--                    </span>--}}

{{--                    <span class="testimonial-card1-text1" style="font-family:Times New Roman ; color:#000 !important;font-size: 18px">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>--}}
{{--                        {{ $office->working_hour }}--}}
{{--                    </span>--}}


{{--                    </div>--}}
{{--                </div>--}}

{{--          @endforeach--}}



{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}


<div class="home-testimonials-section">
    <div class="home-testimonial-section">
        <div class="home-testimonial">

            <div class="home-testimonial-details">
                @foreach ($offices as $office)
                    <div class="office-card employee-card">

                        <h3 class="office-title">
                            {{ $office->title }}
                        </h3>

                        <p class="office-item">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="15" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                            {{ $office->address }}
                        </p>

                        <p class="office-item">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                            {{ $office->phone }}
                        </p>

                        <p class="office-item">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                            {{ $office->email }}
                        </p>

                        <p class="office-item">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                            {{ $office->working_hour }}
                        </p>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

<style>
    /*.home-testimonials-section {*/
    /*    background:  #DC4D01;*/
    /*    padding: 40px 0;*/
    /*}*/

    .home-testimonial-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    .office-card {
        background: #DC4D01;
        padding: 25px;
        border-radius: 12px;
        color: #000;
        font-family: "Times New Roman", serif;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 8px 20px rgba(0,0,0,0.4) !important;

    }

    .office-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .office-title {
        font-size: 22px;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .office-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .office-item svg {
        width: 18px;
        height: 18px;
        fill: #000;
        flex-shrink: 0;
    }

</style>

<script>
    (function(){
        const cards = document.querySelectorAll('.employee-card');

        cards.forEach(card => {
            // idle floating animation
            card.classList.add('idle');

            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const px = (e.clientX - rect.left) / rect.width; // 0..1
                const py = (e.clientY - rect.top) / rect.height; // 0..1

                const rotateY = (px - 0.5) * 20; // -10 .. +10 deg
                const rotateX = (0.5 - py) * 12; // -6 .. +6 deg
                const translateZ = 12;

                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(${translateZ}px) scale(1.04)`;
                card.style.boxShadow = `${-rotateY*1.5}px ${20 + Math.abs(rotateX)*1.2}px 50px rgba(0,0,0,0.25)`;

                card.classList.remove('idle');
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
                card.style.boxShadow = '';
                setTimeout(() => card.classList.add('idle'), 200);
            });

            // keyboard accessibility
            card.addEventListener('focusin', () => {
                card.style.transform = 'translateY(-6px) scale(1.03)';
                card.classList.remove('idle');
            });
            card.addEventListener('focusout', () => {
                card.style.transform = '';
                setTimeout(() => card.classList.add('idle'), 200);
            });
        });
    })();
</script>





 <!-- Swiper JS -->
 <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      autoplay: {
        delay: 8000,
        disableOnInteraction: false,
      },
      keyboard: {
            enabled: true,
            onlyInViewport: false
        },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    var swiper = new Swiper(".university", {
        slidesPerView: 5,
        spaceBetween: 10,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        keyboard: {
            enabled: true,
            onlyInViewport: false
        },
    });


    // A $( document ).ready() block.
    $(document).ready(function() {
        $(".tab-link").click(function(){
            var id = $(this).attr('data-id');
            $(".tab-block").addClass("d-none");
            $("#" + id).removeClass("d-none");
            $(".tab-link").removeClass("active");
            $(this).addClass("active");
        });
    });
  </script>

<script>
 document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission for now

    setTimeout(function() {
      alert("Form submitted successfully!");

      // Now submit the form programmatically
      document.getElementById("myForm").submit();
    }, 1000); // Show success message after 1 second
  });
</script>


<script>
    $(document).ready(function() {
        // Show modal on page load after 1 second
        setTimeout(function() {
            $('#emailModal').modal('show');
        }, 1000);


    });
</script>

<script>
    $(document).ready(function() {
        $('#emailModal form').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            let form = $(this);
            let url = form.attr('action');
            let data = form.serialize();

            $.post(url, data, function(response) {
                // Show a success message inside the modal
                form.find('.form-input').html('<p class="text-success">Thank you for subscribing!</p>');
            }).fail(function(xhr) {
                // Optional: show error message
                alert('Something went wrong. Please try again.');
            });
        });
    });
</script>


@endsection

