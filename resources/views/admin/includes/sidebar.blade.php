<div class="sidebar sidebar-navigation active noPrint">
    <div class="logo_content">
        <a href="{{route('dashboard')}}" class="logo">
            <img class="logo-icon" src="{{asset('images/wh logo@4x-200h.png')}}">
            <div class="logo_name">
                <img src="{{asset('images/wh logo@4x-800w.png')}}" alt=""><span>WH-Doctors</span>
            </div>
        </a>
    </div>

    <ul class="nav_list ps-0 scrollbar">
        <li class="category-li">
            <span class="link_names">Main</span>
        </li>
        <li>
            <a href="{{route('dashboard')}}" class="{{ Route::is('dashboard') ? ' active-focus' : '' }}">
                <i class="ri-home-4-line"></i>
                <span class="link_names">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>

        <li>
            <a href="{{route('seo-data.index')}}" class="{{ in_array(Route::currentRouteName(), ['seo-data.index', 'seo-data.create', 'seo-data.edit']) ? 'active-focus' : '' }}">
                <i class="ri-search-line"></i>
                <span class="link_names">SEO</span>
            </a>
            <span class="tooltip">SEO</span>
        </li>

        @hasanyrole('superadmin')
        <li>
            <a href="{{ route('subscriber.index') }}"
               class="{{ Route::is('subscriber.index') ? 'active-focus' : '' }}">
                <i class="ri-search-line"></i>
                <span class="link_names">Subscriber</span>
            </a>
            <span class="tooltip">Subscriber</span>
        </li>
        @endhasallroles

        @canany(['appointments-list', 'appointments-create', 'appointments-edit', 'appointments-delete'])
            <li class="category-li">
                <span class="link_names">Appointments</span>
            </li>
        @endcan
        @canany(['appointments-list', 'appointments-create', 'appointments-edit', 'appointments-delete'])
            <li>
                <a href="{{route('appointments.index')}}" class="
                 request()->routeIs('appointments.index') ||
                request()->routeIs('appointments.show') ||
                request()->routeIs('appointments.destroy')
                ? 'active' : '' ">
                    <i class="ri-calendar-line"></i>
                    <span class="link_names">Appointments</span>
                </a>
                <span class="tooltip">Appointments</span>
            </li>
        @endcan


    @canany(['university-list', 'university-create', 'university-edit', 'university-delete', 'apply-list', 'apply-create', 'apply-edit', 'apply-delete', 'country-list'])
        <li class="category-li">
            <span class="link_names">Universities & Courses</span>
        </li>
    @endcan


    @canany(['apply-list', 'apply-create', 'apply-edit', 'apply-delete'])
        <li>
            <a href="{{route('applies')}}" class="{{ in_array(Route::currentRouteName(), ['applies', 'apply.create', 'apply.edit']) ? 'active-focus' : '' }}">
                <i class="ri-send-plane-line"></i>
                <span class="link_names">Apply</span>
            </a>
            <span class="tooltip">Apply</span>
        </li>
    @endcan

    @canany(['university-list', 'university-create', 'university-edit', 'university-delete'])
        <li>
            <a href="{{route('university')}}" class="{{ in_array(Route::currentRouteName(), ['university', 'university.create', 'university.edit']) ? 'active-focus' : '' }}">
                <i class="ri-graduation-cap-line"></i>
                <span class="link_names">University</span>
            </a>
            <span class="tooltip">University</span>
        </li>
    @endcan

    @canany(['course-list', 'course-create', 'course-edit', 'course-delete'])
        <li>
            <a href="{{route('course')}}" class="{{ in_array(Route::currentRouteName(), ['course', 'course.create', 'course.edit']) ? 'active-focus' : '' }}">
                <i class="ri-mini-program-line"></i>
                <span class="link_names">Course</span>
            </a>
            <span class="tooltip">Course</span>
        </li>
    @endcan

    {{-- @hasanyrole('superadmin|agent')
        <li>
            <a href="{{route('transactions')}}" class="{{ in_array(Route::currentRouteName(), ['transactions', 'transaction.create', 'transaction.edit']) ? 'active-focus' : '' }}">
                <i class="ri-user-3-line"></i>
                <span class="link_names">Transactions</span>
            </a>
            <span class="tooltip">Transactions</span>
        </li>

@endhasanyrole --}}

