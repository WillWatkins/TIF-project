<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <script type="module" src="TIF.js" defer></script>
    <title>TIF</title>
  </head>
  <body class="page">

      <!-- Header - navigation items created in TIF.js and passed across-->
    <div class="headingContainer">
      <div>
        <div class="titleContainer">
          <h1 class="title1">THE</h1>
          <h1 class="title2">INSIGHTS</h1>
          <h1 class="title3">FAMILY</h1>
        </div>
      </div>
      <div class="navigationItems" id="headerItems"></div>
    </div>

    <!-- Main -->
    <div class="main">
      <h4 class="mainTitle">RELATED ARTICLES</h4>

      <!-- Retrieving JSON data and extracting relevant info into an array -->
      <?php 
        $jsonString = file_get_contents("./2020-01-02.json");
        $json = json_decode($jsonString,true);

        $articlesArray = array();

        for ($index = 0; $index < count($json); $index++) {
            if (array_key_exists("attachments", $json[$index])){
                $attachments = $json[$index]["attachments"][0];
                
                // Checking to see if all info is available 
                if (array_key_exists('title', $attachments) &&
                array_key_exists('title_link', $attachments) &&
                array_key_exists('image_url', $attachments) &&
                array_key_exists('service_name', $attachments)
                ) {

                    $object = new stdClass();
                    $object->title = $attachments["title"];
                    $object->url = $attachments["title_link"];
                    $object->image = $attachments["image_url"];
                    $object->origin = $attachments["service_name"] ;
                    array_push($articlesArray, $object); 
                }
            }
        }
        
        // Creating <li> for each article
        $articles = '';

        foreach($articlesArray as $article){
            
            $image = $article->image;
            $origin = $article->origin;
            $title = $article->title;
            $url = $article->url;
    
            $articles .=
            "<li class='articleItem'>" .
            "<img src='$image' class='articleImage'/>" .
            "<div class='articleText'>" .
            "<h6 class='articleOrigin'>$origin</h5>" .
            "<h4 class='articleTitle'>$title</h4>" .
            "<a class='articleURL' href='$url' target=_blank>Learn more</a>" .
            "</div>" .
            "</li>";
        };

        ?>

        <!-- Passing <li>'s into an <ul> to display -->
      <div id="articlesList">
        <ul class="articlesContainer">
            <?php 
            echo $articles;
            ?>
        </ul>
      </div>
    </div>

    <!-- Footer- footer items created in TIF.js and passed across -->
    <div class="footer" id="footerItems"></div>
  </body>
</html>

