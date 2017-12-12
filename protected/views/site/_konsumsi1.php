<?php
$title = "
Produksi dan konsumsi Padi Palawija Kabupaten Buton menurut Jenis Tanaman (Buton)
";								

$table = array(
array('Padi', 9861,'-', 6770,'-',''),
array('Padi sawah', 5160,'-', 2996,'-',''),
array('Padi Ladang', 4701,'-', 3774,'-',''),
array('Beras', 6187, 11444, 4247,9647, 'Konsumsi beras dan beras ketan'),
array('Jagung', 7208,  291, 4908,520,''),
array('Kedelai',  68,0,  40,0,''),
array('kacang Tanah',  55,0,  109,6,''),
array('kacang hijau',  95,0,  149,14,''),
array('Ubi Kayu', 17565,  620, 16135,1551, 'Konsumsi ubi basah dan gaplek'),
array('ubi Jalar', 5300,  75, 3118,110,''),
    
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
                    <th colspan="2" class="text-center">2016</th>
                    <th colspan="2" class="text-center">2017</th>
                    <th rowspan="2" class="text-center">Keterangan</th>
                </tr>
				
				<tr>
                    <th class="text-center">Produksi (Ton)</th>
                    <th class="text-center">Konsumsi (Ton)</th>
                    <th class="text-center">Produksi (Ton)*</th>
                    <th class="text-center">Konsumsi (Ton)**</th>
                </tr>

                <tr>
                    <?php
                    for ($i = 1; $i <= 6; $i++) {
                        echo "<th class='text-center'>({$i})</th>";
                    }
                    ?>
                </tr>
                </thead>
                <tbody>

				<?php
					for($row=0; $row<10; $row++){
						echo "<tr>";
						for($col=0; $col<6; $col++){
							echo "<td>".$table[$row][$col]."</td>";

						}
						echo "</tr>";
					}

				?>
                </tbody>
            </table>
        </div>
        <p>* ARAM II 2017</p>
        <p>** Susenas Maret 2017</p>
    </div>
</div>