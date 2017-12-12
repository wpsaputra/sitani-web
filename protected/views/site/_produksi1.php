<?php
$title = "
Produksi Padi Palawija Kabupaten Buton menurut Jenis Tanaman (Buton) 
";								

$table = array(
array('Padi',3570,27.62,9861,2523,26.84,6770),
array('&emsp; Padi sawah',1660,31.09,5160,972,30.83,2996),
array('&emsp; Padi Ladang',1910,24.61,4701,1551,24.33,3774),
array('Jagung',1909,37.77,7208,1337,36.71,4908),
array('Kedelai',72,9.54,68,35,9.85,40),
array('kacang Tanah',77,7.13,55,143,7.65,109),
array('kacang hijau',117,8.10,95,171,8.73,149),
array('Ubi Kayu',796,220.67,17565,468,344.77,16135),
array('ubi Jalar',249,212.86,5300,200,155.91,3118),
    
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