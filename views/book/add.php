<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>Update</h1>
<?php $form=ActiveForm::begin();?>
    <?= $form->field($model, 'bookname') ?>
    <?= $form->field($model, 'author') ?>
    <?= $form->field($model, 'borrower') ?>
    <?= $form->field($model, 'lendtime') ?>
    <?= $form->field($model, 'returntime') ?>
    <?= $form->field($model, 'times') ?>

    <div class="form-group">
        <?=Html::submitButton('增加',['class'=>'btn btn-primary'])?>
    </div>
<?php ActiveForm::end();?>