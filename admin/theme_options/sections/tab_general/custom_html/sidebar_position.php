<?php if (!defined('ABSPATH')) die('No direct access allowed');

$sbr_pos = TMM::get_option('sidebar_position');
$sbr_pos = (!$sbr_pos ? "sbr" : $sbr_pos) ?>

<input type="hidden" value="<?php echo esc_attr($sbr_pos) ?>" name="sidebar_position" />

<ul class="admin-choice-sidebar clearfix">
	<li data-val="sbl" class="lside <?php echo esc_attr( ($sbr_pos == "sbl" ? "current" : "") ) ?>"><a href="sbl"><?php esc_html_e('Left Sidebar', 'accio'); ?></a></li>
	<li data-val="no_sidebar" class="wside <?php echo esc_attr( ($sbr_pos == "no_sidebar" ? "current" : "") ) ?>"><a href="no_sidebar" ><?php esc_html_e('Without Sidebar', 'accio'); ?></a></li>
	<li data-val="sbr" class="rside <?php echo esc_attr( ($sbr_pos == "sbr" ? "current" : "") ) ?>"><a href="sbr"><?php esc_html_e('Right Sidebar', 'accio'); ?></a></li>
</ul>