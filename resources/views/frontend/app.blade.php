<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>WH Doctors || @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta Data -->
    <meta name="author" content="WH Doctors" />
    <meta name="title" content="@yield('seo_title')" />
    <meta name="description" content="@yield('seo_description')" />
    <meta name="Resource-type" content="@yield('seo_resource_type')" />
    <meta name="keywords" content="@yield('seo_keywords')" />
    <link rel="image_src" href="https://wh-doctors.we4sell.com/upload/pageContent-image/20231210063013.jpg" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">

    <!-- Favicon and Scripts -->
    @include('frontend.includes.favicon')
    @vite(['resources/js/app.js'])

    <!-- Reset Styles -->
    <style data-tag="reset-style-sheet">
        html {
            line-height: 1.15;
        }
        body {
            margin: 0;
        }
        * {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
        }
        p, li, ul, pre, div, h1, h2, h3, h4, h5, h6, figure, blockquote, figcaption {
            margin: 0;
            padding: 0;
        }
        button {
            background-color: transparent;
        }
        button, input, optgroup, select, textarea {
            font-family: inherit;
            font-size: 100%;
            line-height: 1.15;
            margin: 0;
        }
        button, select {
            text-transform: none;
        }
        button, [type="button"], [type="reset"], [type="submit"] {
            -webkit-appearance: button;
        }
        button::-moz-focus-inner, [type="button"]::-moz-focus-inner, [type="reset"]::-moz-focus-inner, [type="submit"]::-moz-focus-inner {
            border-style: none;
            padding: 0;
        }
        button:-moz-focus, [type="button"]:-moz-focus, [type="reset"]:-moz-focus, [type="submit"]:-moz-focus {
            outline: 1px dotted ButtonText;
        }
        a {
            color: inherit;
            text-decoration: inherit;
        }
        input {
            padding: 2px 4px;
        }
        img {
            display: block;
        }
        html {
            scroll-behavior: smooth;
        }

        /* Mobile devices (up to 767px) */
@media (max-width: 767px) {
  html {
    font-size: 14px;
  }

  body {
    padding: 0 !important;
  }

  img {
    max-width: 100%;
    height: auto;
  }

  h1 {
    font-size: 24px;
  }

  h2 {
    font-size: 20px;
  }

  h3 {
    font-size: 18px;
  }

  p, li {
    font-size: 14px;
    line-height: 1.6;
  }

  .container {
    padding: 0 15px;
  }
}

/* Tablets (768px - 991px) */
@media (min-width: 768px) and (max-width: 991px) {
  html {
    font-size: 16px;
  }

  .container {
    padding: 0 25px;
  }

  h1 {
    font-size: 28px;
  }

  h2 {
    font-size: 24px;
  }

  p, li {
    font-size: 15px;
  }
}

    </style>

    <!-- Default Styles -->
    <style data-tag="default-style-sheet">
        html {
            font-family: Inter;
            font-size: 16px;
        }
        body {
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            text-transform: none;
            letter-spacing: normal;
            line-height: 1.55;
            position: relative;
            top: 0 !important;

        }
        iframe.skiptranslate {
            visibility: hidden;
            opacity: 0;
            pointer-events: none;
            z-index: -1;
        }


    </style>

    @include('frontend.includes.styles')

    <!-- Custom Dropdown Styles -->
    <style>
        [data-thq="thq-dropdown"]:hover > [data-thq="thq-dropdown-list"] {
            display: flex;
        }
        [data-thq="thq-dropdown"]:hover > div [data-thq="thq-dropdown-arrow"] {
            transform: rotate(90deg);
        }
        /* Mobile devices (up to 767px) */
@media (max-width: 767px) {
  html {
    font-size: 14px;
  }

  body {
    line-height: 1.6;
    padding: 0 !important;
  }

  iframe.skiptranslate {
    display: none !important;
  }
}

/* Tablets (768px - 991px) */
@media (min-width: 768px) and (max-width: 991px) {
  html {
    font-size: 15px;
  }

  body {
    line-height: 1.6;
    padding: 0 !important;
  }

  iframe.skiptranslate {
    display: none !important;
  }
}

    </style>

    @stack('custom-style')

    <!-- Compatibility Scripts for Older Browsers -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="css/ie/ie8.css">
    <![endif]-->
