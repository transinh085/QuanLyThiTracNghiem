<?php
class ChiTietDeThiModel extends DB{
    public function create($made, $macauhoi, $thutu)
    {
        $valid = true;
        $sql = "INSERT INTO `chitietdethi`(`made`, `macauhoi`, `thutu`) VALUES ('$made','$macauhoi','$thutu')";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }

    public function createMultiple($made, $cauhoi)
    {
        $valid = true;
        $result = $this->delete($made);
        if($result) {
            foreach($cauhoi as $key => $macauhoi) {
                $result = $this->create($made,$macauhoi['macauhoi'],$key + 1);
                if(!$result) {
                    $valid = false;
                    break;
                }
            }
        } else $valid = false;
        return $valid;
    }

    public function delete($made)
    {
        $valid = true;
        $sql = "DELETE FROM `chitietdethi` WHERE `made` = '$made'";
        $result = mysqli_query($this->con, $sql);
        if(!$result) $valid = false;
        return $valid;
    }
}
?>