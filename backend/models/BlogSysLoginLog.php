<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_sys_login_log".
 *
 * @property int $log_id
 * @property int|null $uid
 * @property int|null $log_type
 * @property string|null $address
 * @property string|null $login_ip
 * @property string|null $login_time
 */
class BlogSysLoginLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_sys_login_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'log_type'], 'integer'],
            [['login_time'], 'safe'],
            [['address'], 'string', 'max' => 255],
            [['login_ip'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'uid' => 'Uid',
            'log_type' => 'Log Type',
            'address' => 'Address',
            'login_ip' => 'Login Ip',
            'login_time' => 'Login Time',
        ];
    }
}