</head>
<body>
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile-fixes.css') }}" />
<div>
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" />


<!-- Trigger Button -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#emailModal">
  Subscribe
</button> --}}

<!-- Modal -->
<!-- Email Subscription Modal -->
<!-- ইমেইল সাবস্ক্রিপশন মোডাল -->

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Dynamic Body Content -->
    @yield('body')

    <!-- Footer and Header -->
    @include('frontend.includes.footer')
    @include('frontend.includes.header')
</div>
<!-- ===== GLOBAL MOBILE HAMBURGER MENU ===== -->
<button id="wh-burger-btn-global" aria-label="Open Menu" style="display:none;position:fixed;top:10px;right:12px;z-index:100000;background-color:#dc4d01;border:none;border-radius:8px;padding:8px 10px;cursor:pointer;box-shadow:0 2px 10px rgba(0,0,0,0.35);align-items:center;justify-content:center;">
  <svg viewBox="0 0 1024 1024" width="26" height="26" fill="#fff"><path d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z"></path></svg>
</button>
<div id="wh-mobile-menu-global" style="display:none;position:fixed;top:0;left:0;width:100%;height:100vh;z-index:99999;background:#fff;overflow-y:auto;">
  <div style="display:flex;justify-content:space-between;align-items:center;padding:14px 20px;background-color:#dc4d01;position:sticky;top:0;z-index:10;">
    <a href="{{ route('home') }}" style="text-decoration:none;">
      <img src="{{ asset('images/wh logo@4x-600w.png') }}" alt="WH Doctors" style="height:40px;object-fit:contain;" onerror="this.style.display='none';this.nextElementSibling.style.display='block';" />
      <span style="display:none;font-size:18px;font-weight:bold;color:#fff;font-family:'Times New Roman',serif;">WH Doctors</span>
    </a>
    <button id="wh-close-btn-global" style="background:none;border:none;cursor:pointer;padding:8px;" aria-label="Close Menu">
      <svg viewBox="0 0 1024 1024" width="28" height="28" fill="#fff"><path d="M810 274l-238 238 238 238-60 60-238-238-238 238-60-60 238-238-238-238 60-60 238 238 238-238z"></path></svg>
    </button>
  </div>
  <nav style="padding:14px;">
    <ul style="list-style:none;margin:0;padding:0;">
      <li style="margin-bottom:5px;border-radius:10px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.07);">
        <a href="{{ route('home') }}" style="display:block;padding:14px 18px;font-family:'Times New Roman',serif;font-size:16px;color:#222;text-decoration:none;background:#f9f9f9;">&#127968; Home</a>
      </li>
      <li style="margin-bottom:5px;border-radius:10px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.07);">
        <a href="{{ route('about') }}" style="display:block;padding:14px 18px;font-family:'Times New Roman',serif;font-size:16px;color:#222;text-decoration:none;background:#f9f9f9;">&#8505;&#65039; About</a>
      </li>
      <li class="wh-has-sub" style="margin-bottom:5px;border-radius:10px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.07);">
        @if(!hasSubPage(4))
          <a href="{{ route('abroad') }}" style="display:block;padding:14px 18px;font-family:'Times New Roman',serif;font-size:16px;color:#222;text-decoration:none;background:#f9f9f9;">&#127891; Abroad Study</a>
        @else
          <div class="wh-submenu-trigger" style="display:flex;justify-content:space-between;align-items:center;padding:14px 18px;background:#f9f9f9;cursor:pointer;user-select:none;">
            <span style="font-family:'Times New Roman',serif;font-size:16px;color:#222;">&#127891; Abroad Study</span>
            <span class="wh-arrow" style="color:#dc4d01;font-size:18px;line-height:1;transition:transform 0.3s;display:inline-block;">&#8250;</span>
          </div>
          <ul class="wh-submenu" style="display:none;list-style:none;margin:0;padding:0;background:#fff3ee;border-left:4px solid #dc4d01;">
            @foreach(getSubPageData(4) as $sub)
              <li style="border-bottom:1px solid rgba(220,77,1,0.1);">
                <a href="{{ route('subPage', $sub->slug) }}" style="display:block;padding:12px 24px;font-family:'Times New Roman',serif;font-size:14px;color:#444;text-decoration:none;">{{ $sub->name }}</a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
      <li class="wh-has-sub" style="margin-bottom:5px;border-radius:10px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.07);">
        <div class="wh-submenu-trigger" style="display:flex;justify-content:space-between;align-items:center;padding:14px 18px;background:#f9f9f9;cursor:pointer;user-select:none;">
          <span style="font-family:'Times New Roman',serif;font-size:16px;color:#222;">&#127973; {{ getContentData(21, 'title') }}</span>
          <span class="wh-arrow" style="color:#dc4d01;font-size:18px;line-height:1;transition:transform 0.3s;display:inline-block;">&#8250;</span>
        </div>
        <ul class="wh-submenu" style="display:none;list-style:none;margin:0;padding:0;background:#fff3ee;border-left:4px solid #dc4d01;">
          @foreach(getCategoriesData() as $cat)
            <li style="border-bottom:1px solid rgba(220,77,1,0.1);">
              <a href="{{ route('service', $cat->slug) }}" style="display:block;padding:12px 24px;font-family:'Times New Roman',serif;font-size:14px;color:#444;text-decoration:none;">{{ $cat->title }}</a>
            </li>
          @endforeach
        </ul>
      </li>
      <li class="wh-has-sub" style="margin-bottom:5px;border-radius:10px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.07);">
        <div class="wh-submenu-trigger" style="display:flex;justify-content:space-between;align-items:center;padding:14px 18px;background:#f9f9f9;cursor:pointer;user-select:none;">
          <span style="font-family:'Times New Roman',serif;font-size:16px;color:#222;">&#128203; {{ getContentData(23, 'title') }}</span>
          <span class="wh-arrow" style="color:#dc4d01;font-size:18px;line-height:1;transition:transform 0.3s;display:inline-block;">&#8250;</span>
        </div>
        <ul class="wh-submenu" style="display:none;list-style:none;margin:0;padding:0;background:#fff3ee;border-left:4px solid #dc4d01;">
          @foreach(getConferenceCategoriesData() as $conf)
            <li style="border-bottom:1px solid rgba(220,77,1,0.1);">
              <a href="{{ route('conferenc', $conf->slug) }}" style="display:block;padding:12px 24px;font-family:'Times New Roman',serif;font-size:14px;color:#444;text-decoration:none;">{{ $conf->title }}</a>
            </li>
          @endforeach
        </ul>
      </li>
      <li class="wh-has-sub" style="margin-bottom:5px;border-radius:10px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.07);">
        <div class="wh-submenu-trigger" style="display:flex;justify-content:space-between;align-items:center;padding:14px 18px;background:#f9f9f9;cursor:pointer;user-select:none;">
          <span style="font-family:'Times New Roman',serif;font-size:16px;color:#222;">&#9992;&#65039; {{ getContentData(25, 'title') }}</span>
          <span class="wh-arrow" style="color:#dc4d01;font-size:18px;line-height:1;transition:transform 0.3s;display:inline-block;">&#8250;</span>
        </div>
        <ul class="wh-submenu" style="display:none;list-style:none;margin:0;padding:0;background:#fff3ee;border-left:4px solid #dc4d01;">
          @foreach(getflybdCategoriesData() as $flybd)
            <li style="border-bottom:1px solid rgba(220,77,1,0.1);">
              <a href="{{ route('flybd', $flybd->slug) }}" style="display:block;padding:12px 24px;font-family:'Times New Roman',serif;font-size:14px;color:#444;text-decoration:none;">{{ $flybd->title }}</a>
            </li>
          @endforeach
        </ul>
      </li>
      <li class="wh-has-sub" style="margin-bottom:5px;border-radius:10px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.07);">
        <div class="wh-submenu-trigger" style="display:flex;justify-content:space-between;align-items:center;padding:14px 18px;background:#f9f9f9;cursor:pointer;user-select:none;">
          <span style="font-family:'Times New Roman',serif;font-size:16px;color:#222;">&#127758; {{ getContentData(26, 'title') }}</span>
          <span class="wh-arrow" style="color:#dc4d01;font-size:18px;line-height:1;transition:transform 0.3s;display:inline-block;">&#8250;</span>
        </div>
        <ul class="wh-submenu" style="display:none;list-style:none;margin:0;padding:0;background:#fff3ee;border-left:4px solid #dc4d01;">
          @foreach(getabroadCategoriesData() as $abroad)
            <li style="border-bottom:1px solid rgba(220,77,1,0.1);">
              <a href="{{ route('abroads.font', $abroad->slug) }}" style="display:block;padding:12px 24px;font-family:'Times New Roman',serif;font-size:14px;color:#444;text-decoration:none;">{{ $abroad->title }}</a>
            </li>
          @endforeach
        </ul>
      </li>
    </ul>
    <a href="{{ route('frontend.appointment') }}" style="display:block;margin-top:14px;padding:16px 18px;background:#dc4d01;color:#fff;text-decoration:none;border-radius:10px;text-align:center;font-family:'Times New Roman',serif;font-size:16px;font-weight:bold;box-shadow:0 4px 12px rgba(220,77,1,0.35);">
      &#128197; Book Appointment
    </a>
    <div style="margin-top:12px;padding:14px 18px;background:#fff3ee;border-radius:10px;border-left:4px solid #dc4d01;">
      <a href="tel:{{ getTopNavData('phone') }}" style="display:flex;align-items:center;gap:10px;color:#222;text-decoration:none;font-family:'Times New Roman',serif;font-size:14px;padding:6px 0;min-height:44px;">
        &#128222; {{ getTopNavData('phone') }}
      </a>
      <a href="mailto:{{ getTopNavData('email') }}" style="display:flex;align-items:center;gap:10px;color:#222;text-decoration:none;font-family:'Times New Roman',serif;font-size:14px;padding:6px 0;min-height:44px;">
        &#9993;&#65039; {{ getTopNavData('email') }}
      </a>
    </div>
  </nav>
