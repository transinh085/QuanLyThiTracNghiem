function deleteGroup(id) {
    $.ajax({
        type: "post",
        url: "./ajax/deleteGroup",
        data: {
            id: id
        },
        success: function (response) {
            loadDataClass();
            One.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Xoá nhóm thành công!' });
        }
    });
}


function loadDataGroup() {
    fetch('./ajax/loadDataGroup')
    .then(response => response.json())
    .then(data => {
        let html = '';
        data.forEach(item => {
            html += `<div class="col-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="${item.manhom}" id="group-${item.manhom}" name="ds-grp">
                    <label class="form-check-label" for="group-${item.manhom}">${item.tennhom}</label>
                </div>
            </div>`
        });
        $("#list-group").html(html);
    })
    .catch(error => console.error(error));
}



$("#add_group").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "./lop/addGroup",
        data: {
            name: $("#name_group").val()
        },
        success: function (response) {
            loadDataGroup();
            $("#collapseExample").collapse('hide');
        }
    });
});


$("#add_class").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "./lop/addClass",
        data: {
            name: $("#class_name").val(),
            group: $('input[name="ds-grp"]:checked').val()
        },
        success: function (response) {
            $("#class_name").val("");
            $("#modal-block-vcenter").modal("hide");
            loadDataClass();
            One.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Thêm lớp thành công!' });
        }
    });
});


function loadDataClass() {
    let html = '';
    $.ajax({
        type: "post",
        url: "./ajax/loadDataClass",
        dataType: "json",
        success: function (response) {
            response.forEach(item => {
                html += `<div>
                <div class="heading-group d-flex align-items-center">
                    <h2 class="content-heading">${item.tennhom}</h2>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm btn-alt-secondary space-x-1 ms-2" id="dropdown-content-rich-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-pencil"></i>
                        </button>
                        <div class="dropdown-menu p-1" aria-labelledby="dropdown-content-rich-primary">
                        <div class="p-2" style="width:200px">
                            <div class="mb-3">
                            <label class="form-label" for="tennhom_${item.manhom}">Cập nhật nhóm</label>
                            <input type="email" class="form-control" id="tennhom_${item.manhom}" name="tennhom_${item.manhom}" value="${item.tennhom}">
                            </div>
                            <button class="btn btn-sm btn-danger delete_group" onclick="deleteGroup(${item.manhom})">Xoá</button>
                            <button class="btn btn-sm btn-primary update_group" data-id="${item.manhom}">Cập nhật</button>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">`;
                if (item.class.length == 0) {
                    html += `<p class="text-center">Không có lớp nào</p>`
                } else {
                    item.class.forEach(element => {
                        html += `<div class="col-sm-6 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-shadow" href="./lop/detail/">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">${element.tenlop}</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn btn-sm btn-alt-primary" data-id="${element.malop}"><i class="si si-pencil"></i></button>
                                        <button type="button" class="btn btn-sm btn-alt-danger" data-id="${element.malop}"><i class="fa fa-fw fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <p>Sỉ số: 0</p>
                                </div>
                            </a>
                        </div>`
                    });
                }
                html += `</div></div>`;
            });
            $("#class-group").html(html);
        }
    });
}

loadDataClass();
loadDataGroup();