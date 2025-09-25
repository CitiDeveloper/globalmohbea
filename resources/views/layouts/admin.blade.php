
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mohbea - Admin Panel</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('back/assets/images/logo/favicon.png')}}">

    <!-- page css -->
    <link href="https://fonts.cdnfonts.com/css/caviar-dreams" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/euclid-circular-b" rel="stylesheet">
<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <!-- Core css -->
    <link href="{{ asset('back/assets/css/app.min.css')}}" rel="stylesheet">
<style>
    .nav-item{
        margin-bottom: 1.5em;
        margin-top: 1.5em;
    }
    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Euclid Circular B', sans-serif;
         
           
           
           
        }
</style>
</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="{{route('home')}}">
                        <img src="{{ asset('back/assets/images/logo/logo.png')}}" width="240px;" height="80px;" alt="Logo">
                        <img class="logo-fold" src="{{ asset('back/assets/images/logo/logo-fold.png')}}" width="60px;" height="60px;" alt="Logo">
                    </a>
                </div>
                
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                     
                    </ul>
                    <ul class="nav-right">
                    
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                {{ucfirst(Auth::user()->name)}} 
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                  <img src="{{ asset('back/assets/images/avatars/thumb-3.jpg')}}"  alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                               
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Account Setting</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                              
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                            </div>
                        </li>
                       
                    </ul>
                </div>
            </div>    
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown open">
                            <a  href="{{route('home')}}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                                
                            </a>
                           
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.bookings.index') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-calendar"></i>
                                </span>
                                <span class="title">Bookings</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Tours Management</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.tours.index') }}">All Tours</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.tours.create') }}">Add New Tour</a>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            
                            <a  href="{{ route('admin.categories.index') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-tags"></i>
                                </span>
                                <span class="title">Categories</span>
                                
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="postsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon-holder">
                                  
                                    <i class="anticon anticon-file-text"></i>
                                </span>
                                <span class="title">Posts</span>
                            </a>
                         

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.posts.create') }}">Create New Post</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.posts.index') }}">List All Posts</a>
                                </li>
                               
                               
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="reviewsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon-holder">
                                    <i class="anticon anticon-star"></i>
                                </span>
                                <span class="title">Reviews</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.reviews.create') }}" class="dropdown-item">
                                        <i class="anticon anticon-plus-circle"></i> Create New Review
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.reviews.index') }}" class="dropdown-item">
                                        <i class="anticon anticon-ordered-list"></i> List All Reviews
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="{{ route('admin.reviews.index', ['filter' => 'featured']) }}" class="dropdown-item">
                                        <i class="anticon anticon-star"></i> Featured Reviews
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                

                <!-- Content Wrapper START -->
                <div class="main-content">
                     
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
                   @yield('content')
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © {{date('Y')}} Mobhea. All rights reserved.</p>
                        <span>
                            <a href="#" class="text-gray m-r-15">Term &amp; Conditions</a>
                            <a href="#" class="text-gray">Privacy &amp; Policy</a>
                        </span>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
           
           
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="{{ asset('back/assets/js/vendors.min.js')}}"></script>

    <!-- page js -->
    <script src="{{ asset('back/assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{ asset('back/assets/js/pages/dashboard-default.js')}}"></script>

    <!-- Core JS -->
    <script src="{{ asset('back/assets/js/app.min.js')}}"></script>

</body>



</html>