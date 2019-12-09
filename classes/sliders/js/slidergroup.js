var TMM_ADMIN_SLIDES = function() {

	var self = {
		html_buffer: null,
		init: function() {
			try {
				jQuery("#tmm_slide_group").sortable();
			} catch (e) {

			}

			self.html_buffer = jQuery("#html_buffer");

			jQuery(document).on('click', '.js_add_slide', function() {
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


			jQuery(document).on('click', '.js_edit_slide', function() {
                var slide_id = jQuery(this).data('slide-id');
                var frame = wp.media({
                    title: wp.media.view.l10n.chooseImage,
                    multiple: false,
                    library: { type: 'image' }
                });

                frame.on( 'select', function() {
                    var selection = frame.state().get('selection');
                    selection.each(function(attachment) {
                        var url = attachment.attributes.url;
                        show_static_info_popup('Loading ...');
                        var data = {
                            action: "get_resized_image_url",
                            imgurl: url,
                            alias: '100*100'
                        };
                        jQuery.post(ajaxurl, data, function(response) {
                            var time = get_time_miliseconds();
                            jQuery("#slide_item_" + slide_id + " .slide-thumb img").attr('src', response + "?t=" + time);
                            jQuery("#slide_item_" + slide_id + " .slide-thumb input[type=hidden]").val(url);
                            hide_static_info_popup();
                        });
                    });

                    self.insert_html_in_buffer("");
                });
                frame.open();
                return false;
			});

			jQuery(document).on('click', '.js_delete_slide', function() {
				var self_button = this;
				jQuery(self_button).parents('div.slide-item').eq(0).hide(333, function() {
					jQuery(self_button).parents('div.slide-item').eq(0).remove();
				});
				return false;
			});

			jQuery(document).on('change', '[name=selected_slider]', function() {
				var value = jQuery(this).val();
				if (value == "0") {
					jQuery("[name=slider_group]").hide();
				} else {
					jQuery("[name=slider_group]").show();
				}

				return false;
			});

			jQuery(document).on('click', '.attr_title', function (e) {
				e.preventDefault();
				
				var $this = jQuery(this);
				
				if ($this.hasClass('active') && $this.next().is(':visible')) {
					$this.removeClass('active');
					$this.next().stop(true, true).slideUp('300');
				} else if ($this.next().is(':hidden')) {
					$this.addClass('active');
					$this.next().stop(true, true).slideDown('300');		
				}

				console.log('ddd');

			});
			
			return false;
		},
		add_meta_slide_items: function(img_urls, index) {
			show_info_popup(lang_loading + ' ...');
			var data = {
				action: "add_meta_slide_item",
				imgurl: img_urls[index]
			};
			jQuery.post(ajaxurl, data, function(response) {
				jQuery("#tmm_slide_group").append(response);
				if (index < (img_urls.length - 1)) {
					self.add_meta_slide_items(img_urls, index + 1);
				}

				if (index == img_urls.length - 1) {//for one calling on the end
					colorizator();
				}

			});
		},
		insert_html_in_buffer: function(html) {
			jQuery(self.html_buffer).html(html);
		},
		get_html_from_buffer: function() {
			return jQuery(self.html_buffer).html();
		}
	};

	return self;
};


var tmm_admin_slides = new TMM_ADMIN_SLIDES();
jQuery(document).ready(function() {
	tmm_admin_slides.init();
});