<nav class="nav border-bottom bg-white position-fixed top-0 w-100">
    <div class="container d-flex justify-content-between align-items-center py-2">
        <button id="btn-thoat" class="btn btn-hero btn-danger" role="button"><i class="fa fa-power-off"></i>
            Thoát</button>
        <div class="nav-center">
            <span class="fw-bold fs-5">Thí sinh: <?php echo $_SESSION['user_name'] ?></span>
        </div>
        <div class="nav-right d-flex align-items-center">
            <div class="nav-time me-4">
                <span class="fw-bold"><i class="far fa-clock mx-2"></i><span id="timer"></span></span>
            </div>
            <button id="btn-nop-bai" class="btn btn-hero btn-primary" role="button"><i class="far fa-file-lines me-1"></i> Nộp bài</button>
        </div>
    </div>
</nav>
<div class="container mb-5 mt-6" id="dethicontent" data-id="<?php echo $data["Made"]?>">
    <div class="row">
        <div class="col-8" id="list-question">
        </div>
        <div class="col-4 bg-white p-3 rounded border h-100 sidebar-answer">
            <ul class="answer">
            </ul>
        </div>
    </div>
</div>