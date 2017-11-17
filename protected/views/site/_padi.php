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
?>
<div class="panel panel-default">
    <div class="panel-body">
        <?php
        echo "
			<h5>{$luas_str} Padi (Lahan Total) Provinsi Sulawesi Tenggara</h5>
			<h5>Menurut Kabupaten/Kota {$tahun} (Hektar)</h5>
			";
        ?>

        <!--		0102 0107 PANEN-->
        <!--        0103 0108 Tanam-->
        <!--        0104 0109 Puso/Rusak-->

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Kabupaten/Kota</th>
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
                $kabupaten = Yii::app()->db->createCommand("SELECT DISTINCT(`kabupaten`) AS `kabupaten` FROM `sm_kabupaten` ORDER by `kabupaten` ASC")->queryAll();
                $id_kab = Yii::app()->db->createCommand("SELECT DISTINCT(`id`) AS `id` FROM `sm_kabupaten` ORDER by `kabupaten` ASC")->queryAll();

                $kecs= MyClass::toArray($kabupaten);
                $id_kabs = MyClass::toArray($id_kab);

                $data_kab = array();
                $index = 0;
                foreach ($kecs as $kab) {
                    $data_bulan = array();
                    $data_bantu = array();
                    for ($i=1; $i<=12; $i++){
                        $data = Yii::app()->db->createCommand("SELECT `kabupaten`, SUM(".$luas_var.") AS `total`
								FROM `sp_padi` WHERE kabupaten=:kab AND bulan=:bulan AND MID(`identitas`, 1, 4)=:tahun")
                            ->bindValues(array(':kab'=>$kab, ':bulan'=>$i, ':tahun'=>$tahun))->queryAll();
                        $data_bulan[] = $data;
                    }

                    $data_c1 = $data_bulan[0][0]["total"]+$data_bulan[1][0]["total"]+$data_bulan[2][0]["total"]+$data_bulan[3][0]["total"];
                    $data_c2 = $data_bulan[4][0]["total"]+$data_bulan[5][0]["total"]+$data_bulan[6][0]["total"]+$data_bulan[7][0]["total"];
                    $data_c3 = $data_bulan[8][0]["total"]+$data_bulan[9][0]["total"]+$data_bulan[10][0]["total"]+$data_bulan[11][0]["total"];
                    $data_total = $data_c1+$data_c2+$data_c3;
                    
                    $link = CHtml::link($kab,array('site/padi',
                        'id_kab'=>$id_kabs[$index], 'tahun'=>$tahun, 'luas'=>$luas));
                    echo "
						<tr>
						<td>{$link}</td>
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
                    $data_kab[] = array_map(function($value){return (int)$value;}, $data_bantu);

                    $index = $index+1;
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
        for($i=0; $i<17; $i++){
            $x = array('name'=>$kecs[$i], 'data'=>$data_kab[$i]);
            $series[] = $x;
        }

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/yeti/highcharts.js',CClientScript::POS_HEAD);
        ?>

        <script type="text/javascript">
            $("#chart").highcharts({
                title:{
                    text: <?php echo "'{$luas_str} Padi Per Kabupaten SULTRA ".$tahun."'"; ?>
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