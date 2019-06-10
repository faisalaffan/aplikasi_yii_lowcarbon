<?php
/* @var $this StationController */
/* @var $model Station */

$this->breadcrumbs=array(
	'Stations'=>array('index'),
	$model->id_station=>array('view','id'=>$model->id_station),
	'Update',
);

?>

<h3>Update Station <?php echo $model->id_station; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>