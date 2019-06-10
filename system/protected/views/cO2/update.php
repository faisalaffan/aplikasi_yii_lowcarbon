<?php
/* @var $this CO2Controller */
/* @var $model CO2 */

$this->breadcrumbs=array(
	'Co2s'=>array('index'),
	$model->id_co2=>array('view','id'=>$model->id_co2),
	'Update',
);

$this->menu=array(
	array('label'=>'List CO2', 'url'=>array('index')),
	array('label'=>'Create CO2', 'url'=>array('create')),
	array('label'=>'View CO2', 'url'=>array('view', 'id'=>$model->id_co2)),
	array('label'=>'Manage CO2', 'url'=>array('admin')),
);
?>

<h1>Update CO2 <?php echo $model->id_co2; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>