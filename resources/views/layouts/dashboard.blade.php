<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Luxiflore - Administration Dashboard - Gestion des propriétés immobilières, annonces, utilisateurs et services">
    <meta name="keywords" content="Luxiflore, administration, immobilier, Bizerte, gestion propriétés, annonces immobilières">
    <meta name="author" content="Luxiflore">
    <meta name="robots" content="noindex, nofollow">
    {{-- @csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Luxiflore - @yield('pageTitle')</title>

    <!-- favicon -->
            <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/lf.png') }}">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all-fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- @notifyCss --}}
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Toast Notification Styles -->
    <style>
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            max-width: 400px;
        }
        
        .toast {
            background: #10b981 !important;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            margin-bottom: 10px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
            border-left: 4px solid;
            min-width: 300px;
        }
        
        .toast.show {
            transform: translateX(0);
            background: #10b981 !important;
        }
        
        .toast.success {
            border-left-color: #10b981;
            background: #10b981 !important;
        }
        
        .toast.error {
            border-left-color: #ef4444;
            background: #10b981 !important;
        }
        
        .toast.warning {
            border-left-color: #f59e0b;
            background: #10b981 !important;
        }
        
        .toast.info {
            border-left-color: #3b82f6;
            background: #10b981 !important;
        }
        
        .toast-icon {
            font-size: 20px;
            flex-shrink: 0;
        }
        
        .toast.success .toast-icon {
            color: #ffffff;
        }
        
        .toast.error .toast-icon {
            color: #ffffff;
        }
        
        .toast.warning .toast-icon {
            color: #ffffff;
        }
        
        .toast.info .toast-icon {
            color: #ffffff;
        }
        
        .toast-content {
            flex: 1;
        }
        
        .toast-title {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 4px;
            color: #ffffff;
        }
        
        .toast-message {
            font-size: 13px;
            color: #f0fdf4;
            line-height: 1.4;
        }
        
        .toast-close {
            background: none;
            border: none;
            color: #ffffff;
            cursor: pointer;
            font-size: 16px;
            padding: 0;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s;
            flex-shrink: 0;
        }
        
        .toast-close:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }
        
        @media (max-width: 768px) {
            .toast-container {
                top: 10px;
                right: 10px;
                left: 10px;
                max-width: none;
            }
            
            .toast {
                min-width: auto;
            }
        }
    </style>

    @stack('stylesheets')
</head>

