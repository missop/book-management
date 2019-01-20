<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Book;
use app\models\SearchForm;
use app\models\UpdateForm;
class BookController extends Controller 
{
   public function actionIndex()
   {
       $query=Book::find();
       $pagination = new Pagination([
           'defaultPageSize'=>10,
           'totalCount'=>$query->count(),
       ]);

       $books = $query->orderBy('bookname')
       ->offset($pagination->offset)
       ->limit($pagination->limit)
       ->all();

       $model = new SearchForm;
       if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           $rel=$model->bookname;
           $searches=$query->where(['bookname'=>$rel])->all();
           if($searches){
            return $this->render('select',['searches'=>$searches]);
           }
       } else{
        return $this->render('index',[
            'books'=>$books,
            'pagination'=>$pagination,
            'model'=>$model
        ]); 
       }
        
   }
   public function actionAdd()
   {
        $model = new UpdateForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $book=new Book();
            $book->bookname=$model->bookname;
            $book->author=$model->author;
            $book->lendtime=$model->lendtime;
            $book->returntime=$model->returntime;
            $book->times=$model->times;
            $book->borrower=$model->borrower;
            if ($book->insert()) {
                $this->redirect(array('/book/index'));
            } else {
                return $this->render('add',['model'=>$model]);
            }
        } else {
            return $this->render('add',['model'=>$model]);
        }
   }
   public function actionUpdate()
   {
        $model = new UpdateForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $id=$_GET['id'];
            $bookname=$model->bookname;
            $author=$model->author;
            $lendtime=$model->lendtime;
            $returntime=$model->returntime;
            $times=$model->times;
            $borrower=$model->borrower;
            Book::updateAll([
                'bookname'=>$bookname,
                'author'=>$author,
                'borrower'=>$borrower,
                'lendtime'=>$lendtime,
                'returntime'=>$returntime,
                'times'=>$times
            ],['id'=>$id]);
            $this->redirect(array('/book/index'));
        } else {
            return $this->render('update',['model'=>$model]);
        }
   }
   public function actionDelete()
   {
      $id=$_GET['id'];
      Book::deleteAll(['id'=>$id]);
      $this->redirect(array('/book/index'));
   }
}


?>