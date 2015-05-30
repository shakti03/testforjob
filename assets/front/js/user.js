$(function(){
	$('.tests').click(function(){
                $('.tests_info').html('');
                data = "<input id='total_question_val' type='hidden' value='"+ $(this).siblings().find(".total_question").html() +"'/>"
                data += "<input id='total_answered_val' type='hidden' value='"+ $(this).siblings().find(".total_answered").html() +"'/>"
                data += "<input id='correct_answered_val' type='hidden' value='"+ $(this).siblings().find(".correct_answered").html() +"'/>"
                data += "<input id='wrong_answered_val' type='hidden' value='"+ $(this).siblings().find(".wrong_answered").html() +"'/>"
                data += "<input id='unanswered_val' type='hidden' value='"+ $(this).siblings().find(".unanswered").html() +"'/>"
                data += "<input id='viewed_val' type='hidden' value='"+ $(this).siblings().find(".viewed").html() +"'/>"
		$('.tests_info').html(data + $(this).siblings().html());
	

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
						{  y: $('#correct_answered_val').val()/10, name: "Correct Answered", legendMarkerType: "square"},
                                                {  y: $('#wrong_answered_val').val()/10, name: "Wrong Answered", legendMarkerType: "square"}
					]
			}]
	});
	chart.render();

	$('.canvasjs-chart-credit').hide();
        });
        
});