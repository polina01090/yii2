<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\ColorDir;
use yii\helpers\Html;

echo HTML::a('Добавить цветок', ['flowers/add']);
/** @var ActiveDataProvider $dataProvider */
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'color',
        'type',
        'price',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{edit} {delete}',
            'buttons' => [
                'edit' => function ($url, $model, $key) {
                    return HTML::a('редактировать', [
                        'edit',
                        'id' => $key
                    ]);
                },
                'delete' => function ($url, $model, $key) {
                    return HTML::a('удалить', [
                        'delete',
                        'id' => $key
                    ]);
                }
            ]
        ],

    ],
]);