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


<?php

$id_station = $model->id_station;

$connection=Yii::app()->db;
					//SQL load data suhu
                    $sql3="SELECT nilai FROM (SELECT * FROM tbl_suhu where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu3=$connection->createCommand($sql3)->query();
                    $menu3->bindColumn(1,$nilai_suhu);

                    $sql4="SELECT waktu FROM (SELECT * FROM tbl_suhu where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu4=$connection->createCommand($sql4)->query();
                    $menu4->bindColumn(1,$waktu_suhu);


					//SQL load data CO
                    $sql3="SELECT nilai FROM (SELECT * FROM tbl_co where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu5=$connection->createCommand($sql3)->query();
                    $menu5->bindColumn(1,$nilai_co);

                    $sql4="SELECT waktu FROM (SELECT * FROM tbl_co where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu6=$connection->createCommand($sql4)->query();
                    $menu6->bindColumn(1,$waktu_co);            


					//SQL load data Kelembaban
                    $sql3="SELECT nilai FROM (SELECT * FROM tbl_kelembaban where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu7=$connection->createCommand($sql3)->query();
                    $menu7->bindColumn(1,$nilai_h);

                    $sql4="SELECT waktu FROM (SELECT * FROM tbl_kelembaban where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu8=$connection->createCommand($sql4)->query();
                    $menu8->bindColumn(1,$waktu_h);    


					//SQL load data metan
                    $sql3="SELECT nilai FROM (SELECT * FROM tbl_metan where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu9=$connection->createCommand($sql3)->query();
                    $menu9->bindColumn(1,$nilai_ch4);

                    $sql4="SELECT waktu FROM (SELECT * FROM tbl_metan where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu10=$connection->createCommand($sql4)->query();
                    $menu10->bindColumn(1,$waktu_ch4); 


					//SQL load data tegangan
                    $sql3="SELECT nilai FROM (SELECT * FROM tbl_tegangan where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu11=$connection->createCommand($sql3)->query();
                    $menu11->bindColumn(1,$nilai_v);

                    $sql4="SELECT waktu FROM (SELECT * FROM tbl_tegangan where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu12=$connection->createCommand($sql4)->query();
                    $menu12->bindColumn(1,$waktu_v); 


					//SQL load data karbondioksida
                    $sql3="SELECT nilai FROM (SELECT * FROM tbl_co2 where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu13=$connection->createCommand($sql3)->query();
                    $menu13->bindColumn(1,$nilai_co2);

                    $sql4="SELECT waktu FROM (SELECT * FROM tbl_co2 where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu14=$connection->createCommand($sql4)->query();
                    $menu14->bindColumn(1,$waktu_co2);      

					//SQL load data kecepatan angin
                    $sql3="SELECT nilai FROM (SELECT * FROM tbl_angin where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu15=$connection->createCommand($sql3)->query();
                    $menu15->bindColumn(1,$nilai_a);

                    $sql4="SELECT waktu FROM (SELECT * FROM tbl_angin where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu16=$connection->createCommand($sql4)->query();
                    $menu16->bindColumn(1,$waktu_a);     

					//SQL load data arah angin
                    $sql3="SELECT nilai FROM (SELECT * FROM tbl_arahangin where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu17=$connection->createCommand($sql3)->query();
                    $menu17->bindColumn(1,$nilai_aa);

                    $sql4="SELECT waktu FROM (SELECT * FROM tbl_arahangin where id_station='$id_station' ORDER BY waktu DESC LIMIT 10) sub ORDER BY waktu ASC";
                    $menu18=$connection->createCommand($sql4)->query();
                    $menu18->bindColumn(1,$waktu_aa);                                                    


?>


