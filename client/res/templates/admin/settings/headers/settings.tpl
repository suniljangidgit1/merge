<script type="text/javascript">
	 var afterhash_admin = window.location.hash;
	 
	 if(afterhash_admin == '#Admin/settings' || afterhash_admin == '#Admin/userInterface'){
	 	$(".page-header").css("background","transparent");
        $(".page-header").css("padding","15px 0px");
	 }
</script>

<h3><a href="#Admin">{{translate 'Administration'}}</a> &raquo {{translate 'Settings' scope='Admin'}}</h3>
