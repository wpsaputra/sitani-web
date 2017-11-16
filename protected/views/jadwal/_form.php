<?php
/* @var $this ArcController */
/* @var $model Arc */
/* @var $form CActiveForm */
?>


<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pengaduan-form',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array(
			'class'=>'form-horizontal',
			'enctype' => 'multipart/form-data',
		),
	)); ?>

	<fieldset>
		<!--		<legend>FORM PENGADUAN</legend>-->

		<div class="form-group">
			<?php echo $form->labelEx($model,'id_user', array('class'=>'col-lg-2 control-label')); ?>
			<div class="col-lg-10">
				<?php
//					$static = array(
//						'9999'     => Yii::t('fim','Semua BPS'),
//					);
//					echo $form->dropDownList($model, 'id_user', $static+CHtml::listData(User::model()->findAll(), 'id', 'user_name'), array('class'=>'form-control'));
					echo CHtml::dropDownList('dummy1', $model->id_user, CHtml::listData(User::model()->findAll(), 'id', 'user_name'), array('class'=>'form-control' ,'disabled'=>'disabled'));
				?>
			</div>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-2">
					<?php echo $form->error($model,'id_user', array('class'=>'custom_error')); ?>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Tipe Dokumen</label>
			<div class="col-lg-10">
				<?php
//					echo $form->dropDownList($model, 'id_tipe_dokumen', CHtml::listData(TipeDokumen::model()->findAll(), 'id', 'nama_dokumen'), array('class'=>'form-control'));
					echo CHtml::dropDownList('dummy2', $model->id_tipe_dokumen, CHtml::listData(TipeDokumen::model()->findAll(), 'id', 'nama_dokumen'), array('class'=>'form-control' ,'disabled'=>'disabled'));
				?>
			</div>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-2">
					<?php echo $form->error($model,'id_tipe_dokumen', array('class'=>'custom_error')); ?>
				</div>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'tanggal_batas', array('class'=>'col-lg-2 control-label')); ?>
			<div class="col-lg-10">
				<?php
//				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
//					'model' => $model,
//					'attribute' => 'tanggal_batas',
//					'options'=>array(
//						'dateFormat'=>'yy-mm-dd'
//					),
//					'htmlOptions'=>array(
//						'class'=>'form-control',
//						'placeholder'=>'yy-mm-dd',
//						'type'=>'date'
//					),
//				));
				echo CHtml::textField('dummy3', $model->tanggal_batas, array('class'=>'form-control' ,'disabled'=>'disabled'));
				?>
			</div>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-2">
					<?php echo $form->error($model,'tanggal_batas', array('class'=>'custom_error')); ?>
				</div>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'tanggal_upload', array('class'=>'col-lg-2 control-label')); ?>
			<div class="col-lg-10">
				<?php
//				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
//					'model' => $model,
//					'attribute' => 'tanggal_upload',
//					'options'=>array(
//						'dateFormat'=>'yy-mm-dd'
//					),
//					'htmlOptions'=>array(
//						'class'=>'form-control',
//						'placeholder'=>'yy-mm-dd',
//						'type'=>'date'
//					),
//				));
				echo CHtml::textField('dummy5', date('Y-m-d').' 00:00:00', array('class'=>'form-control' ,'disabled'=>'disabled'));

				?>

			</div>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-2">
					<?php echo $form->error($model,'tanggal_upload', array('class'=>'custom_error')); ?>
				</div>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'flag', array('class'=>'col-lg-2 control-label')); ?>
			<div class="col-lg-10">
				<?php
//					echo $form->dropDownList($model,'flag', array('false','true'), array('class'=>'form-control', 'style'=>'width: auto;'));
					echo CHtml::dropDownList('dummy4', $model->flag, array('false','true'), array('class'=>'form-control' ,'disabled'=>'disabled', 'style'=>'width: auto;'));
				?>
			</div>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-2">
					<?php echo $form->error($model,'flag', array('class'=>'custom_error')); ?>
				</div>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'csv_link', array('class'=>'col-lg-2 control-label')); ?>
			<div class="col-lg-10">
				<?php echo $form->fileField($model,'csv_link'); ?>
			</div>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-2">
					<?php echo $form->error($model,'csv_link', array('class'=>'custom_error')); ?>
				</div>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'mdb_link', array('class'=>'col-lg-2 control-label')); ?>
			<div class="col-lg-10">
				<?php echo $form->fileField($model,'mdb_link'); ?>
			</div>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-2">
					<?php echo $form->error($model,'mdb_link', array('class'=>'custom_error')); ?>
				</div>
			</div>
		</div>


		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<button type="reset" class="btn btn-default">Cancel</button>
				<?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-primary')); ?>
			</div>
		</div>


	</fieldset>

	<?php $this->endWidget(); ?>

</div><!-- form -->