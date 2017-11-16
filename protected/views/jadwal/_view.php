<?php
/* @var $this ArcController */
/* @var $data Arc */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipe_dokumen')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipe_dokumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_batas')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_batas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_upload')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_upload); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('csv_link')); ?>:</b>
	<?php echo CHtml::encode($data->csv_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mdb_link')); ?>:</b>
	<?php echo CHtml::encode($data->mdb_link); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('flag')); ?>:</b>
	<?php echo CHtml::encode($data->flag); ?>
	<br />

	*/ ?>

</div>