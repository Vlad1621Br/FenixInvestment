jQuery(document).ready(function ($) {
	
	$('#field_1-12 input').on('click', function () {
		
		$('.fieldname21_1').show();
		$('.table_deposit_accrual_scheme').show();
		$('.title_table').show();
		$('.title_stacked_column_graphic').show();
		$('.title_pie_with_legend_graphic').show();
		$('.column_graphic').show();
		$('.pie_graphic').show();
		let check_monthly_inst = ($('#fieldname3_1_cb0').val());
		let an_initial_fee = Number($('#fieldname1_1').val());	/*первоначальный взнос*/
		let monthly_installment;
		if ( $("#fieldname3_1_cb0").hasClass("checkbox_true") ) {
			monthly_installment = Number($('#fieldname4_1').val());	/*ежемесячный взнос*/
		}
		else{ monthly_installment = 0;}
		
		let term_of_the_deposit = Number($('#fieldname8_1').val()); /*срок депозита*/
		let interest_rate = Number($('#fieldname6_1').val());	/* процентная ставка*/
		let rate_per_year_month = Number($('#fieldname7_1').val());	/* ставка в год/мес*/
		let term_year_month = Number($('#fieldname9_1').val());	/* срок год/мес*/
		let total_calc = $('.total_calc').text();
		let total_accrued_txt = $('.total_accrued').text();
		let general_contributions_txt = $('.general_contributions').text();
		let initial_amount_txt = $('.initial_amount').text();
		let month_or_year_word;

		let general_contributions = 0;		/* общие взносы*/		
		let deposit_rate = 0;		/*  ставка в % год/мес*/
		let total_accrued = 0;		/*  всего начисленных %*/
		let term_deposit = 0; /* срок в годах*/
		

		let grafic_initial_fee = [];
		let grafic_general_contribut = [];
		let grafic_accrued_year = [];
		let deposit_interest = 0;
		let percentage_demos_for_the_year = 0;
		$(".table_deposit_accrual_scheme > tbody > tr").remove();
	


		let term_month = 0;				//срок депозита в месяцы
		let month_interest_rate = 0;	//реальная месячная процентная ставка
		let total_amount_with_interest = 0; //Итоговая сумма с учетом процентов
		let sum_interest = 0;			// Проценты по депозиту общий
		let base_accrual_amount = 0;
		let reinvest_totl;
		let month_or_year_n = []
		let j;


			if(rate_per_year_month == 12){		// проверка процентной ставки в годах ли
				if (term_year_month == 12) {
					month_or_year_word = $('.schedule_year').text();
					term_month = term_of_the_deposit * 12;//перевод срока депозита в месяцы
					month_interest_rate = (Math.pow((1 + interest_rate/100), 1/12) - 1);//Найдем реальную месячную процентную ставку
					for(let i = 0; i < term_month; i++){
						base_accrual_amount = (an_initial_fee + sum_interest + monthly_installment*(i));
						deposit_interest = ((an_initial_fee + sum_interest + monthly_installment*i) * month_interest_rate); // Проценты по депозиту
						sum_interest += deposit_interest; // Проценты по депозиту общий
						total_amount_with_interest = an_initial_fee + monthly_installment*i + sum_interest;
						$(".table_deposit_accrual_scheme > tbody").append("<tr><td>"+(i+1)+"</td><td>"+base_accrual_amount.toFixed(2)+"</td><td>"+deposit_interest.toFixed(2)+"</td><td>"+total_amount_with_interest.toFixed(2)+"</td></tr>");
						if ((i+1) % 12 === 0 && i > 0) {
							j = (i+1) / 12;
							grafic_accrued_year[j-1] = +(deposit_interest.toFixed(2));		//процент
							grafic_general_contribut[j-1] = i * monthly_installment;	//общий взнос
							grafic_initial_fee[j-1] = an_initial_fee;
							month_or_year_n[j-1] = j;
							month_or_year_n[j-1] += ' ' + month_or_year_word;
						}
					}
					$('#fieldname11_1').val(total_amount_with_interest.toFixed(2));
					$('#fieldname22_1').val(sum_interest.toFixed(2));
				}
				else{
					month_or_year_word = $('.schedule_month').text();
					term_month = term_of_the_deposit; //срок депозита в месяцах
					month_interest_rate = (Math.pow((1 + interest_rate/100), 1/12) - 1);//Найдем реальную месячную процентную ставку
					for(let i = 0; i < term_month; i++){
						base_accrual_amount = (an_initial_fee + sum_interest + monthly_installment*(i));
						deposit_interest = ((an_initial_fee + sum_interest + monthly_installment*i) * month_interest_rate); // Проценты по депозиту
						sum_interest += deposit_interest; // Проценты по депозиту общий
						total_amount_with_interest = an_initial_fee + monthly_installment*i + sum_interest;						
						$(".table_deposit_accrual_scheme > tbody").append("<tr><td>"+(i+1)+"</td><td>"+base_accrual_amount.toFixed(2)+"</td><td>"+deposit_interest.toFixed(2)+"</td><td>"+total_amount_with_interest.toFixed(2)+"</td></tr>");
						grafic_accrued_year[i] = +deposit_interest.toFixed(2);	//процент
						grafic_general_contribut[i] = i * monthly_installment;	//общий взнос
						grafic_initial_fee[i] = an_initial_fee;					//начальный взнос
						month_or_year_n[i] = i+1;
						month_or_year_n[i] += ' ' + month_or_year_word;
					}

					$('#fieldname11_1').val(total_amount_with_interest.toFixed(2));
					$('#fieldname22_1').val(sum_interest.toFixed(2));
				}
			}
			else{			//если процентная ставка в месяцах
				if (term_year_month == 12) {
					month_or_year_word = $('.schedule_year').text();
					term_month = term_of_the_deposit * 12;//перевод срока депозита в месяцы
					month_interest_rate = interest_rate/100;//реальная месячная процентная ставка
					for(let i = 0; i < term_month; i++){
						base_accrual_amount = (an_initial_fee + sum_interest + monthly_installment*(i));
						deposit_interest = ((an_initial_fee + sum_interest + monthly_installment*i) * month_interest_rate); // Проценты по депозиту
						sum_interest += deposit_interest; // Проценты по депозиту общий
						total_amount_with_interest = an_initial_fee + monthly_installment*i + sum_interest;						
						$(".table_deposit_accrual_scheme > tbody").append("<tr><td>"+(i+1)+"</td><td>"+base_accrual_amount.toFixed(2)+"</td><td>"+deposit_interest.toFixed(2)+"</td><td>"+total_amount_with_interest.toFixed(2)+"</td></tr>");
						if ((i+1) % 12 === 0 && i > 0) {
							j = (i+1) / 12;
							grafic_accrued_year[j-1] = +(deposit_interest.toFixed(2));		//процент
							grafic_general_contribut[j-1] = i * monthly_installment;	//общий взнос
							grafic_initial_fee[j-1] = an_initial_fee;
							month_or_year_n[j-1] = j;
							month_or_year_n[j-1] += ' ' + month_or_year_word;
						}
					}

					$('#fieldname11_1').val(total_amount_with_interest.toFixed(2));
					$('#fieldname22_1').val(sum_interest.toFixed(2));
				}
				else{
					month_or_year_word = $('.schedule_month').text();
					term_month = term_of_the_deposit; //срок депозита в месяцах
					month_interest_rate = interest_rate/100;//реальная месячная процентная ставка
					for(let i = 0; i < term_month; i++){
						base_accrual_amount = (an_initial_fee + sum_interest + monthly_installment*(i));
						deposit_interest = ((an_initial_fee + sum_interest + monthly_installment*i) * month_interest_rate); // Проценты по депозиту
						sum_interest += deposit_interest; // Проценты по депозиту общий
						total_amount_with_interest = an_initial_fee + monthly_installment*i + sum_interest;						
						$(".table_deposit_accrual_scheme > tbody").append("<tr><td>"+(i+1)+"</td><td>"+base_accrual_amount.toFixed(2)+"</td><td>"+deposit_interest.toFixed(2)+"</td><td>"+total_amount_with_interest.toFixed(2)+"</td></tr>");
						grafic_accrued_year[i] = +(deposit_interest.toFixed(2));	//процент
						grafic_general_contribut[i] = i * monthly_installment;	//общий взнос
						grafic_initial_fee[i] = an_initial_fee;					//начальный взнос
						month_or_year_n[i] = i+1;
						month_or_year_n[i] += ' ' + month_or_year_word;
					}

					$('#fieldname11_1').val(total_amount_with_interest.toFixed(2));
					$('#fieldname22_1').val(sum_interest.toFixed(2));
				}
			}
			$(".table_deposit_accrual_scheme > tfoot > tr").remove();
			$(".table_deposit_accrual_scheme > tfoot").append("<tr><td>"+total_calc+"</td><td> </td><td>"+sum_interest.toFixed(2)+"</td><td>"+total_amount_with_interest.toFixed(2)+"</td></tr>");
				
				total_accrued = +sum_interest.toFixed(2);
				general_contributions = +(total_amount_with_interest.toFixed(2) - sum_interest.toFixed(2)).toFixed(2);


/*
		Highcharts.chart('pie_with_legend_graphic', {
		    chart: {
		        plotBackgroundColor: null,
		        plotBorderWidth: null,
		        plotShadow: false,
		        type: 'pie'
		    },
			title: {
			  text: ''
			},
		    tooltip: {
		        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		    },
		    accessibility: {
		        point: {
		            valueSuffix: '%'
		        }
		    },
		    plotOptions: {
		        pie: {
		            allowPointSelect: true,
		            cursor: 'pointer',
		            dataLabels: {
		                enabled: false
		            },
		            showInLegend: true
		        }
		    },
		    series: [{
		        name: 'Brands',
		        colorByPoint: true,
		        data: [{
		            name: total_accrued_txt,
		            y: +total_accrued, color: '#FFB800'
		        }, {
		            name: general_contributions_txt,
		            y: +general_contributions, color: '#8AB446'
		        }, {
		            name: initial_amount_txt,
		            y: +an_initial_fee, color: '#01213F'
		        }]
		    }]
		});
*/

		Highcharts.chart('stacked_column_graphic', {
			chart: {
				type: 'column'
			},
			title: {
				text: ''
			},
			xAxis: {
				categories: month_or_year_n
			},
			yAxis: {
				min: 0,
				title: {
					text: ''
				},
				stackLabels: {
					enabled: true,
					style: {
				    	fontWeight: 'bold',
				    	color: ( // theme
				      		Highcharts.defaultOptions.title.style &&
				      		Highcharts.defaultOptions.title.style.color
				    	) || 'gray'
				  	}
				}
			},
			
			plotOptions: {
				column: {
					stacking: 'normal',
					dataLabels: {
				    	enabled: true
					}
				}
			},
			series: [{
			name: total_accrued_txt,
			data: grafic_accrued_year, color: '#FFB800'
			}, {
			name: general_contributions_txt,
			data: grafic_general_contribut, color: '#8AB446'
			}, {
			name: initial_amount_txt,
			data: grafic_initial_fee, color: '#01213F'
			}]

		});

	});




	$('#fieldname3_1_cb0').on('click', function () {
		if ( $("#fieldname3_1_cb0").hasClass("checkbox_true") ) {
			$('#fieldname3_1_cb0').removeClass('checkbox_true');
		}
		else {
			$('#fieldname3_1_cb0').addClass('checkbox_true');
		}		
	});


});

