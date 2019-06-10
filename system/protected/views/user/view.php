<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

?>

<h3>Data Diri User <?php echo $model->nama_user?></h3>
      <div class="row">
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#biodata-diri" data-toggle="tab">Biodata Diri</a></li>
              <li><a href="#riwayat-kerja" data-toggle="tab">Koordinat Tempat Tinggal</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="biodata-diri">           
					<div class="box box-solid box-primary">
					  <div class="box-header with-border">
					    <h3 class="box-title">Biodata Lengkap</h3>
					  </div>
					  <!-- /.box-header -->
					  <div class="box-body">
		                <div class="col-md-12 col-lg-12" align="left">
		                  <table class="table table-user-information">
		                    <tbody>
		                      <tr>
		                        <td width="23%">Nama Lengkap</td>
		                        <td width="1%">:</td>
		                        <td width="76%"><?php echo $model->nama_user; ?></td>
		                      </tr>  
		                      <tr>
		                        <td width="23%">Username</td>
		                        <td width="1%">:</td>
		                        <td width="76%"><?php echo $model->username; ?></td>
		                      </tr>		                     
		                      <tr>
		                        <td width="23%">Jenis Kelamin</td>
		                        <td width="1%">:</td>
		                        <td width="76%"><?php echo User::model()->getJK($model->jenis_kelamin); ?></td>
		                      </tr>		                       
		                      <tr>
		                        <td width="23%">No. HP Suami</td>
		                        <td width="1%">:</td>
		                        <td width="76%"><?php echo $model->hp; ?></td>                        
		                      </tr> 		                                                
		                      <tr>
		                        <td width="23%">Alamat</td>
		                        <td width="1%">:</td>
		                        <td width="76%"><?php echo $model->alamat; ?> No. <?php echo $model->no_alamat; ?> RT : <?php echo $model->rt; ?> RW : <?php echo $model->rw; ?>, Kecamatan <?php echo $model->kecamatan; ?>, <?php echo $model->kota ?>, Provinsi <?php echo $model->provinsi; ?></td>
		                      </tr>                                                              
		                    </tbody>
		                  </table>
		                </div> 
					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer">
					  </div>
					  <!-- box-footer -->
					</div>
					<!-- /.box -->
					<div class="box box-solid box-primary">
					  <div class="box-header with-border">
					    <h3 class="box-title">Akun Sosial Media</h3>
					  </div>
					  <!-- /.box-header -->
					  <div class="box-body">
		                <div class="col-md-12 col-lg-12" align="left">
		                  <table class="table table-user-information">
		                    <tbody>
		                      <tr>
		                        <td width="23%">Akun Facebook</td>
		                        <td width="1%">:</td>
		                        <td width="76%"> <?php echo $model->akun_fb; ?></td>
		                      </tr> 
		                      <tr>
		                        <td width="23%">Akun Instagram</td>
		                        <td width="1%">:</td>
		                        <td width="76%"> <?php echo $model->akun_ig; ?></td>
		                      </tr> 		                      		                       		                       		                       		                       		                      		                                                                                                                                                                                                                         
		                    </tbody>
		                  </table>
		                </div> 
					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer">
					  </div>
					  <!-- box-footer -->
					</div>
					<!-- /.box -->

					<a href="<?php echo Yii::app()->request->baseUrl; ?>/user/update/id/<?php echo $model->id?>" class="btn btn-success">Perbarui Data Diri</a>
						<?php
						if (!Yii::app()->user->isGuest){ ?>
							<a href="<?php echo Yii::app()->request->baseUrl; ?>/user/admin" class="btn btn-info">Kembali</a>
						<?php
						}
						?>					
					
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="riwayat-kerja">
                <!-- The riwayat-kerja -->
					<div class="box box-solid box-primary">
					  <div class="box-header with-border">
					    <h3 class="box-title">Titik Koordinat User</h3>
					  </div>
					  <!-- /.box-header -->
					  <div class="box-body">
		                <div class="col-md-12 col-lg-12" align="left">
		                  <table class="table table-user-information">
		                    <tbody>
		                      <tr>
		                        <td width="23%">Longitude</td>
		                        <td width="1%">:</td>
		                        <td width="76%"><?php echo $model->lng; ?></td>
		                      </tr>  
		                      <tr>
		                        <td width="23%">Latitude</td>
		                        <td width="1%">:</td>
		                        <td width="76%"><?php echo $model->lat; ?></td>
		                      </tr>		                                                                                  
		                    </tbody>
		                  </table>
		                </div> 
					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer">
					  </div>
					  <!-- box-footer -->
					</div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->


        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/foto/<?php echo Yii::app()->user->getFoto($model->id); ?>" alt="Foto">

              <h3 class="profile-username text-center"><?php echo $model->nama_user; ?></h3>

              <p class="text-muted text-center">Member <?php echo $model->kota; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Level User</b> <b class="pull-right"><?php echo User::model()->getLevel($model->level); ?></b>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

