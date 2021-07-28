<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" data-img="{{asset('app-assets/images/backgrounds/04.jpg')}}">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row position-relative">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="{{asset('app-assets/images/logo/logo.png')}}" />
                    <h3 class="brand-text">Chameleon</h3>
                </a></li>
            <li class="nav-item d-none d-md-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-disc font-medium-3" data-ticon="ft-disc"></i></a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
        <ul class="nav navbar-nav flex-row position-relative">
            <li class="nav-item mr-auto"><a class="navbar-brand" href=" ">
                    <h2 class="brand-text">Post Form</h3>
                </a></li>
            <li class="nav-item d-none d-md-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-disc font-medium-3" data-ticon="ft-disc"></i></a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <br><br><br>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item @if(\Request::routeIs('post.*')) open @endif "><a href="index.html"><i class="ft-home"></i><span class="menu-title" data-i18n=""> Post</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li class="@if(\Request::routeIs('post.create')) active @endif">
                        <a class="menu-item " href="{{route('post.create')}}">create</a>
                    </li>
                </ul> 
                <ul class="menu-content">
                    <li class="@if(\Request::routeIs('post.index')) active @endif">
                        <a class="menu-item " href="{{route('post.index')}}">Index</a>
                    </li>
                </ul>
                 
                
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
