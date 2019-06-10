<script src='https://maps.google.co.id/maps/api/js?key=AIzaSyCQm6Y1NjB8PLn8piM5CVz5B_XBxE98aHM'></script>

<h3>Persebaran Node di Dunia</h3>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
            	<div id="map" style="width: 100%; height: 420px;"></div>
            </div>
          </div>
        </div>
      </div>
      <?php /* ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Provinsi</th>
                  <th>Jumlah Alumni</th>
                  <th>PW Provinsi</th>
                  <th>CP PW Provinsi</th>
                </tr>
                </thead>
                <tbody>
				<?php
				        $connection=Yii::app()->db;
				        $sql="select DISTINCT(provinsi.id),provinsi.nama_node,(select COUNT(user.provinsi) as a from user where user.provinsi=provinsi.id and level=5) as jml_alumni,(select nama from user where user.pw_provinsi=provinsi.id and user.enable_pw_provinsi=1) as pw_alumni,(select no_hp from user where user.pw_provinsi=provinsi.id and user.enable_pw_provinsi=1) as cp_alumni from provinsi,user ORDER BY nama_node asc";
				        $menu=$connection->createCommand($sql)->query();
				        $menu->bindColumn(2,$nama_node);
				        $menu->bindColumn(3,$jml_alumni);
				        $menu->bindColumn(4,$pw_prov);
				        $menu->bindColumn(5,$cp_pw_prov);

				        while($menu->read()!==false)
				        {
				             
				             //nilai $purchase_item_id,$item_name dan $qty_unrec sudah diperoleh di sini misal
				             echo '<tr>
					                  <td>'.$nama_node.'</td>
					                  <td>'.$jml_alumni.'</td>
					                  <td>'.$pw_prov.'</td>
					                  <td>'.$cp_pw_prov.'</td>					                  
					                </tr>';
				        }
				?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>      
      <?php */ ?>
    <script type="text/javascript">
    var locations = [
            <?php
            	$connection=Yii::app()->db;
        $sql="SELECT tbl_node.id_node as kode_node,tbl_node.nama_node,tbl_node.lat,tbl_node.lng,(select count(id_station) from tbl_station where id_node=kode_node) as jml from tbl_node order by tbl_node.nama_node";
        $menu=$connection->createCommand($sql)->query();
        $menu->bindColumn(2,$nama_node);
        $menu->bindColumn(3,$lati);
        $menu->bindColumn(4,$longi);
        $menu->bindColumn(5,$jumlah_station);
      	$no = 1;
        while($menu->read()!==false)
        {
             //nilai $purchase_item_id,$item_name dan $qty_unrec sudah diperoleh di sini misal
             ?>['<b><?php echo "Nama Node : ".$nama_node;?></b><br>Jumlah Station : <?php echo $jumlah_station;?>', <?php echo $lati;?>, <?php echo $longi;?>, <?php echo $no;?>], <?php
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
         icon: '<?php echo Yii::app()->request->baseUrl; ?>/images/motion-sensor.png'
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    </script>


