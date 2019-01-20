<?php

namespace app\models;

use Yii;
use yii\base\Model;
class UpdateForm extends Model{
    public $bookname;
    public $author;
    public $times;
    public $borrower;
    public $lendtime;
    public $returntime;

    public function rules()
    {
            return [
                [['bookname','author','times','borrower','lendtime','returntime'],'required']
            ];
    }
}

?>