let role = [];
$.getJSON("./account/getRole",
    function (data, textStatus, jqXHR) {
        role = data;
    }
);

$(document).ajaxStop(function () {
    $("[data-role]").each(function() {
        if(role[`${$(this).data("role")}`] === undefined || !role[`${$(this).data("role")}`].includes($(this).data("action"))) {
            $(this).remove();
        } else {
            $(this).addClass("show");
        }
    });
    $(".col-action").each(function() {
        if($(this).children().length == 0) {
            $(this).remove();
        }
    });
    $(".col-header-action").each(function() {
        if($(this).closest("table").find(".col-action").length != 0) {
            $(this).show()
        }
    })
});

$(document).ready(function () {

$(".btn-show-notifications").on("click", function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "./teacher_announcement/getNotifications",
        dataType: "json",
        success: function(data) {
            console.log(data)
            showListNotifications(data);
        }
    });
});

function showListNotifications(notifications)
{
    let html = "";
    if (notifications.length != 0) {
        notifications.forEach(notification => {
            html +=`
            <li>
                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                        <img class="img-avatar img-avatar48" src="./public/media/avatars/${notification.avatar}" alt="">
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                        <div class="fw-semibold">${notification.noidung}</div>
                        <div class="text-muted">${notification.thoigiantao}</div>
                        <div class="text-muted">${notification.tennhom}</div>
                    </div>
                </a>
            </li>
            `;
        })
    } else {
        html += `<p class="text-center">Không có thông báo</p>`
    }
    $(".list-notifications").html(html);
}

})