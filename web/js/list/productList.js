(function ($) {
    $().ready(function () {
        $.each('#products-container', function () {
            var $this = $(this);
            $this.cubeportfolio({
                layoutMode: 'grid',
                rewindNav: true,
                scrollByPage: false,
                defaultFilter: '*',
                animationType: 'slideLeft',
                gapHorizontal: 20,
                gapVertical: 20,
                gridAdjustment: 'responsive',
                mediaQueries: [{
                        width: 800,
                        cols: 3
                    }, {
                        width: 500,
                        cols: 2
                    }, {
                        width: 320,
                        cols: 1
                    }],
                caption: 'zoom',
                displayType: 'lazyLoading',
                displayTypeSpeed: 100
            });
        });
    });
})(window.jQuery);
