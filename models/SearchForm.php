<?php
namespace app\models;

use Yii;
use yii\base\Model;
class SearchForm extends Model{
    public $bookname;

    public function rules()
    {
            return [
                [['bookname'],'required']
            ];
    }
}
?>