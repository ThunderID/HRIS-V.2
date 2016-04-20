{!! Html::style('plugins/custom-scroller/jquery.mCustomScrollbar.css') !!}
{!! Html::script('plugins/custom-scroller/jquery.mCustomScrollbar.concat.min.js') !!}

<script>
    (function($){
        $(window).load(function(){
			$(".workspace").mCustomScrollbar({
			    theme:"dark",
			});
        });
    })(jQuery);
</script>