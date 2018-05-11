<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $post app\modules\posts\models\Posts */
/* @var $form ActiveForm */
?>

<div class="edit-post">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($post, 'title') ?>
    <?= $form->field($post, 'description') ?>
    <?= $form->field($post, 'content')->widget(\dosamigos\ckeditor\CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>


