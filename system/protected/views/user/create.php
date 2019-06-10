<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

?>

<h3>Registrasi Pengguna</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>