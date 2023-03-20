<?php
class NguoiDungModel extends DB{
    
    public function create($email,$fullname,$password,$ngaysinh,$gioitinh,$role,$trangthai)
    {
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `nguoidung`(`email`,`hoten`, `gioitinh`,`ngaysinh`,`matkhau`,`trangthai`, `manhomquyen`) VALUES ('$email','$fullname','$gioitinh','$ngaysinh','$password',$trangthai, $role)";
        $check = true;
        $result = mysqli_query($this->con, $sql);
        if(!$result) {
            $check = false;
        }
        return json_encode($check);
    }

    public function delete($id) 
    {
        $check = true;
        $sql = "DELETE FROM `nguoidung` WHERE `id`='$id'";
        $result = mysqli_query($this->con,$sql);
        if(!$result) $check = false;
        return $check;
    }

    public function update($id,$email,$fullname,$password,$ngaysinh,$gioitinh,$role,$trangthai)
    {
        $querypass = '';
        if($password != '') {
            $password = password_hash($password,PASSWORD_DEFAULT);
            $querypass = ", `matkhau`='$password'";
        }
        $sql = "UPDATE `nguoidung` SET `email`='$email', `hoten`='$fullname',`gioitinh`='$gioitinh',`ngaysinh`='$ngaysinh',`trangthai`='$trangthai',`manhomquyen`='$role'$querypass WHERE `id`='$id'";
        $check = true;
        $result = mysqli_query($this->con, $sql);
        if(!$result) $check = false;
        return $check;
    }

