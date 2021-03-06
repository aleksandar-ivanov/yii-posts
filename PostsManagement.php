<?php

namespace app\modules\posts;

/**
 * posts module definition class
 */
class PostsManagement extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\posts\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function canBeManaged()
    {
        return !\Yii::$app->user->isGuest && \Yii::$app->user->can('managePost');
    }

    public function getIcon()
    {
        return 'comments';
    }
}
