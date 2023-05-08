Dashmix.helpersOnLoad(["js-flatpickr", "jq-datepicker", "jq-select2"]);

let groups = [];

function getToTalQuestionOfChapter(chuong, monhoc, dokho) {
    var result = 0;
    $.ajax({
        url: './question/getsoluongcauhoi',
        type: 'post',
        data: {
            chuong: chuong,
            monhoc: monhoc,
            dokho: dokho
        },
        async: false,
        success: function (response) {
            result = response;
        }
    });
    return result;
}

function getMinutesBetweenDates(start, end) {
    // Chuyển đổi đối số thành đối tượng Date
    const startDate = new Date(start);
    const endDate = new Date(end);

    // Tính số phút giữa hai khoảng thời gian
    const diffMs = endDate.getTime() - startDate.getTime();
    const diffMins = Math.round(diffMs / 60000);

    // Trả về số phút tính được
    return diffMins;
}



Dashmix.onLoad(() =>
    class {
        static initValidation() {
            Dashmix.helpers("jq-validation"),
                $.validator.addMethod("validTimeEnd", function (value, element) {
                    var startTime = new Date($("#time-start").val());
                    var currentTime = new Date();
                    var endTime = new Date(value);
                    return endTime > startTime && endTime > currentTime;
                }, "Thời gian kết thúc phải lớn hơn thời gian bắt đầu và không bé hơn thời gian hiện tại");

            $.validator.addMethod("validTimeStart", function (value, element) {
                var startTime = new Date(value);
                var currentTime = new Date();
                return startTime > currentTime;
            }, "Thời gian bắt đầu không được bé hơn thời gian hiện tại");

            $.validator.addMethod('validSoLuong', function (value, element, param) {
                let c = $("#chuong").val() === undefined ? "" : $("#chuong").val();
                let m = $("#nhom-hp").val() == "" ? 0 : groups[$("#nhom-hp").val()].mamonhoc;
                let result = parseInt(getToTalQuestionOfChapter(c, m, param)) >= parseInt(value);
                return result;
            }, 'Số lượng câu hỏi không đủ');

            $.validator.addMethod('validThoigianthi', function (value, element, param) {
                let startTime = new Date($("#time-start").val());
                let endTime = new Date($("#time-end").val());
                return startTime < endTime && parseInt(getMinutesBetweenDates(startTime, endTime)) >= parseInt(value);
            }, 'Thời gian làm bài không hợp lệ');

            jQuery(".form-taodethi").validate({
                rules: {
                    "name-exam": {
                        required: true,
                    },
                    "time-start": {
                        required: !0,
                        validTimeStart: true
                    },
                    "time-end": {
                        required: !0,
                        validTimeEnd: true,
                    },
                    "exam-time": {
                        required: !0,
                        digits: true,
                        validThoigianthi: true,
                    },
                    "nhom-hp": {
                        required: !0,
                    },
                    user_nhomquyen: {
                        required: !0,
                    },
                    chuong: {
                        required: !0,
                    },
                    coban: {
                        required: !0,
                        digits: true,
                        validSoLuong: 1
                    },
                    trungbinh: {
                        required: !0,
                        digits: true,
                        validSoLuong: 2
                    },
                    kho: {
                        required: !0,
                        digits: true,
                        validSoLuong: 3
                    },
                },
                messages: {
                    "name-exam": {
                        required: "Vui lòng nhập tên đề kiểm tra",
                    },
                    "time-start": {
                        required: "Vui lòng chọn thời điểm bắt đầu của bài kiểm tra",
                        validTimeStart: "Thời gian bắt đầu không được bé hơn thời gian hiện tại"
                    },
                    "time-end": {
                        required: "Vui lòng chọn thời điểm kết thúc của bài kiểm tra",
                        validTimeEnd: "Thời gian kết thúc không hợp lệ"
                    },
                    "exam-time": {
                        required: "Vui lòng chọn thời gian làm bài kiểm tra",
                    },
                    "nhom-hp": {
                        required: "Vui lòng chọn nhóm học phần giảng dạy",
                    },
                    chuong: {
                        required: "Vui lòng chọn số chương cho đề kiểm tra",
                    },
                    coban: {
                        required: "Vui lòng cho biết số câu dễ",
                        digits: "Vui lòng nhập số"
                    },
                    trungbinh: {
                        required: "Vui lòng cho biết số câu trung bình",
                        digits: "Vui lòng nhập số"
                    },
                    kho: {
                        required: "Vui lòng cho biết số câu khó",
                        digits: "Vui lòng nhập số"
                    },
                },
            });
        }
        static init() {
            this.initValidation();
        }
    }.init()
);

