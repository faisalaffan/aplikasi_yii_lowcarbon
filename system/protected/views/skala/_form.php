<?php
/* @var $this SkalaController */
/* @var $model Skala */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'skala-form',
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
							<?php echo $form->labelEx($model,'batas_paling_bawah',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							<?php echo $form->textField($model,'batas_paling_bawah',array('size'=>60,'maxlength'=>150, "class"=>"form-control",'placeholder'=>'Masukkan Batas Paling Bawah','required'=>'required')); ?>						
							<?php echo $form->error($model,'batas_paling_bawah'); ?>
		                </div>
					</div>	
					<div class="form-group">
							<?php echo $form->labelEx($model,'batas_bawah',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							<?php echo $form->textField($model,'batas_bawah',array('size'=>60,'maxlength'=>150, "class"=>"form-control",'placeholder'=>'Masukkan Batas Bawah','required'=>'required')); ?>						
							<?php echo $form->error($model,'batas_bawah'); ?>
		                </div>
					</div>		
					<div class="form-group">
							<?php echo $form->labelEx($model,'batas_tengah',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							<?php echo $form->textField($model,'batas_tengah',array('size'=>60,'maxlength'=>150, "class"=>"form-control",'placeholder'=>'Masukkan Batas Tengah','required'=>'required')); ?>						
							<?php echo $form->error($model,'batas_tengah'); ?>
		                </div>
					</div>
					<div class="form-group">
							<?php echo $form->labelEx($model,'batas_atas',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							<?php echo $form->textField($model,'batas_atas',array('size'=>60,'maxlength'=>150, "class"=>"form-control",'placeholder'=>'Masukkan Batas Atas','required'=>'required')); ?>						
							<?php echo $form->error($model,'batas_atas'); ?>
		                </div>
					</div>	
					<div class="form-group">
							<?php echo $form->labelEx($model,'batas_paling_atas',array("class"=>"col-sm-2 control-label")); ?>
		                <div class="col-sm-7">
							<?php echo $form->textField($model,'batas_paling_atas',array('size'=>60,'maxlength'=>150, "class"=>"form-control",'placeholder'=>'Masukkan Batas Paling Atas','required'=>'required')); ?>						
							<?php echo $form->error($model,'batas_paling_atas'); ?>
		                </div>
					</div>																					
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah Data' : 'Simpan',array("class"=>"btn btn-primary btn-flat")); ?>	
						<?php echo CHtml::button('Kembali', array('submit' => array('skala/admin/'), "class"=>"btn btn-success btn-flat")); ?>	
                    </div>
                  </div>																															            																																            		                   	
				</div>																														            		            					              	              
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->