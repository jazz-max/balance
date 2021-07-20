<?php

use yii\helpers\Html;
?>
<h2>user_id: <?= Html::encode( $userId );?></h2>
<h2>Истоия</h2>
<ul>
<?php foreach ($history as $row): ?>
    <li>
        <?= Html::encode("{$row->created_at} {$row->value} {$row->balance}") ?>
    </li>
<?php endforeach; ?>
</ul>
