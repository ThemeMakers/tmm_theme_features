var TMM_PORTFOLIO_ADMIN = function() {
    "use strict";
    var self = {
        html_buffer: "",
        init: function() {
            jQuery('body').append('<div id="inpost_gallery_html_buffer" style="display: none;"></div>');
            jQuery('body').append('<div id="inpost_gallery_info_popup" style="display: none;"></div>');
            self.html_buffer = jQuery("#inpost_gallery_html_buffer");
            jQuery("#gallery_item_list").sortable();
            //*****
            jQuery('.js_inpost_gallery_add_slide').life('click', function(event)
            {
                var frame = wp.media({
                        title: wp.media.view.l10n.chooseImage,
                        multiple: true,
                        library: { type: 'image' }
                    });

                frame.on( 'select', function() {
                    var selection = frame.state().get('selection');
                    var img_urls = [];
                    selection.each(function(attachment) {
                        var url = attachment.attributes.url;
                        img_urls.push(url);
                    });
                    self.add_meta_slide_items(img_urls, 0);
                    //self.insert_html_in_buffer("");
                });
                frame.open();
                return false;
            });

            jQuery('.js_inpost_gallery_add_video').life('click', function(event)
            {
                var video_url = prompt("Enter youtube or vimeo link");
                if (video_url && video_url.length > 0) {
                    var video = [video_url];
                    self.add_meta_slide_items(video, 0);
                }

                return false;
            });

            jQuery(".delete_gallery_item").life('click', function() {
                var self_button = this;
                jQuery(self_button).parents('li').eq(0).hide(333, function() {
                    jQuery(self_button).parents('li').eq(0).remove();
                });

                return false;
            });

        },
        add_meta_slide_items: function(img_urls, index) {
            show_info_popup(lang_loading + ' ...');
            var data = {
                action: "add_gallery_folio_item",
                imgurl: img_urls[index]
            };
            jQuery.post(ajaxurl, data, function(response) {
                jQuery("#gallery_item_list").append(response);
                if (index < (img_urls.length - 1)) {
                    self.add_meta_slide_items(img_urls, index + 1);
                }
            });
        },
        insert_html_in_buffer: function(html) {
            jQuery(self.html_buffer).html(html);
        }
    };

    return self;
};

var tmm_admin_portfolio = new TMM_PORTFOLIO_ADMIN();
jQuery(document).ready(function() {
    tmm_admin_portfolio.init();
});