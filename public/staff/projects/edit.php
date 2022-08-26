<?php

require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/projects/index.php'));
}
$id = $_GET['id'];

$project_set = find_all_projects();
$project_count = mysqli_num_rows($project_set) + 1;


if(is_post_request()) {

  // Handle form values sent by new.php
  $project =[];  
  $project['id'] = $id;
  $project['project_name'] = $_POST['project_name'] ?? '';
  $project['position'] = $_POST['position'] ?? '';
  $project['technology'] = $_POST['technology'] ?? '';
  $project['description'] = $_POST['description'] ?? '';
  $project['github_front'] = $_POST['github_front'] ?? '';
  $project['github_back'] = $_POST['github_back'] ?? '';
  $project['github_front'] = $_POST['github_front'] ?? '';
  $project['live_url'] = $_POST['live_url'] ?? '';
  $project['image_url'] = $_POST['image_url'] ?? '';
  $project['visible'] = $_POST['visible'] ?? '';





  
  
  
  $result = update_project($project);
  if($result === true) {
    $status_message = 'Project updated successfully';
    $_SESSION['status_message'] = $status_message;  
    redirect_to(url_for('/staff/projects/show.php?id=' . $id));
  } else {   
    $errors = $result;
    //var_dump($errors);
  }
  
} else {
    $project = find_project_by_id($id);
    
}

?>

<?php $page_title = 'Edit Project'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/projects/index.php'); ?>">&laquo; Back to List</a>

  <div class="page edit">
    <h1>Edit Project</h1>

    <?php echo display_errors($errors) ?>

    
    <form action="<?php echo url_for('/staff/projects/edit.php?id=' . h(u($id))); ?>" method="post">
      
     
        
    <dl>
        <dt>Project Name</dt>
        <dd><input type="text" name="project_name" value="<?php echo h($project['project_name']); ?>" /></dd>
      </dl>
         
      <dl>
        <dt>Position</dt>
        <dd>
         <select name="position">
            <?php
              for($i=1; $i <= $project_count; $i++) {
                echo "<option value=\"{$i}\"";
                if($project["position"] == $i) {
                  echo " selected";
                }
                echo ">{$i}</option>";
              }
            ?>
          </select>
        </dd>
      </dl>
        
      <dl>
        <dt>Technology</dt>
        <dd>
            <textarea name="technology" cols="60" rows="4"><?php echo h($project['technology']); ?></textarea>
        </dd>
      </dl>  
        
       <dl>
        <dt>Description</dt>
        <dd>
            <textarea name="description" cols="60" rows="8"><?php echo h($project['description']); ?></textarea>
        </dd>
      </dl>   
      
      <dl>
        <dt>GitHub Frontend</dt>
        <dd>
            <textarea name="github_front" cols="60" rows="1"><?php echo h($project['github_front']); ?></textarea>
        </dd>
      </dl>
        
      <dl>
        <dt>GitHub Backend</dt>
        <dd>
            <textarea name="github_back" cols="60" rows="1"><?php echo h($project['github_back']); ?></textarea>
        </dd>
      </dl>
        
      <dl>
        <dt>Live URL</dt>
        <dd>
            <textarea name="live_url" cols="60" rows="1"><?php echo h($project['live_url']); ?></textarea>
        </dd>
      </dl>
        
      <dl>
        <dt>Image URL</dt>
        <dd>
            <textarea name="image_url" cols="60" rows="1"><?php echo h($project['image_url']); ?></textarea>
        </dd>
      </dl>

      <dl>
        <dt>Visible</dt>
        <dd>
            <input type="radio" id="yes" name="visible" value="1" <?php if ($project['visible'] == 1) {echo 'checked';} ?>   >
            <label for="yes" >Yes</label><br>
            <input type="radio" id="no" name="visible" value="0"  <?php if ($project['visible'] == 0) {echo 'checked';} ?>  >
            <label for="no">No</label><br>
            
        </dd>
      </dl>
        
      <div id="operations">
        <input type="submit" value="Edit Project" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
