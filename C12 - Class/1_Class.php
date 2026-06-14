<?php
class Cat
{
    public $name;
    public $age;

    // Hàm khởi tạo (Constructor) và Hàm hủy (Destructor)
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    // public function __destruct()
    // {
    //     echo $this->name . ' is dead';
    // }

    public function render()
    {
        echo $this->name . ' is ' . $this->age . ' years old.<br>';
    }
    public function keu()
    {
        echo $this->name . ' meo meo meo!<br>';
    }
}

$cat1 = new Cat('Tom', 2);
$cat2 = new Cat('Mouse', 3);
$cat1->render();
$cat1->keu();
