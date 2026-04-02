<header class="noPrint">
    <div id="top-navbar" class="container-fluid">
        <div>
            <i class="ri-menu-2-line" id="btn" style="font-size: 22px;"></i>
        </div>

        {{-- <a href="{{ route('storage.link') }}" class="btn btn-outline-warning btn-sm mr-3">
            Storage Link
        </a>

<a href="{{route('cache.clear')}}"  class="btn btn-outline-danger btn-sm mr-3">
  Cache Clear
</a> --}}
        <ul>
            <li>
                <a href="#" id="openFullScreen" class="icon" onclick="openFullscreen()">
                    <i class="ri-fullscreen-line"></i>
                </a>
                <a href="#" id="exitFullScreen" class="icon d-none" onclick="removeFullScreen()">
                    <i class="ri-fullscreen-exit-line" ></i>
                </a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-sm-2 me-0">
                            <img id="profileImage" class="d-none" src="" alt="img" width="30" height="30" class="rounded-circle">

                            {{-- @if(Auth::user()->image) --}}
                                <img id="profileImageDB" src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('/images/user.jpeg') }}" alt="img" width="30" height="30" class="rounded-circle" style="object-fit: cover">
                            {{-- @else
                                <i class="ri-user-3-line profile-icon"></i>
                            @endif --}}

                        </div>
                        <div>
                            <p class="fw-semibold mb-0 lh-1">{{ Auth::user()->name }}</p>
                            @if(Auth::user()->designation)
                                <span class="op-7 fw-normal d-block fs-11">{{ Auth::user()->designation }}</span>
                            @endif
                        </div>
                    </div>
                </a>

                <ul class="main-header-dropdown dropdown-menu">
                    <li>
                        <a class="dropdown-item d-flex" href="{{route('profile.edit')}}">
                            <i class="ri-user-3-line fs-18 me-3 op-7"></i>Update Profile
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{route('logout')}}" class="dropdown-item d-flex" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="ri-logout-box-r-line fs-18 me-3 op-7"></i>Log Out
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
