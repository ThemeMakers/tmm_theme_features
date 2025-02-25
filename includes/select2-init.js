jQuery(document).ready(function ($) {
  $("#parent").select2({
    width: "95%",
    ajax: {
      url: ajaxurl, // WordPress admin AJAX URL
      dataType: "json",
      delay: 250,
      data: function (params) {
        return {
          action: "fetch_taxonomy_terms",
          term: params.term,
          taxonomy: "carproducer",
        };
      },
      processResults: function (data) {
        return {
          results: data,
        };
      },
    },
    minimumInputLength: 2, // Start searching after 2 characters
    placeholder: "Select a parent term",
    allowClear: true,
  });
});
