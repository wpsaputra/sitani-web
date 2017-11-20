<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Ubi Kayu \n
per Sub Round di Sulawesi Tenggara, 2017 \n		
Angka Ramalan II 2017
";								

$table = array(
array('Buton',146 ,167.59 ,2447 ,322 ,425.10 ,13688 ),
array('Muna',364 ,257.31 ,9366 ,315 ,119.30 ,3758 ),
array('Konawe',104 ,324.80 ,3375 ,67 ,168.50 ,1121 ),
array('Kolaka',57 ,540.78 ,3082 ,112 ,311.40 ,3488 ),
array('Konsel',556 ,387.06 ,21532 ,379 ,244.60 ,9258 ),
array('Bombana',9 ,277.12 ,249 ,43 ,267.20 ,1149 ),
array('Wakatobi',1342 ,163.40 ,21928 ,1470 ,150.40 ,22109 ),
array('Kolaka Utara',13 ,237.20 ,308 ,23 ,152.00 ,342 ),
array('Buton utara',41 ,383.40 ,1572 ,65 ,377.20 ,2452 ),
array('Konawe Utara',115 ,195.28 ,2246 ,43 ,240.80 ,1035 ),
array('Kolaka Timur',74 ,466.00 ,3448 ,131 ,190.70 ,2498 ),
array('Konawe Kepulauan',0 ,324.80 ,0 ,0 ,168.50 ,0 ),
array('Muna Barat',23 ,335.60 ,772 ,66 ,155.70 ,1028 ),
array('Buton Tengah',86 ,242.30 ,2084 ,317 ,182.50 ,5785 ),
array('Buton Selatan',120 ,428.08 ,5137 ,228 ,278.90 ,6359 ),
array('Kota Kendari',49 ,179.20 ,878 ,38 ,160.30 ,609 ),
array('Kota Bau-Bau',12 ,209.20 ,251 ,39 ,267.60 ,1044 ),
array('Sulawesi Tenggara',3111 ,252.88 ,78676 ,3657 ,207.09 ,75722 ),

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