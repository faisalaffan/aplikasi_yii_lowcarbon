<?php
/* @var $this SkalaController */
/* @var $model Skala */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'kode'); ?>
		<?php echo $form->textField($model,'kode',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deskripsi_kode'); ?>
		<?php echo $form->textField($model,'deskripsi_kode',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batas_paling_bawah'); ?>
		<?php echo $form->textField($model,'batas_paling_bawah'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batas_bawah'); ?>
		<?php echo $form->textField($model,'batas_bawah'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batas_tengah'); ?>
		<?php echo $form->textField($model,'batas_tengah'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batas_atas'); ?>
		<?php echo $form->textField($model,'batas_atas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batas_paling_atas'); ?>
		<?php echo $form->textField($model,'batas_paling_atas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->