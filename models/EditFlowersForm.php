<?php

namespace app\models;

use Yii;
use yii\base\Model;


class EditFlowersForm extends Model
{
    public $name;
    public $color_id;
    public $type_id;
    public $price;

    public function rules()
    {
        return [
            [['name', 'color_id', 'type_id', 'price'], 'required', 'message' => 'Напиши хоть что-нибудь'],
            [['color_id', 'type_id', 'price'], 'integer', 'message' => 'Параметр должен быть числом'],
        ];
    }

}
