<style>
    .bottom-menu-new-navlink{
        color: #000 !important;
        border-color: #dc4d01 !important;
    }
    .bottom-menu-new-navlink01{
        color: #000 !important;
        border-color: #dc4d01 !important;
    }
    .bottom-menu-new-navlink07{
        color: #000 !important;
        border-color: #dc4d01 !important;
    }
    .bottom-menu-new-navlink09{
        color: #000 !important;
        border-color: #dc4d01 !important;
    }
    .bottom-menu-new-navlink02{
        color: #000 !important;
        border-color: #dc4d01 !important;
    }
    .bottom-menu-new-header{
        background-color: #dc4d01 !important;
    }
    .bottom-menu-new-icon{
        fill: #DC4D01 !important;
    }

/* ===== MOBILE MENU (default hidden) ===== */
.mobile-menu {
    display: none !important;
    background-color: #fff !important;
}

/* ===== HAMBURGER BUTTON (default hidden on desktop) ===== */
.navbar-burger {
    display: none;
    position: fixed;
    top: 12px;
    right: 15px;
    cursor: pointer;
    padding: 8px 10px;
    z-index: 1100;
    background-color: #dc4d01;
    border-radius: 8px;
}

/* ===== MOBILE BREAKPOINT: <= 991px ===== */
@media only screen and (max-width: 991px) {

    /* Show hamburger button */
    .navbar-burger {
        display: flex !important;
        align-items: center;
        justify-content: center;
    }

    .burger-icon {
        width: 26px;
        height: 26px;
        fill: #fff;
    }

    /* Hide the desktop bottom navigation bar on mobile */
    .bottom-menu-new-root-class-name {
        display: none !important;
    }

    /* Mobile menu overlay */
    .mobile-menu {
        display: none !important;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #fff;
        width: 100%;
        height: 100vh;
        z-index: 1050;
        overflow-y: auto;
        transition: all 0.3s ease-in-out;
    }

    /* Show when active */
    .mobile-menu.active {
        display: block !important;
    }

    /* Menu header with logo & close button */
    .mobile-menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 20px;
        background-color: #dc4d01;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .mobile-menu-logo {
        font-size: 18px;
        font-weight: bold;
        color: #fff;
        font-family: 'Times New Roman', serif;
    }

    .close-button {
        cursor: pointer;
        padding: 4px;
    }

    .close-icon {
        width: 28px;
        height: 28px;
        fill: #fff;
    }

    /* Nav container */
    .mobile-nav {
        padding: 16px;
    }

    /* Nav list */
    .mobile-nav-list {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    /* Each top-level li */
    .mobile-nav-list > li {
        margin-bottom: 6px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    /* Direct links */
    .mobile-nav-list a {
        display: block;
        padding: 14px 18px;
        font-family: 'Times New Roman', serif;
        font-size: 16px;
        color: #222;
        text-decoration: none;
        background-color: #f9f9f9;
        transition: background 0.2s;
    }

    /* Dropdown trigger span */
    .mobile-nav-list li > span {
        color: #222;
        font-size: 16px;
        font-family: 'Times New Roman', serif;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 18px;
        background-color: #f9f9f9;
        cursor: pointer;
        user-select: none;
    }

    .mobile-nav-list li > span::after {
        content: '▾';
        font-size: 14px;
        color: #dc4d01;
        transition: transform 0.3s;
        margin-left: 8px;
    }

    .mobile-nav-list li.open > span::after {
        transform: rotate(180deg);
    }

    /* Submenu */
    .mobile-nav-list li ul {
        display: none;
        list-style: none;
        margin: 0;
        padding: 0;
        background-color: #fff3ee;
        border-left: 4px solid #dc4d01;
    }

    /* Show submenu when parent is open */
    .mobile-nav-list li.open > ul {
        display: block;
    }

    .mobile-nav-list li ul li {
        border-bottom: 1px solid rgba(220, 77, 1, 0.1);
    }

    .mobile-nav-list li ul li:last-child {
        border-bottom: none;
    }

    .mobile-nav-list li ul a {
        padding: 12px 24px;
        font-size: 14px;
        color: #444;
        background-color: transparent;
        box-shadow: none;
    }

    /* Appointment CTA button */
    .mobile-nav-appointment {
        display: block;
        padding: 15px 18px;
        background-color: #dc4d01;
        color: #fff !important;
        font-family: 'Times New Roman', serif;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 10px;
        text-align: center;
        margin-top: 12px;
    }
}
</style>

<header class="bottom-menu-new-header bottom-menu-new-root-class-name">
    <div class="bottom-menu-new-menu-left">
      <a href="{{route('home')}}" class="bottom-menu-new-navlink  {{ (\Request::route()->getName() == 'home') ? 'active' : 'home' }}" style="font-family:Times New Roman;">
        Home
      </a>
      <a href="{{ route('about') }}" class="bottom-menu-new-navlink01 {{ (\Request::route()->getName() == 'about') ? 'active' : 'about' }}" style="font-family:Times New Roman;">
        About
      </a>
      @if(!hasSubPage(4))
      <a href="{{ route('abroad')}}" class="bottom-menu-new-navlink07 {{ (\Request::route()->getName() == 'abroad') ? 'active' : 'abroad' }}" style="font-family:Times New Roman;">
        Abroad Study
      </a>
        @else
            <div
                data-thq="thq-dropdown"
                class="bottom-menu-new-thq-dropdown list-item" style="list-style: none">
                <div
                data-thq="thq-dropdown-toggle" class="bottom-menu-new-dropdown-toggle">
                <a href="{{ route('abroad')}}" class="bottom-menu-new-navlink02" style="font-family:Times New Roman;">
                    Abroad Study
                </a>
                <div
                    data-thq="thq-dropdown-arrow" class="bottom-menu-new-dropdown-arrow">
                    <svg viewBox="0 0 1024 1024" class="bottom-menu-new-icon">
                    <path d="M426 726v-428l214 214z"></path>
                    </svg>
                </div>
                </div>
                <ul data-thq="thq-dropdown-list" class="bottom-menu-new-dropdown-list" style="padding: 0;margin:0;">
                @foreach(getSubPageData(4) as $subpage)
                <a href="{{ route('subPage', $subpage->slug) }}" style="font-family:Times New Roman;">
                    <li
                    data-thq="thq-dropdown"
                    class="bottom-menu-new-dropdown list-item">
                    <div
                        data-thq="thq-dropdown-toggle" class="bottom-menu-new-dropdown-toggle1">
                        <span class="bottom-menu-new-text2" style="font-family:Times New Roman;">{{ $subpage->name }}</span>
                    </div>
                    </li>
                </a>
                @endforeach
                </ul>
            </div>
        @endif

        {{-- service --}}

      <div
        data-thq="thq-dropdown"
        class="bottom-menu-new-thq-dropdown list-item" style="list-style: none">
        <div
          data-thq="thq-dropdown-toggle" class="bottom-menu-new-dropdown-toggle">
          <a href="#" class="bottom-menu-new-navlink02" style="font-family:Times New Roman">
              {{ getContentData(21, 'title') }}
          </a>
          <div
            data-thq="thq-dropdown-arrow" class="bottom-menu-new-dropdown-arrow">
            <svg viewBox="0 0 1024 1024" class="bottom-menu-new-icon">
              <path d="M426 726v-428l214 214z"></path>
            </svg>
          </div>
        </div>
          <ul data-thq="thq-dropdown-list" class="bottom-menu-new-dropdown-list" style="padding: 0; margin: 0;">
              @foreach(getCategoriesData() as $category)
                  <li data-thq="thq-dropdown" class="bottom-menu-new-dropdown list-item">
                      <a href="{{ route('service', $category->slug) }}" class="bottom-menu-new-dropdown-toggle1">
                          <span class="bottom-menu-new-text2" style="font-family:Times New Roman;">{{ $category->title }}</span>
                      </a>
                  </li>
              @endforeach
          </ul>
      </div>


    </div>


    <div class="bottom-menu-new-logo">
      <a href="{{ route('home')}}" class="bottom-menu-new-navlink08">
        <img alt="image"
          src="{{ asset('images/wh%20logo%404x-600w.png') }}"
          class="bottom-menu-new-image"
        />
      </a>
    </div>


    <div class="bottom-menu-new-menu-right">
        <a href="{{route('frontend.appointment')}}" class="bottom-menu-new-navlink " style="font-family:Times New Roman;">
            Appointment
        </a>

    @if(!hasSubPage(9))
      <a href="{{ route('conference')}}" class="bottom-menu-new-navlink09 {{ (\Request::route()->getName() == 'conference') ? 'active' : 'conference' }}" style="font-family:Times New Roman;">
        {{ getContentData(23, 'title') }}
      </a>
    @else
    @endif


    {{-- Conference --}}
    <div data-thq="thq-dropdown" class="bottom-menu-new-thq-dropdown list-item" style="list-style: none">
        <div data-thq="thq-dropdown-toggle" class="bottom-menu-new-dropdown-toggle">
          <a href="#" class="bottom-menu-new-navlink02" style="font-family:Times New Roman;">
            {{ getContentData(23, 'title') }}
          </a>
          <div data-thq="thq-dropdown-arrow" class="bottom-menu-new-dropdown-arrow">
            <svg viewBox="0 0 1024 1024" class="bottom-menu-new-icon">
              <path d="M426 726v-428l214 214z"></path>
            </svg>
          </div>
        </div>
      <ul data-thq="thq-dropdown-list" class="bottom-menu-new-dropdown-list" style="padding: 0; margin: 0;">
        @foreach(getConferenceCategoriesData() as $conferenceCategories)
            <li data-thq="thq-dropdown" class="bottom-menu-new-dropdown list-item" style="font-family:Times New Roman;">
                <a href="{{ route('conferenc', $conferenceCategories->slug) }}" style="font-family:Times New Roman;">
                    <div data-thq="thq-dropdown-toggle" class="bottom-menu-new-dropdown-toggle1">
                        <span class="bottom-menu-new-text2" style="font-family:Times New Roman;">{{ $conferenceCategories->title }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
    </div>


    {{-- flybd --}}
    <div data-thq="thq-dropdown" class="bottom-menu-new-thq-dropdown list-item" style="list-style: none">
        <div data-thq="thq-dropdown-toggle" class="bottom-menu-new-dropdown-toggle">
          <a href="#" class="bottom-menu-new-navlink02" style="font-family:Times New Roman;">
            {{ getContentData(25, 'title'); }}
          </a>
          <div data-thq="thq-dropdown-arrow" class="bottom-menu-new-dropdown-arrow">
            <svg viewBox="0 0 1024 1024" class="bottom-menu-new-icon">
              <path d="M426 726v-428l214 214z"></path>
            </svg>
          </div>
        </div>
      <ul data-thq="thq-dropdown-list" class="bottom-menu-new-dropdown-list" style="padding: 0; margin: 0;">
        @foreach(getflybdCategoriesData() as $flybdcategory)
            <li data-thq="thq-dropdown" class="bottom-menu-new-dropdown list-item">
                <a href="{{ route('flybd', $flybdcategory->slug) }}" style="font-family:Times New Roman;">
                    <div data-thq="thq-dropdown-toggle" class="bottom-menu-new-dropdown-toggle1">
                        <span class="bottom-menu-new-text2" style="font-family:Times New Roman;">{{ $flybdcategory->title }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
    </div>

    {{-- abroad --}}
    <div data-thq="thq-dropdown" class="bottom-menu-new-thq-dropdown list-item" style="list-style: none">
        <div data-thq="thq-dropdown-toggle" class="bottom-menu-new-dropdown-toggle">
          <a href="#" class="bottom-menu-new-navlink02" style="font-family:Times New Roman;">
            {{ getContentData(26, 'title'); }}
          </a>
          <div data-thq="thq-dropdown-arrow" class="bottom-menu-new-dropdown-arrow">
            <svg viewBox="0 0 1024 1024" class="bottom-menu-new-icon">
              <path d="M426 726v-428l214 214z"></path>
            </svg>
          </div>
        </div>
      <ul data-thq="thq-dropdown-list" class="bottom-menu-new-dropdown-list" style="padding: 0; margin: 0;">
        @foreach(getabroadCategoriesData() as $abroadLivingCategory)
            <li data-thq="thq-dropdown" class="bottom-menu-new-dropdown list-item">
                <a href="{{ route('abroads.font', $abroadLivingCategory->slug) }}" style="font-family:Times New Roman;">
                    <div data-thq="thq-dropdown-toggle" class="bottom-menu-new-dropdown-toggle1">
                        <span class="bottom-menu-new-text2" style="font-family:Times New Roman;">{{ $abroadLivingCategory->title }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
    </div>


    </div>


<!-- Hamburger Button (only visible on mobile <= 991px) -->
<div class="navbar-burger" id="wh-burger-btn">
    <svg viewBox="0 0 1024 1024" class="burger-icon">
      <path d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z"></path>
    </svg>
</div>

<!-- Mobile Fullscreen Menu -->
<div class="mobile-menu" id="wh-mobile-menu">
    <div class="mobile-menu-header">
        <span class="mobile-menu-logo">WH Doctors</span>
        <div class="close-button" id="wh-close-btn">
            <svg viewBox="0 0 1024 1024" class="close-icon">
              <path d="M810 274l-238 238 238 238-60 60-238-238-238 238-60-60 238-238-238-238 60-60 238 238 238-238z"></path>
            </svg>
        </div>
    </div>

    <nav class="mobile-nav">
        <ul class="mobile-nav-list">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>

            <!-- Abroad Study -->
            <li>
              @if (!hasSubPage(4))
                <a href="{{ route('abroad') }}">Abroad Study</a>
              @else
                <span>Abroad Study</span>
                <ul>
                  @foreach (getSubPageData(4) as $sub)
                    <li><a href="{{ route('subPage', $sub->slug) }}">{{ $sub->name }}</a></li>
                  @endforeach
                </ul>
              @endif
            </li>

            <!-- Services -->
            <li>
              <span>{{ getContentData(21, 'title') }}</span>
              <ul>
                @foreach(getCategoriesData() as $cat)
                  <li><a href="{{ route('service', $cat->slug) }}">{{ $cat->title }}</a></li>
                @endforeach
              </ul>
            </li>

            <!-- Conference -->
            <li>
              <span>{{ getContentData(23, 'title') }}</span>
              <ul>
                @foreach(getConferenceCategoriesData() as $conf)
                  <li><a href="{{ route('conferenc', $conf->slug) }}">{{ $conf->title }}</a></li>
                @endforeach
              </ul>
            </li>

            <!-- Fly BD -->
            <li>
              <span>{{ getContentData(25, 'title') }}</span>
              <ul>
                @foreach(getflybdCategoriesData() as $flybd)
                  <li><a href="{{ route('flybd', $flybd->slug) }}">{{ $flybd->title }}</a></li>
                @endforeach
              </ul>
            </li>

            <!-- Abroad Living -->
            <li>
              <span>{{ getContentData(26, 'title') }}</span>
              <ul>
                @foreach(getabroadCategoriesData() as $abroad)
                  <li><a href="{{ route('abroads.font', $abroad->slug) }}">{{ $abroad->title }}</a></li>
                @endforeach
              </ul>
            </li>
        </ul>

        <!-- Appointment CTA -->
        <a href="{{ route('frontend.appointment') }}" class="mobile-nav-appointment">📅 Book Appointment</a>
    </nav>
</div>


  </header>

  <a href="#header">
    <div class="slide-to-top-slide-to-top">
      <svg viewBox="0 0 1024 1024" class="slide-to-top-icon">
        <path d="M316 658l-60-60 256-256 256 256-60 60-196-196z"></path>
      </svg>
    </div>
  </a>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var burger   = document.getElementById('wh-burger-btn');
      var menu     = document.getElementById('wh-mobile-menu');
      var closeBtn = document.getElementById('wh-close-btn');

      // Open menu
      if (burger) {
        burger.addEventListener('click', function () {
          menu.classList.add('active');
          document.body.style.overflow = 'hidden';
        });
      }

      // Close menu
      if (closeBtn) {
        closeBtn.addEventListener('click', function () {
          menu.classList.remove('active');
          document.body.style.overflow = '';
        });
      }

      // Close on link click
      document.querySelectorAll('.mobile-nav-list a, .mobile-nav-appointment').forEach(function(link) {
        link.addEventListener('click', function () {
          menu.classList.remove('active');
          document.body.style.overflow = '';
        });
      });

      // Touch/Click submenu toggle
      document.querySelectorAll('.mobile-nav-list > li > span').forEach(function(span) {
        span.addEventListener('click', function () {
          var parentLi = this.parentElement;
          // Close all other open submenus first
          document.querySelectorAll('.mobile-nav-list li.open').forEach(function(openLi) {
            if (openLi !== parentLi) {
              openLi.classList.remove('open');
            }
          });
          // Toggle this submenu
          parentLi.classList.toggle('open');
        });
      });
    });
  </script>
