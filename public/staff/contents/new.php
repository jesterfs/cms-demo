<?php

    require_once('../../../private/initialize.php');
    require_login();
    $page_set = find_all_pages();
    $page_count = mysqli_num_rows($page_set) + 1;
    
        if(is_post_request()) {

        $page = [];
        $page['subject_id'] = $_POST['subject_id'] ?? '';
        $page['menu_name'] = $_POST['menu_name'] ?? '';
        $page['position'] = $_POST['position'] ?? '';
        $page['visible'] = $_POST['visible'] ?? '';
        $page['content'] = $_POST['content'] ?? '';

        $result = insert_page($page);
        
        if($result === true) {
        $new_id = mysqli_insert_id($db);
        
        $status_message = 'Page created successfully';
        $_SESSION['status_message'] = $status_message; 
        
        redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));
    } else {
        $errors = $result;
        
    }
        

      } else {

        $page = [];
        $page['subject_id'] = '';
        $page['menu_name'] = '';
        $page['position'] = '';
        $page['visible'] = '';
        $page['content'] = '';

        
        
        mysqli_free_result($page_set);

      }

        $subject_set = find_all_subjects();
        $subject_count = mysqli_num_rows($subject_set);
        $page['position'] = $page_count;
    
?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Page</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/pages/new.php'); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($page['menu_name']); ?>" /></dd>
      </dl>
        
      <dl>
        <dt>Subject</dt>
        <dd>
          <select name="subject_id">
              <?php 
                foreach($subject_set as $subject ) {
                    $is_selected = '';
                    if($page['subject_id'] == $subject['id']) 
                        {$is_selected = ' selected';}
                    echo "<option value='" . $subject['id']  . "'" . $is_selected . ">" . $subject['menu_name'] . "</option>";
                }
              ?>
          </select>
        </dd>
      </dl>  
        
      <dl>
        <dt>Position</dt>
        <dd>
         <select name="position">
            <?php
              for($i=1; $i <= $page_count; $i++) {
                echo "<option value=\"{$i}\"";
                if($page["position"] == $i) {
                  echo " selected";
                }
                echo ">{$i}</option>";
              }
            ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <?php
            $is_selected = '';
            if($page['visible'] == '1') {
                $is_selected = ' checked';
            }
          ?>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1"  <?php echo $is_selected ?>/>
        </dd>
      </dl>
      
      <dl>
        <dt>Content</dt>
        <dd>
            <textarea name="content" cols="60" rows="10"><?php echo h($page['content']); ?></textarea>
        </dd>
      </dl>
        
        
      <div id="operations">
        <input type="submit" value="Create Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
