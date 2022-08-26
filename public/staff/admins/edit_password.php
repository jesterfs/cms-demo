<?php



require_once('../../../private/initialize.php');

require_login(); 

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/admins/index.php'));
}
$id = $_GET['id'];



if(is_post_request()) {

  // Handle form values sent by new.php
  $admin =[];  
  $admin['id'] = $id;
  $admin['current_password'] = $_POST['current_password'] ?? '';
  $admin['new_password'] = $_POST['new_password'] ?? '';
  $admin['confirm_password'] = $_POST['confirm_password'] ?? '';
  
  
  
  $result = update_admin_password($admin);
  if($result === true) {
    $status_message = 'Password updated successfully';
    $_SESSION['status_message'] = $status_message;  
    redirect_to(url_for('/staff/admins/show.php?id=' . $id));
  } else {   
    $errors = $result;
    //var_dump($errors);
  }
  
} else {
    $admin = find_admin_by_id($id);
    
}


    
?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="page edit">
    <h1>Edit Admin</h1>

    <?php echo display_errors($errors) ?>

    
    <form action="<?php echo url_for('/staff/admins/edit_password.php?id=' . h(u($id))); ?>" method="post">
      
      <dl>
        <dt>Current Password</dt>
        <dd><input type="password" name="current_password" value="" /></dd>
      </dl>  
        
      <dl>
        <dt>New Password</dt>
        <dd><input type="password" name="new_password" value="" /></dd>
      </dl>  
        
       <dl>
        <dt>Confirm New Password</dt>
        <dd><input type="password" name="confirm_password" value="" /></dd>
      </dl> 
         
        
      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
