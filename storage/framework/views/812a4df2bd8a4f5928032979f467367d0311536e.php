
<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo" style="height:10px ; width:50px">
        <a href="#"><img src="<?php echo e(asset('img/logo.png ')); ?>" style="width:50px" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"> </i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">

        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class=""><a href="<?php echo e(url('student/home')); ?>">Home</a></li>


            <li><a href="<?php echo e(url('student/about')); ?>">About Us</a></li>
            <li><a href="<?php echo e(url('student/contact')); ?>">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>


</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header" >
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="header__top__right">

                        <div class="header__top__right__language">
                            <img src="img/language.png" alt="">
                            <div> <i class="fa fa-user"></i><?php echo e(( Auth::check() ) ? Auth::user()->name : 'Login'); ?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Profile</a></li>
                                <li><a href="<?php echo e(url('student/logout')); ?>">Logout</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo"  >
                    <a href="<?php echo e(url('student/home')); ?>"><img src="<?php echo e(asset('front_end/img/logo.png')); ?>" style="height:60px; width:100px" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul id="list">
                        <li class=""><a href="<?php echo e(url('student/home')); ?>">Home</a></li>
                        <li class=""><a href="<?php echo e(url('student/about')); ?>">About Us</a></li>
                        <li class=""><a href="<?php echo e(url('student/contact')); ?>">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>

                        <li><a href="<?php echo e(url('student/cart')); ?>"><i class="fa fa-shopping-bag" > <span><?php echo e(count((array) session('cart'))); ?></span></i> </a></li>

                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

<?php /**PATH D:\installed Xampp\htdocs\my projects\Library ManagmentV3\Library Managment\resources\views/student/layout/header.blade.php ENDPATH**/ ?>