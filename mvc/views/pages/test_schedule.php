<div class="content" data-id="<?php echo $data["user_id"] ?>">
    <div class="row mb-4">
        <div class="col-6">
            <form action="#" id="search-form" onsubmit="return false;">
                <div class="input-group">
                    <button class="btn btn-alt-primary dropdown-toggle btn-filtered-by-state" id="dropdown-filter-state" type="button" data-bs-toggle="dropdown" aria-expanded="false">Tất cả</button>
                    <ul class="dropdown-menu mt-1" aria-labelledby="dropdown-filter-state">
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="0">Chưa làm</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="1">Quá hạn</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="2">Chưa mở</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="3">Đã hoàn thành</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="4">Tất cả</a></li>
                    </ul>
                    <input type="text" class="form-control" placeholder="Tìm kiếm đề thi, tên môn học..." id="search-input" name="search-input">
                </div>
            </form>
        </div>
    </div>
    <div class="list-test"></div>
    <div class="row my-3">
        <?php if(isset($data["Plugin"]["pagination"])) require "./mvc/views/inc/pagination.php"?>
    </div>
</div>
