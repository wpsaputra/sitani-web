<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Padi\n
per Sub Round di Sulawesi Tenggara, 2016\n
Angka Tetap 2016									
";								

$table = array(
array('Buton',520 ,33.48 ,1742 ,3570 ,27.62 ,9861), 
array('Muna',112 ,22.26 ,250 ,1526 ,23.76 ,3625 ),
array('Konawe',19888 ,39.31 ,78174 ,59335 ,38.82 ,230334 ),
array('Kolaka',6960 ,51.24 ,35663 ,17413 ,50.50 ,87929 ),
array('Konsel',12171 ,39.94 ,48612 ,35920 ,38.80 ,139368 ),
array('Bombana',6269 ,49.05 ,30745 ,19217 ,40.56 ,77935 ),
array('Wakatobi',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Kolaka Utara',1066 ,41.75 ,4449 ,2781 ,43.19 ,12010), 
array('Buton utara',179 ,38.15 ,681 ,1688 ,42.85 ,7234 ),
array('Konawe Utara',1832 ,36.98 ,6774 ,5077 ,32.46 ,16478), 
array('Kolaka Timur',10396 ,44.84 ,46616 ,21915 ,42.42 ,92970), 
array('Konawe Kepulauan',5 ,28.00 ,14 ,146 ,38.98 ,568 ),
array('Muna Barat',133 ,22.25 ,295 ,863 ,31.75 ,2739 ),
array('Buton Tengah',2 ,35.00 ,7 ,2 ,35.00 ,7 ),
array('Buton Selatan',0 ,0.00 ,0 ,7 ,26.29 ,18 ),
array('Kota Kendari',773 ,42.25 ,3265 ,1571 ,44.56 ,6999), 
array('Kota Bau-Bau',1050 ,35.53 ,3731 ,2467 ,36.00 ,8880 ),
array('Sulawesi Tenggara',61355 ,42.54 ,261017 ,173496 ,40.17 ,696954) 

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