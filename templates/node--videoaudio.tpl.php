<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable a
 */
?>


<?php if ($view_mode == 'full') { ?>


    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

        <!-- video show -->
        <div class="row">
            <div class="video col-sm-9">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane <?php if (!empty($content['field_yt_video_id'])){ echo "active";}?>" id="home">
                        <div class="video_thumb">
                            <img src="https://img.youtube.com/vi/<?php print strip_tags(render($content['field_yt_video_id'])); ?>/hqdefault.jpg">
                        </div>

                        <?php if (!empty($content['field_yt_video_id'])): ?>
                            <div class="video_player"><div id="player"></div></div>
                        <?php endif;?>

                        <!-- <p><button onclick="playVideo()">start</button><button onclick="stopVideo()">stop</button><button onclick="setSizeFull()">full</button>
                                        <button onclick="setSizeNormal()">normal</button></p>-->
                    </div>
                    <script>
                        var tag = document.createElement('script');
                        tag.src = "https://www.youtube.com/iframe_api";
                        var firstScriptTag = document.getElementsByTagName('script')[0];
                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                        var player;
                        function onYouTubeIframeAPIReady() {
                            player = new YT.Player('player', {
                                height: '476',
                                width: '847',
                                videoId: '<?php print strip_tags(render($content['field_yt_video_id'])); ?>',
                                playerVars: {
                                    'autoplay': 0, 'controls': 2, 'modestbranding': 1, 'rel': 0, 'showinfo': 0, 'theme': 'light', 'color': 'white', 'hl': 'ar', 'fs': '0', 'iv_load_policy': 1
                                }, });
                        }
                        function onPlayerReady(event) {
                            event.target.playVideo();
                        }
                        var done = false;
                        function onPlayerStateChange(event) {
                            if (event.data == YT.PlayerState.PLAYING && !done) {
                                setTimeout(stopVideo, 60000);
                                done = true;
                            }
                        }
                        function stopVideo() {
                            player.stopVideo();
                        }
                        function playVideo() {
                            player.playVideo();
                        }
                        function setSizeFull() {
                            player.setSize(1140, 641)
                        }
                        function setSizeNormal() {
                            player.setSize(847, 476)
                        }

                    </script>
                    <div role="tabpanel" class="tab-pane <?php if (empty($content['field_yt_video_id'])){ echo "active";}?>" id="profile">
                        <?php if (!empty($content['field_audio_file'])): ?>
                            <div class="audio col-sm-12">
                                <span id="timeleft">00:00:00</span>
                                <audio controls id="audio-player">
                                    <source src="<?php print file_create_url($node->field_audio_file['und'][0]['uri']); ?>" type="audio/mpeg">
                                    <?php print t('Your Browser Doesn\'t support audio player'); ?>
                                </audio>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="vidoe_bar ">
                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                            <?php if (!empty($content['field_yt_video_id'])): ?>
                                <li role="presentation" <?php if (!empty($content['field_yt_video_id'])): ?>class="active"<?php endif;?>>
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">مشاهدة الفيديو</a>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($content['field_audio_file'])): ?>
                                <li role="presentation" <?php if (empty($content['field_yt_video_id'])): ?>class="active"<?php endif;?>>
                                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">المادة الصوتية</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <ul class="video_list">
                            <?php if (!empty($node->field_texted_video['und'][0]['uri'])): ?>
                                <li><a href="<?php print file_create_url($node->field_texted_video['und'][0]['uri']); ?>"><?php print t('النص المفرغ'); ?></a></li>
                            <?php endif; ?>
                            <?php if (!empty($node->field_audio_file['und'][0]['uri'])): ?>
                                <li><a href="<?php print file_create_url($node->field_audio_file['und'][0]['uri']); ?>"><?php print t('تحميل mp3'); ?></a></li>
                            <?php endif; ?>
                            <?php if (!empty($node->field_video_file['und'][0]['uri'])): ?>
                                <li><a href="<?php print file_create_url($node->field_video_file['und'][0]['uri']); ?>"><?php print t('تحميل الفيديو'); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="the_index hidden-xs col-sm-3" >
                <h3><?php print t('الجدول الزمني للمقطع') ?></h3>
                <ul><li><span>0:0:0</span> <button class="index_btn" onclick="player.seekTo(0, true)">البداية</button></li></ul>
                <div class="scroll" data-role="scrollbox" data-scroll="vertical">
                    <?php print render($content['field_video_index']); ?>
                </div>
            </div>
        </div>
        <!-- video show -->



        <!-- video info -->
        <div class="row">
                <div class="<?php if (!empty($node->book['bid'])) { echo 'description col-sm-6'; } else { echo 'description col-sm-9'; } ?>">
                    <h3 class="video_title">  <?php print strip_tags($title); ?></h3>
                    <p> <?php print strip_tags(render($content['field_video_description'])); ?></p>
                </div>
                <?php if (!empty($node->book['bid'])) { ?>
				<div class="video_series col-sm-3">
                	<?php $parent_id = $node->book['bid']; $node2 = node_load($parent_id); echo '<a class="s_title" href="' . url("node/$parent_id") . '">' . $node2->title . '</a>'; ?>
	                <div class="scroll" data-role="scrollbox" data-scroll="vertical">

						<?php
						$block = block_load('book', 'navigation');      
						$output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));        
						print $output; 
						?>


	                </div>
                	<a class="all_series" href="<?php url("node/$parent_id") ?>">صفحة السلسلة</a>
				</div>
				<?php ;} ?>
				<div id="video_series" class="video_details col-sm-3">
                    <h3>معلومات عن المادة</h3>
                    <ul>   
                        <?php if (isset($content['field_video_lenght'])): ?>
                        	<li><span class="lab">الزمن:</span><?php print strip_tags(render($content['field_video_lenght'])); ?></li>
                        <?php endif; ?>

                        <?php if (isset($node->field_video_file['und'][0]['timestamp'])) { ?>
                        	<li><span class="lab">التاريخ: </span><?php echo date('m-d-Y', $node->field_video_file['und'][0]['timestamp']); ?></li>
                        <?php }; ?>
                        
                        <?php if (isset($content['field_category'])): ?>
                        	<li><span class="lab"> القسم:</span><span class="dep"><?php print strip_tags(render($content['field_category'])); ?></span></li>
                        <?php endif; ?>
							
						<?php if (isset($node->field_tags['und'][0]['taxonomy_term']->name)): ?>
							<li><ul class="tag_list">
								<li><span class="lab"> وسوم:</span></li>
	                            <?php $i = 0; foreach ($node->field_tags['und'] as $value) { ?>
	                            	<li class="tag"><?php print ( $node->field_tags['und'][$i]['taxonomy_term']->name); ?></li>
								<?php $i++; } ?>
							</ul></li>
						<?php endif; ?>
						
                    </ul>
                </div>
            </div>
        <!-- / video info -->        
        
		<script >
			$ = jQuery;
		    $(".index_btn").click(function() {
		    $(".index_btn").removeClass("active_btn");
		    $(this).addClass("active_btn");
			});
		
		    $(document).ready(function () {   
		        $("#timeleft").text($("#audio").duration);
		    })
		</script>

        <!-- audio-->
        <script>
                var audio = document.getElementById("audio-player");
                audio.addEventListener("timeupdate", function () {
                    var timeleft = document.getElementById("timeleft"),
                            duration = parseInt(audio.duration),
                            currentTime = parseInt(audio.currentTime),
                            timeLeft = duration - currentTime,
                            s, m, h;


                    s = timeLeft % 60;
                    m = Math.floor(timeLeft / 60) % 60;
                    h = Math.floor(timeLeft / 60 / 60) % 60;

                    s = s < 10 ? "0" + s : s;
                    m = m < 10 ? "0" + m : m;
                    h = h < 10 ? "0" + h : h;

                    timeleft.innerHTML = h + ":" + m + ":" + s;

                }, false);
            </script>
        <!--    tabs-->

        <script>
            $('#myTabs a').click(function (e) {
                e.preventDefault()
                $(this).tab('show')
            })
        </script>

            

        
    </div>
    
    
        <?php } else if($view_mode == 'teaser' || $view_mode == 'search_index') { ?>
        
        
	<div class="video-item <?php if ($view_mode == 'search_index') { echo 'search_index'; } ?>">
		<a class="thumb_link" href="<?php print $node_url ?>">
			
		<?php if (!empty($content['field_yt_video_id'])){ ?>
		<img alt="<?php print strip_tags($title); ?>" class="circle_thumb" src="https://img.youtube.com/vi/<?php print $node->field_yt_video_id['und'][0]['value']; ?>/mqdefault.jpg">
		  <div class="thumb_b_bg">
		     <span class="video_icon"></span>
		  </div>		
		<?php } else {
			$address = '' . base_path() . drupal_get_path('theme',$GLOBALS['theme']) . '/cust/audio.jpg';
			?>
		<img alt="<?php print strip_tags($title); ?>" class="circle_thumb" src="<?php echo $address; ?>">			
		  <div class="thumb_b_bg">
		     <span class="audio_icon"></span>
		  </div>
		<?php } ?>

		</a>
	
		<h3 class="video_title"><a href="<?php print $node_url ?>"><?php print strip_tags($title); ?></a></h3>
                     <span class="posted"><?php print t('منذ'); print " "; print format_interval(time() - $node->created, 1); ?></span>
                     <p> <?php print strip_tags(render($content['field_video_description'])); ?></p>
		
		<?php if ($view_mode == 'search_index') { ?>
			<p><?php print truncate_utf8(strip_tags($node->field_video_description['und'][0]['value']), 180, $wordsafe = FALSE, $add_ellipsis = TRUE, $min_wordsafe_length = 1); ?></p>
		<?php } ?>
		
		
	</div>
		
		
		<?php } ?>