<h3>Detail Data Station <?php echo $model->nama_station?> <?php echo CHtml::button('Kembali Ke Daftar Station', array('submit' => array('admin'),"class"=>"btn btn-success")); ?></h3>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#biodata-diri" data-toggle="tab">Realtime Chart</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="biodata-diri">
                <?php
                    $connection=Yii::app()->db;
                    $sqlx="SELECT
                        (select tbl_suhu.ket from tbl_suhu where id_station='$id_station' order by waktu desc limit 1) AS suhu,
                        (select tbl_co.ket from tbl_co where id_station='$id_station' order by waktu desc limit 1) AS co,
                        (select tbl_kelembaban.ket from tbl_kelembaban where id_station='$id_station' order by waktu desc limit 1) AS h,
                        (select tbl_metan.ket from tbl_metan where id_station='$id_station' order by waktu desc limit 1) AS ch4,
                        (select tbl_tegangan.ket from tbl_tegangan where id_station='$id_station' order by waktu desc limit 1) AS v,
                        (select tbl_co2.ket from tbl_co2 where id_station='$id_station' order by waktu desc limit 1) AS co2,
                        (select tbl_angin.ket from tbl_angin where id_station='$id_station' order by waktu desc limit 1) AS a,
                        (select tbl_arahangin.ket from tbl_arahangin where id_station='$id_station' order by waktu desc limit 1) AS aa
                        FROM
                        tbl_station
                        where tbl_station.id_station = '$id_station'";
                    $menu=$connection->createCommand($sqlx)->query();
                    $menu->bindColumn(1,$suhu);
                    $menu->bindColumn(2,$co);
                    $menu->bindColumn(3,$h);
                    $menu->bindColumn(4,$ch4);
                    $menu->bindColumn(5,$v);
                    $menu->bindColumn(6,$co2);
                    $menu->bindColumn(7,$a);
                    $menu->bindColumn(8,$aa);
                    $menu->read();                    
                    if ($suhu=="1"){ ?>
                        <div class="alert alert-danger">
                          <strong>Nilai Suhu Tidak Normal</strong> Cek <a href="#suhu" class="alert-link">link berikut</a>
                        </div>  
                    <?php
                    }if ($co=="1"){ ?>
                        <div class="alert alert-danger">
                          <strong>Nilai Karbonmonoksida Tidak Normal</strong> Cek <a href="#co" class="alert-link">link berikut</a>
                        </div>  
                    <?php
                    }if ($h=="1"){ ?>
                        <div class="alert alert-danger">
                          <strong>Nilai Kelembaban Tidak Normal</strong> Cek <a href="#h" class="alert-link">link berikut</a>
                        </div>  
                    <?php
                    }if ($ch4=="1"){ ?>
                        <div class="alert alert-danger">
                          <strong>Nilai Metan Tidak Normal</strong> Cek <a href="#ch4" class="alert-link">link berikut</a>
                        </div>  
                    <?php
                    }if ($v=="1"){ ?>
                        <div class="alert alert-danger">
                          <strong>Nilai Tegangan Tidak Normal</strong> Cek <a href="#v" class="alert-link">link berikut</a>
                        </div>  
                    <?php
                    }if ($co2=="1"){ ?>
                        <div class="alert alert-danger">
                          <strong>Nilai Karbondioksida Tidak Normal</strong> Cek <a href="#co2" class="alert-link">link berikut</a>
                        </div>  
                    <?php
                    }if ($a=="1"){ ?>
                        <div class="alert alert-danger">
                          <strong>Nilai Kecepatan Angin Tidak Normal</strong> Cek <a href="#a" class="alert-link">link berikut</a>
                        </div>  
                    <?php
                    }if ($aa=="1"){ ?>
                        <div class="alert alert-danger">
                          <strong>Nilai Arah Angin Tidak Normal</strong> Cek <a href="#aa" class="alert-link">link berikut</a>
                        </div>  
                    <?php
                    }

                ?>
                       		
			      <div class="row" id="suhu">
			        <div class="col col-md-12">
			          <div id="container1" style="min-width: 310px; height: 400px; max-width: 1000px; margin: 0 auto"></div>
			        </div>      
			      </div>
			      <div class="row" id="co">
			        <div class="col col-md-12">
			          <div id="container2" style="min-width: 310px; height: 400px; max-width: 1000px; margin: 0 auto"></div>
			        </div>      
			      </div>
			      <div class="row" id="h">
			        <div class="col col-md-12">
			          <div id="container3" style="min-width: 310px; height: 400px; max-width: 1000px; margin: 0 auto"></div>
			        </div>      
			      </div>
			      <div class="row" id="ch4">
			        <div class="col col-md-12">
			          <div id="container4" style="min-width: 310px; height: 400px; max-width: 1000px; margin: 0 auto"></div>
			        </div>      
			      </div>
			      <div class="row" id="v">
			        <div class="col col-md-12">
			          <div id="container5" style="min-width: 310px; height: 400px; max-width: 1000px; margin: 0 auto"></div>
			        </div>      
			      </div>
			      <div class="row" id="co2">
			        <div class="col col-md-12">
			          <div id="container6" style="min-width: 310px; height: 400px; max-width: 1000px; margin: 0 auto"></div>
			        </div>      
			      </div>
			      <div class="row" id="a">
			        <div class="col col-md-12">
			          <div id="container7" style="min-width: 310px; height: 400px; max-width: 1000px; margin: 0 auto"></div>
			        </div>      
			      </div>	
			      <div class="row" id="aa">
			        <div class="col col-md-12">
			          <div id="container8" style="min-width: 310px; height: 400px; max-width: 1000px; margin: 0 auto"></div>
			        </div>      
			      </div>			      		      			      			      
              </div>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->


