<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            Fast<span>Orders</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Management</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#supplier" role="button" aria-expanded="false"
                    aria-controls="supplier">
                    {{-- <i class="link-icon" data-feather="mail"></i> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        data-name="Layer 1" viewBox="0 0 100 125" x="0px" y="0px">
                        <path
                            d="M93.75,62.9H81.1V36.353a1.25,1.25,0,0,0-1.25-1.25H52.062a1.251,1.251,0,0,0-1.223.993,32.931,32.931,0,0,0-5.453-1.664,14.694,14.694,0,1,0-13.963,0A33.455,33.455,0,0,0,5,67.1a1.248,1.248,0,0,0,.611,1.074,64.195,64.195,0,0,0,31.3,9V91.937a1.25,1.25,0,0,0,1.25,1.25H93.75A1.25,1.25,0,0,0,95,91.937V64.145A1.25,1.25,0,0,0,93.75,62.9ZM76.131,65.4h7.446v8.571l-2.839-2.839a1.251,1.251,0,0,0-1.768,0l-2.839,2.839ZM62.235,37.6h7.447v8.572l-2.84-2.84a1.251,1.251,0,0,0-1.768,0l-2.839,2.84Zm-8.923,0h6.423V49.192a1.25,1.25,0,0,0,2.134.884l4.089-4.089,4.09,4.089a1.25,1.25,0,0,0,2.134-.884V37.6H78.6V62.9H53.312ZM48.339,65.4h7.447v8.571l-2.84-2.839a1.249,1.249,0,0,0-1.767,0l-2.84,2.839ZM26.206,21.507A12.194,12.194,0,1,1,38.4,33.7H38.4A12.208,12.208,0,0,1,26.206,21.507ZM7.508,66.39A30.935,30.935,0,0,1,38.4,36.2H38.4a30.641,30.641,0,0,1,12.41,2.6V62.9H38.166a1.25,1.25,0,0,0-1.25,1.25V74.672A61.7,61.7,0,0,1,7.508,66.39Zm31.908-1h6.423V76.984a1.25,1.25,0,0,0,2.134.884l4.089-4.089,4.09,4.089a1.25,1.25,0,0,0,2.134-.884V65.4h6.422V90.687H39.416ZM92.5,90.687H67.208V65.4h6.423V76.984a1.25,1.25,0,0,0,2.134.884l4.089-4.089,4.089,4.089a1.25,1.25,0,0,0,2.134-.884V65.4H92.5Z" />
                    </svg>
                    <span class="link-title ms-2">Suppliers</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="supplier">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.suppliers') }}" class="nav-link">Suppliers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.supplier.create')}}" class="nav-link">Add Supplier</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#user" role="button" aria-expanded="false"
                    aria-controls="user">
                    {{-- <i class="link-icon" data-feather="mail"></i> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                    <span class="link-title ms-3">Users</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="user">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link">Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Users Orders</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#restaurant" role="button" aria-expanded="false"
                    aria-controls="restaurant">
                    {{-- <i class="link-icon" data-feather="mail"></i> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                    <span class="link-title ms-3">Restaurants</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="restaurant">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.restaurants') }}" class="nav-link">All Restaurants</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.restaurant.create') }}" class="nav-link">Add Restaurant</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#order" role="button" aria-expanded="false"
                    aria-controls="order">
                    {{-- <i class="link-icon" data-feather="mail"></i> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                    <span class="link-title ms-3">Orders</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="order">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link">All Orders</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Users Orders</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Pages</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button"
                    aria-expanded="false" aria-controls="general-pages">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Special pages</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="general-pages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/general/blank-page.html" class="nav-link">Blank page</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/general/faq.html" class="nav-link">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/general/invoice.html" class="nav-link">Invoice</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/general/profile.html" class="nav-link">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/general/pricing.html" class="nav-link">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/general/timeline.html" class="nav-link">Timeline</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button"
                    aria-expanded="false" aria-controls="authPages">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Authentication</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="authPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/auth/login.html" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/auth/register.html" class="nav-link">Register</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#errorPages" role="button"
                    aria-expanded="false" aria-controls="errorPages">
                    <i class="link-icon" data-feather="cloud-off"></i>
                    <span class="link-title">Error</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="errorPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/error/404.html" class="nav-link">404</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/error/500.html" class="nav-link">500</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="#" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
