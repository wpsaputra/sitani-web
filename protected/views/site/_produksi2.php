<?php
$title = "
Produksi Padi Palawija Kabupaten Buton menurut Jenis Tanaman (Buton Tengah) 
";								

$table = array(
array('Padi',2,35.00,7,1,30.00,3),
array('&emsp; Padi sawah',2,35.00,7,1,30.00,3),
array('&emsp; Padi Ladang',0,0.00,0,0,0.00,0),
array('Jagung',1851,10.84,2006,1357,17.37,2357),
array('Kedelai',0,0.00,0,0,0.00,0),
array('kacang Tanah',10,7.26,7,15,7.29,11),
array('kacang hijau',0,0.00,0,0,0.00,0),
array('Ubi Kayu',433,143.29,6205,403,195.26,7869),
array('ubi Jalar',92,87.50,805,64,61.85,396),
    
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