@extends('frontend.app')

@section('title')
Service Page
@endsection

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

<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="{{ asset('css/about-us.css') }}">
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
  }

  .swiper {
    width: 100%;
    padding-bottom: 50px;
    background: skyblue;
  }

  .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 600px;
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
    font-style: normal;
    font-weight: 700;
    border-color: #ffffff;
    border-width: 2px;
    border-left-width: 0px;
    border-right-width: 0px;
  }
  .home-details .d-none {
    display: none;
  }
  @media (max-width: 768px) {
  .blog-details {
    flex-direction: column;
    padding: 10px;
  }

  .blog-features {
    width: 100%;
  }

  .blog-image {
    height: 100%;
  }

  .blog_title {
    font-size: 16px;
  }

  .blog_subtitle {
    font-size: 13px;
  }

  .blog-date {
    font-size: 11px;
  }
}
</style>


<div class="home-container">
  @include('frontend.includes.top-header')
  <div class="service_hero" style="background: #84d6707a; width: 100%;">
    <div class="about-us-hero">
      <div class="about-us-container01">
        <h1 class="about-us-text" style="font-family:Times New Roman;">Blog & News</h1>

      </div>
    </div>
  </div>

  <div class="home-tab-silector" style="display: flex; justify-content: space-between; padding: 60px; font-family:Times New Roman;">
    <div class="blog-details">
        @php
            use Carbon\Carbon;
        @endphp
        @foreach ($blogs as $blog)
            <div class="blog-features tab-block">
                <a href="{{route('blog.details',['id'=>$blog->id])}}">
                    <img class="blog-image" src="{{ $blog->image? asset($blog->image):'' }}" alt="">
                    <div class="blog-single">
                        <h2 class="blog_title">{{ $blog->title }}</h2>
                        <h4 class="blog_subtitle">{{ $blog->subtitle }}</h4>
                        <span class="blog-date">
                            @php
                                $carbonDate = Carbon::parse($blog->created_at);
                                $formattedDate = $carbonDate->format('d M, Y');
                            @endphp
                            {{$formattedDate}}
                        </span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    {{-- <div class="latest_blogs">
        <div class="latest_blogs_content">
          <h2 class="home-text06 Headline2" style="font-size: 36px; text-align: center">
            Latest Blogs
          </h2>
          <div class="blog_contents">
            <div class="blog_content">
              <a href="#">
                <h4 style="color: #7c7a7a">11.12.23</h4>
                <h2>
                  Lorem ipsum dolor
                </h2>
                <p style="color: #7c7a7a">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
              </a>
            </div>
          </div>
          <div class="blog_contents">
            <div class="blog_content">
              <a href="#">
                <h4 style="color: #7c7a7a">11.12.23</h4>
                <h2>
                  Lorem ipsum dolor
                </h2>
                <p style="color: #7c7a7a">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
              </a>
            </div>
          </div>
          <div class="blog_contents">
            <div class="blog_content">
              <a href="#">
                <h4 style="color: #7c7a7a">11.12.23</h4>
                <h2>
                  Lorem ipsum dolor
                </h2>
                <p style="color: #7c7a7a">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
              </a>
            </div>
          </div>
          <div class="blog_contents">
            <div class="blog_content">
              <a href="#">
                <h4 style="color: #7c7a7a">11.12.23</h4>
                <h2>
                  Lorem ipsum dolor
                </h2>
                <p style="color: #7c7a7a">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
              </a>
            </div>
          </div>
        </div>
    </div> --}}
  </div>
@endsection

