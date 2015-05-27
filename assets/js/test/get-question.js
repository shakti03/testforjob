$(function(){
	var hours = $("#hours").attr('value');
	var minutes = $("#minutes").attr('value');
	var seconds = $("#seconds").attr('value');
	var timerId = null;

	$('#timer').html(hours+':'+minutes+':'+seconds);

	if(!testOver) {
	    timerId = setInterval(function(){
	        if(hours == 0 && minutes == 0 && seconds == 0){
	            alert('Time Over');
	            clearInterval(timerId);
	        }
	        else{
	            if( minutes == 0 && hours !=0){
	                hours--;
	                minutes = 60;
	            }

	            if( seconds == 0){
	                minutes--;
	                seconds = 60;
	            }
				
				$('#timer').html( hours+':'+minutes+':'+--seconds);
	        }

	    }, 1000);
	}

    $('#frmTest').submit(function(){
    	$('#loader').show();
		var option = $('input[name=option]:checked').val();

		$("input#hours").attr('value', hours);
		$("input#minutes").attr('value', minutes);
		$("input#seconds").attr('value', seconds); 

		if(!option) {
			alert('Please select an option.');
			$('#loader').hide();
			return false;
		}
		clearInterval(timerId);
	});

	$('.pagination a').click(function(e){
		clearInterval(timerId);
		$('#loader').show();
		$.ajax({
			url  : baseUrl+'/user/set-time',
			type : 'post',
			data : {'hours':hours, 'minutes':minutes, 'seconds': seconds},
			async: false,
			dataType: 'json',
			success: function(){
				return true;
			}
		});
	});

	$(window).on('beforeunload', function(){
	    clearInterval(timerId);
		$('#loader').show();
		$.ajax({
			url  : BASE_URL+'/set-time',
			type : 'post',
			data : {'hours':hours, 'minutes':minutes, 'seconds': seconds},
			async: false,
			dataType: 'json',
			success: function(){
				return true;
			}
		});
	});

	var chart = new CanvasJS.Chart("chartContainer",
	{
		legend: {
			verticalAlign: "bottom",
			horizontalAlign: "center"
		},
		theme: "theme2",
		data: [{        
					type: "pie",
					indexLabelFontFamily: "Garamond",       
					indexLabelFontSize: 20,
					indexLabelFontWeight: "bold",
					startAngle:0,
					indexLabelFontColor: "MistyRose",       
					indexLabelLineColor: "darkgrey", 
					indexLabelPlacement: "inside", 
					toolTipContent: "{name}: {y}",
					showInLegend: true,
					indexLabel: "#percent%", 
					dataPoints: [
						{  y: $('#unanswered').val()/10, name: "Unanswered", legendMarkerType: "square"},
						{  y: $('#incorrect').val()/10, name: "Inorrect", legendMarkerType: "square"},
						{  y: $('#correct').val()/10, name: "Correct", legendMarkerType: "square	"}
					]
			}]
	});
	chart.render();

	$('.canvasjs-chart-credit').hide();
	
});
