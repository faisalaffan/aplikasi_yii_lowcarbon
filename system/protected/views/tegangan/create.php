<?php
/* @var $this TeganganController */
/* @var $model Tegangan */

$this->breadcrumbs=array(
	'Tegangans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tegangan', 'url'=>array('index')),
	array('label'=>'Manage Tegangan', 'url'=>array('admin')),
);
?>

<h1>Create Tegangan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>