<?php
/* @var $this TeganganController */
/* @var $model Tegangan */

$this->breadcrumbs=array(
	'Tegangans'=>array('index'),
	$model->id_tegangan,
);

$this->menu=array(
	array('label'=>'List Tegangan', 'url'=>array('index')),
	array('label'=>'Create Tegangan', 'url'=>array('create')),
	array('label'=>'Update Tegangan', 'url'=>array('update', 'id'=>$model->id_tegangan)),
	array('label'=>'Delete Tegangan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tegangan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tegangan', 'url'=>array('admin')),
);
?>

<h1>View Tegangan #<?php echo $model->id_tegangan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tegangan',
		'id_station',
		'nilai',
		'waktu',
		'ket',
	),
)); ?>
