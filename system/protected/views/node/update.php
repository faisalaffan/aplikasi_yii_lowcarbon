<?php
/* @var $this NodeController */
/* @var $model Node */

$this->breadcrumbs=array(
	'Nodes'=>array('index'),
	$model->id_node=>array('view','id'=>$model->id_node),
	'Update',
);

?>

<h3>Update Node <?php echo $model->id_node; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>