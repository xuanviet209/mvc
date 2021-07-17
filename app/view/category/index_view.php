<?php if(!defined('ROOT_PATH')) { exit('can not access'); } ?>

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
         <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
			 <div class="input-group">
				<!--  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
				                                aria-label="Search" aria-describedby="basic-addon2" id="nameBrand" value="<?= htmlentities($keyword); ?>"> -->
				  <!--  <div class="input-group-append">
				        <button onClick="searchBrand();" class="btn btn-primary" type="button">
				            <i class="fas fa-search fa-sm"></i>
				        </button>
				    </div> -->
		     </div>
	    </form>
        <a href="?c=category&m=add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        	<i class="fas fa-download fa-sm text-white-50"></i> Add category
        </a>
    </div>
    <div class="row">
	        <!-- Earnings (Monthly) Card Example -->
	       <div class="col-xl-12 col-md-12 mb-4">
	        	<table class="table">
	        		<thead class="table-dark"> 
	        			<tr>
	        				<th>Id</th>
	        				<th>Parent_Id</th>
	        				<th>Name</th>
	        				<th>Description</th>
	        				<th width="20%">Avatar</th>
	        				<th colspan="2" width="10%" class="text-center">Action</th>
	        			</tr>
	        		</thead>
	        	
	           <tbody>
	        		<?php foreach($categorys as $key =>$item): ?>
	        			<tr id="category_<?= $item['id']; ?>">
	        				<td><?= $item['id'];?></td>
	        				<td><?= $item['parent_id'];?></td>
	        				<td><?= $item['name']; ?></td>
	        				<td>
	        					<p><?= $item['description']; ?></p>
	        				</td>
	        				<td>
	        					<img src="<?=PATH_UPLOAD_FILE. $item['avatar']; ?>" class="img-fluid img-thumbnail" alt="" />
	        				</td>
	        				<td>
	        					<a href="?c=brand&m=edit&id=<?= $item['id']; ?>" class="btn btn-info">Edit</a>
	        				</td> 
	        				<td>
	        					<button id="del_<?= $item['id']; ?>" onClick="deleteBrand(<?= $item['id'];?>); " type="button" class="btn btn-danger">Delete</button>
	        				</td>
	        			</tr>
	        		<?php endforeach ; ?>
	        	</tbody>
	        </table>
	    </div>
</div>