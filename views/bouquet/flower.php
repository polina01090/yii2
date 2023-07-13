<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\ColorDir;
use yii\helpers\Html;

/** @var ActiveDataProvider $dataProvider */
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'color',
        'type',
        'price'
    ],
]);