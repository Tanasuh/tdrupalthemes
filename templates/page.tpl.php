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
 * - $ * - $page['highlighted']: Items for the highlighted content region.
  page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
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
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54cbb1ca5751fb09" async="async"></script>

<?php if (!empty($messages)) { ?>
    <script>
        $ = jQuery;
        $(window).load(function () {
            $('.bs-example-modal-lg').modal('show');
        });
    </script>
<?php } ?>

<div class="page_logo">
    <div class="container">
        <a href="<?php print $front_page; ?>" ><?php
            $address = '' . base_path() . drupal_get_path('theme',$GLOBALS['theme']) . '/cust/page_logo.png';
            global $base_root;
            echo '<img src="' . $base_root . $address . '">';
            ?></a>

    </div>
</div>

<?php include('code_header.php'); ?>

<!-- /#page-header -->
<div class="sub_header container">
    <?php if (!empty($page['sub_header'])): ?>
        <div class="row">
            <div class="col-sm-12">
                <?php print render($page['sub_header']); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="main-container container">
    <div class="row">
        <?php if (!empty($page['sidebar_first'])): ?>
            <aside class="col-sm-3" role="complementary">
                <?php print render($page['sidebar_first']); ?>
            </aside>
        <?php endif; ?>
        <section<?php print $content_column_class; ?>>
            <?php if (!empty($page['highlighted'])): ?>
                <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
            <?php endif; ?>
            <?php
            if (!empty($breadcrumb)): print $breadcrumb;
            endif;
            ?>
            <a id="main-content"></a>
            <?php print render($title_prefix); ?>
<?php if (!empty($title)): ?>
                <div class="page-header-bg">
                    <h1 class="page-header">
	                    <?php print $title; ?></h1>
                        <?php if (!empty($page['share_icons'])): ?>
                            <?php print render($page['share_icons']); ?>
                <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            <?php if (!empty($page['help'])): ?>
                <?php print render($page['help']); ?>
            <?php endif; ?>
            <?php if (!empty($action_links)): ?>
                <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>
        <?php print render($page['content']); ?>
        </section>
            <?php if (!empty($page['sidebar_second'])): ?>
            <aside class="col-sm-3" role="complementary">
            <?php print render($page['sidebar_second']); ?>
            </aside>
        <?php endif; ?>
    


    </div>
    <div id="sub_content">
<?php print render($page['sub_content']); ?>
    </div>

</div>



<?php if (isset($node->type)): ?>
    <?php if ($node->type == 'fatwa'): ?>
    
    
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
	        
	        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="modal-title">موقع الشيخ الصادق الغرياني<a class="anchorjs-link" href="#modal-title"><span class="anchorjs-icon"></span></a></h4>
          </div>
	                    <h4>الخدمة غير متاحة في الوقت الحالي نظرًا لتراكم الفتاوى المحتاجة إلى إجابة، نرجو العودة قريبًا.</h4>

            <?php print($messages); ?>
            <?php //if (!empty($page['fatwa_form'])):; ?>
                <?php// print render($page['fatwa_form']); endif; ?>
                
                
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
        
        
    <?php endif; ?>
<?php endif; ?>

<?php print render($page['footer']); ?>
<?php include('code_footer.php'); ?>

