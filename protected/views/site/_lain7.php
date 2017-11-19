<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Kacang Hijau\n								
per Sub Round di Sulawesi Tenggara, 2016\n				
Angka Tetap 2016
";								

$table = array(
array('Buton',25 ,7.81 ,20 ,117 ,8.10 ,95 ),
array('Muna',14 ,7.81 ,11 ,94 ,8.11 ,76 ),
array('Konawe',20 ,7.81 ,15 ,84 ,8.10 ,68 ),
array('Kolaka',17 ,7.81 ,13 ,64 ,8.12 ,52 ),
array('Konsel',120 ,7.81 ,94 ,186 ,7.94 ,148), 
array('Bombana',12 ,7.81 ,9 ,27 ,8.03 ,22 ),
array('Wakatobi',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kolaka Utara',0 ,7.81 ,0 ,10 ,8.27 ,8), 
array('Buton utara',199 ,7.81 ,155 ,204 ,7.82 ,159 ),
array('Konawe Utara',142 ,7.81 ,111 ,343 ,8.03 ,276 ),
array('Kolaka Timur',3 ,7.81 ,2 ,16 ,8.13 ,13 ),
array('Konawe Kepulauan',85 ,7.81 ,66 ,87 ,7.82 ,68), 
array('Muna Barat',3 ,7.81 ,2 ,5 ,7.99 ,4 ),
array('Buton Tengah',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Buton Selatan',0 ,0.00 ,0 ,8 ,8.23 ,7 ),
array('Kota Kendari',2 ,7.81 ,2 ,3 ,7.96 ,2 ),
array('Kota Bau-Bau',0 ,7.81 ,0 ,8 ,8.12 ,6 ),
array('Sulawesi Tenggara',641 ,7.81 ,500 ,1255 ,8.00 ,1003) 

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