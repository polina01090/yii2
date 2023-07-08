<?php


namespace app\repository;


use app\entity\ColorDir;
use app\entity\TypeDir;

class DirRepository
{
    public static function getColorDirById($id){
        return ColorDir::findOne(['id' => $id]);
    }
    public static function getTypeDirById($id){
        return TypeDir::findOne(['id' => $id]);
    }
    public static function getColors(){
        return ColorDir::find()->all();
    }
    public static function getTypes(){
        return TypeDir::find()->all();
    }
    public static function editColorDir($id, $name){
        $color = ColorDir::findOne(['id' => $id]);
        $color->name = $name;
        $color->save();
    }
    public static function editTypeDir($id, $name){
        $color = TypeDir::findOne(['id' => $id]);
        $color->name = $name;
        $color->save();
    }
    public static function addColorDir($name){
        $color = new ColorDir();
        $color->name = $name;
        $color->save();
        return $color->id;
    }
    public static function addTypeDir($name){
        $color = new TypeDir();
        $color->name = $name;
        $color->save();
        return $color->id;
    }
    public static function deleteColorDir($id){
        ColorDir::deleteAll(['id' => $id]);
    }
    public static function deleteTypeDir($id){
        TypeDir::deleteAll(['id' => $id]);
    }
}