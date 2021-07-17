<?php

namespace app\libs;

class Pagination
{
	const LIMIT_ITEMS = 4;
	//bao nhieu data trên 1 trang
	const ROOT_PAGE = 'index.php';

	//viết hàm bổ trợ tạo đường link phân trang
	public function createLink($dataLinks = [])
	{
		//index.php?c=brand&m=index&page=1&s=
		/*
		 $dataLinks = [
            'c' => 'brand',
            'm' => 'index',
            'page' =>{page},
            's'=>''
		 ]
		 */
		$link = '';
		foreach($dataLinks as $key => $item){
			$link.=empty($link) 
			? self::ROOT_PAGE."?{$key}={$item}"
			: "&{$key}={$item}";
		}
		return $link;
	}
	//viết hàm phân trang
	public function createPaginate($link, $totalRecord,$limit, $page = 1)
	{
		//$link : tạp ra từ createLink
		//$totalRecord: tổng số dữ liệu  (tính toán tổng số trang)
		//$page: trang truyền vào
		//$limit: giới hạn có bao nhiêu item (sản phẩm) trên 1 trang
		$limit = $limit == null ? self::LIMIT_ITEMS : $limit;
		//đi tính tổng số trang
		$totalPage = ceil($totalRecord/$limit);

		//tính toán lại $page
		//$page>=1 && $page <=$totalPage
		if($page < 1){
			$page = 1;
		}elseif($page > $totalPage){
			$page = $totalPage;
		}
		//page luôn luôn bắt đầu từ 1 ==> lấy trên param url trình duyệt
		//mysql: limit s,t : s==0
		//tính toán start 
		$start = ($page -1)*$limit;

		//tạo giao diện phân trang bằng bootstap
        $htmlPage= '';
        $htmlPage .='<nav>';
        $htmlPage .='<ul class="pagination">';
        //xử lý previous (backpage)
        if($page > 1 && $page < $totalPage){
            $htmlPage .= '<li class="page-item">';
            $htmlPage .= '<a class="page-link" href="'.str_replace('{page}',($page-1),$link).'">Previous</a>';
            $htmlPage .='</li>';
        }
        //xử lý trang ở giữa
        for($i =1; $i <= $totalPage; $i++){
        	if($page == $i){
        		// đứng ở trang active
        		$htmlPage .='<li class="page-item active" aria-current="page">';
        		$htmlPage .='<a class="page-link">'.$page.'</a>';
        		$htmlPage .='</li>';
        	}else{
               $htmlPage .='<li class="page-item"><a class="page-link" href="'.str_replace('{page}',$i,$link).'">'.$i.'</a></li>';
        	}
        }
        //xử lý next page
        if($page < $totalPage && $page >= 1){
        	$htmlPage .='<li class="page-item">';
        	 $htmlPage .= '<a class="page-link" href="'.str_replace('{page}',($page+1),$link).'">Next</a>';
        	$htmlPage .='</li>';
        }
        $htmlPage .='</ul>';
        $htmlPage .='</nav>';

        return[
          'start' =>$start,
          'total_page' => $totalPage,
          'html_page' => $htmlPage
        ];
	}
}