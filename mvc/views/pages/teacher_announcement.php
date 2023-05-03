<form class="row g-0 flex-md-grow-1 form-taodethi" onsubmit="return false;">
    <div class="col-md-8 col-lg-7 col-xl-9 col-custom-9 order-md-0">
        <div class="content content-full">
            <form class="block block-rounded form-tao-de" novalidate="novalidate">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Thông báo</h3>
                    </div>
                    <div class="block block-content">
                        <div class="mb-4">
                            <label class="form-label" for="name-exam">Nội dung thông báo</label>
                            <textarea type="text" class="form-control" id="name-exam" name="name-exam" placeholder="Nhập nội dung thông báo"></textarea>
                        </div>
                        
                        
                        <div class="mb-4">
                            <div class="block block-rounded border">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Thông báo cho</h3>
                                    <div class="block-option">
                                        <select class="js-select2 form-select" id="nhom-hp" name="nhom-hp"
                                            style="width: 100%;" data-placeholder="Chọn nhóm học phần thông báo...">
                                        </select>
                                    </div>
                                </div>
                                <div class="block-content pb-3">
                                    <div class="row" id="list-group">
                                        <div class="text-center fs-sm"><img style="width:100px" src="./public/media/svg/empty_data.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <?php 
                            // if($data["Action"] == "create") echo '<button type="submit" class="btn btn-hero btn-primary" id="btn-add-test"><i class="fa fa-fw fa-plus me-1"></i> Tạo đề</button>';
                            // else if($data["Action"] == "update") echo '<button type="submit" class="btn btn-hero btn-primary" id="btn-update-test"><i class="fa fa-fw fa-plus me-1"></i> Cập nhật đề</button>';
                            ?>
                            <button type="submit" class="btn btn-hero btn-primary" id="btn-send-announcement"><i class="fa fa-fw fa-plus me-1"></i>Gửi thông báo</button>
                            <!-- <a class="btn btn-hero btn-success" id="btn-update-quesoftest"><i class="fa fa-fw fa-pencil me-1"></i> Chỉnh sửa danh sách câu hỏi</a> -->
                        </div>
                    </div>
            </form>
        </div>
    </div>
</form>

<!-- <span class="select2-container select2-container--default select2-container--open" style="position: absolute; top: 458.273px; left: 717.534px;"><span class="select2-dropdown select2-dropdown--below" dir="ltr" style="width: 285.977px;"><span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" aria-controls="select2-nhom-hp-results" aria-activedescendant="select2-nhom-hp-result-64xw-1"></span><span class="select2-results"><ul class="select2-results__options" role="listbox" id="select2-nhom-hp-results" aria-expanded="true" aria-hidden="false"><li class="select2-results__option" id="select2-nhom-hp-result-0fkq-0" role="option" aria-selected="false" data-select2-id="select2-nhom-hp-result-0fkq-0">841059 - Lập trình hướng đối tượng - NH2023 - HK1</li><li class="select2-results__option select2-results__option--highlighted" id="select2-nhom-hp-result-64xw-1" role="option" aria-selected="false" data-select2-id="select2-nhom-hp-result-64xw-1">841059 - Lập trình hướng đối tượng - NH2023 - HK2</li></ul></span></span></span> -->