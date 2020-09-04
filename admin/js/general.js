var show_delay = 777;
var hide_delay = 333;

jQuery(document).ready(function() {


    jQuery('body').prepend('<div id="html_buffer"></div>');
    jQuery('body').prepend('<div class="info_popup"></div>');

    colorizator();

    draw_ui_slider_items();

    jQuery.each(jQuery('.colorpicker_input'), function(i, val) {
        var item = jQuery(this);
        //item.children('div').css('background-color', item.prev('input').val());
        jQuery(item).ColorPicker({
            color: item.val(),
            onShow: function(cpicker) {
                jQuery(cpicker).fadeIn(500);
                return false;
            },
            onHide: function(cpicker) {
                jQuery(cpicker).fadeOut(500);
                return false;
            },
            onChange: function(hsb, hex, rgb) {
                //item.children('div').css('background-color', '#' + hex);
                //item.prev('input').val('#' + hex);

                item.val('#' + hex);
            }
        });
    });

    //*****

    jQuery(document.body).on('click', '.button_upload', function(){
        var input_object =  jQuery(this).prev('input, textarea'),
            frame = wp.media({
            title: wp.media.view.l10n.chooseImage,
            multiple: false,
            library: { type: 'image, video' }
        });

        frame.on( 'select', function() {
            var selection = frame.state().get('selection');
            selection.each(function(attachment) {
                var url = attachment.attributes.url;
                input_object.val(url).trigger('change');
                if ('logo_img' == input_object[0].name) {
                    show_logo_preview_image(url, input_object);
                }
            });
        });
        frame.open();
        return false;
    });

    //option_checkbox
    jQuery(document.body).on('click', '.option_checkbox', function() {
        if (jQuery(this).is(":checked")) {
            jQuery(this).prev("input[type=hidden]").val(1);
            jQuery(this).next("input[type=hidden]").val(1);
            jQuery(this).val(1);
        } else {
            jQuery(this).prev("input[type=hidden]").val(0);
            jQuery(this).next("input[type=hidden]").val(0);
            jQuery(this).val(0);
        }
    });

    jQuery(".admin-choice-sidebar").on("click", "a", function(e) {
        var self = jQuery(this), hidden, data_val;
        hidden = jQuery("[name=sidebar_position]");
        data_val = self.attr('data-val');
        hidden.val(data_val);

        self.parent().siblings().removeClass("current-item");
        self.parent().addClass("current-item");

        e.preventDefault();
    });

    jQuery(".admin-page-choice-sidebar").on("click", "a", function(e) {
        var self = jQuery(this), hidden, data_val;
        hidden = jQuery("[name=page_sidebar_position]");
        data_val = self.attr('data-val');
        hidden.val(data_val);

        self.parent().siblings().removeClass("current-item").end().addClass("current-item");
        e.preventDefault();
    });

});

//******************

function getURLParameter(name) {
    return decodeURI((RegExp(name + '=' + '(.+?)(&|$)').exec(location.search) || [, null])[1]);
}

function draw_ui_slider_items() {

    var items = jQuery(".ui_slider_item");
    var template = jQuery("#ui_slider_item").html();

    jQuery.each(items, function(key, item) {
        var max_value = jQuery(item).attr('max-value');
        var min_value = jQuery(item).attr('min-value');
        var name = jQuery(item).attr('name');
        var value = jQuery(item).val();

        if (typeof value === 'undefined') {
            value = jQuery(item).data('default-value');
        }

        var html = template;
        //*****
        html = html.replace(/__UI_SLIDER_NAME__/gi, name);
        html = html.replace(/__UI_SLIDER_VALUE__/gi, value);
        jQuery(item).replaceWith(html);

        jQuery("#" + name + " .range-amount-value").val(value);
        jQuery("#" + name + " .range-amount-value-hidden").val(value);

        var slider = jQuery("." + name).slider({
            range: "max",
            animate: true,
            value: value,
            step: 1,
            min: parseInt(min_value, 10),
            max: parseInt(max_value, 10),
            slide: function(event, ui) {
                jQuery("#" + name + " .range-amount-value").val(ui.value);
                jQuery("#" + name + " .range-amount-value-hidden").val(ui.value);
            }
        });

        jQuery("#" + name).on('change', '.range-amount-value', function() {
            var value = jQuery(this).val();
            slider.slider("value", value);
            jQuery("#" + name + " .range-amount-value-hidden").val(value);
        });

    });
}



function show_info_popup(text) {
    jQuery(".info_popup").text(text);
    jQuery(".info_popup").fadeTo(400, 0.9);
    window.setTimeout(function() {
        jQuery(".info_popup").fadeOut(400);
    }, 1000);
}

