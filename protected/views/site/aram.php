<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<div id="reload">
	<?php
		// this->renderPartial('_lain', array('tahun'=>$tahun, 'id_kab'=>$id_kab, 'luas'=>$luas));
		// $this->renderPartial('_aram'.$id);
		$this->renderPartial('_aram'.$id);
	?>
</div>