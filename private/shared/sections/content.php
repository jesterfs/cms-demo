<?php 

    $content = find_content_by_id(8);
    $introduction = $content['content'];
    $skills = find_content_by_id(9);
?>

   
<hr id="skills" style="border-top: dotted 7px; width: 5%; margin-left: auto; margin-right: auto;">
<div id="" class='content-block mb-5'>
    <h2 class='title is-5'>Skills...</h2>
    <p>
        <?php
        if ($skills['visible']==1) {
            

            echo $skills['content'] ;
        }     
        ?>
    </p>

</div>