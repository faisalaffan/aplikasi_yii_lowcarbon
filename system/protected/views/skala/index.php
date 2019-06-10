<?php
/* @var $this SkalaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Skalas',
);

$this->menu=array(
	array('label'=>'Create Skala', 'url'=>array('create')),
	array('label'=>'Manage Skala', 'url'=>array('admin')),
);
?>

<h1>Skalas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
