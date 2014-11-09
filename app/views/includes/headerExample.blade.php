 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
    <div class="identity">
	@if(Auth::user())
		Hello {{Auth::user()->first_name}}
	@endif
    </div>
    <div class="logo_area">
    <img src="../img/logo2.png"/>
    </div>
    <nav class="clearfix">  
        <ul class="clearfix none_slide_func" >  
            <li><a href="/">Home</a></li>  
            <li><a href="/posts">Dog Posts</a></li>  
            <li><a href="/breeders">Dog Breeders</a></li>  
            <li><a href="/Forum">Forum</a></li>  
	    @if(Auth::user())
		    <li><a href="/logout">Logout</a></li>    
	    @else
		    <li><a href="/login">Login</a></li>
	    @endif
        </ul>  
	<ul id="clearfix" class="slide_func">
		<li>
			<a href='#'>
			<span class="icon medium hamburger_menu"></span>
			</a>
		</li>
		<li>
			Menu
		</li>
	</ul>
    </nav>  
	<div id="slide_menu">
		<ul class="clearfix slide"> 
		    <li> 
		    <a href="#">
			    <span class="icon medium hamburger_menu"></span>
		    </a>
		    </li>
		    <li><a href="/">Home</a></li>  
		    <li><a href="/posts">How-to</a></li>  
		    <li><a href="/dog_breeders">Dog Breeders</a></li>  
		    <li><a href="/f">Design</a></li>  
		    <li><a href="#">Web 2.0</a></li>  
		    <li><a href="#">Tools</a></li>    
		</ul>
	</div>
<script type="text/javascript">
    $(function() {  
        var menu        = $('nav ul');  
            menuHeight  = menu.height();  
	    nav		= $('#slide_menu');
	    slide_func = $('.slide_func a');
	    slide_menu_func = $('#slide_menu li:first-child a');

        $(slide_func).add(slide_menu_func).on('click', function(e) {  
            e.preventDefault();  
            nav.toggle('slide', {direction: 'left'}, 500);  
	});
    });  

    $(window).resize(function(){  

    });   
	
</script>
