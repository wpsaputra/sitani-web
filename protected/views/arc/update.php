<?php
/* @var $this ArcController */
/* @var $model Arc */

$this->breadcrumbs=array(
	'Manage'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Arc', 'url'=>array('index')),
	array('label'=>'Create Arc', 'url'=>array('create')),
	array('label'=>'View Arc', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Arc', 'url'=>array('admin')),
);
?>

<h1>Update Arc <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>