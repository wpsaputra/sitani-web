<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Padi Ladang \n					
per Sub Round di Sulawesi Tenggara, 2017 \n	
Angka Ramalan II 2017
";								

$table = array(
array('Buton',1261 ,24.11 ,3040 ,290 ,25.30 ,734 ),
array('Muna',384 ,16.16 ,621 ,105 ,31.94 ,335 ),
array('Konawe',10 ,31.41 ,31 ,25 ,32.55 ,81 ),
array('Kolaka',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Konsel',204 ,30.21 ,616 ,1809 ,24.24 ,4385), 
array('Bombana',6 ,9.53 ,6 ,29 ,27.25 ,79 ),
array('Wakatobi',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kolaka Utara',21 ,28.72 ,60 ,1 ,39.26 ,4), 
array('Buton utara',56 ,31.79 ,178 ,354 ,30.14 ,1067 ),
array('Konawe Utara',68 ,31.16 ,212 ,24 ,24.83 ,60 ),
array('Kolaka Timur',0 ,0.00 ,0 ,3 ,40.33 ,12 ),
array('Konawe Kepulauan',0 ,0.00 ,0 ,0 ,32.55 ,0), 
array('Muna Barat',0 ,0.00 ,0 ,6 ,17.85 ,11 ),
array('Buton Tengah',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Buton Selatan',3 ,21.15 ,6 ,12 ,26.38 ,32 ),
array('Kota Kendari',0 ,0.00 ,0 ,3 ,27.50 ,8 ),
array('Kota Bau-Bau',358 ,27.66 ,990 ,9 ,27.48 ,25), 
array('Sulawesi Tenggara',2371 ,24.30 ,5761 ,2670 ,25.59 ,6833 ),
 
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