<?php
class CauTraLoiModel extends DB{
    public function create($macauhoi, $noidungtl, $ladapan)
    {
        $valid = true;
        $sql = "INSERT INTO `cautraloi`(`macautl`,`macauhoi`, `noidungtl`, `ladapan`) VALUES (NULL,$macauhoi,'$noidungtl','$ladapan')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function update($macautl, $macauhoi, $noidungtl, $ladapan)
    {
        $valid = true;
        $sql = "UPDATE `cautraloi` SET `macauhoi`=$macauhoi,`noidungtl`='$noidungtl',`ladapan`='$ladapan' WHERE `macautl`='$macautl'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function delete($macautl)
    {
        $valid = true;
        $sql = "DELETE FROM `cautraloi` WHERE `macautl` = $macautl";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function getAll($macauhoi)
    {
        $sql = "SELECT * FROM `cautraloi` WHERE `macauhoi` = $macauhoi";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getAllWithoutAnswer($macauhoi)
    {
        $sql = "SELECT `macauhoi`, `noidungtl` FROM `cautraloi` WHERE `macauhoi` = $macauhoi";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // Hàm lấy đáp án của câu hỏi đó + đáp án của người chọn
    public function getAllHaveAnswer($macauhoi, $makq) 
    {
        $sql = "SELECT makq, macauhoi, noidungtl, ladapan, macautl, dapanchon FROM (SELECT CTL.* FROM cautraloi CTL WHERE CTL.macauhoi = $macauhoi) T1 
        LEFT JOIN (SELECT CTKQ.makq, CTKQ.dapanchon, CTKQ.macauhoi AS macauhoi2 FROM chitietketqua CTKQ, cautraloi CTL where CTKQ.dapanchon = CTL.macautl AND CTL.macauhoi = $macauhoi AND CTKQ.makq = $makq) T2 
        ON T1.macauhoi = T2.macauhoi2";
        // $sql = "SELECT cautraloi.`macauhoi`, `noidungtl`, `ladapan` , `dapanchon`, `macautl` FROM `cautraloi`, `chitietketqua` WHERE cautraloi.`macauhoi` = chitietketqua.`macauhoi` AND cautraloi.`macauhoi` = $macauhoi AND `makq` = $makq";
        $result = mysqli_query($this->con,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($macautl)
    {
        $sql = "SELECT * FROM `cautraloi` WHERE `macautl` = $macautl";
        $result = mysqli_query($this->con,$sql);
        return mysqli_fetch_assoc($result);
    }

    public function deletebyanswer($macauhoi)
    {
        $valid = true;
        $sql = "DELETE FROM `cautraloi` WHERE `macauhoi` = $macauhoi";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }
}
?>