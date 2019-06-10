<?php
/* @var $this AnginController */
/* @var $model Angin */

$this->breadcrumbs=array(
	'Angins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Angin', 'url'=>array('index')),
	array('label'=>'Manage Angin', 'url'=>array('admin')),
);
?>

<h1>Create Angin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>