<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Kacang Tanah\n			
per Sub Round di Sulawesi Tenggara, 2016\n				
Angka Tetap 2016\n					
";								

$table = array(
array('Buton',14 ,8.87 ,12 ,77 ,7.13 ,55), 
array('Muna',55 ,8.03 ,44 ,1338 ,7.25 ,970), 
array('Konawe',22 ,11.65 ,26 ,90 ,12.35 ,111), 
array('Kolaka',11 ,46.59 ,51 ,24 ,27.09 ,65 ),
array('Konsel',99 ,10.40 ,103 ,159 ,9.52 ,151 ),
array('Bombana',6 ,30.16 ,18 ,87 ,15.02 ,131 ),
array('Wakatobi',0 ,0.00 ,0 ,5 ,7.45 ,4 ),
array('Kolaka Utara',3 ,14.19 ,5 ,17 ,18.85 ,32), 
array('Buton utara',10 ,10.02 ,10 ,53 ,9.44 ,50 ),
array('Konawe Utara',244 ,8.39 ,205 ,612 ,9.58 ,586), 
array('Kolaka Timur',15 ,6.85 ,10 ,65 ,6.04 ,39 ),
array('Konawe Kepulauan',0 ,0.00 ,0 ,4 ,5.87 ,2 ),
array('Muna Barat',54 ,7.83 ,42 ,1300 ,6.01 ,781 ),
array('Buton Tengah',0 ,0.00 ,0 ,10 ,7.26 ,7 ),
array('Buton Selatan',3 ,5.89 ,2 ,12 ,8.47 ,10 ),
array('Kota Kendari',8 ,4.38 ,4 ,28 ,8.30 ,23 ),
array('Kota Bau-Bau',0 ,9.60 ,0 ,7 ,6.28 ,4 ),
array('Sulawesi Tenggara',544 ,9.77 ,532 ,3887 ,7.77 ,3022), 

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