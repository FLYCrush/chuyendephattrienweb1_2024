<?php
declare(strict_types=1);

require_once 'I.php';
require_once 'C.php';
require_once 'A.php';
require_once 'B.php';

class Demo {
    // Phương thức typeXReturnY
    public function typeXReturnY(string $type): ?object {
        echo __FUNCTION__ . "<br>";

        switch ($type) {
            case 'A':
                return new A();
            case 'B':
                return new B();
            case 'C':
                return new C();
            case 'I':
                return new class implements I {
                    public function f(): void {
                        echo "True";
                    }
                };
            default:
                return null; // Trả về null nếu không hợp lệ
        }
    }
}
// Tạo đối tượng từ lớp Demo và gọi ra phương thức mẫu đã tạo
$demo = new Demo();

// Gọi phương thức typeXReturnY với các loại khác nhau
$a = $demo->typeXReturnY('A');
if ($a instanceof A) {
    $a->f(); // Gọi phương thức f() từ class C
    $a->a1(); // Gọi phương thức a1() từ class A
    echo "<br>";
}

$b = $demo->typeXReturnY('B');
if ($b instanceof B) {
    $b->f(); // Gọi phương thức f() từ class C
    $b->b1(); // Gọi phương thức b1() từ class B
    echo "<br>";
}

$c = $demo->typeXReturnY('C');
if ($c instanceof C) {
    $c->f(); // Gọi phương thức f() từ class C
    echo "<br>";
}

$i = $demo->typeXReturnY('I');
if ($i instanceof I) {
    $i->f(); // Gọi phương thức f() từ class I
    echo "<br>";
}

$null = $demo->typeXReturnY('Unknown');
if ($null === null) {
    echo "Tra Ve flase .<br>";
}
echo "<br>";
echo "<br>";

// Chạy test thử các trường hợp
// $a = $demo->typeXReturnY('A');
// if ($a instanceof null) { 
//     $a->a1();
//     echo "true<br>";
// }
// else
// {
//     echo "false<br>";
// }

// $b = $demo->typeXReturnY('B');
// if ($b instanceof B) {
//     $b->b1(); 
//     echo "true<br>";
// }
// else
// {
//     echo "false<br>";
// }

$c = $demo->typeXReturnY('C');
if ($c instanceof C) {
    $c->f(); 
    echo "true <br>";
}
else
{
    echo "false<br>";
}

// $i = $demo->typeXReturnY('null');
// if ($i instanceof null) {
//     $i->f();
//     echo "true <br>";
// }
// else
// {
//     echo "false<br>";
// }