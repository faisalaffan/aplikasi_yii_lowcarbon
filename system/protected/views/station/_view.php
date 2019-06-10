<?php
/* @var $this StationController */
/* @var $data Station */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_station')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_station), array('view', 'id'=>$data->id_station)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_node')); ?>:</b>
	<?php echo CHtml::encode($data->id_node); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_station')); ?>:</b>
	<?php echo CHtml::encode($data->nama_station); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lng')); ?>:</b>
	<?php echo CHtml::encode($data->lng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lat')); ?>:</b>
	<?php echo CHtml::encode($data->lat); ?>
	<br />


</div>