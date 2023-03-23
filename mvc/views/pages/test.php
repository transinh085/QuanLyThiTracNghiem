<div class="content">
    <div class="row mb-4">
        <div class="col-6 flex-grow-1">
            <div class="input-group">
                <button class="btn btn btn-alt-primary dropdown-toggle btn-filter" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">Tất cả</button>
                <ul class="dropdown-menu mt-1">
                    <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="0">Đang thi</a>
                    </li>
                    <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="1">Đã thi</a></li>
                    <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="1">Chưa thi</a>
                    </li>
                    <li><a class="dropdown-item filter-search" href="javascript:void(0)" data-value="2">Tất cả</a></li>
                </ul>
                <input type="text" class="form-control" placeholder="Tìm kiếm đề thi..." id="form-search">
            </div>
        </div>
        <div class="col-6 d-flex align-items-center justify-content-end gap-3">
            <a class="btn btn-hero btn-primary" href="./test/add"><i class="fa fa-fw fa-plus me-1"></i> Tạo đề thi</a>
        </div>
    </div>
    <div class="list-test" id="list-test">
    </div>
</div>