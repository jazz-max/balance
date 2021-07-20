<?php


namespace app\controllers;


use app\models\BalanceHistory;

class JrpcController extends \JsonRpc2\Controller
{
	// можно конечно придумать регекспы и пр замены но так надежнее
	protected static $method2action
		= [
			"balance.history"     => "balance-history",
			"balance.userBalance" => "balance-user-balance",
		];


	public function actionIndex ()
	{
		return 0;
	}

	public function actionBalanceUserBalance ($user_id = 0)
	{

		return BalanceHistory::find ()
			->where ( ['user_id' => $user_id] )
			->orderBy ( ['created_at' => SORT_DESC, 'id' => SORT_DESC] )
			->limit ( 1 )
			->one () ; //  тут можно встроить обработку ситуации есл ине найдено
	}

	public function actionBalanceHistory ($user_id, $limit)
	{
		$user_id = (int) $user_id;
		$limit   = (int) $limit;
		if ($user_id == 0 )
		{
			return BalanceHistory::find ()
				->orderBy ( ['created_at' => SORT_DESC, 'id' => SORT_DESC] )
				->limit ( $limit )
				->all ();
		}
		else {
			return BalanceHistory::find ()
				->where(["user_id"=>$user_id])
				->orderBy ( ['created_at' => SORT_DESC, 'id' => SORT_DESC] )
				->limit ( $limit )
				->all (); //  тут можно встроить обработку ситуации есл ине найдено
		}
	}

	public function createAction ($id)
	{
		$id = @self::$method2action[$id] ?: $id;

		return parent::createAction ( $id );
	}


}