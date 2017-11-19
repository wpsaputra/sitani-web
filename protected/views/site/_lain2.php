<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Padi Ladang \n								
per Sub Round di Sulawesi Tenggara, 2016 \n
Angka Tetap 2016	
";								

$table = array(
array('Buton',0 ,0.00 ,0 ,1910 ,24.61 ,4701), 
array('Muna',0 ,0.00 ,0 ,636 ,20.95 ,1333 ),
array('Konawe',65 ,29.19 ,190 ,204 ,20.81 ,425), 
array('Kolaka',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Konsel',29 ,36.18 ,105 ,2905 ,24.73 ,7183), 
array('Bombana',7 ,29.05 ,20 ,81 ,21.06 ,171 ),
array('Wakatobi',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kolaka Utara',0 ,24.50 ,0 ,31 ,31.65 ,98), 
array('Buton utara',0 ,0.00 ,0 ,429 ,38.30 ,1643 ),
array('Konawe Utara',2 ,28.49 ,6 ,764 ,32.12 ,2454 ),
array('Kolaka Timur',4 ,42.67 ,17 ,8 ,41.50 ,33 ),
array('Konawe Kepulauan',5 ,28.00 ,14 ,44 ,17.81 ,78), 
array('Muna Barat',0 ,0.00 ,0 ,13 ,17.85 ,23 ),
array('Buton Tengah',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Buton Selatan',0 ,0.00 ,0 ,7 ,26.29 ,18), 
array('Kota Kendari',2 ,27.50 ,6 ,2 ,27.50 ,6 ),
array('Kota Bau-Bau',0 ,0.00 ,0 ,174 ,27.48 ,478), 
array('Sulawesi Tenggara',114 ,31.34 ,357 ,7208 ,25.87 ,18643) 
 
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