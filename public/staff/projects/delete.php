<?php

require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/project/index.php'));
}
$id = $_GET['id'];



if(is_post_request()) {
    $result = delete_project($id);
    $status_message = 'Project deleted successfully';
    $_SESSION['status_message'] = $status_message;  
    redirect_to(url_for('/staff/projects/index.php'));
} else {
    $project = find_project_by_id($id);
}

?>

<?php $page_title = 'Delete Project'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/projects/index.php'); ?>">&laquo; Back to List</a>

  <div class="page delete">
    <h1>Delete Project</h1>
    <p>Are you sure you want to delete this project?</p>
    <p class="item"><?php echo h($project['project_name']); ?></p>

    <form action="<?php echo url_for('/staff/projects/delete.php?id=' . h(u($project['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Project" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
