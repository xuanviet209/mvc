<?php
namespace app\config;

use \PDO ;
 //sd thự viện pdo để kết nối db
class Database
{
    protected $conDb;
    public function __construct()
    {
        $this->conDb=$this->connectDatabase();
    }
    private function connectDatabase()
    {
    	try{
    		$dbh = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8', 'root', '');
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    	    return $dbh;
         }catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
    }
    //hủy kết nối
    private function disconnectDatabase()
    {
    	$this->conDb=null;
    }

    public function __destruct()
    {
        $this->disconnectDatabase();
    }
}
