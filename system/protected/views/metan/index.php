<?php
/* @var $this MetanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Metans',
);

$this->menu=array(
	array('label'=>'Create Metan', 'url'=>array('create')),
	array('label'=>'Manage Metan', 'url'=>array('admin')),
);
?>

<h1>Metans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
