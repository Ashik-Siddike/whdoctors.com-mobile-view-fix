@extends('frontend.app')

@section('title')
Conference Page
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
  <div class="service_hero" style="background: #84d6707a; width: 100%;">
    <div class="about-us-hero">
      <div class="about-us-container01">
        <h1 class="about-us-text" style="font-family:Times New Roman">{{ getContentData(129, 'title') }}</h1>

      </div>
    </div>
  </div>

  <div class="home-tab-silector">
    <div class="home-details">
        <div class="home-features tab-block">
          <div class="home-container03">
            <span class="home-text08" style="margin-top: 0px">
              {!! getContentData(129, 'description') !!}
            </span>
          </div>
        </div>
    </div>
  </div>
@endsection

