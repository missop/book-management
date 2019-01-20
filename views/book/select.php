<?php
use yii\helpers\Html;
?>

<p>Select result:</p>
<ul>
<?php foreach ($searches as $search):?>
    <li><label>图书名称:</label>:<?=Html::encode($search->bookname)?></li>
    <li><label>作者:</label>:<?=Html::encode($search->author)?></li>
    <li><label>借阅人:</label>:<?=Html::encode($search->borrower)?></li>
    <li><label>借出时间:</label>:<?=Html::encode($search->lendtime)?></li>
    <li><label>应还时间:</label>:<?=Html::encode($search->returntime)?></li>
    <li><label>总借阅次数:</label>:<?=Html::encode($search->times)?></li>
<?php endforeach;?>
</ul>
