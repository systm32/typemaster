<html>
<head>
<title>Punjabi Typing</title>

<!--Import Google Icon Font-->
<link href="../css/material_fonts.css" rel="stylesheet">

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="../css/materialize.css">

<!-- Compiled and minified JavaScript -->
<script src="../js/materialize.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="../js/jquery.js"></script>

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>


<style> 
@font-face {
    font-family: PunjabiFont;
    src: url("../fonts/ASEES.TTF");
}


.noselect {
   cursor: default;
   -webkit-user-select: none;
   -webkit-touch-callout: none;
   -khtml-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   -o-user-select: none;
}

.noselect:focus {
   outline: none;
}
</style>

</head>

<body>
	<ul id="dropdown1" class="dropdown-content">
	  <li><a href="#!">one</a></li>
	  <li><a href="#!">two</a></li>
	  <li class="divider"></li>
	  <li><a href="#!">three</a></li>
	</ul>

    <nav>
      <div class="nav-wrapper">
        <span style="padding-left:20px"><a href="#" class="brand-logo">ਪੰਜਾਬੀ ਟਾਈਪਿੰਗ</a></span>
	    <ul class="right hide-on-med-and-down">
      		<li><a id="p-l1" href="#">ਪੱਧਰ 1</a></li>
      		<li><a id="p-l2" href="#">ਪੱਧਰ 2</a></li>
      		<li><a id="p-l3" href="#">ਪੱਧਰ 3</a></li>
    	</ul>
      </div>
      
    </nav>

    <div>
    	<div style="padding: 20px">
    		<div style="width: 50%;float: left;">
    			<a id="rep" class="waves-effect waves-light btn" style="margin: [20px,0,20px,0]" href="#" ><b>ਦੁਹਰਾਉ</b></a>
    			<a id="strt" class="waves-effect waves-light btn" href="#" style="margin: [20px,0,20px,0]"><b>ਸ਼ੁਰੂ</b></a>
    		</div>

    		<div style="width: 50%;float: left;">
				<span style="margin: 8px;font-size: 30px">ਟਾਈਮ ਬਾਕੀ : </span><span style = "font-size:30px " id="clock">5:00</span>    			
    		</div>
    	</div>

    	<div style="padding: 20px">

	    	<div style="width: 49%;float: right">
	    		<span>&nbsp</span>
	    		<textarea id="usr_wr"  style="height: 300px;border:3px solid red;resize: none;padding: 10px;font-family: PunjabiFont;font-size: 18px" autofocus=""></textarea>
	    		<b>
	    			<span>ਲਿਖਿਆ ਕੁੱਲ ਸ਼ਬਦ : </span>
	    			<span id="total_written_words">0</span>
	    		</b>
	    	</div>

	    	<div style="width: 49%;float: left">	    		
	    		<span>ਮੌਜੂਦਾ ਪੱਧਰ : </span><span id="curr_level">1</span>
	    		<div id="def_wr" style="height: 300px;border:3px solid blue;resize: none;padding: 10px;font-family: PunjabiFont;font-size: 18px" readonly></div>
	       		<b>
	    		<span>ਕੁੱਲ ਸ਼ਬਦ ਦੀ ਗਿਣਤੀ : </span>
	    		<span id = "total_words">26</span>
	    		</b>
	    	</div>

    	</div>

    	<div style="margin:20px">
    		<a id = "submit" class="waves-effect waves-light btn" style="float:right" href="punjabi" ><b>&nbsp Submit &nbsp</b></a>
    	</div>	

    	<div hidden>
    		<p id="loaded_text"></p>
    		<span id="num_back">0</span>
    	</div>
    </div>

<script  src="js/jquery.js" charset="utf-8"></script>
<script  charset="utf-8">

