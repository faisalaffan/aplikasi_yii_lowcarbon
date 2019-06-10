<?php
/* @var $this StationController */
/* @var $model Station */

$this->breadcrumbs=array(
	'Stations'=>array('index'),
	'Manage',
);

?>

<h3>Daftar Station</h3>


<div class="box box-primary">
	<div class="box-body">	
		<?php
		if (Yii::app()->user->isAdmin()){
		?>	<?php echo CHtml::button('Tambah Station', array('submit' => array('create'),"class"=>"btn btn-primary btn-flat")); ?><?php
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
						'id_station',
						array(
					        'name'=>'id_node',
					        'type'=>'raw',
					        'value'=>'$data->idNode->nama_node',
					        'filter'=>Chtml::listData(Node::model()->findAll(),'id_node','nama_node'),
					    ),
						'nama_station',
						'lng',
						'lat',
				        array(
				            'class' => 'CButtonColumn',
				            'template' => '{realtime}',
				            'header'=> 'Realtime Data',
				            'buttons'=>array(
				                'realtime' => array(
				                    'label'=>'Realtime Data', // text label of the button
				                    'url'=>"CHtml::normalizeUrl(array('station/realtime', 'id'=>\$data->id_station))",
				                    'imageUrl'=>'../images/realtime.png',  // image URL of the button. If not set or false, a text link is used
				                    'options' => array('class'=>'realtime'), // HTML options for the button	                    
				                ),                        
				            ),
				        ),						
						array(
				            'template' => '{view}', 					
							'header'=> 'Detail Log',		
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
