<?php

namespace app\modules\posts\controllers;

use app\modules\posts\models\Posts;
use HTMLPurifier;
use HTMLPurifier_Config;
use Yii;

class AddController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Posts();

        if ($model->load(Yii::$app->request->post())) {
            $model->beforeValidate();
            if ($model->validate()) {
                $model->save();
                return $this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
