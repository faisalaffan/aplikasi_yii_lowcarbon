<?php
/* @var $this NodeController */
/* @var $model Node */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'node-form',
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
							<?php echo $form->textField($model,'id_node',array('size'=>60,'maxlength'=>150, "class"=>"form-control",'placeholder'=>'Masukkan ID Node','required'=>'required')); ?>						
							<?php echo $form->error($model,'id_node'); ?>
		                </div>
					</div>	
					<div class="form-group">
							<?php echo $form->labelEx($model,'nama_node',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							<?php echo $form->textField($model,'nama_node',array('size'=>60,'maxlength'=>150, "class"=>"form-control" ,'placeholder'=>'Masukkan Nama Node')); ?>
							<?php echo $form->error($model,'nama_node'); ?>
		                </div>
					</div>
              		<div class="form-group">
							<?php echo $form->labelEx($model,'alamat',array("class"=>"col-sm-2 control-label")); ?>
						<div class="col-sm-7">
							<?php echo $form->textArea($model,'alamat',array('rows'=>3, 'cols'=>75, 'maxlength'=>500,"class"=>"form-control",'placeholder'=>'Masukkan Alamat Tempat Tinggal Anda Saat Ini')); ?>
							<?php echo $form->error($model,'alamat'); ?>
						</div>
					</div>
              		<div class="form-group">
							<?php echo $form->labelEx($model,'no_alamat',array("class"=>"col-sm-2 control-label")); ?>
						<div class="col-sm-4">
							<?php echo $form->textField($model,'no_alamat',array('size'=>60,'maxlength'=>20,"class"=>"form-control",'placeholder'=>'Masukkan Nomor Rumah Anda')); ?>
							<?php echo $form->error($model,'no_alamat'); ?>
						</div>
					</div>	
              		<div class="form-group">
							<?php echo $form->labelEx($model,'rt',array("class"=>"col-sm-2 control-label")); ?>
						<div class="col-sm-2">
							<?php echo $form->textField($model,'rt',array('size'=>60,'maxlength'=>20,"class"=>"form-control",'placeholder'=>'Masukkan Nomor RT')); ?>
							<?php echo $form->error($model,'rt'); ?>
						</div>
							<?php echo $form->labelEx($model,'rw',array("class"=>"col-sm-3 control-label")); ?>
						<div class="col-sm-2">
							<?php echo $form->textField($model,'rw',array('size'=>60,'maxlength'=>20,"class"=>"form-control",'placeholder'=>'Masukkan Nomor RW ')); ?>
							<?php echo $form->error($model,'rw'); ?>
						</div>							
					</div>	
					<div class="form-group">
							<?php echo $form->labelEx($model,'kecamatan',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							<?php echo $form->textField($model,'kecamatan',array('size'=>60,'maxlength'=>150, "class"=>"form-control" ,'placeholder'=>'Masukkan Nama Kecamatan')); ?>
							<?php echo $form->error($model,'kecamatan'); ?>
		                </div>
					</div>
					<div class="form-group">
							<?php echo $form->labelEx($model,'kota',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							<?php echo $form->textField($model,'kota',array('size'=>60,'maxlength'=>150, "class"=>"form-control" ,'placeholder'=>'Masukkan Nama Kota')); ?>
							<?php echo $form->error($model,'kota'); ?>
		                </div>
					</div>					
					<div class="form-group">
							<?php echo $form->labelEx($model,'provinsi',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							<?php echo $form->textField($model,'provinsi',array('size'=>60,'maxlength'=>150, "class"=>"form-control" ,'placeholder'=>'Masukkan Nama Provinsi')); ?>
							<?php echo $form->error($model,'provinsi'); ?>
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
						<?php echo CHtml::button('Kembali', array('submit' => array('node/admin/'), "class"=>"btn btn-success btn-flat")); ?>	
                    </div>
                  </div>																															            																																            		                   	
				</div>																														            		            					              	              
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->