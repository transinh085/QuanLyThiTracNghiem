// Cắt tham số url
let url = location.href.split("/");
let made = url[url.length - 1];
// Thông tin đề thi
let infoTest
// Khởi tạo mảng câu hỏi của đề thi
let arrQuestion = [];
// Khởi tạo mảng danh sách câu hỏi lấy từ db
let questions = [];
// Khởi tạo tổng số trang
let totalpage = 0
let currentQuestionLists;
function getAnswerListForQuestion(questions) {
    if (questions.length == 0) {
        $("#list-question").html(`<p class="text-center">Không có câu hỏi</p>`);
        return;
    }
    showListQuestion(questions);

    const arrMaCauHoi = questions.map(question => +question.macauhoi);
    $.ajax({
        type: "post",
        url: "./question/getAnswersForMultipleQuestions",
        data: {
            questions: arrMaCauHoi,
        },
        dataType: "json",
        success: function (answers) {
            // Gắn các câu trả lời vào tương ứng macauhoi
            currentQuestionLists = questions.map((question) => {
                const { macauhoi } = question;
                return {
                    ...question,
                    cautraloi: answers
                    .filter((answer) => answer.macauhoi === macauhoi)
                    .map(({ macautl, noidungtl, ladapan }) => ({
                      macautl,
                      macauhoi,
                      noidungtl,
                      ladapan
                    }))
                };
            });
        },
        error: function (err) {
            console.error(err.responseText);
        }
    });
}

function showListQuestion(questions) {
    let html = ``;
    if(questions.length != 0) {
        questions.forEach((question,index) => {
            let dokhotext = ["", "Dễ","TB","Khó"];
            let check = arrQuestion.findIndex(item => item.macauhoi == question.macauhoi) != -1 ? "checked" : "";
            html += `<li class="list-group-item d-flex">
                <div class="form-check">
                    <input class="form-check-input item-question" type="checkbox" id="q-${question.macauhoi}" data-id="${question.macauhoi}" data-index="${index}" ${check}>
                    <label class="form-check-label text-muted" for="q-${question.macauhoi}" style="word-break: break-all;">${question.noidungplaintext}</label>
                </div>
                <span class="badge rounded-pill bg-dark m-1 float-end h-100">${dokhotext[question.dokho]}</span>
            </li>`
        });
    } else {
        html += `<p class="text-center">Không có câu hỏi</p>`;
    }
    $("#list-question").html(html);
}

function getInfoTest() {
    return $.ajax({
        type: "post",
        url: "./test/getDetail",
        data: {
            made: made
        },
        dataType: "json",
        success: function (data) {
            infoTest = data;
        }
    });
}

function getQuestionOfTest() {
    return $.ajax({
        type: "post",
        url: "./test/getQuestionOfTestManual",
        data: {made: made},
        dataType: "json",
        success: function (response) {
            arrQuestion = response;
        }
    });
}

