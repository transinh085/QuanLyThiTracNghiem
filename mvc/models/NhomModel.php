<?php
class NhomModel extends DB{
    public function create($tennhom, $ghichu, $namhoc, $hocky, $giangvien, $mamonhoc)
    {
        $valid = true;
        $sql = "INSERT INTO `nhom`(`tennhom`, `ghichu`, `namhoc`, `hocky`, `giangvien`, `mamonhoc`) VALUES ('$tennhom','$ghichu','$namhoc','$hocky','$giangvien','$mamonhoc')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function update($manhom, $tennhom, $mamoi, $siso, $ghichu, $namhoc, $hocky, $trangthai, $hienthi, $giangvien, $mamonhoc)
    {
        $valid = true;
        $sql = "UPDATE `nhom` SET `tennhom`='$tennhom',`mamoi`='$mamoi',`siso`='$siso',`ghichu`='$ghichu',`namhoc`='$namhoc',`hocky`='$hocky',`trangthai`='$trangthai',`hienthi`='$hienthi',`giangvien`='$giangvien',`mamonhoc`='$mamonhoc' WHERE `manhom`='$manhom'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function delete($manhom)
    {
        $valid = true;
        $sql = "DELETE FROM `nhom` WHERE `manhom`='$manhom'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `nhom` WHERE trangthai = 1";
        $result = mysqli_query($this->con, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($manhom)
    {
        $sql = "SELECT * FROM `nhom` WHERE `manhom` = '$manhom";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function getBySubject()
    {
        $sql = "SELECT monhoc.mamonhoc, monhoc.tenmonhoc, nhom.namhoc, nhom.hocky, nhom.manhom, nhom.tennhom, nhom.ghichu, nhom.siso
        FROM nhom, monhoc
        WHERE nhom.mamonhoc = monhoc.mamonhoc AND nhom.giangvien = 1 AND nhom.trangthai = 1 AND nhom.hienthi = 1";
        $result = mysqli_query($this->con, $sql);
        $final_result = array();
        while($row = mysqli_fetch_assoc($result)) {
            $index = array_search($row['mamonhoc'], array_column($final_result, 'mamonhoc'));
            if ($index === false) {
                $temp = array(
                    'mamonhoc' => $row['mamonhoc'],
                    'tenmonhoc' => $row['tenmonhoc'],
                    'namhoc' => $row['namhoc'],
                    'hocky' => $row['hocky'],
                    'nhom' => array(
                        array(
                            'manhom' => $row['manhom'],
                            'tennhom' => $row['tennhom'],
                            'ghichu' => $row['ghichu'],
                            'siso' => $row['siso']
                        )
                    )
                );
                array_push($final_result, $temp);
            } else {
                $temp = array(
                    'manhom' => $row['manhom'],
                    'tennhom' => $row['tennhom'],
                    'ghichu' => $row['ghichu'],
                    'siso' => $row['siso']
                );
                array_push($final_result[$index]['nhom'], $temp);
            }
        }
        return $final_result;
    }
}
?>