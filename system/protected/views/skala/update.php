<?php
/* @var $this SkalaController */
/* @var $model Skala */

$this->breadcrumbs=array(
	'Skalas'=>array('index'),
	$model->kode=>array('view','id'=>$model->kode),
	'Update',
);

?>

<h3>Update Skala <?php echo $model->deskripsi_kode; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>