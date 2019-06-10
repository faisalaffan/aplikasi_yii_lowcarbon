<?php
/* @var $this COController */
/* @var $model CO */

$this->breadcrumbs=array(
	'Cos'=>array('index'),
	$model->id_co,
);

$this->menu=array(
	array('label'=>'List CO', 'url'=>array('index')),
	array('label'=>'Create CO', 'url'=>array('create')),
	array('label'=>'Update CO', 'url'=>array('update', 'id'=>$model->id_co)),
	array('label'=>'Delete CO', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_co),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CO', 'url'=>array('admin')),
);
?>

<h1>View CO #<?php echo $model->id_co; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_co',
		'id_station',
		'nilai',
		'waktu',
		'ket',
	),
)); ?>
