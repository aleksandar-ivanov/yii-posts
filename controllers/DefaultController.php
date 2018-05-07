<?php

namespace app\modules\posts\controllers;

use app\modules\posts\models\Posts;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `posts` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Posts::find(),
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        return $this->render('index', ['provider' => $dataProvider]);
    }

}
