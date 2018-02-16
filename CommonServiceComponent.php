<?php
// Copyright (C) 2018 INTUZ. 

// Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the
// "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish,
// distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to
// the following conditions:

// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
// MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR
// ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH
// THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
namespace common\components;
 
use Yii;
 
class CommonServiceComponent extends \yii\base\Widget {
    public $message,$params;
    public function validateInput()
    {
        // get post params
        $post = Yii::$app->request->post();
        // get params
        $params = $this->getParams();
        $err_flag = 0;
        // save error messages
        foreach ($params as $param) {
            if(!isset($post[$param])){
                $msg = $this->loadTemplate($param, 'missing');
                $this->setErrorMessage($msg);
                $err_flag++;
            }else{
                if($post[$param]==''){
                    $msg = $this->loadTemplate($param, 'required');
                    $this->setErrorMessage($msg);  
                    $err_flag++;
                }
            }
        }        
        if($err_flag<1){
            return true;
        }else{
            return false;
        }
    }
    public function loadTemplate($param, $type = 'required'){
        if($type == 'required'){
            $msg = $param." should not be empty";
        }else if($type == 'missing'){
            $msg = $param." is missing";
        }
        return $msg;
    }
    public function setParams($params){
        $this->params = $params;
    }
    public function getParams($params){
        return $this->params;
    }
    public function setErrorMessage($message){
        $this->message[] = $message;
    }
    
    public function getErrorMessages(){
        return implode(',\n',$this->message);
    }
}
?>