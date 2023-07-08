<?php


namespace app\controllers;
use app\entity\ColorDir;
use app\entity\Flowers;
use app\entity\TypeDir;
use app\models\EditFlowersForm;
use app\repository\DirRepository;
use app\repository\FlowersRepository;
use Yii;
use yii\data\ActiveDataProvider;
use \yii\web\Controller;


class FlowersController extends Controller
{
    public function actionList(){
        $dataProvider = new ActiveDataProvider([
            'query' => Flowers::find()
                ->select(['flowers.id','flowers.name', 'color_dir.name as color', 'type_dir.name as type', 'flowers.price'])
                ->LeftJoin('color_dir', 'flowers.color_id = color_dir.id')
                ->LeftJoin('type_dir', 'flowers.type_id = type_dir.id')
                ->asArray(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('list', [
            'dataProvider'=>$dataProvider
        ]);
    }


    public function actionAdd(){
        $model = new EditFlowersForm();
        $colors = DirRepository::getColors();
        $types = DirRepository::getTypes();
        $colorsArray = [];
        foreach ($colors as $color){
            $colorsArray[$color->id] = $color->name;
        }
        $typesArray = [];
        foreach ($types as $type){
            $typesArray[$type->id] = $type->name;
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            FlowersRepository::addFlower($model->name, $model->color_id, $model->type_id, $model->price);
            $this->redirect('list');
        }
        return $this->render('add', [
            'model' => $model,
            'colors' => $colorsArray,
            'types' => $typesArray,

        ]);
    }

    public function actionDelete($id){
        FlowersRepository::deleteFlower($id);
        return $this->redirect('list');
    }

    public function actionEdit($id){
        $model = new EditFlowersForm();
        $colors = DirRepository::getColors();
        $types = DirRepository::getTypes();
        $colorsArray = [];
        foreach ($colors as $color){
            $colorsArray[$color->id] = $color->name;
        }
        $typesArray = [];
        foreach ($types as $type){
            $typesArray[$type->id] = $type->name;
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            FlowersRepository::editFlower($id, $model->name, $model->color_id, $model->type_id, $model->price);
            $this->redirect('list');
        }
        $flower = FlowersRepository::getFlower($id);
        $model->name = $flower->name;
        $model->type_id = $flower->type_id;
        $model->color_id = $flower->color_id;
        $model->price = $flower->price;
        return $this->render('edit', [
            'model' => $model,
            'colors' => $colorsArray,
            'types' => $typesArray,

        ]);
    }



}