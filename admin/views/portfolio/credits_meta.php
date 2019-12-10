<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<input type="hidden" value="1" name="tmm_meta_saving" />
<table class="form-table">
    <tbody>
        <tr>
            <th style="width:25%">
                <label for="portfolio_date">
                    <strong><?php esc_html_e('Release Date', 'accio'); ?></strong>
                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"></span>
                </label>
            </th>
            <td>
                <input type="text" style="width:75%; margin-right: 20px; float:left;" size="30" value="<?php echo esc_attr($portfolio_date) ?>" id="portfolio_date" name="portfolio_date">
            </td>
        </tr>
        <tr style="border-top:1px solid #eeeeee;">
            <th style="width:25%">
                <label for="portfolio_url">
                    <strong><?php esc_html_e('Project URL', 'accio'); ?></strong>
                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"><?php esc_html_e('For example', 'accio'); ?> http://demolink.org</span>
                </label>
            </th>
            <td>
                <input type="text" style="width:75%; margin-right: 20px; float:left;" size="30" value="<?php echo esc_url($portfolio_url) ?>" id="portfolio_url" name="portfolio_url">
            </td>
        </tr>
        <tr style="border-top:1px solid #eeeeee;">
            <th style="width:25%">
                <label for="portfolio_url_title">
                    <strong><?php esc_html_e('URL Title', 'accio'); ?></strong>
                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"></span>
                </label>
            </th>
            <td>
                <input type="text" style="width:75%; margin-right: 20px; float:left;" size="30" value="<?php echo esc_attr($portfolio_url_title) ?>" id="portfolio_url_title" name="portfolio_url_title">
            </td>
        </tr>
        <tr style="border-top:1px solid #eeeeee;">
            <th style="width:25%">
                <label for="portfolio_tools">
                    <strong><?php esc_html_e('Tools', 'accio'); ?></strong>
                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"><?php esc_html_e('Tools used to create this portfolio.', 'accio'); ?></span>
                </label>
            </th>
            <td>
                <input type="text" style="width:75%; margin-right: 20px; float:left;" size="30" value="<?php echo esc_attr($portfolio_tools) ?>" id="portfolio_tools" name="portfolio_tools">
            </td>
        </tr>

    </tbody>
</table>
<div id="tmm_image_buffer"></div>


