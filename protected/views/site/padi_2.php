<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h2>Tabulasi Padi</h2>
<div class="row" style="margin-bottom: 10px">
	<div class="col-md-12">
		<form id="myForm">
			<div class="input-group pull-right" style="width: 10px;">
				<span class="input-group-addon"><i class="fa fa-calendar  fa-fw"></i></span>
				<?php echo CHtml::dropDownList('date', 2016, array(2016=>2016, 2017=>2017, 2018=>2018, 2019=>2019, 2020=>2020),
					array('class'=>'pull-right form-control', 'placeholder'=>'Password', 'style'=>'width: auto;'));

//				echo $form->dropDownListRow('vehId','vehId', array(2016=>2016, 2017=>2017, 2018=>2018, 2019=>2019, 2020=>2020) ,
//					array(
//						'ajax' => array(
//							'type' => 'POST',
//							'url' => CHtml::normalizeUrl('site/refreshPadi'),
//							'data'=> array('vehId'=>'js: $(this).val()'),
//							'update'=>'#reload',
//
//						)
//					)
//				);
				?>
			</div>

		</form>
	</div>
</div>

<div id="reload">
	<?php
		if(!isset($tahun)){
			$tahun = (int) date("Y");
		}
		$this->renderPartial('_padi', array('tahun'=>$tahun))
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

<script type="text/javascript">
	$(document).ready(function() {

		$("#date").change(function () {
			$.ajax({
				url: <?php echo "'".CHtml::normalizeUrl(array('site/refreshPadi'))."'"?>,
				cache: false,
				data: $('#myForm').serialize(),
				type: 'POST',
				error: function () {
					alert('Error has occured');
					$("#divLoading").removeClass("show");
				},
				dataType: 'json',
				success: function (data) {
					$("#divLoading").removeClass("show");
					if(data.status=='success'){
						$("#reload").html(data.render);
					}

//					$("#reload").html(data);
				},
				beforeSend: function () {
					$("#divLoading").addClass("show");
				}

			});
			return false;
		});

	});

</script>