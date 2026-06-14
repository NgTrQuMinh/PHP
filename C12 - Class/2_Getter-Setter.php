<?php
class TaiKhoanNganHang
{
    private $soDu = 0; // Không cho phép sửa trực tiếp từ bên ngoài

    // Getter để xem số dư
    public function getSoDu()
    {
        return $this->soDu . " USD";
    }

    // Setter để nạp tiền (có kiểm tra điều kiện)
    public function napTien($soTien)
    {
        if ($soTien > 0) {
            $this->soDu += $soTien;
        }
    }
}

$tk = new TaiKhoanNganHang();
$tk->napTien(100);
echo $tk->getSoDu(); // 100 USD
// $tk->soDu = 5000; // LỖI NGAY! Vì thuộc tính là private.
