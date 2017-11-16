<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h2>Tabulasi Palawija</h2>

<div class="row" style="margin-bottom: 10px">
	<div class="col-md-12">
		<form id="myForm" class="form-inline pull-right">

			<div class="form-group">
				<?php
					echo CHtml::dropDownList('komoditas','komoditas', array(1=>'Jagung', 2=>'Kedelai', 3=>'Kacang Tanah', 4=>'Ubi Kayu'),
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

	if(!isset($komoditas)){
		$komoditas = 1;
	}

	if($id_kab==0){
		$this->renderPartial('_palawija', array('tahun'=>$tahun, 'komoditas'=>$komoditas, 'id_kab'=>$id_kab));
	}else{
		$this->renderPartial('_palawija_kec', array('tahun'=>$tahun, 'komoditas'=>$komoditas, 'id_kab'=>$id_kab));
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
				url: <?php echo "'".CHtml::normalizeUrl(array('site/refreshPalawija'))."'"?>,
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