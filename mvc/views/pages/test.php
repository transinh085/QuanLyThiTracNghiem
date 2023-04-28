<div class="content" data-id="<?php echo $data["user_id"] ?>">
    <form action="#" method="POST" id="search-form" onsubmit="return false;">
        <div class="row mb-4">
            <div class="col-6 flex-grow-1">
                <div class="input-group">
                    <button class="btn btn-alt-primary dropdown-toggle btn-filtered-by-state" id="dropdown-filter-state" type="button" data-bs-toggle="dropdown" aria-expanded="false">Tất cả</button>
                    <ul class="dropdown-menu mt-1" aria-labelledby="dropdown-filter-state">
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="0">Chưa mở</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="1">Đang mở</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="2">Đã đóng</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="3">Tất cả</a></li>
                    </ul>
                    <input type="text" class="form-control" id="search-input" name="search-input" placeholder="Tìm kiếm đề thi...">
                </div>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-end gap-3">
                <a class="btn btn-hero btn-primary" href="./test/add"><i class="fa fa-fw fa-plus me-1"></i> Tạo đề thi</a>
            </div>
        </div>
    </form>
    <div class="list-test" id="list-test">
    </div>
    <div class="row my-3">
        <?php if(isset($data["Plugin"]["pagination"])) require "./mvc/views/inc/pagination.php"?>
    </div>
</div>