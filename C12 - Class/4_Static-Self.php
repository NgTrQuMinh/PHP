<?php
class ToanHoc
{
    public static $pi = 3.14;
    public static function TinhBinhPhuong($x)
    {
        return $x * $x;
    }
}
// Gọi trực tiếp bằng dấu hai dấu hai chấm (::)
echo ToanHoc::$pi;
echo "<br>";
echo ToanHoc::TinhBinhPhuong(5);
// Mẹo: Bên trong class, để trỏ đến thuộc tính static, ta dùng self::$ten_bien thay vì $this->ten_bien.

