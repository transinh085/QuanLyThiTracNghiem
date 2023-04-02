<div class="row g-0 flex-md-grow-1">
    <div class="col-lg-4 col-xl-4 h100-scroll">
        <div class="content px-1">
            <div class="row g-sm d-lg-none push">
                <div class="col-6">
                    <button type="button" class="btn btn-primary w-100" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-bars opacity-50 me-1"></i> Menu
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-alt-primary w-100" data-toggle="class-toggle"
                        data-target="#side-content" data-class="d-none">
                        <i class="fa fa-envelope opacity-50 me-1"></i> Câu hỏi
                    </button>
                </div>
            </div>
            <div id="side-content" class="d-none d-lg-block push">
                <form onsubmit="return false;">
                    <div class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm câu hỏi.." id="search-content">
                            <span class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
                <div class="d-flex justify-content-between mb-2">
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm btn-link fw-semibold dropdown-toggle"
                            id="inbox-msg-sort" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Chương
                        </button>
                        <div class="dropdown-menu fs-sm" aria-labelledby="inbox-msg-sort" id="list-chapter">
                            <a class="dropdown-item" href="javascript:void(0)">1</a>
                            <a class="dropdown-item" href="javascript:void(0)">2</a>
                            <a class="dropdown-item" href="javascript:void(0)">Tất cả</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm btn-link fw-semibold dropdown-toggle"
                            id="inbox-msg-filter" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Độ khó
                        </button>
                        <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="inbox-msg-filter">
                            <a class="dropdown-item active data-dokho" href="javascript:void(0)" data-id="0">Tất cả</a>
                            <a class="dropdown-item data-dokho" href="javascript:void(0)" data-id="1">Dễ</a>
                            <a class="dropdown-item data-dokho" href="javascript:void(0)" data-id="2">Trung bình</a>
                            <a class="dropdown-item data-dokho" href="javascript:void(0)" data-id="3">Khó</a>
                        </div>
                    </div>
                </div>
                <ul class="list-group fs-sm" id="list-question">
                    <!-- Danh sách câu hỏi -->
                </ul>
                <nav aria-label="Page navigation" class="mt-3">
                    <ul class="pagination justify-content-center" id="nav-page">
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xl-8 h100-scroll bg-body-dark">
        <div class="content px-0">
            <div class="block block-rounded">
                <div class="block-content block-content-sm block-content-full bg-body-light">
                    <div class="d-flex py-3 align-items-center">
                        <div class="flex-shrink-0 me-3 ms-2 overlay-container overlay-right">
                            <p class="mb-0">Số lượng: </p>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <button type="button" class="btn btn-alt-primary">Dễ
                                        <span class="badge rounded-pill bg-xwork ms-1">
                                            <span id="slcaude">0</span>/<span id="ttcaude">0</span>
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-alt-primary">Trung bình
                                        <span class="badge rounded-pill bg-xwork ms-1">
                                            <span id="slcautb">0</span>/<span id="ttcautb">0</span>
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-alt-primary">Khó
                                        <span class="badge rounded-pill bg-xwork ms-1">
                                            <span id="slcaukho">0</span>/<span id="ttcaukho">0</span>
                                        </span>
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-hero btn-danger" id="save-test"><i
                                            class="fa-solid fa-floppy-disk"></i> Tạo đề thi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <h4 class="text-center mb-2" id="name-test"></h4>
                    <p class="text-center text-muted">Thời gian: <span id="test-time"></span> phút</p>
                    <div id="list-question-of-test">
                        <!-- Danh sách câu hỏi của đề thi  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
header,
footer {
    display: none !important
}

#page-container.page-header-fixed #main-container {
    padding-top: 0 !important
}
</style>