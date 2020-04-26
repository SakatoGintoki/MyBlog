<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_article".
 *
 * @property int $article_id
 * @property string|null $title
 * @property string|null $comment
 * @property string|null $author
 * @property int|null $article_type
 * @property int|null $istop
 * @property string|null $create_time
 * @property string|null $title_img
 * @property int|null $is_ppt 是否轮播
 */
class BlogArticle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            [['article_type', 'istop', 'is_ppt'], 'integer'],
            [['create_time'], 'safe'],
            [['title'], 'string', 'max' => 200],
            [['author'], 'string', 'max' => 20],
            [['title_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'Article ID',
            'title' => 'Title',
            'comment' => 'Comment',
            'author' => 'Author',
            'article_type' => 'Article Type',
            'istop' => 'Istop',
            'create_time' => 'Create Time',
            'title_img' => 'Title Img',
            'is_ppt' => 'Is Ppt',
        ];
    }
}
