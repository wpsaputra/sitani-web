<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/yeti/'.$id_peta.'.js',CClientScript::POS_HEAD);

$kabupaten = Kabupaten::model()->findByAttributes(array('id_peta'=>$id_peta))->kabupaten;
$id_kab = substr($kabupaten, 0, 2);
$nama_kabupaten = substr($kabupaten, 4) ;
$status_kabupaten = 'Kabupaten';
if($id_peta==7471||$id_peta==7472){
    $status_kabupaten = 'Kota';
}


$dokumen_kapital = strtoupper($dokumen);
$bulan_alfabet = MyClass::$month[$bulan];
?>

<div class="panel panel-default">
    <div class="panel-body">
        <h4><?php echo "Penerimaan Dokumen {$dokumen_kapital} {$status_kabupaten} {$nama_kabupaten}"?></h4>
        <h4><?php echo "Kondisi {$bulan_alfabet} {$tahun}"?></h4>
        <div class="row">
            <div id="world-map" class="col-md-12" style="height: 500px"></div>
            <?php
             $red = '#ff6060';
             $yellow ='#fed776';
             $green = '#1ed491';
             $grey = '#d32a0e'; //'#eeeeee';

            $kecamatanx = Kecamatan::model()->findAllByAttributes(array('id_kab'=>substr($id_peta, 2)));
            $kecamatan = CHtml::listData($kecamatanx, 'id', 'kecamatan');
            $kecamatan_peta = CHtml::listData($kecamatanx, 'id', 'id_peta');

            $knob_array = array();
            $pk = array();
            $pk_fill = array();

            $index = 1;
            foreach ($kecamatan as $kec_key=> $kec_value){
                $penimbang = Yii::app()->db->createCommand("SELECT COUNT(`kecamatan`)
								FROM `".$dokumen."` WHERE kecamatan=:kec_value AND bulan=:bulan AND MID(`identitas`, 1, 4)=:tahun")
                    ->bindValues(array(':kec_value'=>$kec_value, ':bulan'=>$bulan, ':tahun'=>$tahun))->queryScalar();
                $pembagi = Kecamatan::model()->countByAttributes(array('id'=>$kec_key));
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

                $knob_array[] = array('id'=>'knob'.$index, 'value'=>$value, 'color'=>$color, 'label'=>$kec_value);

                $pk[$kecamatan_peta[$kec_key]] = $value;
                $pk_fill[$kecamatan_peta[$kec_key]] = $color;

                $index = $index+1;
            }
            ?>

            <script>
                $(function(){
                    var pk = <?php echo CJSON::encode($pk)?>;
                    var pk_fill = <?php echo CJSON::encode($pk_fill)?>;

                    $('#world-map').vectorMap({
                        map: <?php echo "'{$id_peta}_merc'"?>,
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


