<nav class="nav border-bottom bg-white position-fixed top-0 w-100">
    <div class="container d-flex justify-content-between align-items-center py-2">
        <a id="" class="btn btn-hero btn-danger" href="#" role="button"><i class="fa fa-power-off"></i>
            Thoát</a>
        <div class="nav-center">
            <span class="fw-bold fs-5">Thí sinh: <?php echo $_SESSION['user_name'] ?></span>
        </div>
        <div class="nav-right d-flex align-items-center">
            <div class="nav-time me-4">
                <span class="fw-bold"><i class="far fa-clock mx-2"></i>00:45:00</span>
            </div>
            <button id="" class="btn btn-hero btn-primary" role="button"><i class="far fa-file-lines me-1"></i> Nộp bài</button>
        </div>
    </div>
</nav>
<div class="container mb-5 mt-6">
    <div class="row">
        <div class="col-8">
            <div class="question rounded border mb-3 bg-white" id="c1">
                <div class="question-top p-3">
                    <p class="question-content fw-bold mb-3">1. Đặc điểm cơ bản của lập trình hướng đối tượng
                        thể hiện ở: </p>
                    <div class="row">
                        <div class="col-6 mb-1">
                            <p class="mb-1"><b>A.</b> Tính đóng gói, tính kế thừa, tính đa hình, tính đặc biệt
                                hoá.</p>
                        </div>
                        <div class="col-6 mb-1">
                            <p class="mb-1"><b>B.</b> Tính đóng gói, tính kế thừa, tính đa hình, tính đặc biệt
                                hoá.</p>
                        </div>
                        <div class="col-6 mb-1">
                            <p class="mb-1">
                                <b>C.</b> Tính đóng gói, tính kế thừa, tính đa hình, tính đặc biệt hoá.
                            </p>
                        </div>
                        <div class="col-6 mb-1">
                            <p class="mb-1">
                                <b>D.</b> Tính đóng gói, tính kế thừa, tính đa hình, tính đặc biệt hoá.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="test-ans bg-primary rounded-bottom py-2 px-3 d-flex align-items-center">
                    <p class="mb-0 text-white me-4">Đáp án của bạn:</p>
                    <div>
                        <input type="radio" class="btn-check" name="options-c1" id="option-c1_1" autocomplete="off"
                            ques-id="c1">
                        <label class="btn btn-light rounded-pill me-2 btn-answer" for="option-c1_1">A</label>
                        <input type="radio" class="btn-check" name="options-c1" id="option-c1_2" autocomplete="off"
                            ques-id="c1">
                        <label class="btn btn-light rounded-pill me-2 btn-answer" for="option-c1_2">B</label>
                        <input type="radio" class="btn-check" name="options-c1" id="option-c1_3" autocomplete="off"
                            ques-id="c1">
                        <label class="btn btn-light rounded-pill me-2 btn-answer" for="option-c1_3">C</label>
                        <input type="radio" class="btn-check" name="options-c1" id="option-c1_4" autocomplete="off"
                            ques-id="c1">
                        <label class="btn btn-light rounded-pill me-2 btn-answer" for="option-c1_4">D</label>
                    </div>
                </div>
            </div>
            <div class="question rounded border mb-3 bg-white" id="c2">
                <div class="question-top p-3">
                    <p class="question-content fw-bold mb-3">2. Complete the following sentences:Alice couldn't
                        ______ the humilation any longer and stormed out of the room red as a bed: </p>
                    <div class="row">
                        <div class="col-6 mb-1">
                            <p class="mb-1"><b>A.</b> is</p>
                        </div>
                        <div class="col-6 mb-1">
                            <p class="mb-1"><b>B.</b> was</p>
                        </div>
                        <div class="col-6 mb-1">
                            <p class="mb-1">
                                <b>C.</b> will
                            </p>
                        </div>
                        <div class="col-6 mb-1">
                            <p class="mb-1">
                                <b>D.</b> would
                            </p>
                        </div>
                    </div>
                </div>
                <div class="test-ans bg-primary rounded-bottom py-2 px-3 d-flex align-items-center">
                    <p class="mb-0 text-white me-4">Đáp án của bạn:</p>
                    <div>
                        <input type="radio" class="btn-check" name="options-c2" id="option-c2_1" autocomplete="off"
                            ques-id="c2">
                        <label class="btn btn-light rounded-pill me-2 btn-answer" for="option-c2_1">A</label>
                        <input type="radio" class="btn-check" name="options-c2" id="option-c2_2" autocomplete="off"
                            ques-id="c2">
                        <label class="btn btn-light rounded-pill me-2 btn-answer" for="option-c2_2">B</label>
                        <input type="radio" class="btn-check" name="options-c2" id="option-c2_3" autocomplete="off"
                            ques-id="c2">
                        <label class="btn btn-light rounded-pill me-2 btn-answer" for="option-c2_3">C</label>
                        <input type="radio" class="btn-check" name="options-c2" id="option-c2_4" autocomplete="off"
                            ques-id="c2">
                        <label class="btn btn-light rounded-pill me-2 btn-answer" for="option-c2_4">D</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 bg-white p-3 rounded border h-100 sidebar-answer">
            <ul class="answer">
                <li class="answer-item p-1">
                    <a href="./dethi#c1" class="answer-item-link btn btn-outline-primary w-100 btn-sm">1</a>
                </li>
                <li class="answer-item p-1">
                    <a href="./dethi#c2" class="answer-item-link btn btn-outline-primary w-100 btn-sm">2</a>
                </li>
                <li class="answer-item p-1">
                    <a href="" class="answer-item-link btn btn-outline-primary w-100 btn-sm">3</a>
                </li>
                <li class="answer-item p-1">
                    <a href="" class="answer-item-link btn btn-outline-primary w-100 btn-sm">4</a>
                </li>
                <li class="answer-item p-1">
                    <a href="" class="answer-item-link btn btn-outline-primary w-100 btn-sm">5</a>
                </li>
                <li class="answer-item p-1">
                    <a href="" class="answer-item-link btn btn-outline-primary w-100 btn-sm">6</a>
                </li>
                <li class="answer-item p-1">
                    <a href="" class="answer-item-link btn btn-outline-primary w-100 btn-sm">7</a>
                </li>
                <li class="answer-item p-1">
                    <a href="" class="answer-item-link btn btn-outline-primary w-100 btn-sm">8</a>
                </li>
                <li class="answer-item p-1">
                    <a href="" class="answer-item-link btn btn-outline-primary w-100 btn-sm">9</a>
                </li>
                <li class="answer-item p-1">
                    <a href="" class="answer-item-link btn btn-outline-primary w-100 btn-sm">10</a>
                </li>
            </ul>
        </div>
    </div>
</div>