<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var $model */

/** @var $flowers */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

\app\assets\BouquetAsset::register($this)
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <div class="form-group">
        <label for="count"></label>
        <input class="form-control" type="number" id="count" min="0" max="10">
    </div>
    <div class="form-group">
        <label>Цветы</label>
        <div class="flowers">
            <?= $form->field($model, 'flowers[]')->label(false)->dropDownList($flowers) ?>
            <?= $form->field($model, 'flowers[]')->label(false)->dropDownList($flowers) ?>
            <?= $form->field($model, 'flowers[]')->label(false)->dropDownList($flowers) ?>
        </div>

    </div>
    <div class="form-group">
        <?= Html::submitButton("Добавить") ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