@hasanyrole('superadmin')
    <li class="category-li">
        <span class="link_names">Amount</span>
    </li>

    <li class="{{
        request()->routeIs('amount.index') ||
        request()->routeIs('amount.create') ||
        request()->routeIs('amount.show') ||
        request()->routeIs('amount.edit')
        ? 'active' : ''
    }}">
        <a href="{{ route('amount.index') }}">
           <i class="ri-bank-line"></i>

            <span>Amount</span>
        </a>
    </li>
@endhasanyrole




        @hasanyrole('superadmin|admin')
        <li class="category-li">
            <span class="link_names">Home</span>
        </li>

        <li class="{{
            request()->routeIs('slider.index') ||
            request()->routeIs('slider.create') ||
            request()->routeIs('slider.show') ||
            request()->routeIs('slider.edit')
            ? 'active' : '' }}">
            <a href="{{ route('slider.index') }}">
                <i class="ri-slideshow-line"></i>
                <span>Sliders</span>
            </a>
        </li>
        @endhasanyrole


                @hasanyrole('superadmin|admin')
                <li class="{{
                    request()->routeIs('about.index') ||
                    request()->routeIs('about.create') ||
                    request()->routeIs('about.show') ||
                    request()->routeIs('about.edit')
                    ? 'active' : '' }}">
                    <a href="{{ route('about.index') }}">
                        <i class="ri-information-line"></i>
                        <span>About Section</span>
                    </a>
                </li>
            @endhasanyrole


                @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
                <li>
                    <a href="{{route('employee')}}" class="{{ in_array(Route::currentRouteName(), ['employee']) ? 'active-focus' : '' }}">
                        <i class="ri-user-3-line"></i>
                        <span class="link_names">Employee</span>
                    </a>
                    <span class="tooltip">Employee</span>
                </li>
                @endcan

                @hasanyrole('superadmin|admin')
                <li class="{{
                    request()->routeIs('service.index') ||
                    request()->routeIs('service.create') ||
                    request()->routeIs('service.show') ||
                    request()->routeIs('service.edit')
                    ? 'active' : '' }}">
                    <a href="{{ route('service.index') }}">
                        <i class="ri-service-line"></i>
                        <span>service Point</span>
                    </a>
                </li>
            @endhasanyrole


            @hasanyrole('superadmin|admin')
            <li class="{{
                request()->routeIs('contentus.index') ||
                request()->routeIs('contentus.create') ||
                request()->routeIs('contentus.show') ||
                request()->routeIs('contentus.edit')
                ? 'active' : '' }}">
                <a href="{{ route('contentus.index') }}">
                    <i class="ri-article-line"></i>
                    <span>ContentUS</span>
                </a>
            </li>
        @endhasanyrole


                        @canany(['client-review-list', 'client-review-create', 'client-review-edit', 'client-review-delete'])
                        <li>
                            <a href="{{route('client-review')}}" class="{{ in_array(Route::currentRouteName(), ['client-review', 'client-review.create', 'client-review.edit']) ? 'active-focus' : '' }}">
                                <i class="ri-bard-line"></i>
                                <span class="link_names">Client Review</span>
                            </a>
                            <span class="tooltip">Client</span>
                        </li>
                        @endcan


        @canany(['contact-list', 'contact-delete'])
        <li>
            <a href="{{route('message')}}" class="{{ in_array(Route::currentRouteName(), ['message']) ? 'active-focus' : '' }}">
                <i class="ri-mail-open-line"></i>
                <span class="link_names">Contact Message</span>
            </a>
            <span class="tooltip">Contact Message</span>
        </li>
    @endcan


    @canany(['blog-category-list', 'blog-category-create', 'blog-category-edit', 'blog-category-delete', 'blog-list', 'blog-create', 'blog-edit', 'blog-delete'])
        <li class="category-li">
            <span class="link_names">Blog</span>
        </li>
    @endcan
    @canany(['blog-category-list', 'blog-category-create', 'blog-category-edit', 'blog-category-delete'])
        <li>
            <a href="{{route('blog.categories')}}" class="{{ in_array(Route::currentRouteName(), ['blog.categories', 'blog.category.create', 'blog.category.edit']) ? 'active-focus' : '' }}"
            >
                <i class="ri-menu-search-line"></i>
                <span class="link_names">Blog Categories</span>
            </a>
            <span class="tooltip">Category</span>
        </li>
    @endcan
    @canany(['blog-list', 'blog-create', 'blog-edit', 'blog-delete'])
        <li>
            <a href="{{route('blogs')}}" class="{{ in_array(Route::currentRouteName(), ['blogs', 'blog.create', 'blog.edit']) ? 'active-focus' : '' }}">
                <i class="ri-article-line"></i>
                <span class="link_names">Blog</span>
            </a>
            <span class="tooltip">Blog</span>
        </li>
    @endcan


    @hasanyrole('superadmin|admin')
    <li class="{{
        request()->routeIs('Office.index') ||
        request()->routeIs('Office.create') ||
        request()->routeIs('Office.show') ||
        request()->routeIs('Office.edit')
        ? 'active' : '' }}">
        <a href="{{ route('Office.index') }}">
            <i class="ri-home-line"></i>
            <span>Office</span>
        </a>
    </li>
