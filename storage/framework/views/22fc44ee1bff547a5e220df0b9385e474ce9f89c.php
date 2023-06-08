<?php $__env->startSection('content'); ?>


<?php $subTotal = 0; ?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('front_end/img/breadcrumb.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php if(session('cart')): ?>
                                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php $subTotal += $details['price'] * $details['quantity'] ?>
                                    <tr data-id="<?php echo e($id); ?>"  >
                                        <td class="shoping__cart__item">
                                            <img width="7%" src="<?php echo e(asset('/uploads/books/thumbs/'.$details['image'] )); ?>" alt="">
                                            <h5><?php echo e($details['name']); ?></h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                           <?php echo e($details['price']); ?>

                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <p style="display: none" class="product_qty"><?php echo e($details['quantity']); ?></p>
                                                    <input type="text" class="quantity_input" value="<?php echo e($details['quantity']); ?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total subData_<?php echo e($details['name']); ?>" >
                                            <?php echo e($total = $details['price'] * $details['quantity']); ?>

                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close remove-from-cart"></span>
                                        </td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endif; ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="shoping__cart__btns">
                    <a href="<?php echo e(url('student/home')); ?>" class="primary-btn cart-btn">CONTINUE SHOPPING</a>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>

                        <li>Total <span class="total_items_price"><?php echo e($subTotal); ?></span></li>
                    </ul>
                    <a href="<?php echo e(url('student/checkout')); ?>" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
$(document).ready(function() {


    $(".qtybtn").click(function(e) {
        e.preventDefault();
        let ele = $(this);
        let qtyValue = $(this).closest('.pro-qty').find(".quantity_input").val();
        let productQty = 0;
        if($(this).hasClass('dec')) {
            productQty = parseInt(qtyValue) -1;
        }else {
            productQty = parseInt(qtyValue) +1;
        }
        $.ajax({
            url: '<?php echo e(url('student/update-cart')); ?>',
            method: "patch",
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                id: ele.parents("tr").attr("data-id"),
                quantity:parseInt(productQty)
            },
            success: function (response) {
                console.log(response);
                var data = response.result;
                var newPrice = '0.00';
                var totalItemsPrice = [];
                $.each(data, function(index) {
                    newPrice = data[index].price* data[index].quantity;
                    console.log(ele.parents("tr").find(".subData_"+data[index].name))
                    ele.parents("tr").find(".subData_"+data[index].name).text(parseFloat(newPrice).toFixed(2));
                    totalItemsPrice.push(newPrice);
                });
                var totalPrice =  totalItemsPrice.reduce( (a,b) => a+b ,0 );
                $(".total_items_price").text(parseFloat(totalPrice).toFixed(2));
            }

        });

    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '<?php echo e(url('student/remove-from-cart')); ?>',
                method: "DELETE",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    var data = response.result;
                    var newPrice = '0.00';

                    var totalItemsPrice = [];
                    $.each(data, function(index) {

                        newPrice = data[index].price* data[index].quantity;
                        ele.parents("tr").find(".subData_"+data[index].name).text(parseFloat(newPrice).toFixed(2));
                        totalItemsPrice.push(newPrice);
                    });

                    var totalPrice =  totalItemsPrice.reduce( (a,b) => a+b ,0 );
                    $(".total_items_price").text(parseFloat(totalPrice).toFixed(2));
                    $(".fa-shopping-bag").text(response.count);
                    ele.parents("tr").remove();
                }
            });
        }
    });


// end document
});

</script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed Xampp\htdocs\my_projects\Library ManagmentV3\Library Managment\resources\views/student/layout/cart.blade.php ENDPATH**/ ?>