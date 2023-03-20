Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-select2']);
$(document).ready(function () {
    let groups = [];
    function showGroup() {
        let html = "<option></option>";
        $.ajax({
            type: "post",
            url: "./module/loadData",
            data: {
                hienthi: 1
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                groups = response;
                response.forEach((item,index) => {
                    html += `<option value="${index}">${item.mamonhoc + " - " + item.tenmonhoc + " - NH"+ item.namhoc + " - HK"+ item.hocky}</option>`;
                });
                $("#nhom-hp").html(html);
            }
        });
    }

    showGroup();

    $("#nhom-hp").on("change", function () {
        let index = $(this).val();
        let mamonhoc = groups[index].mamonhoc;
        showListGroup(index);
        showChapter(mamonhoc);
    });

    function showChapter(mamonhoc) {
        let html = "<option value=''></option>";
        $("#chuong").val("").trigger("change");
        $.ajax({
            type: "post",
            url: "./subject/getAllChapter",
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

    function showListGroup(index) {
        let html = ``;
        if(groups[index].nhom.length > 0) {
            html += `<div class="col-12 mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="select-all-group">
                <label class="form-check-label" for="select-all-group">Chọn tất cả</label>
            </div></div>`
            groups[index].nhom.forEach(item => {
                html += `<div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input select-group-item" type="checkbox" value="${item.manhom}"
                            id="nhom-${item.manhom}" name="nhom-${item.manhom}">
                        <label class="form-check-label" for="nhom-${item.manhom}">${item.tennhom}</label>
                    </div>
                </div>`
            });
        } else {
            html += `<div class="text-center fs-sm"><img style="width:100px" src="./public/media/svg/empty_data.png" alt=""></div>`;
        }
        $("#list-group").html(html);
    }

    $(document).on("click","#select-all-group",function () {
        let check = $(this).prop("checked");
        $(".select-group-item").prop("checked", check);
    });

    $("#tudongsoande").on("click", function () {
        $(".show-chap").toggle();
    });

    $("#btn-add-test").click(function (e) { 
        e.preventDefault();
        let monhoc = $("#nhom-hp").val();
        let tendethi = $("#name-exam").val();
        let thoigianbatdau = $("#time-start").val();
        let thoigianketthuc = $("#time-end").val();
        let thoigianlambai = $("#exam-time").val();
        let chuong = $("#chuong").val();
        let socaude = $("#coban").val();
        let socautb = $("#trungbinh").val();
        let socaukho = $("#kho").val();
        let tudongsoande = $("#tudongsoande").prop("checked");
        let xemdiem = $("#xemdiem").prop("checked");
        let xemdapan = $("#xemda").prop("checked");
        let xembailam = $("#xembailam").prop("checked");
        let daocauhoi = $("#daocauhoi").prop("checked");
        let daodapan = $("#daodapan").prop("checked");
        let tudongnop = $("#tudongnop").prop("checked");
        $.ajax({
            type: "post",
            url: "./test/add",
            data: {
                tende: tendethi,
                thoigianthi: thoigianlambai,
                thoigianbatdau: thoigianbatdau,
                thoigianketthuc: thoigianketthuc,
                socaude: socaude,
                socautb: socautb,
                socaukho: socaukho,
                chuong: chuong,
                loaide: tudongsoande,
                xemdiem: xemdiem,
                xemdapan: xemdapan,
                xembailam: xembailam,
                daocauhoi: daocauhoi,
                daodapan: daodapan,
                tudongnop: tudongnop
            },
            success: function (response) {
                
            }
        });
    });
});