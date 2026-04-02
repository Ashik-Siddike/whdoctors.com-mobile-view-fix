<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Study Abroad</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <!-- Meta data -->
    <meta name="author" content="WH Doctors" />
    {{-- <meta name="title" content="{{ getContentData(127, 'title'); }}"/>
    <meta name="description" content="{{ getContentData(127, 'description'); }}"/>
    <meta name="keywords" content="{{ getContentData(127, 'subtitle'); }}">
    <link rel="image_src" href="{{ asset(getContentData(127, 'image')); }}"/> --}}

<meta name="title" content="{{ trim(optional($seo)->seo_title) }}"/>
<meta name="description" content="{{ trim(optional($seo)->seo_description) }}"/>
<meta name="keywords" content="{{ trim(optional($seo)->seo_keywords) }}">
<link rel="image_src" href="{{ asset(trim(optional($seo)->seo_image)) }}"/>


    @include('frontend.includes.favicon')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
        background-color: skyblue;
      }
    </style>
    <style>
      [data-thq="thq-dropdown"]:hover > [data-thq="thq-dropdown-list"] {
          display: flex;
        }

        [data-thq="thq-dropdown"]:hover > div [data-thq="thq-dropdown-arrow"] {
          transform: rotate(90deg);
        }
        .upload-btn{
            background-color: skyblue;
            border: 2px solid #441316;
            color: #fff;
            padding: 6px 12px;
            height: 44px;
            cursor: pointer;
            border-radius: 0;
            display: inline-block;
            margin-top: 0px;
        }
        .error_msg{
            font-size: 12px;
            font-weight: 500;
            color: #dc3545;
        }
    </style>
  </head>
  <body>
    <div>
      <link href=" {{asset('css/study-in-australia.css')}}" rel="stylesheet" />

      <div class="study-in-australia-container">
        @include('frontend.includes.top-header')
        <div class="study-in-australia-container01">
          <div
            class="navbar-interactive-container navbar-interactive-root-class-name1"
          >
          @include('frontend.includes.navbar')
          </div>
        </div>
        <div class="study-in-australia-banner">
          <h1 class="study-in-australia-text" style="font-family:Times New Roman;">
            Study In {{ $country->name }}</span></h1>
          <div class="study-in-australia-container02"></div>
          <span class="study-in-australia-text001">
            <span class="study-in-australia-text002" style="font-family:Times New Roman;">
                Planning to study in {{ $country->name }}</span>
            </span>
            <br />
          </span>
        </div>
          @include('frontend.includes.university-content')
      </div>
        </header>
      </div>
    </div>
    <script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
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
        function imageUpload( e ) {
            var imgPath = e.value;
            var ext = imgPath.substring( imgPath.lastIndexOf( '.' ) + 1 ).toLowerCase();
            if ( ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg" || ext == "pdf" || ext == "docx" || ext == "doc") {
                readURL( e, e.id );
                $( '.' + e.id + 'error' ).hide()
                $( '#' + e.id + 'Delete' ).removeClass( 'd-none' );
                $( '.btn-submit' ).prop( "disabled", false );
            } else {
                $( '.' + e.id + 'error' ).html( 'Select a jpg, jpeg, png type image file.' ).show();
                $("#" + e.id + "_data").attr("value", "");
                $( '#' + e.id + 'Preview' ).attr( 'src', "" );
                $( '#' + e.id ).val( null );
                $( '#' + e.id + 'Delete' ).addClass( 'd-none' );
                $( '.btn-submit' ).prop( "disabled", true );
            }
        }

        var imageName;
        function readURL( input, id ) {
            if ( input.files && input.files[ 0 ] ) {
                imageName = input.files[0].name;
                var reader = new FileReader();
                reader.readAsDataURL( input.files[ 0 ] );
                reader.onload = function ( e ) {
                    $( '#' + id + 'Preview' ).attr( 'src', e.target.result ).show();
                    $( '#' + id + 'Delete' ).css( 'display', 'flex' );
                    $( '#' + id + 'Delete' ).removeClass( 'd-none' );
                    $( '#' + id + 'Name' ).html( input.files[ 0 ].name );
                    $("#" + id + "_data").attr("value", imageName);
                };
            }
        }
        function removeImage(id) {
            $( "#" + id ).val( null );
            $( '#' + id + 'Preview' ).attr( 'src', noImage  );
            $( "#" + id + "_data").attr("value", "");
            $( '#' + id + 'Name' ).html( 'Not selected' );
            $( '#' + id + 'Delete' ).css( 'display', 'none' );
            $( '#' + id + 'Delete' ).addClass( 'd-none' );
        }
    </script>

<script>
$(document).ready(function () {
    $('.apply-now-form-form').submit(function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('.apply-now-form-form').prepend('<div class="alert alert-success">Apply created successfully</div>');
                $('.apply-now-form-form')[0].reset();
            },
            error: function (xhr) {
                $('.apply-now-form-form').prepend('<div class="alert alert-danger">Something went wrong!</div>');
            }
        });
    });
});

</script>




  </body>
</html>



@extends('frontend.app')

@section('body')

@endsection
