<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title> TMNT - Rancid Tomatoes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="movie.css">
        <link rel="shortcut icon" type="image/gif" href="images/rotten.gif">
    </head>
    <body>
        <div id="banner"><img src="images/banner.png" alt="banner"></div>

        <?php
          $movie=$_GET["film"];

          $myfile = file_get_contents("./$movie/info.txt", true);
          $info = explode("\n", $myfile);

          $myfile = file_get_contents("./$movie/overview.txt", true);
          $overview = explode("\n", $myfile);
        ?>

        <h1><?php echo $info[0]."(".$info[1].")" ?></h1>

        <div id="overall">
            <div id="Overview">
              <?php
                $im = "./$movie/overview.png";
                echo '<img src="'.$movie.'/'.'overview.png'.'" alt="overview">'
              ?>
                <dl class="OverViewdl">

                <?php
                  foreach ($overview as $value) {
                    $categ = explode(":", $value);
                    switch ($categ[0]){
                      case "STARRING":
                        $star = explode(", ", $categ[1]);
                        echo "<dt>STARRING</dt><dd><ul>";
                        foreach ($star as $pers) {
                          echo "<li>".$pers."</li>";
                        }
                        echo "</dd></ul>";
                        break;
                      case "DIRECTOR":
                        $director = $categ[1];
                        echo "<dt>DIRECTOR</dt><dd>".$director."</dd>";
                        break;
                      case "SUBTITLE":
                        $sub = $categ[1];
                        echo "<dt>SUBTITLE</dt><dd>".$sub."</dd>";
                        break;
                      case "RUNTIME":
                        $runtime = $categ[1];
                        echo "<dt>RUNTIME</dt><dd>".$runtime."</dd>";
                        break;
                      case "GENRE":
                        $genre = explode(", ", $categ[1]);
                        echo "<dt>GENRE</dt><dd><ul>";
                        $count = 0;
                        foreach ($genre as $pers) {
                          $count++;
                        }
                        for($i=0; $i<($count-1);$i++){
                          echo $genre[$i].", ";
                        }
                        echo $genre[$count-1];
                        echo "</dd></ul>";
                        break;
                      case "SYNOPSIS":
                        $synopsis = $categ[1];
                        echo "<dt>SYNOPSIS</dt><dd>".$synopsis."</dd>";
                        break;
                      case "EXECUTIVE PRODUCER":
                        $execProd = $categ[1];
                        echo "<dt>EXECUTIVE PRODUCER</dt><dd>".$execProd."</dd>";
                        break;
                      case "LIGHTING AND SPECIAL EFFECTS":
                        $lights = $categ[1];
                        echo "<dt>LIGHTING AND SPECIAL EFFECTS</dt><dd>".$lights."</dd>";
                        break;
                      case "RATING":
                        $rating = $categ[1];
                        echo "<dt>RATING</dt><dd>".$rating."</dd>";
                        break;
                      case "ESRB RATING":
                        $esrb = $categ[1];
                        echo "<dt>ESRB RATING</dt><dd>".$esrb."</dd>";
                        break;
                      case "THEATRICAL RELEASE":
                        $theatrRelease = $categ[1];
                        echo "<dt>THEATRICAL RELEASE</dt><dd>".$theatrRelease."</dd>";
                        break;
                      case "MOVIE SYNOPSIS":
                        $movSyn = $categ[1];
                        echo "<dt>MOVIE SYNOPSIS</dt><dd>".$movSyn."</dd>";
                        break;
                      case "MPAA RATING":
                        $mpaa = $categ[1];
                        echo "<dt>MPAA RATING</dt><dd>".$mpaa."</dd>";
                        break;
                      case "RELEASE COMPANY":
                        $relComp = $categ[1];
                        echo "<dt>RELEASE COMPANY</dt><dd>".$relComp."</dd>";
                        break;
                      case "BOX OFFICE":
                        $boxOffice = $categ[1];
                        echo "<dt>BOX OFFICE</dt><dd>".$boxOffice."</dd>";
                        break;
                      case "LINKS":
                        $links = explode(", ", $categ[1]);
                        echo "<dt>STARRING</dt><dd><ul>";
                        foreach ($links as $pers) {
                          echo "<li>".$pers."</li>";
                        }
                        echo "</dd></ul>";
                        break;
                      case "PRODUCER":
                        $producer = explode(", ", $categ[1]);
                        echo "<dt>PRODUCER</dt><dd><ul>";
                        foreach ($producer as $pers) {
                          echo "<li>".$pers."</li>";
                        }
                        echo "</dd></ul>";
                        break;
                      case "SCREENWRITER":
                        $screenWr = $categ[1];
                        echo "<dt>SCREENWRITER</dt><dd>".$screenWr."</dd>";
                        break;
                      case "RELEASE DATE":
                        $relDate = $categ[1];
                        echo "<dt>RELEASE DATE</dt><dd>".$relDate."</dd>";
                        break;
                      case "DISTRIBUTORS":
                        $distributors = explode(", ", $categ[1]);
                        echo "<dt>DISTRIBUTORS</dt><dd><ul>";
                        foreach ($distributors as $pers) {
                          echo "<li>".$pers."</li>";
                        }
                        echo "</dd></ul>";
                        break;
                    }
                  }
                ?>

                </dl>
            </div>


            <div id="reviews">
                <div id="reviewsbar">

                  <?php
                    if($info[2]<60){
                  ?>
                      <img id="reviewsbarimg" src="images/rottenbig.png" alt="overview">
                  <?php
                    }else{
                  ?>
                      <img id="reviewsbarimg" src="images/freshlarge.jpg" alt="overview">
                  <?php
                    }
                  ?>
                   <div id="rate"><?php echo $info[2]."%" ?></div>
                </div>

                <?php
                  if(glob("./".$movie."/*.txt") != false){
                    $filecount = count(glob("./".$movie."/*.txt"));
                    $filecount = $filecount - 2;

                    echo '<div class="reviewcol">';
                    for($i = 1; $i <= ceil($filecount/2); $i++){
                      if($filecount>=10){
                        if($i<10){
                          $rev = "review"."0".$i.".txt";
                        }else{
                          $rev = "review".$i.".txt";
                        }
                      }else{
                        $rev = "review".$i.".txt";
                      }
                      $myfile2 = file_get_contents("./$movie/$rev", true);
                      $review = explode("\n", $myfile2);
                      echo '<div class="reviewquote">';
                        echo '<img class="likeimg" src="images/'.strtolower($review[1]).'.gif" alt="'.strtolower($review[1]).'">';
                        echo '"'.$review[0].'"';
                      echo '</div>';
                      echo '<div class="personalquote"><img class="personimg" src="images/critic.gif" alt="critic">';
                      echo $review[2].'<br>'.$review[3].'</div>';
                    }
                    echo '</div>';
                    echo '<div class="reviewcol">';
                    for($i = ceil($filecount/2)+1; $i <= $filecount; $i++){
                      if($filecount>=10){
                        if($i<10){
                          $rev = "review"."0".$i.".txt";
                        }else{
                          $rev = "review".$i.".txt";
                        }
                      }else{
                        $rev = "review".$i.".txt";
                      }
                      $myfile2 = file_get_contents("./$movie/$rev", true);
                      $review = explode("\n", $myfile2);
                      echo '<div class="reviewquote">';
                        echo '<img class="likeimg" src="images/'.strtolower($review[1]).'.gif" alt="'.strtolower($review[1]).'">';
                        echo '"'.$review[0].'"';
                      echo '</div>';
                      echo '<div class="personalquote"><img class="personimg" src="images/critic.gif" alt="critic">';
                      echo $review[2].'<br>'.$review[3].'</div>';
                    }
                    echo '</div>';
                  }

                ?>


            <div id="bottombar">
                (1-10) of 8
            </div>
        </div>
        <div id="w3ccheck">
            <a href="http://validator.w3.org/check/referer"><img src="images/w3c-html.png" alt="Valid HTML5"></a> <br>
            <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="images/w3c-css.png" alt="Valid CSS"></a>
	</div>

</body></html>
