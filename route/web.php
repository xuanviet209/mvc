<?php
//đây là nơi tiếp nhận các request tu phia client
//sau đó sẽ điều phối đến các controller cần xử lý cho các request đó

//http://127.0.0.1/mvc/index?c=index&m=index&id=12
//c : trieu goi vao controller : HomeController
//m : triệu gọi vào phương thức nằm trong controller đó(phương thức index)

$c  =$_GET['c'] ?? 'home';
//mặc định luôn luôn chạy vào LoginController

$m =$_GET['m'] ?? 'index';
//mặc định chạy vào phương thức index

$controller = ucfirst($c).'Controller';
$namesapce= "app\\controller\\".$controller;
//lấy ra đc tên của controller (class)
$obj =new $namesapce();
//tự động chạy các phương thức
$obj->$m();

