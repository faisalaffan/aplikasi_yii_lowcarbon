<?php
/* @var $this MetanController */
/* @var $model Metan */

$this->breadcrumbs=array(
	'Metans'=>array('index'),
	$model->id_metan,
);

$this->menu=array(
	array('label'=>'List Metan', 'url'=>array('index')),
	array('label'=>'Create Metan', 'url'=>array('create')),
	array('label'=>'Update Metan', 'url'=>array('update', 'id'=>$model->id_metan)),
	array('label'=>'Delete Metan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_metan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Metan', 'url'=>array('admin')),
);
?>

<h1>View Metan #<?php echo $model->id_metan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_metan',
		'id_station',
		'nilai',
		'waktu',
		'ket',
	),
)); ?>
