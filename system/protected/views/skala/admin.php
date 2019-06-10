<?php
/* @var $this SkalaController */
/* @var $model Skala */

$this->breadcrumbs=array(
	'Skalas'=>array('index'),
	'Manage',
);

?>

<h3>Kelola Skala</h3>

<div class="box box-primary">
	<div class="box-body">	
		<?php
		if (Yii::app()->user->isAdmin()){
		?>	<?php //echo CHtml::button('Tambah Skala', array('submit' => array('create'),"class"=>"btn btn-primary btn-flat")); ?><?php
		}
		?>		

		<div class="CGridViewContainer">				
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'node-grid',
				'cssFile' => Yii::app()->request->baseUrl."/css/gridview_overflow.css",
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
						'kode',
						'deskripsi_kode',
						'batas_paling_bawah',
						'batas_bawah',
						'batas_tengah',
						'batas_atas',
						'batas_paling_atas',
						array(
				            'template' => '{update}', 					
							'header'=> 'Update',		
					   		'htmlOptions'=>array('width'=>'80px',
					   		'style' => 'text-align: center;'),									
							'class'=>'CButtonColumn',
							'visible'=>Yii::app()->user->isAdmin(),				
						),						
				),
			)); ?>		
		</div>
</div></div>
