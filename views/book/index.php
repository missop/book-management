<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
?>
<h1>Books List</h1>
<table>
<tr>
    <th>图书名称</th>
    <th>作者</th>
    <th>借阅人</th>
    <th>借出时间</th>
    <th>应还时间</th>
    <th>总借阅次数</th>
    <th>操作</th>
</tr>
<?php foreach ($books as $book): ?>
<tr>
   <td><?= Html::encode("{$book->bookname}")?></td>
   <td><?= Html::encode("{$book->author}")?></td>
   <td><?= Html::encode("{$book->borrower}")?></td>
   <td><?= Html::encode("{$book->lendtime}")?></td>
   <td><?= Html::encode("{$book->returntime}")?></td>
   <td><?= Html::encode("{$book->times}")?></td>
   <td>
    <p>
        <a href="http://localhost:8080/?r=book/update&id=<?=Html::encode("{$book->id}")?>" class="change">修改</a>
        <a href="http://localhost:8080/?r=book/delete&id=<?=Html::encode("{$book->id}")?>" class="change">删除</a>
    </p>
   </td>
</tr>
<?php endforeach;?>
<tr>
<td colspan="7">
    <a href="http://localhost:8080/?r=book/add" class="add">增加</a>
</td>
</tr>
<tr>
<td colspan="7">
<?php $form=ActiveForm::begin();?>
    <?= $form->field($model, 'bookname') ?>

    <div class="form-group">
        <?=Html::submitButton('搜索',['class'=>'btn btn-primary'])?>
    </div>
<?php ActiveForm::end();?>
</td>
</tr>


</table>