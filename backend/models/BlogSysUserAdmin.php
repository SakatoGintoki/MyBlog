<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use common\help\Tools;

/**
 * This is the model class for table "blog_sys_user_admin".
 *
 * @property int $uid
 * @property string|null $account
 * @property string|null $pwd
 * @property string|null $random_key 随机码
 * @property int|null $status
 */
class BlogSysUserAdmin extends ActiveRecord implements IdentityInterface
{
	
	const STATUS_DELETED = 0;
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;
	
	public $username;
	public $password_hash;
	public $auth_key;
	public $password_reset_token;
	public $verification_token;
	public $updated_at;
	
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%blog_sys_user_admin}}';
    }
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
    	return [
    			TimestampBehavior::className(),
    	];
    }
    
	public function ValidatePwd($user, $strAccount, $strPassword){
    	$strEntryPwd = Tools::getBackEndPassWD($user->random_key, $strPassword);
    	return strcmp($strEntryPwd, $user->pwd) == 0 ? true : false;
	 }
    
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['account'], 'string', 'max' => 10],
            [['pwd'], 'string', 'max' => 64],
            [['random_key'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'account' => 'Account',
            'pwd' => 'Pwd',
            'random_key' => 'Random Key',
            'status' => 'Status',
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
    	return static::findOne(['uid' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    
    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    	throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
    	return static::findOne(['account' => $username, 'status' => self::STATUS_ACTIVE]);
    }
    
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
    	if (!static::isPasswordResetTokenValid($token)) {
    		return null;
    	}
    
    	return static::findOne([
    			'password_reset_token' => $token,
    			'status' => self::STATUS_ACTIVE,
    	]);
    }
    
    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
    	return static::findOne([
    			'verification_token' => $token,
    			'status' => self::STATUS_INACTIVE
    	]);
    }
    
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
    	if (empty($token)) {
    		return false;
    	}
    
    	$timestamp = (int) substr($token, strrpos($token, '_') + 1);
    	$expire = Yii::$app->params['user.passwordResetTokenExpire'];
    	return $timestamp + $expire >= time();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
    	return $this->getPrimaryKey();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
    	return $this->auth_key;
    }
    
    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
    	return $this->getAuthKey() === $authKey;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
    	return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
    	$this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
    	$this->auth_key = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
    	$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    public function generateEmailVerificationToken()
    {
    	$this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
    	$this->password_reset_token = null;
    }
}
