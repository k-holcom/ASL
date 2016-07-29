$(document).ready(function(){
	$('.ascore').val(0);
	$('.hscore').val(0);

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
		var hscore = $('.hscore');
		hscore.val(homescore);
	});

	$('.awayscore').on('click', function(){
		var away = $('#away').html();
		var awayscore = parseInt(away);
		awayscore++;
		$('#away').html(awayscore);
		var ascore = $('.ascore');
		ascore.val(awayscore);
	});

	/***** BALLS *****/
	var i = 0;
	var j = 0;
	var k = 0;
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

			if(k == 0){
				$('.out1').html('<img src="../images/filled.png">');
				k++;
			}else if(k == 1){
				$('.out2').html('<img src="../images/filled.png">');
				k++;
			}else{
				$('.out1, .out2').html('<img src="../images/empty.png">');
				k = 0;
				var arrows = $('.arrow');
				var arrow = $('.inactive');
				if(arrow.hasClass('fa-caret-up')){
					arrow.removeClass('inactive');
					$('.fa-caret-down').addClass('inactive');
					var inning = $('#inning');
					var inningnum = parseInt(inning.html());
					inningnum++;
					inning.html(inningnum);
				}else{
					arrow.removeClass('inactive');
					$('.fa-caret-up').addClass('inactive');
				}
			}
		}
	});

	/***** OUTS *****/
	
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
			var arrow = $('.inactive');
			if(arrow.hasClass('fa-caret-up')){
				arrow.removeClass('inactive');
				$('.fa-caret-down').addClass('inactive');
				var inning = $('#inning');
				var inningnum = parseInt(inning.html());
				inningnum++;
				inning.html(inningnum);

			}else{
				arrow.removeClass('inactive');
				$('.fa-caret-up').addClass('inactive');
			}
		}
	});

	/***** RESET *****/
	$('#reset').on('click', function(){
		$('.strike1, .strike2, .ball1, .ball2, .ball3').html('<img src="../images/empty.png">');
		i = 0;
		j = 0;
	});

	
		












});