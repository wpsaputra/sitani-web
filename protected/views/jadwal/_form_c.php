<?php
/* @var $this ArcController */
/* @var $model Arc */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'arc-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipe_dokumen'); ?>
		<?php echo $form->textField($model,'id_tipe_dokumen'); ?>
		<?php echo $form->error($model,'id_tipe_dokumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_batas'); ?>
		<?php echo $form->textField($model,'tanggal_batas'); ?>
		<?php echo $form->error($model,'tanggal_batas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_upload'); ?>
		<?php echo $form->textField($model,'tanggal_upload'); ?>
		<?php echo $form->error($model,'tanggal_upload'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'csv_link'); ?>
		<?php echo $form->textField($model,'csv_link',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'csv_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mdb_link'); ?>
		<?php echo $form->textField($model,'mdb_link',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'mdb_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flag'); ?>
		<?php echo $form->textField($model,'flag'); ?>
		<?php echo $form->error($model,'flag'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->