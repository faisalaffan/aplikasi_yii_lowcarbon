<?php
$baseUrl = Yii::app()->theme->baseUrl; 
?>

 <div class="login-logo">
    <a href="#">Monitoring Sensor<br><b>Malang Raya</b></a>
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
        <!--<input name="username" type="text" class="form-control" placeholder="username">-->
        <?php echo $form->textField($model,'username', array('class'=>'form-control', 'placeholder'=>'Masukkan Username Anda','required'=>'required')); ?>
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
        <div class="col-xs-8">
          <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>-->
          <a href="<?php echo Yii::app()->baseUrl; ?>/user/create/" class="btn btn-info btn-block btn-flat">Daftar Member</a>
        </div>             
        <!-- /.col -->
      </div>
    </form>
        
 <?php $this->endWidget(); ?>
    
    </div><!-- form --> 
<script>
$(function() 
  { 
    window.onload = getLocation;
    var geo = navigator.geolocation; 
    function getLocation() { if (geo) { geo.getCurrentPosition(displayLocation); } else { alert("Maaf, Lokasi Tidak Dapat Dideteksi"); } } function displayLocation(position) { var lat = position.coords.latitude; 
      var lang = position.coords.longitude; 
     // document.getElementById('txtlat').value = lat; 
     // document.getElementById('txtlang').value = lang;
      window.location.href = "superzone/lat/" + lat + "/long/" + lang; 
    }

  });
</script>