function show_static_info_popup(text) {
    jQuery(".info_popup").text(text);
    jQuery(".info_popup").fadeTo(400, 0.9);
}

function hide_static_info_popup() {
    window.setTimeout(function() {
        jQuery(".info_popup").fadeOut(400);
    }, hide_delay);
}

function get_tb_editor_image_link(input_object, input_object2) {
    window.send_to_editor = function(html)
    {
        jQuery("#html_buffer").html(html);
        var imgurl = jQuery('#html_buffer').find('a').eq(0).attr('href');
        jQuery("#html_buffer").html("");
        jQuery(input_object).val(imgurl);
        jQuery(input_object).trigger('change');
        if (input_object2 != undefined) {
            jQuery(input_object2).val(imgurl);
        }
        tb_remove();
    };
    tb_show('', 'media-upload.php?post_id=0&type=image&TB_iframe=true');
}

function show_logo_preview_image(url, input) {
    jQuery('img#logo_preview_image').attr('src', url);
    jQuery('img#logo_preview_image').show();
    input.bind('change', function(){
        if ('' == jQuery(this).val()) {
            hide_logo_preview_image();
        }
    });
    return false;
}

function hide_logo_preview_image() {
    jQuery('img#logo_preview_image').attr('src', '');
    jQuery('img#logo_preview_image').hide();
    return false;
}

//for unique values
function get_time_miliseconds() {
    var d = new Date();
    return d.getTime();
}
//******************
function show_loader() {
    show_static_info_popup(lang_loading);
}

function hide_loader() {
    hide_static_info_popup();
}
//******************
function gmt_init_map(Lat, Lng, map_canvas_id, zoom, maptype, info, show_marker, show_popup, scrollwheel) {
    var latLng = new google.maps.LatLng(Lat, Lng);
    var homeLatLng = new google.maps.LatLng(Lat, Lng);

    switch (maptype) {
        case "SATELLITE":
            maptype = google.maps.MapTypeId.SATELLITE;
            break;

        case "HYBRID":
            maptype = google.maps.MapTypeId.HYBRID;
            break;

        case "TERRAIN":
            maptype = google.maps.MapTypeId.TERRAIN;
            break;

        default:
            maptype = google.maps.MapTypeId.ROADMAP;
            break;

    }

    var map;
    map = new google.maps.Map(document.getElementById(map_canvas_id), {
        zoom: zoom,
        center: latLng,
        mapTypeId: maptype,
        scrollwheel: scrollwheel
    });


    if (show_marker) {
        var marker = new MarkerWithLabel({
            position: homeLatLng,
            draggable: true,
            map: map
        });
    }

    google.maps.event.addListener(marker, "dragend", function() {
        jQuery("#event_map_latitude").val(marker.position.lat());
        jQuery("#event_map_longitude").val(marker.position.lng());
    });

    google.maps.event.addListener(map, "zoom_changed", function() {
        jQuery("#event_map_zoom").val(map.zoom);
    });

}


function colorizator() {
    var pickers = jQuery('.bgpicker');

    jQuery.each(pickers, function(key, picker) {

        var bg_hex_color = jQuery(picker).prev('.bg_hex_color');

        if (!jQuery(bg_hex_color).val()) {
            jQuery(bg_hex_color).val();
        }

        /* KEYBOARD COLORS */
        jQuery(bg_hex_color).blur(function(){
            var bx_col = jQuery(this).val();
                jQuery(picker).css('backgroundColor', bx_col);
        });

        /* END KEYBOARD COLORS */

        jQuery(picker).css('background-color', jQuery(bg_hex_color).val()).ColorPicker({
            color: jQuery(bg_hex_color).val(),
            onChange: function(hsb, hex, rgb) {
                jQuery(picker).css('backgroundColor', '#' + hex);
                jQuery(bg_hex_color).val('#' + hex);
                jQuery(bg_hex_color).trigger('change');
            }
        });

    });
}

//for dynamic html
function items_colorizator(in_container) {
    var pickers = jQuery(in_container).find('.bgpicker');
    jQuery.each(pickers, function(key, picker) {

        var bg_hex_color = jQuery(picker).prev('.bg_hex_color');

        if (!jQuery(bg_hex_color).val()) {
            jQuery(bg_hex_color).val();
        }

        jQuery(picker).css('background-color', jQuery(bg_hex_color).val()).ColorPicker({
            color: jQuery(bg_hex_color).val(),
            onChange: function(hsb, hex, rgb) {
                jQuery(picker).css('backgroundColor', '#' + hex);
                jQuery(bg_hex_color).val('#' + hex);
                jQuery(bg_hex_color).trigger('change');
            }
        });

    });
}

function insert_html_in_buffer(html) {
    jQuery("#html_buffer").html(html);
}