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

  <div class='columns show-columns is-desktop'>
      <div class='column '>
          
          <div class="page show">
            <table class="table is-bordered mb-5 mt-5 is-two-thirds">
                <tbody>
                    <tr>
                        <td><strong>Project</strong></td>
                        <td><?php echo h($project['project_name']); ?></td>
                    </tr>

                    <tr>
                        <td><strong>Position</strong></td>
                        <td><?php echo h($project['position']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Technology</strong></td>
                        <td><?php echo h($project['technology']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Description</strong></td>
                        <td><?php echo h($project['description']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>GitHub Frontend</strong></td>
                        <td><?php echo h($project['github_front']); ?></td> 
                    </tr>
                    <tr>
                        <td><strong>GitHub Backend</strong></td>
                        <td><?php echo h($project['github_back']); ?></td>      
                    </tr>
                    <tr>
                        <td><strong>Live URL</strong></td>
                        <td><?php echo h($project['live_url']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Image Url</strong></td>
                        <td><?php echo h($project['image_url']); ?></td>

                    </tr>
                    <tr>
                        <td><strong>Image Preview</strong></td>
                        <td><img src="<?php echo h($project['image_url']); ?>"> </td>
                    </tr>
                    <tr>
                        <td><strong>Visible</strong></td>
                        <td> 
                            <?php 
                                if($project['visible']==1) {
                                    echo 'Yes';
                                } else { echo 'No';}
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><a class="action" href="<?php echo url_for('/staff/projects/edit.php?id=' . h(u($project['id']))); ?>">Edit</a></td>
                        <td><a class="action" href="<?php echo url_for('/staff/projects/delete.php?id=' . h(u($project['id']))); ?>">Delete</a></td>
                    </tr>
                </tbody>

            </table>
          </div>
          
      </div>
      
      <div class='column is-one-third'>
          <div>
              <div class="project-card show-preview card mb-5 mt-5">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="<?php echo $project['image_url'] ?>" alt="Placeholder image">
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">

                    <div class="media-content">
                      <p class="title is-4"><?php echo $project['project_name'] ?></p>
                      <p class="subtitle is-6 tech-stack"><?php echo $project['technology'] ?></p>
                    </div>
                  </div>

                  <div class="content proj-desc">
                    <?php echo $project['description'] ?>
                  </div>
                </div>
                <footer class="card-footer proj-foot">
                    <a href="<?php echo $project['github_front'] ?>" class="is-one-third-tablet card-footer-item <?php if(!$project['github_front']) {echo ' inactive';} ?>">Frontend Code</a>
                    <a href="<?php echo $project['github_back'] ?>" class="is-one-third-tablet card-footer-item <?php if(!$project['github_back']) {echo ' inactive';} ?>">Backend Code</a>
                    <a href="<?php echo $project['live_url'] ?>" class=" is-one-third-tablet card-footer-item <?php if(!$project['live_url']) {echo ' inactive';} ?>">Live App</a>
                  </footer>    
            </div>
          
          </div>
            
      </div>
      
  </div>
  
  
  
  
  
  
  
                    
                  

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
