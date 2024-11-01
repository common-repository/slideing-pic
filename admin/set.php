<?php
	add_action('admin_menu','create_admin_page');
	register_activation_hook(__FILE__,'set_smart_options');
	register_deactivation_hook(__FILE__,'unset_smart_options');
	
	function unset_smart_options(){
		delete_option('smart_url');
		delete_option('smart_btime');
		delete_option('smart_etime');
		delete_option('smart_h');
		delete_option('smart_d');
		delete_option('smart_u');	
	}
	
	function set_smart_options(){
		add_option('smart_url',plugins_url('../static/images/ad.gif', __FILE__));
		add_option('smart_btime',1);
		add_option('smart_etime',3);	
		add_option('smart_h',300);	
		add_option('smart_d',1);	
		add_option('smart_u',2);		
	}	
	
	function create_admin_page(){
		add_options_page(__('Sliding Screen settings page','smart-lan'),__('Sliding Screen settings','smart-lan'),'manage_options','smart_slide','smart_options_page');
	}
	//常用option:add,update,delter,get;
	function smart_options_page(){
		?>
        <div class="wrap">
        <?php screen_icon() ?>
       <div> <h2><?php echo __('Sliding Screen plugin settings','smart-lan');?></h2></div>
        <?php update_smart_options();?>
        <form  method="post" >
        <link rel="stylesheet"  href="<?php echo plugins_url('../static/css/smart.css', __FILE__)?>" type="text/css" >
        <table class="tb">
        <tr class="hover"><td  width="100px"><?php echo __('Start time:','smart-lan');?></td><td> <input type="text" name="smart_btime" value="<?php echo get_option('smart_btime');?>" />(<?php echo __('Tip:how many seconds start the plugin after the page ready','smart-lan');?>)</td></tr>
           <tr class="hover"><td><?php echo __('Retraction time:','smart-lan');?></td><td>  <input type="text" name="smart_etime" value="<?php echo get_option('smart_etime');?>" />(<?php echo __('Tip:how many seconds end the plugin after the page ready','smart-lan');?>)</td></tr>
           <tr class="hover"><td><?php echo __('Drop height:','smart-lan');?></td><td>  <input type="text" name="smart_h" value="<?php echo get_option('smart_h');?>" />(<?php echo __('Tip:the max drop height','smart-lan');?>)</td></tr>
            <tr class="hover"><td><?php echo __('Drop rate:','smart-lan');?></td><td> <input type="text" name="smart_d" value="<?php echo get_option('smart_d');?>" />(<?php echo __('Tip:The larger number,the slower speed','smart-lan');?>)</td></tr>
           <tr class="hover"><td><?php echo __('Retraction speed:','smart-lan');?></td><td>  <input type="text" name="smart_u" value="<?php echo get_option('smart_u');?>" />(<?php echo __('Tip:The larger number,the slower speed','smart-lan');?>)</td></tr>
           <tr class="hover"><td><?php echo __('Picture link:','smart-lan');?></td><td>  <textarea name="smart_url" style="width:500px; height:80px;" ><?php echo get_option('smart_url')?get_option('smart_url'):plugins_url('../static/images/ad.gif', __FILE__);?></textarea>(<?php echo __('Tip:such as http://www.smartcome.com/template/newry_tqun/image/logo.png','smart-lan');?>)</td></tr>  
            <tr class="hover"><td colspan="2"><input type="submit" name="submit" value="ok" /></td></tr>
            </table>
        </form>
        </div>
    <?php	
	}
	
	function update_smart_options(){
		
		if($_POST['submit']){
			$updated = false;
			if($_POST['smart_url']&&$_POST['smart_btime']&&$_POST['smart_etime']&&$_POST['smart_h']&&$_POST['smart_d']&&$_POST['smart_u']){
				update_option('smart_url',$_POST['smart_url']);
				update_option('smart_btime',intval($_POST['smart_btime']));
				update_option('smart_etime',intval($_POST['smart_etime']));
				update_option('smart_h',intval($_POST['smart_h']));
				update_option('smart_d',intval($_POST['smart_d']));
				update_option('smart_u',intval($_POST['smart_u']));
				$updated = true;
			}
			if($updated){
				echo '<div><font color="#FF0000">'.__('update successfully!','smart-lan').'</font></div>';
			}else{
				echo '<div><font color="#FF0000">'.__('some thing wrong!','smart-lan').'</font></div>';
			}
		}//if		
	}//function

?>