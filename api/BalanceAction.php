<?php
namespace app\api;

use app\models\BalanceHistory;
use yii\rest\Action;

class BalanceAction extends Action
{
	/**
	 * Displays a last balance row for user .
	 *
	 * @param string $id user_id
	 *
	 * @return \yii\db\ActiveRecordInterface the model being displayed
	 * @throws \yii\web\NotFoundHttpException
	 */
	public function run ($id)
	{
		/*$model = $this->findModel ( ["user_id" => $id] );
		if ($this->checkAccess)
		{
			call_user_func ( $this->checkAccess, $this->id, $model );
		}

		return $model;*/

		return BalanceHistory::find ()
			->where ( ['user_id' => $id] )
			->orderBy ( ['created_at' => SORT_DESC, 'id'=>SORT_DESC] )
			->limit(1)
			->one ();
	}
}
