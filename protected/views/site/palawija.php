<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<div id="reload">
	<?php
	if(!isset($tahun)){
		$tahun = (int) date("Y");
	}

	if(!isset($komoditas)){
		$komoditas = 1;
	}

	if($id_kab==0){
		$this->renderPartial('_palawija', array('tahun'=>$tahun, 'komoditas'=>$komoditas, 'id_kab'=>$id_kab, 'luas'=>$luas));
	}else{
		$this->renderPartial('_palawija_kec', array('tahun'=>$tahun, 'komoditas'=>$komoditas, 'id_kab'=>$id_kab, 'luas'=>$luas));
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