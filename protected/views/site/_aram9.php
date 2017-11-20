<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Ubi Jalar \n
per Sub Round di Sulawesi Tenggara, 2017 \n
Angka Ramalan II 2017
";								

$table = array(
array('Buton',52 ,70.77 ,368 ,148 ,185.82 ,2750 ),
array('Muna',130 ,158.51 ,2061 ,104 ,43.20 ,449 ),
array('Konawe',66 ,154.00 ,1013 ,45 ,131.20 ,588 ),
array('Kolaka',7 ,83.63 ,59 ,9 ,103.50 ,93 ),
array('Konsel',62 ,86.00 ,532 ,92 ,105.80 ,972 ),
array('Bombana',9 ,171.20 ,154 ,20 ,165.40 ,331 ),
array('Wakatobi',13 ,70.40 ,92 ,10 ,127.80 ,128 ),
array('Kolaka Utara',10 ,183.16 ,183 ,14 ,137.90 ,186 ),
array('Buton utara',26 ,86.12 ,224 ,27 ,127.10 ,337 ),
array('Konawe Utara',130 ,161.04 ,2094 ,33 ,88.70 ,293), 
array('Kolaka Timur',64 ,83.52 ,535 ,28 ,82.30 ,230 ),
array('Konawe Kepulauan',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Muna Barat',31 ,82.90 ,257 ,29 ,94.80 ,275 ),
array('Buton Tengah',17 ,71.40 ,121 ,47 ,58.40 ,274 ),
array('Buton Selatan',12 ,67.90 ,81 ,25 ,89.10 ,223 ),
array('Kota Kendari',12 ,90.00 ,108 ,16 ,100.96 ,162 ),
array('Kota Bau-Bau',3 ,54.96 ,16 ,10 ,79.10 ,79 ),
array('Sulawesi Tenggara',644 ,122.70 ,7898 ,656 ,112.40 ,7370 ),

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