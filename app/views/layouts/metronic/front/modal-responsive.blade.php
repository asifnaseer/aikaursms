    @yield('form-starter')

    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            @yield('modal-header-content')
    </div>

    <div class="modal-body">
            <div class="scroller" style="height:500px" data-always-visible="1" data-rail-visible1="1">
                    @yield('modal-body-content')
            </div>
    </div>
    
    <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">Close</button>
            @yield('modal-footer-content')
    </div>

    @yield('form-stoper')
    
    <script>
        var handleScrollers = function () {
                $('.scroller').each(function () {

                    var height;

                    if ($(this).attr("data-height")) {
                        height = $(this).attr("data-height");
                    } else {
                        height = $(this).css('height');
                    }

                    $(this).slimScroll({
                            size: '7px',
                            color: '#a1b2bd',
                            position: 'right',
                            height:  height,
                            alwaysVisible: ($(this).attr("data-always-visible") == "1" ? true : false),
                            railVisible: ($(this).attr("data-rail-visible") == "1" ? true : false),
                            disableFadeOut: true
                   });
               });
        }
        handleScrollers();
    </script>