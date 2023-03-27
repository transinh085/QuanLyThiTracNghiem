function optionArgument(page) {
  var input = $("#search-input").val();
  const option = {
    page: page,
  };
  if (input != "") option.input = input;
  return option;
}

function fetch_data(controller, page) {
  const option = optionArgument(page);
  $.ajax({
    url: `./${controller}/pagination`,
    method: "post",
    data: option,
    dataType: "json",
    success: function (data) {
      showData(data);
    },
    error: function (err) {
      console.error(err.responseText);
    },
  });
}

function getNumberPage(controller, page = 0) {
  page = Number.parseInt(page);
  const option = optionArgument(page);
  let html = "";
  $.ajax({
    url: `./${controller}/getNumberPage`,
    method: "post",
    data: option,
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
    error: function (error) {
      console.error(error.responseText);
    },
  });
}
