<?php
$database = new Database();
$semesterDatas = $database->readAll('semester');
if ($semesterDatas) {
    foreach ($semesterDatas as $semesterData) {
        $semesterName = $semesterData['name'];
        $semesterId = $semesterData['id'];
       
        echo "<option value=$semesterId>$semesterName</option>";
    }
} else {
    echo "<option value=''></option>";
 }
 ?>