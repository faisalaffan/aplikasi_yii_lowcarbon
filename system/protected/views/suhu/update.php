<?php
/* @var $this SuhuController */
/* @var $model Suhu */

$this->breadcrumbs=array(
	'Suhus'=>array('index'),
	$model->id_suhu=>array('view','id'=>$model->id_suhu),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suhu', 'url'=>array('index')),
	array('label'=>'Create Suhu', 'url'=>array('create')),
	array('label'=>'View Suhu', 'url'=>array('view', 'id'=>$model->id_suhu)),
	array('label'=>'Manage Suhu', 'url'=>array('admin')),
);
?>

<h1>Update Suhu <?php echo $model->id_suhu; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>