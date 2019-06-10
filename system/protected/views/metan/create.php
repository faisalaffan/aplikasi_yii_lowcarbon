<?php
/* @var $this MetanController */
/* @var $model Metan */

$this->breadcrumbs=array(
	'Metans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Metan', 'url'=>array('index')),
	array('label'=>'Manage Metan', 'url'=>array('admin')),
);
?>

<h1>Create Metan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>