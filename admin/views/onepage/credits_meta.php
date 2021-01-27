<?php if ( ! defined( 'ABSPATH' ) ) { die( 'No direct access allowed' ); } ?>

<script>
    (function ($) {
        $(function () {

            var $bg_type = $('#bg_type'),
                $yt_options = $('.form-table .yt'),
                $vm_options = $('.form-table .vm'),
                $sfh_options = $('.form-table .sfh'),
                $sfh_btn_options = $('.form-table .button.sfh'),
                $value = $bg_type.val();

            function hiddenVisible(val) {
                if (val === 'youtube') {
                    $vm_options.fadeOut();
                    $sfh_options.fadeOut();
                    $sfh_btn_options.fadeOut();
                    $yt_options.fadeIn();
                } else if (val === 'vimeo') {
                    $yt_options.fadeOut();
                    $sfh_options.fadeOut();
                    $sfh_btn_options.fadeOut();
                    $vm_options.fadeIn();
                } else if (val === 'selfhosted') {
                    $yt_options.fadeOut();
                    $vm_options.fadeOut();
                    $sfh_btn_options.fadeIn();
                    $sfh_options.fadeIn();
                }
            }

            hiddenVisible($value);

            if ($bg_type) {
                $bg_type.on('change', function () {
                    var val = $(this).val();
                    hiddenVisible(val);
                });
            }
        });
    })(jQuery);
</script>

<table class="form-table">
    <tbody>

    <tr>
        <th style="width: 25%">
            <label for="bg_video">
                <strong><?php esc_html_e( 'Background Video', 'accio' ); ?></strong>
            </label>
        </th>

        <td>
            <select id="bg_type" name="bg_type" style="width:100%">
                <option <?php if ( $bg_type == 'youtube' ): ?>selected=""<?php endif; ?> value="youtube">Youtube</option>
                <option <?php if ( $bg_type == 'vimeo' ): ?>selected=""<?php endif; ?> value="vimeo">Vimeo</option>
                <option <?php if ( $bg_type == 'selfhosted' ): ?>selected=""<?php endif; ?> value="selfhosted">Self Hosted</option>
            </select>
        </td>

        <td colspan="5">
            <input id="bg_video" type="text" style="width: 65%; margin-right: 20px; float: left;" size="30" value="<?php echo esc_attr( $bg_video ) ?>" name="bg_video">
            <a href="#" class="button button_upload sfh"><?php esc_html_e( 'Browse', 'accio' ); ?></a>
        </td>
    </tr>

    <tr class="options">
        <th style="width: 25%">
            <label>
                <strong><?php esc_html_e( 'Video Options', 'accio' ); ?></strong>
            </label>
        </th>

        <td class="yt">
            <label for="video_quality">Video Quality</label>
            <select style="width:100%" id="video_quality" name="video_quality">
                <option <?php if ( $video_quality == 'default' ): ?> selected="" <?php endif; ?> value="default">Default</option>
                <option <?php if ( $video_quality == 'small' ): ?> selected="" <?php endif; ?> value="small">Small</option>
                <option <?php if ( $video_quality == 'medium' ): ?> selected="" <?php endif; ?> value="medium">Medium</option>
                <option <?php if ( $video_quality == 'large' ): ?> selected="" <?php endif; ?> value="large">Large</option>
                <option <?php if ( $video_quality == 'hd720' ): ?> selected="" <?php endif; ?> value="hd720">HD720</option>
                <option <?php if ( $video_quality == 'hd1080' ): ?> selected="" <?php endif; ?> value="hd1080">HD1080</option>
                <option <?php if ( $video_quality == 'highres' ): ?> selected="" <?php endif; ?> value="highres">Highres</option>
            </select>
        </td>

        <td class="yt vm sfh">
            <label for="video_autoplay">AutoPlay</label>
            <select id="video_autoplay" name="video_autoplay">
                <option <?php if ( $video_autoplay == 'yes' ) { ?> selected="" <?php } ?> value="yes">Yes</option>
                <option <?php if ( $video_autoplay == 'no' ) { ?> selected="" <?php } ?> value="no">No</option>
            </select>
        </td>

        <td class="yt sfh">
            <label for="video_mute">Mute The Audio</label>
            <select id="video_mute" name="video_mute">
                <option <?php if ( $video_mute == 'yes' ) { ?> selected="" <?php } ?> value="yes">Yes</option>
                <option <?php if ( $video_mute == 'no' ) { ?> selected="" <?php } ?> value="no">No</option>
            </select>
        </td>

        <td class="yt vm sfh">
            <label for="video_loop">Loop</label>
            <select id="video_loop" name="video_loop">
                <option <?php if ( $video_loop == 'yes' ) { ?> selected="" <?php } ?> value="yes">Yes</option>
                <option <?php if ( $video_loop == 'no' ) { ?> selected="" <?php } ?> value="no">No</option>
            </select>
        </td>

        <td class="yt">
            <label for="video_vol">Volume Level (1 to 100)</label>
            <input type="text" name="video_vol" value="<?php echo ( ! empty( $video_vol ) ) ? $video_vol : '1' ?>">
        </td>

        <td class="yt">
            <label for="video_opacity">Opacity (0 to 1)</label>
            <input type="text" name="video_opacity" value="<?php echo ( ! empty( $video_opacity ) ) ? $video_opacity : '1' ?>">
        </td>

    </tr>

    <tr>
        <th style="width: 25%">
            <label for="page_menu">
                <strong><?php esc_html_e( 'Page Menu', 'accio' ); ?></strong>
                <span style=" display: block; color: #999; margin: 5px 0 0 0; line-height: 18px;"></span>
            </label>
        </th>
        <td>
            <?php $menus = wp_get_nav_menus(); ?>
            <?php if ( ! empty( $menus ) ): ?>
                <select style="width:100%" name="page_menu">
                    <?php foreach ( $menus as $menu ) : ?>
                        <option <?php if ( $page_menu == $menu->term_id ): ?>selected=""<?php endif; ?> value="<?php echo esc_attr( $menu->term_id ) ?>"><?php echo esc_html( $menu->name ) ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
        </td>
    </tr>

    </tbody>
</table>