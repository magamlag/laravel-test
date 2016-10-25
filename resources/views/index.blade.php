<!DOCTYPE html>
<html>
<head>
    <title>Laravel Test</title>

    <!-- JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/js/bootstrap-datetimepicker.min.js"></script>
    <!-- END -- JS -->
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.min.css" />
    <!-- END -- CSS -->
    <meta name="csrf_token" content="{{ csrf_token() }}">

</head>
    <body>
        <div class="container">
            <div class="content">
							<div class="row">
								<div class="col-md-6">
                <form class="form-horizontal" role="form" method="post" action="index.php">
                	<div class="form-group">
                		<label for="product-name" class="col-sm-2 control-label"> Product name</label>
                		<div class="col-sm-10">
                			<input type="text" class="form-control" id="product-name" name="product-name" value="">
                		</div>
                	</div>
                	<div class="form-group">
                		<label for="quantity" class="col-sm-2 control-label">Quantity in stock</label>
                		<div class="col-sm-10">
                			<input type="text" class="form-control" id="quantity" name="quantity" value="">
                		</div>
                	</div>
                	<div class="form-group">
                		<label for="price" class="col-sm-2 control-label">Price per item</label>
                		<div class="col-sm-10">
                			<textarea class="form-control" rows="4" name="price"></textarea>
                		</div>
                	</div>
                	<div class="form-group">
                		<div class="col-sm-10 col-sm-offset-2">
                			<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary send">
                		</div>
                	</div>
                	<div class="form-group">
                		<div class="col-sm-10 col-sm-offset-2">
                			<! Will be used to display an alert to the user>
                		</div>
                	</div>
                </form>
            </div>
								<div class="col-md-6">
										 	<h2>List of Products</h2>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Quantity in Stock</th>
                            <th>Price</th>
                            <th>Created At</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
								</div>
					</div>
				</div>
       </div>
<script>
$(function(){

$('#submit').on('submit',function(e){
    $.ajaxSetup({
        header:$('meta[name="_token"]').attr('content')
    });
        e.preventDefault(e);

        $.ajax({

        type: 'POST',
        url: '/save',
        data: $(this).serialize(),
        dataType: 'json',

        success: function(data){
            console.log(data);
        },

        error: function(data){
						console.log(data);
        }
    })
    });
});
</script>
    </body>
</html>