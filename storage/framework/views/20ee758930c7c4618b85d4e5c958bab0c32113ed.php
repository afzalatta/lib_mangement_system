<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax Data</title>
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
	<script type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
</head>
<body>

    <h1> jQuery ajax() demo
	</h1>
	  <input  type="button" id="ajaxBtn" value="Send Ajax request" />
	<p class="news_data">

	</p>

  <script type="text/javascript">
        $(document).ready(function () {

		 $('#ajaxBtn').click(function(){
			$.ajax('http://127.0.0.1:8000/news/list',
			{
				dataType: 'json', // type of response data
				success: function (data) {   // success callback function
					$('.news_data').append(data.data);
				}

			});
		 });

        });
    </script>
<div>
    <h2>Form</h2>
<form  method="POST" id="form">
<?php echo csrf_field(); ?>
<label>Name:</label>
<input type="text" name="name" placeholder="Enter Name">
<label>Address:</label>
<input type="text" name="address" placeholder="Enter Address">
<button type="button" class="btn">Submit</button>
</form>
<p class="name"></p>
<p class="address"></p>
</div>


<script type="text/javascript">
    $(document).ready(function () {

     $('.btn').click(function(){
        let name = $("input[name='name']").val();
        let address = $("input[name='address']").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
                    /* the route pointing to the post function */
                    url: 'http://127.0.0.1:8000/news',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: { _token: CSRF_TOKEN,name: name, address: address},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                       console.log(data);
                       $(".name").text(data.name);
                       $(".address").text(data.address);
                    }
                });
       });

    });
</script>
</body>
</html>
<?php /**PATH D:\installed Xampp\htdocs\my_projects\Library ManagmentV3\Library Managment\resources\views/news.blade.php ENDPATH**/ ?>