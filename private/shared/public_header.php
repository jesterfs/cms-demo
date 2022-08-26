<?php 
//require_once('../initialize.php'); 

$content = find_content_by_id(8);
$introduction = $content['content'];
$skills = find_content_by_id(9);

?>
<?php include(SHARED_PATH . '/public_nav.php'); ?>
<!doctype html>

<html lang="en">
  <head>
    <title>Stewart Jester <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo url_for('/stylesheets/public.css') ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" media="all" href="/stylesheets/public.css" />

  </head>

  <body>
  

      <section id="header" class=" mt-6  mb-5 hero hero-img is-medium is-flex">
  <!-- Hero head: will stick at the top -->
  

  <!-- Hero content: will be in the middle -->
  <div class=" p-5   hero-body">
      
  <div class="columns">
        
            <div class=" column introduction is-two-thirds">

                <div class="content-block mb-5 intro-text" >
                    <h1 class="title hello-text" style="font-family: 'Courgette';">Hello...</h1>
                    <p class="has_text_centered" style="">
                        <?php if ($content['visible']==1) {
                            $allowed_tags = '<div><img><h1><h2><p><br><strong><em><ul><li>';

                            $formatted_intro = strip_tags($introduction, $allowed_tags); 

                            echo $formatted_intro ;
                        }  ?>
                    </p>
                </div>
                
            </div>
   
                <figure class='image column'>
                    <img class='headshot is-rounded is-hidden-mobile'' src='<?php echo url_for('/images/stewart.jpg') ?>'>
                </figure> 
            
        
        
        
    </div>  
      
   
  </div>

  <!-- Hero footer: will stick at the bottom -->
  
</section>
    
