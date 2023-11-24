<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../mvc/core/DB.php';
require_once __DIR__ . '/../mvc/models/NguoiDungModel.php';

class NguoiDungModelTest extends TestCase
{
    private $NguoiDungModel;

    protected function setUp(): void{
        $this->NguoiDungModel = new NguoiDungModel();
    }

    public function testCreate(){
        $id = "3221410069";
        $email = "ngba@gmail.com";
        $hoten = "Nguyen Van A";
        $ngaysinh = "2003-01-01";
        $gioitinh = 1;
        $password = "123456";
        $nhomquyen = 10;
        $trangthai = 1;
        $result = $this->NguoiDungModel->create($id,$email,$hoten,$password,$ngaysinh,$gioitinh,$nhomquyen,$trangthai);
        $this->assertTrue($result);
    }


    public function testUpdate(){
        $id = "3221410069";
        $email = "nguyenvana12@gmail.com";
        $hoten = "Tran Van B";
        $ngaysinh = "2005-01-01";
        $gioitinh = 1;
        $password = "11223344";
        $nhomquyen = 11;
        $trangthai = 1;
        $result = $this->NguoiDungModel->update($id,$email,$hoten,$password,$ngaysinh,$gioitinh,$nhomquyen,$trangthai);
        echo $result;
    }

    protected function tearDown(): void
    {
        $this->NguoiDungModel = NULL;
    }
}