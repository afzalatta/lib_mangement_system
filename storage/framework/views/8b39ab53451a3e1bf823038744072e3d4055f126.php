<?php $__env->startSection('content'); ?>


<section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('front_end/img/breadcrumb.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Card Info</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <br> <br><br>

        <div class="row justify-content-center py-8 px-8 py-lg-10 px-lg-5">
            <div class="col-xl-12 col-xxl-10">
                <form
                role="form"
                action="<?php echo e(url('student/stripe')); ?>"
                method="POST"
                class="require-validation"
                data-cc-on-file="false"
                data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>"
                id="payment-form">
                <?php echo e(csrf_field()); ?>


                    <input class='form-control' size='4' type='hidden' name="amount" value="">

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Name on Card</label>
                            <input class='form-control' size='4' type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group card required'>
                            <label class='control-label'>Card Number</label>
                            <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                            <label class='control-label'>CVC</label>
                            <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Month</label>
                            <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Year</label>
                            <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <button class="site-btn" type="submit">Pay Now </button><br><br><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
var $form         = $(".require-validation");
$('form.require-validation').bind('submit', function(e) {
var $form         = $(".require-validation"),
inputSelector = ['input[type=email]', 'input[type=password]',
'input[type=text]', 'input[type=file]',
'textarea'].join(', '),
$inputs       = $form.find('.required').find(inputSelector),
$errorMessage = $form.find('div.error'),
valid         = true;
$errorMessage.addClass('hide');
$('.has-error').removeClass('has-error');
$inputs.each(function(i, el) {
var $input = $(el);
if ($input.val() === '') {
$input.parent().addClass('has-error');
$errorMessage.removeClass('hide');
e.preventDefault();
}
});
if (!$form.data('cc-on-file')) {
e.preventDefault();
Stripe.setPublishableKey($form.data('stripe-publishable-key'));
Stripe.createToken({
number: $('.card-number').val(),
cvc: $('.card-cvc').val(),
exp_month: $('.card-expiry-month').val(),
exp_year: $('.card-expiry-year').val()
}, stripeResponseHandler);
}
});
function stripeResponseHandler(status, response) {
if (response.error) {
$('.error')
.removeClass('hide')
.find('.alert')
.text(response.error.message);
} else {
/* token contains id, last4, and card type */
var token = response['id'];
$form.find('input[type=text]').empty();
$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
$form.get(0).submit();
}
}
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed Xampp\htdocs\my_projects\Library ManagmentV3\Library Managment\resources\views/student/layout/stripe.blade.php ENDPATH**/ ?>