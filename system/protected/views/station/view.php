<?php
/* @var $this StationController */
/* @var $model Station */

$this->breadcrumbs=array(
	'Stations'=>array('index'),
	$model->id_station,
);


?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src='https://maps.google.co.id/maps/api/js?key=AIzaSyCQm6Y1NjB8PLn8piM5CVz5B_XBxE98aHM'></script>


<?php

$id_station = $model->id_station;

?>


<h3>Detail Data Station <?php echo $model->nama_station?> <?php echo CHtml::button('Kembali Ke Daftar Station', array('submit' => array('admin'),"class"=>"btn btn-success")); ?></h3>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#riwayat-kerja" data-toggle="tab">Data Logging</a></li>
              <li><a href="#log-login" data-toggle="tab">Detail Informasi</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="riwayat-kerja">
			      <div class="row">
			        <div class="col col-md-6">
			        	<h4>Data Log Suhu <?php echo CHtml::button('Export Data', array('submit' => array('exportc','id'=>$id_station), "class"=>"btn btn-success btn-flat")); ?></h4>
						<?php
							$model2=new Suhu('search');
							$model2->unsetAttributes();  // clear any default values
							$model2->id_station = $id_station;
							if(isset($_GET['Suhu']))
								$model2->attributes=$_GET['Suhu'];
						?>
							<div class="CGridViewContainer">
								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'suhu-grid',
									'dataProvider'=>$model2->search(),
									'filter'=>$model2,
									'columns'=>array(
								        array(
								            'name'=>'nilai',
									   		'htmlOptions'=>array('width'=>'100px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'$data->nilai',
								        ),
								        array(
								            //'name'=>'tgl_sewa',
								            'header'=>'Waktu',
									   		'htmlOptions'=>array('width'=>'150px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'Yii::app()->dateFormatter->format("dd-MM-yyyy HH:mm:ss",$data->waktu)',
								        ),
									array(
								        'name'=>'ket',
								        'type'=>'raw',
										'value' => 'Suhu::model()->getStatus1($data->ket)',
										'filter'=>array('1'=>'Abnormal','0'=>'Normal'),							
								    ),
							        array(
							                'class' => 'CButtonColumn',
							                'header'=>'Operasi',
							                'template' => '{update} {delete}',
							                'buttons'=>array(								                	                        	                	
							                        'update' => array(
							                                'label'=>'Update', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('suhu/update', 'id'=>\$data->id_suhu))",
							                                'imageUrl'=>'../../../images/update.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'update'), // HTML options for the button
							                        ),		
							                        'delete' => array(
							                                'label'=>'Hapus', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('suhu/delete', 'id'=>\$data->id_suhu))",
							                                'imageUrl'=>'../../../images/delete.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'delete'), // HTML options for the button
							                        ),							                        		                                                
							                ),
							                'visible'=>Yii::app()->user->isAdmin(),	 
							        ),
									),
								)); ?>

		              	</div>
			        </div>    
			        <div class="col col-md-6">
			        	<h4>Data Log Karbonmonoksida (CO) <?php echo CHtml::button('Export Data', array('submit' => array('exportco','id'=>$id_station), "class"=>"btn btn-success btn-flat")); ?></h4>
						<?php
							$model3=new CO('search');
							$model3->unsetAttributes();  // clear any default values
							$model3->id_station = $id_station;
							if(isset($_GET['CO']))
								$model3->attributes=$_GET['CO'];
						?>
							<div class="CGridViewContainer">
								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'co-grid',
									'dataProvider'=>$model3->search(),
									'filter'=>$model3,
									'columns'=>array(
								        array(
								            'name'=>'nilai',
									   		'htmlOptions'=>array('width'=>'100px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'$data->nilai',
								        ),
								        array(
								            //'name'=>'tgl_sewa',
								            'header'=>'Waktu',
									   		'htmlOptions'=>array('width'=>'150px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'Yii::app()->dateFormatter->format("dd-MM-yyyy HH:mm:ss",$data->waktu)',
								        ),
									array(
								        'name'=>'ket',
								        'type'=>'raw',
										'value' => 'Suhu::model()->getStatus1($data->ket)',
										'filter'=>array('1'=>'Abnormal','0'=>'Normal'),							
								    ),
							        array(
							                'class' => 'CButtonColumn',
							                'header'=>'Operasi',
							                'template' => '{update} {delete}',
							                'buttons'=>array(								                	                        	                	
							                        'update' => array(
							                                'label'=>'Update', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('cO/update', 'id'=>\$data->id_co))",
							                                'imageUrl'=>'../../../images/update.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'update'), // HTML options for the button
							                        ),		
							                        'delete' => array(
							                                'label'=>'Hapus', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('cO/delete', 'id'=>\$data->id_co))",
							                                'imageUrl'=>'../../../images/delete.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'delete'), // HTML options for the button
							                        ),							                        		                                                
							                ),
							                'visible'=>Yii::app()->user->isAdmin(),	 
							        ),
									),
								)); ?>

		              	</div>
			        </div>  			          
			      </div>              	

			      <div class="row">
			        <div class="col col-md-6">
			        	<h4>Data Log Kelembaban <?php echo CHtml::button('Export Data', array('submit' => array('exporth','id'=>$id_station), "class"=>"btn btn-success btn-flat")); ?></h4>
						<?php
							$model4=new Kelembaban('search');
							$model4->unsetAttributes();  // clear any default values
							$model4->id_station = $id_station;
							if(isset($_GET['Kelembaban']))
								$model4->attributes=$_GET['Kelembaban'];
						?>
							<div class="CGridViewContainer">
								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'kelembaban-grid',
									'dataProvider'=>$model4->search(),
									'filter'=>$model4,
									'columns'=>array(
								        array(
								            'name'=>'nilai',
									   		'htmlOptions'=>array('width'=>'100px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'$data->nilai',
								        ),
								        array(
								            //'name'=>'tgl_sewa',
								            'header'=>'Waktu',
									   		'htmlOptions'=>array('width'=>'150px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'Yii::app()->dateFormatter->format("dd-MM-yyyy HH:mm:ss",$data->waktu)',
								        ),
									array(
								        'name'=>'ket',
								        'type'=>'raw',
										'value' => 'Suhu::model()->getStatus1($data->ket)',
										'filter'=>array('1'=>'Abnormal','0'=>'Normal'),							
								    ),
							        array(
							                'class' => 'CButtonColumn',
							                'header'=>'Operasi',
							                'template' => '{update} {delete}',
							                'buttons'=>array(								                	                        	                	
							                        'update' => array(
							                                'label'=>'Update', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('kelembaban/update', 'id'=>\$data->id_kelembaban))",
							                                'imageUrl'=>'../../../images/update.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'update'), // HTML options for the button
							                        ),		
							                        'delete' => array(
							                                'label'=>'Hapus', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('kelembaban/delete', 'id'=>\$data->id_kelembaban))",
							                                'imageUrl'=>'../../../images/delete.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'delete'), // HTML options for the button
							                        ),							                        		                                                
							                ),
							                'visible'=>Yii::app()->user->isAdmin(),	 
							        ),
									),
								)); ?>

		              	</div>
			        </div>    
			        <div class="col col-md-6">
			        	<h4>Data Log Metan (CH4) <?php echo CHtml::button('Export Data', array('submit' => array('exportch4','id'=>$id_station), "class"=>"btn btn-success btn-flat")); ?></h4>
						<?php
							$model5=new Metan('search');
							$model5->unsetAttributes();  // clear any default values
							$model5->id_station = $id_station;
							if(isset($_GET['Metan']))
								$model5->attributes=$_GET['Metan'];
						?>
							<div class="CGridViewContainer">
								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'metan-grid',
									'dataProvider'=>$model5->search(),
									'filter'=>$model5,
									'columns'=>array(
								        array(
								            'name'=>'nilai',
									   		'htmlOptions'=>array('width'=>'100px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'$data->nilai',
								        ),
								        array(
								            //'name'=>'tgl_sewa',
								            'header'=>'Waktu',
									   		'htmlOptions'=>array('width'=>'150px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'Yii::app()->dateFormatter->format("dd-MM-yyyy HH:mm:ss",$data->waktu)',
								        ),
									array(
								        'name'=>'ket',
								        'type'=>'raw',
										'value' => 'Suhu::model()->getStatus1($data->ket)',
										'filter'=>array('1'=>'Abnormal','0'=>'Normal'),							
								    ),
							        array(
							                'class' => 'CButtonColumn',
							                'header'=>'Operasi',
							                'template' => '{update} {delete}',
							                'buttons'=>array(								                	                        	                	
							                        'update' => array(
							                                'label'=>'Update', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('metan/update', 'id'=>\$data->id_metan))",
							                                'imageUrl'=>'../../../images/update.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'update'), // HTML options for the button
							                        ),		
							                        'delete' => array(
							                                'label'=>'Hapus', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('metan/delete', 'id'=>\$data->id_metan))",
							                                'imageUrl'=>'../../../images/delete.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'delete'), // HTML options for the button
							                        ),							                        		                                                
							                ),
							                'visible'=>Yii::app()->user->isAdmin(),	 
							        ),
									),
								)); ?>

		              	</div>
			        </div>  			          
			      </div> 


			      <div class="row">
			        <div class="col col-md-6">
			        	<h4>Data Log Tegangan <?php echo CHtml::button('Export Data', array('submit' => array('exportv','id'=>$id_station), "class"=>"btn btn-success btn-flat")); ?></h4>
						<?php
							$model6=new Tegangan('search');
							$model6->unsetAttributes();  // clear any default values
							$model6->id_station = $id_station;
							if(isset($_GET['Tegangan']))
								$model6->attributes=$_GET['Tegangan'];
						?>
							<div class="CGridViewContainer">
								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'tegangan-grid',
									'dataProvider'=>$model6->search(),
									'filter'=>$model6,
									'columns'=>array(
								        array(
								            'name'=>'nilai',
									   		'htmlOptions'=>array('width'=>'100px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'$data->nilai',
								        ),
								        array(
								            //'name'=>'tgl_sewa',
								            'header'=>'Waktu',
									   		'htmlOptions'=>array('width'=>'150px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'Yii::app()->dateFormatter->format("dd-MM-yyyy HH:mm:ss",$data->waktu)',
								        ),
									array(
								        'name'=>'ket',
								        'type'=>'raw',
										'value' => 'Suhu::model()->getStatus1($data->ket)',
										'filter'=>array('1'=>'Abnormal','0'=>'Normal'),							
								    ),
							        array(
							                'class' => 'CButtonColumn',
							                'header'=>'Operasi',
							                'template' => '{update} {delete}',
							                'buttons'=>array(								                	                        	                	
							                        'update' => array(
							                                'label'=>'Update', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('tegangan/update', 'id'=>\$data->id_tegangan))",
							                                'imageUrl'=>'../../../images/update.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'update'), // HTML options for the button
							                        ),		
							                        'delete' => array(
							                                'label'=>'Hapus', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('tegangan/delete', 'id'=>\$data->id_tegangan))",
							                                'imageUrl'=>'../../../images/delete.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'delete'), // HTML options for the button
							                        ),							                        		                                                
							                ),
							                'visible'=>Yii::app()->user->isAdmin(),	 
							        ),
									),
								)); ?>

		              	</div>
			        </div>    
			        <div class="col col-md-6">
			        	<h4>Data Log Karbondioksida <?php echo CHtml::button('Export Data', array('submit' => array('exportco2','id'=>$id_station), "class"=>"btn btn-success btn-flat")); ?></h4>
						<?php
							$model7=new CO2('search');
							$model7->unsetAttributes();  // clear any default values
							$model7->id_station = $id_station;
							if(isset($_GET['CO2']))
								$model7->attributes=$_GET['CO2'];
						?>
							<div class="CGridViewContainer">
								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'co2-grid',
									'dataProvider'=>$model7->search(),
									'filter'=>$model7,
									'columns'=>array(
								        array(
								            'name'=>'nilai',
									   		'htmlOptions'=>array('width'=>'100px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'$data->nilai',
								        ),
								        array(
								            //'name'=>'tgl_sewa',
								            'header'=>'Waktu',
									   		'htmlOptions'=>array('width'=>'150px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'Yii::app()->dateFormatter->format("dd-MM-yyyy HH:mm:ss",$data->waktu)',
								        ),
									array(
								        'name'=>'ket',
								        'type'=>'raw',
										'value' => 'Suhu::model()->getStatus1($data->ket)',
										'filter'=>array('1'=>'Abnormal','0'=>'Normal'),							
								    ),
							        array(
							                'class' => 'CButtonColumn',
							                'header'=>'Operasi',
							                'template' => '{update} {delete}',
							                'buttons'=>array(								                	                        	                	
							                        'update' => array(
							                                'label'=>'Update', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('cO2/update', 'id'=>\$data->id_co2))",
							                                'imageUrl'=>'../../../images/update.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'update'), // HTML options for the button
							                        ),		
							                        'delete' => array(
							                                'label'=>'Hapus', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('cO2/delete', 'id'=>\$data->id_co2))",
							                                'imageUrl'=>'../../../images/delete.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'delete'), // HTML options for the button
							                        ),							                        		                                                
							                ),
							                'visible'=>Yii::app()->user->isAdmin(),	 
							        ),
									),
								)); ?>

		              	</div>
			        </div>  			          
			      </div> 

			      <div class="row">
			        <div class="col col-md-6">
			        	<h4>Data Log Kecepatan Angin <?php echo CHtml::button('Export Data', array('submit' => array('exporta','id'=>$id_station), "class"=>"btn btn-success btn-flat")); ?></h4>
						<?php
							$model8=new Angin('search');
							$model8->unsetAttributes();  // clear any default values
							$model8->id_station = $id_station;
							if(isset($_GET['Angin']))
								$model8->attributes=$_GET['Angin'];
						?>
							<div class="CGridViewContainer">
								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'angin-grid',
									'dataProvider'=>$model8->search(),
									'filter'=>$model8,
									'columns'=>array(
								        array(
								            'name'=>'nilai',
									   		'htmlOptions'=>array('width'=>'100px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'$data->nilai',
								        ),
								        array(
								            //'name'=>'tgl_sewa',
								            'header'=>'Waktu',
									   		'htmlOptions'=>array('width'=>'150px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'Yii::app()->dateFormatter->format("dd-MM-yyyy HH:mm:ss",$data->waktu)',
								        ),
									array(
								        'name'=>'ket',
								        'type'=>'raw',
										'value' => 'Suhu::model()->getStatus1($data->ket)',
										'filter'=>array('1'=>'Abnormal','0'=>'Normal'),							
								    ),
							        array(
							                'class' => 'CButtonColumn',
							                'header'=>'Operasi',
							                'template' => '{update} {delete}',
							                'buttons'=>array(								                	                        	                	
							                        'update' => array(
							                                'label'=>'Update', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('angin/update', 'id'=>\$data->id_angin))",
							                                'imageUrl'=>'../../../images/update.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'update'), // HTML options for the button
							                        ),		
							                        'delete' => array(
							                                'label'=>'Hapus', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('angin/delete', 'id'=>\$data->id_angin))",
							                                'imageUrl'=>'../../../images/delete.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'delete'), // HTML options for the button
							                        ),							                        		                                                
							                ),
							                'visible'=>Yii::app()->user->isAdmin(),	 
							        ),
									),
								)); ?>

		              	</div>
			        </div>    
			        <div class="col col-md-6">
			        	<h4>Data Log Arah Angin <?php echo CHtml::button('Export Data', array('submit' => array('exportaa','id'=>$id_station), "class"=>"btn btn-success btn-flat")); ?></h4>
						<?php
							$model9=new Arahangin('search');
							$model9->unsetAttributes();  // clear any default values
							$model9->id_station = $id_station;
							if(isset($_GET['Arahangin']))
								$model9->attributes=$_GET['Arahangin'];
						?>
							<div class="CGridViewContainer">
								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'co2-grid',
									'dataProvider'=>$model9->search(),
									'filter'=>$model9,
									'columns'=>array(
								        array(
								            'name'=>'nilai',
									   		'htmlOptions'=>array('width'=>'100px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'$data->nilai',
								        ),
								        array(
								            //'name'=>'tgl_sewa',
								            'header'=>'Waktu',
									   		'htmlOptions'=>array('width'=>'150px',
									   		'style' => 'text-align: center;'),								            
								            'type'=>'raw',
								            'value'=>'Yii::app()->dateFormatter->format("dd-MM-yyyy HH:mm:ss",$data->waktu)',
								        ),
									array(
								        'name'=>'ket',
								        'type'=>'raw',
										'value' => 'Suhu::model()->getStatus1($data->ket)',
										'filter'=>array('1'=>'Abnormal','0'=>'Normal'),							
								    ),
							        array(
							                'class' => 'CButtonColumn',
							                'header'=>'Operasi',
							                'template' => '{update} {delete}',
							                'buttons'=>array(								                	                        	                	
							                        'update' => array(
							                                'label'=>'Update', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('arahangin/update', 'id'=>\$data->id_arahangin))",
							                                'imageUrl'=>'../../../images/update.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'update'), // HTML options for the button
							                        ),		
							                        'delete' => array(
							                                'label'=>'Hapus', // text label of the button
							                                'url'=>"CHtml::normalizeUrl(array('arahangin/delete', 'id'=>\$data->id_arahangin))",
							                                'imageUrl'=>'../../../images/delete.png',  // image URL of the button. If not set or false, a text link is used
							                                'options' => array('class'=>'delete'), // HTML options for the button
							                        ),							                        		                                                
							                ),
							                'visible'=>Yii::app()->user->isAdmin(),	 
							        ),
									),
								)); ?>

		              	</div>
			        </div>  			          
			      </div> 


              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="log-login">
			      <div class="row">
			        <div class="col col-md-12">
			          <div id="map" style="width: 100%; height: 420px;"></div>
			        </div>      
			      </div>              	
				
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

    <script type="text/javascript">
    var locations = [
            <?php
            	$connection=Yii::app()->db;
        $sql="SELECT tbl_station.id_station as kode_station,tbl_station.nama_station,tbl_station.lat,tbl_station.lng from tbl_station order by tbl_station.nama_station";
        $menu=$connection->createCommand($sql)->query();
        $menu->bindColumn(2,$nama_station);
        $menu->bindColumn(3,$lati);
        $menu->bindColumn(4,$longi);
        $menu->bindColumn(5,$jumlah_station);
      	$no = 1;
        while($menu->read()!==false)
        {
             //nilai $purchase_item_id,$item_name dan $qty_unrec sudah diperoleh di sini misal
             ?>['<b><?php echo "Nama station : ".$nama_station;?></b>', <?php echo $lati;?>, <?php echo $longi;?>, <?php echo $no;?>], <?php
             $no = $no + 1;

        }

            ?>

    /*
     * Next point on map
     *   -Notice how the last number within the brackets incrementally increases from the prior marker
     *   -Use http://itouchmap.com/latlong.html to get Latitude and Longitude of a specific address
     *   -Follow the model below:
     *      ['<b>Name 3</b><br>Address Line 1<br>City, ST Zipcode<br>Phone: ###-###-####<br><a href="#" target="_blank">Link<a> of some sort.', ##.####, -##.####, #]
     */
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      /* Zoom level of your map */
      center: new google.maps.LatLng(-2.279866, 117.369878),
      /* coordinates for the center of your map */
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
         icon: '<?php echo Yii::app()->request->baseUrl; ?>/images/exposure.png'
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    </script>      