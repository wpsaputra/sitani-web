<?php

$dokumen_kapital = strtoupper($dokumen);
$bulan_alfabet = MyClass::$month[$bulan];
?>

<div class="panel panel-default">
    <div class="panel-body">
        <h4><?php echo "Penerimaan Dokumen {$dokumen_kapital} BPS Sultra"?></h4>
        <h4><?php echo "Kondisi {$bulan_alfabet} {$tahun}"?></h4>
        <div class="row">
            <div id="world-map" class="col-md-8" style="height: 400px"></div>
            <?php
            $red = '#d32a0e';
            $yellow ='#e99002';
            $green = '#43ac6a';
            $grey = '#d32a0e'; //'#eeeeee';

            $kabupatenx = Kabupaten::model()->findAll();
            $kabupaten = CHtml::listData($kabupatenx, 'id', 'kabupaten');
            $kabupaten_peta = CHtml::listData($kabupatenx, 'id', 'id_peta');

            $knob_array = array();
            $pk = array();
            $pk_fill = array();
            $pk_url = array();

            $index = 1;
            foreach ($kabupaten as $kab_key=>$kab_value){
                $penimbang = Yii::app()->db->createCommand("SELECT COUNT(`kecamatan`)
								FROM `".$dokumen."` WHERE kabupaten=:kab_value AND bulan=:bulan AND MID(`identitas`, 1, 4)=:tahun")
                    ->bindValues(array(':kab_value'=>$kab_value, ':bulan'=>$bulan, ':tahun'=>$tahun))->queryScalar();
                $pembagi = Kecamatan::model()->countByAttributes(array('id_kab'=>$kab_key));
                $value = round($penimbang/$pembagi*100, 2);
                if($value==0){
                    $color = $grey;
                }elseif($value==100){
                    $color = $green;
                }elseif($value<=50){
                    $color = $red;
                }
                else{
                    $color = $yellow;
                }

                $knob_array[] = array('id'=>'knob'.$index, 'value'=>$value, 'color'=>$color, 'label'=>$kab_value);

                $pk[$kabupaten_peta[$kab_key]] = $value;
                $pk_fill[$kabupaten_peta[$kab_key]] = $color;
                $pk_url[$kabupaten_peta[$kab_key]] = CHtml::normalizeUrl(array('site/index', 'dokumen'=>$dokumen, 'id_peta'=>$kabupaten_peta[$kab_key], 'bulan'=>$bulan, 'tahun'=>$tahun));

                $index = $index+1;
            }
            ?>

            <script>
                $(function(){
                    var pk = <?php echo CJSON::encode($pk)?>;
                    var pk_fill = <?php echo CJSON::encode($pk_fill)?>;
                    var pk_url = <?php echo CJSON::encode($pk_url)?>;

                    $('#world-map').vectorMap({
                        map: '7400_merc',
                        backgroundColor:'#FFFFF',
                        regionStyle: {
                            initial: {
                                stroke: 'gray',
                                "stroke-width": 0
                            }
                        },
                        series: {
                            regions: [{
                                values: pk_fill,
                                attribute: 'fill'
                            }]
                        },
                        onRegionTipShow: function(e, el, code){
                            el.html(el.html()+' ('+pk[code]+' %)');
                        },
                        onRegionClick: function(e, pk) {
                            window.location.href = pk_url[pk];
                        }
                    });
                });
            </script>

            <div class="col-md-4 hide">
                <h4>Informasi Tambahan</h4>
                <div class="col-md-12">
                    <i class="fa fa-arrow-right fa-lg fa" aria-hidden="true"></i>
                    Total luas lahan pertanian = 100 km<sup>2</sup>
                </div>
                <div class="col-md-12">
                    <i class="fa fa-arrow-right fa-lg fa" aria-hidden="true"></i>
                    Total hasil panen = 100 ton
                </div>

                <div class="col-md-12">
                    <i class="fa fa-arrow-right fa-lg fa" aria-hidden="true"></i>
                    Total penerimaan dokumen provinsi SULTRA = 70%
                </div>

            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <h4><?php echo "Persentase Penerimaan Dokumen {$dokumen_kapital} Berdasarkan Kabupaten/Kota"?></h4>
        <h4><?php echo "{$bulan_alfabet} {$tahun}"?></h4>
        <?php
        $index = 1;
        foreach ($knob_array as $knob){
            if($index%4==3){
                echo "<div class=\"row\">";
            }

            echo MyClass::createKnob($knob['id'], $knob['value'], $knob['color'], $knob['label']);

            if($index%4==0){
                echo "</div>";
            }

            $index = $index+1;
        }
        ?>

    </div>
</div>

<?php

$penimbang = Yii::app()->db->createCommand("SELECT COUNT(`kecamatan`)
								FROM `".$dokumen."` WHERE bulan=:bulan AND MID(`identitas`, 1, 4)=:tahun")
    ->bindValues(array(':bulan'=>$bulan, ':tahun'=>$tahun))->queryScalar();
$pembagi = Kecamatan::model()->count();
//echo $penimbang." ".$pembagi;
$value = round($penimbang/$pembagi*100, 2);
//$value = 100;
if($value==0){
    $color = $grey;
}elseif($value==100){
    $color = $green;
}elseif($value<=50){
    $color = $red;
}
else{
    $color = $yellow;
}
?>
<div class="panel panel-default">
    <div class="panel-body">
        <h4><?php echo "Persentase Penerimaan Dokumen {$dokumen_kapital} Seluruh Provinsi SULTRA"?></h4>
        <h4><?php echo "{$bulan_alfabet} {$tahun}"?></h4>
        <div class="row">
            <?php echo MyClass::createKnob('knob_prov', $value, $color, 'BPS Provinsi SULTRA');?>
        </div>
    </div>
</div>

