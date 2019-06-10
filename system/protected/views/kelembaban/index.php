<?php
/* @var $this KelembabanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kelembabans',
);

$this->menu=array(
	array('label'=>'Create Kelembaban', 'url'=>array('create')),
	array('label'=>'Manage Kelembaban', 'url'=>array('admin')),
);
?>

<h1>Kelembabans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
