<?php
/* @var $this NodeController */
/* @var $model Node */

$this->breadcrumbs=array(
	'Nodes'=>array('index'),
	'Create',
);

?>

<h3>Tambah Node</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>