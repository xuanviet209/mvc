<?php 
namespace app\controller;

use app\controller\BaseController as Controller;
use app\model\CategoryModel;
// use app\libs\Pagination;

class CategoryController extends Controller
{
	private $categoryModel;

	public function __construct()
	{
		if(!$this->checkAdminLogin()){
            header('Location:index.php?login');
            exit();
        }
         // khoi tao doi tuong truy cap vao model
         $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
    	$data=[];
        $categorys = $this ->categoryModel->getAllCategory();
        // echo '<pre>';
        // print_r($categorys);
        // die;
        $data['categorys']= $categorys;
        $data['title'] = 'Quản lý danh mục';

        
        $this->loadSideBar();
        $this->loadNavBar();
        $this->loadView('category/index_view', $data);
        $this->loadFooter();
    }

    public function add()
    {
        $data =[];
        $data['title']='Quản lý danh mục';
        $data['error'] = null;
        
        if(isset($_GET['state']) && $_GET['state'] === 'err'){
            $data['error'] = $_SESSION['errCategory'];
        }

        $data['exist_name'] = null;
        if(isset($_GET['state']) && $_GET['state'] === 'exist_name'){
            $data['exist_name'] = 'Ten thuong hieu da ton tai, vui long chon ten khac';
        }

         // load giao dien
        $this->loadSideBar();
        $this->loadNavBar();
        // hien thi giao dien va do du lieu ra ngoai giao dien view
        // cai key cua mang $data(minh dat ten) se la 1 bien ben ngoai view
        $this->loadView('category/add_view', $data);
        $this->loadFooter();
    }

    public function handleCategory(){
        if(isset($_POST['btnAddCategory'])){
            $nameCategory=$_POST['nameCategory'] ?? '';
            $parentCategory=$_POST['parentCategory'] ?? '';
            $descriptionCategory=$_POST['descriptionCategory'] ?? '';

            // echo "<pre>";
            // print_r($_POST);
            // die;

            //xử lý upload avatar
            $nameAvatar = false;
            if(isset($_FILES['avatarCategory'])){
                $nameAvatar = uploadFileImage($_FILES['avatarCategory']);
            }

            // validate thong tin de truoc khi add vao database
            $flagErr = true;
            $arrError = $this->validateDataCategory($nameCategory, $parentCategory, $descriptionCategory, $nameAvatar);
            // kiem tra xem co loi hay ko?
            foreach ($arrError as $val) {
                if(!empty($val)) {
                    $flagErr = false;
                    break;
                }
            }
            if($flagErr){
                // ko he co loi
                // xoa bo session loi da tung co
                if(isset($_SESSION['errCategory'])){
                    unset($_SESSION['errCategory']);
                }
                // kiem tra trung ten thuong hieu ko ?
                // khong thi moi add
                // trung ko cho add
                
                if(!$this->categoryModel->checkExistsNameCategory($nameCategory)){
                    // luu vao database
                    $insert = $this->categoryModel->insertCategory($nameCategory, $parentCategory, $descriptionCategory, $nameAvatar);
                    // quay ve trang list category
                    header('Location:?c=category');
                } else {
                    // quay ve form giao dien add category
                    header('Location:?c=category&m=add&state=exist_name');
                }
            } else {
                // co loi
                // xoa bo anh vua upload
                if(file_exists(PATH_UPLOAD_FILE.$nameAvatar)){
                    unlink(PATH_UPLOAD_FILE.$nameAvatar);
                }
                // luu thong tin loi de hien thi cho nguoi dung biet
                // luu vao session
                $_SESSION['errCategory'] = $arrError;
                // quay ve form giao dien add brand
                header('Location:?c=category&m=add&state=err');
            }
            
        }
    }

     private function validateDataCategory(
        $nameCategory,
        $parentCategory,
        $descriptionCategory,
        $avatarCategory
    ) 
     {
        $error = [];
        $error['name_Category'] = empty($nameCategory) ? 'vui long nhap ten thuong hieu' : '';
        $error['parent_Category'] = empty($parentCategory) ? 'vui long nhap id thuong hieu' : '';
        $error['description'] = empty($descriptionCategory) ? 'vui long mieu ta ve thuong hieu' : '';
        $error['avatar_Category'] = !$avatarCategory ? 'Vui long kiem tra lai dinh dang anh avatar hay kich thuoc anh avatar' : '';
        return $error;
    }
}
