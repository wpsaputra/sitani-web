<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Kacang Kedelai \n
per Sub Round di Sulawesi Tenggara, 2017 \n
Angka Ramalan II 2017
";								

$table = array(
array('Buton',18 ,12.86 ,23 ,17 ,9.85 ,17 ),
array('Muna',23 ,8.41 ,19 ,55 ,8.65 ,48 ),
array('Konawe',62 ,18.26 ,113 ,10 ,15.90 ,16 ),
array('Kolaka',851 ,13.47 ,1146 ,60 ,20.32 ,122), 
array('Konsel',108 ,21.20 ,230 ,28 ,19.14 ,54 ),
array('Bombana',280 ,20.78 ,582 ,232 ,16.14 ,374), 
array('Wakatobi',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kolaka Utara',0 ,0.00 ,0 ,0 ,0.00 ,0), 
array('Buton utara',91 ,14.91 ,136 ,4 ,11.80 ,4), 
array('Konawe Utara',104 ,26.33 ,274 ,0 ,0.00 ,0 ),
array('Kolaka Timur',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Konawe Kepulauan',0 ,0.00 ,0 ,0 ,0.00 ,0), 
array('Muna Barat',54 ,16.68 ,90 ,48 ,18.65 ,90 ),
array('Buton Tengah',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Buton Selatan',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kota Kendari',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kota Bau-Bau',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Sulawesi Tenggara',1591 ,16.42 ,2613 ,454 ,15.96 ,724 ),
 
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