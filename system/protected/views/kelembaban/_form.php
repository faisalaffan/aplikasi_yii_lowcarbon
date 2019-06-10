<?php
/* @var $this KelembabanController */
/* @var $model Kelembaban */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kelembaban-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_kelembaban'); ?>
		<?php echo $form->textField($model,'id_kelembaban',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'id_kelembaban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_station'); ?>
		<?php echo $form->textField($model,'id_station',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'id_station'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nilai'); ?>
		<?php echo $form->textField($model,'nilai'); ?>
		<?php echo $form->error($model,'nilai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu'); ?>
		<?php echo $form->textField($model,'waktu'); ?>
		<?php echo $form->error($model,'waktu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ket'); ?>
		<?php echo $form->textField($model,'ket',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'ket'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->