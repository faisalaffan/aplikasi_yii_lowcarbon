<?php
/* @var $this COController */
/* @var $model CO */

$this->breadcrumbs=array(
	'Cos'=>array('index'),
	$model->id_co=>array('view','id'=>$model->id_co),
	'Update',
);

$this->menu=array(
	array('label'=>'List CO', 'url'=>array('index')),
	array('label'=>'Create CO', 'url'=>array('create')),
	array('label'=>'View CO', 'url'=>array('view', 'id'=>$model->id_co)),
	array('label'=>'Manage CO', 'url'=>array('admin')),
);
?>

<h1>Update CO <?php echo $model->id_co; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>