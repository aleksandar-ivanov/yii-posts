<?php

namespace app\modules\posts\controllers;

use yii\web\Controller;

/**
 * Default controller for the `posts` module
 */
class TestController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('test');
    }

    public function actionTest()
    {
        return $this->render('test2');
    }
}
