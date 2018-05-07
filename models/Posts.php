<?php

namespace app\modules\posts\models;
use app\modules\users\models\User;
use HTMLPurifier;
use HTMLPurifier_Config;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property int $created_by
 *
 * @property Users $createdBy
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    public function beforeValidate()
    {
        $this->created_by = \Yii::$app->user->getId();
        return true;
    }

    public function afterValidate()
    {
        parent::afterValidate();

        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        $this->content = $purifier->purify($this->content);
        return true;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['title', 'description'], 'required'],
            [['title', 'description'], 'string', 'min' => 10, 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => false, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }
}
