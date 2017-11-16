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
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">SIMON</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Home', 'url'=>array('/site/index')),
					array('label'=>'Input Data', 'url'=>array('/arc/admin'), 'visible'=>Yii::app()->user->isAdmin()),
					array('label'=>'Input Data', 'url'=>array('/jadwal/admin'), 'visible'=>!Yii::app()->user->isAdmin()),
					array(
						'label'=>'Tabulasi <span class="caret"></span>',
						'url'=>'#',
						'linkOptions'=> array('class' => 'dropdown-toggle', 'data-toggle'=>'dropdown', 'role'=>'button', 'aria-expanded'=>'false'),
						'submenuOptions' => array( 'class' => 'dropdown-menu', 'id'=>'submenu-dd', 'role'=>'menu' ),
						'items'=>array(
							array('label'=>'SP-Padi','url'=>array('/site/padi')),
							array('label'=>'SP-Palawija','url'=>array('/site/palawija')),
							array('label'=>'SP-Lahan','url'=>array('/site/lahan'))
						),
					)
				),
				'htmlOptions' => array(
					'class'=>'nav navbar-nav',
				),
				'encodeLabel'=>false,
			));

			?>

			<?php

			if(Yii::app()->user->getRole()==1){
				$id_user = Yii::app()->user->id;
				$count = Yii::app()->db->createCommand("SELECT COUNT(id) FROM sm_arc WHERE tanggal_batas>=:date AND tanggal_batas<:date + INTERVAL 1 MONTH AND id_user=:id_user AND FLAG=0")
					->bindValues(array(':date'=>date('Y-m').'-01', ':id_user'=>$id_user))->queryScalar();

				$updateId = Yii::app()->db->createCommand("SELECT id, tanggal_batas FROM sm_arc WHERE tanggal_batas>=:date AND tanggal_batas<:date + INTERVAL 1 MONTH AND id_user=:id_user AND FLAG=0")
					->bindValues(array(':date'=>date('Y-m').'-01', ':id_user'=>$id_user))->queryAll();

				$index = 1;

				$link = array();
				foreach ($updateId as $id){
					$link[] = array('label'=>'Upload Data '.$index.' (Batas '.substr($id['tanggal_batas'], 0, 10).')','url'=>array('/jadwal/update', 'id'=>$id['id']));
					$index++;
				}
				$link[] = array('label'=>'Lihat Semua jadwal','url'=>array('/jadwal/admin'));

				$this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array(
							'label'=>'<i class="fa fa-globe" style="font-size: 1.5em"><span class="badge">'.$count.'</span></i>',
							'url'=>'#',
							'linkOptions'=> array('class' => 'dropdown-toggle', 'data-toggle'=>'dropdown', 'role'=>'button', 'aria-expanded'=>'false'),
							'submenuOptions' => array( 'class' => 'dropdown-menu', 'id'=>'submenu-yy', 'role'=>'menu' ),
							'items'=> $link,
						),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest, 'linkOptions'=> array('class' => 'btn-sm btn-primary hover-item')),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
					),
					'htmlOptions' => array(
						'class'=>'nav navbar-nav navbar-right',
					),
					'encodeLabel'=>false,
				));
			}else{
				$this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest, 'linkOptions'=> array('class' => 'btn-sm btn-primary hover-item')),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
					),
					'htmlOptions' => array(
						'class'=>'nav navbar-nav navbar-right',
					),
					'encodeLabel'=>false,
				));

			}



			?>


		</div>
	</div>
</nav>

<div class="container">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'htmlOptions'=>array(
				'class'=>'breadcrumb',
			),
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<div class="panel panel-default">
		<div class="panel-body">
			<?php echo $content;?>
		</div>
	</div>

</div>

<footer class="footer">
	<div class="container">
		<p class="text-muted">Copyright &copy; BPS Sultra 2016</p>
	</div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!-- Include all compiled plugins (below), or include individual files as needed -->


</body>
</html>