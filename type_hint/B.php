<?php
require_once 'C.php';
// Kế thừa từ lớp C
class B extends C {
    public function b1() {
        echo "This is function b1 from class B.";
    }
}
$b = new B();
$b->b1();
echo "<br>";
?>
