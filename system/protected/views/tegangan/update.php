<?php
/* @var $this TeganganController */
/* @var $model Tegangan */

$this->breadcrumbs=array(
	'Tegangans'=>array('index'),
	$model->id_tegangan=>array('view','id'=>$model->id_tegangan),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tegangan', 'url'=>array('index')),
	array('label'=>'Create Tegangan', 'url'=>array('create')),
	array('label'=>'View Tegangan', 'url'=>array('view', 'id'=>$model->id_tegangan)),
	array('label'=>'Manage Tegangan', 'url'=>array('admin')),
);
?>

<h1>Update Tegangan <?php echo $model->id_tegangan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>