<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<?php if (!empty($messages)) { ?>
    <script>
        $ = jQuery;
        $(window).load(function () {
            $('.bs-example-modal-lg').modal('show');
        });
    </script>
<?php } ?>

<div class="home_header">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 home_img"></div>
            <div class="col-sm-7 ">
                <div class="site_logo"><h1><a href="<?php print $front_page; ?>"><?php
                            $address = '' . base_path() . drupal_get_path('theme',$GLOBALS['theme']) . '/cust/Home_site_logo.png';
                            global $base_root;
                            echo '<img src="' . $base_root . $address . '">';
                            ?></a></h1>
                </div>
                <div class="col-sm-12 articale">

                    <?php print render($page['home_featured_article']); ?>

                </div>
            </div>
        </div>
    </div>

</div></div>

<?php include('code_header.php'); ?>

<div class="main-container container">


    <div class="row">
        <div class="home_top full col-sm-12">
            <?php print render($page['home_top_full']); ?>
        </div>
    </div>
    <div class="row">
        <div class="home_right_column compact col-sm-7">
            <?php print render($page['home_right_side']); ?>
        </div>
        <div class="home_left_column compact col-sm-5">
            <?php print render($page['home_left_side']); ?>
          

            <!-- <a class="fatawi_img" href="<?php print url("node/23"); ?>"> -->
            	<?php //
                // $address = '' . base_path() . drupal_get_path('theme',$GLOBALS['theme']) . '/cust/Home_fatawi_img.png';
                // global $base_root;
                // echo '<img src="' . $base_root . $address . '">';
                // ?>
            <!-- </a> -->

        </div>
    </div>
    <div class="row">
        <div class="home_bottom full col-sm-12">
            <?php print render($page['home_bottom_full']); ?>
        </div> 	        
    </div>   

</div>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
	        
	        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="modal-title">موقع الشيخ الصادق الغرياني<a class="anchorjs-link" href="#modal-title"><span class="anchorjs-icon"></span></a></h4>
          </div>
	         <h4>الخدمة غير متاحة في الوقت الحالي نظرًا لتراكم الفتاوى المحتاجة إلى إجابة، نرجو العودة في وقت لاحق</h4>
            <?php print($messages); ?>
            
            <?php// if (!empty($page['fatwa_form'])):; ?>
                <?php
              //  print render($page['fatwa_form']);
          //  endif;
            ?>          
            
    <script>
		$ = jQuery;
        $(function(){
            $("#edit-submit").on('click',function() {
                $(this).text("الرجاء الإنتظار");
                $(this).animate({ opacity: .5 }, 500);
            }); 
        });
    </script>            

            
            
        </div>
    </div>
</div>


</div>


<?php include('code_footer.php'); ?>

<script>
    (function ($) {
        $(document).ready(function () {
            var d = $("#page-header");
            var offset = d.offset();
            var p = offset.top;

            $(window).scroll(function () {

                if ($(window).scrollTop() >= p) {
                    $('#page-header').addClass('fixed-header');
                }
                else {
                    $('#page-header').removeClass('fixed-header');
                }

            });
        });
    })(jQuery);</script>
<!--audio-->

<script>

    var audio = document.getElementById("audio-player_f");

    audio.addEventListener("timeupdate", function () {
        var timeleft = document.getElementById('timeleft_f'),
                duration = parseInt(audio.duration),
                currentTime = parseInt(audio.currentTime),
                timeLeft = duration - currentTime,
                s, m, h;
        if (typeof duration != "undefined" && duration) {
            s = timeLeft % 60;
            m = Math.floor(timeLeft / 60) % 60;
            h = Math.floor(timeLeft / 60 / 60) % 60;
            s = s < 10 ? "0" + s : s;
            m = m < 10 ? "0" + m : m;
            h = h < 10 ? "0" + h : h;
            timeleft.innerHTML = h + ":" + m + ":" + s;

        } else {
            timeleft.innerHTML = "00:00:00";
        }
    }, false);

    (function ($) {
        $(document).ready(function () {
            // $('#timeleft_f').text('00:00:00');
            var scr = $('.audio_link').attr('id');
            $('#audio-player_f').attr('src', scr);
        });
    })(jQuery);

    (function ($) {
        $(document).ready(function () {
            $(".audio_link").click(
                    function () {
                        $('#timeleft_f').text('00:00:00');
                        var scr = $(this).attr('id');
                        $('#audio-player_f').attr('src', scr);
                        $('#audio-player_f').trigger("play");
                        $(".audio_link").removeClass("active");
                        $(this).addClass("active");
                        $(".aodio-row", this).removeClass("active");
                        $(".aodio-row", this).addClass("active");

                    });
        })
    })(jQuery);
</script>