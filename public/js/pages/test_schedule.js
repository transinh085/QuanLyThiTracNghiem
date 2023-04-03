function showData(data) {
  let html = "";
  data.forEach((test) => {
    let htmlTestState = ``;
    const open = new Date(test.thoigianbatdau);
    const close = new Date(test.thoigianketthuc);
    const now = Date.now();
    if (now < +open) {
      // chua toi gio mo de
      htmlTestState += `<button class="btn btn-alt-secondary rounded-pill px-3 me-1 my-1" disabled>Chưa mở</button>`;
    } else if (now >= +open && now <= +close) {
      // kiem tra: da nop/co the lam bai
      htmlTestState += `<button class="btn btn-alt-success rounded-pill px-3 my-1" disabled>Có thể vào thi</button>`;
    } else {
      // qua han
      htmlTestState += `<button class="btn btn-alt-danger rounded-pill px-3 my-1" disabled>Quá hạn</button>`;
    }
    html += `
    <div class="block block-rounded block-fx-pop mb-2">
        <div class="block-content block-content-full border-start border-3 border-primary">
            <div class="d-md-flex justify-content-md-between align-items-md-center">
                <div class="p-1 p-md-3">
                    <h3 class="h4 fw-bold mb-3">
                        <a href="./test/start/${test.made}" class="text-dark link-fx">${test.tende}</a>
                    </h3>
                    <p class="fs-sm text-muted mb-2">
                        <i class="fa fa-layer-group me-1"></i></i> <strong>${test.tenmonhoc} - NH${test.namhoc} - HK${test.hocky}</strong>
                    </p>
                    <p class="fs-sm text-muted mb-0">
                        <i class="fa fa-clock me-1"></i> Diễn ra từ <span>${test.thoigianbatdau}</span> đến <span>${test.thoigianketthuc}</span>
                    </p>
                </div>
                <div class="p-1 p-md-3">
                ${htmlTestState}
                    <a class="btn btn-alt-info rounded-pill px-3 me-1 my-1" href="./test/start/${test.made}">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>`;
  });
  $(".list-test").html(html);
}

$(document).ready(function () {
  function renderUserTestSchedule() {
    $.ajax({
      type: "post",
      url: "./client/getUserTestSchedule",
      dataType: "json",
      success: function (data) {
        showData(data);
      },
      error: function (error) {
        console.error(error.responseText);
      },
    });
  }

  function getCurrentUID() {
    $.ajax({
      type: "post",
      url: "./client/getUserID",
      dataType: "json",
      success: function (id) {
        currentUser = id;
        loadPage();
      },
      error: function (error) {
        console.error(error.responseText);
      },
    });
  }

  function loadPage() {
    const args = {
      manguoidung: currentUser,
    };
    getNumberPage("client", currentPage, args);
    fetch_data("client", currentPage, args);
  }

  $(document).on("click", ".page-link", function () {
    var page = $(this).attr("id");
    currentPage = page;
    loadPage();
  });

  $("#search-form").on("submit", function (e) {
    e.preventDefault();
    loadPage();
  });

  let currentUser;
  let currentPage = 1;
  getCurrentUID();
});
