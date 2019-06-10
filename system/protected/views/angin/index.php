<?php
/* @var $this AnginController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Angins',
);

$this->menu=array(
	array('label'=>'Create Angin', 'url'=>array('create')),
	array('label'=>'Manage Angin', 'url'=>array('admin')),
);
?>

<h1>Angins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
