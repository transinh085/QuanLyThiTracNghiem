<?php require "inc/head.php" ?>

<body>
    <!-- Page Container -->
    <!--
      Available classes for #page-container:

      GENERIC

        'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                    - Theme helper buttons [data-toggle="theme"],
                                                    - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                    - ..and/or Dashmix.layout('dark_mode_[on/off/toggle]')

      SIDEBAR & SIDE OVERLAY

        'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
        'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
        'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
        'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
        'sidebar-dark'                              Dark themed sidebar

        'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
        'side-overlay-o'                            Visible Side Overlay by default

        'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

        'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

      HEADER

        ''                                          Static Header if no class is added
        'page-header-fixed'                         Fixed Header


      FOOTER

        ''                                          Static Footer if no class is added
        'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

      HEADER STYLE

        ''                                          Classic Header style if no class is added
        'page-header-dark'                          Dark themed Header
        'page-header-glass'                         Light themed Header with transparency by default
                                                    (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
        'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                    (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

      MAIN CONTENT LAYOUT

        ''                                          Full width Main Content if no class is added
        'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
        'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

      DARK MODE

        'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
    -->
    <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-glass main-content-boxed">

        <!-- Sidebar -->
        <!--
        Sidebar Mini Mode - Display Helper classes

        Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
          If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

        Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
        Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
        Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
      -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="bg-header-dark">
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="fw-semibold text-white tracking-wide" href="index.html">
                        <span class="smini-visible">
                            D<span class="opacity-75">x</span>
                        </span>
                        <span class="smini-hidden">
                            Dash<span class="opacity-75">mix</span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>
                        <!-- Toggle Sidebar Style -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                            data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on"
                            onclick="Dashmix.layout('sidebar_style_toggle');">
                            <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                        </button>
                        <!-- END Toggle Sidebar Style -->

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                            data-action="sidebar_close">
                            <i class="fa fa-times-circle"></i>
                        </button>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="gs_landing.html">
                                <i class="nav-main-link-icon fa fa-home"></i>
                                <span class="nav-main-link-name">Home</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="javascript:void(0)">
                                <i class="nav-main-link-icon fa fa-rocket"></i>
                                <span class="nav-main-link-name">Features</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="javascript:void(0)">
                                <i class="nav-main-link-icon fab fa-paypal"></i>
                                <span class="nav-main-link-name">Pricing</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="javascript:void(0)">
                                <i class="nav-main-link-icon fa fa-envelope"></i>
                                <span class="nav-main-link-name">Contact</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Extra</li>
                        <li class="nav-main-item ms-lg-auto">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-brush"></i>
                                <span class="nav-main-link-name">Themes</span>
                            </a>
                            <ul class="nav-main-submenu nav-main-submenu-right">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme" data-theme="default" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-default"></i>
                                        <span class="nav-main-link-name">Default</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme"
                                        data-theme="./public/css/themes/xwork.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xwork"></i>
                                        <span class="nav-main-link-name">xWork</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme"
                                        data-theme="./public/css/themes/xmodern.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xmodern"></i>
                                        <span class="nav-main-link-name">xModern</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme"
                                        data-theme="./public/css/themes/xeco.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xeco"></i>
                                        <span class="nav-main-link-name">xEco</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme"
                                        data-theme="./public/css/themes/xsmooth.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xsmooth"></i>
                                        <span class="nav-main-link-name">xSmooth</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme"
                                        data-theme="./public/css/themes/xinspire.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xinspire"></i>
                                        <span class="nav-main-link-name">xInspire</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme"
                                        data-theme="./public/css/themes/xdream.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xdream"></i>
                                        <span class="nav-main-link-name">xDream</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme"
                                        data-theme="./public/css/themes/xpro.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xpro"></i>
                                        <span class="nav-main-link-name">xPro</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme"
                                        data-theme="./public/css/themes/xplay.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xplay"></i>
                                        <span class="nav-main-link-name">xPlay</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Logo -->
                    <a class="link-fx fs-lg fw-semibold text-dark" href="index.html">
                        Dash<span class="text-primary">mix</span>
                    </a>
                    <!-- END Logo -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    <!-- Menu -->
                    <div class="d-none d-lg-block">
                        <ul class="nav-main nav-main-horizontal nav-main-hover">
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="gs_landing.html">
                                    <i class="nav-main-link-icon fa fa-home"></i>
                                    <span class="nav-main-link-name">Home</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="javascript:void(0)">
                                    <i class="nav-main-link-icon fa fa-rocket"></i>
                                    <span class="nav-main-link-name">Features</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="javascript:void(0)">
                                    <i class="nav-main-link-icon fab fa-paypal"></i>
                                    <span class="nav-main-link-name">Pricing</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="javascript:void(0)">
                                    <i class="nav-main-link-icon fa fa-envelope"></i>
                                    <span class="nav-main-link-name">Contact</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Extra</li>
                            <li class="nav-main-item ms-lg-auto">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-brush"></i>
                                    <span class="nav-main-link-name">Themes</span>
                                </a>
                                <ul class="nav-main-submenu nav-main-submenu-right">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="default" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-default"></i>
                                            <span class="nav-main-link-name">Default</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme"
                                            data-theme="./public/css/themes/xwork.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xwork"></i>
                                            <span class="nav-main-link-name">xWork</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme"
                                            data-theme="./public/css/themes/xmodern.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xmodern"></i>
                                            <span class="nav-main-link-name">xModern</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme"
                                            data-theme="./public/css/themes/xeco.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xeco"></i>
                                            <span class="nav-main-link-name">xEco</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme"
                                            data-theme="./public/css/themes/xsmooth.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xsmooth"></i>
                                            <span class="nav-main-link-name">xSmooth</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme"
                                            data-theme="./public/css/themes/xinspire.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xinspire"></i>
                                            <span class="nav-main-link-name">xInspire</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme"
                                            data-theme="./public/css/themes/xdream.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xdream"></i>
                                            <span class="nav-main-link-name">xDream</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme"
                                            data-theme="./public/css/themes/xpro.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xpro"></i>
                                            <span class="nav-main-link-name">xPro</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme"
                                            data-theme="./public/css/themes/xplay.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xplay"></i>
                                            <span class="nav-main-link-name">xPlay</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END Menu -->

                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-alt-secondary d-lg-none ms-1" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-primary">
                <div class="content-header">
                    <form class="w-100" method="POST">
                        <div class="input-group">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-primary" data-toggle="layout"
                                data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                            <input type="text" class="form-control border-0" placeholder="Search or hit ESC.."
                                id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary-darker">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            <!-- Hero -->
            <div class="hero hero-lg bg-body-extra-light overflow-hidden">
                <div class="hero-inner">
                    <div class="content content-full">
                        <div class="row">
                            <div class="col-lg-5 text-center text-lg-start d-lg-flex align-items-lg-center">
                                <div>
                                    <h1 class="h2 fw-bold mb-3">
                                        Product Title
                                    </h1>
                                    <p class="fs-4 text-muted mb-5">
                                        Lead paragraph containing the main purpose of your product.
                                    </p>
                                    <div>
                                        <a class="btn btn-primary px-3 py-2 m-1" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-link opacity-50 me-1"></i> Call to action
                                        </a>
                                        <a class="btn btn-alt-primary px-3 py-2 m-1" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-link opacity-50 me-1"></i> Call to action
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 offset-lg-1 d-none d-lg-block">
                                <img class="img-fluid rounded" src="./public/media/various/promo_dashboard.png"
                                    srcset="./public/media/various/promo_dashboard@2x.png 2x" alt="Hero Promo">
                            </div>
                        </div>
                    </div>
                </div>      
                <div class="hero-meta">
                    <div>
                        <span class="d-inline-block animated bounce infinite">
                            <i class="si si-arrow-down text-muted fa-2x"></i>
                        </span>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Section 1 -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="py-5 push">
                        <h2 class="mb-2 text-center">
                            Title 1
                        </h2>
                        <h3 class="text-muted mb-0 text-center">
                            Subtitle
                        </h3>
                    </div>
                    <div class="text-center">
                        <p>
                            Your content..
                        </p>
                    </div>
                </div>
            </div>
            <!-- END Section 1 -->

            <!-- Section 2 -->
            <div class="bg-body-extra-light">
                <div class="content content-full">
                    <div class="py-5 push">
                        <h2 class="mb-2 text-center">
                            Title 2
                        </h2>
                        <h3 class="text-muted mb-0 text-center">
                            Subtitle
                        </h3>
                    </div>
                    <div class="text-center">
                        <p>
                            Your content..
                        </p>
                    </div>
                </div>
            </div>
            <!-- END Section 2 -->

            <!-- Section 3 -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="py-5 push">
                        <h2 class="mb-2 text-center">
                            Title 3
                        </h2>
                        <h3 class="text-muted mb-0 text-center">
                            Subtitle
                        </h3>
                    </div>
                    <div class="text-center">
                        <p>
                            Your content..
                        </p>
                    </div>
                </div>
            </div>
            <!-- END Section 3 -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="footer-static bg-body-extra-light">
            <div class="content py-4">
                <!-- Footer Navigation -->
                <div class="row items-push fs-sm border-bottom pt-4">
                    <div class="col-6 col-md-4">
                        <h3 class="fw-semibold">Category</h3>
                        <ul class="list list-simple-mini">
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #1
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #2
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #3
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #4
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #5
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #6
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3 class="fw-semibold">Category</h3>
                        <ul class="list list-simple-mini">
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #1
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #2
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #3
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #4
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #5
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #6
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3 class="fw-semibold">Company</h3>
                        <div class="fs-sm push">
                            1080 Sunshine Valley, Suite 2563<br>
                            San Francisco, CA 85214<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </div>
                        <h3 class="fw-semibold">Subscribe to our news</h3>
                        <form>
                            <div class="input-group">
                                <input type="email" class="form-control form-control-alt" id="dm-gs-subscribe-email"
                                    name="dm-gs-subscribe-email" placeholder="Your email..">
                                <button type="submit" class="btn btn-alt-primary">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Footer Navigation -->

                <!-- Footer Copyright -->
                <div class="row fs-sm pt-4">
                    <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold"
                            href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://1.envato.market/r6y" target="_blank">Dashmix 5.5</a> &copy;
                        <span data-toggle="year-copy"></span>
                    </div>
                </div>
                <!-- END Footer Copyright -->
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <script src="./public/js/dashmix.app.min.js"></script>
</body>

</html>