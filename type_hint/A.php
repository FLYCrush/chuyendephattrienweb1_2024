<?php
require_once 'C.php';
// Kế thừa từ lớp C
class A extends C {
    public function a1() {
        echo "This is function a1 from class A.";
    }
}
$a = new A();
$a->a1();
echo "<br>";
?>
