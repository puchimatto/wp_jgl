<?php

add_filter('comments_template', 'legacy_comments');

function legacy_comments($file) {

	if(!function_exists('wp_list_comments')) : // WP 2.7-only check
		$file = TEMPLATEPATH . '/legacy.comments.php';
	endif;

	return $file;
}

//Turn a category ID to a Name
function cat_id_to_name($id) {
	foreach((array)(get_categories()) as $category) {
    	if ($id == $category->cat_ID) { return $category->cat_name; break; }
	}
}

include(TEMPLATEPATH."/tools/breadcrumb-navigation-xt.php");

if ( function_exists('register_sidebars') )
	register_sidebar(array('name'=>'Sidebar Top',));
	register_sidebar(array('name'=>'Sidebar Bottom Left',));
	register_sidebar(array('name'=>'Sidebar Bottom Right',));
	register_sidebar(array('name'=>'468x60 Header Banner',));
	register_sidebar(array('name'=>'468x60 Post Banner',));

$themename = "Lifestyle Theme";
$shortname = "lifestyle";

$options = array (
				array(	"name" => "General Settings",
						"type" => "heading"),
				
				array(	"name" => "Featured Top Left",
						"desc" => "This is for the homepage feature area, top-left.<br /><br />",
			    		"id" => $shortname."_feature_cat_1",
			    		"type" => "cat_select"),
				
				array(	"name" => "# of Posts",
						"desc" => "How many posts would you like to include for this category?<br /><br />",
			    		"id" => $shortname."_feature_cat_1_num",
			    		"type" => "text"),
			    		
				array(	"name" => "Featured Top Right",
						"desc" => "This is for the homepage feature area, top-right.<br /><br />",
			    		"id" => $shortname."_feature_cat_2",
			    		"type" => "cat_select"),
			    		
				array(	"name" => "# of Posts",
						"desc" => "How many posts would you like to include for this category?<br /><br />",
			    		"id" => $shortname."_feature_cat_2_num",
			    		"type" => "text"),
			    		
				array(	"name" => "Featured Bottom",
						"desc" => "This is for the homepage feature area, bottom.<br /><br />",
			    		"id" => $shortname."_feature_cat_3",
			    		"type" => "cat_select"),
			    		
				array(	"name" => "# of Posts",
						"desc" => "How many posts would you like to include for this category?<br /><br />",
			    		"id" => $shortname."_feature_cat_3_num",
			    		"type" => "text"),
				
				array(	"name" => "Blog Category",
						"desc" => "This is to configure which category is being used on the Blog Page template.<br /><br />",
			    		"id" => $shortname."_blog_cat_1",
			    		"type" => "cat_select"),
				
				array(	"name" => "# of Posts",
						"desc" => "How many posts would you like to include on each blog page?<br /><br />",
			    		"id" => $shortname."_blog_cat_1_num",
			    		"type" => "text"),																														
);
		
function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
					if($value['type'] != 'multicheck'){
                    	update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
					}else{
						foreach($value['options'] as $mc_key => $mc_value){
							$up_opt = $value['id'].'_'.$mc_key;
							update_option($up_opt, $_REQUEST[$up_opt] );
						}
					}
				}

                foreach ($options as $value) {
					if($value['type'] != 'multicheck'){
                    	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } 
					}else{
						foreach($value['options'] as $mc_key => $mc_value){
							$up_opt = $value['id'].'_'.$mc_key;						
							if( isset( $_REQUEST[ $up_opt ] ) ) { update_option( $up_opt, $_REQUEST[ $up_opt ]  ); } else { delete_option( $up_opt ); } 
						}
					}
				}
                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
				if($value['type'] != 'multicheck'){
                	delete_option( $value['id'] ); 
				}else{
					foreach($value['options'] as $mc_key => $mc_value){
						$del_opt = $value['id'].'_'.$mc_key;
						delete_option($del_opt);
					}
				}
			}
            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "$themename Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> options</h2>

<form method="post">

<table class="optiontable">

