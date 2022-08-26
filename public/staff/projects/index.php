<?php require_once('../../../private/initialize.php'); 
require_login();
?>

<?php
  
$project_set = find_all_projects();
?>

<?php $page_title = 'Projects'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="">
    <h1>Projects</h1>

    <div class="actions mt-2">
    <button class="button is-small"><a class="action" href="<?php echo url_for('/staff/projects/new.php'); ?>">Create New Projects</a></button>
    </div>
    <div class="mb-5 card">
  	<table class="table is-fullwidth is-bordered is-striped">
        <thead class="has-background-primary">
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Position</th>
                <th>Technology</th>
                <th>Description</th>
                <th>GitHub Frontend </th>
                <th>GitHub Backend</th>
                <th>Live URL</th>
                <th>Image URL</th> 
                <th>Visible</th>     
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tfoot class="has-background-primary">
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Position</th>
                <th>Technology</th>
                <th>Description</th>
                <th>GitHub Frontend </th>
                <th>GitHub Backend</th>
                <th>Live URL</th>
                <th>Image URL</th>
                <th>Visible</th>       
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
        <tbody>
            <?php while($project = mysqli_fetch_assoc($project_set)) { 
                $front_link ='';
                if($project['github_front']) {
                    $front_link = "<a href='" . h($project['github_front']) . "' >LINK</a>";
                } else {
                    $front_link = "N/A";
                }
                
                $back_link ='';
                if($project['github_back']) {
                    $back_link = "<a href='" . h($project['github_back']) . "' >LINK</a>";
                } else {
                    $back_link = "N/A";
                }
                
                $live_link ='';
                if($project['live_url']) {
                    $live_link = "<a href='" . h($project['live_url']) . "' >LINK</a>";
                } else {
                    $live_link = "N/A";
                }
                
                $image_link ='';
                if($project['image_url']) {
                    $image_link = "<a href='" . h($project['image_url']) . "' >LINK</a>";
                } else {
                    $image_link = "N/A";
                }
                
                ?>
                <tr>
                <td><?php echo h($project['id']); ?></td>
                <td><?php echo h($project['project_name']); ?></td>
                <td><?php echo h($project['position']); ?></td>
                <td><?php echo h($project['technology']); ?></td>
                <td><?php echo h($project['description']); ?></td>
                <td><?php echo $front_link; ?></td>
                <td><?php echo $back_link; ?></td>
                <td><?php echo $live_link; ?></td>
                <td><?php echo $image_link; ?></td>
                <td><?php 
                    
                if($project['visible'] == 1){
                    echo 'Yes';
                } else {
                    echo 'No';
                } ?></td>
                <td><a class="action" href="<?php echo url_for('/staff/projects/show.php?id=' . h(u($project['id']))); ?>">View</a></td>
                <td><a class="action" href="<?php echo url_for('/staff/projects/edit.php?id=' . h(u($project['id']))); ?>">Edit</a></td>
                <td><a class="action" href="<?php echo url_for('/staff/projects/delete.php?id=' . h(u($project['id']))); ?>">Delete</a></td>
                </tr>
            <?php } ?>
        <tbody>
  	</table>
        
    </div>
    
    
    
    
    <?php
      mysqli_free_result($project_set);
    ?>
    <h1>Preview</h1>
    <hr>
    
    <div >
        
        <div><?php include(SHARED_PATH . '/sections/projects1.php'); ?> </div>
    </div>
</div>
    
    

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
