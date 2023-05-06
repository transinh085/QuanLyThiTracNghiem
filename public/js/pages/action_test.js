Dashmix.helpersOnLoad(["js-flatpickr", "jq-datepicker", "jq-select2"]);

Dashmix.onLoad(() =>
    class {
        static initValidation() {
            Dashmix.helpers("jq-validation"),
            $.validator.addMethod("validTimeEnd", function(value, element) {
                var startTime = new Date($("#time-start").val());
                var currentTime = new Date();
                var endTime = new Date(value);
                return endTime > startTime && endTime > currentTime;
            }, "Thời gian kết thúc phải lớn hơn thời gian bắt đầu và không bé hơn thời gian hiện tại");
            
            $.validator.addMethod("validTimeStart", function(value, element) {
                var startTime = new Date(value);
                var currentTime = new Date();
                return startTime > currentTime;
            }, "Thời gian bắt đầu không được bé hơn thời gian hiện tại");
            
            
            jQuery(".form-taodethi").validate({
                rules: {
                    "name-exam": {
                        required: !0,
                    },
                    "time-start": {
                        required: !0,
                        validTimeStart: true
                    },
                    "time-end": {
                        required: !0,
                        validTimeEnd: true
                    },
                    "exam-time": {
                        required: !0,
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
                    },
                    trungbinh: {
                        required: !0,
                    },
                    kho: {
                        required: !0,
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
                    },
                    trungbinh: {
                        required: "Vui lòng cho biết số câu trung bình",
                    },
                    kho: {
                        required: "Vui lòng cho biết số câu khó",
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
    if(url[url.length - 2] == "update") {
        param = url[url.length - 1]
        getDetail(param);
    }

    let groups = [];

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
            if(getGroupSelected().length == 0) {
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
                        console.log(response);
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
                console.log(infodethi);
                showInfo(response);
            },
        });
    }

    // Hiển thị thông tin đề thi
    function showInfo(dethi) {
        $("#name-exam").val(dethi.tende),
            $("#exam-time").val(dethi.thoigianthi),
            $("#time-start").flatpickr({
                enableTime: true,
                altInput: true,
                allowInput: true,
                defaultDate: dethi.thoigianbatdau,
            });
        $("#time-end").flatpickr({
            enableTime: true,
            altInput: true,
            allowInput: true,
            defaultDate: dethi.thoigianketthuc,
        });
        $("#coban").val(dethi.socaude),
            $("#trungbinh").val(dethi.socautb),
            $("#kho").val(dethi.socaukho),
            $("#tudongsoande").prop("checked", dethi.loaide == "1" ? true : false);
        $("#xemdiem").prop("checked", dethi.xemdiemthi == "1" ? true : false);
        $("#xemda").prop("checked", dethi.xemdapan == "1" ? true : false);
        $("#xembailam").prop("checked", dethi.xemdapan == "1" ? true : false);
        $("#daocauhoi").prop("checked", dethi.troncauhoi == "1" ? true : false);
        $("#daodapan").prop("checked", dethi.trondapan == "1" ? true : false);
        $("#tudongnop").prop(
            "checked",
            dethi.nopbaichuyentab == "1" ? true : false
        );
        $("#btn-update-test").data("id", dethi.made);
        $.when(showGroup(), showChapter(dethi.monthi)).done(function () {
            $("#nhom-hp").val(findIndexGroup(dethi.nhom[0])).trigger("change");
            setGroup(dethi.nhom)
            if(dethi.loaide == "1") {
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

    function setGroup(list) {
        list.forEach((item) => {
            $(`.select-group-item[value='${item}']`).prop("checked", true);
        });
    }

    // Xử lý nút cập nhật đề thi
    $("#btn-update-test").click(function (e) {
        e.preventDefault();
        let loaide = $("#tudongsoande").prop("checked") ? 1 : 0;
        let made = $(this).data("id");
        console.log(made)
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
                if(response) {
                    if((infodethi.loaide == 1 && loaide == 0) || (loaide == 0 && (infodethi.socaude != socaude || infodethi.socautb != socautb || infodethi.socaukho != socaukho))) {
                        location.href = `./test/select/${made}`
                    } else {
                        location.href = `./test`
                    }
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Cập nhật đề thi không thành công!' });
                }
            }
        });
    });
});
