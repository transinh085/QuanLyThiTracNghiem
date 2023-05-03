Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-select2']);

let groups = [];
$(document).ready(function() {
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
    
    showGroup();
    
    function setGroup(list) {
        list.forEach(item => {
            $(`.select-group-item[value='${item}']`).prop("checked", true);
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
    
    $("#nhom-hp").on("change", function () {
        let index = $(this).val();
        let mamonhoc = groups[index].mamonhoc;
        showListGroup(index);
    });
    
    $(document).on("click","#select-all-group",function () {
        let check = $(this).prop("checked");
        $(".select-group-item").prop("checked", check);
    });

    function getGroupSelected() {
        let result = [];
        $(".select-group-item").each(function() {
            if($(this).prop("checked") == true) {
                result.push($(this).val());
            }
        });
        return result;
    }

    $("#btn-send-announcement").click(function (e) { 
        e.preventDefault();
        
        let nowDate = new Date();
        let nowYear = nowDate.getFullYear();
        let nowMonth = nowDate.getMonth() + 1;
        let nowDay = nowDate.getDate();
        let nowHours = nowDate.getHours();
        let nowMintues = nowDate.getMinutes();
        let nowSeconds = nowDate.getSeconds();
        let format = nowYear + "/" + nowMonth + "/" + nowDay + " " + nowHours + ":" + nowMintues + ":" + nowSeconds;
        $.ajax({
            type: "post",
            url: "./teacher_announcement/sendAnnouncement",
            data: {
                noticeText: $("#name-exam").val(),
                mamonhoc: groups[$("#nhom-hp").val()].mamonhoc,
                manhom: getGroupSelected(),
                thoigiantao: format,
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
            }
        })
    });

    // function showAnnouncement(announces) {
    //     let html = "";
    //     if (announces.length != 0) {
    //         announces.forEach(announce => {
    //             html += `
    //             <li>
    //             <a class="d-flex text-dark py-2" href="javascript:void(0)">
    //                 <div class="flex-shrink-0 mx-3">
    //                     <i class="fa fa-fw fa-plus-circle text-primary"></i>
    //                 </div>
    //                 <div class="flex-grow-1 fs-sm pe-2">
    //                     <div class="fw-semibold">${announce.noidung}}</div>
    //                     <div class="text-muted">2 hours ago</div>
    //                 </div>
    //             </a>
    //         </li>
    //             `;

    //         })
    //     } else {
    //         html += `<p class="text-center">Bạn không có thông báo</p>`
    //     }
    //     $(".list-announce").html(html);
    // }

    // function getListAnnounce() {
    //     const arrTestID = tests.map(el => el.made);
    //     $.ajax({
    //         url: "./teacher_announcement/getGroupsTakeAnnounces",
    //         method: "post",
    //         data: {
    //             announces: arrTestID,
    //         },
    //         dataType: "json",
    //         success: function(response) {
    //         }
    //     });
    // }

});
