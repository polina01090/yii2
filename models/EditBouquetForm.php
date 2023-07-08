<?php

namespace app\models;

use Yii;
use yii\base\Model;


class EditBouquetForm extends Model
{
    public $name;
    public $flowers;

    public function rules()
    {
        return [
            [['name', 'flowers'], 'required', 'message' => 'Напиши хоть что-нибудь'],
        ];
    }

}
