// Cắt tham số url
let url = location.href.split("/");
let made = url[url.length - 1];
let infoTest
// Khởi tạo mảng câu hỏi của đề thi
let arrQuestion = [];
// Khởi tạo mảng danh sách câu hỏi lấy từ db
let questions = [];
// Khởi tạo số lượng câu hỏi
let arr_slch = [0,0,0,0];

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


// Đợi khi ajax getInfoTest() thực hiện hoàn tất
$.when(getInfoTest()).done(function(){
    console.log(infoTest)
    $("#name-test").text(infoTest.tende)
    $("#test-time").text(infoTest.thoigianthi);
    let slgioihan = [0,infoTest.socaude,infoTest.socautb,infoTest.socaukho]

    function displayQuantityQueston() {
        $("#slcaude").text(arr_slch[1]);
        $("#ttcaude").text(infoTest.socaude);
        $("#slcautb").text(arr_slch[2]);
        $("#ttcautb").text(infoTest.socautb);
        $("#slcaukho").text(arr_slch[3]);
        $("#ttcaukho").text(infoTest.socaukho);
    }
    displayQuantityQueston()

    function loadDataListQuestion() {
        $.ajax({
            type: "post",
            url: "./question/getQuestionBySubject",
            data: {
                mamonhoc: infoTest.monthi,
                machuong: 0,
                dokho: 0,
                content: ''
            },
            dataType: "json",
            success: function (response) {
                showListQuestion(response);
                questions = response;
            }
        });
    }

    // Hiển thị danh sách câu hỏi của môn học ở cột bên trái
    function showListQuestion(questions) {
        let html = ``;
        questions.forEach((question,index) => {
            let dokho = '';
            if(question.dokho == 1) dokho ='Dễ';
            else if(question.dokho == 2) dokho ='TB';
            else if(question.dokho == 3) dokho ='Khó';
            html += `<li class="list-group-item d-flex">
                <div class="form-check">
                    <input class="form-check-input item-question" type="checkbox" id="q-${question.macauhoi}" data-id="${question.macauhoi}" data-index="${index}">
                    <label class="form-check-label text-muted" for="q-${question.macauhoi}" style="word-break: break-all;">${question.noidung}</label>
                </div>
                <span class="badge rounded-pill bg-dark m-1 float-end h-100">${dokho}</span>
                
            </li>`
        });
        $("#list-question").html(html);
    }
    loadDataListQuestion();

    // Xử lý sự kiện change trên ô input câu hỏi
    $(document).on("click", ".item-question",function () {
        let index = $(this).data("index");
        let macauhoi = $(this).data("id");
        if(arr_slch[`${questions[index].dokho}`] < slgioihan[`${questions[index].dokho}`]) {
            if($(this).prop("checked") == true) {
                arrQuestion.push(questions[index]);
                arr_slch[`${questions[index].dokho}`]++;
            } else {
                let i = arrQuestion.findIndex(item => item.macauhoi == macauhoi);
                arrQuestion.splice(i,1);
                arr_slch[`${questions[index].dokho}`]--;
            }
            displayQuantityQueston();
            showListQuesOfTest(arrQuestion);
        } else {
            Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Số lượng câu hỏi ở mức độ đã đủ!' });
        }
        console.log(slgioihan[`${questions[index].dokho}`]);
    });

    // Hiển thị preview bên phải
    function showListQuesOfTest(questions) {
        let html = ``;
        if(questions.length == 0) {
            html += `<p class="text-center">Chưa có câu hỏi</p>`
        } else {
            questions.forEach((question,index) => {
                html += `<div class="question mb-3 d-flex justify-content-between">
                    <div class="question-top px-3">
                        <p class="question-content fw-bold mb-3">${index + 1}. ${question.noidung}</p>
                        <div class="row">`;
                let answer = getAnswer(question.macauhoi);;
                answer.forEach((item,i) => {
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

    showListQuesOfTest(arrQuestion)

    $(document).on("click", ".btn-up",function () {
        let index = $(this).data("index");
        let a = arrQuestion[index];
        arrQuestion[index] = arrQuestion[index - 1];
        arrQuestion[index - 1] = a;
        $(this).tooltip('hide');
        showListQuesOfTest(arrQuestion);
    });

    $(document).on("click", ".btn-down",function () {
        let index = $(this).data("index");
        let a = arrQuestion[index];
        arrQuestion[index] = arrQuestion[index + 1];
        arrQuestion[index + 1] = a;
        $(this).tooltip('hide');
        showListQuesOfTest(arrQuestion);
    });

    $(document).on("click", ".btn-delete",function () {
        let index = $(this).data("index");
        arr_slch[`${arrQuestion[index].dokho}`]--
        $(`#q-${arrQuestion[index].macauhoi}`).prop("checked",false);
        $(this).tooltip('hide');
        arrQuestion.splice(index,1);
        showListQuesOfTest(arrQuestion);
        displayQuantityQueston()
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
                // dataType: "json",
                success: function (response) {
                    console.log(response);
                    if(response) {
                        location.href = "./test";
                    } else {
                        Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Tạo đề không thành công!' });
                    }
                }
            });
        } else {
            Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Số lượng câu hỏi chưa đủ!' });
        }
    });
});