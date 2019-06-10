<?php
/* @var $this StationController */
/* @var $model Station */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'station-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

         <div class="box box-primary">
            <div class="box-header with-border">
          			<div class="box-tools pull-right">
            			<span class="label label-warning">Isian bertanda <span class="required">*</span> harap diisi.</span>
          			</div><!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              	<div class="box-body">
              	<?php echo $form->errorSummary($model); ?>		
					<div class="form-group">
							<?php echo $form->labelEx($model,'id_node',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							        <?php echo $form->dropDownList($model,'id_node',
										CHtml::listData(Node::model()->findAll(),
										'id_node','nama_node') ,array('empty'=>'--Pilih Node--', "class"=>"form-control"));
									?>	                	
							<?php echo $form->error($model,'id_node'); ?>
		                </div>
					</div>              							             	
					<div class="form-group">
							<?php echo $form->labelEx($model,'id_station',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							<?php echo $form->textField($model,'id_station',array('size'=>60,'maxlength'=>150, "class"=>"form-control",'placeholder'=>'Masukkan ID Station','required'=>'required')); ?>						
							<?php echo $form->error($model,'id_station'); ?>
		                </div>
					</div>	
					<div class="form-group">
							<?php echo $form->labelEx($model,'nama_station',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							<?php echo $form->textField($model,'nama_station',array('size'=>60,'maxlength'=>150, "class"=>"form-control" ,'placeholder'=>'Masukkan Nama Station')); ?>
							<?php echo $form->error($model,'nama_station'); ?>
		                </div>
					</div>
              		<div class="form-group">
							<?php echo $form->labelEx($model,'lat',array("class"=>"col-sm-2 control-label")); ?>
						<div class="col-sm-4">
							<?php echo $form->textField($model,'lat',array('size'=>60,'maxlength'=>75,"class"=>"form-control",'placeholder'=>'Masukkan Titik Latitude Lokasi')); ?>
							<?php echo $form->error($model,'lat'); ?>
						</div>
					</div>	
              		<div class="form-group">
							<?php echo $form->labelEx($model,'lng',array("class"=>"col-sm-2 control-label")); ?>
						<div class="col-sm-4">
							<?php echo $form->textField($model,'lng',array('size'=>60,'maxlength'=>75,"class"=>"form-control",'placeholder'=>'Masukkan Titik Longitude Lokasi')); ?>
							<?php echo $form->error($model,'lng'); ?>
						</div>
					</div>	
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah Data' : 'Simpan',array("class"=>"btn btn-primary btn-flat")); ?>	
						<?php echo CHtml::button('Kembali', array('submit' => array('station/admin/'), "class"=>"btn btn-success btn-flat")); ?>	
                    </div>
                  </div>																															            																																            		                   	
				</div>																														            		            					              	              
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->