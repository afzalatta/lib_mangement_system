<?php $__env->startSection('content'); ?>

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">


            <?php echo $__env->make('student.layout.search_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('front_end/img/pexels-mark-cruzat-3494806.jpg')); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="breadcrumb__text">
                                <h2>My Library</h2>
                                <div class="breadcrumb__option">
                                    <a href="<?php echo e(url('student/home')); ?>">Home</a>
                                    <span>Shop</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                        <?php
                            $allCatgories = Student::allCategory();
                        ?>


                         <?php $__currentLoopData = $allCatgories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo e(asset('/uploads/category/'.$category->image)); ?>" id="cat">

                            <h5><a href="<?php echo e(route('student.category.show', $category->id)); ?>"><?php echo e($category->name); ?></a></h5>
                        </div>
                    </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>All Books</h2>

                    </div>

                </div>
            </div>
            <div class="row featured__filter" id="book">

                <?php if(count($books) > 0): ?>
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat"  >
                    <div class="featured__item" >
                        <a href="<?php echo e(route('student.book_detail', $book->id)); ?>" id="book">
                            <div class="featured__item__pic set-bg" data-setbg="<?php echo e(asset('/uploads/books/'.$book->image )); ?>" >


                            </div>
                       </a>
                        <div class="featured__item__text">
                            <h6><a href=""><?php echo e($book->name); ?></a></h6>
                            <h5>Rs. <?php echo e($book->price); ?></h5>
                        </div>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?>
                  <p style="text-align:center">Not Found!</p>
            <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

/*============Start----Cookies============*/
function createCookie(name,value,minutes) {
    if (minutes) {
        var date = new Date();
        date.setTime(date.getTime()+(minutes*60*1000));
        var expires = "; expires="+date.toGMTString();
    } else {
        var expires = "";
    }
    document.cookie = name+"="+value+expires+"; path=/";
}
createCookie("name", "afzal", 1)
/*=============End----Cookies============*/

$(document).ready(function(){

    $('#book, #cat').mouseenter(function(){
        $(this).css('border', '2px solid #98FB98');
    });
    $('#book, #cat').mouseleave(function(){
        $(this).css('border', '');
    });

    $('a').mouseenter(function(){
        $(this).css('background-color', '#90EE90');
    });
    $('a').mouseleave(function(){
        $(this).css('background-color', '');
    });
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('student.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed Xampp\htdocs\my projects\Library ManagmentV3\Library Managment\resources\views/student/home.blade.php ENDPATH**/ ?>