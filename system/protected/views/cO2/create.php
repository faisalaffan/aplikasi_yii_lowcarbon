<?php
/* @var $this CO2Controller */
/* @var $model CO2 */

$this->breadcrumbs=array(
	'Co2s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CO2', 'url'=>array('index')),
	array('label'=>'Manage CO2', 'url'=>array('admin')),
);
?>

<h1>Create CO2</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>