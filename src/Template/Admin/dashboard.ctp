<div class="page-header">
	<h1>Dashboard </h1>
</div><!-- /.page-header -->
<h1>123456</h1>
<h2>123456</h2>
<h3>123456</h3>
<h4>123456</h4>
<script type="text/javascript">
	
	$(document).ready(function() {
	 $.ajaxSetup({ cache: true });
	  $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
	    FB.init({
	      appId: '{1055067887938298}',
	      version: 'v2.7' // or v2.1, v2.2, v2.3, ...
	    });     
	    $('#loginbutton,#feedbutton').removeAttr('disabled');
	    // FB.getLoginStatus(updateStatusCallback);
	    FB.getLoginStatus(function(){
		   alert('Status updated!!')
		});
	  });
	});
</script>