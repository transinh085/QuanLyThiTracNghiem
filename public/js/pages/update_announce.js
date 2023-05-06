$(document).ready(function() {


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
    
    $("#nhom-hp").on("change", function () {
        let index = $(this).val();
        showListGroup(index);
    });


    // Xử lý cắt url để lấy mã thông báo
    let url = location.href.split("/");
    let param = 0
    if(url[url.length - 2] == "update") {
        param = url[url.length - 1]
        console.log(param);
        getDetail(param);
    }

    function showGroup() {
        let html = "<option></option>";
        $.ajax({
            type: "post",
            url: "./module/loadData",
            async: false,
            data: {
                hienthi: 1
            },
            dataType: "json",
            success: function (response) {
                groups = response;
                response.forEach((item,index) => {
                    html += `<option value="${index}">${item.mamonhoc + " - " + item.tenmonhoc + " - NH"+ item.namhoc + " - HK"+ item.hocky}</option>`;
                });
                $("#nhom-hp").html(html);
            }
        });
    }
    // Hiển thị thông tin thông báo
    function showAnnounce(announce) {
        $("#name-exam").val(announce.noidung),
        $("#btn-update-announce").data("id",announce.matb)
        $.when(showGroup()).done(function(){
            $("#nhom-hp").val(findIndexGroup(announce.nhom[0])).trigger("change");
            setGroup(announce.nhom);
        })
    }

    function findIndexGroup(manhom) {
        let i = 0;
        let index = -1;
        while(i <= groups.length && index == -1) {
            index = groups[i].nhom.findIndex(item => item.manhom == manhom);
            if(index == -1) i++; 
        }
        return i;
    }

    function setGroup(list) {
        list.forEach(item => {
            $(`.select-group-item[value='${item}']`).prop("checked", true);
        });
    }

    function getGroupSelected() {
        let result = [];
        $(".select-group-item").each(function() {
            if($(this).prop("checked") == true) {
                result.push($(this).val());
            }
        });
        return result;
    }

    $(document).on("click","#select-all-group",function () {
        let check = $(this).prop("checked");
        $(".select-group-item").prop("checked", check);
    });

    function getDetail(matb) {
        $.ajax({
            type: "post",
            url: "./teacher_announcement/getDetail",
            data: {
                matb: matb
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                showAnnounce(response)
            }
        });
    }

    // Xử lý nút cập nhật thông báo
    $("#btn-update-announce").click(function (e) {
        e.preventDefault();
        let matb = $(this).data("id");
        console.log(matb);
        $.ajax({
            type: "post",
            url: "./teacher_announcement/updateAnnounce",
            data: {
                matb: matb,
                mamonhoc: groups[$("#nhom-hp").val()].mamonhoc,
                noidung: $("#name-exam").val(),
                manhom: getGroupSelected()
            },
            success: function (response) {
                if(response) {
                        location.href = `./teacher_announcement`
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Cập nhật thông báo không thành công!' });
                }
            }
        });
    });

})