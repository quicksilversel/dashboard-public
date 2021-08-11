$(document).ready(function() {

	// sidebar
	$(".sidebar-dropdown > a").click(function() {
		$(".sidebar-submenu").slideUp(200);
		if ($(this).parent().hasClass("active")) {
			$(".sidebar-dropdown").removeClass("active");
			$(this).parent().removeClass("active");
		} 
		else {
			$(".sidebar-dropdown").removeClass("active");
			$(this).next(".sidebar-submenu").slideDown(200);
			$(this).parent().addClass("active");
		}
	});
	
	$("#close-sidebar").click(function() {
		$(".page-wrapper").removeClass("toggled");
	});
	$("#show-sidebar").click(function() {
		$(".page-wrapper").addClass("toggled");
	});

	// progress bar 
	$('#bar .progress-bar').each(function() {
		$(this).css("width",
		function() {
			return $(this).attr("aria-valuenow") + "%";
		})
	});

	// bar chart 
	var myChart = new Chart(document.getElementById('myChart'), {
		type: 'bar',
		data: {
			labels: ["January", "February", "March", "April", 'May', 'June', 'August', 'September'],
			datasets: [{
				label: "Tasks",
				data: [45, 25, 40, 20, 60, 20, 35, 25],
				backgroundColor: "#0d6efd",
				borderColor: 'transparent',
				borderWidth: 2.5,
				barPercentage: 0.4,
			}, {
				label: "Meetings",
				startAngle: 2,
				data: [20, 40, 20, 50, 25, 40, 25, 10],
				backgroundColor: "#dc3545",
				borderColor: 'transparent',
				borderWidth: 2.5,
				barPercentage: 0.4,
			}]
		},
		options: {
			scales: {
				yAxes: [{
					gridLines: {},
					ticks: {
						stepSize: 15,
					},
				}],
				xAxes: [{
					gridLines: {
						display: false,
					}
				}]
			}
		}
	})
});