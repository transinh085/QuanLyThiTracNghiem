$(document).ready(function () {
    let groups = [];
    $('.btn-join-group').on("click", function () {
        $.ajax({
            type: "post",
            url: "./client/joinGroup",
            data: {
                mamoi: $("#mamoi").val()
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if(response == 0) {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: "Mã mời không hợp lệ !"});
                    $("#modal-join-group").modal("hide");
                }else if(response == 1) {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: "Bạn đã tham gia nhóm này !"});
                } else {
                    groups.push(response);
                    showListGroup(groups);
                    Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: "Tham gia nhóm thành công !"});
                }
            }
        });
    });

    function loadDataGroups() {
        $.getJSON("./client/loadDataGroups",
            function (data) {
                groups = data;
                showListGroup(data)
            }
        );
    }

    loadDataGroups()

    function showListGroup(groups) {
        let html = ``;
        groups.forEach(group => {
            html += `<div class="col-md-6 col-xl-4">
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header">
                        <div class="flex-grow-1 text-muted fs-sm fw-semibold">
                            <i class="fa fa-user me-2"></i>${group.hoten}
                        </div>
                        <div class="block-options">
                            <div class="dropdown">
                                <button type="button" class="btn btn-alt-secondary dropdown-toggle module__dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-gears"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-users me-1"></i> People
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-bell me-1"></i> Alerts
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-check-double me-1"></i> Tasks
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="be_pages_projects_edit.html">
                                        <i class="fa fa-fw fa-pencil-alt me-1"></i> Edit Project
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content bg-body-light text-center">
                        <h3 class="fs-4 mb-3">
                            <a href="javascript:void(0)" class="link-fx">${group.mamonhoc} - ${group.tenmonhoc}</a>
                        </h3>
                        <h5 class="fs-6 text-muted mb-3">NH${group.namhoc} - HK${group.hocky}</h5>
                        <div class="push">
                            <span class="badge bg-info text-uppercase fw-bold py-2 px-3">${group.tennhom}</span>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row g-sm">
                            <div class="col-6">
                                <a class="btn w-100 btn-alt-secondary" href="javascript:void(0)">
                                    <i class="fa fa-eye me-1 opacity-50"></i> View
                                </a>
                            </div>
                            <div class="col-6">
                                <a class="btn w-100 btn-alt-secondary" href="javascript:void(0)">
                                    <i class="fa fa-archive me-1 opacity-50"></i> Archive
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`
        });
        $("#list-groups").html(html);
    }
});