// Đợi khi ajax getInfoTest() thực hiện hoàn tất
$.when(getInfoTest(),getQuestionOfTest()).done(function(){
    console.log(arrQuestion)
    $("#name-test").text(infoTest.tende)
    $("#test-time").text(infoTest.thoigianthi);
    let slgioihan = [0,infoTest.socaude,infoTest.socautb,infoTest.socaukho]
    let arr_slch = countQuantityLevel(arrQuestion);

    showListQuestionOfTest(arrQuestion);
    displayQuantityQuestion();

    function countQuantityLevel(arrQuestion) {
        let result = [0,0,0,0];
        arrQuestion.forEach(question => {
            result[`${question.dokho}`]++
        });
        return result;
    }

    function displayQuantityQuestion() {
        $("#slcaude").text(arr_slch[1]);
        $("#ttcaude").text(infoTest.socaude);
        $("#slcautb").text(arr_slch[2]);
        $("#ttcautb").text(infoTest.socautb);
        $("#slcaukho").text(arr_slch[3]);
        $("#ttcaukho").text(infoTest.socaukho);
    }

    // Hiển thị danh sách câu hỏi của môn học ở cột bên trái
    function showListQuestion(questions,arrQuestion) {
        let html = ``;
        if(questions.length != 0) {
            questions.forEach((question,index) => {
                let dokhotext = ["", "Dễ","TB","Khó"];
                let check = arrQuestion.findIndex(item => item.macauhoi == question.macauhoi) != -1 ? "checked" : "";
                html += `<li class="list-group-item d-flex">
                    <div class="form-check">
                        <input class="form-check-input item-question" type="checkbox" id="q-${question.macauhoi}" data-id="${question.macauhoi}" data-index="${index}" ${check}>
                        <label class="form-check-label text-muted" for="q-${question.macauhoi}" style="word-break: break-all;">${question.noidung}</label>
                    </div>
                    <span class="badge rounded-pill bg-dark m-1 float-end h-100">${dokhotext[question.dokho]}</span>
                </li>`
            });
        } else {
            html += `<p class="text-center">Không có câu hỏi</p>`;
        }
        $("#list-question").html(html);
    }

    // Xử lý sự kiện change trên ô input câu hỏi
    $(document).on("click", ".item-question",function () {
        const id = +$(this).data("id");
        const question = currentQuestionLists.find(question => question.macauhoi == id);
        console.log(question);
        if ($(this).prop("checked") == true) {
            if(arr_slch[`${question.dokho}`] < slgioihan[`${question.dokho}`]) {
                arrQuestion.push(question);
                arr_slch[`${question.dokho}`]++;
                displayQuantityQuestion();
                showListQuestionOfTest(arrQuestion);
            } else {
                $(this).prop("checked",false);
                Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Số lượng câu hỏi ở mức độ đã đủ!' });
            }
        } else {
            let i = arrQuestion.findIndex(q => q.macauhoi == id);
            arrQuestion.splice(i,1);
            arr_slch[`${question.dokho}`]--;
            displayQuantityQuestion();
            showListQuestionOfTest(arrQuestion);
        }
    });

    // Hiển thị preview bên phải
    function showListQuestionOfTest(questions) {
        let html = ``;
        if(questions.length == 0) {
            html += `<p class="text-center">Chưa có câu hỏi</p>`
        } else {
            questions.forEach((question,index) => {
                html += `<div class="question mb-3 d-flex justify-content-between">
                    <div class="question-top px-3">
                        <p class="question-content fw-bold mb-3">${index + 1}. ${question.noidung}</p>
                        <div class="row">`;
                    question.cautraloi.forEach((item,i) => {
                    html += `<div class="col-12 mb-1">
                        <p class="mb-1"><b>${String.fromCharCode(i + 65)}.</b> ${item.noidungtl}</p>
                    </div>`;
                });
                html += `</div></div>
                <div class="btn-group-vertical h-100" role="group">
                    <button type="button" class="btn btn-info btn-up" data-bs-toggle="tooltip" data-bs-placement="left" title="Đưa lên trên" data-index="${index}"><i class="fa fa-arrow-up"></i></button>
                    <button type="button" class="btn btn-info btn-down" data-bs-toggle="tooltip" data-bs-placement="left" title="Đưa xuống dưới" data-index="${index}"><i class="fa fa-arrow-down"></i></button>
                    <button type="button" class="btn btn-info btn-delete" data-bs-toggle="tooltip" data-bs-placement="left" title="Xoá câu hỏi" data-index="${index}"><i class="fa fa-delete-left"></i></button>
                </div>
                </div>`
            });   
        }
        $("#list-question-of-test").html(html);
        $('[data-bs-toggle="tooltip"]').tooltip();
    }

    function getAnswer(macauhoi) {
        let ans = [];
        $.ajax({
            type: "post",
            url: "./question/getAnswerById",
            data: {
                id: macauhoi
            },
            async: false,
            dataType: "json",
            success: function (response) {
                ans = response;
            }
        });
        return ans;
    }

    $(document).on("click", ".btn-up",function () {
        let index = +$(this).data("index");
        if (index == 0) {
            $(this).tooltip('hide');
            return;
        }
        let temp = arrQuestion[index];
        arrQuestion[index] = arrQuestion[index - 1];
        arrQuestion[index - 1] = temp;
        $(this).tooltip('hide');
        showListQuestionOfTest(arrQuestion);
    });

    $(document).on("click", ".btn-down",function () {
        let index = +$(this).data("index");
        if (index == arrQuestion.length - 1) {
            $(this).tooltip('hide');
            return;
        }
        let temp = arrQuestion[index];
        arrQuestion[index] = arrQuestion[index + 1];
        arrQuestion[index + 1] = temp;
        $(this).tooltip('hide');
        showListQuestionOfTest(arrQuestion);
    });

    $(document).on("click", ".btn-delete",function () {
        let index = $(this).data("index");
        arr_slch[`${arrQuestion[index].dokho}`]--;
        $(`#q-${arrQuestion[index].macauhoi}`).prop("checked",false);
        $(this).tooltip('hide');
        arrQuestion.splice(index,1);
        displayQuantityQuestion()
        showListQuestionOfTest(arrQuestion);
    });

    $("#save-test").click(function (e) { 
        e.preventDefault();
        if(arr_slch[1] == slgioihan[1] && arr_slch[2] == slgioihan[2] && arr_slch[3] == slgioihan[3]) {
            console.log(arrQuestion)
            $.ajax({
                type: "post",
                url: "./test/addDetail",
                data: {
                    made: infoTest.made,
                    cauhoi: arrQuestion
                },
                success: function (response) {
                    if(response) {
                        Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Thêm câu hỏi thành công!' });
                    } else {
                        Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Tạo đề không thành công!' });
                    }
                }
            });
        } else {
            Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Số lượng câu hỏi không phù hợp!' });
        }
    });

    function loadDataChapter(mamon) {
        return $.ajax({
            type: "post",
            url: "./subject/getAllChapter",
            data: {
                mamonhoc: mamon
            },
            dataType: "json",
            success: function (response) {
                showChapter(response);
            }
        });
    }

    function showChapter(data) {
        let html = `<a class="dropdown-item active data-chapter" href="javascript:void(0)" data-id="0">Tất cả</a>`;
        data.forEach(item => {
            html += `<a class="dropdown-item data-chapter" href="javascript:void(0)" data-id="${item.machuong}">${item.tenchuong}</a>`
        });
        $("#list-chapter").html(html);
    }

    $(document).on("click", ".data-chapter", function () {
        $(".data-chapter.active").removeClass("active");
        $(this).addClass("active");
        let machuong = +$(this).data("id");
        if (machuong === 0) {
            delete mainPagePagination.option.filter.machuong;
        } else {
            mainPagePagination.option.filter.machuong = machuong;
        }
        mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
    });

    $(document).on("click", ".data-dokho", function () {
        $(".data-dokho.active").removeClass("active");
        $(this).addClass("active");
        let dokho = +$(this).data("id");
        if (dokho === 0) {
            delete mainPagePagination.option.filter.dokho;
        } else {
            mainPagePagination.option.filter.dokho = dokho;
        }
        mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
    });
});

const mainPagePagination = new Pagination(null, null, getAnswerListForQuestion);
mainPagePagination.option.controller = "test";
mainPagePagination.option.model = "DeThiModel";
mainPagePagination.option.limit = 10;
mainPagePagination.option.filter = {};
mainPagePagination.option.custom.function = "getQuestionsForTest";

const waitInfoTest = setInterval(function () {
    if (infoTest) {
        mainPagePagination.option.id = infoTest.nguoitao;
        mainPagePagination.option.mamonhoc = infoTest.monthi;
        mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
        clearInterval(waitInfoTest);
    }
}, 200);
