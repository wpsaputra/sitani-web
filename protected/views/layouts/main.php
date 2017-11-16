<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bps.ico">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/yeti/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/yeti/custom.css" />

	<!--Font Awesome-->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/fa/css/font-awesome.min.css" rel="stylesheet">

	<!--JVectormap-->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/yeti/jquery-jvectormap-2.0.3.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/yeti/jquery-jvectormap-2.0.3.min.js"></script>
<!--	<script src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/yeti/POLY74.js"></script>-->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/yeti/7400.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/yeti/bootstrap.min.js"></script>

	<!--JqueryKnob-->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/yeti/jquery.knob.min.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>
<body class="color-grey">

<div class="container" style="width:100%">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'htmlOptions'=>array(
				'class'=>'breadcrumb',
			),
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<div class="panel-default">
		<div class="panel-body">
			<?php echo $content;?>
		</div>
	</div>

</div>

<!-- <footer class="footer">
	<div class="container">
		<p class="text-muted">Copyright &copy; BPS Sultra 2016</p>
	</div>
</footer> -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!-- Include all compiled plugins (below), or include individual files as needed -->


</body>
</html>