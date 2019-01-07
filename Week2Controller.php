<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
Class Week2Controller extends Controller{
     
     public $layout = false;
    public function actionAdmin()
    {
    	return $this->render('admin');
    }
    public function actionAjax()
    {
       $name = yii::$app->request->post('name');
       $pwd = yii::$app->request->post('pwd');
       $email = yii::$app->request->post('email');
       $phone = yii::$app->request->post('phone');
       $sql = "select * from week where name = '$name'";
       if($sql){
       	echo "<script>alert('用户已存在')</script>";
       }else{

       	$sql = "insert into week values(null,'$name','$pwd','$email','$phone')";
        $res = yii::$app->db->createCommand($sql)->execute();
       if($res){
         return $this->redirect('login');
       }else
       {
       echo "false";
       }
       }
        

        

      

    }

    public function actionLogin()
    {
    	return $this->render('login');
    }
    public function actionYz()
    {
      $name = yii::$app->request->post('name');
     $sql = "SELECT * FROM week WHERE name='$name' ";
	  $data = Yii::$app->db->createCommand($sql)->queryOne();
      if($data){
       echo "<script>alert('欢饮登录')</script>";
       return $this->render('qp');
      }else{
     echo "<script>alert('您的账号不存在')</script>";
      }
  

    }

  public function actionQp(){
  	return $this->render('Qp');
  }


}
