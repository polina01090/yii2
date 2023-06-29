<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\ColorDir;

$dataProvider = new ActiveDataProvider([
    'query' => ColorDir::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name'
    ],
]);