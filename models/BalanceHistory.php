<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * @property mixed|null id
 * @property mixed|null created_at
 * @property mixed|null user_id
 * @property mixed|null value
 * @property mixed|null balance
 */
class BalanceHistory extends ActiveRecord
{
	public function __toString ()
	{
		return "{$this->id} {$this->created_at} {$this->user_id} {$this->value} {$this->balance}";
	}

}