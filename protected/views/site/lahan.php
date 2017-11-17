<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

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

