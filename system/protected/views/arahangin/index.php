<?php
/* @var $this ArahanginController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Arahangins',
);

$this->menu=array(
	array('label'=>'Create Arahangin', 'url'=>array('create')),
	array('label'=>'Manage Arahangin', 'url'=>array('admin')),
);
?>

<h1>Arahangins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
