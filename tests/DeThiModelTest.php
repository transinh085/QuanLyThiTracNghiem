<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../mvc/core/DB.php';
require_once __DIR__ . '/../mvc/models/DeThiModel.php';

class DeThiModelTest extends TestCase
{
    private $dethimodel;

    protected function setUp(): void{
        $this->dethimodel = new DeThiModel();
    }

    public function testCreate(){
        $mamonhoc = "841059";
        $nguoitao = "31214100422";
        $tende = "Đề kiểm tra giữa kỳ 2";
        $thoigianthi = 10;
        $thoigianbatdau = "2023-04-03 12:00:00";
        $thoigianketthuc = "2025-04-04 12:00:00";
        $xembailam = 1;
        $xemdiem = 1;
        $xemdapan = 1;
        $daocauhoi = 1;
        $daodapan = 1;
        $tudongnop = 1;
        $loaide = 1;
        $socaude = 1;
        $socautb = 1;
        $socaukho = 1;
        $chuong = [7,23];
        $manhom = [2];
        $result = $this->dethimodel->create($mamonhoc, $nguoitao, $tende, $thoigianthi, $thoigianbatdau, $thoigianketthuc, $xembailam, $xemdiem, $xemdapan, $daocauhoi, $daodapan, $tudongnop, $loaide, $socaude, $socautb, $socaukho, $chuong, $manhom);
        $this->assertIsInt($result);
    }

    public function testDelete(){
        $made = 1;
        $result = $this->dethimodel->delete($made);
        $this->assertTrue($result);
    }

    public function testUpdate(){
        $made = 2;
        $mamonhoc = "841059";
        $tende = "Đề kiểm tra cuối kì";
        $thoigianthi = 10;
        $thoigianbatdau = "2025-06-03 10:00:00";
        $thoigianketthuc = "2025-04-04 12:00:00";
        $xembailam = 0;
        $xemdiem = 1;
        $xemdapan = 0;
        $daocauhoi = 1;
        $daodapan = 0;
        $tudongnop = 1;
        $loaide = 1;
        $socaude = 1;
        $socautb = 1;
        $socaukho = 1;
        $chuong = [7];
        $manhom = [2];
        $result = $this->dethimodel->update($made, $mamonhoc, $tende, $thoigianthi, $thoigianbatdau, $thoigianketthuc, $xembailam, $xemdiem, $xemdapan, $daocauhoi, $daodapan, $tudongnop, $loaide, $socaude, $socautb, $socaukho, $chuong, $manhom);
        $this->assertTrue($result);

    }

    protected function tearDown(): void
    {
        $this->dethimodel = NULL;
    }
}