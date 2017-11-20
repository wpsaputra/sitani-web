<?php
$title = "
Luas Panen, Hasil Per Hektar dan Produksi Kacang Tanah \n
per Sub Round di Sulawesi Tenggara, 2017 \n
Angka Ramalan II 2017
";								

$table = array(
array('Buton',74 ,7.20 ,53 ,69 ,8.13 ,56 ),
array('Muna',467 ,4.81 ,225 ,328 ,6.97 ,229 ),
array('Konawe',29 ,13.53 ,39 ,21 ,13.95 ,29 ),
array('Kolaka',6 ,8.02 ,5 ,10 ,16.40 ,16 ),
array('Konsel',36 ,8.93 ,32 ,37 ,6.50 ,24 ),
array('Bombana',10 ,10.16 ,10 ,29 ,14.80 ,43), 
array('Wakatobi',1 ,9.70 ,1 ,5 ,7.43 ,4 ),
array('Kolaka Utara',5 ,21.59 ,10 ,2 ,17.68 ,3 ),
array('Buton utara',32 ,8.33 ,27 ,24 ,5.80 ,14 ),
array('Konawe Utara',264 ,4.90 ,129 ,44 ,13.40 ,59 ),
array('Kolaka Timur',15 ,6.53 ,10 ,45 ,6.50 ,29 ),
array('Konawe Kepulauan',0 ,0.00 ,0 ,0 ,0.00 ,0 ),
array('Muna Barat',944 ,8.40 ,793 ,558 ,4.56 ,254 ),
array('Buton Tengah',3 ,6.14 ,2 ,12 ,7.58 ,9 ),
array('Buton Selatan',10 ,8.10 ,8 ,2 ,9.42 ,2 ),
array('Kota Kendari',13 ,4.38 ,6 ,10 ,10.90 ,11 ),
array('Kota Bau-Bau',3 ,8.16 ,2 ,5 ,6.28 ,3 ),
array('Sulawesi Tenggara',1911 ,7.07 ,1352 ,1201 ,6.54 ,786 ),
 
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