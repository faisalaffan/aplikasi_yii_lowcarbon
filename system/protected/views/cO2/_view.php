<?php
/* @var $this CO2Controller */
/* @var $data CO2 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_co2')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_co2), array('view', 'id'=>$data->id_co2)); ?>
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