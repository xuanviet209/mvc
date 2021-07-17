<?php
namespace app\controller;

use app\controller\BaseController as Controller;

class DashboardController extends Controller
{
	public function __construct()
	{
		if(!$this->checkAdminLogin()){
			header('Location:index.php?login');
			exit();
		}
	}
    public function index()
    {
    	//xử lý logic ở đây
    	//load giao diện
    	$this->loadSideBar();
    	$this->loadNavBar();
        $this->loadView('dashboard/index_view');
        $this->loadFooter();
    }
}

?>