<?php
switch ($luas) {
    case 1:
        $luas_var = '`0102`+`0107`';
        $luas_str = 'Luas Panen';
        break;
    case 2:
        $luas_var = '`0103`+`0108`';
        $luas_str = 'Luas Tanam';
        break;
    case 3:
        $luas_var = '`0104`+`0109`';
        $luas_str = 'Luas Puso/Rusak';
        break;
}

$kabupaten = Kabupaten::model()->findByPk($id_kab)->kabupaten;
$kabupaten = (substr($kabupaten, 3));

$kecamatan = Kecamatan::model()->findAllByAttributes(array('id_kab'=>$id_kab));
$kecamatan = CHtml::listData($kecamatan, 'id', 'kecamatan');
$kecs = array_values($kecamatan);

//print_r($kecamatan);
?>
<div class="panel panel-default">
    <div class="panel-body">
        <?php
        echo "
			<h5>{$luas_str} Padi (Lahan Total) Kabupaten {$kabupaten}</h5>
			<h5>Menurut Kecamatan {$tahun} (Hektar)</h5>
			";
        ?>

        <!--		0102 0107-->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Kecamatan</th>
                    <th class="text-center">Januari</th>
                    <th class="text-center">Februari</th>
                    <th class="text-center">Maret</th>
                    <th class="text-center">April</th>
                    <th class="text-center">Mei</th>
                    <th class="text-center">Juni</th>
                    <th class="text-center">Juli</th>
                    <th class="text-center">Agustus</th>
                    <th class="text-center">September</th>
                    <th class="text-center">Oktober</th>
                    <th class="text-center">November</th>
                    <th class="text-center">Desember</th>
                    <th class="text-center">Jan-Apr</th>
                    <th class="text-center">Mei-Ags</th>
                    <th class="text-center">Sep-Des</th>
                    <th class="text-center">Jan-Des</th>
                </tr>

                <tr>
                    <?php
                    for ($i = 1; $i <= 17; $i++) {
                        echo "<th class='text-center'>({$i})</th>";
                    }
                    ?>
                </tr>
                </thead>
                <tbody>

                <?php

                $data_kec = array();
                $index = 0;
                foreach ($kecs as $kec) {
                    $data_bulan = array();
                    $data_bantu = array();
                    for ($i=1; $i<=12; $i++){
                        $data = Yii::app()->db->createCommand("SELECT `kecamatan`, SUM(".$luas_var.") AS `total`
								FROM `sp_padi` WHERE kecamatan=:kec AND bulan=:bulan AND MID(`identitas`, 1, 4)=:tahun")
                            ->bindValues(array(':kec'=>$kec, ':bulan'=>$i, ':tahun'=>$tahun))->queryAll();
                        $data_bulan[] = $data;
                    }

                    $data_c1 = $data_bulan[0][0]["total"]+$data_bulan[1][0]["total"]+$data_bulan[2][0]["total"]+$data_bulan[3][0]["total"];
                    $data_c2 = $data_bulan[4][0]["total"]+$data_bulan[5][0]["total"]+$data_bulan[6][0]["total"]+$data_bulan[7][0]["total"];
                    $data_c3 = $data_bulan[8][0]["total"]+$data_bulan[9][0]["total"]+$data_bulan[10][0]["total"]+$data_bulan[11][0]["total"];
                    $data_total = $data_c1+$data_c2+$data_c3;
                    
                    echo "
						<tr>
						<td>{$kec}</td>
						<td>{$data_bulan[0][0]['total']}</td>
						<td>{$data_bulan[1][0]['total']}</td>
						<td>{$data_bulan[2][0]['total']}</td>
						<td>{$data_bulan[3][0]['total']}</td>
						<td>{$data_bulan[4][0]['total']}</td>
						<td>{$data_bulan[5][0]['total']}</td>
						<td>{$data_bulan[6][0]['total']}</td>
						<td>{$data_bulan[7][0]['total']}</td>
						<td>{$data_bulan[8][0]['total']}</td>
						<td>{$data_bulan[9][0]['total']}</td>
						<td>{$data_bulan[10][0]['total']}</td>
						<td>{$data_bulan[11][0]['total']}</td>
						<td>{$data_c1}</td>
						<td>{$data_c2}</td>
						<td>{$data_c3}</td>
						<td>{$data_total}</td>
						</tr>
						";

                    for ($i=0; $i<12; $i++){
                        $data_bantu[] = $data_bulan[$i][0]['total'];
                    }

//						$x = array_values(array_filter($data_bantu));
                    $data_kec[] = array_map(function($value){return (int)$value;}, $data_bantu);

                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div id="chart"></div>
        <?php
//        $calendar = cal_info(0)['months'];
        $calendar = MyClass::$month;
        $calendar = array_values(array_filter($calendar));

        $series = array();
        for($i=0; $i<count($kecs); $i++){
            $x = array('name'=>$kecs[$i], 'data'=>$data_kec[$i]);
            $series[] = $x;
        }

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/yeti/highcharts.js',CClientScript::POS_HEAD);
        ?>

        <script type="text/javascript">
            $("#chart").highcharts({
                title:{
                    text: <?php echo "'{$luas_str} Padi Per Kecamatan di Kabupaten {$kabupaten} ".$tahun."'"; ?>
                },
                xAxis:{
                    categories: [
                        <?php echo "'" . implode("','", $calendar) . "'"; ?>
                    ],
                },
                yAxis:{
                    title: 'Luas Panen (Ha)'
                },
                series: <?php echo CJSON::encode($series);?>,
                credits: false
            });

        </script>
    </div>
</div>