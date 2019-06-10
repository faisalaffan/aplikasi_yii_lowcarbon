<?php
/* @var $this TeganganController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tegangans',
);

$this->menu=array(
	array('label'=>'Create Tegangan', 'url'=>array('create')),
	array('label'=>'Manage Tegangan', 'url'=>array('admin')),
);
?>

<h1>Tegangans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
