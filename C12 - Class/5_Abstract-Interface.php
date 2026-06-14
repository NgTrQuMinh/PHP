<?php
// Abstract Class (Lớp trừu tượng)
// Là class cha thiết kế ra để làm mẫu, không thể khởi tạo object trực tiếp từ nó.
abstract class Xe
{
    abstract public function chay();
}


class XeMay extends Xe
{
    public function chay()
    {
        echo "Xe may chay";
    }
}

// Interface (Giao diện)
// Giống như một bản hợp đồng. Class nào "ký" (implement) interface thì bắt buộc phải viết code cho các hàm có trong interface đó.
interface HanhDong
{
    public function bay();
}

class SieuNhan implements HanhDong
{
    public function bay()
    {
        echo "Siêu nhân đang bay!";
    }
}
