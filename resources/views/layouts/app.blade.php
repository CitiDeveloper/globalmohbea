<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | {{ $description }}</title>

    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $title }}">
    <meta name="description"
        content="{{ $description }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="/">

    <meta property="og:description"
        content=".">   

    <!-- Fonts & Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/caviar-dreams">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/styles/styles.css') }}">

    <!-- Custom Styles -->
    <style>
        .nav-scrolled {
            background-color: #5e0a15 !important;
            background-image: none !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            background-color: #5e0a15;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .alert {
            padding: 1rem 1.25rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            position: relative;
            border: 1px solid transparent;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: #0f5132;
            border-color: #badbcc;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border-color: #f5c2c7;
        }

        .alert .close-btn {
            position: absolute;
            top: 0.5rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            color: inherit;
        }

        @media (max-width: 767px) {
            #navbar {
                background-color: #5e0a15 !important;
                background-image: none !important;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .dropdown-menu {
                background-color: #5e0a15;
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
        }

        /* Desktop hover effects */
        @media (min-width: 768px) {
            .dropdown:hover .dropdown-menu {
                display: block;
                background-color: #5e0a15;
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
        }

        /* Shared styles */
        .dropdown-menu {
            display: none;
        }

        .mobile-dropdown-menu {
            display: none;
        }

        .mobile-dropdown-menu.show {
            display: block;
        }
    </style>
</head>


<body>
    <nav class="fixed top-0 left-0 right-0 z-50 bg-gradient-navbar bg-opacity-90 transition-all duration-300 md:bg-gradient-navbar md:bg-opacity-90 mobile:bg-[#5e0a15] mobile:shadow-md"
        id="navbar">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a class="flex items-center" href="/">
                <img class="h-16" src="{{ asset('assets/images/logo.png') }}" alt="Mobhea Adventures">
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a class="text-white hover-text-lavender-blush transition-colors" href="/">Home</a>
                <a class="text-white hover-text-lavender-blush transition-colors" >About
                    Us</a>

                <div class="dropdown relative">
                    <a class="text-white hover-text-lavender-blush transition-colors flex items-center"
                        >
                        Our Services
                    </a>
                   
                </div>

                <div class="dropdown relative">
                    <a class="text-white hover-text-lavender-blush transition-colors flex items-center"
                       >
                        Contact Us
                    </a>
                </div>

               
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center space-x-4">
                <button class="text-white text-2xl cursor-pointer focus:outline-none" id="mobile-menu-button"
                    type="button" onclick="toggleMobileMenu()">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="hidden md:hidden w-full bg-[#5e0a15]" id="mobile-menu">
            <div class="container mx-auto px-4 py-4 space-y-4">
                <div class="flex justify-end">
                    <i class="bi bi-x-lg text-white text-2xl cursor-pointer" onclick="toggleMobileMenu()"></i>
                </div>

                <a class="block text-white hover-text-lavender-blush py-2 transition-colors cursor-pointer"
                    href="#">Home</a>
                <a class="block text-white hover-text-lavender-blush py-2 transition-colors cursor-pointer"
                  >About Us</a>
                <a class="text-white hover-text-lavender-blush transition-colors flex items-center"
                  >
                    Exclusive Adventures
                </a>

                {{-- <div class="mobile-dropdown">
               <div class="flex justify-between items-center text-white py-2 cursor-pointer mobile-dropdown-button">
                   <span>Exclusive Adventures</span>
                   <i class="bi bi-chevron-down mobile-dropdown-icon"></i>
               </div>
               <div class="mobile-dropdown-menu hidden pl-4 space-y-2 mt-2">
                   <a class="block text-white hover-text-lavender-blush py-1 transition-colors cursor-pointer" href="#">Safari Adventures</a>
                   <a class="block text-white hover-text-lavender-blush py-1 transition-colors cursor-pointer" href="#">Cultural Tours</a>
                   <a class="block text-white hover-text-lavender-blush py-1 transition-colors cursor-pointer" href="#">Romantic Getaways</a>
               </div>
           </div> --}}

                <div class="dropdown relative">
                    <a class="text-white hover-text-lavender-blush transition-colors flex items-center"
                        >
                        Blog
                    </a>
                </div>

                <a class="px-6 py-2 border border-white text-white hover-bg-carmine hover-border-carmine transition-colors rounded-sm"
                   >
                    Get in Touch
                </a>
            </div>
        </div>
    </nav>


    @yield('content')
   <footer class="bg-mobhea-red text-white py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row justify-between items-start"><!-- Main flex container -->
            <!-- Logo Section -->
            <div class="w-full lg:w-1/3 mb-8 lg:mb-0 lg:pr-6">
                <div class=" pr-6 max-h-40">
                    <img class="w-28" src="{{ asset('assets/images/logo.png') }}" alt="MOBHEA Logo">
                </div>
            </div>
            
            <!-- Useful Pages Section -->
            <div class="w-full lg:w-1/3 mb-8 lg:mb-0 lg:px-6">
                <h3 class="text-lg font-semibold mb-4">USEFUL PAGES</h3>
                <div class="flex items-start mb-2">Home</div>
                <div class="flex items-start mb-6">About us</div>
                <div class="flex items-start mb-6">Transport Solutions</div>
            </div>
            
            <!-- Office Contact Section -->
            <div class="w-full lg:w-1/3 lg:pl-6">
                <h3 class="text-lg font-semibold mb-4">OFFICE CONTACT</h3>
                <div class="flex items-start mb-6">
                    <i class="bi bi-geo-alt text-lg mr-2"></i>
                    <span>Suite A609, Tsavo Roysambu, Lumumba Drive</span>
                </div>
                <div class="flex items-start mb-2">
                    <i class="bi bi-phone text-lg mr-2"></i>
                    <span>+254 768 069 744</span>
                </div>
                <div class="flex items-start mb-2">
                    <i class="bi bi-envelope text-lg mr-2"></i>
                    <span>info@globalmohbea.co.ke</span>
                </div>
            </div>
        </div>
    </div>
    <p style="text-align:center; padding:30px; border-top:2px solid #5e0a15; margin-top:30px;">Copyright &copy; {{date('Y')}} Global Mohbea Ltd. All rights researved.</p>
</footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</body>
<script src="{{ asset('/assets/js/styles.js') }}"></script>

</html>
<script>
    $(document).ready(function() {
        $('.review-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        });
    });
    $(document).ready(function() {
        $('.safari-card').hover(
            function() {
                $(this).find('.card-content').css('transform', 'translateY(-10px)');
            },
            function() {
                $(this).find('.card-content').css('transform', 'translateY(0)');
            }
        );
    });
</script>


<script>
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    }

    // Mobile dropdown functionality
    document.querySelectorAll('.mobile-dropdown-button').forEach(button => {
        button.addEventListener('click', function() {
            const dropdownMenu = this.nextElementSibling;
            const icon = this.querySelector('.mobile-dropdown-icon');

            dropdownMenu.classList.toggle('hidden');
            dropdownMenu.classList.toggle('show');
            icon.classList.toggle('bi-chevron-down');
            icon.classList.toggle('bi-chevron-up');
        });
    });

    // Scroll behavior for desktop
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.innerWidth >= 768) { // Desktop only
            if (window.scrollY > 50) {
                navbar.classList.add('nav-scrolled');
                navbar.style.backgroundColor = '#5e0a15';
                navbar.style.backgroundImage = 'none';
                navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.classList.remove('nav-scrolled');
                navbar.style.backgroundColor = '';
                navbar.style.backgroundImage = '';
                navbar.style.boxShadow = '';
            }
        }
    });
</script>
