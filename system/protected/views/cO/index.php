<?php
/* @var $this COController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cos',
);

$this->menu=array(
	array('label'=>'Create CO', 'url'=>array('create')),
	array('label'=>'Manage CO', 'url'=>array('admin')),
);
?>

<h1>Cos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
