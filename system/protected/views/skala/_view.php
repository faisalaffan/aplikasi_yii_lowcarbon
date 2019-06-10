<?php
/* @var $this SkalaController */
/* @var $data Skala */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kode), array('view', 'id'=>$data->kode)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi_kode')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi_kode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batas_paling_bawah')); ?>:</b>
	<?php echo CHtml::encode($data->batas_paling_bawah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batas_bawah')); ?>:</b>
	<?php echo CHtml::encode($data->batas_bawah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batas_tengah')); ?>:</b>
	<?php echo CHtml::encode($data->batas_tengah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batas_atas')); ?>:</b>
	<?php echo CHtml::encode($data->batas_atas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batas_paling_atas')); ?>:</b>
	<?php echo CHtml::encode($data->batas_paling_atas); ?>
	<br />


</div>