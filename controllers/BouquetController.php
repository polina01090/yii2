<?php


namespace app\controllers;


use app\entity\Bouquet;
use app\entity\Flowers;
use app\models\EditBouquetForm;
use app\repository\BouquetRepository;
use app\repository\FlowersRepository;
use Yii;
use yii\data\ActiveDataProvider;
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
            BouquetRepository::addBouquet($model->name, $model->flowers);
            $this->redirect('list');
        }
        return $this->render('create', [
            'model' => $model,
            'flowers' => $flowersArray
        ]);
    }
    public function actionDelete($id){
        FlowersRepository::deleteFlower($id);
        return $this->redirect('list');
    }
    public function actionFlower($id){
        $ids = BouquetRepository::getFlowersId($id);
        $dataProvider = new ActiveDataProvider([
            'query' => Flowers::find()
                ->select(['flowers.id','flowers.name', 'color_dir.name as color', 'type_dir.name as type', 'flowers.price'])
                ->LeftJoin('color_dir', 'flowers.color_id = color_dir.id')
                ->LeftJoin('type_dir', 'flowers.type_id = type_dir.id')
                ->where(['flowers.id' => $ids])
                ->asArray(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('flower', [
            'dataProvider'=>$dataProvider
        ]);
    }
    public function actionList(){
        $dataProvider = new ActiveDataProvider([
            'query' => Flowers::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('list', [
            'dataProvider'=>$dataProvider
        ]);
    }

}