<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$admin = find_admin_by_id($id);

?>

<?php $admin_title = 'Show Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin show">

  <table class='table is-bordered mb-5 mt-5'>
            <tbody>
                <tr>
                    <td><strong>Name</strong></td>
                    <td><?php
                        $fname = ucfirst(h($admin['first_name']));
                        $lname = ucfirst(h($admin['last_name']));
                        echo $fname . ' ' . $lname; 
                    
                    ?></td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>
                        <?php 
                        
                        
                            echo $admin['username']; 
                        
                        ?>
                    
                    </td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>
                        <?php 
                        
                        
                            echo $admin['email']; 
                        
                        ?>
                    
                    </td>
                </tr>
                
                <tr>
                    <td><a class="action" href="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($project['id']))); ?>">Edit</a></td>
                    <td><a class="action" href="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($project['id']))); ?>">Delete</a></td>
                </tr>
            
            </tbody>
        
        
        </table>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
