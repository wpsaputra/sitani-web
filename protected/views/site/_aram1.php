<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Padi Sawah \n
per Sub Round di Sulawesi Tenggara, 2017 \n	
Angka Ramalan II 2017
";								

$table = array(
array('Buton',151 ,42.98 ,648 ,821 ,28.60 ,2348 ),
array('Muna',329 ,20.55 ,677 ,209 ,24.57 ,514 ),
array('Konawe',13461 ,45.35 ,61044 ,14258 ,37.70 ,53752 ),
array('Kolaka',4475 ,49.85 ,22308 ,6863 ,54.80 ,37607 ),
array('Konsel',4619 ,38.14 ,17617 ,15313 ,35.20 ,53902 ),
array('Bombana',7061 ,40.34 ,28484 ,7770 ,42.00 ,32635 ),
array('Wakatobi',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kolaka Utara',836 ,46.50 ,3886 ,1172 ,39.70 ,4654), 
array('Buton utara',165 ,37.70 ,624 ,930 ,37.70 ,3506 ),
array('Konawe Utara',864 ,30.35 ,2623 ,428 ,28.80 ,1234 ),
array('Kolaka Timur',1784 ,53.22 ,9496 ,9789 ,40.10 ,39252), 
array('Konawe Kepulauan',0 ,0.00 ,0 ,8 ,41.40 ,32 ),
array('Muna Barat',492 ,30.66 ,1507 ,149 ,23.20 ,345), 
array('Buton Tengah',1 ,34.15 ,3 ,0 ,0.00 ,0 ),
array('Buton Selatan',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kota Kendari',87 ,43.26 ,378 ,593 ,49.00 ,2907 ),
array('Kota Bau-Bau',46 ,39.07 ,180 ,1121 ,40.00 ,4486 ),
array('Sulawesi Tenggara',34371 ,43.49 ,149475 ,59424 ,39.91 ,237174 )
 
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
                    <th colspan="3" class="text-center">Januari - April</th>
                    <th colspan="3" class="text-center">Mei - Agustus</th>
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