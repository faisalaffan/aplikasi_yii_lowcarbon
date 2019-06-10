<?php
/* @var $this ArahanginController */
/* @var $model Arahangin */

$this->breadcrumbs=array(
	'Arahangins'=>array('index'),
	$model->id_arahangin,
);

$this->menu=array(
	array('label'=>'List Arahangin', 'url'=>array('index')),
	array('label'=>'Create Arahangin', 'url'=>array('create')),
	array('label'=>'Update Arahangin', 'url'=>array('update', 'id'=>$model->id_arahangin)),
	array('label'=>'Delete Arahangin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_arahangin),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Arahangin', 'url'=>array('admin')),
);
?>

<h1>View Arahangin #<?php echo $model->id_arahangin; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_arahangin',
		'id_station',
		'nilai',
		'waktu',
		'ket',
	),
)); ?>
