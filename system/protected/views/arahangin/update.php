<?php
/* @var $this ArahanginController */
/* @var $model Arahangin */

$this->breadcrumbs=array(
	'Arahangins'=>array('index'),
	$model->id_arahangin=>array('view','id'=>$model->id_arahangin),
	'Update',
);

$this->menu=array(
	array('label'=>'List Arahangin', 'url'=>array('index')),
	array('label'=>'Create Arahangin', 'url'=>array('create')),
	array('label'=>'View Arahangin', 'url'=>array('view', 'id'=>$model->id_arahangin)),
	array('label'=>'Manage Arahangin', 'url'=>array('admin')),
);
?>

<h1>Update Arahangin <?php echo $model->id_arahangin; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>