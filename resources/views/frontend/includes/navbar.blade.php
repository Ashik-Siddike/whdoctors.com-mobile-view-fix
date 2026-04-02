    <style>
    /* Core Button Styles */
    .btn {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 20px;
        text-decoration: none;
        color: black;
        font-family: 'Times New Roman', serif;
        font-size: 20px;
        border: 2px solid transparent;
        border-radius: 12px;
        background-color: white;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background-color: #f2f2f2;
    }

    .pri.btn {
        border-color: #007BFF;
        background-color: #E6F0FF;
        color: #007BFF;
    }

    .menu-icon {
        width: 36px;
        height: 36px;
        margin-left: 10px;
    }

    .desktop-menu {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        padding: 20px;
        justify-content: center;  /* centers items inside */
        margin-left: auto;
        margin-right: auto;       /* centers container itself */
    }


    /* Mobile Menu */
    .mobile-menu {
        display: none;
        flex-direction: column;
        gap: 12px;
        padding: 16px;
        /*background-color: #dc4d01 !important;*/
    }

    @media (max-width: 768px) {

        .btn {

            padding: 12px 10px;

        }
        .desktop-menu {

            gap: 20px;
            margin-left: 0px;

        }

    }

    @media (max-width: 430px) {

        .btn {
            padding: 10px 12px;
            font-size: 15px;
            border-radius: 6px;
            flex-direction: row; /* চাইলে column ও করা যায় */
            justify-content: center;
            width: 100%; /* মোবাইলে পুরোটা নেয় */
        }
        /*.mobile-menu {*/
        /* */
        /*    background-color: #dc4d01 !important;*/
        /*}*/

    }
</style>

<nav class="desktop-menu">
    <a href="{{ route('abroad.university', 'Canada') }}" class="pri btn">
        <span>Canada</span>
        <img src="{{ asset('images/icons8-canada-48-200h.png') }}" alt="Canada" class="menu-icon" />
    </a>
    <a href="{{ route('abroad.university', 'Australia') }}" class="btn">
        <span>Australia</span>
        <img src="{{ asset('images/australia1-200h.png') }}" alt="Australia" class="menu-icon" />
    </a>
    <a href="{{ route('abroad.university', 'United Kingdom') }}" class="btn">
        <span>UK</span>
        <img src="{{ asset('images/icons8-united-kingdom-48-200h.png') }}" alt="UK" class="menu-icon" />
    </a>
    <a href="{{ route('abroad.university', 'United States') }}" class="btn">
        <span>Usa</span>
        <img src="{{ asset('images/icons8-usa-48-200h.png') }}" alt="USA" class="menu-icon" />
    </a>
    <a href="{{ route('abroad.university', 'Malaysia') }}" class="btn">
        <span>Malaysia</span>
        <img src="{{ asset('images/icons8-malaysia-48-200h.png') }}" alt="Malaysia" class="menu-icon" />
    </a>
</nav>

<!-- Mobile Menu -->
<nav class="mobile-menu">
    <a href="{{ route('abroad.university', 'Canada') }}" class="pri btn">
        <span>Canada</span>
        <img src="{{ asset('images/icons8-canada-48-200h.png') }}" alt="Canada" class="menu-icon" />
    </a>
    <a href="{{ route('abroad.university', 'Australia') }}" class="btn">
        <span>Australia</span>
        <img src="{{ asset('images/australia1-200h.png') }}" alt="Australia" class="menu-icon" />
    </a>
    <a href="{{ route('abroad.university', 'United Kingdom') }}" class="btn">
        <span>UK</span>
        <img src="{{ asset('images/icons8-united-kingdom-48-200h.png') }}" alt="UK" class="menu-icon" />
    </a>
    <a href="{{ route('abroad.university', 'United States') }}" class="btn">
        <span>Usa</span>
        <img src="{{ asset('images/icons8-usa-48-200h.png') }}" alt="USA" class="menu-icon" />
    </a>
    <a href="{{ route('abroad.university', 'Malaysia') }}" class="btn">
        <span>Malaysia</span>
        <img src="{{ asset('images/icons8-malaysia-48-200h.png') }}" alt="Malaysia" class="menu-icon" />
    </a>
</nav>
