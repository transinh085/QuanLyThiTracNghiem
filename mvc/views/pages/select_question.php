<div class="row g-0 flex-md-grow-1">
    <div class="col-lg-5 col-xl-5 h100-scroll">
        <div class="content">
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
                        <i class="fa fa-envelope opacity-50 me-1"></i> Messages
                    </button>
                </div>
            </div>
            <div id="side-content" class="d-none d-lg-block push">
                <form action="db_messages.html" method="POST" onsubmit="return false;">
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
                <ul class="list-group fs-sm">
                    <li class="list-group-item">
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
    <div class="col-lg-7 col-xl-7 h100-scroll bg-body-dark">
        <div class="content">
            <div class="block block-rounded">
                <div class="block-content block-content-sm block-content-full bg-body-light">
                    <div class="d-flex py-3 align-items-center">
                        <div class="flex-shrink-0 me-3 ms-2 overlay-container overlay-right">
                            <p class="mb-0">Số lượng: </p>
                        </div>
                        <div class="flex-grow-1">
                            <div class="row">
                                <div class="col-sm-8">
                                    <button type="button" class="btn btn-alt-primary">Dễ <span
                                            class="badge rounded-pill bg-xwork ms-1">3</span></button>
                                    <button type="button" class="btn btn-alt-primary">Trung bình <span
                                            class="badge rounded-pill bg-xwork ms-1">3</span></button>
                                    <button type="button" class="btn btn-alt-primary">Khó <span
                                            class="badge rounded-pill bg-xwork ms-1">3</span></button>
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
                    <h3>Nội dung đề thi</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facere dolor praesentium sequi corporis cum unde neque iure iusto minus esse repellat maiores ipsum ipsa delectus voluptas nemo ipsam, ullam quidem laudantium incidunt tempora? Quasi odio architecto distinctio repudiandae numquam ducimus doloremque soluta iste aliquam, inventore sunt qui. Magnam obcaecati provident nostrum vero quos voluptate accusamus fugiat repellendus ullam doloremque, fuga quae commodi aliquid ipsum sunt, amet nobis, ut in iusto voluptates a. Explicabo sint molestiae sit repellendus impedit saepe nihil, quisquam maiores, laudantium recusandae dolore vitae qui? Voluptate at molestias dolorum, eligendi ab placeat facere incidunt recusandae porro tempora!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>