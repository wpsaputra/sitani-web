<?php
/* @var $this ArcController */
/* @var $model Arc */

$this->breadcrumbs=array(
	'Arcs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Arc', 'url'=>array('index')),
	array('label'=>'Manage Arc', 'url'=>array('admin')),
);
?>

<h1>Create Arc</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>