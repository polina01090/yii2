<?php


namespace app\repository;


use app\entity\Bouquet;
use app\entity\Flowers;
use app\entity\FlowersToBoquet;

class BouquetRepository
{
    public static function addBouquet($name, $flowers_id){
        $bouquet = new Bouquet();
        $bouquet->name = $name;
        $bouquet->save();
        foreach ($flowers_id as $id){
            $ftb = new FlowersToBoquet();
            $ftb->bouquet_id = $bouquet->id;
            $ftb->flower_id = $id;
            $ftb->save();
        }

    }

    public static function getFlowersId($id){
        $ids = [];
        $flowers_id = FlowersToBoquet::find()->where(['bouquet_id' => $id])->all();
        foreach ($flowers_id as $id){
            $ids[] = $id->flower_id;
        }
        return $ids;
    }

    public static function deleteFlower($id){
        Bouquet::deleteAll(['id' => $id]);
    }


}