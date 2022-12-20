<?php
$database = new Database();
$semester_datas = $database->readAll('semester');
if ($semester_datas) {
    foreach ($semester_datas as $data) {
        $semester_data = $data['name'];
        $semester_id = $data['id'];
       
        echo "<option value=$semester_id>$semester_data</option>";
    }
} else {
    foreach ($semester_datas as $data) {
        echo "<option value='strtolower('meet')'>meet</option>";
     }
 }
 ?>