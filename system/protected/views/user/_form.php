<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
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
								<?php echo $form->labelEx($model,'nama_user',array("class"=>"col-sm-2 control-label")); ?>
							<div class="col-sm-4">
								<?php echo $form->textField($model,'nama_user',array('size'=>60,'maxlength'=>100,"class"=>"form-control",'placeholder'=>'Masukkan Nama Anda')); ?>
								<?php echo $form->error($model,'nama_user'); ?>
							</div>
						</div>	
	              		<div class="form-group">
								<?php echo $form->labelEx($model,'username',array("class"=>"col-sm-2 control-label")); ?>
							<div class="col-sm-4">
								<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100,"class"=>"form-control",'placeholder'=>'Masukkan Username Anda')); ?>
								<?php echo $form->error($model,'username'); ?>
							</div>
						</div>	
	              		<div class="form-group">
								<?php echo $form->labelEx($model,'password',array("class"=>"col-sm-2 control-label")); ?>
							<div class="col-sm-5">
								<?php echo $form->PasswordField($model,'password',array('size'=>60,'maxlength'=>40,"class"=>"form-control",'placeholder'=>'Masukkan Password Anda')); ?>
								<?php echo $form->error($model,'password'); ?>
							</div>
						</div>
	              		<div class="form-group">
								<?php echo $form->labelEx($model,'password_repeat',array("class"=>"col-sm-2 control-label")); ?>
							<div class="col-sm-5">
								<?php echo $form->PasswordField($model,'password_repeat',array('size'=>60,'maxlength'=>40,"class"=>"form-control",'placeholder'=>'Ulangi Memasukkan Password Anda')); ?>
								<?php echo $form->error($model,'password_repeat'); ?>
							</div>
						</div>	
							<div class="form-group">
								<div class="col-sm-2 control-label">
									<?php echo $form->labelEx($model,'jenis_kelamin'); ?>
				                </div>
				                <div class="col-sm-2">
							        <?php echo $form->dropDownList($model,'jenis_kelamin',$model->getGender(),array( "class"=>"form-control"));?>
									<?php echo $form->error($model,'jenis_kelamin'); ?>
				                </div>
							</div>	
	              		<div class="form-group">
								<?php echo $form->labelEx($model,'hp',array("class"=>"col-sm-2 control-label")); ?>
							<div class="col-sm-4">
								<?php echo $form->textField($model,'hp',array('size'=>60,'maxlength'=>20,"class"=>"form-control",'placeholder'=>'Masukkan Nomor HP Anda')); ?>
								<?php echo $form->error($model,'hp'); ?>
							</div>
						</div>	
	              		<div class="form-group">
								<?php echo $form->labelEx($model,'alamat',array("class"=>"col-sm-2 control-label")); ?>
							<div class="col-sm-8">
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
							<?php echo $form->hiddenField($model,'level',array('size'=>60,'maxlength'=>90, 'value'=>3, 'readonly'=>true, "class"=>"form-control")); ?>	                				
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
						<?php
						if (Yii::app()->user->isAdmin()){ ?>
							<div class="form-group">
								<div class="col-sm-2 control-label">
									<?php echo $form->labelEx($model,'level'); ?>
				                </div>
				                <div class="col-sm-3">
							        <?php echo $form->dropDownList($model,'level',$model->getLevel1(),array( "class"=>"form-control"));?>
									<?php echo $form->error($model,'level'); ?>
				                </div>
							</div>
						<?php
						}
						?> 
																																								
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Daftar' : 'Simpan',array("class"=>"btn btn-primary btn-flat")); ?>								
						<?php
						if (Yii::app()->user->isGuest){ ?>
							<?php echo CHtml::button('Kembali ke Halaman Login', array('submit' => array('site/login'), "class"=>"btn btn-info btn-flat")); ?>
						<?php
						}
						?>                    	
                    	
                    </div>
                  </div>									

<?php $this->endWidget(); ?>

</div><!-- form -->