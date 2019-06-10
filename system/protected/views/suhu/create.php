<?php
/* @var $this SuhuController */
/* @var $model Suhu */

$this->breadcrumbs=array(
	'Suhus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Suhu', 'url'=>array('index')),
	array('label'=>'Manage Suhu', 'url'=>array('admin')),
);
?>

<h1>Create Suhu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>