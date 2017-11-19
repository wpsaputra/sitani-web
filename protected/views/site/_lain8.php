<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Ubi Kayu\n				
per Sub Round di Sulawesi Tenggara, 2016\n					
Angka Tetap 2016\n		
";								

$table = array(
array('Buton',307 ,279.01 ,8566 ,796 ,220.67 ,17565), 
array('Muna',503 ,411.92 ,20720 ,861 ,296.55 ,25533 ),
array('Konawe',82 ,293.22 ,2390 ,239 ,299.03 ,7132 ),
array('Kolaka',60 ,158.58 ,951 ,211 ,169.54 ,3577 ),
array('Konsel',308 ,308.24 ,9488 ,762 ,254.77 ,19424), 
array('Bombana',52 ,202.46 ,1053 ,152 ,268.88 ,4087 ),
array('Wakatobi',424 ,192.31 ,8154 ,957 ,199.63 ,19104), 
array('Kolaka Utara',20 ,222.83 ,452 ,56 ,226.73 ,1263 ),
array('Buton utara',170 ,375.08 ,6376 ,453 ,345.17 ,15636), 
array('Konawe Utara',155 ,113.68 ,1762 ,383 ,143.09 ,5480 ),
array('Kolaka Timur',102 ,232.35 ,2370 ,323 ,242.57 ,7835 ),
array('Konawe Kepulauan',25 ,390.67 ,977 ,106 ,187.44 ,1987 ),
array('Muna Barat',190 ,150.40 ,2858 ,245 ,146.86 ,3598 ),
array('Buton Tengah',172 ,163.52 ,2813 ,433 ,143.29 ,6205 ),
array('Buton Selatan',609 ,174.30 ,10615 ,1023 ,165.16 ,16896), 
array('Kota Kendari',30 ,296.53 ,890 ,106 ,319.06 ,3382 ),
array('Kota Bau-Bau',70 ,290.93 ,2037 ,113 ,246.80 ,2789 ),
array('Sulawesi Tenggara',3279 ,251.54 ,82469 ,7219 ,223.72 ,161492 )

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