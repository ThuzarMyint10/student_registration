<?php $database = new Database();?>

<?php if (isset($_GET['delete_btn_set'])) :
    $delete_id = $_GET['id'];
    $isdestroy = $database->delete('student', $delete_id); 
    if($isdestroy){
        ?>
   <?php }?> 
    
  <?php endif; ?>
