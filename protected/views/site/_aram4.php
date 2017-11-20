<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Jagung \n
per Sub Round di Sulawesi Tenggara, 2017 \n
Angka Ramalan II 2017
";								

$table = array(
array('Buton',1140 ,38.27 ,4363 ,197 ,27.70 ,546), 
array('Muna',4239 ,23.28 ,9868 ,1803 ,14.84 ,2676 ),
array('Konawe',1507 ,40.53 ,6106 ,994 ,45.70 ,4544 ),
array('Kolaka',2086 ,59.00 ,12307 ,605 ,30.10 ,1820 ),
array('Konsel',1858 ,47.66 ,8853 ,2959 ,34.30 ,10148 ),
array('Bombana',1112 ,36.10 ,4013 ,923 ,78.20 ,7219 ),
array('Wakatobi',77 ,35.20 ,271 ,41 ,34.50 ,141 ),
array('Kolaka Utara',1822 ,43.04 ,7841 ,636 ,36.70 ,2335 ),
array('Buton utara',462 ,22.78 ,1052 ,74 ,22.80 ,168 ),
array('Konawe Utara',466 ,51.98 ,2422 ,512 ,52.90 ,2708), 
array('Kolaka Timur',472 ,36.60 ,1728 ,754 ,44.30 ,3342 ),
array('Konawe Kepulauan',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Muna Barat',3079 ,22.30 ,6866 ,2093 ,16.30 ,3411), 
array('Buton Tengah',1179 ,17.89 ,2109 ,178 ,13.90 ,247 ),
array('Buton Selatan',849 ,16.42 ,1394 ,123 ,9.70 ,119 ),
array('Kota Kendari',408 ,68.10 ,2778 ,185 ,52.00 ,961 ),
array('Kota Bau-Bau',115 ,17.39 ,200 ,9 ,22.90 ,21 ),
array('Sulawesi Tenggara',20870 ,34.58 ,72173 ,12086 ,33.43 ,40408 ),
 
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