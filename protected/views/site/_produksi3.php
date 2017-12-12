<?php
$title = "
Produksi Padi Palawija Kabupaten Buton menurut Jenis Tanaman (Buton Selatan) 
";								

$table = array(
array('Padi',7,26.29,18,15,25.34,38),
array('&emsp; Padi sawah',0,0.00,0,0,0.00,0),
array('&emsp; Padi Ladang',7,26.29,18,15,25.34,38),
array('Jagung',1531,19.12,2927,972,15.57,1513),
array('Kedelai',0,0.00,0,0,0.00,0),
array('kacang Tanah',12,8.47,10,12,8.32,10),
array('kacang hijau',8,8.23,7,12,8.27,10),
array('Ubi Kayu',1023,165.16,16896,348,330.34,11496),
array('ubi Jalar',58,80.70,464,37,82.22,304),
    
);

?>


<div class="panel panel-default">
    <div class="panel-body">
		<h5><?php echo nl2br($title); ?></h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th rowspan="2" class="text-center">Tanaman</th>
                    <th colspan="3" class="text-center">2016</th>
                    <th colspan="3" class="text-center">2017*</th>
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
					for($row=0; $row<9; $row++){
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
        <p>** ARAM II 2017</p>
    </div>
</div>