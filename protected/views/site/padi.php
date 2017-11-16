<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<h2>Tabulasi Padi</h2>

<div class="row" style="margin-bottom: 10px">
	<div class="col-md-12">
		<form id="myForm" class="form-inline pull-right">

			<div class="form-group">
				<?php
				echo CHtml::dropDownList('luas','luas', array(1=>'Luas Panen', 2=>'Luas Tanam', 3=>'Luas Puso/Rusak'),
					array(
						'class'=>'form-control', 'style'=>'width: auto;'
					)
				);
				?>
			</div>

			<div class="form-group">
				<div class="input-group pull-right" style="width: 10px;">
					<span class="input-group-addon"><i class="fa fa-calendar  fa-fw"></i></span>

					<?php
					echo CHtml::dropDownList('date', (int) date("Y"), array(2016=>2016, 2017=>2017, 2018=>2018, 2019=>2019, 2020=>2020),
						array(
							'class'=>'form-control', 'style'=>'width: auto;'
						)
					);
					?>
				</div>
			</div>

			<div class="form-group">
				<button id="search" type="button" class="btn btn-default"><i class="fa fa-search fa-fw"></i></button>
			</div>

		</form>
	</div>
</div>

<div id="reload">
	<?php
		if(!isset($tahun)){
			$tahun = (int) date("Y");
		}

		if(!isset($luas)){
			$luas = 1;
		}

		if($id_kab==0){
			$this->renderPartial('_padi', array('tahun'=>$tahun, 'id_kab'=>$id_kab, 'luas'=>$luas));
		}else{
			$this->renderPartial('_padi_kec', array('tahun'=>$tahun, 'id_kab'=>$id_kab, 'luas'=>$luas));
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

<script type="text/javascript">
	$(document).ready(function() {

		$("#search").click(function () {
			var x = $('#myForm').serialize()+ '&id_kab=' + <?php echo "'".$id_kab."';"?>;
			$.ajax({
				url: <?php echo "'".CHtml::normalizeUrl(array('site/refreshPadi'))."'"?>,
				cache: false,
				data: x,
				type: 'POST',
				error: function () {
					alert('Error has occured');
					$("#divLoading").removeClass("show");
				},
				success: function (html) {
					$("#divLoading").removeClass("show");
					$("#reload").html(html);
				},
				beforeSend: function () {
					$("#divLoading").addClass("show");
				}

			});
			return false;
		});

	});

</script>