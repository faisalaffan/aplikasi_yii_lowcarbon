<?php
/* @var $this MetanController */
/* @var $model Metan */

$this->breadcrumbs=array(
	'Metans'=>array('index'),
	$model->id_metan=>array('view','id'=>$model->id_metan),
	'Update',
);

$this->menu=array(
	array('label'=>'List Metan', 'url'=>array('index')),
	array('label'=>'Create Metan', 'url'=>array('create')),
	array('label'=>'View Metan', 'url'=>array('view', 'id'=>$model->id_metan)),
	array('label'=>'Manage Metan', 'url'=>array('admin')),
);
?>

<h1>Update Metan <?php echo $model->id_metan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>