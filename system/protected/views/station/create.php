<?php
/* @var $this StationController */
/* @var $model Station */

$this->breadcrumbs=array(
	'Stations'=>array('index'),
	'Create',
);

?>

<h3>Tambah Station</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>