// function fetchData(args, page) {
//   args.page = page;
//   const { controller } = args;
//   $.ajax({
//     url: `./${controller}/pagination`,
//     method: "post",
//     data: {
//       args: JSON.stringify(args),
//     },
//     dataType: "json",
//     success: function (data) {
//       showData(data);
//     },
//     error: function (err) {
//       console.error(err.responseText);
//     },
//   });
// }

// function getPagination(args, page) {
//   args.page = page;
//   const { controller } = args;
//   $.ajax({
//     url: `./${controller}/getTotalPages`,
//     method: "post",
//     data: {
//       args: JSON.stringify(args),
//     },
//     dataType: "json",
//     success: function (total) {
//       valuePage.totalPages = total;
//       if (total === 1 || (total !== 0 && total < valuePage.curPage)) {
//         valuePage.curPage = total;
//       }
//       pagination();
//       fetchData(args, valuePage.curPage);
//     },
//     error: function (err) {
//       console.error(err.responseText);
//     },
//   });
// }

// /*
// // Truyền tham số vào hàm getPagination
// const args = {
//   // Bắt buộc phải có
//   controller: "user",
//   model: "NguoiDungModel",

//   // Optional
//   limit: 10,
//   input: "",
//   filter: "",
//   // (các tham số khác tuỳ theo câu truy vấn) ...
// }
// */

// // Dynamic pagination
// const pg = document.querySelector(".list-page");
// const btnNextPg = document.querySelector("a.next-page");
// const btnPrevPg = document.querySelector("a.prev-page");
// const btnFirstPg = document.querySelector("a.first-page");
// const btnLastPg = document.querySelector("a.last-page");

// const valuePage = {
//   truncate: true,
//   curPage: 1,
//   numLinksTwoSide: 1,
//   totalPages: 10,
// };

// function renderPage(index, active = "") {
//   if (index === 1 || index === valuePage.totalPages) {
//     style = `style="border-radius:0;"`;
//   }
//   return `<li class="page-item ${active}">
//         <a class="page-link" href="javascript:void(0)" ${
//           style ? style : ""
//         } data-page="${index}">${index}</a>
//     </li>`;
// }

// function handleButtonLeft() {
//   if (valuePage.curPage === 1 || valuePage.totalPages <= 1) {
//     btnPrevPg.classList.add("disabled");
//     btnFirstPg.classList.add("disabled");
//   } else {
//     btnPrevPg.classList.remove("disabled");
//     btnFirstPg.classList.remove("disabled");
//   }
// }

// function handleButtonRight() {
//   if (valuePage.curPage === valuePage.totalPages || valuePage.totalPages <= 1) {
//     btnNextPg.classList.add("disabled");
//     btnLastPg.classList.add("disabled");
//   } else {
//     btnNextPg.classList.remove("disabled");
//     btnLastPg.classList.remove("disabled");
//   }
// }

// function handleButton(element) {
//   if (element.classList.contains("first-page")) {
//     valuePage.curPage = 1;
//   } else if (element.classList.contains("last-page")) {
//     valuePage.curPage = valuePage.totalPages;
//   } else if (element.classList.contains("prev-page")) {
//     if (valuePage.curPage === 1) return;
//     valuePage.curPage--;
//     btnNextPg.classList.remove("disabled");
//     btnLastPg.classList.remove("disabled");
//   } else if (element.classList.contains("next-page")) {
//     if (valuePage.curPage === valuePage.totalPages) return;
//     valuePage.curPage++;
//     btnPrevPg.classList.remove("disabled");
//     btnFirstPg.classList.remove("disabled");
//   }

//   pagination();
//   handleButtonLeft();
//   handleButtonRight();
// }

// function pagination() {
//   const { totalPages, curPage, truncate, numLinksTwoSide: delta } = valuePage;

//   const range = delta + 4; // use for handle visible number of links left side

//   let render = "";
//   let renderTwoSide = "";
//   let dot = `<li class="page-item"><a class="page-link" href="javascript:void(0)">...</a></li>`;
//   let countTruncate = 0; // use for ellipsis - truncate left side or right side

//   // use for truncate two side
//   const numberTruncateLeft = curPage - delta;
//   const numberTruncateRight = curPage + delta;

//   let active = "";
//   for (let pos = 1; pos <= totalPages; pos++) {
//     active = pos === curPage ? "active" : "";

