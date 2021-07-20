<?php
namespace app\controllers;

use app\models\BalanceHistory;
use yii\rest\ActiveController;
use yii\rest\Controller;

class BalanceController extends ActiveController
{
	public $modelClass  = 'app\models\BalanceHistory';

	public function actions()
	{
		$actions = parent::actions();
//		unset($actions['delete'], $actions['create']);
//		$actions['user-balance'] = [$this,'actionUserBalance'];
		$actions['user-balance'] = [
			'class' => 'app\api\balance\UserBalanceAction',
			'modelClass' => $this->modelClass,
			'checkAccess' => [$this, 'checkAccess'],
		];

		return $actions;
	}


}