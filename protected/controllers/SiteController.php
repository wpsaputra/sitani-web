<?php

class SiteController extends Controller
{
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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','login','logout', 'error', 'padi', 'palawija', 'lahan', 'refreshPadi', 'refreshPalawija', 'refreshIndex', 'refreshLahan', 'lain', 'aram'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(!isset($_GET['id_peta'])){
			$id_peta = 0;
		}else{
			$id_peta = $_GET['id_peta'];
		}

		if(!isset($_GET['bulan'])){
			$bulan = (int) date("n");
		}else{
			$bulan = $_GET['bulan'];
		}

		if(!isset($_GET['tahun'])){
			$tahun = (int) date("Y");
		}else{
			$tahun = $_GET['tahun'];
		}

		if(!isset($_GET['dokumen'])){
			$dokumen = 'sp_padi';
		}else{
			$dokumen = $_GET['dokumen'];
		}

//		$this->render('index', array('id_peta'=>$id_peta));
		$this->render('index', array('dokumen'=>$dokumen, 'bulan'=>$bulan, 'tahun'=>$tahun, 'id_peta'=>$id_peta));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		$this->layout='login';

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionPadi()
	{
		if(!isset($_GET['id_kab'])){
			$id_kab = 0;
		}else{
			$id_kab = $_GET['id_kab'];
		}

		if(!isset($_GET['tahun'])){
			$tahun = (int) date("Y");
		}else{
			$tahun = $_GET['tahun'];
		}

		// 1 = panen; 2 = tanam; 3 = puso
		if(!isset($_GET['luas'])){
			$luas = 1;
		}else{
			$luas = $_GET['luas'];
		}

		$this->render('padi', array('id_kab'=>$id_kab, 'tahun'=>$tahun, 'luas'=>$luas));
	}

	public function actionLain()
	{
		if(!isset($_GET['id'])){
			$id = 1;
		}else{
			$id = $_GET['id'];
		}
		$this->render('lain', array('id'=>$id));
		// $this->render('lain');
	}

	public function actionAram()
	{
		if(!isset($_GET['id'])){
			$id = 1;
		}else{
			$id = $_GET['id'];
		}
		$this->render('aram', array('id'=>$id));
		// $this->render('lain');
	}



	
	public function actionPalawija()
	{
		if(!isset($_GET['id_kab'])){
			$id_kab = 0;
		}else{
			$id_kab = $_GET['id_kab'];
		}

		if(!isset($_GET['tahun'])){
			$tahun = (int) date("Y");
		}else{
			$tahun = $_GET['tahun'];
		}

		// 1 = panen; 2 = tanam; 3 = puso
		if(!isset($_GET['luas'])){
			$luas = 1;
		}else{
			$luas = $_GET['luas'];
		}

		// 1 = jagung; 2 = kedelai; 3 = kacang tanah; 4 = ubi kayu
		if(!isset($_GET['komoditas'])){
			$komoditas = 1;
		}else{
			$komoditas = $_GET['komoditas'];
		}

		$this->render('palawija', array('id_kab'=>$id_kab, 'tahun'=>$tahun, 'luas'=>$luas, 'komoditas'=>$komoditas));
	}

	public function actionLahan()
	{
//		$this->render('lahan');
		if(!isset($_GET['id_kab'])){
			$id_kab = 0;
		}else{
			$id_kab = $_GET['id_kab'];
		}

		if(!isset($_GET['tahun'])){
			$tahun = (int) date("Y");
		}else{
			$tahun = $_GET['tahun'];
		}

		$this->render('lahan', array('id_kab'=>$id_kab, 'tahun'=>$tahun));
	}

	public function actionRefreshPadi(){
		if(!isset($_POST['date'])){
			$tahun = (int) date("Y");
		}else{
			$tahun = $_POST['date'];
		}

		if(!isset($_POST['luas'])){
			$luas = 1;
		}else{
			$luas = (int) $_POST['luas'];
		}

		$id_kab = $_POST['id_kab'];
		if($id_kab==0){
			$this->renderPartial('_padi', array('tahun'=>$tahun, 'id_kab'=>$id_kab, 'luas'=>$luas));
		}else{
			$this->renderPartial('_padi_kec', array('tahun'=>$tahun, 'id_kab'=>$id_kab, 'luas'=>$luas));
		}

	}

	public function actionRefreshPalawija(){
		if(!isset($_POST['date'])){
			$tahun = (int) date("Y");
		}else{
			$tahun = $_POST['date'];
		}

		if(!isset($_POST['komoditas'])){
			$komoditas = 1;
		}else{
			$komoditas = (int) $_POST['komoditas'];
		}

		$id_kab = $_POST['id_kab'];
		if($id_kab==0){
			$this->renderPartial('_palawija', array('tahun'=>$tahun, 'komoditas'=>$komoditas, 'id_kab'=>$id_kab), false, false);
		}else{
			$this->renderPartial('_palawija_kec', array('tahun'=>$tahun, 'komoditas'=>$komoditas, 'id_kab'=>$id_kab), false, false);
		}

//		$this->renderPartial('_palawija', array('tahun'=>$tahun, 'komoditas'=>$komoditas), false, false);
	}

	public function actionRefreshIndex(){
		if(!isset($_POST['date'])){
			$bulan = (int) date("n");
			$tahun = (int) date("Y");
		}else{
			$month_year_array = explode(" ", $_POST['date']);
			$bulan = (int) array_search($month_year_array[0], MyClass::$month);
			$tahun = (int) $month_year_array[1];
		}

		if(!isset($_POST['dokumen'])){
			$dokumen = 'sp_padi';
		}else{
			$dokumen = $_POST['dokumen'];
		}

		$id_peta = $_POST['id_peta'];
		if($id_peta==0){
			$this->renderPartial('_index', array('dokumen'=>$dokumen, 'bulan'=>$bulan, 'tahun'=>$tahun, 'id_peta'=>$id_peta));
		}else{
			$this->renderPartial('_index_kec', array('dokumen'=>$dokumen, 'bulan'=>$bulan, 'tahun'=>$tahun, 'id_peta'=>$id_peta));
		}
	}

	public function actionRefreshLahan(){
		if(!isset($_POST['date'])){
			$tahun = (int) date("Y");
		}else{
			$tahun = $_POST['date'];
		}

		$id_kab = $_POST['id_kab'];
		if($id_kab==0){
			$this->renderPartial('_lahan', array('tahun'=>$tahun, 'id_kab'=>$id_kab));
		}else{
			$this->renderPartial('_lahan_kec', array('tahun'=>$tahun, 'id_kab'=>$id_kab));
		}

	}
}