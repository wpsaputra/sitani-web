<?php

class JadwalController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
//	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}



	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		$user = array_values(CHtml::listData(User::model()->findAllByAttributes(array('role'=>1)), 'id', 'user_name'));
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'update', 'index','view'),
				'users'=>$user,
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Arc;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Arc']))
		{
			$model->attributes=$_POST['Arc'];

			$rnd = rand(0,9999);
			$csvFile=CUploadedFile::getInstance($model,'csv_link');
			$mdbFile=CUploadedFile::getInstance($model,'mdb_link');
			if($csvFile!=null){
				$fileName = "{$rnd}-{$csvFile}";  // random number + file name
				$model->csv_link = $fileName;
			}

			if($mdbFile!=null){
				$fileName = "{$rnd}-{$mdbFile}";  // random number + file name
				$model->mdb_link = $fileName;
			}

			if($model->validate()){
				if($_POST['Arc']['id_user']==9999){
					foreach($this->getUserIdArray() as $id_user){
						$model=new Arc;
						$model->attributes=$_POST['Arc'];
						$model->setAttribute('id_user', $id_user);
						$model->save(false);

					}
					$this->redirect(array('admin'));


				}else{
					if($model->save()){
						$dokumen = 'sp_padi';
						switch ($_POST['Arc']['id_tipe_dokumen']) {
							case 1:
								$dokumen = 'sp_padi';
								break;
							case 2:
								$dokumen = 'sp_palawija';
								break;
							case 3:
								$dokumen = 'sp_lahan';
								break;
						}


						if($csvFile!=null){
							$path = Yii::app()->basePath.'/../uploaded_file/'.$model->csv_link;
							$csvFile->saveAs($path);

//							Yii::app()->db->createCommand('CREATE TEMPORARY TABLE `temp_table` LIKE `'.$dokumen.'`;')->execute();
//							Yii::app()->db->createCommand('SHOW INDEX FROM `temp_table`;')->execute();
//							Yii::app()->db->createCommand('DROP INDEX `PRIMARY` ON temp_table;')->execute();
//
//
//							Yii::app()->db->createCommand('LOAD DATA INFILE :path
//								INTO TABLE `temp_table`
//								FIELDS TERMINATED BY \';\'
//								ENCLOSED BY \'"\'
//								LINES TERMINATED BY \'\n\'
//								;')->bindValues(array(':path'=>$path))->execute();
////							IGNORE 1 LINES
//
//							Yii::app()->db->createCommand('SHOW COLUMNS FROM '.$dokumen.';
//								REPLACE INTO '.$dokumen.'
//								SELECT * FROM temp_table')->execute();

							ini_set('max_execution_time', 300);
							$row = 1;
							if (($handle = fopen($path, "r")) !== FALSE) {
								while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
									$num = count($data);
//							echo "<p> $num fields in line $row: <br /></p>\n";
									$row++;

									$arr_value = array();

									$cmd = "REPLACE INTO ".$dokumen." VALUES (";
									for ($c=0; $c < $num; $c++) {
										if($c==$num-1){
											$cmd = $cmd.":data".$c;
										}else{
											$cmd = $cmd.":data".$c.", ";
										}
										$arr_value[":data".$c] = $data[$c];
//								echo $data[$c] . "<br />\n";
									}
									$cmd = $cmd.")";
									Yii::app()->db->createCommand($cmd)->bindValues($arr_value)->execute();

//							echo $cmd . "<br />\n";
								}
								fclose($handle);
							}

						}

						if($mdbFile!=null){
							$mdbFile->saveAs(Yii::app()->basePath.'/../uploaded_file/'.$model->mdb_link);
						}
						$this->redirect(array('view','id'=>$model->id));
					}



				}
			}



		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if($model->id_user!=Yii::app()->user->id){
			throw new CHttpException(403, 'You are not authorized to perform this action.');
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Arc']))
		{
			$model->attributes=$_POST['Arc'];

			$rnd = rand(0,9999);
			$csvFile=CUploadedFile::getInstance($model,'csv_link');
			$mdbFile=CUploadedFile::getInstance($model,'mdb_link');
			if($csvFile!=null){
				$fileName = "{$rnd}-{$csvFile}";  // random number + file name
				$model->csv_link = $fileName;
			}

			if($mdbFile!=null){
				$fileName = "{$rnd}-{$mdbFile}";  // random number + file name
				$model->mdb_link = $fileName;
			}

			if($csvFile!=null&&$mdbFile!=null){
				$model->tanggal_upload = date('Y-m-d');
				$model->flag = 1;
			}

			if($model->save()){
				if($csvFile!=null){
					$path = Yii::app()->basePath.'/../uploaded_file/'.$model->csv_link;
					$csvFile->saveAs($path);

					$dokumen = 'sp_padi';
					switch ($model->id_tipe_dokumen) {
						case 1:
							$dokumen = 'sp_padi';
							break;
						case 2:
							$dokumen = 'sp_palawija';
							break;
						case 3:
							$dokumen = 'sp_lahan';
							break;
					}
					

//					Yii::app()->db->createCommand('CREATE TEMPORARY TABLE `temp_table` LIKE `'.$dokumen.'`;')->execute();
//					Yii::app()->db->createCommand('SHOW INDEX FROM `temp_table`;')->execute();
//					Yii::app()->db->createCommand('DROP INDEX `PRIMARY` ON temp_table;')->execute();
//
//
//					Yii::app()->db->createCommand('LOAD DATA INFILE :path
//						INTO TABLE `temp_table`
//						FIELDS TERMINATED BY \';\'
//						ENCLOSED BY \'"\'
//						LINES TERMINATED BY \'\n\'
//						;')->bindValues(array(':path'=>$path))->execute();
//
////					IGNORE 1 LINES
//
//					Yii::app()->db->createCommand('SHOW COLUMNS FROM '.$dokumen.';
//						REPLACE INTO '.$dokumen.'
//						SELECT * FROM temp_table')->execute();

					ini_set('max_execution_time', 300);
					$row = 1;
					if (($handle = fopen($path, "r")) !== FALSE) {
						while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
							$num = count($data);
//							echo "<p> $num fields in line $row: <br /></p>\n";
							$row++;

							$arr_value = array();

							$cmd = "REPLACE INTO ".$dokumen." VALUES (";
							for ($c=0; $c < $num; $c++) {
								if($c==$num-1){
									$cmd = $cmd.":data".$c;
								}else{
									$cmd = $cmd.":data".$c.", ";
								}
								$arr_value[":data".$c] = $data[$c];
//								echo $data[$c] . "<br />\n";
							}
							$cmd = $cmd.")";
							Yii::app()->db->createCommand($cmd)->bindValues($arr_value)->execute();

//							echo $cmd . "<br />\n";
						}
						fclose($handle);
					}
				}

				if($mdbFile!=null){
					$mdbFile->saveAs(Yii::app()->basePath.'/../uploaded_file/'.$model->mdb_link);
				}

				$this->redirect(array('view','id'=>$model->id));
			}

		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Arc');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Arc('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Arc']))
			$model->attributes=$_GET['Arc'];
		
		$this->render('admin',array(
			'model'=>$model,
		));

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Arc::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='arc-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function getUserIdArray() {
		$twoDimensionalArray = Yii::app()->db->createCommand('SELECT id FROM `sm_user` WHERE `role`=1')->queryAll();
		$oneDimensionalArray = array_map('current', $twoDimensionalArray);
		return $oneDimensionalArray;
	}

}
