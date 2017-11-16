<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
//$kabupaten = Kabupaten::model()->findByPk($id_kab)->kabupaten;
//$kabupaten = (substr($kabupaten, 3));
//
//$kecamatan = Kecamatan::model()->findAllByAttributes(array('id_kab'=>$id_kab));
//$kecamatan = CHtml::listData($kecamatan, 'id', 'kecamatan');
//$kecs = array_values($kecamatan);
$bulan = 8;
$tahun = 2016;
$dokumen = 'sp_padi';

$red = '#d32a0e';
$yellow ='#e99002';
$green = '#43ac6a';
$grey = '#eee';

$kabupaten = Kabupaten::model()->findAll();
$kabupaten = CHtml::listData($kabupaten, 'id', 'kabupaten');
//print_r($kabupaten);


?>

<h2>Monitoring SIMON</h2>
<div class="alert alert-dismissible alert-info">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Heads up!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<h4>Progress Penerimaan Dokumen SIMTP BPS Sultra</h4>
		<h4>Kondisi Agustus 2016</h4>
		<div class="row">
			<div id="world-map" class="col-md-8" style="height: 400px"></div>
			<?php

			$kab_peta = Kabupaten::model()->findAll();
			$kab_peta = CHtml::listData($kab_peta, 'id', 'id_peta');
			$kab_peta = array_values($kab_peta);

			?>

			<script>
				$(function(){
					var pk = {"7401": 35.00,"7402": 100.00,"7403": 100.00,"7404": 100.00,"7405": 100.00,"7406": 100.00,"7407": 100.00,"7408": 100.00,"7409": 100.00,"7410": 100.00,"7411": 100.00,"7412": 100.00,"7413": 100.00,"7414": 100.00,"7415": 100.00,"7471": 100.00,"7472": 100.00};
					var pk_fill = {"7401": "#f39c12","7402": "#dd4b39","7403": "#dd4b39","7404": "#00a65a","7405": "#dd4b39","7406": "#f39c12","7407": "#dd4b39","7408": "#f39c12","7409": "#00a65a","7410": "#00a65a","7411": "#00a65a","7412": "#00a65a","7413": "#00a65a","7414": "#00a65a","7415": "#f39c12","7471": "#00a65a","7472": "#f39c12"};

					$('#world-map').vectorMap({
//						map: 'POLY74_mill_en',
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
//                                    onRegionClick: function(e, pk) {
//                                        window.location.href = pk_url[pk];
//
//                                    }
					});


				});
			</script>

			<div class="col-md-4">
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
		<h4>Persentase Penerimaan Dokumen SIMTP Berdasarkan Kabupaten/Kota</h4>
		<h4>Tahun 2016</h4>
		<?php
			$index = 1;
			foreach ($kabupaten as $kab_key=>$kab_value){
				if($index%4==3){
					echo "<div class=\"row\">";
				}

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

				echo MyClass::createKnob('knob'.$index, $value, $color, $kab_value);

				if($index%4==0){
					echo "</div>";
				}

				$index = $index+1;

			}

		?>


		<div class="row">



		</div>

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
		<h4>Persentase Penerimaan Dokumen SIMTP Seluruh Provinsi SULTRA</h4>
		<h4>Tahun 2016</h4>
		<div class="row">
			<?php echo MyClass::createKnob('knob_prov', $value, $color, 'BPS Provinsi SULTRA');?>
		</div>
	</div>
</div>

