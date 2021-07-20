<?php

namespace app\commands;

use yii\console\Controller;
use app\models\BalanceHistory;

class SeedController extends Controller
{
	public function actionIndex ()
	{

		foreach ([1, 2, 3] as $userId)
		{
			$balance = 0;
			for ($i = 0; $i < 100; $i++)
			{
				$balanceRow = new BalanceHistory();
				$balanceRow->user_id    = $userId;
				$balanceRow->value      = rand ( -100, 100 );
				$balance                += $balanceRow->value;
				$balanceRow->balance    = $balance;
				$balanceRow->save();
			}
		}
	}

}

