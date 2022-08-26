<?php 
    if(!isset($page_title)) { $page_title = 'Staff Area'; }
    
    $status_message = $_SESSION['status_message'] ?? '';

    $username = $_SESSION['username'];
    $admin = find_admin_by_username($username);
    $welcome_message = '';

    if($username) {
        $welcome_message='Hello, ' . $admin['first_name'] . '!';
    } else { $welcome_message= 'Welcome back!';}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Stewart Jester - <?php echo h($page_title); ?></title>
        
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo url_for('/stylesheets/staff.css') ?>" />
        <link rel="stylesheet" media="all" href="/PhpProject2/public/stylesheets/bulma.css" />
        <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                <?php echo $welcome_message ; ?>
                            </h1>
                            <h2 class="subtitle">
                                I hope you are having a great day!
                               
                                      
                            </h2>
                            
                        </div>
                    </div>
                </section>
        
        
        <navigation class="has-text-centered">

            


            <nav class="navbar " role="navigation" aria-label="main navigation">
                <div class="navbar-start">
                                  
                    <div class="ml-2 has-text-centered navbar-item">
                        <a href=<?php echo url_for('/staff/index.php') ?> >Menu</a>
                    </div>
                   
                    <div class="ml-2 has-text-centered navbar-item">
                    <a href=<?php echo url_for('/index.php') ?> >Front Page</a>
                    </div>
                    <div class=" ml-2 has-text-centered navbar-item">
                    <a href= <?php echo url_for('/staff/admins/index.php') ?>>Admin</a>
                    </div>
                </div>
                <div class="navbar-end">
                    <div class="mr-2 navbar-item">
                        User: <?php echo $_SESSION['username'] ?? ''; ?>                
                    </div>
                    <div class="ml-2 has-text-centered navbar-item">
                        <a href=<?php echo url_for('/staff/logout.php') ?> >Logout</a>
                    </div>
                </div>
            </nav>





            
            
        </navigation>
    
    <?php echo display_session_message(); ?>
