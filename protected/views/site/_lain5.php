<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Kacang Kedelai\n
per Sub Round di Sulawesi Tenggara, 2016\n				
Angka Tetap 2016\n			
";								

$table = array(
array('Buton',16 ,9.49 ,15 ,72 ,9.54 ,68), 
array('Muna',194 ,9.35 ,181 ,891 ,8.67 ,772 ),
array('Konawe',172 ,38.14 ,656 ,771 ,22.59 ,1741), 
array('Kolaka',767 ,19.98 ,1532 ,2057 ,16.75 ,3444), 
array('Konsel',569 ,23.96 ,1364 ,2323 ,26.53 ,6164 ),
array('Bombana',3 ,33.20 ,10 ,536 ,20.57 ,1102 ),
array('Wakatobi',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kolaka Utara',0 ,0.00 ,0 ,8 ,9.49 ,8), 
array('Buton utara',118 ,15.22 ,180 ,353 ,16.43 ,580), 
array('Konawe Utara',111 ,21.97 ,244 ,311 ,23.45 ,729 ),
array('Kolaka Timur',0 ,0.00 ,0 ,157 ,9.56 ,150 ),
array('Konawe Kepulauan',19 ,30.25 ,57 ,19 ,30.25 ,57), 
array('Muna Barat',145 ,18.06 ,262 ,749 ,17.09 ,1280 ),
array('Buton Tengah',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Buton Selatan',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kota Kendari',2 ,8.96 ,2 ,17 ,8.97 ,15 ),
array('Kota Bau-Bau',0 ,0.00 ,0 ,26 ,9.26 ,24 ),
array('Sulawesi Tenggara',2116 ,21.28 ,4503 ,8289 ,19.47 ,16136) 

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