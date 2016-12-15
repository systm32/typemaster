<!DOCTYPE html>
<html>
<head>
	<title>Update Database</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<!--Import Google Icon Font-->
	<link href="css/material_fonts.css" rel="stylesheet">

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="css/materialize.css">

	<!-- Compiled and minified JavaScript -->
	<script src="js/materialize.js"></script>

	<!-- Compiled and minified JavaScript -->
	<script src="js/jquery.js"></script>

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<style> 
@font-face {
    font-family: PunjabiFont;
    src: url("fonts/ASEES.TTF");
}
</style>

</head>
<body>

<div>
	<div style="border: 1px solid grey;margin: 5px;padding: 20px">
		<p>Enter english paragragh:</p>
	    <textarea id = "eng_text" style="height: 200px;width:95%;border:3px solid black;resize: none;padding: 20px;font-size: 18px"></textarea>
	    <br><span>Level of the paragraph : </span><textarea  id="e_l" style="width: 50px;height: 20px;resize: none;" ></textarea>
	    <a id="add_english" class="waves-effect waves-light btn" style="float:right;margin-right:50px " href="#" ><b>&nbsp Add &nbsp</b></a>
	</div>

	<div style="border: 1px solid grey;margin: 5px;padding: 20px">
		<p>Enter punjabi paragragh:</p>
	    <textarea id="pun_text" style="height: 200px;width:95%;border:3px solid black;resize: none;padding: 20px;font-family: PunjabiFont;font-size: 18px"></textarea>
	    <br><span>Level of the paragraph : </span><textarea  id="p_l" style="width: 50px;height: 20px;resize: none;"></textarea>
	    <a id="add_punjabi" class="waves-effect waves-light btn" style="float:right;margin-right:50px " href="#" ><b>&nbsp Add &nbsp</b></a>
	</div>
</div>

<script  src="js/jquery.js" charset="utf-8"></script>
<script  charset="utf-8">
	$(document).ready(function(){
		$('#add_english').click(function(){
			var eng_text = $('#eng_text').val();
			var eng_level = $('#e_l').val();
			$.post( "update1.php", { 'tag': "1", 'val': eng_text , 'level':eng_level }).done(function( data ) {
			    console.log( "Data Loaded: " + data );
			});
		});
		$('#add_punjabi').click(function(){
			var pun_text = $('#pun_text').val();
			alert(pun_text);
			var pun_level = $('#p_l').val();
			$.post( "update1.php", { 'tag': "2", 'val': pun_text  , 'level':pun_level },"application/json; charset=utf-8").done(function( data ) {
			    console.log( "Data Loaded: " + data );
			});
		});
	});
</script>

</body>
</html>

