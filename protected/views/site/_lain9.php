<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Ubi Jalar\n			
per Sub Round di Sulawesi Tenggara, 2016\n					
Angka Tetap 2016\n				
";								

$table = array(
array('Buton',110 ,240.88 ,2650 ,249 ,212.86 ,5300 ),
array('Muna',99 ,174.64 ,1729 ,205 ,132.49 ,2716 ),
array('Konawe',40 ,142.23 ,562 ,141 ,140.58 ,1979 ),
array('Kolaka',26 ,114.48 ,298 ,63 ,106.45 ,671 ),
array('Konsel',114 ,56.45 ,644 ,234 ,60.40 ,1415 ),
array('Bombana',16 ,174.00 ,278 ,94 ,203.57 ,1914 ),
array('Wakatobi',3 ,80.26 ,24 ,7 ,77.93 ,55 ),
array('Kolaka Utara',5 ,150.29 ,78 ,38 ,140.38 ,531 ),
array('Buton utara',46 ,124.92 ,575 ,182 ,119.38 ,2173 ),
array('Konawe Utara',100 ,150.40 ,1504 ,269 ,120.35 ,3237), 
array('Kolaka Timur',50 ,79.91 ,400 ,117 ,81.60 ,953 ),
array('Konawe Kepulauan',0 ,82.81 ,0 ,24 ,87.95 ,211 ),
array('Muna Barat',42 ,219.52 ,922 ,58 ,184.91 ,1072 ),
array('Buton Tengah',38 ,81.41 ,309 ,92 ,87.50 ,805 ),
array('Buton Selatan',30 ,85.36 ,256 ,58 ,80.70 ,464 ),
array('Kota Kendari',10 ,100.96 ,101 ,22 ,98.60 ,217 ),
array('Kota Bau-Bau',12 ,80.47 ,97 ,31 ,79.88 ,248 ),
array('Sulawesi Tenggara',741 ,140.74 ,10426 ,1883 ,127.23 ,23960 ),
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