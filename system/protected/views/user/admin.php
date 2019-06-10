<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

?>

<h3>Daftar Pengguna Sistem</h3>


<div class="box box-primary">
	<div class="box-body">	
		<?php
		if (Yii::app()->user->isAdmin()){
		?>	<?php echo CHtml::button('Tambah User', array('submit' => array('create'),"class"=>"btn btn-primary btn-flat")); ?><?php
		}
		?>		

		<div class="CGridViewContainer">
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'station-grid',
				'cssFile' => Yii::app()->request->baseUrl."/css/gridview_overflow.css",
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
				  		array(
				   			'header'=>'No',
				   			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				   			'htmlOptions'=>array('width'=>'40px',
				   			'style' => 'text-align: center;'),		   			
				   		),					
						'nama_user',
						'username',
						//'jenis_kelamin',
						'hp',
						'alamat',
						'no_alamat',
						'rt',
						'rw',
						'kecamatan',
						'kota',
						'provinsi',
						array(
							'name'=>'level',
							'type'=>'raw',
							'value'=>'User::model()->getLevel($data->level)',
							'filter'=>array('1'=>'Administrator','2'=>'Pemerintah','3'=>'Member'),
						),						
						array(
				            'template' => '{view}', 					
							'header'=> 'View',		
					   		'htmlOptions'=>array('width'=>'80px',
					   		'style' => 'text-align: center;'),									
							'class'=>'CButtonColumn',
							'visible'=>Yii::app()->user->isAdmin(),				
						),
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