//     // truncate
//     if (totalPages >= 2 * range - 1 && truncate) {
//       if (numberTruncateLeft > 3 && numberTruncateRight < totalPages - 3 + 1) {
//         // truncate 2 side
//         if (pos >= numberTruncateLeft && pos <= numberTruncateRight) {
//           renderTwoSide += renderPage(pos, active);
//         }
//       } else {
//         // truncate left side or right side
//         if (
//           (curPage < range && pos <= range) ||
//           (curPage > totalPages - range && pos >= totalPages - range + 1) ||
//           pos === totalPages ||
//           pos === 1
//         ) {
//           render += renderPage(pos, active);
//         } else {
//           countTruncate++;
//           if (countTruncate === 1) render += dot;
//         }
//       }
//     } else {
//       // not truncate
//       render += renderPage(pos, active);
//     }
//   }

//   if (renderTwoSide) {
//     renderTwoSide =
//       renderPage(1) + dot + renderTwoSide + dot + renderPage(totalPages);
//     pg.innerHTML = renderTwoSide;
//   } else {
//     pg.innerHTML = render;
//   }

//   handleButtonLeft();
//   handleButtonRight();
// }

// pg.addEventListener("click", function (e) {
//   const el = e.target;

//   if (el.dataset.page) {
//     const pageNumber = parseInt(el.dataset.page, 10);
//     valuePage.curPage = pageNumber;
//     pagination();
//     handleButtonLeft();
//     handleButtonRight();
//   }
// });

// document.querySelector(".pagination-container").addEventListener("click", function (e) {
//   if (e.target.closest(".page-link")) {
//     handleButton(e.target.closest(".page-link"));
//     getPagination(currentPaginationOptions, valuePage.curPage);
//   }
// });

// document.querySelector("#search-form").addEventListener("input", function (e) {
//   e.preventDefault();
//   const input = document.querySelector("#search-input");
//   if (input.value == "") {
//     delete currentPaginationOptions.input;
//   } else {
//     currentPaginationOptions.input = input.value;
//     valuePage.curPage = 1;
//   }
//   getPagination(currentPaginationOptions, valuePage.curPage);
// });

// const defaultPaginationOptions = {
//   custom: {},
// };
// let currentPaginationOptions = defaultPaginationOptions;

// Multiple paginations
// Get class names
const divClassName = document.getElementsByClassName("pagination-class-name");
const classNameJSON = divClassName[0].dataset.paginationClassName;
const paginationClassName = JSON.parse(classNameJSON);

Array.from(divClassName).forEach(div => {
  div.remove();
});

class Pagination {
  constructor(container, searchForm, successCallback) {
    this.container = container;
    this.pg = container.querySelector(".list-page");
    this.btnPrevPg = container.querySelector("a.prev-page");
    this.btnNextPg = container.querySelector("a.next-page");
    this.btnFirstPg = container.querySelector("a.first-page");
    this.btnLastPg = container.querySelector("a.last-page");
    this.searchForm = searchForm || null;
    this.successCallback = successCallback;

    this.valuePage = {
      truncate: true,
      curPage: 1,
      numLinksTwoSide: 1,
      totalPages: 0,
    };

    this.option = {
      custom: {},
    };

    this.container.addEventListener("click", this.containerHandler.bind(this));
    this.pg.addEventListener("click", this.listPageHandler.bind(this));
    this.searchForm?.addEventListener("input", this.searchFormHandler.bind(this));
  }

  renderPage(index, active = "") {
    let style = "";
    if (index === 1 || index === this.valuePage.totalPages) {
      style = `style="border-radius:0;"`;
    }
    return `<li class="page-item ${active}">
          <a class="page-link" href="javascript:void(0)" ${
            style ? style : ""
          } data-page="${index}">${index}</a>
      </li>`;
  }

  handleButtonLeft() {
    if (this.valuePage.curPage === 1 || this.valuePage.totalPages <= 1) {
      this.btnPrevPg.classList.add("disabled");
      this.btnFirstPg.classList.add("disabled");
    } else {
      this.btnPrevPg.classList.remove("disabled");
      this.btnFirstPg.classList.remove("disabled");
    }
  }

  handleButtonRight() {
    if (this.valuePage.curPage === this.valuePage.totalPages || this.valuePage.totalPages <= 1) {
      this.btnNextPg.classList.add("disabled");
      this.btnLastPg.classList.add("disabled");
    } else {
      this.btnNextPg.classList.remove("disabled");
      this.btnLastPg.classList.remove("disabled");
    }
  }

