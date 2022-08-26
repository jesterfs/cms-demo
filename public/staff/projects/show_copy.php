<?php require_once('../../../private/initialize.php'); 
require_login();
?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$project = find_project_by_id($id);
//$preview = preview_page_by_id($id);

?>

<?php $page_title = 'Show Project'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/projects/index.php'); ?>">&laquo; Back to List</a>

  <div class="page show">

    <h1>Project: <?php echo h($project['project_name']); ?></h1>



    <div class="card attributes">
      
        

    </div>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
