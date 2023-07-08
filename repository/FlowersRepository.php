<?php


namespace app\repository;


use app\entity\Flowers;

class FlowersRepository
{
    public static function getFlower($id){
        return Flowers::find()->where(['id' => $id])->one();
    }
    public static function getFlowers(){
        return Flowers::find()->all();
    }
    public static function addFlower($name, $color_id, $type_id, $price){
        $flowers = new Flowers();
        $flowers->name = $name;
        $flowers->color_id = $color_id;
        $flowers->type_id = $type_id;
        $flowers->price = $price;
        $flowers->save();
    }

    public static function deleteFlower($id){
        Flowers::deleteAll(['id' => $id]);
    }

    public static function editFlower($id, $name, $color_id, $type_id, $price){
        $color = Flowers::find()->where(['id' => $id])->one();
        $color->name = $name;
        $color->color_id = $color_id;
        $color->type_id = $type_id;
        $color->price = $price;
        $color->save();
    }

}