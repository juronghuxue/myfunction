</br>
<table class="table table-striped">
    <thead>
        <tr>
            <td>日期</td>
            <td>登录访问量</td>
            <td>未登录访问量</td>
            <td>免费抽奖</td>
            <td>积分抽奖</td>
            <td>增加机会人数</td>
            <td>点击试用</td>
            <td>参加人数</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($statistics as $item):?>
            <tr>
                <td><?=$item['sdate']?></td>
                <td><?=$item['login']?></td>
                <td><?=$item['guest']?></td>
                <td><?=$item['free_num']?></td>
                <td><?=$item['point_num']?></td>
                <td><?=$item['recommend_num']?></td>
                <td><?=$item['click_num']?></td>
                <td><?=$item['apply_num']?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>