<?php
/* @var $this KelembabanController */
/* @var $model Kelembaban */

$this->breadcrumbs=array(
	'Kelembabans'=>array('index'),
	$model->id_kelembaban=>array('view','id'=>$model->id_kelembaban),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kelembaban', 'url'=>array('index')),
	array('label'=>'Create Kelembaban', 'url'=>array('create')),
	array('label'=>'View Kelembaban', 'url'=>array('view', 'id'=>$model->id_kelembaban)),
	array('label'=>'Manage Kelembaban', 'url'=>array('admin')),
);
?>

<h1>Update Kelembaban <?php echo $model->id_kelembaban; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>