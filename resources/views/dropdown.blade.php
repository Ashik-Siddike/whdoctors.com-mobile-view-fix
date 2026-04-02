@extends('frontend.app')

@section('title')
    rafiun Page
@endsection

{{-- SEO Meta Tags --}}
{{-- 
@section('seo_title')
    {{ getContentData(125, 'title') }}
@endsection

@section('seo_description')
    {{ getContentData(125, 'description') }}
@endsection

@section('seo_keywords')
    {{ getContentData(125, 'subtitle') }}
@endsection

@section('seo_image')
    {{ asset(getContentData(125, 'image')) }}
@endsection
--}}

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
    background: #441316;
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

  <div class="service_hero" style="background: #441316; width: 100%;">
    <div class="about-us-hero">
      <div class="about-us-container01">
        <!-- Display Category Title -->
        <h1 class="about-us-text">{{ $category->title }}</h1>
      </div>
    </div>
  </div>

  <div class="home-tab-silector">
    <div class="home-details">
      <!-- Loop through all services for the category -->
      @foreach($category->services as $service)
        <div class="home-features tab-block">
          <h2 class="home-text06 Headline2">{{ $service->title }}</h2>
          <span class="home-text07">{{ $service->subtitle }}</span>
          <div class="home-container03">
            <span class="home-text08">{!! $service->description !!}</span>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
