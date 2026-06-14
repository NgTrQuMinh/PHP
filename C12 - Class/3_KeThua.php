<?php
class Animal
{
    public $name;
    public $age;
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    // Getter 
    public function getAll()
    {
        return 'Name: ' . $this->name . ' is ' . $this->age . ' years old.<br>';
    }
}

class Cat extends Animal
{
    public function keu()
    {
        echo $this->name . ' meo meo meo!<br>';
    }
}

$cat = new Cat('Cat', 2);
$cat->keu();
echo $cat->getAll();