<script type="text/javascript">

Highcharts.chart('container1', {
		  chart: {
		    type: 'areaspline',
		  },
        title: {
            text: 'Nilai Suhu'
        },
        subtitle: {
            text: 'Sumber : lowcarbon-malang.id'
        },
        xAxis: {
            categories: [<?php while($menu4->read()!==false){ echo "'".date("d-m-Y H:i:s", strtotime($waktu_suhu))."',";}?>]
        },
        yAxis: {
            title: {
                text: '°C'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Suhu',
            data: [<?php while($menu3->read()!==false){echo "".$nilai_suhu.",";}?>]
        }]
    });
</script>              

<script type="text/javascript">

Highcharts.chart('container2', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Nilai Karbonmonoksida'
        },
        subtitle: {
            text: 'Sumber : lowcarbon-malang.id'
        },
        xAxis: {
            categories: [<?php while($menu6->read()!==false){ echo "'".date("d-M-Y H:i:s", strtotime($waktu_co))."',";}?>]
        },
        yAxis: {
            title: {
                text: 'PPM'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Karbonmonoksida',
            data: [<?php while($menu5->read()!==false){echo "".$nilai_co.",";}?>]
        }]
    });
</script>  

<script type="text/javascript">

Highcharts.chart('container3', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Nilai Kelembaban'
        },
        subtitle: {
            text: 'Sumber : lowcarbon-malang.id'
        },
        xAxis: {
            categories: [<?php while($menu8->read()!==false){ echo "'".date("d-M-Y H:i:s", strtotime($waktu_h))."',";}?>]
        },
        yAxis: {
            title: {
                text: '%'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Kelembaban',
            data: [<?php while($menu7->read()!==false){echo "".$nilai_h.",";}?>]
        }]
    });
</script>  

<script type="text/javascript">

Highcharts.chart('container4', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Nilai Metan'
        },
        subtitle: {
            text: 'Sumber : lowcarbon-malang.id'
        },
        xAxis: {
            categories: [<?php while($menu10->read()!==false){ echo "'".date("d-M-Y H:i:s", strtotime($waktu_ch4))."',";}?>]
        },
        yAxis: {
            title: {
                text: 'PPM'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Metan',
            data: [<?php while($menu9->read()!==false){echo "".$nilai_ch4.",";}?>]
        }]
    });
</script>  

<script type="text/javascript">

Highcharts.chart('container5', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Nilai Tegangan'
        },
        subtitle: {
            text: 'Sumber : lowcarbon-malang.id'
        },
        xAxis: {
            categories: [<?php while($menu12->read()!==false){ echo "'".date("d-M-Y H:i:s", strtotime($waktu_v))."',";}?>]
        },
        yAxis: {
            title: {
                text: 'Volt'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Tegangan',
            data: [<?php while($menu11->read()!==false){echo "".$nilai_v.",";}?>]
        }]
    });
</script>

<script type="text/javascript">

Highcharts.chart('container6', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Nilai Karbondioksida'
        },
        subtitle: {
            text: 'Sumber : lowcarbon-malang.id'
        },
        xAxis: {
            categories: [<?php while($menu14->read()!==false){ echo "'".date("d-M-Y H:i:s", strtotime($waktu_co2))."',";}?>]
        },
        yAxis: {
            title: {
                text: 'PPM'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Karbondioksida',
            data: [<?php while($menu13->read()!==false){echo "".$nilai_co2.",";}?>]
        }]
    });
</script>

<script type="text/javascript">

Highcharts.chart('container7', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Nilai kecepatan Angin'
        },
        subtitle: {
            text: 'Sumber : lowcarbon-malang.id'
        },
        xAxis: {
            categories: [<?php while($menu16->read()!==false){ echo "'".date("d-M-Y H:i:s", strtotime($waktu_a))."',";}?>]
        },
        yAxis: {
            title: {
                text: 'm/s'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Kecepatan Angin',
            data: [<?php while($menu15->read()!==false){echo "".$nilai_a.",";}?>]
        }]
    });
</script>

<script type="text/javascript">

Highcharts.chart('container8', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Nilai Arah Angin'
        },
        subtitle: {
            text: 'Sumber : lowcarbon-malang.id'
        },
        xAxis: {
            categories: [<?php while($menu18->read()!==false){ echo "'".date("d-M-Y H:i:s", strtotime($waktu_aa))."',";}?>]
        },
        yAxis: {
            title: {
                text: 'Derajat (°)'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Arah Angin',
            data: [<?php while($menu17->read()!==false){echo "".$nilai_aa.",";}?>]
        }]
    });
</script>