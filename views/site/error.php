<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="container" style="padding-top: 50px;padding-bottom: 50px;">
    <div class="row">
        <div class="error-page col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="error-page-container">
                <div class="error-page-main">
                    <h3>
                        <strong style="font-size: 40px;margin-right: 10px;">404</strong><?= $message ? nl2br(Html::encode($message)) : 'THE PRODUCT YOU ARE LOOKING FOR CANNOT BE FOUND!' ?>
                    </h3>
                    <dl class="error-404_box" style="font-size: 25px;">
                        <dt>We are sorry...</dt>
                        <dd>This link has nothing to show, maybe you followed a bad one.<br>Please use the search field above to search what you are looking for or try our homepage.</dd>
                        <dd><a href="/" class="error-404-bt btn-style-3">Homepage</a></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>




