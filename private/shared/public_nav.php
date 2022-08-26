<?php ?>

<nav class="navbar is-fixed-top is-black" id="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="#header">
        <h1 class="title is-0" style="font-family: 'Courgette'; color: white;" >Stewart Jester</h1>
    </a>
      <a href="#skills" class="navbar-item">
        Skills
      </a>

      <a href="#projects" class="navbar-item">
        Projects
      </a>

    
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      

      
    </div>

    <div class="navbar-end">
        
      <div class="navbar-item">
        <div class="buttons">
      
            
          
          <?php 
                if(is_logged_in()){
                echo "
                <a class='button is-light' href=" . url_for('/staff/index.php') . ">Admin</a>
                ";
                 }
            ?>
        </div>
      </div>
    </div>
  </div>
</nav>

