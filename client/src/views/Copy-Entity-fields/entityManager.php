<?php 
	
	
?>

<html>
	<head>
        <title>Entity Manager</title>
        <script type="text/javascript" src="../../../../client/finnova.min.js" data-base-path=""></script>
        <link href="../../../../client/css/finnova/hazyblue-vertical.css?r=1539943868" rel="stylesheet" id="main-stylesheet">
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="FinnovaCRM is Open Source CRM application. Increase profitability through customer loyalty!">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="shortcut icon" sizes="196x196" href="../../../../client/img/paint.png">
        <link rel="icon" href="../../../../client/img/paint.png" type="image/paint.png">
        <link rel="shortcut icon" href="../../../../client/img/paint.png" type="image/paint.png">
		<script type="text/javascript" src="../../../src/views/admin/entity-manager/fields/icon-class.js"></script>
		<script src="jscolor.js"></script>
		
        <script>
			function getValue(){
				
				var value=document.getElementById('name').value;
				//alert(value);
				if(value!=''){
					document.getElementById('labelSingular').value=value;
					document.getElementById('labelPlural').value=value+'s';
				}	
				
			}
		    function closeWin() {
		        
		       window.close();
	        }
		</script>
		
		
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Simple FontAwesome IconPicker Demo</title>
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link href="iconpicker/simple-iconpicker.min.css" rel='stylesheet' type='text/css' />
        <script type='text/javascript' src="iconpicker/simple-iconpicker.min.js"></script>
        <script>
            var whichInput = 0;
            $(document).ready(function(){
              $('.input1').iconpicker(".input1");
              $('#inputid2').iconpicker("#inputid2");
              $('.input3').iconpicker(".input3");
            });
        </script>
	</head>
    <body style="width:100%;">
	    <div id="popup-notifications-container" class="hidden"></div>
		<form action="createEntity.php" method="post">
		<div style="position:absolute; width:80%; left:80px; padding:80px;">
		<div class="btn-group main-btn-group">
			<button type="submit" class="btn btn-danger" data-name="save">Save</button> 
			<button type="button" onclick="closeWin()" class="btn btn-default" data-name="cancel">Cancel</button> 
		</div>
		<div class="row">
			<div class="cell form-group col-md-6" data-name="name">
				<label class="control-label" data-name="name">Name</label><div class="field" data-name="name"><input type="text" id="name" required onblur="getValue();" class="main-element form-control" name="name" value="" autocomplete="off"></div>
			</div>
		<!--	<div class="cell form-group col-md-6" data-name="type">
				<label class="control-label" data-name="type">Type<a href="javascript:" class="text-muted" data-original-title="" title=""><span class="glyphicon glyphicon-info-sign"></span></a></label>
				<div class="field" data-name="type">
					<select name="type" class="form-control main-element"> 
						<option value="Base">Base</option>
						<option value="BasePlus">Base Plus</option>
						<option value="Event">Event</option>
						<option value="Person">Person</option>
						<option value="Company">Company</option>
					</select>
				</div>
			</div> -->
		</div>
		<div class="row">
			<div class="cell form-group col-md-6" data-name="labelSingular">
				<label class="control-label" data-name="labelSingular">Label Singular</label>
				<div class="field" data-name="labelSingular">
					<input type="text" id="labelSingular" required class="main-element form-control" name="labelSingular" value="" autocomplete="off">
				</div>
			</div>
			<div class="cell form-group col-md-6" data-name="labelPlural">
				<label class="control-label" data-name="labelPlural">Label Plural</label>
				<div class="field" data-name="labelPlural">
					<input type="text" id="labelPlural" required class="main-element form-control" name="labelPlural" value="" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="cell form-group col-md-6" data-name="disabled" style="visibility: hidden;">
				<label class="control-label" data-name="disabled">Disabled <a href="javascript:" class="text-muted" data-original-title="" title=""><span class="glyphicon glyphicon-info-sign"></span></a></label>
				<div class="field" data-name="disabled">
					<input type="checkbox" name="disabled" class="main-element">
				</div>
			</div>
			<div class="cell form-group col-md-6" data-name="stream">
				<label class="control-label" data-name="stream">Stream <a href="javascript:" class="text-muted" data-original-title="" title=""><span class="glyphicon glyphicon-info-sign"></span></a></label>
				<div class="field" data-name="stream">
					<input type="checkbox" name="stream" class="main-element">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="cell form-group col-md-6" data-name="iconClass">
				<label class="control-label" data-name="iconClass">Icon</label>
				<div class="field" data-name="iconClass">
					<div>
						<!--<button class="btn btn-default pull-right" data-action="selectIcon" onclick="selectIcon" title="Select">
							<span class="glyphicon glyphicon-arrow-up"></span>
						</button> -->
						
					<input type="text" name="icon" class="input1 input"/>
						
						 
						
					</div>
				</div>
			</div>
			<div class="cell form-group col-md-6" data-name="color">
				<label class="control-label" data-name="color">Color</label>
				<div class="field" data-name="color">
					<div class="input-group colorpicker-component colorpicker-element">
						<!--<input id="color" class="main-element jccolor form-control" name="color"   autocomplete="off"> -->
						<input class="jscolor main-element form-control" name="color" value="#fff">
						<span class="jscolor input-group-addon"><i></i></span>
						
					</div>
					<div class="colorpicker dropdown-menu colorpicker-right colorpicker-visible" style="top: 354px; left: 1204.5px;"><div class="colorpicker-saturation" style="background-color: rgb(0, 227, 255);"><i style="top: 32.9412px; left: 57.8947px;"><b></b></i></div><div class="colorpicker-hue"><i style="left: 0px; top: 48.1481px;"></i></div><div class="colorpicker-alpha" style="background-color: rgb(72, 160, 171);"><i style="top: 0px;"></i></div><div class="colorpicker-color" style="background-color: rgb(72, 160, 171);"><div style="background-color: rgb(72, 160, 171);"></div></div><div class="colorpicker-selectors"></div></div>
				</div>
			</div>
		</div>
		<div class="colorpicker dropdown-menu colorpicker-hidden colorpicker-right">
			<div class="colorpicker-saturation"><i><b></b></i></div>
			<div class="colorpicker-hue"><i></i></div>
			<div class="colorpicker-alpha"><i></i></div>
			<div class="colorpicker-color"><div></div></div>
			<div class="colorpicker-selectors"></div>
		</div>
		</div>
		</form>
		<script>
    	    function setTextColor(picker) {
    		    document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
    	    }
    	</script>
    	<style>
            header {
            margin: 20px;
            }
            header h2 {
            font-weight: 300;
            font-size: 20px;
            line-height: 28px;
            }
            header h2 a{
              text-decoration: none;
              border-bottom: 1px solid #333;
              color:#333;
              text-transform: uppercase;
            }
            .page{
              border:1px solid #bbb;
              margin:20px;
              padding:20px;
            }
            h3{
              background:#ccc;
              border: 1px solid #bbb;
              color:#333;
              font-size:30px;
              padding:10px;
              margin:-20px;
              margin-bottom: 20px;
            }
            .input{
              border:1px solid #ccc;
              background:#efefef;
              padding:10px;
              font-size: 14px;
              border-radius:3px;
              outline: none;
            }
            .input:focus{
              border-color:#4598ff;
            }
            h4{
              font-weight: normal;
              margin-bottom: 10px;
            }
            .incode{
              background:#efefef;
              padding:3px;
              color:#920000;
              font-family: monospace;
            }
            code{
              background:#efefef;
              border: 1px solid #ccc;
              padding: 10px;
              display:block;
              line-height: 18px;
            }
        	
        	input[type="color"] {
        	    -webkit-appearance: none;
        	    border: none;
        	    width: 32px;
        	    height: 32px;
            }
            input[type="color"]::-webkit-color-swatch-wrapper {
            	padding: 0;
            }
            input[type="color"]::-webkit-color-swatch {
            	border: none;
            }
        </style>
		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	</body>
</html>