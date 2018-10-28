jQuery(document).ready(function ($) {
    "use strict";

    var el = $('.getbowtied-s'),
        def_loader = ( typeof woocommerce_params != 'undefined' && typeof woocommerce_params.ajax_loader_url != 'undefined' ) ? woocommerce_params.ajax_loader_url : getbowtied_wcas_params.loading,
        loader_icon = el.data('loader-icon') == '' ? def_loader : el.data('loader-icon'),
        search_button = $('.getbowtied-searchsubmit'),
        min_chars = el.data('min-chars');

    search_button.on('click', function(){
        var form = $(this).closest('form');
        if( form.find('.getbowtied-s').val()==''){
            return false;
        }
        return true;
    });

    if( el.length == 0 ) el = $('.getbowtied-s');

    el.each(function () {
        var $t = $(this),
            append_to = ( typeof  $t.data('append-to') == 'undefined') ? $t.closest('.getbowtied-ajaxsearchform-container') : $t.data('append-to');

        $t.autocomplete({
            minChars        : min_chars,
            appendTo        : append_to,
            triggerSelectOnValidInput: false,
            deferRequestBy  : 100,
            serviceUrl      : getbowtied_wcas_params.ajax_url + '?action=getbowtied_ajax_search_products',
            onSearchStart   : function () {
                $t.css({'background-image': 'url(' + loader_icon + ')'});
            },
            onSelect        : function (suggestion) {
                if (suggestion.id != -1) {
                    window.location.href = suggestion.url;
                }
            }  ,
            onSearchComplete: function () {
                $t.css('background-image', 'none');
            }
        });
    });

    $(document).on('click', '.header-wrapper .tools .search-button', function(){
        $('.autocomplete-suggestions').css('display', 'none');
    });
});


