<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title></title>

    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.webp')}}"/>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet"/>


    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css')}}"
          rel="stylesheet"/>

    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>


    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>


</head>

<body>

<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>

<nav class="navbar fixed-top px-0 shadow-sm bg-white">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                <img class="nav-logo-sm mx-2" src="{{asset('images/menu.svg')}}" alt="logo"/>
            </span>
            <img class="nav-logo  mx-2" src="{{asset('images/logo.webp')}}" alt="logo"/>
        </a>

        <div class="float-right h-auto d-flex">
            <div class="user-dropdown">
                <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                <div class="user-dropdown-content ">
                    <div class="mt-4 text-center">
                        <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                        <h6 class="pt-1" id="adminName">Admin Name</h6>
                        <hr class="user-dropdown-divider  p-0"/>
                    </div>
                    <a href="{{url('/userProfile')}}" class="side-bar-item">
                        <span class="side-bar-item-caption">Profile</span>
                    </a>
                    <a href="{{url("/logout")}}" class="side-bar-item">
                        <span class="side-bar-item-caption">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>


<div id="sideNavRef" class="side-nav-open">

    <a href="{{url("/dashboard")}}" class="side-bar-item">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Dashboard</span>
    </a>

    <a href="{{url("/admissionPage")}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">All Visitor</span>
    </a>
    <a href="{{url("/campus")}}" class="side-bar-item">
        <i class="bi bi-wallet"></i>
        <span class="side-bar-item-caption">Campus</span>
    </a>

    <a href="{{url("/fee")}}" class="side-bar-item">
        <i class="bi bi-collection"></i>
        <span class="side-bar-item-caption">Fee</span>
    </a>

    <a href="{{url("/invoice")}}" class="side-bar-item">
        <i class="bi bi-collection"></i>
        <span class="side-bar-item-caption">Invoice</span>
    </a>

    <a href="{{url("/shift")}}" class="side-bar-item">
        <i class="bi bi-clock"></i>
        <span class="side-bar-item-caption">Shift</span>
    </a>
    <a href="{{url("/batch")}}" class="side-bar-item">
        <i class="bi bi-building"></i>
        <span class="side-bar-item-caption">Batch</span>
    </a>
    <a href="{{url("/student")}}" class="side-bar-item">
        <i class="bi bi-mortarboard"></i>
        <span class="side-bar-item-caption">Student List</span>
    </a>

    <a href="{{url("/session")}}" class="side-bar-item">
        <i class="bi bi-calendar"></i>
        <span class="side-bar-item-caption">Session</span>
    </a>

    <!-- Professional Dropdown Menu -->
    <div class="side-bar-item dropdown">
        <a href="#" class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#sectionDropdown" aria-expanded="false" aria-controls="sectionDropdown">
            <i class="bi bi-folder"></i>
            <span class="side-bar-item-caption">Site Management</span>
            <i class="ms-auto bi bi-chevron-down"></i>
        </a>
        <div id="sectionDropdown" class="collapse">
            <a href="{{url("/logo")}}" class="side-bar-item">
                <i class="bi bi-people"></i>
                <span class="side-bar-item-caption">Change Logo</span>
            </a>
        </div>

        <div id="sectionDropdown" class="collapse">
            <a href="{{url("/navbar")}}" class="side-bar-item">
                <i class="bi bi-people"></i>
                <span class="side-bar-item-caption">Change NavBar</span>
            </a>
        </div>

        <div id="sectionDropdown" class="collapse">
            <a href="{{url("/hero-Section")}}" class="side-bar-item">
                <i class="bi bi-people"></i>
                <span class="side-bar-item-caption">Change Hero-Section</span>
            </a>
        </div>
    </div>

</div>




<div id="contentRef" class="content">
    @yield('content')
</div>


<script>
    getAdminNAme();

    function MenuBarClickHandler() {
        let sideNav = document.getElementById('sideNavRef');
        let content = document.getElementById('contentRef');
        if (sideNav.classList.contains("side-nav-open")) {
            sideNav.classList.add("side-nav-close");
            sideNav.classList.remove("side-nav-open");
            content.classList.add("content-expand");
            content.classList.remove("content");
        } else {
            sideNav.classList.remove("side-nav-close");
            sideNav.classList.add("side-nav-open");
            content.classList.remove("content-expand");
            content.classList.add("content");
        }
    }

    async function getAdminNAme() {
        let res = await axios.get("/user-profile");
        document.getElementById("adminName").textContent = res.data.data.firstName + ' ' + res.data.data.lastName;
    }

</script>

</body>
</html>
