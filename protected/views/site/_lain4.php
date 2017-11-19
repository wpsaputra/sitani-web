<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Jagung\n								
per Sub Round di Sulawesi Tenggara, 2016 \n						
Angka Tetap 2016	
";								

$table = array(
array('Buton',67 ,34.35 ,229 ,1909 ,37.77 ,7208), 
array('Muna',433 ,57.73 ,2500 ,8791 ,22.01 ,19352), 
array('Konawe',292 ,28.36 ,828 ,907 ,27.92 ,2533 ),
array('Kolaka',55 ,46.82 ,258 ,2243 ,52.19 ,11706 ),
array('Konsel',520 ,57.73 ,3002 ,2731 ,51.14 ,13965 ),
array('Bombana',40 ,76.43 ,303 ,1347 ,27.66 ,3724 ),
array('Wakatobi',0 ,0.00 ,0 ,326 ,40.40 ,1317 ),
array('Kolaka Utara',90 ,78.53 ,704 ,1057 ,50.43 ,5329), 
array('Buton utara',11 ,22.01 ,24 ,581 ,25.24 ,1465 ),
array('Konawe Utara',204 ,24.28 ,495 ,338 ,24.21 ,818 ),
array('Kolaka Timur',113 ,37.47 ,423 ,1426 ,37.73 ,5378 ),
array('Konawe Kepulauan',15 ,38.66 ,58 ,66 ,40.45 ,267 ),
array('Muna Barat',476 ,17.71 ,843 ,5116 ,18.44 ,9431 ),
array('Buton Tengah',0 ,13.16 ,0 ,1851 ,10.84 ,2006 ),
array('Buton Selatan',54 ,18.25 ,99 ,1531 ,19.12 ,2927), 
array('Kota Kendari',43 ,65.38 ,281 ,416 ,51.72 ,2153 ),
array('Kota Bau-Bau',2 ,23.25 ,5 ,182 ,23.50 ,428 ),
array('Sulawesi Tenggara',2414 ,41.64 ,10052 ,30816 ,29.21 ,90007) 

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