<?php foreach ($options as $value) { 
	
	switch ( $value['type'] ) {
		case 'text':
		option_wrapper_header($value);
		?>
		        <input style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
		<?php
		option_wrapper_footer($value);
		break;
		
		case 'select':
		option_wrapper_header($value);
		?>
	            <select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
	                <?php foreach ($value['options'] as $option) { ?>
	                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
	                <?php } ?>
	            </select>
		<?php
		option_wrapper_footer($value);
		break;
		
		//////////////////////////////////
		//This is the category select code
		//	Code courtesy of Nathan Rice
		case 'cat_select':
		option_wrapper_header($value);
		$categories = get_categories('hide_empty=0');
		?>
	            <select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php foreach ($categories as $cat) {
					if ( get_settings( $value['id'] ) == $cat->cat_ID) { $selected = ' selected="selected"'; } else { $selected = ''; }
					$opt = '<option value="' . $cat->cat_ID . '"' . $selected . '>' . $cat->cat_name . '</option>';
					echo $opt; } ?>
	            </select>
		<?php
		option_wrapper_footer($value);
		break;
		//end category select code
		//////////////////////////
		
		case 'textarea':
		$ta_options = $value['options'];
		option_wrapper_header($value);
		?>
				<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="width:400px;height:100px;"><?php 
				if( get_settings($value['id']) != "") {
						echo stripslashes(get_settings($value['id']));
					}else{
						echo $value['std'];
				}?></textarea>
		<?php
		option_wrapper_footer($value);
		break;

		case "radio":
		option_wrapper_header($value);
		
 		foreach ($value['options'] as $key=>$option) { 
				$radio_setting = get_settings($value['id']);
				if($radio_setting != ''){
		    		if ($key == get_settings($value['id']) ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				}else{
					if($key == $value['std']){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				}?>
	            <input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
		<?php 
		}
		 
		option_wrapper_footer($value);
		break;
		
		case "checkbox":
		option_wrapper_header($value);
						if(get_settings($value['id'])){
							$checked = "checked=\"checked\"";
						}else{
							$checked = "";
						}
					?>
		            <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		<?php
		option_wrapper_footer($value);
		break;

		case "multicheck":
		option_wrapper_header($value);
		
 		foreach ($value['options'] as $key=>$option) {
	 			$pn_key = $value['id'] . '_' . $key;
				$checkbox_setting = get_settings($pn_key);
				if($checkbox_setting != ''){
		    		if (get_settings($pn_key) ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				}else{
					if($key == $value['std']){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				}?>
	            <input type="checkbox" name="<?php echo $pn_key; ?>" id="<?php echo $pn_key; ?>" value="true" <?php echo $checked; ?> /><label for="<?php echo $pn_key; ?>"><?php echo $option; ?></label><br />
		<?php 
		}
		 
		option_wrapper_footer($value);
		break;
		
		case "heading":
		?>
		<tr valign="top"> 
		    <td colspan="2" style="text-align: center;"><h3><?php echo $value['name']; ?></h3></td>
		</tr>
		<?php
		break;
		
		default:

		break;
	}
}
?>

</table>

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

function option_wrapper_header($values){
	?>
	<tr valign="top"> 
	    <th scope="row"><?php echo $values['name']; ?>:</th>
	    <td>
	<?php
}

function option_wrapper_footer($values){
	?>
	    </td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td><td><small><?php echo $values['desc']; ?></small></td>
	</tr>
	<?php 
}

function mytheme_wp_head() { 
	$stylesheet = get_option('revmag_alt_stylesheet');
	if($stylesheet != ''){?>

<?php }
} 

add_action('wp_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin'); 
?>
<?php function the_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
      echo "<p>";
      echo $content;
      echo "&nbsp;<a href='";
      the_permalink();
      echo "'>"."Read More &rarr;</a>";
      echo "</p>";
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "<p>";
        echo $content;
        echo "...";
        echo "&nbsp;<a href='";
        the_permalink();
        echo "'>".$more_link_text."</a>";
        echo "</p>";
   }
   else {
      echo "<p>";
      echo $content;
      echo "&nbsp;<a href='";
      the_permalink();
      echo "'>"."Read More &rarr;</a>";
      echo "</p>";
   }
}

function obituarios(){
?>	

	<!--<div class="hpfeatured">-->
			<?php $feature_cat_1 = get_option('lifestyle_feature_cat_1'); $feature_cat_1_num = get_option('lifestyle_feature_cat_1_num'); if(!$feature_cat_1) $feature_cat_1 = 1; //setting a default ?>
			<!--<h3><?php echo cat_id_to_name($feature_cat_1); ?></h3>-->
			<h3><?php echo 'Obituarios'; ?></h3>
			    
				<?php $recent = new WP_Query("cat=".$feature_cat_1."&showposts=".$feature_cat_1_num); while($recent->have_posts()) : $recent->the_post();?>
						
				<b><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></b>
				<?php the_excerpt  ("Leer m&aacute;s..."); ?>
				<?php //the_content_limit(102, "Leer m&aacute;s..."); ?>
				<?php //the_content("Leer m&aacute;s..."); ?>
				
				<!--<div style="border-bottom:1px dotted #94B1DF; margin-bottom:10px; padding:0px 0px 10px 0px; clear:both;"></div>-->
				
				<?php endwhile; ?>
				
				<!--<b><a href="<?php echo get_category_link($feature_cat_1); ?>" rel="bookmark">Read More Posts From This Category</a></b>-->
				
			<!--</div>-->
<?			
}


function listings(){
?>	

	<div class="hpfeatured">
			<?php $feature_cat_2 = get_option('lifestyle_feature_cat_2'); $feature_cat_2_num = get_option('lifestyle_feature_cat_2_num'); if(!$feature_cat_2) $feature_cat_2 = 1; //setting a default ?>
			<!--<h3><?php echo cat_id_to_name($feature_cat_2); ?></h3>-->
			<h3><?php echo 'En Construccion'; ?></h3>
			    
				<?php $recent = new WP_Query("cat=".$feature_cat_2."&showposts=".$feature_cat_2_num); while($recent->have_posts()) : $recent->the_post();?>
						
				<b><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></b>
				<?php the_content("Leer m&aacute;s..."); ?>
				
				<div style="border-bottom:1px dotted #94B1DF; margin-bottom:10px; padding:0px 0px 10px 0px; clear:both;"></div>
				
				<?php endwhile; ?>
				
				<!--<b><a href="<?php echo get_category_link($feature_cat_2); ?>" rel="bookmark">Read More Posts From This Category</a></b>-->
				
			</div>
<?			
}
?>