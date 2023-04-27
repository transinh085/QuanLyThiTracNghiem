<div class="content">   
    <div class="js-slider slick-dotted-inner slick-dotted-white" data-dots="true" data-autoplay="true"
        data-autoplay-speed="3000">
        <div>
            <img class="img-fluid" src="./public/media/photos/dhsg_1.jpg" alt="">
        </div>
        <div>
            <img class="img-fluid" src="./public/media/photos/dhsg_3.jpg" alt="">
        </div>
    </div>
    <div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content rounded overflow-hidden bg-image bg-image-bottom border-0" style="background-image: url('public/media/photos/study.jpg');">
            <div class="row">
              <div class="col-md-5">
                <div class="p-3 text-end text-md-start">
                  <a class="fw-semibold text-white" href="#" data-bs-dismiss="modal" aria-label="Close">
                    Chuyển tiếp
                  </a>
                </div>
              </div>
              <div class="col-md-7">
                <div class="bg-body-extra-light shadow-lg">
                  <div class="js-slider slick-dotted-inner" data-dots="true" data-arrows="false" data-infinite="false">
                    <div class="p-5">
                      <i class="fa fa-award fa-3x text-muted my-4"></i>
                      <h3 class="fs-2 fw-light mb-2">Chào mừng các bạn đến với hệ thống!</h3>
                      <p class="text-muted">
                        Hệ thống thi trực tuyến kiểm tra online, bạn vui lòng điển đầy đủ thông tin để sử dụng đầy đủ các tính năng của chúng tôi
                      </p>
                      <button type="button" class="btn btn-alt-primary mb-4" onclick="jQuery('.js-slider').slick('slickGoTo', 1);">
                        Vui lòng thêm thông tin <i class="fa fa-arrow-right ms-1"></i>
                      </button>
                    </div>
                    <div class="slick-slide p-5">
                      <i class="fa fa-user-check fa-3x text-muted my-4"></i>
                      <h3 class="fs-2 fw-light">Hãy để chúng tôi biết thêm thông tin về bạn</h3>
                      <form class="mb-4">
                        <div class="mb-4">
                          <input type="text" class="form-control form-control-alt" id="email" name="onboard-first-name" placeholder="Nhập địa chỉ email của bạn ...">
                        </div>
                      </form>
                      
                      <button type="button" class="btn btn-primary mb-4" id="btn-email">
                        Cập nhật <i class="fa fa-check opacity-50 ms-1"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
