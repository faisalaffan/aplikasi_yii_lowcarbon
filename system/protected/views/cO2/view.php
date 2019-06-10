<?php
/* @var $this CO2Controller */
/* @var $model CO2 */

$this->breadcrumbs=array(
	'Co2s'=>array('index'),
	$model->id_co2,
);

$this->menu=array(
	array('label'=>'List CO2', 'url'=>array('index')),
	array('label'=>'Create CO2', 'url'=>array('create')),
	array('label'=>'Update CO2', 'url'=>array('update', 'id'=>$model->id_co2)),
	array('label'=>'Delete CO2', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_co2),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CO2', 'url'=>array('admin')),
);
?>

<h1>View CO2 #<?php echo $model->id_co2; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_co2',
		'id_station',
		'nilai',
		'waktu',
		'ket',
	),
)); ?>
