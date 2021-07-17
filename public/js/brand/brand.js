function deleteBrand(id){
	//alert(id);
	if(confirm('Are you sure you want to delete ???')){
		$.ajax({
            url:"?c=brand&m=delete",
            data: { id: id},
            method: "post",
            beforeSend: function(){
            	$('#del_' + id).text('Loading...');
            },
            success: function(result){
            	//result : kết quả từ phía controller xử lý trả về
            	$('#del_' + id).text('Delete');
            	if(result === 'SUCCESS'){
            		alert('success');
            		//ấn cái đống mình xóa
            		$('#brand_' + id).hide();
            	} else {
            		alert('error,please try again');
            	}
            }
		});
	}
}

function searchBrand() {
	let nameBrand = $('#nameBrand').val().trim();
	//alert(nameBrand);
	if(nameBrand !== '') {
		window.location.href = "?c=brand&m=index&s="+nameBrand;
	}
}

