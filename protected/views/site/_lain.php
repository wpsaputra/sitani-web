<?php
$title = "Luas Panen, Hasil Per Hektar dan Produksi Padi Sawah \n								
per Sub Round di Sulawesi Tenggara, \n 								
Angka Tetap 2016";								

$table = array(
array('Buton',520 ,33.49 ,1742 ,1660 ,31.09 ,5160),
array('Muna',112 ,22.28 ,250 ,890 ,25.76 ,2292 ),
array('Konawe',19823 ,39.34 ,77984 ,59131 ,38.88 ,229909 ),
array('Kolaka',6960 ,51.24 ,35663 ,17413 ,50.50 ,87929 ),
array('Konsel',12142 ,39.95 ,48507 ,33015 ,40.04 ,132185 ),
array('Bombana',6262 ,49.07 ,30725 ,19136 ,40.64 ,77764 ),
array('Wakatobi',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kolaka Utara',1066 ,41.75 ,4449 ,2750 ,43.32 ,11912 ),
array('Buton utara',179 ,38.14 ,681 ,1259 ,44.39 ,5591 ),
array('Konawe Utara',1830 ,36.99 ,6768 ,4313 ,32.52 ,14024 ),
array('Kolaka Timur',10392 ,44.84 ,46599 ,21907 ,42.42 ,92937), 
array('Konawe Kepulauan',0 ,0.00 ,0 ,102 ,48.13 ,490 ),
array('Muna Barat',133 ,22.28 ,295 ,850 ,31.96 ,2716 ),
array('Buton Tengah',2 ,33.49 ,7 ,2 ,35.00 ,7 ),
array('Buton Selatan',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kota Kendari',771 ,42.29 ,3259 ,1569 ,44.58 ,6993), 
array('Kota Bau-Bau',1050 ,35.53 ,3731 ,2293 ,36.65 ,8402 ),
array('Sulawesi Tenggara',61241 ,42.56 ,260660 ,166288 ,40.79 ,678311), 
);

?>


<div class="panel panel-default">
    <div class="panel-body">
		<h5><?php echo nl2br($title); ?></h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th rowspan="2" class="text-center">Kabupaten/Kota</th>
                    <th colspan="3" class="text-center">September - Desember</th>
                    <th colspan="3" class="text-center">Januari - Desember</th>
                </tr>
				
				<tr>
                    <th class="text-center">Luas Panen (Ha)</th>
                    <th class="text-center">Hasil per Ha (Ku)</th>
                    <th class="text-center">Produksi (Ton)</th>
                    <th class="text-center">Luas Panen (Ha)</th>
                    <th class="text-center">Hasil per Ha (Ku)</th>
                    <th class="text-center">Produksi (Ton)</th>
                </tr>

                <tr>
                    <?php
                    for ($i = 1; $i <= 7; $i++) {
                        echo "<th class='text-center'>({$i})</th>";
                    }
                    ?>
                </tr>
                </thead>
                <tbody>

				<?php
					for($row=0; $row<18; $row++){
						echo "<tr>";
						for($col=0; $col<7; $col++){
							echo "<td>".$table[$row][$col]."</td>";

						}
						echo "</tr>";
					}

				?>
                </tbody>
            </table>
        </div>
    </div>
</div>