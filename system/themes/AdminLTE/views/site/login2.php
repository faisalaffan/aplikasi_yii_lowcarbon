<?php
$baseUrl = Yii::app()->theme->baseUrl; 
?>

 <div class="login-logo">
    <a href="#">Sistem Informasi <br><b>Ikatan Alumni UM</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php if(Yii::app()->user->hasFlash('error')): ?>
    <div class="flash-error">
      <div class="callout callout-danger">
          <p><?php echo Yii::app()->user->getFlash('error'); ?></p>
        </div>
    </div>
    <?php endif; ?>

    <?php if (Yii::app()->user->hasFlash('notice')): ?>
    <div class="flash-notice">
      <div class="callout callout-warning">
          <p><?php echo Yii::app()->user->getFlash('notice'); ?></p>
        </div>
    </div>
    <?php endif; ?>

    <?php if (Yii::app()->user->hasFlash('success')): ?>
      <div class="callout callout-success">
          <p><?php echo Yii::app()->user->getFlash('success'); ?></p>
        </div>
    <?php endif; ?>      
 <p class="login-box-msg">Silahkan login terlebih dahulu</p>
 <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
   
    
      <div class="form-group has-feedback">
        <!--<input name="username" type="text" class="form-control" placeholder="Email">-->
        <?php echo $form->textField($model,'email', array('class'=>'form-control', 'placeholder'=>'Masukkan Email Anda','required'=>'required')); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php echo $form->error($model,'username'); ?>
      </div>
      <div class="form-group has-feedback">
        <!--<input name="password" type="password" class="form-control" placeholder="Password">-->
        <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Masukkan Password Anda','required'=>'required')); ?>
        <?php echo $form->error($model,'password'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!--
        <div class="col-xs-8">
          <a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=user/register" class="text-center">Daftar sebagai Member ?</a>
         
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
          
        </div>
        -->
        <!-- /.col -->
        <div class="col-xs-4">
          <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>-->
          <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-primary btn-block btn-flat')); ?>
        </div>
        <div class="col-xs-8" align="right">
          <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>-->
           <a href="<?php echo Yii::app()->baseUrl; ?>/site/forgot" class="btn btn-info btn-block btn-flat">Lupa Password</a>
        </div>        
        <!-- /.col -->
      </div>
    </form>
        
 <?php $this->endWidget(); ?>
    
    </div><!-- form --> 
