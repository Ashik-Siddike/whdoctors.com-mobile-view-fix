<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Study-Abroad - WH Doctors Study Lab Ltd.</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
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
      .study-in-australia-container01 {
            flex: 0 0 auto;
            width: 100%;
            height: auto;
            display: flex;
            align-items: flex-start;
            background-color: #f48400;
        }
      .study-abroad-container{
          display: block !important;
          min-height:30vh !important;
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
      <link href="{{ asset('css/study-abroad.css')}}" rel="stylesheet" />
      <div class="study-abroad-container">
        @include('frontend.includes.top-header')
        {{-- <div
          class="navbar-interactive-container navbar-interactive-root-class-name6"
        >
        @include('frontend.includes.navbar')
        </div> --}}
        <div class="study-in-australia-container">


            <!-- Main Study Abroad Section -->
            <div class="study-abroad-main">
              <div class="study-abroad-container">
                <!-- Animated Background -->
                <div class="animated-background"></div>

                <!-- Study Abroad Text -->
                {{-- <p class="study-abroad-text">Study Abroad</p> --}}
                  <!-- Navbar Section -->
            <div class="navbar-container">
                @include('frontend.includes.navbar')
              </div>

              </div>
            </div>

            <!-- Call to Action Status Section -->
            <div class="cta-status-container">
              @include('frontend.includes.ctastatus')
            </div>
          </div>
    </div>
    <script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
  </body>
</html>



@extends('frontend.app')
{{-- @section('seo_title')
{{ getContentData(126, 'title'); }}
@endsection

@section('seo_description')
{{ getContentData(126, 'description'); }}
@endsection

@section('seo_keywords')
{{ getContentData(126, 'subtitle'); }}
@endsection

@section('seo_image')
{{ asset(getContentData(126, 'image')); }}
@endsection --}}
@section('body')

@endsection
