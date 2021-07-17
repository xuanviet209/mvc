<?php
namespace app\model;

use app\config\Database;
use \PDO ;

class CategoryModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCategory()
    {
        $allCategory=[];
        $sql = "SELECT * FROM  `category`";
        $stmt = $this->conDb->prepare($sql);

        if($stmt){
            //
            //
             if($stmt->execute()){
                // kiem tra co data tra ve ko
                if($stmt->rowCount() > 0){
                    $allCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    // fetchAll : lay multil row
                }
                // closeCursor
                $stmt->closeCursor();
            }
        }
        return $allCategory;
    }

    public function insertCategory($name, $parentId,$desc,$avatar)
    {
        $status =1;
        $flag= false;
        $creteTime = date('Y-m-d H:i:s');
        $update = null;
        $sql = "INSERT INTO `category`(`name`,`parent_Id`,`description`, `avatar`, `status`, `created_time`, `updated_time`) VALUES (:name,:parent_Id,:description, :avatar, :status, :created_time, :updated_time) ";
        $stmt = $this->conDb->prepare($sql);
        if($stmt){
             $stmt->bindParam(':name', $name, PDO::PARAM_STR);
             $stmt->bindParam(':parent_Id', $parentId, PDO::PARAM_INT);
             $stmt->bindParam(':description', $desc, PDO::PARAM_STR);
             $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
             $stmt->bindParam(':status', $status, PDO::PARAM_INT);
             $stmt->bindParam(':created_time', $creteTime, PDO::PARAM_STR);
             $stmt->bindParam(':updated_time', $update, PDO::PARAM_STR);

             if($stmt->execute()){
                $flag = true;
                $stmt->closeCursor();
            }
        }
        return $flag;
    }

    //đọc lại chỗ này
      public function checkExistsNameCategory($nameCategory)
    {
        $flag = false;
        $sql = "SELECT `name` FROM `category` WHERE `name` = :name";
        $stmt = $this->conDb->prepare($sql);
        if($stmt){
            // kiem tra tham so
            $stmt->bindParam(':name', $nameCategory, PDO::PARAM_STR);
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    $flag = true;
                }
                $stmt->closeCursor();
            }
        }
        return $flag;
    }
}
