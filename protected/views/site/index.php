<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
//$bulan = 8;
//$tahun = 2016;
//$dokumen = 'sp_padi';

?>

<h2>Monitoring SIMON</h2>
<div class="alert alert-dismissible alert-info">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Selamat Datang!</strong> Gunakan menu home untuk melihat progress pemasukan dokumen, menu input data untuk upload dokumen, dan tabulasi untuk melihat
	report dokumen SIMTP. Jika menemukan error atau masalah segera hubungi <a href="mailto:wayan.saputra@bps.go.id?Subject=SIMON">Admin</a>
</div>

<div class="row" style="margin-bottom: 10px">
	<div class="col-md-12">
		<form id="myForm" class="form-inline pull-right">

			<div class="form-group">
				<?php
				Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/ui/custom/jquery-ui-1.9.2.custom.min.js',CClientScript::POS_HEAD);
				Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/ui/custom/jquery-ui-1.9.2.custom.css');

//				'sp_lahan'=>'SP Lahan'
				echo CHtml::dropDownList('dokumen',$dokumen, array('sp_padi'=>'SP Padi', 'sp_palawija'=>'SP Palawija'),
					array(
						'class'=>'form-control', 'style'=>'width: auto;'
					)
				);
				?>
			</div>

			<div class="form-group">
				<div class="input-group pull-right" style="width: 10px;">
					<span class="input-group-addon"><i class="fa fa-calendar  fa-fw"></i></span>

					<?php
					echo CHtml::textField('date', date('F Y', strtotime($tahun."-".$bulan."-1")),
						array(
							'class'=>'form-control', 'style'=>'width: 150px;'
						)
					);
					?>
				</div>
			</div>

			<div class="form-group">
				<button id="search" type="button" class="btn btn-default"><i class="fa fa-search fa-fw"></i></button>
			</div>

		</form>
	</div>
</div>

<div id="reload">
	<?php
	if(!isset($tahun)){
		$tahun = (int) date("Y");
	}

	if(!isset($bulan)){
		$bulan = (int) date("n");
	}

	if(!isset($dokumen)){
		$dokumen = 'sp_padi';
	}

	if($id_peta==0){
		$this->renderPartial('_index', array('dokumen'=>$dokumen, 'bulan'=>$bulan, 'tahun'=>$tahun, 'id_peta'=>$id_peta));
	}else{
		$this->renderPartial('_index_kec', array('dokumen'=>$dokumen, 'bulan'=>$bulan, 'tahun'=>$tahun, 'id_peta'=>$id_peta));
	}

//	$this->renderPartial('_index', array('dokumen'=>$dokumen, 'bulan'=>$bulan, 'tahun'=>$tahun));

	?>
</div>


<div id="divLoading" class="">
	<div class="cssload-tetrominos">
		<div class="cssload-tetromino cssload-box1"></div>
		<div class="cssload-tetromino cssload-box2"></div>
		<div class="cssload-tetromino cssload-box3"></div>
		<div class="cssload-tetromino cssload-box4"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#date').datepicker({
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			dateFormat: 'MM yy',
			onClose: function(dateText, inst) {
				$(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
			}
		});

		$("#search").click(function () {
			var x = $('#myForm').serialize()+ '&id_peta=' + <?php echo "'".$id_peta."';"?>;
			$.ajax({
				url: <?php echo "'".CHtml::normalizeUrl(array('site/refreshIndex'))."'"?>,
				cache: false,
				data: x,
				type: 'POST',
				error: function () {
					alert('Error has occured');
					$("#divLoading").removeClass("show");
				},
				success: function (html) {
					$("#divLoading").removeClass("show");
					$("#reload").html(html);
				},
				beforeSend: function () {
					$("#divLoading").addClass("show");
				}

			});
			return false;
		});


	});

</script>