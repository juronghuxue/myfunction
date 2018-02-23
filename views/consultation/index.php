<?php
$this->title = Yii::t('app', 'Consultation');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
?>

<div class=" col-lg-12 col-md-12 col-sm-12">
    <div class="trade_mod">
        <div class="my_point">
            <p class="order-title" style="width: 95%;margin: 0 auto">
                <img src="/theme/new/img/daoda.png" alt="">
                Arrival Notice
            </p>
        </div>



    </div>
    <div class="table">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Arrival Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="arrival_img">
                    <img src="" alt="">
                    <span class="more_text">
                        SMOK G-PRIV 220 Mod
<!--                        SMOK G-PRIV 220 Mod-->
<!--                        1860...-->
                    </span>
                </td>
                <td>
                    Restocking
                </td>
                <td id="del">Delete</td>
            </tr>
            <tr>
                <td class="arrival_img">
                    <img src="" alt="">
                    <span class="more_text">
                        SMOK G-PRIV 220 Mod
                        <!--                        SMOK G-PRIV 220 Mod-->
                        <!--                        1860...-->
                    </span>
                </td>
                <td>
                    Restocking
                </td>
                <td>Delete</td>
            </tr>
            <tr>
                <td class="arrival_img">
                    <img src="" alt="">
                    <span class="more_text">
                        SMOK G-PRIV 220 Mod
                        <!--                        SMOK G-PRIV 220 Mod-->
                        <!--                        1860...-->
                    </span>
                </td>
                <td>
                    Restocking
                </td>
                <td>Delete</td>
            </tr>
            <tr>
                <td class="arrival_img">
                    <img src="" alt="">
                    <span class="more_text">
                        SMOK G-PRIV 220 Mod
                        <!--                        SMOK G-PRIV 220 Mod-->
                        <!--                        1860...-->
                    </span>
                </td>
                <td>
                    Restocking
                </td>
                <td>Delete</td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
<script>
    $("#del").click(function () {
        $(".table tr td").eq($(this)).remove();
        console.log("oidshfio")
    })
</script>