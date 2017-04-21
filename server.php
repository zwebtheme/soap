<?php

class server {
    private $con;
    
    public function __construct(){
        $this->con = (is_null($this->con)) ? self::connect() : $this->con;
    }
    
    static function connect(){
        $con = mysqli_connect('localhost','root','','soap');
        return $con;
    }
    
    public function getStudentName($id_array){
        $id = $id_array['id'];
        $sql = "SELECT name FROM students WHERE id ='$id'";
        $qry = mysqli_query($this->con, $sql);
        $res = mysqli_fetch_array($qry);
        return $res['name'];
    }
        

}


$params = array('uri' => 'http://localhost/soap/server.php');
$server = new SoapServer(NULL, $params);
$server->setClass('server');
$server->handle();

?>