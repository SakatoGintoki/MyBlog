<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_sys_user_info".
 *
 * @property int $uid
 * @property string|null $nick_name
 * @property string|null $head_img
 * @property string|null $create_time
 */
class BlogSysUserInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_sys_user_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_time'], 'safe'],
            [['nick_name'], 'string', 'max' => 50],
            [['head_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'nick_name' => 'Nick Name',
            'head_img' => 'Head Img',
            'create_time' => 'Create Time',
        ];
    }
}
