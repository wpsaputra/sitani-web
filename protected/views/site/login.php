<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array(
		'class'=>'form-horizontal',
	),
)); ?>

	<fieldset>
		<legend>SIMON</legend>
		<div class="form-group">
			<div class="col-lg-12">
				<div class="input-group">
					<?php echo $form->textField($model,'username', array('class'=>'form-control', 'type'=>'text', 'placeholder'=>'User Name')); ?>
					<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
				</div>
				<div class="row">
					<div class="col-lg-10">
						<?php echo $form->error($model,'username', array('style'=>'color:red;')); ?>
					</div>
				</div>
			</div>
		</div>




		<div class="form-group">
			<div class="col-lg-12">
				<div class="input-group">
					<?php echo $form->passwordField($model,'password', array('class'=>'form-control', 'placeholder'=>'Password')); ?>
					<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<?php echo $form->error($model,'password', array('style'=>'color:red;')); ?>
					</div>
				</div>

			</div>
		</div>


		<div class="form-group">
			<div class="col-lg-12">
				<?php echo $form->checkBox($model,'rememberMe'); ?>
				<?php echo $form->label($model,'rememberMe'); ?>
				<?php echo $form->error($model,'rememberMe'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="pull-right plus-right-margin">
				<?php echo CHtml::submitButton('Login', array('class'=>'btn btn-primary')); ?>
			</div>
		</div>


	</fieldset>




<?php $this->endWidget(); ?>