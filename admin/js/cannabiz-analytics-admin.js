jQuery(document).ready(function ($) {

	// Tabs
	$( ".inline-list" ).each( function() {
		$( this ).find( "li" ).each( function(i) {
			$( this).click( function(){
				$( this ).addClass( "current" ).siblings().removeClass( "current" )
				.parents( "#wpbody" ).find( "div.panel-left" ).removeClass( "visible" ).end().find( 'div.panel-left:eq('+i+')' ).addClass( "visible" );
				return false;
			} );
		} );
	} );


	// Scroll to anchor
	$( ".anchor-nav a, .toc a" ).click( function(e) {
		e.preventDefault();

		var href = $( this ).attr( "href" );
		$( "html, body" ).animate( {
			scrollTop: $( href ).offset().top
		}, 'slow', 'swing' );
	} );


	// Back to top links
	$( "#help-panel h3" ).append( $( "<a class='back-to-top' href='#panel'><i class='fa fa-angle-up'></i> Back to top</a>" ) );

	// Bar chart.
	new Chart(document.getElementById("bar-chart"), {
		type: 'bar',
		data: {
		labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
		datasets: [
			{
			label: "Population (millions)",
			backgroundColor: ["#74477A", "#397500","#424242","#2271b1","#A7A7A7"],
			data: [2478,5267,734,784,433]
			}
		]
		},
		options: {
			legend: { display: false },
			title: {
				display: true,
				text: 'Predicted world population (millions) in 2050'
			}
		}
	});
	// Pie chart.
	new Chart(document.getElementById("pie-chart"), {
		type: 'pie',
		data: {
		  labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
		  datasets: [{
			label: "Population (millions)",
			backgroundColor: ["#74477A", "#397500","#424242","#2271b1","#A7A7A7"],
			data: [2478,5267,734,784,433]
		  }]
		},
		options: {
		  title: {
			display: true,
			text: 'Predicted world population (millions) in 2050'
		  }
		}
	});
	// Pie chart 2 horizontal.
	new Chart(document.getElementById("pie-chart-2"), {
		type: 'pie',
		data: {
		  labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
		  datasets: [
			{
			  label: "Population (millions)",
			  backgroundColor: ["#74477A", "#397500","#424242","#2271b1","#A7A7A7"],
			  data: [2478,5267,734,784,433]
			}
		  ]
		},
		options: {
			legend: { display: false },
			title: {
				display: true,
				text: 'Predicted world population (millions) in 2050'
			}
		}
	});
	// Doughnut chart horizontal.
	new Chart(document.getElementById("doughnut-chart"), {
		type: 'doughnut',
		data: {
			labels: [
				'Sativa',
				'Hybrid',
				'Indica'
			],
			datasets: [{
			label: 'My First Dataset',
			data: [300, 50, 100],
			backgroundColor: [
				'#74477A',
				'#397500',
				'#424242'
			],
			hoverOffset: 4
			}]
		},
		options: {
			legend: { display: false },
			title: {
				display: true,
				text: 'Predicted world population (millions) in 2050'
			}
		}
	});
	// Doughnut chart horizontal.
	new Chart(document.getElementById("doughnut-chart-2"), {
		type: 'doughnut',
		data: {
			labels: [
				'Sativa',
				'Hybrid',
				'Indica'
			],
			datasets: [{
			label: 'Something Specific',
			data: [4000, 2600, 1200],
			backgroundColor: [
				'#74477A',
				'#397500',
				'#424242'
			],
			hoverOffset: 4
			}]
		},
		options: {
			legend: { display: false },
			title: {
				display: true,
				text: 'Predicted world population (millions) in 2050'
			}
		}
	});
	// Doughnut chart horizontal.
	new Chart(document.getElementById("doughnut-chart-3"), {
		type: 'doughnut',
		data: {
			labels: [
				'Sativa',
				'Hybrid',
				'Indica'
			],
			datasets: [{
			label: 'My First Dataset',
			data: [300, 50, 100],
			backgroundColor: [
				'#74477A',
				'#397500',
				'#424242'
			],
			hoverOffset: 4
			}]
		},
		options: {
			legend: { display: false },
			title: {
				display: true,
				text: 'Predicted world population (millions) in 2050'
			}
		}
	});
});