</div>
<script>
(function(){
  var burger = document.getElementById('wh-burger-btn-global');
  var menu = document.getElementById('wh-mobile-menu-global');
  var closeBtn = document.getElementById('wh-close-btn-global');
  function checkWidth() {
    if (window.innerWidth <= 991) { burger.style.display = 'flex'; }
    else { burger.style.display = 'none'; menu.style.display = 'none'; document.body.style.overflow = ''; }
  }
  checkWidth();
  window.addEventListener('resize', checkWidth);
  burger.addEventListener('click', function(){ menu.style.display = 'block'; document.body.style.overflow = 'hidden'; });
  closeBtn.addEventListener('click', function(){ menu.style.display = 'none'; document.body.style.overflow = ''; });
  menu.querySelectorAll('a').forEach(function(l){
    l.addEventListener('click', function(){ menu.style.display = 'none'; document.body.style.overflow = ''; });
  });
  document.querySelectorAll('.wh-submenu-trigger').forEach(function(trigger){
    trigger.addEventListener('click', function(){
      var li = this.parentElement;
      var sub = li.querySelector('.wh-submenu');
      var arrow = this.querySelector('.wh-arrow');
      var isOpen = sub && sub.style.display === 'block';
      document.querySelectorAll('.wh-submenu').forEach(function(s){ s.style.display = 'none'; });
      document.querySelectorAll('.wh-arrow').forEach(function(a){ a.style.transform = ''; });
      if (!isOpen && sub) {
        sub.style.display = 'block';
        if (arrow) arrow.style.transform = 'rotate(90deg)';
      }
    });
  });
})();
</script>

<!-- Teleport Custom Scripts -->
<script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>

<!-- Common Scripts -->
{{-- <script>
  var SITEURL = "{{ URL::to('') }}";
  $(document).ready(function () {
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
  });
</script> --}}

@include('frontend.includes.scripts')
@stack('custom-scripts')
@include('frontend.includes.analytics')


{{-- <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Optional: Prevent it from showing every time by using localStorage
    if (!localStorage.getItem("emailModalShown")) {
      var myModal = new bootstrap.Modal(document.getElementById('emailModal'));
      myModal.show();
      localStorage.setItem("emailModalShown", "true");
    }
  });
</script> --}}
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var emailModalEl = document.getElementById('emailModal');
    if (emailModalEl) {
      var myModal = new bootstrap.Modal(emailModalEl);
      myModal.show();
    }
  });
</script>
</body>
</html>

