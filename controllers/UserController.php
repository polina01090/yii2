<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionProfile(){
        $user = \Yii::$app->user->identity;
        return $this->render("profile", [
            'user' => $user
        ]);
    }
}