@endhasanyrole


@hasanyrole('superadmin|admin')
    <li class="category-li">
        <span class="link_names">Nav</span>
    </li>
    <li class="{{
        request()->routeIs('aboutNav.index') ||
        request()->routeIs('aboutNav.create') ||
        request()->routeIs('aboutNav.show') ||
        request()->routeIs('aboutNav.edit')
        ? 'active' : '' }}">
        <a href="{{ route('aboutNav.index') }}">
            <i class="ri-information-line"></i>
            <span>About Nav</span>
        </a>
    </li>
@endhasanyrole





        @canany(['category-list', 'category-create', 'category-edit', 'category-delete', 'service-list', 'service-create', 'service-edit', 'service-delete'])
            <li class="category-li">
                <span class="link_names">Service</span>
            </li>
        @endcan

        @canany(['service-list', 'service-create', 'service-edit', 'service-delete'])
            <li>
                <a href="{{route('services')}}" class="{{ in_array(Route::currentRouteName(), ['services', 'service.create', 'service.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-customer-service-2-line"></i>
                    <span class="link_names">Service</span>
                </a>
                <span class="tooltip">Service</span>
            </li>
        @endcan

        @canany(['category-list', 'category-create', 'category-edit', 'category-delete'])
            <li>
                <a href="{{route('categories')}}" class="{{ in_array(Route::currentRouteName(), ['categories', 'category.create', 'category.edit']) ? 'active-focus' : '' }}"
                >
                    <i class="ri-menu-search-line"></i>
                    <span class="link_names">Service Categories</span>
                </a>
                <span class="tooltip">Service Category</span>
            </li>
        @endcan

            {{-- conference --}}

            @if(auth()->user()->hasRole('superadmin'))
            <li class="category-li">
                <span class="link_names">Conference</span>
            </li>

            <li>
                <a href="{{ route('conferences') }}" class="{{ in_array(Route::currentRouteName(), ['conferences', 'conferences.create', 'conferences.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-mic-line"></i>
                    <span class="link_names">Conference</span>
                </a>
                <span class="tooltip">Conference</span>
            </li>

            <li>
                <a href="{{ route('conference.categories') }}" class="{{ in_array(Route::currentRouteName(), ['conference.categories', 'conference.category.create', 'conference.category.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-earth-line"></i>
                    <span class="link_names">Conference Categories</span>
                </a>
                <span class="tooltip">Conference Category</span>
            </li>
        @endif


        {{-- Flybd --}}

        @if(auth()->user()->hasRole('superadmin'))
        <li class="category-li">
            <span class="link_names">Flybd</span>
        </li>

        <li>
            <a href="{{ route('flybds') }}" class="{{ in_array(Route::currentRouteName(), ['flybds', 'flybds.create', 'flybds.edit']) ? 'active-focus' : '' }}">
                <i class="ri-flight-takeoff-line"></i>
                <span class="link_names">Flybds</span>
            </a>
            <span class="tooltip">Flybd</span>
        </li>

        <li>
            <a href="{{ route('flybds.categories') }}" class="{{ in_array(Route::currentRouteName(), ['flybds.categories', 'flybds.category.create', 'flybds.category.edit']) ? 'active-focus' : '' }}">
                <i class="ri-folder-3-line"></i>
                <span class="link_names">Flybd Categories</span>
            </a>
            <span class="tooltip">Flybd Category</span>
        </li>
    @endif




    {{-- Abroad --}}

    @if(auth()->user()->hasRole('superadmin'))
    <li class="category-li">
        <span class="link_names">Abroad</span>
    </li>

    <li class="{{ request()->routeIs('abroad.index') ? 'active' : '' }}">
        <a href="{{ route('abroad.index') }}" class="{{ in_array(Route::currentRouteName(), ['abroad.index', 'abroad.create', 'abroad.edit']) ? 'active-focus' : '' }}">
            <i class="ri-earth-line"></i> <!-- Globe icon for Abroad -->
            <span class="link_names">Abroad</span>
        </a>
        <span class="tooltip">Abroad</span>
    </li>

    <li class="{{ request()->routeIs('abroad.categories*') ? 'active' : '' }}">
        <a href="{{ route('abroad.categories') }}" class="{{ in_array(Route::currentRouteName(), ['abroad.categories', 'abroad.category.create', 'abroad.category.edit']) ? 'active-focus' : '' }}">
            <i class="ri-file-list-3-line"></i>
            <span class="link_names">Abroad Categories</span>
        </a>
        <span class="tooltip">Abroad Categories</span>
    </li>
