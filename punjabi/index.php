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

::-webkit-scrollbar { 
    display: none; 
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

	    	

	    	<div style="width: 100%;float: left" class="noselect">	    		
	    		<span>ਮੌਜੂਦਾ ਪੱਧਰ : </span><span id="curr_level">1</span>
	    		<div id="def_wr" style="height: 160px;overflow:scroll;border:3px solid blue;resize: none;padding: 10px;font-family: PunjabiFont;font-size: 18px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;" readonly>ਸਟਾਰਟ ਬਟਨ 'ਤੇ ਕਲਿੱਕ ਕਰੋ ਸ਼ੁਰੂ ਕਰਨ ਲਈ!</div>
	       		<b>
	    		<span>ਕੁੱਲ ਸ਼ਬਦ ਦੀ ਗਿਣਤੀ : </span>
	    		<span id = "total_words">0</span>
	    		</b>
	    	</div>

	    	<div style="margin-top:25px;width: 50%;float: left;">
    			<a id="rep" class="waves-effect waves-light btn modal-trigger" href="#modal1" style="margin: [20px,0,20px,0]" href="#" ><b>ਦੁਹਰਾਉ</b></a>
    			<a id="strt" class="waves-effect waves-light btn modal-trigger" href="#modal1" style="margin: [20px,0,20px,0]"><b>ਸ਼ੁਰੂ</b></a>

				  <!-- Modal Structure -->
				  <div id="modal1" class="modal">
				    <div class="modal-content">
				      <label>ਕੰਮ ਨੂੰ ਪੂਰਾ ਕਰਨ ਲਈ ਵਾਰ ਦੀ ਚੋਣ !</label>
					  <select id="tm-sel" class="browser-default">
					    <option value="2" selected>2 ਮਿੰਟ</option>
					    <option value="3">3 ਮਿੰਟ</option>
					    <option value="5">5 ਮਿੰਟ</option>
					    <option value="10">10 ਮਿੰਟ</option>
					  </select>

					  <label>	ਪੈਰਾ ਚੁਣੋ !</label>
					  <select id="p-sel" class="browser-default" style="font-family: PunjabiFont">
					  	 
					  </select>	

					  <br><br>
					  <label>
					  	Repeat button activate after you complete the paragraph once !
					  </label>
				    </div>
				    <div class="modal-footer">
				      <a href="#!" id="set" class=" modal-action modal-close waves-effect waves-green btn-flat">Set</a>
				    </div>
				  </div>


    		</div>

    		<div style="margin-top:20px;width: 50%;float: left;">
				<span style="margin: 8px;font-size: 30px">ਟਾਈਮ ਬਾਕੀ : </span><span style = "font-size:30px " id="clock">_:__</span>    			
    		</div>

	    	<div style="width: 100%;float: right">
	    		<span>&nbsp</span>
	    		<textarea id="usr_wr"  style="height: 150px;border:3px solid red;resize: none;padding: 10px;font-family: PunjabiFont;font-size: 18px" autofocus=""></textarea>
	    		<b>
	    			<span>ਲਿਖਿਆ ਕੁੱਲ ਸ਼ਬਦ : </span>
	    			<span id="total_written_words">0</span>
	    		</b>

	    		<div>
	    				<p>
	    				<input type="checkbox" id="highlight" checked="checked" />
      					<label for="highlight">Do you want to highlight current word?</label>
	    				</p>
	    				<div style="width: 100%">
				    		<a id = "submit" class="waves-effect waves-light btn" style="float:right;margin: 0px"  ><b>&nbsp Submit &nbsp</b></a>
				    	</div>	
	    		</div>
	    	</div>

    	</div>

    	

    	<div hidden>
    		<p id="loaded_text"></p>
    		<span id="num_back">0</span>
    		<span id="deadline">5</span>
    		<span id="rep_len">20</span>
    	</div>
    </div>

<script src="../js/materialize.js"></script> 	
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

	function isChecked()
	{
		return $('#highlight').prop("checked");
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

	function getAndSetDefaultText(data)
	{
	    $('#def_wr').text(data);
	    $('#loaded_text').text(data);			    
		$('#total_words').text(getNumberOfWords(presentText(data)));
		$('#rep_len').text(getNumberOfWords(data));
		$('#usr_wr').val('');			
	}

	function getAndSetDefaultText1(data)
	{
		$('#def_wr').text(presentText(data));
		$('#loaded_text').text(presentText(data));			    
		$('#total_words').text(getNumberOfWords(data));
		$('#usr_wr').val('');
	}

	function getTimeRemaining(endtime){
	  var t = endtime - Date.parse(new Date());
	  var seconds = Math.floor( (t/1000) % 60 );
  	  var minutes = Math.floor( (t/1000/60) % 60 );
  	  if(seconds/10<1)
  	  {
  	//  	console.log("Here");
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
	      $('#submit').click();
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

	function getNumberOfCorrectWords(def_text,usr_text)
	{
		var arr1 = def_text.split(" ");
		var arr2 = usr_text.split(" ");
		var t_act_words = arr1.length;
		var t_wr_words = arr2.length;
		var rep_len = $('#rep_len').text();
		var correct = 0;
		for(var i=0,j=0;i<t_wr_words;i++,j=(j+1)%rep_len)
		{
			if(arr1[j].length>0 && arr2[i].length>0 && arr1[j] == arr2[i])
			{
				console.log(i+"="+j);
				console.log(arr1[j]+"="+arr2[i]);
				correct = correct + 1;
			}
		}
		return correct;
	}

	function getMaximum(a, b)
	{
		if(a>b)
			return a;
		else 
			return b;
	}

	function getAccuracy(def_text,usr_text)
	{
		console.log($('#rep_len').text());
		var correct = Math.floor(getNumberOfCorrectWords(def_text,usr_text));
		var t_act_words = Math.floor(getNumberOfWords(usr_text));
		var t_act_words1 = Math.floor(getNumberOfWords(def_text));
		var div = getMaximum(t_act_words,t_act_words1);
		var accuracy = (correct*100)/div;
		return Math.round(accuracy*100)/100;
	}

	function deactivateRepeatButton()
	{
		$('#rep').attr('class','btn disabled');$('#rep').attr('href','#');
	}

	function activateRepeatButton()
	{
		$('#rep').attr('class','waves-effect waves-light btn modal-trigger');
	}

	function disableUserTextarea()
	{
		$('#rep').attr('href','#');
		$('#usr_wr').prop("disabled",true);
	}

	function enableUserTextarea()
	{
		$('#rep').attr('href','#modal1');
		$('#usr_wr').prop("disabled",false);
	}

	function resetIt()
	{	
		deactivateRepeatButton();
		disableUserTextarea();
		$('#rep').show();
		$('#total_words').text("0");
		$('#usr_wr').val('');
		$('#def_wr').text("Click on start button to start !");
		clearInterval(timeinterval);		
	}

	function getTypingSpeed(def_text,usr_text)
	{
		var correct = Math.floor(getNumberOfCorrectWords(def_text,usr_text));
		var t = $('#clock').text();
		var s = t.split(":");
		var tm = parseInt($('#deadline').text());
		var min = tm-parseInt(s[0])-1;
		var sec = 60-parseInt(s[1]);
		var total = min*60+sec;
		var min = total/60;
		var t_speed = correct/min;
		return t_speed;
	}

	function showParagraphs(){
		$.get( "http://localhost/typemaster/update1.php", { 'tag': "5", 'level':getPresentLevel() }).done(function( data ) {
			    var para_array = JSON.parse(data);
			    var html = '';
			    for(var i=0;i<para_array.length;i++)
			    {
			    	html += '<option style="overflow:hidden" value="'+encodeURI(para_array[i].value)+'">'+para_array[i].value.substr(0,70)+'...'+'</option>';
			    }
			    $('#p-sel').html(html);
			});
	}

	$('document').ready(function(){
		deactivateRepeatButton();
		$('#usr_wr').text("");
		$('.modal-trigger').leanModal({dismissible: false});
		disableUserTextarea();
		$('#usr_wr').keyup(function(event){
			if(!timeinterval)
			{
				console.log("timeinterval");		
				var tm = parseInt($('#deadline').text());	
				var deadline = Date.parse(new Date())+tm*60*1000;
				initializeClock('clock',deadline);
			}
			getAndSetNumberOfWords();
			if(getNumberOfWords($('#usr_wr').val()) >= getNumberOfWords($('#def_wr').text()))
			{
				activateRepeatButton();
			}
			else
			{
				deactivateRepeatButton();
			}

			if(isChecked())
			{
				highlightword();
			}
			var key = event.keyCode || event.charCode;

			if(key == 8)
			{
				var n = Math.floor($('#num_back').text());
				$('#num_back').text(n+1);
			}
		});
		$('#usr_wr').click(function(event){
			event.preventDefault();
		});

		$('#p-l1').click(function(){
			resetIt();
			setPresentLevel(1);
	//		getAndSetDefaultText();
		});
		$('#p-l2').click(function(){
			resetIt();
			setPresentLevel(2);
	//		getAndSetDefaultText();
		});
		$('#p-l3').click(function(){
			resetIt();
			setPresentLevel(3);
	//		getAndSetDefaultText();
		});
		$('#rep').click(function(){
			if($('#rep').attr('class') != 'btn disabled')
			{
				$('#rep_len').text(getNumberOfWords($('#usr_wr').val()));
				$('#rep').hide();
			}
		});
		$('#strt').click(function(){
			resetIt();
			$('#num_back').text("0");
			clearInterval(timeinterval);
			enableUserTextarea();
			showParagraphs();
		});

		$('#set').click(function(){
			var tm = parseInt($('#tm-sel').val());
			var txt = decodeURI($('#p-sel').val());
			getAndSetDefaultText(txt);
			$('#deadline').text(tm);
			$('#clock').text(tm+':'+'00');
			/*var deadline = Date.parse(new Date())+tm*60*1000;
			initializeClock('clock',deadline);*/
		});
		$('#submit').click(function(){
			var num_back = $('#num_back').text();
			var accuracy = getAccuracy($('#loaded_text').text(),$('#usr_wr').val());
			var type_speed = Math.ceil(getTypingSpeed($('#loaded_text').text(),$('#usr_wr').val()));
			window.location = "result.php?back="+num_back+"&acc="+accuracy+"&ts="+type_speed;
		});
		$('#highlight').change(function()
		{
			if(isChecked())
			{	
				highlightword();
			}
			else
			{
				$('#def_wr').html($('#loaded_text').html());
			}
		});
	});

</script>


</body>

</html>    