  handleButton(element) {
    if (element.classList.contains("first-page")) {
      this.valuePage.curPage = 1;
    } else if (element.classList.contains("last-page")) {
      this.valuePage.curPage = this.valuePage.totalPages;
    } else if (element.classList.contains("prev-page")) {
      if (this.valuePage.curPage === 1) return;
      this.valuePage.curPage--;
      this.btnNextPg.classList.remove("disabled");
      this.btnLastPg.classList.remove("disabled");
    } else if (element.classList.contains("next-page")) {
      if (this.valuePage.curPage === this.valuePage.totalPages) return;
      this.valuePage.curPage++;
      this.btnPrevPg.classList.remove("disabled");
      this.btnFirstPg.classList.remove("disabled");
    }
  
    this.pagination();
    this.handleButtonLeft();
    this.handleButtonRight();
  }

  pagination() {
    const { totalPages, curPage, truncate, numLinksTwoSide: delta } = this.valuePage;
  
    const range = delta + 4; // use for handle visible number of links left side
  
    let render = "";
    let renderTwoSide = "";
    let dot = `<li class="page-item"><a class="page-link" href="javascript:void(0)">...</a></li>`;
    let countTruncate = 0; // use for ellipsis - truncate left side or right side
  
    // use for truncate two side
    const numberTruncateLeft = curPage - delta;
    const numberTruncateRight = curPage + delta;
  
    let active = "";
    for (let pos = 1; pos <= totalPages; pos++) {
      active = pos === curPage ? "active" : "";
  
      // truncate
      if (totalPages >= 2 * range - 1 && truncate) {
        if (numberTruncateLeft > 3 && numberTruncateRight < totalPages - 3 + 1) {
          // truncate 2 side
          if (pos >= numberTruncateLeft && pos <= numberTruncateRight) {
            renderTwoSide += this.renderPage(pos, active);
          }
        } else {
          // truncate left side or right side
          if (
            (curPage < range && pos <= range) ||
            (curPage > totalPages - range && pos >= totalPages - range + 1) ||
            pos === totalPages ||
            pos === 1
          ) {
            render += this.renderPage(pos, active);
          } else {
            countTruncate++;
            if (countTruncate === 1) render += dot;
          }
        }
      } else {
        // not truncate
        render += this.renderPage(pos, active);
      }
    }
  
    if (renderTwoSide) {
      renderTwoSide = this.renderPage(1) + dot + renderTwoSide + dot + this.renderPage(totalPages);
      this.pg.innerHTML = renderTwoSide;
    } else {
      this.pg.innerHTML = render;
    }
  
    this.handleButtonLeft();
    this.handleButtonRight();
  }

  fetchData(args, page) {
    args.page = page;
    let self = this;
    const { controller } = args;
    $.ajax({
      url: `./${controller}/pagination`,
      method: "post",
      data: {
        args: JSON.stringify(args),
      },
      dataType: "json",
      success: function (data) {
        self.successCallback(data);
      },
      error: function (err) {
        console.error(err.responseText);
      },
    });
  }

  getPagination(args, page) {
    args.page = page;
    const { controller } = args;
    let self = this;
    $.ajax({
      url: `./${controller}/getTotalPages`,
      method: "post",
      data: {
        args: JSON.stringify(args),
      },
      dataType: "json",
      success: function (total) {
        self.valuePage.totalPages = total;
        if (total === 1 || (total !== 0 && total < self.valuePage.curPage)) {
          self.valuePage.curPage = total;
        }
        self.pagination();
        self.fetchData(args, self.valuePage.curPage);
      },
      error: function (err) {
        console.error(err.responseText);
      },
    });
  }

  searchFormHandler(e) {
    e.preventDefault();
    const input = this.searchForm.querySelector("#search-input");
    if (input.value == "") {
      delete this.option.input;
    } else {
      this.option.input = input.value;
      this.valuePage.curPage = 1;
    }
    this.getPagination(this.option, this.valuePage.curPage);
  }

  containerHandler(e) {
    if (e.target.closest(".page-link")) {
      this.handleButton(e.target.closest(".page-link"));
      this.getPagination(this.option, this.valuePage.curPage);
    }
  }

  listPageHandler(e) {
    const el = e.target;
  
    if (el.dataset.page) {
      const pageNumber = parseInt(el.dataset.page, 10);
      this.valuePage.curPage = pageNumber;
      this.pagination();
      this.handleButtonLeft();
      this.handleButtonRight();
    }
  }
};
