<?php
/* @var $this ArahanginController */
/* @var $data Arahangin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_arahangin')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_arahangin), array('view', 'id'=>$data->id_arahangin)); ?>
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