// let ajaxResult;
// function mySuccessCallback(response) {
//   ajaxResult = response;
// }

// function fetch_data(query, page) {
//   $.ajax({
//     url: `./home/pagination`,
//     method: "post",
//     data: {
//       query: query,
//       page: page,
//     },
//     dataType: "json",
//     success: mySuccessCallback,
//     error: function (err) {
//       console.error(err);
//     },
//   });
// }

const fetch_data = function (query, page) {
  $.ajax({
    url: `./home/pagination`,
    method: "post",
    data: {
      query: query,
      page: page,
    },
    dataType: "json",
    success: function (data) {
      showData(data);
    },
    error: function (err) {
      console.error(err);
    },
  });
};

function getNumberPage(query, page = 0) {
  page = Number.parseInt(page);
  let html = "";
  $.ajax({
    url: `./home/getNumberPage`,
    method: "post",
    data: {
      query: query,
    },
    success: function (numberPages) {
      if (numberPages == 0) return;
      let prev = page > 1 ? page - 1 : 1;
      let next = page < numberPages ? page + 1 : numberPages;
      html += `<li class="page-item ${page == 1 ? "disabled" : "active"}">
                            <a class="page-link" id="${prev}" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                                Prev
                            </a>
                        </li>
                `;
      for (let i = 1; i <= numberPages; i++) {
        html += `
                    <li class="page-item ${i == page ? "active" : ""}">
                        <a class="page-link" id="${i}" href="javascript:void(0)">${i}</a>
                    </li>
                    `;
      }
      html += `
                <li class="page-item ${
                  page == numberPages ? "disabled" : "active"
                }">
                    <a class="page-link" id="${next}" href="javascript:void(0)" aria-label="Next">
                        Next
                    </a>
                </li>
                `;
      $("#getNumberPage").html(html);
    },
  });
}
