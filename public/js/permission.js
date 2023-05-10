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
                showListNotifications(data);
            }
        });
    });

    function showListNotifications(notifications)
    {
        let html = "";
        if (notifications.length != 0) {
            notifications.forEach(notification => {
                const thoigiantao = new Date(notification.thoigiantao);
                let displayDate;
                if (dateIsValid(thoigiantao)) {
                    displayDate = formatDate(thoigiantao);
                }
                html +=`
                <li>
                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                        <div class="flex-shrink-0 mx-3">
                            <img class="img-avatar img-avatar48" src="./public/media/avatars/${notification.avatar}" alt="">
                        </div>
                        <div class="flex-grow-1 fs-sm pe-2">
                            <!--- <div class="fw-semibold">${notification.noidung}</div>
                            <div class="text-muted">${displayDate || (notification.thoigiantao)}</div>
                            <div class="text-muted">${notification.hoten} - ${notification.tenmonhoc + " - " +notification.tennhom}</div> --->

                            <div class="truncate truncate--3"><span class="fw-semibold">${notification.hoten}</span> đã gửi một thông báo đến học phần <span class="fw-semibold">${notification.tenmonhoc + " - " +notification.tennhom}</span>: ${notification.noidung}${notification.noidung.endsWith(".") ? "" : "."}</div>
                            <div class="text-muted">${displayDate || (notification.thoigiantao)}</div>
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

    function dateIsValid(date) {
        return !Number.isNaN(new Date(date).getTime());
    }

    function formatDate (date) {
        const calcDaysPassed = (date1, date2) => Math.round(Math.abs((date2 - date1) / (1000 * 60 * 60 * 24)));

        const daysPassed = calcDaysPassed(date, new Date());
        if (daysPassed === 0) return 'Hôm nay';
        if (daysPassed === 1) return 'Hôm qua';
        if (daysPassed <= 7) return `${daysPassed} ngày trước`;

        return new Intl.DateTimeFormat(navigator.language, {
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
            hour: "2-digit",
            minute: "2-digit",
        }).format(date);
    }
})