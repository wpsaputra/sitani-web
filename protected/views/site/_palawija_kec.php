<?php
switch ($komoditas) {
    case 1:
        $a = '0102';
        $b = '0109';
        $nama_komoditas = 'Jagung';
        break;
    case 2:
        $a = '0702';
        $b = '0709';
        $nama_komoditas = 'Kedelai';
        break;
    case 3:
        $a = '1002';
        $b = '1009';
        $nama_komoditas = 'Kacang Tanah';
        break;
    case 4:
        $a = '1102';
        $b = '1109';
        $nama_komoditas = 'Ubi Kayu';
        break;
}

$kabupaten = Kabupaten::model()->findByPk($id_kab)->kabupaten;
$kabupaten = (substr($kabupaten, 3));

$kecamatan = Kecamatan::model()->findAllByAttributes(array('id_kab'=>$id_kab));
$kecamatan = CHtml::listData($kecamatan, 'id', 'kecamatan');
$kecs = array_values($kecamatan);
?>

<div class="panel panel-default">
    <div class="panel-body">
        <h5>Luas Panen <?php echo $nama_komoditas." (Lahan Total) Kabupaten {$kabupaten}";?> </h5>
        <h5>Menurut Kecamatan <?php echo $tahun." ";?> (Hektar)</h5>

        <!--		jagung 0102 0109-->
        <!--		kedelai 0702 0709-->
        <!--		kacang tanah 1002 1009-->
        <!--		ubi kayu 1102 1109-->
        <!--		14-20-->

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
//                $kabupaten = Yii::app()->db->createCommand("SELECT DISTINCT(`kabupaten`) AS `kabupaten` FROM `sm_kabupaten` ORDER by `kabupaten` ASC")->queryAll();
//                $id_kab = Yii::app()->db->createCommand("SELECT DISTINCT(`id`) AS `id` FROM `sm_kabupaten` ORDER by `kabupaten` ASC")->queryAll();
//
//                $kabs= MyClass::toArray($kabupaten);
//                $id_kabs = MyClass::toArray($id_kab);

                $data_kec = array();
                $index = 0;
                foreach ($kecs as $kec) {
                    $data_bulan = array();
                    $data_bantu = array();
                    for ($i=1; $i<=12; $i++){
                        $data = Yii::app()->db->createCommand("SELECT `kecamatan`, SUM(`".$a."`+`".$b."`) AS `total`
								FROM `sp_palawija` WHERE kecamatan=:kec AND bulan=:bulan AND MID(`identitas`, 1, 4)=:tahun")
                            ->bindValues(array(':kec'=>$kec, ':bulan'=>$i, ':tahun'=>$tahun))->queryAll();
                        $data_bulan[] = $data;
                    }
//						print_r($data_bulan);
//						echo "<br/><br/>";

                    $data_c1 = $data_bulan[0][0]["total"]+$data_bulan[1][0]["total"]+$data_bulan[2][0]["total"]+$data_bulan[3][0]["total"];
                    $data_c2 = $data_bulan[4][0]["total"]+$data_bulan[5][0]["total"]+$data_bulan[6][0]["total"]+$data_bulan[7][0]["total"];
                    $data_c3 = $data_bulan[8][0]["total"]+$data_bulan[9][0]["total"]+$data_bulan[10][0]["total"]+$data_bulan[11][0]["total"];
                    $data_total = $data_c1+$data_c2+$data_c3;

//                    $link = CHtml::link($kec,array('site/palawija',
//                        'id_kab'=>$id_kabs[$index]));
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

//                    $index = $index+1;

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
                    text: <?php echo "'Luas Panen ".$nama_komoditas." Per Kecamatan di Kabupaten {$kabupaten} ".$tahun."'"; ?>
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