<body class="home-4">

    <!-- preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="loader-dot"></div>
            <div class="loader-dot dot2"></div>
            <div class="loader-dot dot3"></div>
            <div class="loader-dot dot4"></div>
            <div class="loader-dot dot5"></div>
        </div>
    </div>
    <!-- preloader end -->


    <!-- header area -->
    @include('includes.header')
    <!-- header area end -->



    <main class="main" style="margin-top: 110px;">
        {{-- <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
            <div class="container">
                <h2 class="breadcrumb-title">@yield('sectionTitle')</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="#">Tableau de bord</a></li>
                    <li class="active">@yield('sectionTitle')</li>
                </ul>
            </div>
        </div> --}}
        @include("includes.image_page")
        <div class="user-profile py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        
                        @if (auth()->user()->is_admin == 1)
                        
                            @include('includes.side_bar_admin_dashboard')
                        @else
                            @include('includes.side_bar_dashboard')
                        @endif
                        

                    </div>
                    <div class="col-lg-9">
                        @yield('content')

                    </div>
                </div>
            </div>
        </div>

    </main>



    <!-- footer area -->
    @include('includes.footer')
    <!-- footer area end -->



    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="fas fa-angle-up"></i></a>
    <!-- scroll-top end -->

    <!-- Toast Container -->
    <div id="toast-container" class="toast-container"></div>

    <!-- js -->
    <!-- js -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter-up.js') }}"></script>
    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Handle city selection change
            $('#citySelect').on('change', function() {
                var cityId = $(this).val();
                var areaDiv = $("#area_div");
                var current = areaDiv.find("span.current");

                var ulElement = areaDiv.find("ul.list");
                // $(ulElement).attr('id', 'test');
                // console.log(ulElement)
                // Make an AJAX request to fetch areas based on the selected city
                $.ajax({
                    url: '/get-areas/' + cityId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Clear existing options
                        $('#areaSelect').empty();
                        $(current).empty();

                        $('#areaSelect').append(
                            '<option value="">Choissir une région</option>');
                        $(ulElement).empty();
                        $(ulElement).append(
                            '<li data-value="" class="option selected">Choissir une région</li>'
                        )


                        // Populate areas dropdown with new options
                        $.each(data, function(key, value) {
                            $('#areaSelect').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });

                        $.each(data, function(key, value) {
                            $(ulElement).append('<li  data-value="' + value.id +
                                '" class="option">' + value.name + ' </li>');
                        });

                        // <li data-value="" class="option selected">Choissir une ville</li>
                        // $('#areaSelect').addClass('select');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    @stack('scripts')
    {{-- @notifyJs --}}

    <!-- Toast Notification JavaScript -->
    <script>
        // Toast notification system
        class ToastNotification {
            constructor() {
                this.container = document.getElementById('toast-container');
                if (!this.container) {
                    this.container = document.createElement('div');
                    this.container.id = 'toast-container';
                    this.container.className = 'toast-container';
                    document.body.appendChild(this.container);
                }
            }

            show(type, title, message, duration = 5000) {
                const toast = document.createElement('div');
                toast.className = `toast ${type}`;
                
                const icon = this.getIcon(type);
                const titleText = title || this.getDefaultTitle(type);
                
                toast.innerHTML = `
                    <div class="toast-icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="toast-content">
                        <div class="toast-title">${titleText}</div>
                        <div class="toast-message">${message}</div>
                    </div>
                    <button class="toast-close" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                
                this.container.appendChild(toast);
                
                // Trigger animation
                setTimeout(() => {
                    toast.classList.add('show');
                }, 100);
                
                // Auto remove after duration
                if (duration > 0) {
                    setTimeout(() => {
                        this.hide(toast);
                    }, duration);
                }
                
                return toast;
            }

            hide(toast) {
                toast.classList.remove('show');
                setTimeout(() => {
                    if (toast.parentElement) {
                        toast.remove();
                    }
                }, 300);
            }

            getIcon(type) {
                const icons = {
                    success: 'fas fa-check-circle',
                    error: 'fas fa-exclamation-circle',
                    warning: 'fas fa-exclamation-triangle',
                    info: 'fas fa-info-circle'
                };
                return icons[type] || icons.info;
            }

            getDefaultTitle(type) {
                const titles = {
                    success: 'Succès',
                    error: 'Erreur',
                    warning: 'Attention',
                    info: 'Information'
                };
                return titles[type] || 'Information';
            }

            success(message, title = null, duration = 5000) {
                return this.show('success', title, message, duration);
            }

            error(message, title = null, duration = 5000) {
                return this.show('error', title, message, duration);
            }

            warning(message, title = null, duration = 5000) {
                return this.show('warning', title, message, duration);
            }

            info(message, title = null, duration = 5000) {
                return this.show('info', title, message, duration);
            }
        }

        // Initialize toast system
        const toast = new ToastNotification();

        // Check for session messages and display as toasts
        document.addEventListener('DOMContentLoaded', function() {
            // Check for success messages
            @if(session()->has('success'))
                toast.success("{{ session('success') }}");
            @endif

            // Check for error messages
            @if(session()->has('error'))
                toast.error("{{ session('error') }}");
            @endif

            // Check for warning messages
            @if(session()->has('warning'))
                toast.warning("{{ session('warning') }}");
            @endif

            // Check for info messages
            @if(session()->has('info'))
                toast.info("{{ session('info') }}");
            @endif

            // Check for validation errors
            @if($errors->any())
                @foreach($errors->all() as $error)
                    toast.error("{{ $error }}");
                @endforeach
            @endif
        });

        // Make toast available globally
        window.toast = toast;
    </script>

</body>

</html>
