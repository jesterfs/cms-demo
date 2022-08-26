<?php require_once('../../../private/initialize.php'); 
require_login();
?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$content = find_content_by_id($id);

?>

<?php $page_title = 'Show Content'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/contents/index.php'); ?>">&laquo; Back to List</a>

    <div class="page show">

        <table class='table is-bordered mb-5 mt-5'>
            <tbody>
                <tr>
                    <td><strong>Location</strong></td>
                    <td><?php
                        $location = ucfirst(h($content['location']));
                        echo str_replace("_", " ", $location); 
                    
                    ?></td>
                </tr>
                <tr>
                    <td><strong>Content</strong></td>
                    <td>
                    <?php 
                    $allowed_tags = '<div><img><h1><h2><p><br><strong><em><ul><li>';
                    
                    echo strip_tags($content['content'], $allowed_tags); 
                    
                    ?>
                    
                    </td>
                </tr>
                <tr>
                    <td><strong>Visible</strong></td>
                    <td>
                        <?php 
                            if($content['visible']== 1) {
                                echo 'Yes';
                            }else {echo 'No';}
                        
                        ?>
                    
                    </td>
                </tr>
                <tr>
                    <td><a class="action" href="<?php echo url_for('/staff/contents/edit.php?id=' . h(u($project['id']))); ?>">Edit</a></td>
                    <td></td>
                </tr>
            
            </tbody>
        
        
        </table>


    </div>
<td><a class="action" href="<?php echo url_for('/staff/contents/edit.php?id=' . h(u($content['id']))); ?>">Edit</a></td>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
