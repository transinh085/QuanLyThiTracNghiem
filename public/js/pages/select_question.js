let url = location.href.split("/");
let made = url[url.length - 1];
let infoTest
let arrQuestion = [];
let arrQuesDe = [];
let arrQuesKho = [];
let arrQuesTB = [];

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

getInfoTest();

$.when(getInfoTest()).done(function(){
    console.log(infoTest)
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
            }
        });
    }

    function showListQuestion(questions) {
        let html = ``;
        questions.forEach(question => {
            let dokho = '';
            if(question.dokho == 1) dokho ='Dễ';
            else if(question.dokho == 2) dokho ='TB';
            else if(question.dokho == 3) dokho ='Khó';
            html += `<li class="list-group-item d-flex">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="${question.macauhoi}">
                    <label class="form-check-label text-muted" for="${question.macauhoi}" style="word-break: break-all;">${question.noidung}</label>
                </div>
                <span class="badge rounded-pill bg-dark m-1 float-end h-100">${dokho}</span>
                
            </li>`
        });
        $("#list-question").html(html);
    }
    loadDataListQuestion();


});