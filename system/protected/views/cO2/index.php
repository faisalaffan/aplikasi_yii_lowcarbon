<?php
/* @var $this CO2Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Co2s',
);

$this->menu=array(
	array('label'=>'Create CO2', 'url'=>array('create')),
	array('label'=>'Manage CO2', 'url'=>array('admin')),
);
?>

<h1>Co2s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
