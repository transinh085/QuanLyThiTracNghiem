<div class="content">
    <!-- Your Block -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Thêm câu hỏi</h3>
            <div class="block-option">
                <button type="button" class="btn btn-hero btn-primary"><i class="fa fa-file-import me-2"></i> Nhập lên hệ thống</button>
            </div>
        </div>
        <div class="block-content">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form id="form-upload" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-6">
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
                                <div class="col-6">
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
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="js-ckeditor">Nội dung</label>
                            <input class="form-control" type="file" id="file-cau-hoi" accept=".docx">
                        </div>
                        <div class="mb-4">
                            <em>Vui lòng soạn câu hỏi theo đúng định dạng. <a href="">Tải về file mẫu Docx</a></em>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary" id="xuly-file"><i
                                    class="fa fa-fw fa-eye me-1"></i> Phân tích file</button>
                        </div>
                    </form>
                    <div id="content-file"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Your Block -->
</div>