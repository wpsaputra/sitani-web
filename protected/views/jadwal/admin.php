<?php
/* @var $this ArcController */
/* @var $model Arc */

$this->breadcrumbs=array(
//	'Arcs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Arc', 'url'=>array('index')),
	array('label'=>'Create Arc', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('arc-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Arcs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'arc-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
//		array(
//			'header'=>'#',
//			'value'=>function($this, $row){return $row+1;},
//		),
//
//		array('header'=>'Nama BPS', 'name'=>'id_user',),
		array(
			'name'=>'user_search',
			'value'=>function($data){
				return $data->idUser->user_name;
			},
		),

		array(
			'name'=>'tipe_dokumen_search',
			'value'=>function($data){
				return $data->idTipeDokumen->nama_dokumen;
			},
		),
//		array('header'=>'Tanggal Batas', 'name'=>'tanggal_batas',),
//		array('header'=>'Tanggal Upload', 'name'=>'tanggal_upload',),
//		array('header'=>'CSV Link', 'name'=>'csv_link',),
//		array('header'=>'MDB Link', 'name'=>'mdb_link',),
//		array('header'=>'Status Upload', 'name'=>'flag',),


//		'id',
//		'id_user',
//		'id_tipe_dokumen',
		'tanggal_batas',
		'tanggal_upload',
//		'csv_link',
		array(
			'name'=>'csv_link',
			'value'=>function($data){
				if($data->csv_link==""){
					return "";
				}else{
					return "<a href='".Yii::app()->request->baseUrl."/uploaded_file/".$data->csv_link."'>".$data->csv_link."</a>";
				}
			},
			'type'=>'raw'
		),
//		'mdb_link',
		array(
			'name'=>'csv_link',
			'value'=>function($data){
				if($data->mdb_link==""){
					return "";
				}else{
					return "<a href='".Yii::app()->request->baseUrl."/uploaded_file/".$data->mdb_link."'>".$data->mdb_link."</a>";
				}
			},
			'type'=>'raw'
		),
//		'flag',
		array(
			'name'=>'flag',
			'value'=>function($data){
				if($data->flag==1){
					return "Sudah Upload";
				}
				else{
					return "Belum Upload";
				}
			},
		),
		array(
			'class'=>'CButtonColumn',
			'header'=>'Action',
			'template'=>'{view}{update}',

			'viewButtonUrl'=>function($data){
				return Yii::app()->controller->createUrl("/jadwal/view",array("id"=>$data["id"]));
			},
			'updateButtonUrl'=>function($data){
				return Yii::app()->controller->createUrl("/jadwal/update",array("id"=>$data["id"]));
			},
			'deleteButtonUrl'=>function($data){
				return Yii::app()->controller->createUrl("/jadwal/delete",array("id"=>$data["id"]));
			},

			'viewButtonImageUrl'=>Yii::app()->request->baseUrl.'/css/view.svg',
			'updateButtonImageUrl'=>Yii::app()->request->baseUrl.'/css/upload.svg',

		),
	),
)); ?>
