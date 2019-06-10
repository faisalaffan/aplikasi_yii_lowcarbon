<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h3>Update User <?php echo $model->nama_user; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>