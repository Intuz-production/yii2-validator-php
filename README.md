<h1>Introduction</h1>

INTUZ is presenting an interesting Yii2 component to validate your REST APIs. It helps to validate required and missing request parameters by just passing array of required parameters in the component function.

<br>
<h1>Features</h1>

- Pass array of required params for any REST API into component's function
- Function will check and return with any missing params or if any param is passed as blank


<h1>Getting Started</h1>

> Create one function in your component file

```
	public function actionCheckApi($params = []){
        $common = new CommonServiceComponent; // the code snippet which we have included in namespace
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = [];
//        $params = ['username', 'password', 'phone'];
        $common->setParams($params);
        if($common->validateInput()){
            $response['data'] = [];
            $response['status'] = 1; 
            return FALSE;  
        }else{
            $response['status'] = 0;
            $response['message'] = $common->getErrorMessages();             
            return $response;  
        }     
    }   

```

> Add below code to any action to validate REST API params

```
	$validate = $gnl->actionCheckApi(['user_id']);
	if ($validate) {
		return $validate;
	}
```

<h1>Bugs and Feedback</h1>

For bugs, questions and discussions please use the Github Issues.

<br>
<h1>License</h1>

Copyright (c) 2018 Intuz Solutions Pvt Ltd.
<br><br>
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
<br><br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

<h1></h1>
<a href="http://www.intuz.com">
<img src="Screenshots/logo.jpg">
</a>
