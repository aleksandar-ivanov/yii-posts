<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\posts\models\Posts */
/* @var $form ActiveForm */
?>
<div class="index">

    <?php
        if ($error = Yii::$app->session->getFlash('errors', '', true)) {
            echo "<div class='alert alert-success'>$error</div>";
        }
    ?>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'content')->widget(\dosamigos\ckeditor\CKEditor::class, [
            'options' => ['rows' => 6],
            'preset' => 'basic'
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- index -->
