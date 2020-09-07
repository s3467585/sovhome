<?php
    date_default_timezone_set('Asia/Yekaterinburg');

    require_once 'system/core.php'; // стартуем ядро двигателя
	require_once 'system/functions.php'; // стартуем функции
	
	$weather = mysqli_query($connect, "SELECT * FROM `stat` ORDER BY `id` ASC LIMIT 15");
	$sensor = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `sensor`"));
	$query = mysqli_query($connect, "SELECT `id`, `value` FROM `settings` WHERE 1");
	while($arr=mysqli_fetch_assoc($query)) {
		$ard[$arr['id']]=$arr['value'];
	}
	$ram = floor(($ard['ram']/2048)*100);
	
//	$timeReal = 10 * 3600;  // корректировка часового пояса -10 часов между ЕКБ и Нью-Йорком

	while ($row = mysqli_fetch_assoc($weather)) {
		$temp0[] = $row['temp0'];
		$temp1[] = $row['temp1'];
   		$temp2[] = $row['temp2'];
		$time[] = clock($row['time']);
	}



	head();
?>

<!-- <div class="content">
	
	<div class="title">
	</div>
	<div class="title">Связь с Arduino</div>
	<div class="text">Соединение: 
			<?php 
				$error=false;
				if (time() - $ard['connection'] > 120) {
					echo 'Потеряно';
					$error = true;
				} else {
					echo 'Активно';
			}?><br>
		Последний сеанс: <?php echo clock($ard['connection']);?><br>
		Последняя перезагрузка: <?php echo clock($ard['reboot']);?><br>
		Время работы: 
			<?php 
				if ($error == true) {
					echo '--------';
				} else {
					echo datediff($ard['reboot'],time());
					//var_dump($ard);
			}?>
	</div>
</div>
<div class="content">
	<div class="title">RAM Arduino</div>
	<div class="text">Свободно памяти: <?php echo $ard['ram']; ?> байт(а) / 2048 байта<br/>
		<?php
		if ($ram > 90) {
			echo '<div class="meter red"><span style="width: '.$ram.'%"></span></div>';
		} else {
			echo '<div class="meter"><span style="width: '.$ram.'%"></span></div>';
		}?>
   </div>
</div>
<div class="content">
	<div class="title">Датчик движения 1</div>
	<div class="text"><small>Активирует RGB-подстветку</small><br>
		Состояние: 
		<?php if ($sensor['pir1'] == 1) {
			echo 'ON';
		} else {
			echo 'OFF';
		}?></div>
</div>
<div class="content">
	<div class="title">Датчик движения 2</div>
	<div class="text">Состояние: 
	<?php if ($sensor['pir2'] == 1) {
			echo 'ON';
		} else {
			echo 'OFF';
		}?></div>
</div>
<div class="content">
	<div class="title">Датчик освещенности</div>
	<div class="text"><small>При значении лм менее 700 и включенном датчике движения 2 автоматически включается ночной светильник</small><br>Показания: 1200 лм</div>
