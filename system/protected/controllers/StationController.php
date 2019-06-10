<?php
Yii::app()->theme = 'AdminLTE';
class StationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('insert','upload','inject','realtime','admin'),
				'users'=>array('*'),
			),				
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','insert','create','update','admin','delete','realtime','exportc','exporta','exportaa','exportco','exportch4','exportco2','exporth','exportv'),
				'users'=>array('@'),
			),
			array('deny', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('deny', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		//header("Refresh:10"); //refresh 10 detik
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionRealtime($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		header("Refresh:60"); //refresh 10 detik
		$this->render('realtime',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Station;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Station']))
		{
			$model->attributes=$_POST['Station'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Station']))
		{
			$model->attributes=$_POST['Station'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Station');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Station('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Station']))
			$model->attributes=$_GET['Station'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function actionInsert($st,$d,$t,$c,$a,$aa,$co,$ch4,$co2,$h,$v)
	{
		date_default_timezone_set('Asia/Jakarta');
		
		/*
		$connection=Yii::app()->db;
		$sql="SELECT count(id_station) FROM tbl_station where id_station='$st'";
		$jml_station = $connection->createCommand($sql)->queryScalar();		

		if ($jml_station<1){
			$model=new Station();
			$model->id_station=$st;
			$model->id_node = "n1";
			$model->nama_station = "Bejo";
			$model->save();
		}
		*/
	    $tgl = date('YmdHis');
	    $random = (rand()%50);
	    $random2 = (rand()%100);


	    //parsing suhu
		$model2=new Suhu();
		$model2->id_suhu= "C".$tgl."".$random2."".$random;
		$model2->id_station = $st;
		$model2->nilai = $c;
		$model2->waktu = $d." ".$t;
		$mdl_skala = Skala::model()->findByPK("c");
		$batas_paling_bawah_suhu = $mdl_skala->batas_paling_bawah;
		$batas_paling_atas_suhu = $mdl_skala->batas_paling_atas;
		if ($c<$batas_paling_bawah_suhu||$c>$batas_paling_atas_suhu){
			$model2->ket = "1";
		}else{
			$model2->ket = "0";
		}		
		$model2->save();

	    //parsing angin
		$model3=new Angin();
		$model3->id_angin= "A".$tgl."".$random2."".$random;
		$model3->id_station = $st;
		$model3->nilai = $a;
		$model3->waktu = $d." ".$t;
		$mdl_skala = Skala::model()->findByPK("a");
		$batas_paling_bawah_angin = $mdl_skala->batas_paling_bawah;
		$batas_paling_atas_angin = $mdl_skala->batas_paling_atas;
		if ($a<$batas_paling_bawah_angin||$a>$batas_paling_atas_angin){
			$model3->ket = "1";
		}else{
			$model3->ket = "0";
		}		
		$model3->save();

	    //parsing arahangin
		$model4=new Arahangin();
		$model4->id_arahangin= "AA".$tgl."".$random2."".$random;
		$model4->id_station = $st;
		$model4->nilai = $aa;
		$model4->waktu = $d." ".$t;
		$mdl_skala = Skala::model()->findByPK("aa");
		$batas_paling_bawah_aangin = $mdl_skala->batas_paling_bawah;
		$batas_paling_atas_aangin = $mdl_skala->batas_paling_atas;
		if ($aa<$batas_paling_bawah_aangin||$aa>$batas_paling_atas_aangin){
			$model4->ket = "1";
		}else{
			$model4->ket = "0";
		}		
		$model4->save();

	    //parsing CO
		$model5=new CO();
		$model5->id_co= "CO".$tgl."".$random2."".$random;
		$model5->id_station = $st;
		$model5->nilai = $co;
		$model5->waktu = $d." ".$t;
		$mdl_skala = Skala::model()->findByPK("co");
		$batas_paling_bawah_co = $mdl_skala->batas_paling_bawah;
		$batas_paling_atas_co = $mdl_skala->batas_paling_atas;
		if ($co<$batas_paling_bawah_co||$co>$batas_paling_atas_co){
			$model5->ket = "1";
		}else{
			$model5->ket = "0";
		}		
		$model5->save();

	    //parsing metan
		$model6=new Metan();
		$model6->id_metan= "CH4".$tgl."".$random2."".$random;
		$model6->id_station = $st;
		$model6->nilai = $ch4;
		$model6->waktu = $d." ".$t;
		$mdl_skala = Skala::model()->findByPK("ch4");
		$batas_paling_bawah_ch4 = $mdl_skala->batas_paling_bawah;
		$batas_paling_atas_ch4 = $mdl_skala->batas_paling_atas;
		if ($ch4<$batas_paling_bawah_ch4||$ch4>$batas_paling_atas_ch4){
			$model6->ket = "1";
		}else{
			$model6->ket = "0";
		}		
		$model6->save();


	    //parsing CO2
		$model7=new CO2();
		$model7->id_co2= "CO2".$tgl."".$random2."".$random;
		$model7->id_station = $st;
		$model7->nilai = $co2;
		$model7->waktu = $d." ".$t;
		$mdl_skala = Skala::model()->findByPK("co2");
		$batas_paling_bawah_co2 = $mdl_skala->batas_paling_bawah;
		$batas_paling_atas_co2 = $mdl_skala->batas_paling_atas;
		if ($co2<$batas_paling_bawah_co2||$co2>$batas_paling_atas_co2){
			$model7->ket = "1";
		}else{
			$model7->ket = "0";
		}		
		$model7->save();

	    //parsing Kelembaban
		$model8=new Kelembaban();
		$model8->id_kelembaban= "H".$tgl."".$random2."".$random;
		$model8->id_station = $st;
		$model8->nilai = $h;
		$model8->waktu = $d." ".$t;
		$mdl_skala = Skala::model()->findByPK("h");
		$batas_paling_bawah_h = $mdl_skala->batas_paling_bawah;
		$batas_paling_atas_h = $mdl_skala->batas_paling_atas;
		if ($h<$batas_paling_bawah_h||$h>$batas_paling_atas_h){
			$model8->ket = "1";
		}else{
			$model8->ket = "0";
		}		
		$model8->save();


	    //parsing tegangan
		$model9=new Tegangan();
		$model9->id_tegangan= "V".$tgl."".$random2."".$random;
		$model9->id_station = $st;
		$model9->nilai = $v;
		$model9->waktu = $d." ".$t;
		$mdl_skala = Skala::model()->findByPK("v");
		$batas_paling_bawah_v = $mdl_skala->batas_paling_bawah;
		$batas_paling_atas_v = $mdl_skala->batas_paling_atas;
		if ($v<$batas_paling_bawah_v||$v>$batas_paling_atas_v){
			$model9->ket = "1";
		}else{
			$model9->ket = "0";
		}		
		$model9->save();		

	}

	public function actionUpload($file)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('YmdHis');
		$model10=new File();
		$model10->id = $tgl;
		$model10->file = $file;
		$model10->save();
	}


	public function actionInject()
	{
		

		$connection=Yii::app()->db;
		$file = fopen("../lowcarbon-malang.id/admin/tpa/kirim.txt", "r");
		
		$model2=new Suhu();
		while (!feof($file)) {
			date_default_timezone_set('Asia/Jakarta');
		    $tgl = date('YmdHis');
		    $random = (rand()%10);
		    $random2 = (rand()%60);	

			$content = fgets($file);
			$carray = explode(",", $content);
			list($st,$d,$t,$c,$a,$aa,$co,$ch4,$co2,$h,$v) = $carray;

		    //parsing suhu
			$model2=new Suhu();
			$model2->id_suhu= "C".$tgl."".$random2."".$random;
			$model2->id_station = $st;
			$model2->nilai = $c;
			$model2->waktu = $d." ".$t;
			$mdl_skala = Skala::model()->findByPK("c");
			$batas_paling_bawah_suhu = $mdl_skala->batas_paling_bawah;
			$batas_paling_atas_suhu = $mdl_skala->batas_paling_atas;
			if ($c<$batas_paling_bawah_suhu||$c>$batas_paling_atas_suhu){
				$model2->ket = "1";
			}else{
				$model2->ket = "0";
			}		
			$model2->save();

		    //parsing angin
			$model3=new Angin();
			$model3->id_angin= "A".$tgl."".$random2."".$random;
			$model3->id_station = $st;
			$model3->nilai = $a;
			$model3->waktu = $d." ".$t;
			$mdl_skala = Skala::model()->findByPK("a");
			$batas_paling_bawah_angin = $mdl_skala->batas_paling_bawah;
			$batas_paling_atas_angin = $mdl_skala->batas_paling_atas;
			if ($a<$batas_paling_bawah_angin||$a>$batas_paling_atas_angin){
				$model3->ket = "1";
			}else{
				$model3->ket = "0";
			}		
			$model3->save();

		    //parsing arahangin
			$model4=new Arahangin();
			$model4->id_arahangin= "AA".$tgl."".$random2."".$random;
			$model4->id_station = $st;
			$model4->nilai = $aa;
			$model4->waktu = $d." ".$t;
			$mdl_skala = Skala::model()->findByPK("aa");
			$batas_paling_bawah_aangin = $mdl_skala->batas_paling_bawah;
			$batas_paling_atas_aangin = $mdl_skala->batas_paling_atas;
			if ($aa<$batas_paling_bawah_aangin||$aa>$batas_paling_atas_aangin){
				$model4->ket = "1";
			}else{
				$model4->ket = "0";
			}		
			$model4->save();

		    //parsing CO
			$model5=new CO();
			$model5->id_co= "CO".$tgl."".$random2."".$random;
			$model5->id_station = $st;
			$model5->nilai = $co;
			$model5->waktu = $d." ".$t;
			$mdl_skala = Skala::model()->findByPK("co");
			$batas_paling_bawah_co = $mdl_skala->batas_paling_bawah;
			$batas_paling_atas_co = $mdl_skala->batas_paling_atas;
			if ($co<$batas_paling_bawah_co||$co>$batas_paling_atas_co){
				$model5->ket = "1";
			}else{
				$model5->ket = "0";
			}		
			$model5->save();

		    //parsing metan
			$model6=new Metan();
			$model6->id_metan= "CH4".$tgl."".$random2."".$random;
			$model6->id_station = $st;
			$model6->nilai = $ch4;
			$model6->waktu = $d." ".$t;
			$mdl_skala = Skala::model()->findByPK("ch4");
			$batas_paling_bawah_ch4 = $mdl_skala->batas_paling_bawah;
			$batas_paling_atas_ch4 = $mdl_skala->batas_paling_atas;
			if ($ch4<$batas_paling_bawah_ch4||$ch4>$batas_paling_atas_ch4){
				$model6->ket = "1";
			}else{
				$model6->ket = "0";
			}		
			$model6->save();


		    //parsing CO2
			$model7=new CO2();
			$model7->id_co2= "CO2".$tgl."".$random2."".$random;
			$model7->id_station = $st;
			$model7->nilai = $co2;
			$model7->waktu = $d." ".$t;
			$mdl_skala = Skala::model()->findByPK("co2");
			$batas_paling_bawah_co2 = $mdl_skala->batas_paling_bawah;
			$batas_paling_atas_co2 = $mdl_skala->batas_paling_atas;
			if ($co2<$batas_paling_bawah_co2||$co2>$batas_paling_atas_co2){
				$model7->ket = "1";
			}else{
				$model7->ket = "0";
			}		
			$model7->save();

		    //parsing Kelembaban
			$model8=new Kelembaban();
			$model8->id_kelembaban= "H".$tgl."".$random2."".$random;
			$model8->id_station = $st;
			$model8->nilai = $h;
			$model8->waktu = $d." ".$t;
			$mdl_skala = Skala::model()->findByPK("h");
			$batas_paling_bawah_h = $mdl_skala->batas_paling_bawah;
			$batas_paling_atas_h = $mdl_skala->batas_paling_atas;
			if ($h<$batas_paling_bawah_h||$h>$batas_paling_atas_h){
				$model8->ket = "1";
			}else{
				$model8->ket = "0";
			}		
			$model8->save();


		    //parsing tegangan
			$model9=new Tegangan();
			$model9->id_tegangan= "V".$tgl."".$random2."".$random;
			$model9->id_station = $st;
			$model9->nilai = $v;
			$model9->waktu = $d." ".$t;
			$mdl_skala = Skala::model()->findByPK("v");
			$batas_paling_bawah_v = $mdl_skala->batas_paling_bawah;
			$batas_paling_atas_v = $mdl_skala->batas_paling_atas;
			if ($v<$batas_paling_bawah_v||$v>$batas_paling_atas_v){
				$model9->ket = "1";
			}else{
				$model9->ket = "0";
			}		
			$model9->save();		

		}
		fclose($file);
		@unlink($file);
        $fp = fopen("../lowcarbon-malang.id/admin/tpa/kirim.txt","wb");
        fclose($fp);		
		
	}


	public function actionExportc($id)
    {
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Logging Suhu.xls");
		$connection=Yii::app()->db;
        $sqlx="SELECT
				tbl_node.nama_node,
				tbl_node.alamat,
				tbl_node.no_alamat,
				tbl_node.kota,
				tbl_node.kecamatan,
				tbl_node.provinsi,
				tbl_station.nama_station,
				tbl_station.lng,
				tbl_station.lat
				FROM
				tbl_station
				INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
				INNER JOIN tbl_suhu ON tbl_station.id_station = tbl_suhu.id_station
				WHERE
				tbl_station.id_station = '$id'
				ORDER BY
				tbl_suhu.waktu ASC";
        $menu=$connection->createCommand($sqlx)->query();
        $menu->bindColumn(1,$nama_node);
        $menu->bindColumn(2,$alamat);
        $menu->bindColumn(3,$no_alamat);
        $menu->bindColumn(4,$kota);
        $menu->bindColumn(5,$kecamatan);
        $menu->bindColumn(6,$provinsi);
        $menu->bindColumn(7,$nama_station);
        $menu->bindColumn(8,$lng);
        $menu->bindColumn(9,$lat);
        $menu->read();
		?>
        	<h1 align="center">Rekap Log Suhu Station : <?php echo $nama_station?></h1>
            <br>
            <br>
            Nama Node : <?php echo $nama_node?><br>
            Nama Station : <?php echo $nama_station?><br>
            <br>	
            <table border="1">
            	<tr>
            		<td align="center"><b>No</b></td>
            		<td align="center"><b>Waktu</b></td>
            		<td align="center"><b>Nilai</b></td>
            		<td align="center"><b>Keterangan</b></td>
            	</tr>
			<?php
					$connection3=Yii::app()->db;
					$sql3="SELECT
						tbl_suhu.nilai,
						tbl_suhu.waktu,
						tbl_suhu.ket
						FROM
						tbl_station
						INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
						INNER JOIN tbl_suhu ON tbl_station.id_station = tbl_suhu.id_station
						WHERE
						tbl_station.id_station = '$id'
						ORDER BY
						tbl_suhu.waktu ASC";
					$menu3=$connection3->createCommand($sql3)->query();
			        $menu3->bindColumn(1,$nilai);
			        $menu3->bindColumn(2,$waktu);
			        $menu3->bindColumn(3,$ket);
				    $no = 0;
				    while($menu3->read()!==false){
						$no++;
				        if ($ket == '1'){
				        	$ket = "E";
				        }else{
				        	$ket = "";
				        }						
						echo '
	                     	<tr>
	                        	<td align="center">'.$no.'</td>
	                            <td align="left">'.$waktu.'</td>
	                            <td align="center">'.$nilai.'</td>
	                            <td align="center">'.$ket.'</td>                      
	                        </tr>
	                    ';

				    }
			?>	                	
            </table>
             	
    <?php
	}

	public function actionExporta($id)
    {
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Logging Kecepatan Angin.xls");
		$connection=Yii::app()->db;
        $sqlx="SELECT
				tbl_node.nama_node,
				tbl_node.alamat,
				tbl_node.no_alamat,
				tbl_node.kota,
				tbl_node.kecamatan,
				tbl_node.provinsi,
				tbl_station.nama_station,
				tbl_station.lng,
				tbl_station.lat
				FROM
				tbl_station
				INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
				INNER JOIN tbl_angin ON tbl_station.id_station = tbl_angin.id_station
				WHERE
				tbl_station.id_station = '$id'
				ORDER BY
				tbl_angin.waktu ASC";
        $menu=$connection->createCommand($sqlx)->query();
        $menu->bindColumn(1,$nama_node);
        $menu->bindColumn(2,$alamat);
        $menu->bindColumn(3,$no_alamat);
        $menu->bindColumn(4,$kota);
        $menu->bindColumn(5,$kecamatan);
        $menu->bindColumn(6,$provinsi);
        $menu->bindColumn(7,$nama_station);
        $menu->bindColumn(8,$lng);
        $menu->bindColumn(9,$lat);
        $menu->read();
		?>
        	<h1 align="center">Rekap Log Kecepatan Angin Station : <?php echo $nama_station?></h1>
            <br>
            <br>
            Nama Node : <?php echo $nama_node?><br>
            Nama Station : <?php echo $nama_station?><br>
            <br>	
            <table border="1">
            	<tr>
            		<td align="center"><b>No</b></td>
            		<td align="center"><b>Waktu</b></td>
            		<td align="center"><b>Nilai</b></td>
            		<td align="center"><b>Keterangan</b></td>
            	</tr>
			<?php
					$connection3=Yii::app()->db;
					$sql3="SELECT
						tbl_angin.nilai,
						tbl_angin.waktu,
						tbl_angin.ket
						FROM
						tbl_station
						INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
						INNER JOIN tbl_angin ON tbl_station.id_station = tbl_angin.id_station
						WHERE
						tbl_station.id_station = '$id'
						ORDER BY
						tbl_angin.waktu ASC";
					$menu3=$connection3->createCommand($sql3)->query();
			        $menu3->bindColumn(1,$nilai);
			        $menu3->bindColumn(2,$waktu);
			        $menu3->bindColumn(3,$ket);
				    $no = 0;
				    while($menu3->read()!==false){
						$no++;
				        if ($ket == '1'){
				        	$ket = "E";
				        }else{
				        	$ket = "";
				        }						
						echo '
	                     	<tr>
	                        	<td align="center">'.$no.'</td>
	                            <td align="left">'.$waktu.'</td>
	                            <td align="center">'.$nilai.'</td>
	                            <td align="center">'.$ket.'</td>                      
	                        </tr>
	                    ';

				    }
			?>	                	
            </table>
             	
    <?php
	}	


	public function actionExportaa($id)
    {
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Logging Arah Angin.xls");
		$connection=Yii::app()->db;
        $sqlx="SELECT
				tbl_node.nama_node,
				tbl_node.alamat,
				tbl_node.no_alamat,
				tbl_node.kota,
				tbl_node.kecamatan,
				tbl_node.provinsi,
				tbl_station.nama_station,
				tbl_station.lng,
				tbl_station.lat
				FROM
				tbl_station
				INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
				INNER JOIN tbl_arahangin ON tbl_station.id_station = tbl_arahangin.id_station
				WHERE
				tbl_station.id_station = '$id'
				ORDER BY
				tbl_arahangin.waktu ASC";
        $menu=$connection->createCommand($sqlx)->query();
        $menu->bindColumn(1,$nama_node);
        $menu->bindColumn(2,$alamat);
        $menu->bindColumn(3,$no_alamat);
        $menu->bindColumn(4,$kota);
        $menu->bindColumn(5,$kecamatan);
        $menu->bindColumn(6,$provinsi);
        $menu->bindColumn(7,$nama_station);
        $menu->bindColumn(8,$lng);
        $menu->bindColumn(9,$lat);
        $menu->read();
		?>
        	<h1 align="center">Rekap Log Arah Angin Station : <?php echo $nama_station?></h1>
            <br>
            <br>
            Nama Node : <?php echo $nama_node?><br>
            Nama Station : <?php echo $nama_station?><br>
            <br>	
            <table border="1">
            	<tr>
            		<td align="center"><b>No</b></td>
            		<td align="center"><b>Waktu</b></td>
            		<td align="center"><b>Nilai</b></td>
            		<td align="center"><b>Keterangan</b></td>
            	</tr>
			<?php
					$connection3=Yii::app()->db;
					$sql3="SELECT
						tbl_arahangin.nilai,
						tbl_arahangin.waktu,
						tbl_arahangin.ket
						FROM
						tbl_station
						INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
						INNER JOIN tbl_arahangin ON tbl_station.id_station = tbl_arahangin.id_station
						WHERE
						tbl_station.id_station = '$id'
						ORDER BY
						tbl_arahangin.waktu ASC";
					$menu3=$connection3->createCommand($sql3)->query();
			        $menu3->bindColumn(1,$nilai);
			        $menu3->bindColumn(2,$waktu);
			        $menu3->bindColumn(3,$ket);
				    $no = 0;
				    while($menu3->read()!==false){
						$no++;
				        if ($ket == '1'){
				        	$ket = "E";
				        }else{
				        	$ket = "";
				        }						
						echo '
	                     	<tr>
	                        	<td align="center">'.$no.'</td>
	                            <td align="left">'.$waktu.'</td>
	                            <td align="center">'.$nilai.'</td>
	                            <td align="center">'.$ket.'</td>                      
	                        </tr>
	                    ';

				    }
			?>	                	
            </table>
             	
    <?php
	}	

	public function actionExportco($id)
    {
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Logging Karbonmonoksida.xls");
		$connection=Yii::app()->db;
        $sqlx="SELECT
				tbl_node.nama_node,
				tbl_node.alamat,
				tbl_node.no_alamat,
				tbl_node.kota,
				tbl_node.kecamatan,
				tbl_node.provinsi,
				tbl_station.nama_station,
				tbl_station.lng,
				tbl_station.lat
				FROM
				tbl_station
				INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
				INNER JOIN tbl_co ON tbl_station.id_station = tbl_co.id_station
				WHERE
				tbl_station.id_station = '$id'
				ORDER BY
				tbl_co.waktu ASC";
        $menu=$connection->createCommand($sqlx)->query();
        $menu->bindColumn(1,$nama_node);
        $menu->bindColumn(2,$alamat);
        $menu->bindColumn(3,$no_alamat);
        $menu->bindColumn(4,$kota);
        $menu->bindColumn(5,$kecamatan);
        $menu->bindColumn(6,$provinsi);
        $menu->bindColumn(7,$nama_station);
        $menu->bindColumn(8,$lng);
        $menu->bindColumn(9,$lat);
        $menu->read();
		?>
        	<h1 align="center">Rekap Log Karbonmonoksida Station : <?php echo $nama_station?></h1>
            <br>
            <br>
            Nama Node : <?php echo $nama_node?><br>
            Nama Station : <?php echo $nama_station?><br>
            <br>	
            <table border="1">
            	<tr>
            		<td align="center"><b>No</b></td>
            		<td align="center"><b>Waktu</b></td>
            		<td align="center"><b>Nilai</b></td>
            		<td align="center"><b>Keterangan</b></td>
            	</tr>
			<?php
					$connection3=Yii::app()->db;
					$sql3="SELECT
						tbl_co.nilai,
						tbl_co.waktu,
						tbl_co.ket
						FROM
						tbl_station
						INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
						INNER JOIN tbl_co ON tbl_station.id_station = tbl_co.id_station
						WHERE
						tbl_station.id_station = '$id'
						ORDER BY
						tbl_co.waktu ASC";
					$menu3=$connection3->createCommand($sql3)->query();
			        $menu3->bindColumn(1,$nilai);
			        $menu3->bindColumn(2,$waktu);
			        $menu3->bindColumn(3,$ket);
				    $no = 0;
				    while($menu3->read()!==false){
						$no++;
				        if ($ket == '1'){
				        	$ket = "E";
				        }else{
				        	$ket = "";
				        }						
						echo '
	                     	<tr>
	                        	<td align="center">'.$no.'</td>
	                            <td align="left">'.$waktu.'</td>
	                            <td align="center">'.$nilai.'</td>
	                            <td align="center">'.$ket.'</td>                      
	                        </tr>
	                    ';

				    }
			?>	                	
            </table>
             	
    <?php
	}	

	public function actionExportch4($id)
    {
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Logging Metan.xls");
		$connection=Yii::app()->db;
        $sqlx="SELECT
				tbl_node.nama_node,
				tbl_node.alamat,
				tbl_node.no_alamat,
				tbl_node.kota,
				tbl_node.kecamatan,
				tbl_node.provinsi,
				tbl_station.nama_station,
				tbl_station.lng,
				tbl_station.lat
				FROM
				tbl_station
				INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
				INNER JOIN tbl_metan ON tbl_station.id_station = tbl_metan.id_station
				WHERE
				tbl_station.id_station = '$id'
				ORDER BY
				tbl_metan.waktu ASC";
        $menu=$connection->createCommand($sqlx)->query();
        $menu->bindColumn(1,$nama_node);
        $menu->bindColumn(2,$alamat);
        $menu->bindColumn(3,$no_alamat);
        $menu->bindColumn(4,$kota);
        $menu->bindColumn(5,$kecamatan);
        $menu->bindColumn(6,$provinsi);
        $menu->bindColumn(7,$nama_station);
        $menu->bindColumn(8,$lng);
        $menu->bindColumn(9,$lat);
        $menu->read();
		?>
        	<h1 align="center">Rekap Log Metan Station : <?php echo $nama_station?></h1>
            <br>
            <br>
            Nama Node : <?php echo $nama_node?><br>
            Nama Station : <?php echo $nama_station?><br>
            <br>	
            <table border="1">
            	<tr>
            		<td align="center"><b>No</b></td>
            		<td align="center"><b>Waktu</b></td>
            		<td align="center"><b>Nilai</b></td>
            		<td align="center"><b>Keterangan</b></td>
            	</tr>
			<?php
					$connection3=Yii::app()->db;
					$sql3="SELECT
						tbl_metan.nilai,
						tbl_metan.waktu,
						tbl_metan.ket
						FROM
						tbl_station
						INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
						INNER JOIN tbl_metan ON tbl_station.id_station = tbl_metan.id_station
						WHERE
						tbl_station.id_station = '$id'
						ORDER BY
						tbl_metan.waktu ASC";
					$menu3=$connection3->createCommand($sql3)->query();
			        $menu3->bindColumn(1,$nilai);
			        $menu3->bindColumn(2,$waktu);
			        $menu3->bindColumn(3,$ket);
				    $no = 0;
				    while($menu3->read()!==false){
						$no++;
				        if ($ket == '1'){
				        	$ket = "E";
				        }else{
				        	$ket = "";
				        }						
						echo '
	                     	<tr>
	                        	<td align="center">'.$no.'</td>
	                            <td align="left">'.$waktu.'</td>
	                            <td align="center">'.$nilai.'</td>
	                            <td align="center">'.$ket.'</td>                      
	                        </tr>
	                    ';

				    }
			?>	                	
            </table>
             	
    <?php
	}	


	public function actionExportco2($id)
    {
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Logging Karbondioksida.xls");
		$connection=Yii::app()->db;
        $sqlx="SELECT
				tbl_node.nama_node,
				tbl_node.alamat,
				tbl_node.no_alamat,
				tbl_node.kota,
				tbl_node.kecamatan,
				tbl_node.provinsi,
				tbl_station.nama_station,
				tbl_station.lng,
				tbl_station.lat
				FROM
				tbl_station
				INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
				INNER JOIN tbl_co2 ON tbl_station.id_station = tbl_co2.id_station
				WHERE
				tbl_station.id_station = '$id'
				ORDER BY
				tbl_co2.waktu ASC";
        $menu=$connection->createCommand($sqlx)->query();
        $menu->bindColumn(1,$nama_node);
        $menu->bindColumn(2,$alamat);
        $menu->bindColumn(3,$no_alamat);
        $menu->bindColumn(4,$kota);
        $menu->bindColumn(5,$kecamatan);
        $menu->bindColumn(6,$provinsi);
        $menu->bindColumn(7,$nama_station);
        $menu->bindColumn(8,$lng);
        $menu->bindColumn(9,$lat);
        $menu->read();
		?>
        	<h1 align="center">Rekap Log Karbondioksida Station : <?php echo $nama_station?></h1>
            <br>
            <br>
            Nama Node : <?php echo $nama_node?><br>
            Nama Station : <?php echo $nama_station?><br>
            <br>	
            <table border="1">
            	<tr>
            		<td align="center"><b>No</b></td>
            		<td align="center"><b>Waktu</b></td>
            		<td align="center"><b>Nilai</b></td>
            		<td align="center"><b>Keterangan</b></td>
            	</tr>
			<?php
					$connection3=Yii::app()->db;
					$sql3="SELECT
						tbl_co2.nilai,
						tbl_co2.waktu,
						tbl_co2.ket
						FROM
						tbl_station
						INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
						INNER JOIN tbl_co2 ON tbl_station.id_station = tbl_co2.id_station
						WHERE
						tbl_station.id_station = '$id'
						ORDER BY
						tbl_co2.waktu ASC";
					$menu3=$connection3->createCommand($sql3)->query();
			        $menu3->bindColumn(1,$nilai);
			        $menu3->bindColumn(2,$waktu);
			        $menu3->bindColumn(3,$ket);
				    $no = 0;
				    while($menu3->read()!==false){
						$no++;
				        if ($ket == '1'){
				        	$ket = "E";
				        }else{
				        	$ket = "";
				        }						
						echo '
	                     	<tr>
	                        	<td align="center">'.$no.'</td>
	                            <td align="left">'.$waktu.'</td>
	                            <td align="center">'.$nilai.'</td>
	                            <td align="center">'.$ket.'</td>                      
	                        </tr>
	                    ';

				    }
			?>	                	
            </table>
             	
    <?php
	}	


	public function actionExporth($id)
    {
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Logging Kelembaban.xls");
		$connection=Yii::app()->db;
        $sqlx="SELECT
				tbl_node.nama_node,
				tbl_node.alamat,
				tbl_node.no_alamat,
				tbl_node.kota,
				tbl_node.kecamatan,
				tbl_node.provinsi,
				tbl_station.nama_station,
				tbl_station.lng,
				tbl_station.lat
				FROM
				tbl_station
				INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
				INNER JOIN tbl_kelembaban ON tbl_station.id_station = tbl_kelembaban.id_station
				WHERE
				tbl_station.id_station = '$id'
				ORDER BY
				tbl_kelembaban.waktu ASC";
        $menu=$connection->createCommand($sqlx)->query();
        $menu->bindColumn(1,$nama_node);
        $menu->bindColumn(2,$alamat);
        $menu->bindColumn(3,$no_alamat);
        $menu->bindColumn(4,$kota);
        $menu->bindColumn(5,$kecamatan);
        $menu->bindColumn(6,$provinsi);
        $menu->bindColumn(7,$nama_station);
        $menu->bindColumn(8,$lng);
        $menu->bindColumn(9,$lat);
        $menu->read();
		?>
        	<h1 align="center">Rekap Log Kelembaban Station : <?php echo $nama_station?></h1>
            <br>
            <br>
            Nama Node : <?php echo $nama_node?><br>
            Nama Station : <?php echo $nama_station?><br>
            <br>	
            <table border="1">
            	<tr>
            		<td align="center"><b>No</b></td>
            		<td align="center"><b>Waktu</b></td>
            		<td align="center"><b>Nilai</b></td>
            		<td align="center"><b>Keterangan</b></td>
            	</tr>
			<?php
					$connection3=Yii::app()->db;
					$sql3="SELECT
						tbl_kelembaban.nilai,
						tbl_kelembaban.waktu,
						tbl_kelembaban.ket
						FROM
						tbl_station
						INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
						INNER JOIN tbl_kelembaban ON tbl_station.id_station = tbl_kelembaban.id_station
						WHERE
						tbl_station.id_station = '$id'
						ORDER BY
						tbl_kelembaban.waktu ASC";
					$menu3=$connection3->createCommand($sql3)->query();
			        $menu3->bindColumn(1,$nilai);
			        $menu3->bindColumn(2,$waktu);
			        $menu3->bindColumn(3,$ket);
				    $no = 0;
				    while($menu3->read()!==false){
						$no++;
				        if ($ket == '1'){
				        	$ket = "E";
				        }else{
				        	$ket = "";
				        }						
						echo '
	                     	<tr>
	                        	<td align="center">'.$no.'</td>
	                            <td align="left">'.$waktu.'</td>
	                            <td align="center">'.$nilai.'</td>
	                            <td align="center">'.$ket.'</td>                      
	                        </tr>
	                    ';

				    }
			?>	                	
            </table>
             	
    <?php
	}	


	public function actionExportv($id)
    {
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Logging Tegangan.xls");
		$connection=Yii::app()->db;
        $sqlx="SELECT
				tbl_node.nama_node,
				tbl_node.alamat,
				tbl_node.no_alamat,
				tbl_node.kota,
				tbl_node.kecamatan,
				tbl_node.provinsi,
				tbl_station.nama_station,
				tbl_station.lng,
				tbl_station.lat
				FROM
				tbl_station
				INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
				INNER JOIN tbl_tegangan ON tbl_station.id_station = tbl_tegangan.id_station
				WHERE
				tbl_station.id_station = '$id'
				ORDER BY
				tbl_tegangan.waktu ASC";
        $menu=$connection->createCommand($sqlx)->query();
        $menu->bindColumn(1,$nama_node);
        $menu->bindColumn(2,$alamat);
        $menu->bindColumn(3,$no_alamat);
        $menu->bindColumn(4,$kota);
        $menu->bindColumn(5,$kecamatan);
        $menu->bindColumn(6,$provinsi);
        $menu->bindColumn(7,$nama_station);
        $menu->bindColumn(8,$lng);
        $menu->bindColumn(9,$lat);
        $menu->read();
		?>
        	<h1 align="center">Rekap Log Tegangan Station : <?php echo $nama_station?></h1>
            <br>
            <br>
            Nama Node : <?php echo $nama_node?><br>
            Nama Station : <?php echo $nama_station?><br>
            <br>	
            <table border="1">
            	<tr>
            		<td align="center"><b>No</b></td>
            		<td align="center"><b>Waktu</b></td>
            		<td align="center"><b>Nilai</b></td>
            		<td align="center"><b>Keterangan</b></td>
            	</tr>
			<?php
					$connection3=Yii::app()->db;
					$sql3="SELECT
						tbl_tegangan.nilai,
						tbl_tegangan.waktu,
						tbl_tegangan.ket
						FROM
						tbl_station
						INNER JOIN tbl_node ON tbl_node.id_node = tbl_station.id_node
						INNER JOIN tbl_tegangan ON tbl_station.id_station = tbl_tegangan.id_station
						WHERE
						tbl_station.id_station = '$id'
						ORDER BY
						tbl_tegangan.waktu ASC";
					$menu3=$connection3->createCommand($sql3)->query();
			        $menu3->bindColumn(1,$nilai);
			        $menu3->bindColumn(2,$waktu);
			        $menu3->bindColumn(3,$ket);
				    $no = 0;
				    while($menu3->read()!==false){
						$no++;
				        if ($ket == '1'){
				        	$ket = "E";
				        }else{
				        	$ket = "";
				        }						
						echo '
	                     	<tr>
	                        	<td align="center">'.$no.'</td>
	                            <td align="left">'.$waktu.'</td>
	                            <td align="center">'.$nilai.'</td>
	                            <td align="center">'.$ket.'</td>                      
	                        </tr>
	                    ';

				    }
			?>	                	
            </table>
             	
    <?php
	}	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Station the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Station::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Station $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='station-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
