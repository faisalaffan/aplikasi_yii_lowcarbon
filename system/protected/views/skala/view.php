<?php
/* @var $this SkalaController */
/* @var $model Skala */

$this->breadcrumbs=array(
	'Skalas'=>array('index'),
	$model->kode,
);

$this->menu=array(
	array('label'=>'List Skala', 'url'=>array('index')),
	array('label'=>'Create Skala', 'url'=>array('create')),
	array('label'=>'Update Skala', 'url'=>array('update', 'id'=>$model->kode)),
	array('label'=>'Delete Skala', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->kode),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Skala', 'url'=>array('admin')),
);
?>

<h1>View Skala #<?php echo $model->kode; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'kode',
		'deskripsi_kode',
		'batas_paling_bawah',
		'batas_bawah',
		'batas_tengah',
		'batas_atas',
		'batas_paling_atas',
	),
)); ?>
