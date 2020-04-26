<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_feedback".
 *
 * @property int $id
 * @property int|null $uid
 * @property string|null $content
 * @property string|null $create_time
 */
class BlogFeedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid'], 'integer'],
            [['create_time'], 'safe'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'content' => 'Content',
            'create_time' => 'Create Time',
        ];
    }
}
