<template>
  <div class="wraper">

    <div class="sidebar" data-color="purple" data-image="/img/sideImage1.png">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Arctic Monitoring
                </a>
            </div>

            <ul class="nav nav-mobile-menu">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-dashboard"></i>
                            <p class="hidden-lg hidden-md">Arctic Monitoring</p>
                        </a>
                    </li>
                    <li class="top_nav_logo">
                        <img src="/img/logo.png">
                    </li>
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="">
                            <p>Account</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <p>Log out</p>
                        </a>
                    </li>
                    <li class="separator hidden-lg"></li>
                </ul>
            </ul><ul class="nav">
            <li class="active">
                <router-link :to="{ name: 'home' }">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </router-link>
            </li>
            <li class="side_image">
            </li>
        </ul>
        </div>
        <div class="sidebar-background" style="background-image: url(/img/sideImage1.png) "></div></div>

    <div class="main-panel">

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="navbar-brand">
                            Project Management
                        </li>

                    </ul>

                    <ul class="navbar-nav ">
                        <!-- PROFILE DROPDOWN - scrolling off the page to the right -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profile
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navDropDownLink">
                                <a class="dropdown-item" href="#">Preferences</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>

        </nav>

        <div class="content">

            <div class="container-fluid">
                   <router-view></router-view>
            </div>


        </div>
    </div>
</div>
</template>
<script>
    export default {}
</script>