<?php $__env->startSection('content'); ?>

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">


            <?php echo $__env->make('student.layout.search_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section class="product-details spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="product__details__pic">
                                <div class="product__details__pic__item" >
                                    <img class="product__details__pic__item--large"
                                        src="<?php echo e(asset('/uploads/books/'.$book->image )); ?>" alt="">
                                </div>
                                <div class="product__details__pic__slider owl-carousel">
                                    <img data-imgbigurl="<?php echo e(asset('/uploads/books/'.$book->image )); ?>"
                                        src="<?php echo e(asset('/uploads/books/thumbs/'.$book->image )); ?>" alt="">
                                    <img data-imgbigurl="<?php echo e(asset('/uploads/books/'.$book->image )); ?>"
                                        src="<?php echo e(asset('/uploads/books/thumbs/'.$book->image )); ?>" alt="">
                                    <img data-imgbigurl="<?php echo e(asset('/uploads/books/'.$book->image )); ?>"
                                        src="<?php echo e(asset('/uploads/books/thumbs/'.$book->image )); ?>" alt="">
                                    <img data-imgbigurl="<?php echo e(asset('/uploads/books/'.$book->image )); ?>"
                                        src="<?php echo e(asset('/uploads/books/thumbs/'.$book->image )); ?>  " alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="product__details__text">
                                <h3><?php echo e($book->name); ?></h3>
                                <div class="product__details__rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <span>(18 reviews)</span>
                                </div>
                                <div class="product__details__price"> Price:<?php echo e($book->price); ?></div>
                                <h5>
                                   Book Detail
                                </h5>
                                <p>
                                        Book Name:  <?php echo e($book->name); ?> <br
                                        Category Name: <?php echo e($book->category->name); ?> <br>
                                        Author:  <?php echo e($book->author->name); ?> <br>
                                        Publisher: <?php echo e($book->publisher->name); ?>


                                 </p>

                                 <div class="product__details__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input class="qty" type="text" value="1">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo e($book->id); ?>" class="book_id">
                                <a href="javascript:void(0)" class="primary-btn add-cart" id="primary-btn">ADD TO CARD </a>

                                <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                                <ul>
                                    <li><b>Availability In Stock</b> <span>  <?php echo e($book->stock_quantity_available); ?></span></li>
                                    <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                                    <li><b>Weight</b> <span>0.5 kg</span></li>
                                    <li><b>Share on</b>
                                        <div class="share">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                            <a href="#"><i class="fa fa-pinterest"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="product__details__tab">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="product__details__tab__desc">
                                            <h6>Product Description</h6>
                                            <p><?php echo e($book->description); ?></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <!-- Categories Section End -->
    <!-- Latest Product Section Begin -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

    $(".qtybtn").click(function(e) {
        let qtyValue = $(".qty").val();
        $(".qty").val(qtyValue);

    });
    $(".add-cart").click(function (e) {
       e.preventDefault();
       var qty =    $(".qty").val();
       var book_id = $(".book_id").val();
       if(qty!=0){
               $.ajax({
                   url: '<?php echo e(url('student/add-to-cart')); ?>',
                   method: "POST",
                   data: {
                       _token: '<?php echo e(csrf_token()); ?>',
                       id: book_id
                   },
                   success: function (response) {
                       var count = response.count;
                       $(".fa-shopping-bag").text(count);

                   }
               });
           }
           else
           {
               alert('This book is out of stock');
           }

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
                    $(".totalAmount").find(".cls").text(parseFloat(totalPrice).toFixed(2));

                    $(".main-section").find(".cart").text(response.count);
                    ele.parents("tr").remove();
                }
            });
        }
    });


</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('student.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed Xampp\htdocs\my_projects\Library ManagmentV3\Library Managment\resources\views/student/books/book_detail.blade.php ENDPATH**/ ?>