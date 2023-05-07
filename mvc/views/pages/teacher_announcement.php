<div class="content" data-id="<?php echo $_SESSION["user_id"] ?>">
    <form action="#" method="POST" id="search-form" onsubmit="return false;">
        <div class="row mb-4">
            <div class="col-6 flex-grow-1">
                <div class="input-group">
                    <input type="text" class="form-control" id="search-input" name="search-input" placeholder="Tìm kiếm thông báo...">
                </div>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-end gap-3">
                <a class="btn btn-hero btn-primary" href="./teacher_announcement/add"><i class="fa fa-fw fa-plus me-1"></i> Tạo thông báo</a>
            </div>
        </div>
    </form>
    <div class="list-announces" id="list-announces">
        <!-- list  -->
    </div>
    <div class="row my-3">
        <?php if(isset($data["Plugin"]["pagination"])) require "./mvc/views/inc/pagination.php"?>
    </div>
</div>
