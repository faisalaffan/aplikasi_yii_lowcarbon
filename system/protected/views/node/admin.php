<?php
/* @var $this NodeController */
/* @var $model Node */

$this->breadcrumbs=array(
	'Nodes'=>array('index'),
	'Manage',
);

?>

<h3>Daftar Node</h3>

<div class="box box-primary">
	<div class="box-body">	
		<?php
		if (Yii::app()->user->isAdmin()){
		?>	<?php echo CHtml::button('Tambah Node', array('submit' => array('create'),"class"=>"btn btn-primary btn-flat")); ?><?php
		}
		?>		
			<?php echo CHtml::button('Lihat Peta Node', array('submit' => array('mapping'),"class"=>"btn btn-success btn-flat")); ?>


		<div class="CGridViewContainer">				
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'node-grid',
				'cssFile' => Yii::app()->request->baseUrl."/css/gridview_overflow.css",
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
					'id_node',
					'nama_node',
					'alamat',
					'no_alamat',
					//'rt',
					//'rw',
					'kota',
					'kecamatan',
					//'provinsi',
					'lng',
					'lat',
					/*	array(
				            'template' => '{view}', 					
							'header'=> 'View',		
					   		'htmlOptions'=>array('width'=>'80px',
					   		'style' => 'text-align: center;'),									
							'class'=>'CButtonColumn',
							'visible'=>Yii::app()->user->isAdmin(),				
						),
					*/
						array(
				            'template' => '{update}', 					
							'header'=> 'Update',		
					   		'htmlOptions'=>array('width'=>'80px',
					   		'style' => 'text-align: center;'),									
							'class'=>'CButtonColumn',
							'visible'=>Yii::app()->user->isAdmin(),				
						),						
						array(
				            'template' => '{delete}', 					
							'header'=> 'Hapus',		
					   		'htmlOptions'=>array('width'=>'20px',
					   		'style' => 'text-align: center;'),									
							'class'=>'CButtonColumn',
							'visible'=>Yii::app()->user->isAdmin(),				
						),	
				),
			)); ?>		
		</div>
</div></div>
