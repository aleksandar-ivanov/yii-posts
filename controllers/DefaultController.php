<?php

namespace app\modules\posts\controllers;

use app\modules\posts\models\Posts;
use Yii;
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
            'query' => Posts::find()->joinWith('createdBy'),
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        return $this->render('index', ['provider' => $dataProvider]);
    }

    public function actionEdit($id)
    {
        $post = Posts::findOne(['id' => $id]);

        if ($post->load(Yii::$app->request->post())) {
            if ($post->validate()) {
                $post->save();
                return $this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));
            }
        }

        return $this->render('/edit/index', ['post' => $post]);
    }

    public function actionDelete($id)
    {
        $post = Posts::findOne(['id' => $id]);

        $post->delete();

        Yii::$app->session->setFlash('message', 'Post was deleted', true);
        return $this->redirect('/posts');
    }

}
