<?php
/* @var $this ArcController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Arcs',
);

$this->menu=array(
	array('label'=>'Create Arc', 'url'=>array('create')),
	array('label'=>'Manage Arc', 'url'=>array('admin')),
);
?>

<h1>Arcs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
