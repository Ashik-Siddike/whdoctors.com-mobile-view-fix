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
</style>


<div class="home-container">
  @include('frontend.includes.top-header')
  <div class="service_hero" style="background: skyblue; width: 100%;">
    <div class="blog-hero">
      <div class="about-us-container01">
        <h1 class="about-us-text">{{ $blog->title }}</h1>

      </div>
    </div>
  </div>

  <div class="home-tab-silector" style="display: flex; justify-content: space-between; padding: 60px;">
    <div class="blog-details">
        @php
            use Carbon\Carbon;
        @endphp
        <div class="single-blog-wrapper">
            <img class="blog-image" src="{{ $blog->image? asset($blog->image):'' }}" alt="">
            <div class="blog-single-info">
                <h2 class="blog_title">{{ $blog->title }}</h2>
                <h4 class="blog_subtitle">{{ $blog->subtitle }}</h4>
                <p class="blog-description">{!! $blog->description !!}</p>
                <span class="single-blog-date">
                    @php
                        $carbonDate = Carbon::parse($blog->created_at);
                        $formattedDate = $carbonDate->format('d M, Y');
                    @endphp
                    {{$formattedDate}}
                </span>
            </div>
        </div>
    </div>
    <div class="single_page_latest_blogs">
        <div class="latest_blogs_content">
          <h2 class="home-text06 Headline2" style="font-size: 36px; text-align: center">
            Latest Blogs
          </h2>
          @foreach ($latestBlogs as $latestBlog)
            <div class="blog_contents">
                <div class="blog_content">
                <a href="{{route('blog.details',['id'=>$latestBlog->id])}}">
                    <h4 style="color: #7c7a7a">11.12.23</h4>
                    <h2>{{ $latestBlog->title }}</h2>
                    <p style="color: #7c7a7a"> {{$latestBlog->subtitle  }} </p>
                </a>
                </div>
            </div>
          @endforeach
        </div>
    </div>
  </div>
@endsection

