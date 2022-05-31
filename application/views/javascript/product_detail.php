
    <script type="text/javascript">
      
        $(document).ready(function(){
            $("#imgXzoomTitle").hide();
          /* 1. Visualizing things on Hover - See next part for action on click */
          $('#stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
           
            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e){
              if (e < onStar) {
                $(this).addClass('hover');
              }
              else {
                $(this).removeClass('hover');
              }
            });
            
          }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
              $(this).removeClass('hover');
            });
          });
          
          
          /* 2. Action to perform on click */
          $('#stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');
            
            for (i = 0; i < stars.length; i++) {
              $(stars[i]).removeClass('selected');
            }
            
            for (i = 0; i < onStar; i++) {
              $(stars[i]).addClass('selected');
            }
            
            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = "";
            if (ratingValue > 1) {
                msg = "Thanks! You rated this " + ratingValue + " stars.";
                
                var rating      = ratingValue;
                var name_slug   = "<?php echo $product->url_slug; ?>";

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('product/rating');?>",
                    data: {
                        name_slug: name_slug,
                        rating: rating
                    },
                    success: function(data){
                        // location.reload(true);
                        // msg = "Thanks! You rated this " + ratingValue + " stars.";
                    }
                });

            }
            else {
                msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
            }
            responseMessage(msg);
            
          });
          
          $(".xzoom-gallery").click(function(e){
             $("#imgXzoomTitle").html('');
             var title = $(this).attr("xtitle");
             
            
             if (typeof title !== typeof undefined && title !== false) {
              
                $("#imgXzoomTitle").show();
                $("#imgXzoomTitle").html(title);
             }else{
                $("#imgXzoomTitle").hide();
              
             }
             
          })
          
        });


        function responseMessage(msg) {
          $('.success-box').fadeIn(200);  
          $('.success-box div.text-message').html("<span>" + msg + "</span>");
        }
        
    </script>    

    <script>
        (function ($) {
            $(document).ready(function() {
                $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 500, title: true, tint: '#333', Xoffset: 15});
                $('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
                $('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
                $('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});
                $('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});

                //Integration with hammer.js
                var isTouchSupported = 'ontouchstart' in window;

                if (isTouchSupported) {
                    //If touch device
                    $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
                        var xzoom = $(this).data('xzoom');
                        xzoom.eventunbind();
                    });
                    
                    $('.xzoom, .xzoom2, .xzoom3').each(function() {
                        var xzoom = $(this).data('xzoom');
                        $(this).hammer().on("tap", function(event) {
                            event.pageX = event.gesture.center.pageX;
                            event.pageY = event.gesture.center.pageY;
                            var s = 1, ls;
            
                            xzoom.eventmove = function(element) {
                                element.hammer().on('drag', function(event) {
                                    event.pageX = event.gesture.center.pageX;
                                    event.pageY = event.gesture.center.pageY;
                                    xzoom.movezoom(event);
                                    event.gesture.preventDefault();
                                });
                            }
            
                            xzoom.eventleave = function(element) {
                                element.hammer().on('tap', function(event) {
                                    xzoom.closezoom();
                                });
                            }
                            xzoom.openzoom(event);
                        });
                    });

                // $('rating').click(function(){
  
                //     $('#rating_modal').modal({show:true});
                    
                // });

                $('.xzoom4').each(function() {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1, ls;

                        xzoom.eventmove = function(element) {
                            element.hammer().on('drag', function(event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        var counter = 0;
                        xzoom.eventclick = function(element) {
                            element.hammer().on('tap', function() {
                                counter++;
                                if (counter == 1) setTimeout(openfancy,300);
                                event.gesture.preventDefault();
                            });
                        }

                        function openfancy() {
                            if (counter == 2) {
                                xzoom.closezoom();
                                $.fancybox.open(xzoom.gallery().cgallery);
                            } else {
                                xzoom.closezoom();
                            }
                            counter = 0;
                        }
                    xzoom.openzoom(event);
                    });
                });
                
                $('.xzoom5').each(function() {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1, ls;

                        xzoom.eventmove = function(element) {
                            element.hammer().on('drag', function(event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        var counter = 0;
                        xzoom.eventclick = function(element) {
                            element.hammer().on('tap', function() {
                                counter++;
                                if (counter == 1) setTimeout(openmagnific,300);
                                event.gesture.preventDefault();
                            });
                        }

                        function openmagnific() {
                            if (counter == 2) {
                                xzoom.closezoom();
                                var gallery = xzoom.gallery().cgallery;
                                var i, images = new Array();
                                for (i in gallery) {
                                    images[i] = {src: gallery[i]};
                                }
                                $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                            } else {
                                xzoom.closezoom();
                            }
                            counter = 0;
                        }
                        xzoom.openzoom(event);
                    });
                });

                } else {
                    //If not touch device

                    //Integration with fancybox plugin
                    $('#xzoom-fancy').bind('click', function(event) {
                        var xzoom = $(this).data('xzoom');
                        xzoom.closezoom();
                        $.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
                        event.preventDefault();
                    });
                
                    //Integration with magnific popup plugin
                    $('#xzoom-magnific').bind('click', function(event) {
                        var xzoom = $(this).data('xzoom');
                        xzoom.closezoom();
                        var gallery = xzoom.gallery().cgallery;
                        var i, images = new Array();
                        for (i in gallery) {
                            images[i] = {src: gallery[i]};
                        }
                        $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                        event.preventDefault();
                    });
                }
            });
        })(jQuery);
    </script>
