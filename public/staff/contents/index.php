<?php require_once('../../../private/initialize.php'); 
require_login();
?>

<?php
  
$content_set = find_all_contents();
?>

<?php $page_title = 'Content'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="pages listing">
    <h1>Content</h1>


  	<table class="table is-bordered is-striped list">
        <thead class="has-background-primary">    
            <tr>
                <th>ID</th>
                <th>Location</th>
                <th>Content</th>
                <th>Visible</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                
            </tr>
        </thead>
        <tfoot class="has-background-primary">    
            <tr>
                <th>ID</th>
                <th>Location</th>
                <th>Content</th>
                <th>Visible</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                
            </tr>
        </tfoot>
      <?php while($content = mysqli_fetch_assoc($content_set)) { ?>
        <tr>
          <td><?php echo h($content['id']); ?></td>
          <td><?php echo h($content['location']); ?></td>
          <td><?php echo h($content['content']); ?></td>
          <td><?php if($content['visible']== 1) {
              echo 'Yes';
          } else {echo 'No';} ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/contents/show.php?id=' . h(u($content['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/contents/edit.php?id=' . h(u($content['id']))); ?>">Edit</a></td>
    	 </tr>
      <?php } ?>
  	</table>
    
    <?php
      mysqli_free_result($content_set);
    ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
