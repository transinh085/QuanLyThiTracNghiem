<div class="content">
    <!-- Your Block -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Thêm câu hỏi</h3>
            <div class="block-option">
                <a class="btn btn-hero btn-primary" href="./question/addfile"><i class="fa fa-file-import me-2"></i> Nhập bằng file Word</a>
            </div>
        </div>
        <div class="block-content">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12">
                    <form method="POST" onsubmit="return false;">
                        <div class="mb-4">
                        <div class="row">
                                <div class="col-4">
                                    <label for="" class="form-label">Môn học</label>
                                    <select class="js-select2 form-select" id="mon-hoc" name="mon-hoc"
                                        style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option>
                                        <option value="1">HTML</option>
                                        <option value="2">CSS</option>
                                        <option value="3">JavaScript</option>
                                        <option value="4">PHP</option>
                                        <option value="5">MySQL</option>
                                        <option value="6">Ruby</option>
                                        <option value="7">Angular</option>
                                        <option value="8">React</option>
                                        <option value="9">Vue.js</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Chương</label>
                                    <select class="js-select2 form-select" id="chuong" name="chuong"
                                        style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Độ khó</label>
                                    <select class="js-select2 form-select" id="dokho" name="chuong" style="width: 100%;"
                                        data-placeholder="Choose one..">
                                        <option></option>
                                        <option value="1">Cơ bản</option>
                                        <option value="2">Trung bình</option>
                                        <option value="3">Nâng cao</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="js-ckeditor">Nội dung câu hỏi</label>
                            <textarea id="js-ckeditor" name="ckeditor">OOP là viết tắt của từ nào ?</textarea>
                        </div>
                        <div class="mb-4 row">
                            <h6>Danh sách đáp án</h6>
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <tbody id="list-options">    
                                    </tbody>
                                </table>
                            </div>
                            <p>
                                <button class="btn btn-hero btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#add_option" aria-expanded="false" aria-controls="add_option">
                                    Thêm câu trả lời <i class="fa fa-fw fa-angle-down opacity-50"></i>
                                </button>
                            </p>
                            <div class="collapse" id="add_option">
                                <div class="card card-body">
                                    <label class="form-label" for="option-content">Nội dung trả lời</label>
                                    <textarea id="option-content" name="ckeditor">Sinh</textarea>
                                    <div class="form-check mt-4">
                                        <input class="form-check-input" type="checkbox" value="" id="true-option">
                                        <label class="form-check-label" for="true-option">
                                            Đáp án đúng
                                        </label>
                                    </div>
                                    <p>
                                        <button type="button" class="btn btn-primary mt-3" id="save-option">Lưu câu trả lời</button>
                                        <button type="button" class="btn btn-primary mt-3" id="update-option">Cập nhật câu trả lời</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary" id="add_question"><i class="fa fa-fw fa-plus me-1"></i> Lưu
                                câu hỏi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Your Block -->
</div>






















