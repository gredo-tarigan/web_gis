

//----------------------------------------
// side bar toggling
//----------------------------------------
var jContext = $('#my-sidebar-context');
var jSidebar = $('.widget-sidebar', jContext); // the sidebar








;(function ( $, window, document, undefined ) {

    var pluginName = 'simpleSidebar';
    function Plugin ( element, options ) {
        this.element = element;
        this._name = pluginName;
        this._defaults = $.fn.simpleSidebar.defaults;
        this.options = $.extend( {}, this._defaults, options );
        this.init();
    }


    $.extend(Plugin.prototype, {


        init: function () {
            var jContext = $(this.element);


            $('.widget-sidebar-toggler', jContext).on('click', function () {
                if (jContext.hasClass("sidebar-show")) {
                    jContext.removeClass('sidebar-show');
                    jContext.addClass('sidebar-hide');
                } else if (jContext.hasClass("sidebar-hide")) {
                    jContext.removeClass('sidebar-hide');
                    jContext.addClass('sidebar-show');
                } else {
                    // default behaviour, if small screen, we show the sidebar, if large screen, we hide the sidebar

                    var isSmallScreen = true;

                    var marginLeft = parseInt(jSidebar.css('margin-left'));
                    if (0 === marginLeft) {
                        isSmallScreen = false;
                    }

                    if (true === isSmallScreen) {
                        jContext.addClass('sidebar-show');
                    } else {
                        jContext.addClass('sidebar-hide');
                    }
                }
                return false;
            });
        },

    });

    $.fn.simpleSidebar = function ( options ) {
        this.each(function() {
            if ( !$.data( this, "plugin_" + pluginName ) ) {
                $.data( this, "plugin_" + pluginName, new Plugin( this, options ) );
            }
        });
        return this;
    };

    $.fn.simpleSidebar.defaults = {
        // property: 'value',
        // onComplete: null
    };

})( jQuery, window, document );