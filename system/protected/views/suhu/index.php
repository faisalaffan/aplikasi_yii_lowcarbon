<?php
/* @var $this SuhuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suhus',
);

$this->menu=array(
	array('label'=>'Create Suhu', 'url'=>array('create')),
	array('label'=>'Manage Suhu', 'url'=>array('admin')),
);
?>

<h1>Suhus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
