<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all" id="categories">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    
                    <ul>
                        <?php
                            $allCatgories = Student::allCategory();
                        ?>
                        <?php if(count($allCatgories) > 0): ?>

                            <?php $__currentLoopData = $allCatgories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li><a href="<?php echo e(route('student.category.show', $category->id)); ?>"><?php echo e($category->name); ?></a></li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>

                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search" >
                    <div class="hero__search__form">
                        <form action="<?php echo e(url('student/home?keyword')); ?>" method="GET">

                            <div class="hero__search__categories" >
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" name="search" placeholder="What do you need?" id="in">
                            <button type="submit" class="site-btn" id="site-btn">Search</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>042-1234567</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php /**PATH D:\installed Xampp\htdocs\my_projects\Library ManagmentV3\Library Managment\resources\views/student/layout/search_menu.blade.php ENDPATH**/ ?>