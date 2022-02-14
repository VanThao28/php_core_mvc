<?php 
class Request{
    private $__rules = [],$__messages = [],$__errors=[];
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getMethod(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function isPost(){
        if($this->getMethod() == 'post'){
            return true;
        }
        return false;
    }
    public function isGet(){
        if($this->getMethod() == 'get'){
            return true;
        }
        return false;
    }
    public function getFields(){
        $datafields = [];
        if($this->isGet()){
            if(!empty($_GET)){
                foreach($_GET as $key=>$value){
                    if(is_array($value)){
                        $datafields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    }else{
                        $datafields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                    
                }
            }
        }
        if($this->isPost()){
            if(!empty($_POST)){
                foreach($_POST as $key=>$value){
                    if(is_array($value)){
                        $datafields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    }else{
                        $datafields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }
        return $datafields;
    }
    public function rules($rules=[]){
        $this->__rules = $rules;
    }
    public function message($messages=[]){
        $this->__messages = $messages;
        
    }
    public function validate(){
        $this->__rules = array_filter($this->__rules);
        $checkValidate = true;
        if(!empty($this->__rules)){
            $datafields = $this->getFields();

            foreach($this->__rules as $fieldname=>$ruleItem){
               $ruleItemArr = explode('|', $ruleItem);

              
               foreach($ruleItemArr as $rules){
                    $ruleName = null;
                    $ruleValue = null;
                    $rulesArr = explode(':',$rules);
                    $ruleName = reset($rulesArr);
                    if(count($rulesArr)>1){
                        $ruleValue = end($rulesArr);
                    }
                    if($ruleName == 'required' ){
                        if(empty(trim($datafields[$fieldname]))){
                           $this->setErrors($fieldname, $ruleName);
                           $checkValidate = false;
                        }
                    }
                    if($ruleName == 'min' ){
                        if(strlen(trim($datafields[$fieldname])) < $ruleValue){
                           $this->setErrors($fieldname, $ruleName);
                           $checkValidate = false;
                        }
                    }
                    if($ruleName == 'max' ){
                        if(strlen(trim($datafields[$fieldname])) > $ruleValue){
                           $this->setErrors($fieldname, $ruleName);
                           $checkValidate = false;
                        }
                    }
                    if($ruleName == 'email' ){
                        if(!filter_var($datafields[$fieldname], FILTER_VALIDATE_EMAIL)){
                           $this->setErrors($fieldname, $ruleName);
                           $checkValidate = false;
                        }
                    }
                    if($ruleName == 'match' ){
                        if(trim($datafields[$fieldname])!=trim($datafields[$ruleValue])){
                           $this->setErrors($fieldname, $ruleName);
                           $checkValidate = false;
                        }
                    }
                    if($ruleName == 'unique' ){
                        $tableName = null;
                        $fieldcheck = null;
                        if(!empty($rulesArr[1])){
                            $tableName = $rulesArr[1];
                        }
                        if(!empty($rulesArr[2])){
                            $fieldcheck = $rulesArr[2];
                        }

                        if(!empty($tableName) && !empty($fieldcheck)){
                            if(count($rulesArr)==3){
                                $checkExist = $this->db->query("SELECT $fieldcheck FROM $tableName WHERE $fieldcheck = '$datafields[$ruleValue]'")->rowCount();
                            }elseif(count($rulesArr)==4){
                                if(!empty($rulesArr[3]) && preg_match('~.+?=.+?~is',$rulesArr[3])){
                                    $conditionWhere = $rulesArr[3];
                                    $conditionWhere = str_replace('=','<>',$conditionWhere);
                                    $checkExist = $this->db->query("SELECT $fieldcheck FROM $tableName WHERE $fieldcheck = '$datafields[$ruleValue]' AND $conditionWhere")->rowCount();
                                }
                            }
                            if(!empty($checkExist)){
                                $this->setErrors($fieldname, $ruleName);
                                $checkValidate = false;
                            }
                        }
                    }
               }
            }
        }
        
        return $checkValidate;
    }
    public function errors($fieldname = ''){
        if(!empty($this->__errors)){
            if(empty($fieldname)){
                $error = [];
                foreach($this->__errors as $key=>$error){
                    $errorsArr[$key] = reset($error);
                }
                return $errorsArr;
            }
            return reset($this->__errors[$fieldname]);
        }
        return false;
    }
    public function setErrors($fieldname, $ruleName){
        $this->__errors[$fieldname][$ruleName] = $this->__messages[$fieldname.'.'.$ruleName];
    }
}
?>