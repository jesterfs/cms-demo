<?php if($project['github_front']) { 
                                         echo "<a class='card-footer-item' href='" . $project['github_front'] ."' target='_blank' >Front End </a>";} else {
                                             echo "<a class='card-footer-item inactive'>Front End</a>";
                                         }
                                         
                                        ?>
                                        
                                
                                
                                  <?php if($project['github_back']) { 
                                         echo "<a class='card-footer-item' href='" . $project['github_back'] ."' target='_blank' >Back End </a>";} else {
                                             echo "<a class='card-footer-iteminactive'>Back End</a>";
                                         }
                                         
                                        ?>
                                
                                
                                  <?php if($project['live_url']) { 
                                         echo "<a class='card-footer-item' href='" . $project['live_url'] ."' target='_blank' >Live App </a>";} else {
                                             echo "<a class='card-footer-item inactive'>Live App</a>";
                                         }
                                         
                                        ?>