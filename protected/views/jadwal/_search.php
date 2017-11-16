<?php
/* @var $this ArcController */
/* @var $model Arc */
/* @var $form CActiveForm */
?>

<div class="row" style="margin-bottom: 10px">
	<div class="col-md-12">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl($this->route),
			'method'=>'get',
			'htmlOptions' => array(
				'class'=>'form-inline pull-right',
			),
		));

		$static1 = array(''=> Yii::t('fim','Semua BPS'));
		$static2 = array(''=> Yii::t('fim','Semua Tipe Dokumen'));
		$static3 = array(''=> Yii::t('fim','Semua Status'));

		?>

		<div class="form-group">
			<?php echo $form->dropDownList($model,'id_tipe_dokumen', $static2+CHtml::listData(TipeDokumen::model()->findAll(), 'id', 'nama_dokumen') ,array('class'=>'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->dropDownList($model,'flag', $static3+array('Belum Upload', 'Sudah Upload'),array('class'=>'form-control')); ?>
		</div>

		<div class="form-group">
			<button id="filter" type="submit" class="btn btn-default"><i class="fa fa-search fa-fw"></i></button>
		</div>

		<?php $this->endWidget(); ?>

	</div><!-- search-form -->

	</div>
</div>

<div class="wide form">

