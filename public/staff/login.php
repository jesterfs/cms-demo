<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if(is_blank($username)) {
      $errors[] = 'Username cannot be blank';
  }
  
  if(is_blank($password)) {
      $errors[] = 'Password cannot be blank';
  }
  
  if(empty($errors)) {
      $admin = find_admin_by_username($username);
      if($admin) {
          //Using one variable ensures message is the same
          $login_failure_msg = "Login was unsuccessful";
          if(password_verify($password, $admin['hashed_password'])) {
              //Password Matches
                log_in_admin($admin);
                redirect_to(url_for('/staff/index.php'));
          } else {
              //username found but wornd Password
              $errors[] = $login_failure_msg;
          }
      } else {
          //no username found
          $errors[] = "Login was unsuccessful";
      }
  }
  
  
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
