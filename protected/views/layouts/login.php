<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>SIMTP Login</title>

	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bps.ico">

	<!-- Bootstrap -->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/yeti/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/yeti/custom_login.css" rel="stylesheet">

	<!--Font Awesome-->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/fa/css/font-awesome.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
	<!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
	<![endif]-->
</head>
<body class="color-grey">
<div class="outer-container">
	<div class="inner-container">
		<div class="centered-content" style="width: 300px">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/yeti/bootstrap.min.js"></script>
</body>
</html>