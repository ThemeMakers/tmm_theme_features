<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<input type="hidden" value="1" name="tmm_meta_saving" />

<table class="form-table">
    <tbody>
		
		<tr>
            <th>
                <label for="mail">
                    <strong><?php esc_html_e('E-Mail', 'accio'); ?></strong>
                    <span style="display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"></span>
                </label>
            </th>
            <td>
                <input type="email" class="widefat"  value="<?php echo esc_attr($mail) ?>" id="mail" name="mail">
            </td>
        </tr>

		<tr>
            <th>
                <label for="phone">
                    <strong><?php esc_html_e('Phone', 'accio'); ?></strong>
                    <span style="display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"></span>
                </label>
            </th>
            <td>
                <input type="tel" class="widefat"  value="<?php echo esc_attr($phone) ?>" id="phone" name="phone">
            </td>
        </tr>

		<tr>
            <th>
                <label for="twitter">
                    <strong><?php esc_html_e('Twitter', 'accio'); ?></strong>
                    <span style="display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"></span>
                </label>
            </th>
            <td>
                <input type="text" class="widefat"  value="<?php echo esc_attr($twitter) ?>" id="twitter" name="twitter">
            </td>
        </tr>


        <tr>
            <th>
                <label for="facebook">
                    <strong><?php esc_html_e('Facebook', 'accio'); ?></strong>
                    <span style="display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"></span>
                </label>
            </th>
            <td>
                <input type="text" class="widefat" value="<?php echo esc_attr($facebook) ?>" id="facebook" name="facebook">
            </td>
        </tr>

		<tr>
            <th>
                <label for="linkedin">
                    <strong><?php esc_html_e('LinkedIn', 'accio'); ?></strong>
                    <span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"></span>
                </label>
            </th>
            <td>
                <input type="text" class="widefat" value="<?php echo esc_attr($linkedin) ?>" id="linkedin" name="linkedin">
            </td>
        </tr>

		<tr>
            <th>
                <label for="dribbble">
                    <strong><?php esc_html_e('Dribbble', 'accio'); ?></strong>
                    <span style="display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"></span>
                </label>
            </th>
            <td>
                <input type="text" class="widefat" value="<?php echo esc_attr($dribbble) ?>" id="dribbble" name="dribbble">
            </td>
        </tr>

		<tr>
            <th>
                <label for="instagram">
                    <strong><?php esc_html_e('Instagram', 'accio'); ?></strong>
                    <span style="display:block; color:#999; margin:5px 0 0 0; line-height: 18px;"></span>
                </label>
            </th>
            <td>
                <input type="text" class="widefat" value="<?php echo esc_attr($instagram) ?>" id="instagram" name="instagram">
            </td>
        </tr>


    </tbody>
</table>
