<?php
/* @var $this ArahanginController */
/* @var $model Arahangin */

$this->breadcrumbs=array(
	'Arahangins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Arahangin', 'url'=>array('index')),
	array('label'=>'Manage Arahangin', 'url'=>array('admin')),
);
?>

<h1>Create Arahangin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>