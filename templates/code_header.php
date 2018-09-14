<header role="banner" id="page-header"> 
    <div class="container-fluid maxmenuwidth">
        <div class="row"> 

            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            </button> 


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" aria-expanded="true">
            <div class="front_page_menu col-md-9 col-sm-12">
               
                    <?php print render($page['header']); ?>
                </div>

                <div class="col-md-3 col-sm-12 search-social">
                    <?php print render($page['search']); ?>
                    <div class="social_icons">
                        <ul>
                            <li><a class="facebook_icon" href="<?php echo theme_get_setting('facebook') ?>"></a></li>
                            <li><a class="twitter_icon" href="<?php echo theme_get_setting('twitter') ?>"></a></li>
                            <li><a class="youtube_icon" href="<?php echo theme_get_setting('youtube') ?>"></a></li>
                        </ul>
                    </div>                    
                </div>
               
            </div>
        </div>
    </div>
</header>