$(document).ready(function () {
    // Xử lý cắt url để lấy mã đề thi
    let url = location.href.split("/");
    let param = 0
    if (url[url.length - 2] == "update") {
        param = url[url.length - 1]
        getDetail(param);
    }

    function showGroup() {
        let html = "<option></option>";
        $.ajax({
            type: "post",
            url: "./module/loadData",
            async: false,
            data: {
                hienthi: 1,
            },
            dataType: "json",
            success: function (response) {
                groups = response;
                response.forEach((item, index) => {
                    html += `<option value="${index}">${item.mamonhoc +
                        " - " +
                        item.tenmonhoc +
                        " - NH" +
                        item.namhoc +
                        " - HK" +
                        item.hocky
                        }</option>`;
                });
                $("#nhom-hp").html(html);
            },
        });
    }

    // Khi chọn nhóm học phần thì chương sẽ tự động đổi để phù hợp với môn học
    $("#nhom-hp").on("change", function () {
        let index = $(this).val();
        let mamonhoc = groups[index].mamonhoc;
        showListGroup(index);
        showChapter(mamonhoc);
    });

    // Hiển thị chương
    function showChapter(mamonhoc) {
        let html = "<option value=''></option>";
        $("#chuong").val("").trigger("change");
        $.ajax({
            type: "post",
            url: "./subject/getAllChapter",
            async: false,
            data: {
                mamonhoc: mamonhoc,
            },
            dataType: "json",
            success: function (data) {
                data.forEach((item) => {
                    html += `<option value="${item.machuong}">${item.tenchuong}</option>`;
                });
                $("#chuong").html(html);
            },
        });
    }

    // Hiển thị danh sách nhóm học phần
    function showListGroup(index) {
        let html = ``;
        if (groups[index].nhom.length > 0) {
            html += `<div class="col-12 mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="select-all-group">
                <label class="form-check-label" for="select-all-group">Chọn tất cả</label>
            </div></div>`;
            groups[index].nhom.forEach((item) => {
                html += `<div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input select-group-item" type="checkbox" value="${item.manhom}"
                            id="nhom-${item.manhom}" name="nhom-${item.manhom}">
                        <label class="form-check-label" for="nhom-${item.manhom}">${item.tennhom}</label>
                    </div>
                </div>`;
            });
        } else {
            html += `<div class="text-center fs-sm"><img style="width:100px" src="./public/media/svg/empty_data.png" alt=""></div>`;
        }
        $("#list-group").html(html);
    }

    // Chọn || Huỷ chọn tất cả nhóm
    $(document).on("click", "#select-all-group", function () {
        let check = $(this).prop("checked");
        $(".select-group-item").prop("checked", check);
    });

    // Lấy các nhóm được chọn
    function getGroupSelected() {
        let result = [];
        $(".select-group-item").each(function () {
            if ($(this).prop("checked") == true) {
                result.push($(this).val());
            }
        });
        return result;
    }

    $("#tudongsoande").on("click", function () {
        $(".show-chap").toggle();
        $("#chuong").val("").trigger("change");
    });

    showGroup();

    // Xừ lý sự kiện nhấn nút tạo đề
    $("#btn-add-test").click(function (e) {
        e.preventDefault();
        if ($(".form-taodethi").valid()) {
            if (getGroupSelected().length != 0) {
                $.ajax({
                    type: "post",
                    url: "./test/addTest",
                    data: {
                        mamonhoc: groups[$("#nhom-hp").val()].mamonhoc,
                        tende: $("#name-exam").val(),
                        thoigianthi: $("#exam-time").val(),
                        thoigianbatdau: $("#time-start").val(),
                        thoigianketthuc: $("#time-end").val(),
                        socaude: $("#coban").val(),
                        socautb: $("#trungbinh").val(),
                        socaukho: $("#kho").val(),
                        chuong: $("#chuong").val(),
                        loaide: $("#tudongsoande").prop("checked") ? 1 : 0,
                        xemdiem: $("#xemdiem").prop("checked") ? 1 : 0,
                        xemdapan: $("#xemda").prop("checked") ? 1 : 0,
                        xembailam: $("#xembailam").prop("checked") ? 1 : 0,
                        daocauhoi: $("#daocauhoi").prop("checked") ? 1 : 0,
                        daodapan: $("#daodapan").prop("checked") ? 1 : 0,
                        tudongnop: $("#tudongnop").prop("checked") ? 1 : 0,
                        manhom: getGroupSelected(),
                    },
                    success: function (response) {
                        if (response) {
                            if ($("#tudongsoande").prop("checked")) location.href = "./test";
                            else location.href = `./test/select/${response}`;
                        } else {
                            Dashmix.helpers("jq-notify", {
                                type: "danger",
                                icon: "fa fa-times me-1",
                                message: "Tạo đề thi không thành công!",
                            });
                        }
                    },
                });
            } else {
                Dashmix.helpers("jq-notify", {
                    type: "danger",
                    icon: "fa fa-times me-1",
                    message: "Bạn phải chọn ít nhất một nhóm học phần!",
                });
            }
        }
    });

    /*Chỉnh sửa đề thi*/
    $("#btn-update-quesoftest").hide();
    // Khởi tạo biến đề thi để chứa thông tin đề
    let infodethi;
    function getDetail(made) {
        return $.ajax({
            type: "post",
            url: "./test/getDetail",
            data: {
                made: made,
            },
            dataType: "json",
            success: function (response) {
                if (response.loaide == 0) {
                    $("#btn-update-quesoftest").show();
                    $("#btn-update-quesoftest").attr(
                        "href",
                        `./test/select/${response.made}`
                    );
                }
                infodethi = response;
                showInfo(response);
            },
        });
    }


    function checkDate(time) {
        let valid = true;
        let dateToCompare = new Date(time);
        let currentTime = new Date(); // Thời gian hiện tại
        if (dateToCompare.getTime() >= currentTime.getTime()) valid = false;
        return valid;
    }

    // Hiển thị thông tin đề thi
    function showInfo(dethi) {
        let checkD = checkDate(dethi.thoigianbatdau);
        $("#name-exam").val(dethi.tende),
            $("#exam-time").val(dethi.thoigianthi),
            $("#exam-time").prop("disabled", checkD);
        $("#time-start").flatpickr({
            enableTime: true,
            altInput: true,
            allowInput: checkD,
            defaultDate: dethi.thoigianbatdau,
            onReady: function (selectedDates, dateStr, instance) {
                if (checkD) {
                    $(instance.input).prop("disabled", true);
                    instance._input.disabled = true;
                }
            }
        });
        $("#time-end").flatpickr({
            enableTime: true,
            altInput: true,
            allowInput: true,
            defaultDate: dethi.thoigianketthuc,
        });
        $("#coban").val(dethi.socaude),
            $("#coban").prop("disabled", checkD);
        $("#trungbinh").val(dethi.socautb),
            $("#trungbinh").prop("disabled", checkD);
        $("#kho").val(dethi.socaukho),
            $("#kho").prop("disabled", checkD);
        $("#tudongsoande").prop("checked", dethi.loaide == "1");
        $("#tudongsoande").prop("disabled", checkD);
        $("#xemdiem").prop("checked", dethi.xemdiemthi == "1");
        $("#xemda").prop("checked", dethi.xemdapan == "1");
        $("#xembailam").prop("checked", dethi.xemdapan == "1");
        $("#daocauhoi").prop("checked", dethi.troncauhoi == "1");
        $("#daodapan").prop("checked", dethi.trondapan == "1");
        $("#tudongnop").prop("checked", dethi.nopbaichuyentab == "1");
        $("#btn-update-test").data("id", dethi.made);
        $.when(showGroup(), showChapter(dethi.monthi)).done(function () {
            $("#nhom-hp").val(findIndexGroup(dethi.nhom[0])).trigger("change");
            setGroup(dethi.nhom, dethi.thoigianbatdau)
            if (dethi.loaide == "1") {
                $("#chuong").prop("disabled", checkD);
                $('#chuong').val(dethi.chuong).trigger("change");
            } else $(".show-chap").hide();
        });
    }

    function findIndexGroup(manhom) {
        let i = 0;
        let index = -1;
        while (i <= groups.length && index == -1) {
            index = groups[i].nhom.findIndex((item) => item.manhom == manhom);
            if (index == -1) i++;
        }
        return i;
    }

    function setGroup(list, date) {
        let v = checkDate(date);
        $("#select-all-group").prop("disabled", v);
        list.forEach((item) => {
            $(`.select-group-item[value='${item}']`).prop("checked", true);
            $(`.select-group-item[value='${item}']`).prop("disabled", v);
        });
    }

    function validUpdate() {
        let check = true;
        if ($("#name-exam").val() == "") {
            Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Tên đề không được để trống' });
            check = false;
        }
        var startTime = new Date($("#time-start").val());
        var endTime = new Date($("#time-end").val());

        if (endTime <= startTime) {
            Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Thời gian kết thúc không được bé hơn thời gian bắt đầu' });
            check = false;
        }

        if (endTime <= new Date(infodethi.thoigianketthuc)) {
            Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Thời gian kết thúc phải lớn hơn thời gian kết thúc cũ' });
            check = false;
        }

        console.log(getMinutesBetweenDates(startTime, endTime))
        if (endTime > startTime && getMinutesBetweenDates(startTime, endTime) < infodethi.thoigianthi) {
            Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Thời gian làm bài không hợp lệ' });
            check = false;
        }

        return check
    }

    // Xử lý nút cập nhật đề thi
    $("#btn-update-test").click(function (e) {
        e.preventDefault();
        if ((!checkDate(infodethi.thoigianbatdau) && $(".form-taodethi").valid()) || validUpdate()) {
            let loaide = $("#tudongsoande").prop("checked") ? 1 : 0;
            let made = $(this).data("id");
            let socaude = $("#coban").val();
            let socautb = $("#trungbinh").val();
            let socaukho = $("#kho").val();
            $.ajax({
                type: "post",
                url: "./test/updateTest",
                data: {
                    made: made,
                    mamonhoc: groups[$("#nhom-hp").val()].mamonhoc,
                    tende: $("#name-exam").val(),
                    thoigianthi: $("#exam-time").val(),
                    thoigianbatdau: $("#time-start").val(),
                    thoigianketthuc: $("#time-end").val(),
                    socaude: socaude,
                    socautb: socautb,
                    socaukho: socaukho,
                    chuong: $("#chuong").val(),
                    loaide: loaide,
                    xemdiem: $("#xemdiem").prop("checked") ? 1 : 0,
                    xemdapan: $("#xemda").prop("checked") ? 1 : 0,
                    xembailam: $("#xembailam").prop("checked") ? 1 : 0,
                    daocauhoi: $("#daocauhoi").prop("checked") ? 1 : 0,
                    daodapan: $("#daodapan").prop("checked") ? 1 : 0,
                    tudongnop: $("#tudongnop").prop("checked") ? 1 : 0,
                    manhom: getGroupSelected()
                },
                success: function (response) {
                    if (response) {
                        if ((infodethi.loaide == 1 && loaide == 0) || (loaide == 0 && (infodethi.socaude != socaude || infodethi.socautb != socautb || infodethi.socaukho != socaukho))) {
                            location.href = `./test/select/${made}`
                        } else {
                            location.href = `./test`
                        }
                    } else {
                        Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Cập nhật đề thi không thành công!' });
                    }
                }
            });
        }
    });
});
