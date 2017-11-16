<?php
/* @var $this ArcController */
/* @var $model Arc */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'user_search'); ?>
		<?php echo $form->textField($model,'user_search'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipe_dokumen'); ?>
		<?php echo $form->textField($model,'id_tipe_dokumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_batas'); ?>
		<?php echo $form->textField($model,'tanggal_batas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_upload'); ?>
		<?php echo $form->textField($model,'tanggal_upload'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'csv_link'); ?>
		<?php echo $form->textField($model,'csv_link',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mdb_link'); ?>
		<?php echo $form->textField($model,'mdb_link',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flag'); ?>
		<?php echo $form->textField($model,'flag'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->