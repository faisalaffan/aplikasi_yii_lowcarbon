<?php
/* @var $this KelembabanController */
/* @var $model Kelembaban */

$this->breadcrumbs=array(
	'Kelembabans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kelembaban', 'url'=>array('index')),
	array('label'=>'Manage Kelembaban', 'url'=>array('admin')),
);
?>

<h1>Create Kelembaban</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>