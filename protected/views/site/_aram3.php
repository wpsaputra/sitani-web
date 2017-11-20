<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Padi \n
per Sub Round di Sulawesi Tenggara, 2017 \n
Angka Ramalan II 2017
";								

$table = array(
array('Buton',1412 ,26.13 ,3688 ,1111 ,27.74 ,3082 ),
array('Muna',713 ,18.19 ,1298 ,314 ,27.02 ,849 ),
array('Konawe',13471 ,45.34 ,61075 ,14283 ,37.69 ,53833 ),
array('Kolaka',4475 ,49.85 ,22308 ,6863 ,54.80 ,37607 ),
array('Konsel',4823 ,37.80 ,18233 ,17122 ,34.04 ,58287 ),
array('Bombana',7067 ,40.31 ,28490 ,7799 ,41.95 ,32714 ),
array('Wakatobi',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kolaka Utara',857 ,46.06 ,3946 ,1173 ,39.70 ,4658 ),
array('Buton utara',221 ,36.22 ,802 ,1284 ,35.61 ,4573 ),
array('Konawe Utara',932 ,30.41 ,2835 ,452 ,28.60 ,1294 ),
array('Kolaka Timur',1784 ,53.22 ,9496 ,9792 ,40.10 ,39264), 
array('Konawe Kepulauan',0 ,0.00 ,0 ,8 ,0.00 ,32 ),
array('Muna Barat',492 ,30.66 ,1507 ,155 ,22.99 ,356), 
array('Buton Tengah',1 ,0.00 ,3 ,0 ,0.00 ,0 ),
array('Buton Selatan',3 ,21.17 ,6 ,12 ,26.38 ,32 ),
array('Kota Kendari',87 ,43.30 ,378 ,596 ,48.90 ,2915 ),
array('Kota Bau-Bau',404 ,28.96 ,1170 ,1130 ,39.90 ,4511), 
array('Sulawesi Tenggara',36742 ,42.25 ,155236 ,62095 ,39.30 ,244007 ),
 
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