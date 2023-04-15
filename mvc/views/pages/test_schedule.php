<div class="content" data-id="<?php echo $data["user_id"] ?>">
    <div class="row mb-4">
        <div class="col-6">
            <form action="#" id="search-form" onsubmit="return false;">
                <div class="input-group">
                    <button class="btn btn btn-alt-primary dropdown-toggle btn-filter" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Tất cả</button>
                        <ul class="dropdown-menu mt-1">
                            <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="1">Chưa làm</a></li>
                            <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="2">Quá hạn</a></li>
                            <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="3">Chưa mở</a></li>
                            <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="4">Đã hoàn thành</a></li>
                            <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="5">Tất cả</a></li>
                        </ul>
                    <input type="text" class="form-control" placeholder="Tìm kiếm đề thi, tên môn học..." id="search-input">
                </div>
                </form>
        </div>
    </div>
    <div class="list-test"></div>
    <div class="block-content my-3">
    <nav class="pagination-container">
            <ul class="pagination justify-content-end mt-2">
                <li class="page-item">
                    <a class="page-link first-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="First" data-page="1">
                        <i class="fas fa-angle-double-left"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link prev-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
                <div class="d-flex" id="list-page"></div>
                <li class="page-item">
                    <a class="page-link next-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="Next">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link last-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="Last">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
