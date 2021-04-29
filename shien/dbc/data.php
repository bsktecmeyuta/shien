<?php
require_once('dbc_sled.php');
class Who{
    private $userName="";
    private $userHref="";
    public function __construct($userName,$userHref){
        $this->userName = $userName;
        $this->userHref = $userHref;
    }
    public function getUserName(){
        return $this->userName;
    }
    
    public function getUserHref(){
        return $this->userHref;
    }/*
    public function getUserId(){
        return $this->userId;
    }*/
    
    
}
class Office{
    private $offName="";
    /*private $offId=0;
    */
    public function __construct($offName){
        $this->offName = $offName;
       
    }
    public function getOffName(){
        return $this->offName;
    }/*
    public function getOffId(){
        return $this->offId;
    }*/
    
}
class Category{
    private $cateName="";
    /*private $cateId=0;*/
    public function __construct($cateName/*,$cateId*/){
        $this->cateName = $cateName;
        /*$this->cateId = $cateId;*/
    }
    public function getCateName(){
        return $this->cateName;
    }/*
    public function getCateId(){
        return $this->cateId;
    }*/
}
class Command extends Sled{

    static function selectOffId($foreach,$offId){
        foreach($foreach as $key => $office){
            if($offId == $key){
                echo $office->getOffName();
            }
           
        }
    }
    static function selectUserId($foreach,$userId){
        foreach($foreach as $key => $user){
            if($userId == $key){
                echo $user->getUserName();
            }
        }
        
    }
    
    static function selectUserHref($foreach,$userHref){
        foreach($foreach as $key => $user){
            if($userHref == $key){
                echo $user->getUserHref();
            }
        }
        
    }
     static function selectCateId($foreach,$cateId){
        foreach($foreach as $key => $category){
            if($cateId == $key){
                echo $category->getCateName();
            }
        }
        
    }
    function sessionSet(){
        $_SESSION['offId'] = $new['offId'];
        $_SESSION['userId'] = $new['opositUserId'];
        $_SESSION['opositUserId'] = $new['userId'];
    }
    function sessionRecieve(){
        $offId = $_SESSION['offId'];
        $userId = $_SESSION['userId'];
        $opositUserId = $_SESSION['opositUserId'];
    }
    function redirectSelect($array){
            parse_str($array['array'],$new);
            $this->sessionSet();
            $this->sessionRecieve();
    }
    function redirectSelectElse(){
            $_SESSION['offId'] = $_GET['id'];
            $this->sessionRecieve();
    }
    function redirectSled($array){
            parse_str($array,$new);
            $this->sessionSet();
            $_SESSION['cateId'] = $new['cateId'];
            
            $this->sessionRecieve();
            $cateId = $_SESSION['cateId'];

            $sledData = $this->getAllSled($cateId,$userId,$offId);
    }
    function redirectSledElse(){
            $_SESSION['cateId'] = $_GET['id'];
            $this->sessionRecieve();
            $cateId = $_SESSION['cateId'];
            $sledData = $this->getAllSled($cateId,$userId,$offId);
    }
}
?>