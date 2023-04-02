<?php
class NhomModel extends DB
{
    public function create($tennhom,$ghichu,$namhoc,$hocky,$giangvien,$mamonhoc) {
        $valid = true;
        $mamoi = substr(md5(mt_rand()), 0, 7);
        $sql = "INSERT INTO `nhom`(`tennhom`, `ghichu`, `mamoi`,`namhoc`, `hocky`, `giangvien`, `mamonhoc`) VALUES ('$tennhom','$ghichu','$mamoi','$namhoc','$hocky','$giangvien','$mamonhoc')";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            $valid = false;
        }
        return $valid;
    }

    public function update($manhom,$tennhom,$ghichu,$namhoc,$hocky,$mamonhoc) {
        $valid = true;
        $sql = "UPDATE `nhom` SET `tennhom`='$tennhom',`ghichu`='$ghichu',`namhoc`='$namhoc',`hocky`='$hocky',`mamonhoc`='$mamonhoc' WHERE `manhom`='$manhom'";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            $valid = false;
        }
        return $valid;
    }

    public function delete($manhom)
    {
        $valid = true;
        $sql = "UPDATE `nhom` SET `trangthai`='0' WHERE `manhom`='$manhom'";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            $valid = false;
        }
        return $valid;
    }

    // Ẩn || Hiện nhóm
    public function hide($manhom, $giatri)
    {
        $valid = true;
        $sql = "UPDATE `nhom` SET `hienthi`=' $giatri' WHERE `manhom`='$manhom'";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            $valid = false;
        }
        return $valid;
    }

    public function getById($manhom)
    {
        $sql = "SELECT * FROM `nhom` WHERE `manhom` = $manhom";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    // Lấy tất cả nhóm của người tạo và gom lại theo mã môn học, năm học, học kỳ
    public function getBySubject($nguoitao,$hienthi)
    {
        $sht = $hienthi == 2 ? "" : "AND nhom.hienthi = $hienthi";
        $sql = "SELECT monhoc.mamonhoc, monhoc.tenmonhoc, nhom.namhoc, nhom.hocky, nhom.manhom, nhom.tennhom, nhom.ghichu, nhom.siso, nhom.hienthi
        FROM nhom, monhoc
        WHERE nhom.mamonhoc = monhoc.mamonhoc AND nhom.giangvien = '$nguoitao' AND nhom.trangthai = 1 $sht";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        $newArray = [];
        foreach ($rows as $item) {
            $foundIndex = -1;
            foreach ($newArray as $key => $newItem) {
                if ($newItem["mamonhoc"] == $item["mamonhoc"] && $newItem["namhoc"] == $item["namhoc"] && $newItem["hocky"] == $item["hocky"]) {
                    $foundIndex = $key;
                    break;
                }
            }
            $detail_group = [
                "manhom" => $item["manhom"],
                "tennhom" => $item["tennhom"],
                "ghichu" => $item["ghichu"],
                "siso" => $item["siso"],
                "hienthi" => $item["hienthi"]
            ];
            if ($foundIndex == -1) {
                $newArray[] = [
                    "mamonhoc" => $item["mamonhoc"],
                    "tenmonhoc" => $item["tenmonhoc"],
                    "namhoc" => $item["namhoc"],
                    "hocky" => $item["hocky"],
                    "nhom" => [$detail_group],
                ];
            } else {
                $newArray[$foundIndex]['nhom'][] = $detail_group;
            }
        }
        return $newArray;
    }

    // Cập nhật mã mời
    public function updateMaMoi($manhom) 
    {
        $valid = true;
        do {
            $mamoi = substr(md5(mt_rand()), 0, 7);
            $check = $this->getIdFromInvitedCode($mamoi);
        } while($check != null);
        $sql = "UPDATE `nhom` SET `mamoi`='$mamoi' WHERE `manhom` = '$manhom'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    // Lấy mã nhóm từ mã mời
    public function getIdFromInvitedCode($mamoi)
    {
        $sql = "SELECT `manhom` FROM `nhom` WHERE `mamoi` = '$mamoi'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    // Thêm sinh viên vào nhóm
    public function join($manhom, $manguoidung) {
        $valid = true;
        $sql = "INSERT INTO `chitietnhom`(`manhom`, `manguoidung`) VALUES ('$manhom','$manguoidung')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    // Lấy các nhóm mà sinh viên tham gia
    public function getAllGroup_User($user_id) {
        $sql = "SELECT monhoc.mamonhoc,monhoc.tenmonhoc,nhom.manhom, nhom.tennhom, namhoc, hocky ,nguoidung.hoten
        FROM chitietnhom, nhom, nguoidung, monhoc
        WHERE chitietnhom.manhom = nhom.manhom AND nguoidung.id = nhom.giangvien AND monhoc.mamonhoc = nhom.mamonhoc AND chitietnhom.manguoidung = $user_id";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // Lấy chi tiết một nhóm mà sinh viên tham gia
    public function getDetailGroup($manhom)
    {
        $sql = "SELECT monhoc.mamonhoc,monhoc.tenmonhoc,nhom.manhom, nhom.tennhom, namhoc, hocky ,nguoidung.hoten
        FROM nhom, nguoidung, monhoc
        WHERE nguoidung.id = nhom.giangvien AND monhoc.mamonhoc = nhom.mamonhoc AND nhom.manhom = $manhom";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    // Lấy danh sách bạn học chung nhóm
    public function getSvList() {
        $sql = "SELECT id, avatar, hoten, email, gioitinh, ngaysinh FROM chitietnhom, nguoidung WHERE manguoidung = id AND chitietnhom.manhom = 1";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
?>
