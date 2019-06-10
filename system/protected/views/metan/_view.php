<?php
/* @var $this MetanController */
/* @var $data Metan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_metan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_metan), array('view', 'id'=>$data->id_metan)); ?>
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