</div> -->
<script type="text/javascript">
// Load the fonts
	Highcharts.theme = {
	   colors: ["#2b908f", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
	      "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
	   chart: {
	      backgroundColor: {
	         linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
	         stops: [
	            [0, '#2a2a2b'],
	            [1, '#3e3e40']
	         ]
	      },
	      style: {
	         fontFamily: "verdana"
	      },
	      plotBorderColor: '#606063'
	   },
	   title: {
	      style: {
	         color: '#E0E0E3',
	         fontSize: '16px'
	      }
	   },
	   subtitle: {
	      style: {
	         color: '#E0E0E3',
	         textTransform: 'uppercase'
	      }
	   },
	   xAxis: {
	      gridLineColor: '#707073',
	      labels: {
	         style: {
	            color: '#E0E0E3'
	         }
	      },
	      lineColor: '#707073',
	      minorGridLineColor: '#505053',
	      tickColor: '#707073',
	      title: {
	         style: {
	            color: '#A0A0A3'

	         }
	      }
	   },
	   yAxis: {
	      gridLineColor: '#707073',
	      labels: {
	         style: {
	            color: '#E0E0E3'
	         }
	      },
	      lineColor: '#707073',
	      minorGridLineColor: '#505053',
	      tickColor: '#707073',
	      tickWidth: 1,
	      title: {
	         style: {
	            color: '#A0A0A3'
	         }
	      }
	   },
	   tooltip: {
	      backgroundColor: 'rgba(0, 0, 0, 0.85)',
	      style: {
	         color: '#F0F0F0'
	      }
	   },
	   plotOptions: {
	      series: {
	         dataLabels: {
	            color: '#B0B0B3'
	         },
	         marker: {
	            lineColor: '#333'
	         }
	      },
	      boxplot: {
	         fillColor: '#505053'
	      },
	      candlestick: {
	         lineColor: 'white'
	      },
	      errorbar: {
	         color: 'white'
	      }
	   },
	   legend: {
	      itemStyle: {
	         color: '#E0E0E3'
	      },
	      itemHoverStyle: {
	         color: '#FFF'
	      },
	      itemHiddenStyle: {
	         color: '#606063'
	      }
	   },
	   credits: {
	      style: {
	         color: '#666'
	      }
	   },
	   labels: {
	      style: {
	         color: '#707073'
	      }
	   },

	   drilldown: {
	      activeAxisLabelStyle: {
	         color: '#F0F0F3'
	      },
	      activeDataLabelStyle: {
	         color: '#F0F0F3'
	      }
	   },

	   navigation: {
	      buttonOptions: {
	         symbolStroke: '#DDDDDD',
	         theme: {
	            fill: '#505053'
	         }
	      }
	   },

	   // scroll charts
	   rangeSelector: {
	      buttonTheme: {
	         fill: '#505053',
	         stroke: '#000000',
	         style: {
	            color: '#CCC'
	         },
	         states: {
	            hover: {
	               fill: '#707073',
	               stroke: '#000000',
	               style: {
	                  color: 'white'
	               }
	            },
	            select: {
	               fill: '#000003',
	               stroke: '#000000',
	               style: {
	                  color: 'white'
	               }
	            }
	         }
	      },
	      inputBoxBorderColor: '#505053',
	      inputStyle: {
	         backgroundColor: '#333',
	         color: 'silver'
	      },
	      labelStyle: {
	         color: 'silver'
	      }
	   },

	   navigator: {
	      handles: {
	         backgroundColor: '#666',
	         borderColor: '#AAA'
	      },
	      outlineColor: '#CCC',
	      maskFill: 'rgba(255,255,255,0.1)',
	      series: {
	         color: '#7798BF',
	         lineColor: '#A6C7ED'
	      },
	      xAxis: {
	         gridLineColor: '#505053'
	      }
	   },

	   scrollbar: {
	      barBackgroundColor: '#808083',
	      barBorderColor: '#808083',
	      buttonArrowColor: '#CCC',
	      buttonBackgroundColor: '#606063',
	      buttonBorderColor: '#606063',
	      rifleColor: '#FFF',
	      trackBackgroundColor: '#404043',
	      trackBorderColor: '#404043'
	   },

	   // special colors for some of the
	   legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
	   background2: '#505053',
	   dataLabelsColor: '#B0B0B3',
	   textColor: '#C0C0C0',
	   contrastTextColor: '#F0F0F3',
	   maskColor: 'rgba(255,255,255,0.3)'
	};

	// Apply the theme
	Highcharts.setOptions(Highcharts.theme);
	$(function () {
	$('#container').highcharts({
		chart: {
			type: 'line'
		},
		title: {
			text: 'Температурные показатели'
		},
		xAxis: {
			categories: [
			<?php 
			foreach ($time as $value) {
				echo '\''.$value.'\',';
			}?>]
		},
		yAxis: {
			title: {
				text: 't °C'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [{
			name: 'Н/В',
			data: [
			<?php 
			foreach ($temp0 as $value) {
				echo $value.',';
			} ?>]
		}, {
	        name: 'Подача',
	        data: [
	        <?php
	        foreach ($temp1 as $value) {
				echo $value.',';
			}?>]
	    }, {
	        name: 'Обратка',
	        data: [
	        <?php
	        foreach ($temp2 as $value) {
				echo $value.',';
			}?>]
	    }]
	});
	});
</script>
	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 5px; margin-bottom: 5px;">
</div>
<!-- <div class="content">
	<div class="text center"><small>Умный дом на базе Arduino UNO + Ethernet Shield &copy; www.factoblog.ru</small>
   </div>
</div> -->
<?php
foot();
exit;
?>