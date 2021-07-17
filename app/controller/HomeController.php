<?php
namespace app\controller;

use app\controller\BaseController as Controller;
use app\model\BrandModel;

class HomeController extends Controller
{
    private $brandModel;
    public function  __construct()
    {
      $this->brandModel = new BrandModel();
    }
    
    public function index()
    {
        // load view : giao dien trang home
        $this->loadView('home/index_view');
    }

   
}