</br>
<table class="table table-striped">
    <thead>
        <tr>
            <td>日期</td>
            <td>登录访问量</td>
            <td>未登录访问量</td>
            <td>优惠券</td>
            <td>抽奖免费</td>
            <td>积分抽奖</td>
            <td>分享人数</td>
            <td>点赞人数</td>
            <td>参加试用</td>
            <td>参加人数</td>
            <td>商品点击</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($statistics as $item):?>
            <tr>
                <td><?=$item['data_date']?></td>
                <td><?=$item['login_access']?></td>
                <td><?=$item['unlisted_access']?></td>
                <td>
                    1&nbsp;&nbsp;点击:<?=$item['coupon1_click']?>&nbsp;&nbsp;领取:<?=$item['coupon1_receive']?><br>
                    2&nbsp;&nbsp;点击:<?=$item['coupon2_click']?>&nbsp;&nbsp;领取:<?=$item['coupon2_receive']?><br>
                    3&nbsp;&nbsp;点击:<?=$item['coupon3_click']?>&nbsp;&nbsp;领取:<?=$item['coupon3_receive']?><br>
                    4&nbsp;&nbsp;点击:<?=$item['coupon4_click']?>&nbsp;&nbsp;领取:<?=$item['coupon4_receive']?><br>
                    5&nbsp;&nbsp;点击:<?=$item['coupon5_click']?>&nbsp;&nbsp;领取:<?=$item['coupon5_receive']?><br>
                    6&nbsp;&nbsp;点击:<?=$item['coupon6_click']?>&nbsp;&nbsp;领取:<?=$item['coupon6_receive']?><br>
                </td>
                <td><?=$item['free_lucky_draw']?></td>
                <td><?=$item['point_lucky_draw']?></td>
                <td><?=$item['free_trial_share_num']?></td>
                <td><?=$item['free_trial_fabulous_num']?></td>
                <td>
                    <?php
                        $freeTrialData = $item->getFreeTrialData($item['data_date']);
                    ?>
                    <?php foreach($freeTrialData as $item1):?>
                        <?=$item1['user_id']?>&nbsp;&nbsp;<?=$item1['username']?>&nbsp;&nbsp;<?=$item1['emall']?><br>
                    <?php endforeach;?>
                </td>
                <td>
                    <?=count($freeTrialData)?>
                </td>
                <td>
                    <?php
                        $productData = $item->getProductData($item['data_date']);
                    ?>
                    <?php foreach($productData as $item1):?>
                        <?=$item1['product_id']?>&nbsp;&nbsp;<?=$item1['product_name']?>&nbsp;&nbsp;&nbsp;点击数：<?=$item1['num']?><br>
                    <?php endforeach;?>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>