<?php
/* @var $this COController */
/* @var $model CO */

$this->breadcrumbs=array(
	'Cos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CO', 'url'=>array('index')),
	array('label'=>'Manage CO', 'url'=>array('admin')),
);
?>

<h1>Create CO</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>