var timeinterval;

	function getDefaultText()
	{
		return $('#def_wr').val();
	}

	function getWrittenText()
	{
		return $('#usr_wr').val();
	}

	function presentText(text)
	{
		text = text.trim();
		arr = text.split(" ");
		if(arr.length == 0)
			return "";
		modified = arr[0];
		for(var i=1;i<arr.length;i++)
			if(arr[i].length!=0)
				modified += " "+arr[i];

		return modified;
	}

	function getNumberOfWords(text)
	{
		text = text.trim();
		var count = 0;
		arr = text.split(" ");
		return arr.length;
	}

	function getAndSetNumberOfWords()
	{
		var wr_text = getWrittenText();
		wr_text = wr_text.trim();
		var count = 0;
		arr = wr_text.split(" ");
		for(var i=0;i<arr.length;i++)
		{
			if(arr[i].length != 0)
				count++;
		}
		$('#total_written_words').text(count);
	}

	function getPresentLevel()
	{
		return $('#curr_level').text(); 
	}

	function setPresentLevel(l)
	{
		$('#curr_level').text(l);
	}

	function getAndSetDefaultText()
	{
		$.get( "http://localhost/typemaster/update1.php", { 'tag': "4", 'level':getPresentLevel() }).done(function( data ) {
			    $('#def_wr').text(presentText(data));
			    $('#loaded_text').text(presentText(data));			    
				$('#total_words').text(getNumberOfWords(presentText(data)));
			});
	}

	function getAndSetDefaultText1(data)
	{
		$('#def_wr').text(presentText(data));
		$('#loaded_text').text(presentText(data));			    
		$('#total_words').text(getNumberOfWords(presentText(getDefaultText())));
	}

	function getTimeRemaining(endtime){
	  var t = endtime - Date.parse(new Date());
	  var seconds = Math.floor( (t/1000) % 60 );
  	  var minutes = Math.floor( (t/1000/60) % 60 );
  	  if(seconds/10<1)
  	  {
  	  	console.log("Here");
  	  	secs = "0"+seconds;
  	  }
  	  else
  	  {
  	  	secs = seconds;
  	  }
	  //var hours = Math.floor( (t/(1000*60*60)) % 24 );
	  //var days = Math.floor( t/(1000*60*60*24) );
	  return {
	  	'total':t,
	    'minutes': minutes,
	    'seconds': secs
	  };
	}

	function initializeClock(id, endtime){
	  var clock = document.getElementById(id);
	  timeinterval = setInterval(function(){
	    var t = getTimeRemaining(endtime);
	    //console.log(t);
	    clock.innerHTML = t.minutes + ":"+t.seconds;
	    if(t.total<=0){
	      clearInterval(timeinterval);
	    }
	  },1000);
	}

	function highlightword()
	{
		var wr_text = getWrittenText();
		var arr = wr_text.split(" ");
		var start_pos = 0,end_pos = 0;
		var int_content = $('#loaded_text').text();
		var content = "";
		if(arr.length > getNumberOfWords(int_content))
		{
			$('#def_wr').html(int_content);
			return;
		}
		for(var i=0;i<arr.length-1;i++)
		{		
			start_pos = int_content.indexOf(" ",start_pos+1);
		}
		end_pos = int_content.indexOf(" ",start_pos+1);
		if(end_pos<start_pos || end_pos == -1)
			end_pos = int_content.length;
		content =  int_content.substr(0,start_pos)+'<span style="background-color:yellow">'+int_content.substr(start_pos,end_pos-start_pos+1)+'</span>'+int_content.substr(end_pos+1);
	
		$('#def_wr').html(content);
	}

	function getNumberOfBackSpace()
	{
		return $('#num_back').text();
	}

	function getNumberOfCorrectWords(var def_text,var usr_text)
	{
		var arr1 = def_text.split(" ");
		var arr2 = usr_text.split(" ");
		var t_act_words = arr1.length;
		var t_wr_words = arr2.length;
		var correct = 0;
		for(var i=0;i<t_wr_words && i<t_act_words;i++)
		{
			if(arr1[i].length>0 && arr2[i].length>0 && arr1[i] == arr2[i])
			{
				correct = correct + 1;
			}
		}
		return correct;
	}

	function getAccuracy(var def_text,var usr_text)
	{
		var correct = Math.floor(getNumberOfCorrectWords(def_text,usr_text));
		var t_act_words = Math.floor(getNumberOfWords(def_text));
		var accuracy = (correct*100)/t_act_words;
		return accuracy;
	}

	function getTypingSpeed(var def_text,var usr_text)
	{
		var correct = Math.floor(getNumberOfCorrectWords(def_text,usr_text));
		var t = $('#clock').text();
		var s = t.split(":");
		var min = parseInt(s[0]);
		var sec = parseInt(s[1])/60.0;
		var min = min + sec;
		var t_speed = correct/min;
		return t_speed;
	}

	$('document').ready(function(){
		$('#usr_wr').keyup(function(event){
			getAndSetNumberOfWords();
			highlightword();
			var key = event.keyCode || event.charCode;

			if(key == 8)
			{
				var n = Math.floor($('#num_back').text());
				alert(n);
				$('#num_back').text(n+1);
			}
		});
		$('#usr_wr').click(function(event){
			event.preventDefault();
		});

		$('#p-l1').click(function(){
			setPresentLevel(1);
			getAndSetDefaultText();
		});
		$('#p-l2').click(function(){
			setPresentLevel(2);
			getAndSetDefaultText();
		});
		$('#p-l3').click(function(){
			setPresentLevel(3);
			getAndSetDefaultText();
		});
		$('#rep').click(function(){
			clearInterval(timeinterval);
			getAndSetDefaultText1($('#loaded_text').text());
			var deadline = Date.parse(new Date())+5*60*1000;
			initializeClock('clock',deadline);
		});
		$('#strt').click(function(){
			clearInterval(timeinterval);
			getAndSetDefaultText();
			var deadline = Date.parse(new Date())+5*60*1000;
			initializeClock('clock',deadline);
		});
	});

</script>

</body>

</html>    