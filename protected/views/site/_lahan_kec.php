<?php
$kabupatenx = Kabupaten::model()->findByPk($id_kab)->kabupaten;
$kabupaten = (substr($kabupatenx, 3));

$kecamatan = Kecamatan::model()->findAllByAttributes(array('id_kab'=>$id_kab));
$kecamatan = CHtml::listData($kecamatan, 'id', 'kecamatan');
$kecs = array_values($kecamatan);

//print_r($kecamatan);
?>

<div class="panel panel-default">
    <div class="panel-body">
        <?php echo "<h5>Luas Penggunaan Lahan Sawah Kabupaten {$kabupaten}</h5>";?>
        <?php echo "<h5>Menurut Kecamatan {$tahun} (Hektar)</h5>"?>

        <!--		11T6, 12T, R2, RTOTAL-->
        <!--		NEED ADD TAHUN-->

        <?php
        $data =  Yii::app()->db->createCommand("SELECT DISTINCT(`kabupaten`) AS `kabupaten` FROM `sm_kabupaten` ORDER by `kabupaten` ASC")->queryAll();
        $id_kabs =  Yii::app()->db->createCommand("SELECT DISTINCT(`id`) AS `id` FROM `sm_kabupaten` ORDER by `kabupaten` ASC")->queryAll();

        $rs= MyClass::toArray($data);
        $id_kabs = MyClass::toArray($id_kabs);

        $sum = Yii::app()->db->createCommand("SELECT `kecamatan`, SUM(`11T6`), SUM(`12T`), SUM(`R2`), 
					SUM(`Rtotal`) FROM `sp_lahan` WHERE kabupaten=:kab")->bindValues(array(':kab'=>$kabupatenx))->queryRow();

        ?>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th rowspan="2" class="text-center">Kecamatan</th>
                    <th colspan="3" class="text-center">Penggunaan Lahan</th>
                    <th rowspan="2" class="text-center">Total Luas Lahan</th>
                </tr>


                <tr>
                    <th class="text-center">Sawah</th>
                    <th class="text-center">Pertanian Bukan Sawah</th>
                    <th class="text-center">Bukan Pertanian</th>
                </tr>

                <tr>
                    <th class="text-center">(1)</th>
                    <th class="text-center">(2)</th>
                    <th class="text-center">(3)</th>
                    <th class="text-center">(4)</th>
                    <th class="text-center">(5)</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $index = 0;
                foreach ($kecs as $item){
                    $data = Yii::app()->db->createCommand("SELECT `kecamatan`, SUM(`11T6`), SUM(`12T`), SUM(`R2`),
							SUM(`Rtotal`) FROM `sp_lahan` WHERE kecamatan =:kec AND MID(`identitas`, 1, 4)=:tahun")->bindValues(array(':kec'=>$item, ':tahun'=>$tahun))->queryRow();

                    echo "
						<tr>
						<td>{$item}</td>
						<td>{$data['SUM(`11T6`)']}</td>
						<td>{$data['SUM(`12T`)']}</td>
						<td>{$data['SUM(`R2`)']}</td>
						<td>{$data['SUM(`Rtotal`)']}</td>
						</tr>
						";

                    $index++;
                }

                echo "
					<tr>
					<th>Jumlah</th>
					<th>{$sum['SUM(`11T6`)']}</th>
					<th>{$sum['SUM(`12T`)']}</th>
					<th>{$sum['SUM(`R2`)']}</th>
					<th>{$sum['SUM(`Rtotal`)']}</th>
					</tr>
					
					";

                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>