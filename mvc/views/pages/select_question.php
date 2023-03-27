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
                            <input type="text" class="form-control" placeholder="Tìm kiếm câu hỏi..">
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
                        <div class="dropdown-menu fs-sm" aria-labelledby="inbox-msg-sort">
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
                            <a class="dropdown-item active" href="javascript:void(0)">Cơ bản</a>
                            <a class="dropdown-item" href="javascript:void(0)">Trung bình</a>
                            <a class="dropdown-item" href="javascript:void(0)">Nâng cao</a>
                            <a class="dropdown-item" href="javascript:void(0)">Khó</a>
                        </div>
                    </div>
                </div>
                <ul class="list-group fs-sm" id="list-question">
                    <li class="list-group-item">
                        <span class="badge rounded-pill bg-dark m-1 float-end">Dễ</span>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="ques_1">
                            <label class="form-check-label text-muted" for="ques_1">Lập trình hướng đối tượng là gì ?</label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="ques_2">
                            <label class="form-check-label text-muted" for="ques_2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime magnam voluptatibus eos harum expedita facere. Velit iusto ipsum quis quasi!</label>
                        </div>
                    </li>
                </ul>
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
                            <div class="row">
                                <div class="col-sm-8">
                                    <button type="button" class="btn btn-alt-primary">Dễ 
                                        <span class="badge rounded-pill bg-xwork ms-1">
                                            <span id="slcaude">1</span>/<span id="ttcaude">3</span>
                                        </span></button>
                                    <button type="button" class="btn btn-alt-primary">Trung bình 
                                        <span class="badge rounded-pill bg-xwork ms-1">1/3</span></button>
                                    <button type="button" class="btn btn-alt-primary">Khó <span
                                            class="badge rounded-pill bg-xwork ms-1">1/3</span></button>
                                </div>
                                <div class="col-sm-4 d-sm-flex align-items-sm-center">
                                    <button type="button" class="btn btn-hero btn-danger"><i
                                            class="fa-solid fa-floppy-disk"></i> Tạo đề thi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <h4 class="text-center mb-2">Đề kiểm tra giữa kì Lập trình Java</h4>
                    <p class="text-center text-muted">Thời gian: 60 phút</p>
                    <div class="question mb-3" id="c1">
                <div class="question-top p-3">
                    <p class="question-content fw-bold mb-3">1. Đặc điểm cơ bản của lập trình hướng đối tượng
                        thể hiện ở: </p>
                    <div class="row">
                        <div class="col-12 mb-1">
                            <p class="mb-1"><b>A.</b> Tính đóng gói, tính kế thừa, tính đa hình, tính đặc biệt
                                hoá.</p>
                        </div>
                        <div class="col-12 mb-1">
                            <p class="mb-1"><b>B.</b> Tính đóng gói, tính kế thừa, tính đa hình, tính đặc biệt
                                hoá.</p>
                        </div>
                        <div class="col-12 mb-1">
                            <p class="mb-1">
                                <b>C.</b> Tính đóng gói, tính kế thừa, tính đa hình, tính đặc biệt hoá.
                            </p>
                        </div>
                        <div class="col-12 mb-1">
                            <p class="mb-1">
                                <b>D.</b> Tính đóng gói, tính kế thừa, tính đa hình, tính đặc biệt hoá.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    header,footer{display:none!important}
    #page-container.page-header-fixed #main-container{padding-top: 0!important}
</style>