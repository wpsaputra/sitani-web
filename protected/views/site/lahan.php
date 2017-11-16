<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h2>Tabulasi Lahan</h2>
<div class="row" style="margin-bottom: 10px">
	<div class="col-md-12">
		<form id="myForm">
			<div class="input-group pull-right" style="width: 10px;">
				<span class="input-group-addon"><i class="fa fa-calendar  fa-fw"></i></span>

				<?php
				echo CHtml::dropDownList('date', (int) date("Y")-1, array(2015=>2015, 2016=>2016, 2017=>2017, 2018=>2018, 2019=>2019, 2020=>2020) ,
					array(
						'ajax' => array(
							'type' => 'POST',
							'url' => CController::createUrl('refreshLahan'),
							'data'=> array('date'=>'js: $(this).val()', 'id_kab'=>$id_kab),
							'update'=>'#reload',
							'beforeSend'=>'js:function () {
								$("#divLoading").addClass("show");
								
							}',
							'success'=>'js:function (html) {
								$("#reload").html(html);
								$("#divLoading").removeClass("show");
							}',
						),
						'class'=>'pull-right form-control', 'style'=>'width: auto;'
					)
				);
				?>
			</div>

		</form>
	</div>
</div>
<div id="reload">
	<?php
	if(!isset($tahun)){
		$tahun = (int) date("Y")-1;
	}
	if($id_kab==0){
		$this->renderPartial('_lahan', array('tahun'=>$tahun, 'id_kab'=>$id_kab));
	}else{
		$this->renderPartial('_lahan_kec', array('tahun'=>$tahun, 'id_kab'=>$id_kab));
	}

	?>
</div>

<div id="divLoading" class="">
	<div class="cssload-tetrominos">
		<div class="cssload-tetromino cssload-box1"></div>
		<div class="cssload-tetromino cssload-box2"></div>
		<div class="cssload-tetromino cssload-box3"></div>
		<div class="cssload-tetromino cssload-box4"></div>
	</div>
</div>

