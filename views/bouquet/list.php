<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

echo HTML::a('Добавить цветок', ['bouquet/create']);
/** @var ActiveDataProvider $dataProvider */
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{edit} {delete}',
            'buttons' => [
                'delete' => function ($url, $model, $key) {
                    return HTML::a('удалить', [
                        'delete',
                        'id' => $key
                    ]);
                },
                'flowers' => function ($url, $model, $key) {
                    return HTML::a('просмотреть', [
                        'flower',
                        'id' => $key
                    ]);
                }

            ]
        ],

    ],
]);