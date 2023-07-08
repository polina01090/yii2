<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var $model */
/** @var $colors */
/** @var $types */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'color_id')->dropDownList($colors) ?>
    <?= $form->field($model, 'type_id')->dropDownList($types) ?>
    <?= $form->field($model, 'price')->input('number') ?>

    <div class="form-group">
        <?= Html::submitButton("редактировать") ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
