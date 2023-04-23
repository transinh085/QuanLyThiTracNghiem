<!-- END Page Container -->
<script src="./public/js/dashmix.app.min.js"></script>

<!-- jQuery (required for BS Datepicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<?php
if(isset($data["Plugin"]["datepicker"]) && $data["Plugin"]["datepicker"] == 1) {
    echo '<script src="./public/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>';
}
if(isset($data["Plugin"]["flatpickr"]) && $data["Plugin"]["flatpickr"] == 1) {
    echo '<script src="./public/js/plugins/flatpickr/flatpickr.min.js"></script>';
}
if(isset($data["Plugin"]["select"]) && $data["Plugin"]["select"] == 1) {
    echo '<script src="./public/js/plugins/select2/js/select2.full.min.js"></script>';
}
if(isset($data["Plugin"]["ckeditor"]) && $data["Plugin"]["ckeditor"] == 1) {
    echo '<script src="./public/js/plugins/ckeditor/ckeditor.js"></script>';
}
if(isset($data["Plugin"]["notify"]) && $data["Plugin"]["notify"] == 1) {
    echo '<script src="./public/js/plugins/bootstrap-notify/bootstrap-notify.js"></script>';
}
if(isset($data["Plugin"]["chart"]) && $data["Plugin"]["chart"] == 1) {
    echo '<script src="./public/js/plugins/chart.js/chart.min.js"></script>';
}
if(isset($data["Plugin"]["ckeditor-5"]) && $data["Plugin"]["ckeditor-5"] == 1) {
    echo '<script src="./public/js/plugins/ckeditor5-classic/build/ckeditor.js"></script>';
}
if(isset($data["Plugin"]["sweetalert2"]) && $data["Plugin"]["sweetalert2"] == 1) {
    echo '<script src="./public/js/plugins/sweetalert2/sweetalert2.min.js"></script>';
}
if(isset($data["Plugin"]["jquery-validate"]) && $data["Plugin"]["jquery-validate"] == 1) {
    echo '<script src="./public/js/plugins/jquery-validation/jquery.validate.min.js"></script>';
}
if(isset($data["Plugin"]["pagination"]) && $data["Plugin"]["pagination"] == 1) {
    echo '<script src="./public/js/pagination.js"></script>';
} 
if(isset($data["Script"])) {
    echo '<script src="./public/js/pages/'.$data["Script"].'.js"></script>';
}
?>