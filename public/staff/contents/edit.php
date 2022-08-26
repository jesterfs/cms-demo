<?php

require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/contents/index.php'));
}
$id = $_GET['id'];


if(is_post_request()) {

  // Handle form values sent by new.php
  $content =[];  
  $content['id'] = $id;
  $content['location'] = $_POST['location'] ?? '';
  $content['content'] = $_POST['content'] ?? '';
  $content['visible'] = $_POST['visible'] ?? '';
  
  
  
  $result = update_content($content);
  if($result === true) {
    $status_message = 'Content updated successfully';
    $_SESSION['status_message'] = $status_message;  
    redirect_to(url_for('/staff/contents/show.php?id=' . $id));
  } else {   
    $errors = $result;
    //var_dump($errors);
  }
  
} else {
    $content = find_content_by_id($id);
    
}

?>

<?php $page_title = 'Edit Content'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/contents/index.php'); ?>">&laquo; Back to List</a>

  <div class="page edit">
    <h1>Edit <?php
    $location = ucfirst(h($content['location']));
    echo str_replace("_", " ", $location); 
    
    ?></h1>

    <?php echo display_errors($errors) ?>

    
    <form action="<?php echo url_for('/staff/contents/edit.php?id=' . h(u($id))); ?>" method="post">
      
     
        
      <dl>
        
        <dd>
            <textarea name="content" cols="60" rows="10"><?php echo h($content['content']); ?></textarea>
        </dd>
      </dl>

      <dl>
        <dt>Visible</dt>
        <dd>
            <input type="radio" id="yes" name="visible" value="1" <?php if ($content['visible'] == 1) {echo 'checked';} ?>   >
            <label for="yes" >Yes</label><br>
            <input type="radio" id="no" name="visible" value="0"  <?php if ($content['visible'] == 0) {echo 'checked';} ?>  >
            <label for="no">No</label><br>
            
        </dd>
      </dl>
        
      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
