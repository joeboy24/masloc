
<header class='mb-3 my_header'>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown me-1">
                        {{-- <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Mail</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">No new mail</a></li>
                        </ul> --}}
                    </li>
                    <li class="nav-item dropdown me-3">
                        {{-- <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item">No notification available</a></li>
                        </ul> --}}
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <p class="mb-0 text-sm text-gray-300">Hello!</p>
                                <h6 class="mb-0 text-gray-300">{{auth()->user()->name}}</h6>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md"> 
                                    {{-- Joe024Joe4epH --}}
                                    <img src="/dashdir/images/faces/user3.png">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Welcome {{auth()->user()->name}}</h6>
                        </li>
                        @if(auth()->user()->status != 'Administrator')
                            <li><a class="dropdown-item" @if(auth()->user()->status == 'Lecturer') href="/lprofile" @elseif(auth()->user()->status == 'Student') href="/sprofile" @endif>
                            <i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                        @endif
                        @if(auth()->user()->status == 'Administrator')
                             <li><a class="dropdown-item" href="/companysetup"><i class="icon-mid bi bi-gear me-2"></i>Settings</a></li>
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="/logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    {{-- <div class="my_header2">
                            
        <div class="row">
            <div class="col-md-4 my_col">
                Hello!
            </div>
            <div class="col-md-4 my_col">
                Hello!
            </div>
            <div class="col-md-4 my_col">
                Hello!
            </div>
            <div class="col-md-4 my_col">
                Hello!
            </div>
            <div class="col-md-4 my_col">
                Hello!
            </div>
            <div class="col-md-4 my_col">
                Hello!
            </div>
        </div>
        
    </div> --}}
</header>