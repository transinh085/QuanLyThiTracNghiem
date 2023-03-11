// Dashmix.onLoad(() => 
//     class {
//         static sweetAlert2() {
//             let e = Swal.mixin({
//                 buttonsStyling: !1,
//                 target: "#page-container",
//                 customClass: {
//                     confirmButton: "btn btn-success m-1",
//                     cancelButton: "btn btn-danger m-1",
//                     input: "form-control",
//                 },
//             });

//             document.querySelectorAll(".delete_roles").forEach((item) => {
//                 item.addEventListener("click", (t) => {
//                     e.fire({
//                         title: "Are you sure?",
//                         text: "Bạn có chắc chắn muốn xoá nhóm quyền!",
//                         icon: "warning",
//                         showCancelButton: !0,
//                         customClass: {
//                             confirmButton: "btn btn-danger m-1",
//                             cancelButton: "btn btn-secondary m-1",
//                         },
//                         confirmButtonText: "Vâng, tôi chắc chắn!",
//                         html: !1,
//                         preConfirm: (e) =>
//                             new Promise((e) => {
//                                 setTimeout(() => {
//                                     e();
//                                 }, 50);
//                             }),
//                     }).then((t) => {
//                         t.value
//                             ? e.fire(
//                                 "Deleted!",
//                                 "Your imaginary file has been deleted.",
//                                 "success"
//                             )
//                             : "cancel" === t.dismiss &&
//                             e.fire("Cancelled", "Your imaginary file is safe :)", "error");
//                     });
//                 });
//             });
//         }
//         static init() {
//             this.sweetAlert2();
//         }
//     }.init()
// );

// function loadData() {
//     $.get(
//         "./user/getData",
//         function (data, textStatus) {
//             showData(data);
//         },
//         "json"
//     );
// }

loadData();

// function showData(users) {
//     let html = "";
//     users.forEach((user) => {
//         html += `
//         <tr tid="${user.id}">
//                             <td class="text-center">
//                                 <strong>${user.id}</strong>
//                             </td>
//                             <td class="fs-sm d-flex align-items-center">
//                                 <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/avatar0.jpg" alt="">
//                                 <div class="d-flex flex-column">
//                                     <strong class="text-primary">${user.hoten}</strong>
//                                     <span class="fw-normal fs-sm text-muted">${user.email}</span>
//                                 </div>
//                             </td>
//                             <td class="text-center">${user.gioitinh}</td>
//                             <td class="text-center">${user.ngaysinh}</td>
//                             <td class="text-center">${user.manhomquyen}</td>
//                             <td class="text-center">${user.ngaythamgia}</td>
//                             <td class="text-center">
//                                 <span class="badge bg-success badge-pill text-uppercase fw-bold py-2 px-3">${user.trangthai}</span>
//                             </td> 
//                             <td class="text-center">
//                                 <a class="btn btn-sm btn-alt-secondary user-edit" href="javascript:void(0)"
//                                     data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit" dataid="${user.id}">
//                                     <i class="fa fa-fw fa-pencil"></i>
//                                 </a>
//                                 <a class="btn btn-sm btn-alt-secondary" href="" data-bs-toggle="tooltip"
//                                     aria-label="Delete" data-bs-original-title="Delete" dataid="${user.id}">
//                                     <i class="fa fa-fw fa-times"></i>
//                                 </a>
//                             </td>
//                         </tr>
//         `;
//     });
//     $('#list-user').html(html); 
// }

// $("#add_class").on("click", function () {
//     $.ajax({
//         type: "post",
//         url: "./user/add",
//         data: {
//             hoten: $("#user_name").val(),
//             gioitinh: $("#user_gender").val(),
//             ngaysinh: $("#user_ngaysinh").val(),
//             email: $("#user_email").val(),
//         },
//         success: function (response) {
//                 console.log(response);
//                 $("#modal-add-user").modal("hide");
//                 loadData();
//         },
//     });
// });

// $(document).on("click", ".user-edit", function () {
//     var trid = $(this).attr("dataid");
//     $("#mamon").val(trid);
//     $('#tenmon').val($(this).closest("td").closest("tr").children().eq(1).text())
// });