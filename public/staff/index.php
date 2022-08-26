<?php require_once '../../private/initialize.php'; 
require_login();

$username = $_SESSION['username'];
$user = find_admin_by_username($username);

$project_set = find_all_projects();
$project_count = mysqli_fetch_assoc(count_all_projects());


$visible_project_count = mysqli_fetch_assoc(count_visible_projects());

$visible_content_count = mysqli_fetch_assoc(count_visible_content());
$content_count = mysqli_fetch_assoc(count_all_content());

?>



<?php $page_title = 'Staff Menu'; ?>
 <?php include(SHARED_PATH . '/staff_header.php') ?>

        <div id="content mr-auto ml-auto">

        
            <div id="main-menu ">
                
                <div class='menu-btns columns'>

                    <div class="column">
                        <a class = "menu-btn is-primary  button mt-5 " href= <?php echo url_for('/staff/projects/index.php') ?>>Projects</a>
                        <div class="dropdown drop-btn  is-hoverable  drop-menu">
                            <div class=" dropdown-trigger  drop-menu">
                                <button class=" menu-btn button" aria-haspopup="true" aria-controls="dropdown-menu">
                                   
                                     <i class="fas fa-angle-down"></i>
                                      
                                </button>
                            </div>
                            <div class="dropdown-menu drop-menu" style="width: 100%;" id="dropdown-menu" role="menu">
                                <div class=" dropdown-content drop-menu">
                                    <div class='columns'>
                                        <div class='column'>
                                            <div class="card has-text-centered">
                                                <p class='subtitle is-5'>Total</p>
                                                <p class='title is-5'><?php echo $project_count['COUNT(id)']; ?></p>
                                            </div>
                                        </div>
                                        <div class='column'>    
                                            <div class="card has-text-centered">
                                                <p class='subtitle is-5'>Visible</p>
                                                <p class='title is-5'><?php echo $visible_project_count['COUNT(id)']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <a class = "menu-btn is-primary  button mt-5 " href= <?php echo url_for('/staff/contents/index.php') ?>>Content</a>
                        <div class="dropdown drop-btn  is-hoverable drop-menu">
                            <div class=" dropdown-trigger drop-menu">
                                <button class=" menu-btn button" aria-haspopup="true" aria-controls="dropdown-menu">
                                   
                                     <i class="fas fa-angle-down"></i>
                                      
                                </button>
                            </div>
                            <div class="dropdown-menu" style="width: 100%;" id="dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                <div class='columns'>
                                        <div class='column'>
                                            <div class="card has-text-centered">
                                                <p class='subtitle is-5'>Total</p>
                                                <p class='title is-5'><?php echo $content_count['COUNT(id)']; ?></p>
                                            </div>
                                        </div>
                                        <div class='column'>    
                                            <div class="card has-text-centered">
                                                <p class='subtitle is-5'>Visible</p>
                                                <p class='title is-5'><?php echo $visible_content_count['COUNT(id)']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
                
            </div>

        </div>

 <?php // include(SHARED_PATH . '/staff_footer.php') ?>       
        
