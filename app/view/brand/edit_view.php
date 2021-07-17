<?php if (!defined('ROOT_PATH')) {
    exit('can not access');
} ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <?= $title; ?>
        </h1>
        <a href="?c=brand&m=add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> List brad</a>


    </div>

    <?php if (empty($infoBrand)): ?>
        <div class="row my-3">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <h3>Not found data</h3>
            </div>
        </div>

    <?php else: ?>
      
      <!-- lỗi khi cố tình ko nhập dữ liệu mà đòi update -->
    <?php if(!empty($messErrors)): ?>
      <div class="row my-3">
        <div class="col-sm-12 col-lg-12 col-md-12">
          <ul>
            <?php foreach($messErrors as $err): ?>
              <li class="text-danger"><?= $err; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>

       <!--lỗi khi update trùng tên thương hiệu -->
       <?php if($status === 'exist'): ?>
          <div class="row my-3">
               <div class="col-sm-12 col-lg-12 col-md-12">
                <h4 class="text-danger">tên thương hiệu tồn tại</h4>
               </div>
           </div>
       <?php endif; ?>

       <!--lỗi khi update ko thành công/hệ thống code có lỗi -->
       <?php if($status === 'fail'): ?>
          <div class="row my-3">
               <div class="col-sm-12 col-lg-12 col-md-12">
                <h4 class="text-danger">có lỗi xảy ra</h4>
               </div>
           </div>
       <?php endif; ?>

        <div class="row my-3">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <form action="?c=brand&m=handleEdit&id=<?= $infoBrand['id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input value="<?= $infoBrand['name'] ?>" type="text" name="nameBrand" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <input value="<?= $infoBrand['address'] ?>" type="text" name="addBrand" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="mt-3">
                            <img width="30%" height="30%" class="img-fluid img-thumbnail" src="<?= PATH_UPLOAD_FILE. $infoBrand['logo'] ?>" alt="">
                        </div>
                        <label for="">Logo</label>
                        <input type="file" name="logoBrand" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Desctiption</label>
                        <textarea rows="8" name="descriptionBrand" class="form-control" ><?= $infoBrand['description'] ?></textarea>
                    </div>

                    <button type="submit" name="btnEditBrand" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    <?php endif; ?>


</div>