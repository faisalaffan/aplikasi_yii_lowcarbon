<?php
/* @var $this AnginController */
/* @var $model Angin */

$this->breadcrumbs=array(
	'Angins'=>array('index'),
	$model->id_angin,
);

$this->menu=array(
	array('label'=>'List Angin', 'url'=>array('index')),
	array('label'=>'Create Angin', 'url'=>array('create')),
	array('label'=>'Update Angin', 'url'=>array('update', 'id'=>$model->id_angin)),
	array('label'=>'Delete Angin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_angin),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Angin', 'url'=>array('admin')),
);
?>

<h1>View Angin #<?php echo $model->id_angin; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_angin',
		'id_station',
		'nilai',
		'waktu',
		'ket',
	),
)); ?>
