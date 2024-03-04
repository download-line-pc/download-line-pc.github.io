<?php
// สร้างฟังก์ชั้นแยกตัวเลข ออกจากตัวแปรข้อความ
function extract_int($str){
     preg_match('/[^0-9]*([0-9]+)[^0-9]*/', $str, $regs);
     return (intval($regs[1]));
}
//$a="บทความที่ 45";
//echo extract_int($a);
// จะได้ 45
?>