    public function getAll()
    {
        $sql = "SELECT nguoidung.*, nhomquyen.`tennhomquyen`
        FROM nguoidung, nhomquyen
        WHERE nguoidung.`manhomquyen` = nhomquyen.`manhomquyen`";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM `nguoidung` WHERE `id` = '$id'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function getByEmail($email)
    {
        $sql = "SELECT * FROM `nguoidung` WHERE `email` = '$email'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function changePassword($email,$new_password)
    {
        $new_password = password_hash($new_password,PASSWORD_DEFAULT);
        $sql = "UPDATE `nguoidung` SET `matkhau`='$new_password' WHERE `email` = '$email'";
        $check = true;
        $result = mysqli_query($this->con, $sql);
        if(!$result) $check = false;
        return $check;
    }

    public function checkPassword($email, $password)
    {
        $user = $this->getByEmail($email);
        $result = password_verify($password, $user['matkhau']);
        return $result;
    }

    public function checkLogin($email,$password){
        $user = $this->getByEmail($email);
        if($user == ''){
            return json_encode(["message" => "Tài khoản không tồn tại !", "valid" => "false"]);
        } else {
            $result = $this->checkPassword($email,$password);
            if($result){
                $email = $user['email'];
                $token = time().password_hash($email,PASSWORD_DEFAULT);
                $resultToken = $this->updateToken($email, $token);
                if($resultToken){
                    setcookie("token", $token, time() + 7*24*3600, "/");
                    return json_encode(["message" => "Đăng nhập thành công !", "valid" => "true"]);
                } else {
                    return json_encode(["message" => "Đăng nhập không thành công !", "valid" => "false"]);
                }
            } else {
                return json_encode(["message" => "Sai mật khẩu !", "valid" => "false"]);
            }
        }
    }

    public function updateToken($email, $token)
    {
        $valid = true;
        $sql = "UPDATE `nguoidung` SET `token`='$token' WHERE `email` = '$email'";
        $result = mysqli_query($this->con,$sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function validateToken($token){
        $sql = "SELECT * FROM `nguoidung` WHERE `token` = '$token'";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_name'] = $row['hoten'];
            $_SESSION['user_role'] = $this->getRole($row['manhomquyen']);
            return true;
        }
        return false;
    }

    public function getRole($manhomquyen)
    {
        $sql = "SELECT chucnang, hanhdong FROM chitietquyen WHERE manhomquyen = $manhomquyen";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        $roles = array();
        foreach ($rows as $item) {
            $chucnang = $item['chucnang'];
            $hanhdong = $item['hanhdong'];
            if (!isset($roles[$chucnang])) {
                $roles[$chucnang] = array($hanhdong);
            } else {
                array_push($roles[$chucnang], $hanhdong);
            }
        }
        return $roles;
    }

    public function logout(){
        setcookie("token","",time()-10,'/');
        $id = $_SESSION['user_id'];
        $sql = "UPDATE `nguoidung` SET `token`= NULL WHERE `id` = '$id'";
        session_destroy();
        $result = mysqli_query($this->con,$sql);
        return $result;
    }

    public function updateOpt($opt,$email){
        $sql = "UPDATE `nguoidung` SET `opt`='$opt' WHERE `email`='$email'";
        $result = mysqli_query($this->con,$sql);
        return $result;
    }

    // public function pagination() {
    //     $record_per_page = 5;
    //     $page = 0;
    //     $output = '';
    
    //     if (isset($_POST["page"])) {
    //         $page = $_POST["page"];
    //     } else {
    //         $page = 1;
    //     }
    //     $start_from = ($page - 1)*$record_per_page; // vị trí bắt đầu 
    //     $query = "SELECT * from nguoidung ORDER BY id DESC LIMIT $start_from, $record_per_page";
    //     $result = mysqli_query($this->con, $query);
    //     $output .= '
    //     <table class="table table-vcenter">
    //         <thead>
    //             <tr>
    //                 <th class="text-center" style="width: 100px;">ID</th>
    //                 <th>Họ và tên</th>
    //                 <th class="text-center">Giới tính</th>
    //                 <th class="text-center">Ngày sinh</th>
    //                 <th class="text-center">Nhóm quyền</th>
    //                 <th class="text-center">Ngày tham gia</th>
    //                 <th class="text-center">Trạng thái</th>
    //                 <th class="text-center">Actions</th>
    //             </tr>
    //         </thead>
    //     ';
        // while ($row = mysqli_fetch_array($result))
        // {
        //     $output .= '
        //     <tbody id="list-user"
        //         <tr>
        //             <td class="text-center">
        //                 <strong>'.$row["id"].'</strong>
        //             </td>
        //             <td class="fs-sm d-flex align-items-center">
        //                 <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/avatar0.jpg" alt="">
        //                 <div class="d-flex flex-column">
        //                     <strong class="text-primary">'.$row["hoten"].'</strong>
        //                     <span class="fw-normal fs-sm text-muted">'.$row["email"].'</span>
        //                 </div>
        //             </td>
        //             <td class="text-center">'.$row["gioitinh"].'</td>
        //             <td class="text-center">2023-03-15</td>
        //             <td class="text-center">Giảng viên</td>
        //             <td class="text-center">2023-03-17</td>
        //             <td class="text-center">
        //                 <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger bg-success-light text-success">Khoá</span>
        //             </td> 
        //             <td class="text-center">
        //                 <a class="btn btn-sm btn-alt-secondary user-edit" href="javascript:void(0)" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit" data-id="20">
        //                     <i class="fa fa-fw fa-pencil"></i>
        //                 </a>
        //                 <a class="btn btn-sm btn-alt-secondary user-delete" href="javascript:void(0)" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete" data-id="20">
        //                     <i class="fa fa-fw fa-times"></i>
        //                 </a>
        //             </td>
        //         </tr>
        //     </tbody>    
        //     ';
    //     }
    //     $output .= '</table>';
    //     $page_query = "SELECT * FROM nguoidung ORDER BY id DESC";
    //     $page_result = mysqli_query($this->con, $page_query);
    //     $total_records = mysqli_num_rows($page_result);
    //     $total_pages = ceil($total_records/$record_per_page);
    //     for($i=1; $i <= $total_pages; $i++)
    //     {
    //         $output .= '<a class="page-link" id="'.$i.'" href="javascript:void(0)">'.$i.'</a>
            // <li class="page-item">
            //     <a class="page-link" href="javascript:void(0)">2</a>
            // </li>
    //         ';
    //     }
    //         return $output;
    
    //     }
    
        // function pagination($total_page, $page) {
        //     if ($total_page > 5) {
        //         if ($page < 6) {
        //             for ($i=1; $i <= 6 ; $i++) {
        //             $page_array[] = $i;
        //             }
        //             $page_array[] = '...';
        //             $page_array[] = $total_page;
        //         } else {
        //             $end_limit = $total_page - 5;
        //             if ($page > $end_limit) {
        //                 $page_array[] = 1;
        //                 $page_array[] = '...';
        //                 for ($i= $end_limit; $i <= $total_page ; $i++) { 
        //                     $page_array[] = $i;
        //                 }
        //             } else {
        //                 $page_array[] = 1;
        //                 $page_array[] = '...';
        //                 for ($i=$page - 1; $i <= $page + 1 ; $i++) { 
        //                     $page_array[] = $i;
        //                 }
        //                 $page_array[] = '...';
        //                 $page_array[] = $total_page;
        //             }
        //         }
        //     } else {
        //         for ($i = 1; $i <= $total_page; $i++) {
        //             $page_array[] = $i;
        //         }
        //     }
        //     $page_link = '';
        //     $prev_link = '';
        //     $next_link = '';
        //     for ($i=0; $i < count($page_array) ; $i++) { 
        //         if ($page == $page_array[$i]) {
        //             $page_link .= '
        //             <li class="page-item active disabled">
        //                 <a class="page-link" href="javascript:void(0)" num-page="'.$page_array[$i].'">'.$page_array[$i].'</a>
        //             </li>
        //             ';
        //             $prev_id = $page_array[$i] - 1;
        //             if ($prev_id <= 0) {
        //                 $page_link .= '
        //                 <li class="page-item disabled">
        //                     <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
        //                         Prev
        //                     </a>
        //                 </li>
        //                 ';
        //             } else {
        //                 $prev_link .= '
        //                 <li class="page-item">
        //                     <a class="page-link" href="javascript:void(0)" num-page="'.$prev_id.'">Prev</a>
        //                 </li>
        //                 ';
        //             }
        //             $next_id = $page_array[$i] + 1;
        //             if ($next_id >= $total_page) {
        //                 $prev_link .= '
        //                 <li class="page-item disabled">
        //                     <a class="page-link" href="javascript:void(0)" aria-label="Next">
        //                         Next
        //                     </a>
        //                 </li>
        //                 ';
        //             } else {
        //                 $next_link .= '
        //                 <li class="page-item">
        //                     <a class="page-link" href="javascript:void(0)" num-page="'.$next_id.'">Next</a>
        //                 </li>
        //                 ';
        //             }
        //         } else {
        //             if ($page_array[$i] == '...') {
        //                 $page_link .= '
        //             <li class="page-item">
        //                 <a class="page-link" href="javascript:void(0)" >...</a>
        //             </li>
        //             ';
        //             } else {
        //                 $page_link .= '
        //                 <li class="page-item">
        //                     <a class="page-link" href="javascript:void(0)" num-page="'.$page_array[$i].'">'.$page_array[$i].'</a>
        //                 </li>
        //                 ';  
        //             }
        //         }
        //     }
        // }
        function pagination($limit, $start_from) {
            $query = "SELECT * from nguoidung ORDER BY id DESC LIMIT $start_from, $limit";
            $result = mysqli_query($this->con,$query);
            $rows = array();
            while($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;
        }
        
        function getNumberPage($limit) {
            $page_query = "SELECT * FROM nguoidung ORDER BY id DESC";
            $page_result = mysqli_query($this->con, $page_query);
            $total_records = mysqli_num_rows($page_result);
            $total_pages = ceil($total_records/$limit);
            return $total_pages;
        }
}
?>