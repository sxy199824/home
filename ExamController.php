<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\lib\curl;

header('content-type:text/html;charset=utf-8');

class ExamController extends Controller{

	public $enableCsrfValidation  = false;

	// 全局显示
	public function actionShow(){

		return $this->render('show');
	}

	// 上传文件
	public function actionUpload(){

		if(Yii::$app->request->isPost){

			$dir='/phpstudy/www/yii2/backend/upload/excel.xls';

            $reg = move_uploaded_file($_FILES['file']['tmp_name'], $dir);

            if($reg){

	        	$url="http://123.206.16.118/yii2/api/web/index.php?r=exam/addtest";
                $param['month'] = Yii::$app->request->post('month');
                $param['unit'] = Yii::$app->request->post('unit');
                $file['excel'] = $dir;

                //将文件和标题发送到接口
                $reg = curl::_post($url,$param,$file);
                if($reg==1){
                    $this->redirect('index.php?r=exam/show');
                }
            }
        }else{
            return $this->render('upload');
        }
	}

    //数据显示
    public function actionText(){
        
        if(yii::$app->request->isPost){
            $data=yii::$app->request->post();
        }else{
            $url="http://123.206.16.118/yii2/api/web/index.php?r=exam/select";
            $data=$this->actionSendUrl($url);
            $data=json_decode($data,true);

            return $this->render('text',['data'=>$data]);
        }
    }

    //curl 
    public function actionSendUrl($url, $data = false){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); //信任任何证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 检查证书中是否设置域名,0不验证
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        if ($data !== false){
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}