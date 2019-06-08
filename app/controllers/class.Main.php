<?php
	
	/**
	* 
	*/

	class Main extends Controller
	{
		public function actionHome()
		{
			// Helper::debug($param);
			echo 'Main APP';
		}

		public function actionProfile($param)
		{
			// $this->model->funct(321);
			Helper::debug($param);
			echo 'Profile APP';
		}

		public function actionLogin($param)
		{
			Helper::debug($param);
			echo 'Login APP';
		}
	}

?>