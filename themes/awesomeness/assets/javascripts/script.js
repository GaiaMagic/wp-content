;(function($){
    // nav menu stuff

    var nav = $("ul#nav");

    var topItem = nav.children("li");
    
    topItem.hover(
        function(){
            $(this).children('ul.sub-menu').show();
        },

        function(){
            $(this).children('ul.sub-menu').hide();
        }
    );


    // tabs stuff
    var tabsWrapper = $('.tabs-wrapper');

    var tabs = tabsWrapper.find('.tabs');

    tabsWrapper.find('.tab-item:first').show();

    $('ul.tabs').tabs('> .tab-item', {
        current: 'box'
    });

    var $container = $('#posts');
    
    $container.imagesLoaded(function(){
        $container.masonry({
            gutterWidth: 15,
            columnWidth: 226,
            itemSelector: '.post'
      });
    });
    
    $container.infinitescroll({
        navSelector  : '.pagination',
        nextSelector : 'a.nextpostslink',
        itemSelector : '#posts .post',
        loading: {
            img: '/wp-content/themes/awesomeness/assets/images/loading.gif',
            msgText: '努力载入中，再要一小会...',
            selector: '#loading'
        }
    }, function( newElements ) {
        var $newElems = $( newElements ).css({ opacity: 0 });
        $newElems.imagesLoaded(function(){
            $newElems.animate({ opacity: 1 });
            $container.masonry( 'appended', $newElems, true ); 
        });
    });

    $('#links ul').masonry({
        gutterWidth: 25,
        itemSelector: 'li.item'
    });

    if (typeof weibo_id != 'undefined') {
        $.getJSON("https://api.weibo.com/2/users/show.json?callback=?", {
            source: "1620491747",
            screen_name: weibo_id,
        }, function(json) {
            console.info("JSON Data: ", json.data.id);
            $("#follow").append("<iframe width=100% height=24 frameborder=0 allowtransparency=true marginwidth=0 marginheight=0 scrolling=no border=0 src=http://widget.weibo.com/relationship/followbutton.php?language=zh_cn&width=100%&height=24&uid="+ json.data.id +"&style=3&btn=light&dpc=1></iframe>")
        });
    };
    
/*
    $container.infinitescroll({
        navSelector  : 'a.next',
        nextSelector : 'a.next',
        itemSelector : '#posts .post',
    }, function( newElements ) {
        var $newElems = $( newElements ).css({ opacity: 0 });
        $newElems.imagesLoaded(function(){
            $newElems.animate({ opacity: 1 });
            $container.masonry( 'appended', $newElems, true ); 
        });
    });

    $(window).unbind('.infscr');

    $('a.next').click(function(e) {
        e.preventDefault();
        $container.infinitescroll('retrieve');
        $(this).show();
    });
*/
    var asideOverlay = $('article.format-aside a.click[rel]').overlay({
        top: 40,
        fixed: false,
        mask: {
            color: '#000',
            opacity: 0.4
        },

        onBeforeLoad: function() {
            trigger = this.getTrigger();
            var wrap = this.getOverlay().find('.con');
            $('a#fullpageview').prop('href', trigger.attr('href'));
            wrap.load(this.getTrigger().attr("href") + ' #article', function() {
                trigger.siblings('.footer').clone().appendTo(wrap);
                // $('body').addClass('noscroll');
                /**
                wrap.find('#article').css('height', $(window).height() - 160);
                halfHeight = (parseInt($('#article').height(), 10)) * 0.4;
                $('#article .content img').each(function() {
                    width = $(this).attr('width');
                    height = $(this).attr('height');

                    if (height > halfHeight) {
                        $(this).removeAttr('height').css('height', halfHeight + 'px').removeAttr('width').css('width', (width * (halfHeight / height)) + 'px');
                    }
                });
            **/
            });
        },

        onBeforeClose: function() {
            $('body').removeClass('noscroll');
        }
    });

    $('article.format-aside a.click[rel]').on('click', function() { asideOverlay.load(); });

    $('input,textarea').placeholder();
})(jQuery)