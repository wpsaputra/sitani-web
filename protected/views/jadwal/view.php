<?php
/* @var $this ArcController */
/* @var $model Arc */

$this->breadcrumbs=array(
	'Manage'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Arc', 'url'=>array('index')),
	array('label'=>'Create Arc', 'url'=>array('create')),
	array('label'=>'Update Arc', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Arc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Arc', 'url'=>array('admin')),
);
?>

<h1>View Arc #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user',
		'id_tipe_dokumen',
		'tanggal_batas',
		'tanggal_upload',
		'csv_link',
		'mdb_link',
		'flag',
	),
	'htmlOptions' => array(
		'class'=>'table table-bordered table striped',
	),
)); ?>

<div class="row" style="margin-top: 15px">
	<?php echo CHtml::link('<i class="fa fa-backward fa-fw"></i>Back to Arc', array('jadwal/admin'), array('class'=>'btn btn-sm btn-success pull-right plus-right-margin'));?>
</div>