<?php
/* @var $this SuhuController */
/* @var $model Suhu */

$this->breadcrumbs=array(
	'Suhus'=>array('index'),
	$model->id_suhu,
);

$this->menu=array(
	array('label'=>'List Suhu', 'url'=>array('index')),
	array('label'=>'Create Suhu', 'url'=>array('create')),
	array('label'=>'Update Suhu', 'url'=>array('update', 'id'=>$model->id_suhu)),
	array('label'=>'Delete Suhu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_suhu),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suhu', 'url'=>array('admin')),
);
?>

<h1>View Suhu #<?php echo $model->id_suhu; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_suhu',
		'id_station',
		'nilai',
		'waktu',
		'ket',
	),
)); ?>
