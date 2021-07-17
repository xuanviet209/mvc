<?php
namespace app\model;

use app\config\Database;
use \PDO ;
class LoginModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkLoginUser($user,$pass)
    {
        $infoUser=[];
        //thực hiện truy vấn sql
        //sử dụng thư viện pdo php
        $sql="SELECT * FROM `admin` WHERE `username`= :user AND `password`= :pass AND `status`=1";
        //:user và :pass chinh la tham so truyen vao cau lenh sql
        //đi kiểm tra xem câu lệnh sql đã đúng chưa
        $stmt=$this->conDb->prepare($sql);
        //prepare là hàm của pdo php
        
        if($stmt){
            //kiểm tra tham số truyền vào câu lệnh sql nếu có
            $stmt->bindParam(':user',$user, PDO::PARAM_STR);
             $stmt->bindParam(':pass',$pass, PDO::PARAM_STR);
             //thực thi câu lệnh sql
             if($stmt->execute()){
                 //kiểm tra xem có dòng dữ liệu tra ve ko?
                 if($stmt->rowCount()>0){
                    $infoUser= $stmt->fetch(PDO::FETCH_ASSOC);
                    //fetch : tra ve 1 row data
                    //PDO::FETCH_ASSOC : trả về mảng ko tuần tự vs key của mảng chính là tên các cột(trường) trong database
                 }
                 //dung kqua của việc truy vấn sql ben tren
                 $stmt->closeCursor();
                 //chúng ta xử lý các lệnh sql tiếp nếu cần
             }
        }
        return $infoUser;
    }
}