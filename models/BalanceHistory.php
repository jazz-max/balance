<?php


namespace app\models;


class BalanceHistory extends \yii\db\ActiveRecord
{
	public function __toString ()
	{
		return "{$this->id} {$this->created_at} {$this->user_id} {$this->value} {$this->balance}";
	}

}