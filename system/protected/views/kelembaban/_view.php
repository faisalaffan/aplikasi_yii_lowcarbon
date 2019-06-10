<?php
/* @var $this KelembabanController */
/* @var $data Kelembaban */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kelembaban')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kelembaban), array('view', 'id'=>$data->id_kelembaban)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_station')); ?>:</b>
	<?php echo CHtml::encode($data->id_station); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai')); ?>:</b>
	<?php echo CHtml::encode($data->nilai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu')); ?>:</b>
	<?php echo CHtml::encode($data->waktu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ket')); ?>:</b>
	<?php echo CHtml::encode($data->ket); ?>
	<br />


</div>