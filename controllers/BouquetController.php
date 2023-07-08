<?php


namespace app\controllers;


use app\models\EditBouquetForm;
use app\repository\FlowersRepository;
use Yii;
use yii\web\Controller;

class BouquetController extends Controller
{
    public function actionCreate(){
        $flowers = FlowersRepository::getFlowers();
        $flowersArray = [];
        foreach ($flowers as $flower){
            $flowersArray[$flower->id] = $flower->name;
        }
        $model = new EditBouquetForm();
        if ($model->load(Yii::$app->request->post()) ){
            var_dump($model);
        }
        return $this->render('create', [
            'model' => $model,
            'flowers' => $flowersArray
        ]);
    }

}