<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Kacang Hijau \n
per Sub Round di Sulawesi Tenggara, 2017 \n
Angka Ramalan II 2017
";								

$table = array(
array('Buton',56 ,8.27 ,46 ,115 ,8.96 ,103),
array('Muna',18 ,8.27 ,15 ,10 ,8.96 ,9 ),
array('Konawe',38 ,8.27 ,31 ,29 ,8.96 ,26), 
array('Kolaka',5 ,8.27 ,4 ,1 ,8.96 ,1 ),
array('Konsel',104 ,8.27 ,86 ,21 ,8.96 ,19 ),
array('Bombana',17 ,8.27 ,14 ,12 ,8.96 ,11 ),
array('Wakatobi',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kolaka Utara',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Buton utara',0 ,0.00 ,0 ,2 ,8.96 ,2 ),
array('Konawe Utara',139 ,8.27 ,115 ,24 ,8.96 ,22 ),
array('Kolaka Timur',9 ,8.27 ,7 ,4 ,8.96 ,4 ),
array('Konawe Kepulauan',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Muna Barat',1 ,8.27 ,1 ,0 ,0.00 ,0 ),
array('Buton Tengah',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Buton Selatan',12 ,8.27 ,10 ,0 ,0.00 ,0 ),
array('Kota Kendari',5 ,8.27 ,4 ,8 ,8.96 ,7 ),
array('Kota Bau-Bau',3 ,8.27 ,2 ,1 ,8.96 ,1 ),
array('Sulawesi Tenggara',406 ,8.27 ,336 ,227 ,8.96 ,203 ),
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