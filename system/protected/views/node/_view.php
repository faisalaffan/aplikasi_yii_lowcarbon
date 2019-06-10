<?php
/* @var $this NodeController */
/* @var $data Node */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_node')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_node), array('view', 'id'=>$data->id_node)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_node')); ?>:</b>
	<?php echo CHtml::encode($data->nama_node); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_alamat')); ?>:</b>
	<?php echo CHtml::encode($data->no_alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rt')); ?>:</b>
	<?php echo CHtml::encode($data->rt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rw')); ?>:</b>
	<?php echo CHtml::encode($data->rw); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kota')); ?>:</b>
	<?php echo CHtml::encode($data->kota); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('kecamatan')); ?>:</b>
	<?php echo CHtml::encode($data->kecamatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provinsi')); ?>:</b>
	<?php echo CHtml::encode($data->provinsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lng')); ?>:</b>
	<?php echo CHtml::encode($data->lng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lat')); ?>:</b>
	<?php echo CHtml::encode($data->lat); ?>
	<br />

	*/ ?>

</div>