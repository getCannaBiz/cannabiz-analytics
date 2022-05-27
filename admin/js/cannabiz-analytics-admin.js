jQuery(document).ready(function ($) {

	// Tabs.
	$( ".inline-list" ).each( function() {
		$( this ).find( "li" ).each( function(i) {
			$( this).click( function(){
				$( this ).addClass( "current" ).siblings().removeClass( "current" )
				.parents( "#wpbody" ).find( "div.panel-left" ).removeClass( "visible" ).end().find( 'div.panel-left:eq('+i+')' ).addClass( "visible" );
				return false;
			} );
		} );
	} );


	// Scroll to anchor.
	$( ".anchor-nav a, .toc a" ).click( function(e) {
		e.preventDefault();

		var href = $( this ).attr( "href" );
		$( "html, body" ).animate( {
			scrollTop: $( href ).offset().top
		}, 'slow', 'swing' );
	} );


	// Back to top links.
	$( "#help-panel h3" ).append( $( "<a class='back-to-top' href='#panel'><i class='fa fa-angle-up'></i> Back to top</a>" ) );

	// Product sales.
	new Chart(document.getElementById("bar-chart"), {
		type: 'bar',
		data: {
		labels: chart_vars.product_names,
		datasets: [
			{
			label: "Sales by Product",
			backgroundColor: ["#74477A", "#397500","#424242","#2271b1","#A7A7A7","d63638"],
			data: chart_vars.product_counts
			}
		]
		},
		options: {
			legend: { display: false },
			title: {
				display: true,
				text: 'Sales by product'
			}
		}
	});

	// Product type sales.
	new Chart(document.getElementById("product-types-pie-chart"), {
		type: 'pie',
		data: {
		labels: chart_vars.orders_product_types_names,
		datasets: [
			{
			label: "Sales by Product Type",
			backgroundColor: ["#74477A","#397500","#424242","#2271b1","#A7A7A7","d63638","#424242","#2271b1"],
			data: chart_vars.orders_product_types_counts
			}
		]
		},
		options: {
			legend: { display: false },
			title: {
				display: true,
				text: 'Sales by Product Type'
			}
		}
	});

	// Strain type sales.
	new Chart(document.getElementById("strain-sales-pie-chart"), {
		type: 'pie',
		data: {
		labels: chart_vars.orders_strain_names,
		datasets: [{
			label: "Sales by Strain Types",
			backgroundColor: ["#397500","#424242","#74477A","#A7A7A7","d63638","#2271b1"],
			data: chart_vars.orders_strain_counts
		  }]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: 'Sales by Strain Types'
		  }
		}
	});

	// Shelf type sales.
	new Chart(document.getElementById("shelf-sales-pie-chart"), {
		type: 'pie',
		data: {
		labels: chart_vars.orders_shelf_names,
		datasets: [{
			label: "Sales by Shelf Types",
			backgroundColor: ["#74477A","d63638","#397500","#424242","#2271b1","#A7A7A7"],
			data: chart_vars.orders_shelf_counts
		  }]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: 'Sales by Shelf Types'
		  }
		}
	});

	// Vendors sales.
	new Chart(document.getElementById("vendor-sales-bar-chart"), {
		type: 'bar',
		data: {
		labels: chart_vars.orders_vendor_names,
		datasets: [{
			label: "Sales by Vendor",
			backgroundColor: ["#424242","#2271b1","#A7A7A7","#74477A","d63638","#397500"],
			data: chart_vars.orders_vendor_counts
		  }]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: 'Sales by Vendor'
		  }
		}
	});

	// Sales count by customer.
	new Chart(document.getElementById("customer-sales-bar-chart"), {
		type: 'bar',
		data: {
		labels: chart_vars.orders_customer_names,
		datasets: [{
			label: "Sales by Customer",
			backgroundColor: ["#424242","#2271b1","#A7A7A7","#74477A","d63638","#397500"],
			data: chart_vars.orders_customer_counts
		  }]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: false,
			text: 'Sales by Customer'
		  }
		}
	});

	// Sales total by customer.
	new Chart(document.getElementById("customer-sales-total-bar-chart"), {
		type: 'bar',
		data: {
		labels: chart_vars.orders_customer_names,
		datasets: [{
			label: "Sales Total by Customer",
			backgroundColor: ["#424242","#2271b1","#A7A7A7","#74477A","d63638","#397500"],
			data: chart_vars.orders_customer_sales_totals
		  }]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: false,
			text: 'Sales Total by Customer'
		  }
		}
	});

	// Doughnut chart 1.
	new Chart(document.getElementById("doughnut-chart"), {
		type: 'doughnut',
		data: {
			labels: chart_vars.shelf_names,
			datasets: [{
				label: 'Shelf Types',
				data: chart_vars.shelf_counts,
				backgroundColor: ["#74477A", "#397500","#424242","#2271b1","#A7A7A7","#d63638"],
				hoverOffset: 4
			}]
		},
		options: {
			legend: { display: false },
			title: {
				display: false,
				text: 'Overview of all shelf types'
			}
		}
	});
	// Doughnut chart 2.
	new Chart(document.getElementById("doughnut-chart-2"), {
		type: 'doughnut',
		data: {
			labels: chart_vars.strain_names,
			datasets: [{
				label: 'Strain Types',
				data: chart_vars.strain_counts,
				backgroundColor: ["#2271b1","#74477A","#d63638","#424242","#A7A7A7","#397500"],
				hoverOffset: 4
			}]
		},
		options: {
			legend: { display: false },
			title: {
				display: false,
				text: 'Overview of all strain types'
			}
		}
	});
	// Doughnut chart 3.
	new Chart(document.getElementById("doughnut-chart-3"), {
		type: 'doughnut',
		data: {
			labels: chart_vars.type_names,
			datasets: [{
				label: 'Product types',
				data: chart_vars.type_counts,
				backgroundColor: ["#2271b1","#74477A","#d63638","#424242","#A7A7A7","#397500"],
				hoverOffset: 4
			}]
		},
		options: {
			legend: {
				position: "top",
				align: "start",
				display: false
			},
			title: {
				display: false,
				text: 'Overview of all product types'
			}
		}
	});
	// Product types chart.
	new Chart(document.getElementById("product-types-chart"), {
		type: 'bar',
		data: {
			labels: chart_vars.type_names,
			datasets: [{
				label: 'Product types',
				data: chart_vars.type_counts,
				backgroundColor: ["#2271b1","#74477A","#d63638","#424242","#A7A7A7","#397500"],
				hoverOffset: 4
			}]
		},
		indexAxis: 'y',
		scales: {
			y: {
				beginAtZero: true
			}
		},
		options: {
			legend: { display: false },
			title: {
				display: false,
				text: 'Overview of all product types'
			}
		}
	});
});