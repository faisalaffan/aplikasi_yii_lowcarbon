<?php
/* @var $this KelembabanController */
/* @var $model Kelembaban */

$this->breadcrumbs=array(
	'Kelembabans'=>array('index'),
	$model->id_kelembaban,
);

$this->menu=array(
	array('label'=>'List Kelembaban', 'url'=>array('index')),
	array('label'=>'Create Kelembaban', 'url'=>array('create')),
	array('label'=>'Update Kelembaban', 'url'=>array('update', 'id'=>$model->id_kelembaban)),
	array('label'=>'Delete Kelembaban', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kelembaban),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kelembaban', 'url'=>array('admin')),
);
?>

<h1>View Kelembaban #<?php echo $model->id_kelembaban; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_kelembaban',
		'id_station',
		'nilai',
		'waktu',
		'ket',
	),
)); ?>
