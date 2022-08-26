<?php

$project_set = find_all_visible_projects();




?>

<div id="" class='content-block'>    
    <h3 class='title is-5' >Projects...</h3>
</div>
<div class="columns mt-5">  
            <?php
              while($project = mysqli_fetch_assoc($project_set)) { ?>
                <div class='column is-desktop'>
                    <div class="project-card card">
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
            <?php  
              }
            ?>
    
        </div>