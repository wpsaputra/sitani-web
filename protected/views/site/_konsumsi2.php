<?php
$title = "
Produksi dan konsumsi Padi Palawija Kabupaten Buton menurut Jenis Tanaman (Buton Tengah)
";								

$table = array(
array('Padi',7,'-',3,'',''),
array('Padi sawah',7,'-',3,'',''),
array('Padi Ladang',0,'-',0,'',''),
array('Beras',4,'-',2, 8592,'Konsumsi beras dan beras ketan'),
array('Jagung',2006,'-',2357,  147,''),
array('Kedelai',0,'-',0,0,''),
array('kacang Tanah',7,'-',11,  1,''),
array('kacang hijau',0,'-',0,0.1,''),
array('Ubi Kayu',6205,'-',7869,  686,'Konsumsi ubi basah dan gaplek'),
array('ubi Jalar',805,'-',396,  16,''),
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