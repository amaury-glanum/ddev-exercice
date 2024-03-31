<?php

var_dump($_GET);
echo '<br/>';
echo '<br/>';
var_dump($data['projects']);
echo '<br/>';
echo '<br/>';
var_dump($data['project']);
?>
<main id="homepage" class="<?php echo $page_css_id ?>">
    <div class="container">
        <div class="fond">
            <span class="s1">blog</span>
            <span class="s2">card</span>
        </div>
        <div class="card">
            <div class="thumbnail">
                <img class="left" src="https://cdn2.hubspot.net/hubfs/322787/Mychefcom/images/BLOG/Header-Blog/photo-culinaire-pexels.jpg" alt="Thumbnail">
            </div>
            <div class="right">
                <h1>Why you Need More Magnesium in Your Daily Diet</h1>
                <div class="author">
                    <img src="https://randomuser.me/api/portraits/men/95.jpg" alt="Author">
                    <h2>Igor MARTY</h2>
                </div>
                <div class="separator"></div>
                <p>Magnesium is one of the six essential macro-minerals that is required by the body for energy production and synthesis of protein and enzymes. It contributes to the development of bones and most importantly it is responsible for synthesis of your DNA and RNA. A new report that has appeared in the British Journal of Cancer, gives you another reason to add more magnesium to your diet...</p>
                <h5>12</h5>
                <h6>JANUARY</h6>
                <ul>
                    <li><i class="fa fa-eye fa-2x"></i></li>
                    <li><i class="fa fa-heart-o fa-2x"></i></li>
                    <li><i class="fa fa-envelope-o fa-2x"></i></li>
                    <li><i class="fa fa-share-alt fa-2x"></i></li>
                </ul>
            </div>
        </div>
        <div class="fab">
            <i class="fa fa-arrow-down fa-3x"></i>
        </div>
<!--        <h2>PROJECT PAGE</h2>-->
<!--        --><?php
//        if(!empty($data['project'])) {
//            foreach($data['project'] as $key => $value) { ?>
<!--                <div>--><?php //echo $key . $value ?><!--</div>-->
<!--            --><?php //} ?>
<!--        --><?php //} ?>
    </div>
</main>
