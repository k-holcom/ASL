$(document).ready(function(){

	/****** Inning Control ******/
	var up = $('.arrowup');
	up.on('click', function(){
		var inning = $('#inning');
		var inningnum = parseInt(inning.html());
		if(inningnum < 9){
			inningnum++;
			inning.html(inningnum);
		}
	});

	var down = $('.arrowdown');
	down.on('click', function(){
		var inning = $('#inning');
		var inningnum = parseInt(inning.html());
		if(inningnum > 1){
			inningnum--;
			inning.html(inningnum);
		}
	});

	/****** Score Control ******/
	$('.homescore').on('click', function(){
		var home = $('#home').html();
		var homescore = parseInt(home);
		homescore++;
		$('#home').html(homescore);
	});

	$('.awayscore').on('click', function(){
		var away = $('#away').html();
		var awayscore = parseInt(away);
		awayscore++;
		$('#away').html(awayscore);
	});

	/***** BALLS *****/
	var i = 0;
	$('#ball').on('click', function(){
		if (i == 0){
			var ball1 = $('.ball1').html();
			$('.ball1').html('<img src="../images/filled.png">');
			i++;
		}else if(i == 1){
			$('.ball2').html('<img src="../images/filled.png">');
			i++;
		}else if(i == 2){
			$('.ball3').html('<img src="../images/filled.png">');
			i++;
		}else{
			$('.ball1, .ball2, .ball3').html('<img src="../images/empty.png">');
			i = 0;
		}
	});

	/***** STRIKES *****/
	var j = 0;
	$('#strike').on('click', function(){
		if(j == 0){
			$('.strike1').html('<img src="../images/filled.png">');
			j++;
		}else if(j == 1){
			$('.strike2').html('<img src="../images/filled.png">');
			j++;
		}else{
			$('.strike1, .strike2').html('<img src="../images/empty.png">');
			j = 0;
		}
	});

	/***** OUTS *****/
	var k = 0;
	$('#out').on('click', function(){
		if(k == 0){
			$('.out1').html('<img src="../images/filled.png">');
			k++;
		}else if(k == 1){
			$('.out2').html('<img src="../images/filled.png">');
			k++;
		}else{
			$('.out1, .out2').html('<img src="../images/empty.png">');
			k = 0;
		}
	});

	/***** RESET *****/
	$('#reset').on('click', function(){
		$('.strike1, .strike2, .ball1, .ball2, .ball3').html('<img src="../images/empty.png">');
		i = 0;
		j = 0;
	});







});