<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = trim($name) == "" ? "╮(╯▽╰)╭ 抱歉，刚才发生了一个错误!" : $name;
?>
<div style="width: 100%;height:100%;text-align:center;padding-top:10%;padding-bottom:100%;">
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br($msg) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>
