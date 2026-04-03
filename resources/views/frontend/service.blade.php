@extends('frontend.app')

@section('title')
Service Page
@endsection


{{-- @section('seo_title')
{{ getContentData(125, 'title') }}
@endsection

@section('seo_description')
{{ getContentData(125, 'description') }}
@endsection

@section('seo_keywords')
{{ getContentData(125, 'subtitle') }}
@endsection

@section('seo_image')
{{ asset(getContentData(125, 'image')); }}
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

  @media (max-width: 768px) {
  .about-us-container01 {
    padding: 20px 16px;
  }

  .about-us-text {
    font-size: 18px;
    line-height: 1.3;
  }
}
</style>


<div class="home-container">
  @include('frontend.includes.top-header')
  <div class="service_hero" style="background:#84d6707a; width: 100%;">
    <div class="about-us-hero">
      <div class="about-us-container01" style="font-family:Times New Roman">
        <h1 class="about-us-text">{{ $category->title }}</h1>

      </div>
    </div>
  </div>

  <div class="home-tab-silector">
    <div class="home-details" >
      @foreach($services as $service)
        <div class="home-features tab-block">
          <h2 class="home-text06 Headline2" style="font-family:Times New Roman">
            {{ $service->title }}
          </h2>
          <span class="home-text07" style="font-family:Times New Roman">
              {{ $service->subtitle }}
          </span>
          <div class="home-container03">
            <span class="home-text08">
              {!! $service->description !!}
            </span>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection

