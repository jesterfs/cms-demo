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
  $admin['first_name'] = $_POST['first_name'] ?? '';
  $admin['last_name'] = $_POST['last_name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  
  
  
  $result = update_admin($admin);
  if($result === true) {
    $status_message = 'Admin updated successfully';
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

    
    <form action="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($id))); ?>" method="post">
        
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($admin['first_name']); ?>" /></dd>
      </dl>
        
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($admin['last_name']); ?>" /></dd>
      </dl>  
        
      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="<?php echo h($admin['email']); ?>" /></dd>
      </dl>  
        
      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?php echo h($admin['username']); ?>" /></dd>
      </dl> 
         
        
      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>

  </div>
  
  <td><a class="action" href="<?php echo url_for('/staff/admins/edit_password.php?id=' . h(u($admin['id']))); ?>">Change Password</a></td>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
