@include('partials.header')
@include('partials.navbar')
@include('partials.mainMenu')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            @yield('body')
        </div>
    </div>
</div>
<!-- END: Content-->

@include('partials.footer')
@include('partials.js')