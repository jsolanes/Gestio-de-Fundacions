$(document).ready(function() {
        $(window).scroll(function(){
                if(document.body.scrollTop > 300)
                        $('#menufijo').fadeIn( "slow", function() { });
                else    
                        $('#menufijo').fadeOut( "slow", function() { });
        });

        $('a#srolltotop').click(function(){
                $('html, body').animate({scrollTop:0}, 100);
                return false;
        });
});