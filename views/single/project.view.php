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
        <h2>PROJECT PAGE</h2>
        <?php
        if(!empty($data['project'])) {
            foreach($data['project'] as $key => $value) { ?>
                <div><?php echo $key . $value ?></div>
            <?php } ?>
        <?php } ?>
    </div>
</main>
