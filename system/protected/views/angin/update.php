<?php
/* @var $this AnginController */
/* @var $model Angin */

$this->breadcrumbs=array(
	'Angins'=>array('index'),
	$model->id_angin=>array('view','id'=>$model->id_angin),
	'Update',
);

$this->menu=array(
	array('label'=>'List Angin', 'url'=>array('index')),
	array('label'=>'Create Angin', 'url'=>array('create')),
	array('label'=>'View Angin', 'url'=>array('view', 'id'=>$model->id_angin)),
	array('label'=>'Manage Angin', 'url'=>array('admin')),
);
?>

<h1>Update Angin <?php echo $model->id_angin; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>