@endif




{{--
    @canany(['page-list', 'page-create', 'page-edit', 'page-delete', 'page-content-list', 'page-content-create', 'page-content-edit', 'page-content-delete'])
            <li class="category-li">
                <span class="link_names">Page Contents</span>
            </li>
        @endcan

        @canany(['page-list', 'page-create', 'page-edit', 'page-delete'])
            <li>
                <a href="{{route('pages')}}" class="{{ in_array(Route::currentRouteName(), ['pages', 'page.create', 'page.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-file-3-line"></i>
                    <span class="link_names">Page</span>
                </a>
                <span class="tooltip">Page</span>
            </li>
        @endcan


        @canany(['subpage-list', 'subpage-create', 'subpage-edit', 'subpage-delete'])
            <li>
                <a href="{{route('subpage')}}" class="{{ in_array(Route::currentRouteName(), ['subpage', 'subpage.create', 'subpage.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-file-copy-line"></i>
                    <span class="link_names">Sub Page</span>
                </a>
                <span class="tooltip">Sub Page</span>
            </li>
        @endcan


        @canany(['page-content-list', 'page-content-create', 'page-content-edit', 'page-content-delete'])
            <li>
                <a href="{{route('page-contents')}}" class="{{ in_array(Route::currentRouteName(), ['page-contents', 'page-content.create', 'page-content.edit']) ? ' active-focus' : '' }}">
                    <i class="ri-table-2"></i>
                    <span class="link_names">Page Content</span>
                </a>
                <span class="tooltip">Page Content</span>
            </li>
        @endcan --}}




        @canany(['agent-list', 'agent-create', 'agent-edit', 'agent-delete'])
        <li class="category-li">
            <span class="link_names">Page Contents</span>
        </li>

        <li>
            <a href="{{route('agent')}}" class="{{ in_array(Route::currentRouteName(), ['agent', 'agent.create', 'agent.edit']) ? 'active-focus' : '' }}">
                <i class="ri-robot-2-line"></i>
                <span class="link_names">Agent</span>
            </a>
            <span class="tooltip">Agent</span>
        </li>
        @endcan
        {{-- address --}}
        @canany(['address-list', 'address-create', 'address-edit', 'address-delete'])
        <li>
            <a href="{{route('address')}}" class="{{ in_array(Route::currentRouteName(), ['address', 'address.create', 'address.edit']) ? 'active-focus' : '' }}">
                <i class="ri-crosshair-2-line"></i>
                <span class="link_names">Address</span>
            </a>
            <span class="tooltip">Address</span>
        </li>
        @endcan

        {{-- @canany('country-list')
        <li>
            <a href="{{route('countries')}}" class="{{ in_array(Route::currentRouteName(), ['countries']) ? 'active-focus' : '' }}">
                <i class="ri-map-2-line"></i>
                <span class="link_names">Country</span>
            </a>
            <span class="tooltip">Country</span>
        </li>
        @endcan --}}

        @canany(['user-list', 'user-create', 'user-edit', 'user-delete', 'role-list', 'role-create', 'role-edit', 'role-delete'])
        <li class="category-li">
            <span class="link_names">User</span>
        </li>
        @endcan

        {{-- User --}}
        @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
        <li>
            <a href="{{route('users')}}" class="{{ in_array(Route::currentRouteName(), ['users', 'user.create', 'user.edit']) ? 'active-focus' : '' }}">
                <i class="ri-user-3-line"></i>
                <span class="link_names">User</span>
            </a>
            <span class="tooltip">User</span>
        </li>
        @endcan
        {{-- Role --}}
        @canany(['role-list', 'role-create', 'role-edit', 'role-delete'])

        <li>
            <a href="{{route('role.index')}}" class="{{ in_array(Route::currentRouteName(), ['role.index', 'role.create', 'role.edit']) ? 'active-focus' : '' }}">
                <i class="ri-shield-user-line"></i>
                <span class="link_names">Role</span>
            </a>
            <span class="tooltip">Role</span>
        </li>
        <li>
            <a href="{{route('assignrole.index')}}" class="{{ in_array(Route::currentRouteName(), ['assignrole.index', 'assignrole.edit']) ? 'active-focus' : '' }}">
                <i class="ri-user-settings-line"></i>
                <span class="link_names">Assign Role</span>
            </a>
            <span class="tooltip">Assign Role</span>
        </li>
        @endcan

        {{-- <li>
            <a href="#" class="drop-list">
                <div style="width: 20px">
                    <i class="ri-file-3-line"></i>
                    <span class="link_names">Dropdown List</span>
                </div>
                <i class="fa-solid fa-angle-down link_names"></i>
            </a>
            <ul>
                <li><a href="#">Brand personality </a></li>
                <li><a href="#">Tone of voice </a></li>
            </ul>
            <span class="tooltip">Pages</span>
        </li> --}}
    </ul>

    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <img class="d-none" id="sidebarImage" src="{{ asset('/admin') }}/assets/images/user.jpg" alt="">

                {{-- @if(Auth::user()->image) --}}
                    <img id="sidebarImageDB" src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('/images/user.jpeg')}}" alt="img" width="30" height="30" class="rounded-circle">
                {{-- @else
                    <i class="ri-user-3-line profile-icon"></i>
                @endif --}}

                <div class="name_job">
                    <div class="name">{{ Auth::user()->name }}</div>
                    @if(Auth::user()->designation)
                        <div class="job">{{ Auth::user()->designation }}</div>
                    @endif
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{route('logout')}}" class="dropdown-item d-flex" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="ri-logout-box-r-line" id="log_out"></i>
                </a>
            </form>
        </div>
    </div>
</div>
