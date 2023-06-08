<?php $__env->startSection('content'); ?>


 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('front_end/img/breadcrumb.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
 <!-- Checkout Section Begin -->
 <section class="checkout spad">
    <div class="container">
        <div class="row">

        </div>
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="<?php echo e(url('student/checkout/address')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Full Name<span>*</span></p>
                                    <input type="text" name="firstname" placeholder="Enter Full Name">
                                </div>
                            </div>

                        </div>
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="text" name="email" placeholder="Email">
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="address" placeholder="Street Address" class="checkout__input__add">
                        </div>
                        <div class="checkout__input">
                            <p>City<span>*</span></p>
                            <input type="text" name="city" placeholder="City">
                        </div>


                        <div class="row">
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <label for="payment"><i class="fa fa-credit-card"></i> Payment Method</label><br>
                    <select id="payment" name="payment">
                        <option value="" disabled> --Select-- </option>
                        <option value="cash"> Cash on delievery </option>
                        <option value="card"> Card </option>

                    </select>
                  </div>
                </div>
               <div>
                <br>
                <button type="submit"  value="Continue to checkout" class="site-btn">PLACE ORDER</button>
               </div>

            </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed Xampp\htdocs\my_projects\Library ManagmentV3\Library Managment\resources\views/student/layout/checkout.blade.php ENDPATH**/ ?>