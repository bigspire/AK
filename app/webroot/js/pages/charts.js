/* All functions in this file are used only for charts.html */
var Charts = function () {
	
    "use strict";  

    // Init Flot Charts Plugin
    var runCharts = function () {
		
        // Add a series of colors to be used in the charts and pie graphs
        var Colors = [blueColor, purpleColor, orangeColor, greenColor, redColor, tealColor, yellowColor];
		
        // Typical random Number generator
        var randNum = function () {return (Math.floor(Math.floor((Math.random() * 5) + 1) + 5));}
		
        // Creates Random data values based on passed quantity and desired deviation
		function dataCreate(num, dev) {
			var dataPlots = [];
			for (var i = 0; i < num; i++) {
				if (i === 0) {
					dataPlots.push([(i + 1), 0]);
				} else {
					dataPlots.push([(i + 1), (randNum() * (i + dev))]);
				}
			}
			return (dataPlots);
		}
			
        if ($(".chart-line").length) {
            var options = {
                grid: {
                    show: true,
                    aboveData: true,
                    color: "#3f3f3f",
                    labelMargin: 5,
                    axisMargin: 0,
                    borderWidth: 0,
                    borderColor: null,
                    minBorderMargin: 5,
                    clickable: true,
                    hoverable: true,
                    autoHighlight: true,
                    mouseActiveRadius: 20
                },
                series: {
                    lines: {
                        show: true,
                        fill: 0.5,
                        lineWidth: 2,
                        steps: false
                    },
                    points: {
                        show: false
                    }
                },
                yaxis: {
                    min: 0
                },
                xaxis: {
                    ticks: 11,
                    tickDecimals: 0
                },
                colors: Colors,
                shadowSize: 1,
                tooltip: true,
                //activate tooltip
                tooltipOpts: {
                    content: "%s : %y.0",
                    shifts: {
                        x: -30,
                        y: -50
                    },
                    defaultTheme: false
                }
            };
            $.plot($(".chart-line"), [{
                label: "Facebook Fans",
                data: dataCreate(18, 1),
                lines: {
                    fillColor: "#f3faff"
                }
            }, {
                label: "Twitter Followers",
                data: dataCreate(18, 1),
                lines: {
                    fillColor: "#fff8f7"
                }
            }], options);
        }
        if ($(".chart-donut").length) {
            $(function () {
                var options = {
                    series: {
                        pie: {
                            show: true,
                            innerRadius: 0.5,
                            highlight: {
                                opacity: 0.1
                            },
                            startAngle: 2,
                            border: 30 //darken the main color with 30
                        }
                    },
                    legend: {
                        show: true,
                        labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
                        margin: 50,
                        width: 20,
                        padding: 1
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "%s : %p.0" + "%",
                        shifts: {
                            x: -30,
                            y: -50
                        },
                        defaultTheme: false
                    }
                };
                var data = [{
                    label: "USA",
                    data: 38,
                    color: Colors[0]
                }, {
                    label: "Brazil",
                    data: 23,
                    color: Colors[1]
                }, {
                    label: "India",
                    data: 15,
                    color: Colors[2]
                }, {
                    label: "Turkey",
                    data: 9,
                    color: Colors[3]
                }, {
                    label: "France",
                    data: 7,
                    color: Colors[4]
                }, {
                    label: "China",
                    data: 5,
                    color: Colors[5]
                }, {
                    label: "Germany",
                    data: 3,
                    color: Colors[6]
                }];
                $.plot($(".chart-donut"), data, options);
            });
        }
        if ($(".chart-pie").length) {
            $(function () {
                var options = {
                    series: {
                        pie: {
                            show: true,
                            highlight: {
                                opacity: 0.1
                            },
                            radius: 1,
                            stroke: {
                                width: 2
                            },
                            startAngle: 2,
                            border: 30 //darken the main color with 30
                        }
                    },
                    legend: {
                        show: true,
                        labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
                        margin: 50,
                        width: 20,
                        padding: 1
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "%s : %p.0" + "%",
                        shifts: {
                            x: -30,
                            y: -50
                        },
                        defaultTheme: false
                    }
                };
                var data = [{
                    label: "USA",
                    data: 38,
                    color: Colors[0]
                }, {
                    label: "Brazil",
                    data: 23,
                    color: Colors[1]
                }, {
                    label: "India",
                    data: 15,
                    color: Colors[2]
                }, {
                    label: "Turkey",
                    data: 9,
                    color: Colors[3]
                }, {
                    label: "France",
                    data: 7,
                    color: Colors[4]
                }, {
                    label: "China",
                    data: 5,
                    color: Colors[5]
                }, {
                    label: "Germany",
                    data: 3,
                    color: Colors[6]
                }];
                $.plot($(".chart-pie"), data, options);
            });
        }
        if ($(".chart-bars-ordered").length) {
            $(function () {
                //generate some data
                var d1 = [];
                for (var i = 0; i <= 10; i += 1)
                    d1.push([i, parseInt(Math.random() * 30)]);
                var d2 = [];
                for (var i = 0; i <= 10; i += 1)
                    d2.push([i, parseInt(Math.random() * 30)]);
                var d3 = [];
                for (var i = 0; i <= 10; i += 1)
                    d3.push([i, parseInt(Math.random() * 30)]);
                var data = new Array();
                data.push({
                    label: "Data One",
                    data: d1,
                    bars: {
                        order: 1
                    }
                });
                data.push({
                    label: "Data Two",
                    data: d2,
                    bars: {
                        order: 2
                    }
                });
                data.push({
                    label: "Data Three",
                    data: d3,
                    bars: {
                        order: 3
                    }
                });
                var options = {
                    bars: {
                        show: true,
                        barWidth: 0.2,
                        fill: 1
                    },
                    grid: {
                        show: true,
                        aboveData: false,
                        color: "#3f3f3f",
                        labelMargin: 5,
                        axisMargin: 0,
                        borderWidth: 0,
                        borderColor: null,
                        minBorderMargin: 5,
                        clickable: true,
                        hoverable: true,
                        autoHighlight: false,
                        mouseActiveRadius: 20
                    },
                    colors: Colors,
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "Data&nbsp;" + "%x.0 : %y.0",
                        shifts: {
                            x: -30,
                            y: -50
                        }
                    }
                };
                $.plot($(".chart-bars-ordered"), data, options);
            });
        }
// Timeline Hiring
		if ($(".timelinechart-toggle").length) {
			
			var datasets = {
				  
				"Weekly": {
					label: "Weekly",
					data: [[61, 12000], [62, 500], [63, 600], [64, 3700], [65, 15800], [66, 2300]]
				},         
				"Monthly": {
					label: "Monthly",
					data: [[43, 40], [44, 100], [45, 200], [46, 1000], [47, 11100], [48, 1500], [49, 40], [50, 100], [51, 200], [52, 1000]]
				},        
				"Yearly": {
					label: "Yearly",
					data: [[2008, 700], [2009, 40], [2010, 7000], [2011, 1700], [2012, 15000], [2013, 14400], [2014, 9500], [2015, 5600], [2016, 800], [2017, 400]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
				//alert (JSON.stringify(datasets[0].term));   
			var i = 0;
			$.each(datasets, function(key, val) {
				//alert (JSON.stringify(val));  
				val.color = i;
				++i;
			});
	
			// insert checkboxes 
			var choiceContainer = $("#choices");
			var i2 = 0;
			$.each(datasets, function(key, val){
				choiceContainer.append("<div class='radioinline'><input type='radio' name='timeline' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
			});
			
			choiceContainer.find("input").click(function() {
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("id");
					if (key && datasets[key]) {
						data.push(datasets[key]);
					}
				});
	
				if (data.length > 0) {
					$.plot(".timelinechart-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0
						},
						xaxis: {
							ticks: [[1, 1],[2, 2],[3,3],[4,4],[5, 5],[6, 6],[7, 7],[8,8],[9,9],[10,10],[11,11],
							[12, 12],[13,13],[14,14],[15, 15],[16, 16],[17, 17],[18,18],[19,19],[20,10],
							[22, 22],[23,23],[24,24],[25, 25],[26, 26],[27, 27],[28,28],[29,29],[30,30],[31,31],
							[40,'Jan'],[41,'Feb'],[42,'Mar'],[43,'Apr'],[44,'May'],[45,'Jun'],[46,'Jul'],[47,'Aug'],[48,'Sep'],[49,'Oct'],[50,'Nov'],[51,'Dec'],
							[60,'4-Dec'],[61,'11-Dec'],[62,'18-Dec'],[63,'25-Dec'],[64,'1-Jan'],[65,'8-Jan'],
							[2008, 2008], [2009, 2009], [2010, 2010], [2011, 2011], [2012, 2012], [2013, 2013], [2014, 2014], [2015, 2015], [2016, 2016], [2017, 2017]]
							//ticks: 11,
							//tickDecimals: 0
						},
						colors: Colors,
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
	    }
// Transactions

if ($(".transactions-toggle").length) {
			
			var datasets = {
				  
				"Weekly": {
					label: "Weekly",
					data: [[61, 12000], [62, 500], [63, 600], [64, 3700], [65, 15800], [66, 2300]]
				},         
				"Monthly": {
					label: "Monthly",
					data: [[43, 40], [44, 100], [45, 300], [46, 1000], [47, 11100], [48, 1500], [49, 40], [50, 100], [51, 200], [52, 1000]]
				},        
				"Yearly": {
					label: "Yearly",
					data: [[2008, 700], [2009, 40], [2010, 7000], [2011, 1700], [2012, 6000], [2013, 14400], [2014, 100], [2015, 5600], [2016, 800], [2017, 400]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
				//alert (JSON.stringify(datasets[0].term));   
			var i = 0;
			$.each(datasets, function(key, val) {
				//alert (JSON.stringify(val));  
				val.color = i;
				++i;
			});
			// insert checkboxes 
			var choiceContainer = $("#transchoices");
			var i2 = 0;
			$.each(datasets, function(key, val){
				if(key == 'Daily'){
					choiceContainer.append("<div class='radioinline'><input type='radio' name='trans' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
				}else{
					choiceContainer.append("<div class='radioinline'><input type='radio' name='trans' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");	
				}
			});
			
			choiceContainer.find("input").click(function() {
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("id");
					if (key && datasets[key]) {
						data.push(datasets[key]);
					}
				});
	
				if (data.length > 0) {
					$.plot(".transactions-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0
						},
						xaxis: {
							ticks: [[1, 1],[2, 2],[3,3],[4,4],[5, 5],[6, 6],[7, 7],[8,8],[9,9],[10,10],[11,11],
							[12, 12],[13,13],[14,14],[15, 15],[16, 16],[17, 17],[18,18],[19,19],[20,10],
							[22, 22],[23,23],[24,24],[25, 25],[26, 26],[27, 27],[28,28],[29,29],[30,30],[31,31],
							[40,'Jan'],[41,'Feb'],[42,'Mar'],[43,'Apr'],[44,'May'],[45,'Jun'],[46,'Jul'],[47,'Aug'],[48,'Sep'],[49,'Oct'],[50,'Nov'],[51,'Dec'],
							[60,'4-Dec'],[61,'11-Dec'],[62,'18-Dec'],[63,'25-Dec'],[64,'1-Jan'],[65,'8-Jan'],
							[2008, 2008], [2009, 2009], [2010, 2010], [2011, 2011], [2012, 2012], [2013, 2013], [2014, 2014], [2015, 2015], [2016, 2016], [2017, 2017]]
							//ticks: 11,
							//tickDecimals: 0
						},
						colors: ["red", "#ff0055", "#008ae6", "#DF656A"],
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
	    }
// Admin candidate

if ($(".admin_candidate-toggle").length) {
			
			var datasets = {
				  
				"Weekly": {
					label: "Weekly",
					data: [[61, 12000], [62, 500], [63, 600], [64, 200], [65, 2800], [66, 22300]]
				},         
				"Monthly": {
					label: "Monthly",
					data: [[43, 40], [44, 100], [45, 1300], [46, 1000], [47, 500], [48, 1500], [49, 40], [50, 100], [51, 23200], [52, 1000]]
				},        
				"Yearly": {
					label: "Yearly",
					data: [[2008, 11700], [2009, 40], [2010, 7000], [2011, 1700], [2012, 220], [2013, 400], [2014, 100], [2015, 600], [2016, 800], [2017, 400]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
				//alert (JSON.stringify(datasets[0].term));   
			var i = 0;
			$.each(datasets, function(key, val) {
				//alert (JSON.stringify(val));  
				val.color = i;
				++i;
			});
			// insert checkboxes 
			var choiceContainer = $("#admin_candidatechoices");
			var i2 = 0;
			$.each(datasets, function(key, val){
				if(key == 'Daily'){
					choiceContainer.append("<div class='radioinline'><input type='radio' name='timeline' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
				}else{
					choiceContainer.append("<div class='radioinline'><input type='radio' name='timeline' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");	
				}
			});
			
			choiceContainer.find("input").click(function() {
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("id");
					if (key && datasets[key]) {
						data.push(datasets[key]);
					}
				});
	
				if (data.length > 0) {
					$.plot(".admin_candidate-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0
						},
						xaxis: {
							ticks: [[1, 1],[2, 2],[3,3],[4,4],[5, 5],[6, 6],[7, 7],[8,8],[9,9],[10,10],[11,11],
							[12, 12],[13,13],[14,14],[15, 15],[16, 16],[17, 17],[18,18],[19,19],[20,10],
							[22, 22],[23,23],[24,24],[25, 25],[26, 26],[27, 27],[28,28],[29,29],[30,30],[31,31],
							[40,'Jan'],[41,'Feb'],[42,'Mar'],[43,'Apr'],[44,'May'],[45,'Jun'],[46,'Jul'],[47,'Aug'],[48,'Sep'],[49,'Oct'],[50,'Nov'],[51,'Dec'],
							[60,'4-Dec'],[61,'11-Dec'],[62,'18-Dec'],[63,'25-Dec'],[64,'1-Jan'],[65,'8-Jan'],
							[2008, 2008], [2009, 2009], [2010, 2010], [2011, 2011], [2012, 2012], [2013, 2013], [2014, 2014], [2015, 2015], [2016, 2016], [2017, 2017]]
							//ticks: 11,
							//tickDecimals: 0
						},
						colors: ["#DF656A", "#008ae6", "#ffff00", "#ff0055"],
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
	    }
	      
// client home charts
	    
		if ($(".companies-toggle").length) {
			
			var datasets = {
				   
				"Weekly": {
					label: "Weekly",
					data: [[61, 1000], [62, 5500], [63, 600], [64, 300], [65, 15800], [66, 200]]
				},         
				"Monthly": {
					label: "Monthly",
					data: [[43, 40], [44, 100], [45, 200], [46, 500], [47, 100], [48, 11500], [49, 40], [50, 100], [51, 2000], [52, 1000]]
				},        
				"Yearly": {
					label: "Yearly",
					data: [[2008, 700], [2009, 40], [2010, 7000], [2011, 1700], [2012, 15000], [2013, 4400], [2014, 9500], [2015, 5600], [2016, 800], [2017, 14400]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
				//alert (JSON.stringify(datasets[0].term));   
			var i = 0;
			$.each(datasets, function(key, val) {
				//alert (key);  
				val.color = i;
				++i;
			});
	
			// insert checkboxes 
			var choiceContainer = $("#companieschoices");
			var i2 = 0;
			$.each(datasets, function(key, val){
				if(key == 'Daily'){
					choiceContainer.append("<div class='radioinline'><input type='radio' name='companies' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
				}else{
					choiceContainer.append("<div class='radioinline'><input type='radio' name='companies' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");	
				}		
			});
			
			choiceContainer.find("input").click(function() {
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("id");
//					alert(key);
					if (key && datasets[key]) {
						data.push(datasets[key]);						
					}
				});
	
				if (data.length > 0) {
					$.plot(".companies-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0,							
							max: 50							
						},
						xaxis: {
							ticks: [[1, 1],[2, 2],[3,3],[4,4],[5, 5],[6, 6],[7, 7],[8,8],[9,9],[10,10],[11,11],
							[12, 12],[13,13],[14,14],[15, 15],[16, 16],[17, 17],[18,18],[19,19],[20,10],
							[22, 22],[23,23],[24,24],[25, 25],[26, 26],[27, 27],[28,28],[29,29],[30,30],[31,31],
							[40,'Jan'],[41,'Feb'],[42,'Mar'],[43,'Apr'],[44,'May'],[45,'Jun'],[46,'Jul'],[47,'Aug'],[48,'Sep'],[49,'Oct'],[50,'Nov'],[51,'Dec'],
							[60,'4-Dec'],[61,'11-Dec'],[62,'18-Dec'],[63,'25-Dec'],[64,'1-Jan'],[65,'8-Jan'],
							[2008, 2008], [2009, 2009], [2010, 2010], [2011, 2011], [2012, 2012], [2013, 2013], [2014, 2014], [2015, 2015], [2016, 2016], [2017, 2017]]
							//ticks: 11,
							//tickDecimals: 0
						},
						colors: ["#DF656A", "#ff0055", "#ffff00", "#008ae6"],
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
			
	    } 
if ($(".accessed-toggle").length) {
			
			var datasets = {
				  
				"Weekly": {
					label: "Weekly",
					data: [[61, 12000], [62, 500], [63, 600], [64, 3700], [65, 15800], [66, 2300]]
				},         
				"Monthly": {
					label: "Monthly",
					data: [[43, 40], [44, 100], [45, 200], [46, 1000], [47, 11100], [48, 1500], [49, 40], [50, 100], [51, 200], [52, 1000]]
				},        
				"Yearly": {
					label: "Yearly",
					data: [[2008, 700], [2009, 40], [2010, 7000], [2011, 1700], [2012, 15000], [2013, 14400], [2014, 9500], [2015, 5600], [2016, 800], [2017, 400]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
				//alert (JSON.stringify(datasets[0].term));   
			var i = 0;
			$.each(datasets, function(key, val) {
				//alert (JSON.stringify(val));  
				val.color = i;
				++i;
			});
	
			// insert checkboxes 
			var choiceContainer = $("#accessedchoices");
			var i2 = 0;
			$.each(datasets, function(key, val){
				if(key == 'Monthly'){
					choiceContainer.append("<div class='radioinline'><input type='radio' name='accessedchoices' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
				}else{
					choiceContainer.append("<div class='radioinline'><input type='radio' name='accessedchoices' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");	
				}
			});
			
			choiceContainer.find("input").click(function() {
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("id");
					if (key && datasets[key]) {
						data.push(datasets[key]);
					}
				});
	
				if (data.length > 0) {
					$.plot(".accessed-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0,
							max: 100
						},
						xaxis: {
							ticks: [[1, 1],[2, 2],[3,3],[4,4],[5, 5],[6, 6],[7, 7],[8,8],[9,9],[10,10],[11,11],
							[12, 12],[13,13],[14,14],[15, 15],[16, 16],[17, 17],[18,18],[19,19],[20,10],
							[22, 22],[23,23],[24,24],[25, 25],[26, 26],[27, 27],[28,28],[29,29],[30,30],[31,31],
							[40,'Jan'],[41,'Feb'],[42,'Mar'],[43,'Apr'],[44,'May'],[45,'Jun'],[46,'Jul'],[47,'Aug'],[48,'Sep'],[49,'Oct'],[50,'Nov'],[51,'Dec'],
							[60,'4-Dec'],[61,'11-Dec'],[62,'18-Dec'],[63,'25-Dec'],[64,'1-Jan'],[65,'8-Jan'],
							[2008, 2008], [2009, 2009], [2010, 2010], [2011, 2011], [2012, 2012], [2013, 2013], [2014, 2014], [2015, 2015], [2016, 2016], [2017, 2017]]
							//ticks: 11,
							//tickDecimals: 0
						},
						colors: ["#00cccc", "#ff00bf", "#e62e00", "#ffff00"],
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
	    }
	
if ($(".questions-toggle").length) {
			
			var datasets = {
				  
				"Weekly": {
					label: "Weekly",
					data: [[61, 12000], [62, 500], [63, 600], [64, 3700], [65, 15800], [66, 2300]]
				},         
				"Monthly": {
					label: "Monthly",
					data: [[43, 40], [44, 1000], [45, 200], [46, 13000], [47, 100], [48, 1500], [49, 40], [50, 100], [51, 1200], [52, 1000]]
				},        
				"Yearly": {
					label: "Yearly",
					data: [[2008, 700], [2009, 40], [2010, 1200], [2011, 700], [2012, 15000], [2013, 400], [2014, 9500], [2015, 5600], [2016, 800], [2017, 400]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
				//alert (JSON.stringify(datasets[0].term));   
			var i = 0;
			$.each(datasets, function(key, val) {
				//alert (JSON.stringify(val));  
				val.color = i;
				++i;
			});
	
			// insert checkboxes 
			var choiceContainer = $("#questionschoices");
			var i2 = 0;
			$.each(datasets, function(key, val){
				if(key == 'Daily'){
					choiceContainer.append("<div class='radioinline'><input type='radio' name='questionschoices' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
				}else{
					choiceContainer.append("<div class='radioinline'><input type='radio' name='questionschoices' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");	
				}
			});
			
			choiceContainer.find("input").click(function() {
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("id");
					if (key && datasets[key]) {
						data.push(datasets[key]);
					}
				});
	
				if (data.length > 0) {
					$.plot(".questions-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0
						},
						xaxis: {
							ticks: [[1, 1],[2, 2],[3,3],[4,4],[5, 5],[6, 6],[7, 7],[8,8],[9,9],[10,10],[11,11],
							[12, 12],[13,13],[14,14],[15, 15],[16, 16],[17, 17],[18,18],[19,19],[20,10],
							[22, 22],[23,23],[24,24],[25, 25],[26, 26],[27, 27],[28,28],[29,29],[30,30],[31,31],
							[40,'Jan'],[41,'Feb'],[42,'Mar'],[43,'Apr'],[44,'May'],[45,'Jun'],[46,'Jul'],[47,'Aug'],[48,'Sep'],[49,'Oct'],[50,'Nov'],[51,'Dec'],
							[60,'4-Dec'],[61,'11-Dec'],[62,'18-Dec'],[63,'25-Dec'],[64,'1-Jan'],[65,'8-Jan'],
							[2008, 2008], [2009, 2009], [2010, 2010], [2011, 2011], [2012, 2012], [2013, 2013], [2014, 2014], [2015, 2015], [2016, 2016], [2017, 2017]]
							//ticks: 11,
							//tickDecimals: 0
						},
						colors: ["#888844", "#00b3b3", "#ff5500", "#00b3b3 #bf00ff"],
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
	    }	
	    
	  /*  if ($(".drives-toggle").length) {
			
			var datasets = {
				"Daily": {
					label: "Daily",
					data: [[6, 8000], [7, 40], [8, 2000], [9, 3400],[10, 40], [11, 8000], [12, 40], [13, 400], [14, 3400],
					[15, 40], [16, 8000], [17, 40], [18, 1000], [19, 3400], [20, 40], [21, 8000], [22, 40], [23, 8000], [24, 3400], 
					[25, 40], [26, 8000], [27, 40], [28, 8000], [29, 3400], [30, 1600], [31, 9100], [1, 43500], [2, 4000], [3, 2000], [4, 800], [5, 600]]
				},   
				"Weekly": {
					label: "Weekly",
					data: [[61, 12000], [62, 500], [63, 1200], [64, 3700], [65, 800], [66, 2300]]
				},         
				"Monthly": {
					label: "Monthly",
					data: [[43, 40], [44, 100], [45, 100], [46, 1000], [47, 18100], [48, 1500], [49, 40], [50, 100], [51, 200], [52, 200]]
				},        
				"Yearly": {
					label: "Yearly",
					data: [[2008, 13300], [2009, 40], [2010, 200], [2011, 1700], [2012, 200], [2013, 14400], [2014, 500], [2015, 500], [2016, 800], [2017, 400]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
			var i = 0;
			$.each(datasets, function(key, val) {
				val.color = i;
				++i;
			});
	
			// insert checkboxes 
			var choiceContainer = $("#driveschoices");
			var i2 = 0;
			$.each(datasets, function(key, val){
				choiceContainer.append("<div class='radioinline'><input type='radio' name='driveschoices' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
			});
			
			choiceContainer.find("input").click(function() {
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("id");
					//alert(key);
					if (key && datasets[key]) {
						data.push(datasets[key]);
					}
				});
	
				if (data.length > 0) {
					$.plot(".drives-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0
						},
						xaxis: {
							ticks: [[1, 1],[2, 2],[3,3],[4,4],[5, 5],[6, 6],[7, 7],[8,8],[9,9],[10,10],[11,11],
							[12, 12],[13,13],[14,14],[15, 15],[16, 16],[17, 17],[18,18],[19,19],[20,10],
							[22, 22],[23,23],[24,24],[25, 25],[26, 26],[27, 27],[28,28],[29,29],[30,30],[31,31],
							[40,'Jan'],[41,'Feb'],[42,'Mar'],[43,'Apr'],[44,'May'],[45,'Jun'],[46,'Jul'],[47,'Aug'],[48,'Sep'],[49,'Oct'],[50,'Nov'],[51,'Dec'],
							[60,'4-Dec'],[61,'11-Dec'],[62,'18-Dec'],[63,'25-Dec'],[64,'1-Jan'],[65,'8-Jan'],
							[2008, 2008], [2009, 2009], [2010, 2010], [2011, 2011], [2012, 2012], [2013, 2013], [2014, 2014], [2015, 2015], [2016, 2016], [2017, 2017]]
							//ticks: 11,
							//tickDecimals: 0
						},
						colors: ["#00ff00", "#00e699", "#3377ff", "#ff1ac6"],
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
	    }*/
	    				
   if ($(".clidriveschart-pie").length) {
            $(function () {
                var options = {
                    series: {
                        pie: {
                            show: true,
                            highlight: {
                                opacity: 0.1
                            },
                            radius: 1,
                            stroke: {
                                width: 2
                            },
                            startAngle: 2,
                            border: 30 //darken the main color with 30
                        }
                    },
                    legend: {
                        show: true,
                        labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
                        margin: 50,
                        width: 20,
                        padding: 1
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "%s : %p.0" + "%",
                        shifts: {
                            x: -30,
                            y: -50
                        },
                        defaultTheme: false
                    }
                };
                var data = [{
                    label: "Logical Reasoning",
                    data: 38,
                    color: Colors[0]
                }, {
                    label: "Tech Questions",
                    data: 25,
                    color: Colors[1]
                }, {
                    label: "Aptitude",
                    data: 37,
                    color: Colors[2]
                }];
                $.plot($(".clidriveschart-pie"), data, options);
            });
        }

// client home ends
	    
// for admin home 

if ($(".adcompanies-toggle").length) {
			
			var datasets = {
				   
				"comWeekly": {
					label: "Weekly",
					data: [[61, 10000], [62, 300], [63, 400], [64, 47], [65, 12], [66, 28]]
				},         
				"comMonthly": {
					label: "Monthly",
					data: [[43, 40], [44, 100], [45, 20], [46, 100], [47, 51], [48, 12], [49, 40], [50, 100], [51, 20], [52, 10]]
				},        
				"comYearly": {
					label: "Yearly",
					data: [[2008, 100], [2009, 14], [2010, 70], [2011, 12], [2012, 51], [2013, 40], [2014, 15], [2015, 56], [2016, 80], [2017, 40]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
				//alert (JSON.stringify(datasets[0].term));   
			var i = 0;
			$.each(datasets, function(key, val) {
				//alert (key);  
				val.color = i;
				++i;
			});
	
			// insert checkboxes 
			var choiceContainer = $("#adcompanieschoices");
			var i2 = 0;
			$.each(datasets, function(key, val){
				if(key == 'comMonthly'){
					choiceContainer.append("<div class='radioinline'><input type='radio' name='companieschoices' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
				}else{
					choiceContainer.append("<div class='radioinline'><input type='radio' name='companieschoices' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");	
				}			
			});
			
			choiceContainer.find("input").click(function(){
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("id");
//					alert(key);
					if (key && datasets[key]) {
						data.push(datasets[key]);						
					}
				});
	
				if (data.length > 0) {
					$.plot(".adcompanies-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0,
							max: 100
						},
						xaxis: {
							ticks: [[1, 1],[2, 2],[3,3],[4,4],[5, 5],[6, 6],[7, 7],[8,8],[9,9],[10,10],[11,11],
							[12, 12],[13,13],[14,14],[15, 15],[16, 16],[17, 17],[18,18],[19,19],[20,10],
							[22, 22],[23,23],[24,24],[25, 25],[26, 26],[27, 27],[28,28],[29,29],[30,30],[31,31],
							[40,'Jan'],[41,'Feb'],[42,'Mar'],[43,'Apr'],[44,'May'],[45,'Jun'],[46,'Jul'],[47,'Aug'],[48,'Sep'],[49,'Oct'],[50,'Nov'],[51,'Dec'],
							[60,'4-Dec'],[61,'11-Dec'],[62,'18-Dec'],[63,'25-Dec'],[64,'1-Jan'],[65,'8-Jan'],
							[2008, 2008], [2009, 2009], [2010, 2010], [2011, 2011], [2012, 2012], [2013, 2013], [2014, 2014], [2015, 2015], [2016, 2016], [2017, 2017]]
							//ticks: 11,
							//tickDecimals: 0
						},
						colors: ["#00ff00", "#00e699", "#3377ff", "#ff1ac6"],
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
			
	    } 
if ($(".adaccessed-toggle").length) {
			
			var datasets = {
				   
				"accWeekly": {
					label: "Weekly",
					data: [[61, 100], [62, 50], [63, 30], [64, 37], [65, 10], [66, 18]]
				},         
				"accMonthly": {
					label: "Monthly",
					data: [[43, 40], [44, 10], [45, 10], [46, 14], [47, 10], [48, 15], [49, 40], [50, 30], [51, 20], [52, 90]]
				},        
				"accYearly": {
					label: "Yearly",
					data: [[2008, 27], [2009, 40], [2010, 40], [2011, 17], [2012, 30], [2013, 10], [2014, 95], [2015, 27], [2016, 14], [2017, 40]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
				//alert (JSON.stringify(datasets[0].term));   
			var i = 0;
			$.each(datasets, function(key, val) {
				//alert (JSON.stringify(val));  
				val.color = i;
				++i;
			});
	
			// insert checkboxes 
			var choiceContainer = $("#adaccessedchoices");
			var i2 = 0;			
			$.each(datasets, function(key, val){
				if(key == 'accMonthly'){
					choiceContainer.append("<div class='radioinline'><input type='radio' name='accessedchoices' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
				}else{
					choiceContainer.append("<div class='radioinline'><input type='radio' name='accessedchoices' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");	
				}
			});

			
			choiceContainer.find("input").click(function() {
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("id");
					if (key && datasets[key]) {
						data.push(datasets[key]);
					}
				});
	
				if (data.length > 0) {
					$.plot(".adaccessed-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0,
							max: 100
						},
						xaxis: {
							ticks: [[1, 1],[2, 2],[3,3],[4,4],[5, 5],[6, 6],[7, 7],[8,8],[9,9],[10,10],[11,11],
							[12, 12],[13,13],[14,14],[15, 15],[16, 16],[17, 17],[18,18],[19,19],[20,10],
							[22, 22],[23,23],[24,24],[25, 25],[26, 26],[27, 27],[28,28],[29,29],[30,30],[31,31],
							[40,'Jan'],[41,'Feb'],[42,'Mar'],[43,'Apr'],[44,'May'],[45,'Jun'],[46,'Jul'],[47,'Aug'],[48,'Sep'],[49,'Oct'],[50,'Nov'],[51,'Dec'],
							[60,'4-Dec'],[61,'11-Dec'],[62,'18-Dec'],[63,'25-Dec'],[64,'1-Jan'],[65,'8-Jan'],
							[2008, 2008], [2009, 2009], [2010, 2010], [2011, 2011], [2012, 2012], [2013, 2013], [2014, 2014], [2015, 2015], [2016, 2016], [2017, 2017]]
							//ticks: 11,
							//tickDecimals: 0
						},
						colors: ["#888844", "#00b3b3", "#ff5500", "#00b3b3 #bf00ff"],
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
	    }
	
if ($(".adquestions-toggle").length) {
			
			var datasets = {
				  
				"queWeekly": {
					label: "Weekly",
					data: [[61, 12000], [62, 500], [63, 600], [64, 3700], [65, 15800], [66, 2300]]
				},         
				"queMonthly": {
					label: "Monthly",
					data: [[43, 40], [44, 100], [45, 200], [46, 1000], [47, 11100], [48, 1500], [49, 40], [50, 100], [51, 200], [52, 1000]]
				},        
				"queYearly": {
					label: "Yearly",
					data: [[2008, 700], [2009, 40], [2010, 7000], [2011, 1700], [2012, 15000], [2013, 14400], [2014, 9500], [2015, 13400], [2016, 800], [2017, 400]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
				//alert (JSON.stringify(datasets[0].term));   
			var i = 0;
			$.each(datasets, function(key, val) {
				//alert (JSON.stringify(val));  
				val.color = i;
				++i;
			});
	
			// insert checkboxes 
			var choiceContainer = $("#adquestionschoices");
			var i2 = 0;
			$.each(datasets, function(key, val){
				if(key == 'queMonthly'){
					choiceContainer.append("<div class='radioinline'><input type='radio' name='questionschoices' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
				}else{
					choiceContainer.append("<div class='radioinline'><input type='radio' name='questionschoices' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");	
				}
			});
			
			choiceContainer.find("input").click(function() {
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("id");
					if (key && datasets[key]) {
						data.push(datasets[key]);
					}
				});
	
				if (data.length > 0) {
					$.plot(".adquestions-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0
						},
						xaxis: {
							ticks: [[1, 1],[2, 2],[3,3],[4,4],[5, 5],[6, 6],[7, 7],[8,8],[9,9],[10,10],[11,11],
							[12, 12],[13,13],[14,14],[15, 15],[16, 16],[17, 17],[18,18],[19,19],[20,10],
							[22, 22],[23,23],[24,24],[25, 25],[26, 26],[27, 27],[28,28],[29,29],[30,30],[31,31],
							[40,'Jan'],[41,'Feb'],[42,'Mar'],[43,'Apr'],[44,'May'],[45,'Jun'],[46,'Jul'],[47,'Aug'],[48,'Sep'],[49,'Oct'],[50,'Nov'],[51,'Dec'],
							[60,'4-Dec'],[61,'11-Dec'],[62,'18-Dec'],[63,'25-Dec'],[64,'1-Jan'],[65,'8-Jan'],
							[2008, 2008], [2009, 2009], [2010, 2010], [2011, 2011], [2012, 2012], [2013, 2013], [2014, 2014], [2015, 2015], [2016, 2016], [2017, 2017]]
							//ticks: 11,
							//tickDecimals: 0
						},
						colors: ["#00cccc", "#ff00bf", "#e62e00", "#ffff00"],
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
	    }	



/*
	    if ($(".addrives-toggle").length) {
			
			var datasets = {
				"Daily": {
					label: "Daily",
					data: [[6, 4000], [7, 40], [8, 2200], [9, 3400],[10, 40], [11, 5000], [12, 40], [13, 8000], [14, 3400],
					[15, 40], [16, 8000], [17, 40], [18, 3400], [19, 3400], [20, 40], [21, 1000], [22, 40], [23, 2200], [24, 3400], 
					[25, 40], [26, 8000], [27, 40], [28, 300], [29, 3400], [30, 3000], [31, 9100], [1, 43500], [2, 11000], [3, 2000], [4, 800], [5, 600]]
				},   
				"Weekly": {
					label: "Weekly",
					data: [[61, 12500], [62, 500], [63, 600], [64, 1700], [65, 4800], [66, 2300]]
				},         
				"Monthly": {
					label: "Monthly",
					data: [[43, 40], [44, 100], [45, 200], [46, 1000], [47, 10100], [48, 1500], [49, 40], [50, 100], [51, 200], [52, 1000]]
				},        
				"Yearly": {
					label: "Yearly",
					data: [[2008, 700], [2009, 400], [2010, 7000], [2011, 300], [2012, 6000], [2013, 40], [2014, 9500], [2015, 5600], [2016, 800], [2017, 400]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
			var i = 0;
			$.each(datasets, function(key, val) {
				val.color = i;
				++i;
			});
	
			// insert checkboxes 
			var choiceContainer = $("#addriveschoices");
			var i2 = 0;
			$.each(datasets, function(key, val){
				choiceContainer.append("<div class='radioinline'><input type='radio' name='driveschoices' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
			});
			
			choiceContainer.find("input").click(function() {
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("id");
					//alert(key);
					if (key && datasets[key]) {
						data.push(datasets[key]);
					}
				})
	if (data.length > 0) {
					$.plot(".addrives-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0
						},
						xaxis: {
							ticks: [[1, 1],[2, 2],[3,3],[4,4],[5, 5],[6, 6],[7, 7],[8,8],[9,9],[10,10],[11,11],
							[12, 12],[13,13],[14,14],[15, 15],[16, 16],[17, 17],[18,18],[19,19],[20,10],
							[22, 22],[23,23],[24,24],[25, 25],[26, 26],[27, 27],[28,28],[29,29],[30,30],[31,31],
							[40,'Jan'],[41,'Feb'],[42,'Mar'],[43,'Apr'],[44,'May'],[45,'Jun'],[46,'Jul'],[47,'Aug'],[48,'Sep'],[49,'Oct'],[50,'Nov'],[51,'Dec'],
							[60,'4-Dec'],[61,'11-Dec'],[62,'18-Dec'],[63,'25-Dec'],[64,'1-Jan'],[65,'8-Jan'],
							[2008, 2008], [2009, 2009], [2010, 2010], [2011, 2011], [2012, 2012], [2013, 2013], [2014, 2014], [2015, 2015], [2016, 2016], [2017, 2017]]
							//ticks: 11,
							//tickDecimals: 0
						},
						colors: ["#DF656A", "#ff0055", "#ffff00", "#008ae6"],
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
	    }			*/	
	
	// admin home end
			
	// Campus Drives pie chart			
				
   if ($(".addriveschart-pie").length) {
            $(function () {
                var options = {
                    series: {
                        pie: {
                            show: true,
                            highlight: {
                                opacity: 0.1
                            },
                            radius: 1,
                            stroke: {
                                width: 2
                            },
                            startAngle: 2,
                            border: 30 //darken the main color with 30
                        }
                    },
                    legend: {
                        show: false,
                        labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
                        margin: 50,
                        width: 20,
                        padding: 1
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "%s : %p.0" + "%",
                        shifts: {
                            x: -30,
                            y: -50
                        },
                        defaultTheme: false
                    }
                };
                var data = [{
                    label: "Stress Management",
                    data: 38,
                    color: Colors[0]
                }, {
                    label: "Discipline",
                    data: 25,
                    color: Colors[1]
                }, {
                    label: "Mentoring",
                    data: 37,
                    color: Colors[2]
                }
				, {
                    label: "LEARNING AGILITY",
                    data: 37,
                    color: Colors[3]
                }
				, {
                    label: "INTERPERSONAL RELATIONSHIP",
                    data: 37,
                    color: Colors[4]
                }
				
				];
                $.plot($(".addriveschart-pie"), data, options);
            });
        }

//Online tests

     if ($(".adonlinetest-pie").length) {
            $(function () {
                var options = {
                    series: {
                        pie: {
                            show: true,
                            highlight: {
                                opacity: 0.1
                            },
                            radius: 1,
                            stroke: {
                                width: 2
                            },
								labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
          					radius: 2/3,
                            startAngle: 2,
                            border: 30 //darken the main color with 30
                        }
                    },
                    legend: {
                        show: false,
                     
                        /*labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
                        margin: 50,
                        width: 20,
                        padding: 1*/
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "%s : %p.0" + "%",
                        shifts: {
                            x: -30,
                            y: -50
                        },
                        defaultTheme: true
                    }
//                     tooltipTemplate: "<%= value %>",    
                };
                var data = [{
                    label: "Technical (200)",
                    data: 200,
                    color: 'red'
                }, {
                    label: "Analytical (300)",
                    data: 300,
                    color: 'blue'
                }, {
                    label: "logical (600)",
                    data: 600,
                    color: 'green'
                }, {
                    label: "Verbal (800)",
                    data: 800,
                    color: 'orange'
                }];
                $.plot($(".adonlinetest-pie"), data, options);

            });
        }     

//Online tests end

// Assessment pie charts
// score
  if ($(".scorechart-pie").length) {
            $(function () {
                var options = {
                    series: {
                        pie: {
                            show: true,
                            highlight: {
                                opacity: 0.1
                            },
                            radius: 1,
                            stroke: {
                                width: 2
                            },
								labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
          					radius: 2/3,
                            startAngle: 2,
                            border: 30 //darken the main color with 30
                        }
                    },
                    legend: {
                        show: false,
                     
                        /*labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
                        margin: 50,
                        width: 20,
                        padding: 1*/
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "%s : %p.0" + "%",
                        shifts: {
                            x: -30,
                            y: -50
                        },
                        defaultTheme: true
                    }
//                     tooltipTemplate: "<%= value %>",    
                };
                var data = [{
                    label: "30 - 50%",
                    data: 20,
                    color: 'red'
                }, {
                    label: "50 - 70%",
                    data: 50,
                    color: 'blue'
                }, {
                    label: ">80%",
                    data: 30,
                    color: 'green'
                }];
                $.plot($(".scorechart-pie"), data, options);

            });
        }
           
  // Gender
   if ($(".genderchart-pie").length) {
            $(function () {
                var options = {
                    series: {
                        pie: {
                            show: true,
                            highlight: {
                                opacity: 0.1
                            },
                            radius: 1,
                            stroke: {
                                width: 2
                            },
								labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
          					radius: 2/3,
                            startAngle: 2,
                            border: 30 //darken the main color with 30
                        }
                    },
                    legend: {
                        show: false,
                     
                        /*labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
                        margin: 50,
                        width: 20,
                        padding: 1*/
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "%s : %p.0" + "%",
                        shifts: {
                            x: -30,
                            y: -50
                        },
                        defaultTheme: true
                    }
//                     tooltipTemplate: "<%= value %>",    
                };
                var data = [{
                    label: "Male",
                    data: 40,
                    color: '#00b8e6'
                }, {
                    label: "Female",
                    data: 60,
                    color: '#ff1a8c'
                }];
                $.plot($(".genderchart-pie"), data, options);

            });
        }   

  // Location
   if ($(".locationchart-pie").length) {
            $(function () {
                var options = {
                    series: {
                        pie: {
                            show: true,
                            highlight: {
                                opacity: 0.1
                            },
                            radius: 1,
                            stroke: {
                                width: 2
                            },
								labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
          					radius: 2/3,
                            startAngle: 2,
                            border: 30 //darken the main color with 30
                        }
                    },
                    legend: {
                        show: false,
                     
                        /*labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
                        margin: 50,
                        width: 20,
                        padding: 1*/
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "%s : %p.0" + "%",
                        shifts: {
                            x: -30,
                            y: -50
                        },
                        defaultTheme: true
                    }
//                     tooltipTemplate: "<%= value %>",    
                };
                var data = [{
                    label: "Bangalore",
                    data: 20,
                    color: ' #267326'
                }, {
                    label: "Pune",
                    data: 30,
                    color: '#e68a00'
                }, {
                    label: "Hyderabad",
                    data: 25,
                    color: '#ac00e6'
                }, {
                    label: "Chennai",
                    data: 15,
                    color: '#0000e6'
                }];
                $.plot($(".locationchart-pie"), data, options);

            });
        }               
     // Age
   if ($(".agechart-pie").length) {
            $(function () {
                var options = {
                    series: {
                        pie: {
                            show: true,
                            highlight: {
                                opacity: 0.1
                            },
                            radius: 1,
                            stroke: {
                                width: 2
                            },
								labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
          					radius: 2/3,
                            startAngle: 2,
                            border: 30 //darken the main color with 30
                        }
                    },
                    legend: {
                        show: false,
                     
                        /*labelFormatter: function (label, series) {
                            // series is the series object for the label
                            return '<a href="#' + label + '">' + label + '</a>';
                        },
                        margin: 50,
                        width: 20,
                        padding: 1*/
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "%s : %p.0" + "%",
                        shifts: {
                            x: -30,
                            y: -50
                        },
                        defaultTheme: true
                    }
//                     tooltipTemplate: "<%= value %>",    
                };
                var data = [{
                    label: "18 - 25",
                    data: 50,
                    color: '#e6004c'
                }, {
                    label: "25 - 35",
                    data: 30,
                    color: '#008ae6'
                }, {
                    label: "35 - 50",
                    data: 20,
                    color: '#ff8000'
                }];
                $.plot($(".agechart-pie"), data, options);

            });
        }         
        // Assessment pie charts end
	    
	    
		 if ($(".chart-toggle").length) {
			
			var datasets = {
				"Facebook": {
					label: "Facebook",
					data: [[6, 8000], [7, 40], [8, 8000], [9, 3400],[10, 40], [11, 8000], [12, 40], [13, 8000], [14, 3400],
					[15, 40], [16, 8000], [17, 40], [18, 8000], [19, 3400], [20, 40], [21, 8000], [22, 40], [23, 8000], [24, 3400], 
					[25, 40], [26, 8000], [27, 40], [28, 8000], [29, 3400], [30, 6000], [31, 9100], [1, 43500], [2, 16000], [3, 2000], [4, 800], [5, 600]]
				},   
				"Twitter": {
					label: "Twitter",
					data: [[4, 12000], [11, 500], [18, 600], [25, 3700], [1, 15800], [8, 2300]]
				},         
				"Pinterest": {
					label: "Pinterest",
					data: [[4, 12000], [11, 500], [18, 600], [25, 3700], [1, 15800], [8, 2300]]
				},        
				"Linkedin": {
					label: "Linkedin",
					data: [[1, 40], [2, 7000], [3, 1700], [4, 15000], [5, 14400], [6, 9500], [7, 5600], [8, 700], [9, 800], [10, 400]]
				},           
			
			};
	
			// hard-code color indices to prevent them from shifting as
			// countries are turned on/off
			var i = 0;
			$.each(datasets, function(key, val) {
				val.color = i;
				++i;
			});
	
			// insert checkboxes 
			var choiceContainer = $("#choices");
			var i2 = 0;
			$.each(datasets, function(key, val) {
				choiceContainer.append("<div class='cBox cBox-inline'><input type='checkbox' name='" + key + "' checked='checked' id='" + key + "'/> <label for='" + key + "'>" + val.label + "</label></div>");
			});
			
			choiceContainer.find("input").click(function() {
				plotAccordingToChoices();
			});
			
			var plotAccordingToChoices = function() {
				var data = [];
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("name");
					if (key && datasets[key]) {
						data.push(datasets[key]);
					}
				});
	
				if (data.length > 0) {
					$.plot(".chart-toggle", data, {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 5,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 20
						},
						series: {
							lines: {
								show: true,
								fill: 0.5,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: false
							}
						},
						yaxis: {
							min: 0
						},
						xaxis: {
							ticks: 11,
							tickDecimals: 0
						},
						colors: Colors,
						shadowSize: 1,
						tooltip: true,
						//activate tooltip
						tooltipOpts: {
							content: "%s : %y.0",
							shifts: {
								x: -30,
								y: -50
							}
						}
					});
				}
			}
			plotAccordingToChoices();
	    }	    
	    
        if ($(".chart-bars-horizontal").length) {
            $(function () {
                var d1 = [];
                for (var i = 0; i <= 5; i += 1)
                    d1.push([parseInt(Math.random() * 30), i]);
                var d2 = [];
                for (var i = 0; i <= 5; i += 1)
                    d2.push([parseInt(Math.random() * 30), i]);
                var d3 = [];
                for (var i = 0; i <= 5; i += 1)
                    d3.push([parseInt(Math.random() * 30), i]);
                var data = new Array();
                data.push({
                    data: d1,
                    bars: {
                        horizontal: true,
                        show: true,
                        barWidth: 0.2,
                        order: 1
                    }
                });
                data.push({
                    data: d2,
                    bars: {
                        horizontal: true,
                        show: true,
                        barWidth: 0.2,
                        order: 2
                    }
                });
                data.push({
                    data: d3,
                    bars: {
                        horizontal: true,
                        show: true,
                        barWidth: 0.2,
                        order: 3
                    }
                });
                var options = {
                    grid: {
                        show: true,
                        aboveData: false,
                        color: "#3f3f3f",
                        labelMargin: 5,
                        axisMargin: 0,
                        borderWidth: 0,
                        borderColor: null,
                        minBorderMargin: 5,
                        clickable: true,
                        hoverable: true,
                        autoHighlight: false,
                        mouseActiveRadius: 20
                    },
                    series: {
                        bars: {
                            show: true,
                            horizontal: true,
                            barWidth: 0.2,
                            fill: 1
                        }
                    },
                    colors: Colors,
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "Data&nbsp;" + "%y.0 : %x.0",
                        shifts: {
                            x: -30,
                            y: -50
                        }
                    }
                };
                $.plot($(".chart-bars-horizontal"), data, options);
            });
        }
        if ($(".chart-updating").length) {
            $(function () {
                // we use an inline data source in the example, usually data would
                // be fetched from a server
                var data = [],
                    totalPoints = 50;

                function getRandomData() {
                    if (data.length > 0) data = data.slice(1);
                    // do a random walk
                    while (data.length < totalPoints) {
                        var prev = data.length > 0 ? data[data.length - 1] : 50;
                        var y = prev + Math.random() * 10 - 5;
                        if (y < 0) y = 0;
                        if (y > 100) y = 100;
                        data.push(y);
                    }
                    // zip the generated y values with the x values
                    var res = [];
                    for (var i = 0; i < data.length; ++i)
                        res.push([i, data[i]])
                    return res;
                }
                // Update interval
                var updateInterval = 250;
                // setup plot
                var options = {
                    series: {
                        shadowSize: 0,
                        // drawing is faster without shadows
                        lines: {
                            show: true,
                            fill: true,
                            lineWidth: 2,
                            steps: false
                        },
                        points: {
                            show: true,
                            radius: 2.8,
                            symbol: "circle",
                            lineWidth: 2.5
                        }
                    },
                    grid: {
                        show: true,
                        aboveData: false,
                        color: "#3f3f3f",
                        labelMargin: 5,
                        axisMargin: 0,
                        borderWidth: 0,
                        borderColor: null,
                        minBorderMargin: 5,
                        clickable: true,
                        hoverable: true,
                        autoHighlight: false,
                        mouseActiveRadius: 20
                    },
                    colors: Colors,
                    tooltip: true,
                    //activate tooltip
                    tooltipOpts: {
                        content: "Value is : %y.0",
                        shifts: {
                            x: -30,
                            y: -50
                        }
                    },
                    yaxis: {
                        min: 0,
                        max: 100
                    },
                    xaxis: {
                        show: true
                    }
                };
                var plot = $.plot($(".chart-updating"), [getRandomData()], options);

                function update() {
                    plot.setData([getRandomData()]);
                    // since the axes don't change, we don't need to call plot.setupGrid()
                    plot.draw();
                    setTimeout(update, updateInterval);
                }
                update();
            });
        }
    }

    // Init Flot Chart Plugins
    var runChartPlugins = function () {

		// Flot Time Plugin
		(function(e){function n(e,t){return t*Math.floor(e/t)}function r(e,t,n,r){if(typeof e.strftime=="function")return e.strftime(t);var i=function(e,t){return e=""+e,t=""+(t==null?"0":t),e.length==1?t+e:e},s=[],o=!1,u=e.getHours(),a=u<12;n==null&&(n=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]),r==null&&(r=["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]);var f;u>12?f=u-12:u==0?f=12:f=u;for(var l=0;l<t.length;++l){var c=t.charAt(l);if(o){switch(c){case"a":c=""+r[e.getDay()];break;case"b":c=""+n[e.getMonth()];break;case"d":c=i(e.getDate());break;case"e":c=i(e.getDate()," ");break;case"h":case"H":c=i(u);break;case"I":c=i(f);break;case"l":c=i(f," ");break;case"m":c=i(e.getMonth()+1);break;case"M":c=i(e.getMinutes());break;case"q":c=""+(Math.floor(e.getMonth()/3)+1);break;case"S":c=i(e.getSeconds());break;case"y":c=i(e.getFullYear()%100);break;case"Y":c=""+e.getFullYear();break;case"p":c=a?"am":"pm";break;case"P":c=a?"AM":"PM";break;case"w":c=""+e.getDay()}s.push(c),o=!1}else c=="%"?o=!0:s.push(c)}return s.join("")}function i(e){function t(e,t,n,r){e[t]=function(){return n[r].apply(n,arguments)}}var n={date:e};e.strftime!=undefined&&t(n,"strftime",e,"strftime"),t(n,"getTime",e,"getTime"),t(n,"setTime",e,"setTime");var r=["Date","Day","FullYear","Hours","Milliseconds","Minutes","Month","Seconds"];for(var i=0;i<r.length;i++)t(n,"get"+r[i],e,"getUTC"+r[i]),t(n,"set"+r[i],e,"setUTC"+r[i]);return n}function s(e,t){if(t.timezone=="browser")return new Date(e);if(!t.timezone||t.timezone=="utc")return i(new Date(e));if(typeof timezoneJS!="undefined"&&typeof timezoneJS.Date!="undefined"){var n=new timezoneJS.Date;return n.setTimezone(t.timezone),n.setTime(e),n}return i(new Date(e))}function l(t){t.hooks.processOptions.push(function(t,i){e.each(t.getAxes(),function(e,t){var i=t.options;i.mode=="time"&&(t.tickGenerator=function(e){var t=[],r=s(e.min,i),u=0,l=i.tickSize&&i.tickSize[1]==="quarter"||i.minTickSize&&i.minTickSize[1]==="quarter"?f:a;i.minTickSize!=null&&(typeof i.tickSize=="number"?u=i.tickSize:u=i.minTickSize[0]*o[i.minTickSize[1]]);for(var c=0;c<l.length-1;++c)if(e.delta<(l[c][0]*o[l[c][1]]+l[c+1][0]*o[l[c+1][1]])/2&&l[c][0]*o[l[c][1]]>=u)break;var h=l[c][0],p=l[c][1];if(p=="year"){if(i.minTickSize!=null&&i.minTickSize[1]=="year")h=Math.floor(i.minTickSize[0]);else{var d=Math.pow(10,Math.floor(Math.log(e.delta/o.year)/Math.LN10)),v=e.delta/o.year/d;v<1.5?h=1:v<3?h=2:v<7.5?h=5:h=10,h*=d}h<1&&(h=1)}e.tickSize=i.tickSize||[h,p];var m=e.tickSize[0];p=e.tickSize[1];var g=m*o[p];p=="second"?r.setSeconds(n(r.getSeconds(),m)):p=="minute"?r.setMinutes(n(r.getMinutes(),m)):p=="hour"?r.setHours(n(r.getHours(),m)):p=="month"?r.setMonth(n(r.getMonth(),m)):p=="quarter"?r.setMonth(3*n(r.getMonth()/3,m)):p=="year"&&r.setFullYear(n(r.getFullYear(),m)),r.setMilliseconds(0),g>=o.minute&&r.setSeconds(0),g>=o.hour&&r.setMinutes(0),g>=o.day&&r.setHours(0),g>=o.day*4&&r.setDate(1),g>=o.month*2&&r.setMonth(n(r.getMonth(),3)),g>=o.quarter*2&&r.setMonth(n(r.getMonth(),6)),g>=o.year&&r.setMonth(0);var y=0,b=Number.NaN,w;do{w=b,b=r.getTime(),t.push(b);if(p=="month"||p=="quarter")if(m<1){r.setDate(1);var E=r.getTime();r.setMonth(r.getMonth()+(p=="quarter"?3:1));var S=r.getTime();r.setTime(b+y*o.hour+(S-E)*m),y=r.getHours(),r.setHours(0)}else r.setMonth(r.getMonth()+m*(p=="quarter"?3:1));else p=="year"?r.setFullYear(r.getFullYear()+m):r.setTime(b+g)}while(b<e.max&&b!=w);return t},t.tickFormatter=function(e,t){var n=s(e,t.options);if(i.timeformat!=null)return r(n,i.timeformat,i.monthNames,i.dayNames);var u=t.options.tickSize&&t.options.tickSize[1]=="quarter"||t.options.minTickSize&&t.options.minTickSize[1]=="quarter",a=t.tickSize[0]*o[t.tickSize[1]],f=t.max-t.min,l=i.twelveHourClock?" %p":"",c=i.twelveHourClock?"%I":"%H",h;a<o.minute?h=c+":%M:%S"+l:a<o.day?f<2*o.day?h=c+":%M"+l:h="%b %d "+c+":%M"+l:a<o.month?h="%b %d":u&&a<o.quarter||!u&&a<o.year?f<o.year?h="%b":h="%b %Y":u&&a<o.year?f<o.year?h="Q%q":h="Q%q %Y":h="%Y";var p=r(n,h,i.monthNames,i.dayNames);return p})})})}var t={xaxis:{timezone:null,timeformat:null,twelveHourClock:!1,monthNames:null}},o={second:1e3,minute:6e4,hour:36e5,day:864e5,month:2592e6,quarter:7776e6,year:525949.2*60*1e3},u=[[1,"second"],[2,"second"],[5,"second"],[10,"second"],[30,"second"],[1,"minute"],[2,"minute"],[5,"minute"],[10,"minute"],[30,"minute"],[1,"hour"],[2,"hour"],[4,"hour"],[8,"hour"],[12,"hour"],[1,"day"],[2,"day"],[3,"day"],[.25,"month"],[.5,"month"],[1,"month"],[2,"month"]],a=u.concat([[3,"month"],[6,"month"],[1,"year"]]),f=u.concat([[1,"quarter"],[2,"quarter"],[1,"year"]]);e.plot.plugins.push({init:l,options:t,name:"time",version:"1.0"}),e.plot.formatDate=r})(jQuery);
			
		// Flot Tooltip Plugin
		!function(a){var b={tooltip:!1,tooltipOpts:{content:"%s | X: %x | Y: %y",xDateFormat:null,yDateFormat:null,shifts:{x:10,y:20},defaultTheme:!0,onHover:function(){}}},c=function(a){this.tipPosition={x:0,y:0},this.init(a)};c.prototype.init=function(b){function c(a){var b={};b.x=a.pageX,b.y=a.pageY,e.updateTooltipPosition(b)}function d(a,b,c){var d=e.getDomElement();if(c){var f;f=e.stringFormat(e.tooltipOptions.content,c),d.html(f),e.updateTooltipPosition({x:b.pageX,y:b.pageY}),d.css({left:e.tipPosition.x+e.tooltipOptions.shifts.x,top:e.tipPosition.y+e.tooltipOptions.shifts.y}).show(),"function"==typeof e.tooltipOptions.onHover&&e.tooltipOptions.onHover(c,d)}else d.hide().html("")}var e=this;b.hooks.bindEvents.push(function(b,f){if(e.plotOptions=b.getOptions(),e.plotOptions.tooltip!==!1&&"undefined"!=typeof e.plotOptions.tooltip){e.tooltipOptions=e.plotOptions.tooltipOpts;{e.getDomElement()}a(b.getPlaceholder()).bind("plothover",d),a(f).bind("mousemove",c)}}),b.hooks.shutdown.push(function(b,e){a(b.getPlaceholder()).unbind("plothover",d),a(e).unbind("mousemove",c)})},c.prototype.getDomElement=function(){var b;return a("#flotTip").length>0?b=a("#flotTip"):(b=a("<div />").attr("id","flotTip"),b.appendTo("body").hide().css({position:"absolute"}),this.tooltipOptions.defaultTheme&&b.css({background:"#fff","z-index":"100",padding:"0.4em 0.6em","border-radius":"0.5em","font-size":"0.8em",border:"1px solid #111",display:"none","white-space":"nowrap"})),b},c.prototype.updateTooltipPosition=function(b){var c=a("#flotTip").outerWidth()+this.tooltipOptions.shifts.x,d=a("#flotTip").outerHeight()+this.tooltipOptions.shifts.y;b.x-a(window).scrollLeft()>a(window).innerWidth()-c&&(b.x-=c),b.y-a(window).scrollTop()>a(window).innerHeight()-d&&(b.y-=d),this.tipPosition.x=b.x,this.tipPosition.y=b.y},c.prototype.stringFormat=function(a,b){var c=/%p\.{0,1}(\d{0,})/,d=/%s/,e=/%x\.{0,1}(?:\d{0,})/,f=/%y\.{0,1}(?:\d{0,})/,g=b.datapoint[0],h=b.datapoint[1];return"function"==typeof a&&(a=a(b.series.label,g,h,b)),"undefined"!=typeof b.series.percent&&(a=this.adjustValPrecision(c,a,b.series.percent)),"undefined"!=typeof b.series.label&&(a=a.replace(d,b.series.label)),this.isTimeMode("xaxis",b)&&this.isXDateFormat(b)&&(a=a.replace(e,this.timestampToDate(g,this.tooltipOptions.xDateFormat))),this.isTimeMode("yaxis",b)&&this.isYDateFormat(b)&&(a=a.replace(f,this.timestampToDate(h,this.tooltipOptions.yDateFormat))),"number"==typeof g&&(a=this.adjustValPrecision(e,a,g)),"number"==typeof h&&(a=this.adjustValPrecision(f,a,h)),"undefined"!=typeof b.series.xaxis.tickFormatter&&(a=a.replace(e,b.series.xaxis.tickFormatter(g,b.series.xaxis))),"undefined"!=typeof b.series.yaxis.tickFormatter&&(a=a.replace(f,b.series.yaxis.tickFormatter(h,b.series.yaxis))),a},c.prototype.isTimeMode=function(a,b){return"undefined"!=typeof b.series[a].options.mode&&"time"===b.series[a].options.mode},c.prototype.isXDateFormat=function(){return"undefined"!=typeof this.tooltipOptions.xDateFormat&&null!==this.tooltipOptions.xDateFormat},c.prototype.isYDateFormat=function(){return"undefined"!=typeof this.tooltipOptions.yDateFormat&&null!==this.tooltipOptions.yDateFormat},c.prototype.timestampToDate=function(b,c){var d=new Date(b);return a.plot.formatDate(d,c)},c.prototype.adjustValPrecision=function(a,b,c){var d,e=b.match(a);return null!==e&&""!==RegExp.$1&&(d=RegExp.$1,c=c.toFixed(d),b=b.replace(a,c)),b};var d=function(a){new c(a)};a.plot.plugins.push({init:d,options:b,name:"tooltip",version:"0.6.1"})}(jQuery);
		
	   // Flot Navigate Plugin
		(function(e){function t(i){var l,h=this,p=i.data||{};if(p.elem)h=i.dragTarget=p.elem,i.dragProxy=a.proxy||h,i.cursorOffsetX=p.pageX-p.left,i.cursorOffsetY=p.pageY-p.top,i.offsetX=i.pageX-i.cursorOffsetX,i.offsetY=i.pageY-i.cursorOffsetY;else if(a.dragging||p.which>0&&i.which!=p.which||e(i.target).is(p.not))return;switch(i.type){case"mousedown":return e.extend(p,e(h).offset(),{elem:h,target:i.target,pageX:i.pageX,pageY:i.pageY}),o.add(document,"mousemove mouseup",t,p),s(h,!1),a.dragging=null,!1;case!a.dragging&&"mousemove":if(r(i.pageX-p.pageX)+r(i.pageY-p.pageY)<p.distance)break;i.target=p.target,l=n(i,"dragstart",h),l!==!1&&(a.dragging=h,a.proxy=i.dragProxy=e(l||h)[0]);case"mousemove":if(a.dragging){if(l=n(i,"drag",h),u.drop&&(u.drop.allowed=l!==!1,u.drop.handler(i)),l!==!1)break;i.type="mouseup"};case"mouseup":o.remove(document,"mousemove mouseup",t),a.dragging&&(u.drop&&u.drop.handler(i),n(i,"dragend",h)),s(h,!0),a.dragging=a.proxy=p.elem=!1}return!0}function n(t,n,r){t.type=n;var i=e.event.dispatch.call(r,t);return i===!1?!1:i||t.result}function r(e){return Math.pow(e,2)}function i(){return a.dragging===!1}function s(e,t){e&&(e.unselectable=t?"off":"on",e.onselectstart=function(){return t},e.style&&(e.style.MozUserSelect=t?"":"none"))}e.fn.drag=function(e,t,n){return t&&this.bind("dragstart",e),n&&this.bind("dragend",n),e?this.bind("drag",t?t:e):this.trigger("drag")};var o=e.event,u=o.special,a=u.drag={not:":input",distance:0,which:1,dragging:!1,setup:function(n){n=e.extend({distance:a.distance,which:a.which,not:a.not},n||{}),n.distance=r(n.distance),o.add(this,"mousedown",t,n),this.attachEvent&&this.attachEvent("ondragstart",i)},teardown:function(){o.remove(this,"mousedown",t),this===a.dragging&&(a.dragging=a.proxy=!1),s(this,!0),this.detachEvent&&this.detachEvent("ondragstart",i)}};u.dragstart=u.dragend={setup:function(){},teardown:function(){}}})(jQuery),function(e){function t(t){var n=t||window.event,r=[].slice.call(arguments,1),i=0,s=0,o=0,t=e.event.fix(n);return t.type="mousewheel",n.wheelDelta&&(i=n.wheelDelta/120),n.detail&&(i=-n.detail/3),o=i,void 0!==n.axis&&n.axis===n.HORIZONTAL_AXIS&&(o=0,s=-1*i),void 0!==n.wheelDeltaY&&(o=n.wheelDeltaY/120),void 0!==n.wheelDeltaX&&(s=-1*n.wheelDeltaX/120),r.unshift(t,i,s,o),(e.event.dispatch||e.event.handle).apply(this,r)}var n=["DOMMouseScroll","mousewheel"];if(e.event.fixHooks)for(var r=n.length;r;)e.event.fixHooks[n[--r]]=e.event.mouseHooks;e.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var e=n.length;e;)this.addEventListener(n[--e],t,!1);else this.onmousewheel=t},teardown:function(){if(this.removeEventListener)for(var e=n.length;e;)this.removeEventListener(n[--e],t,!1);else this.onmousewheel=null}},e.fn.extend({mousewheel:function(e){return e?this.bind("mousewheel",e):this.trigger("mousewheel")},unmousewheel:function(e){return this.unbind("mousewheel",e)}})}(jQuery),function(e){function n(t){function n(e,n){var r=t.offset();r.left=e.pageX-r.left,r.top=e.pageY-r.top,n?t.zoomOut({center:r}):t.zoom({center:r})}function r(e,t){return e.preventDefault(),n(e,t<0),!1}function a(e){if(e.which!=1)return!1;var n=t.getPlaceholder().css("cursor");n&&(i=n),t.getPlaceholder().css("cursor",t.getOptions().pan.cursor),s=e.pageX,o=e.pageY}function f(e){var n=t.getOptions().pan.frameRate;if(u||!n)return;u=setTimeout(function(){t.pan({left:s-e.pageX,top:o-e.pageY}),s=e.pageX,o=e.pageY,u=null},1/n*1e3)}function l(e){u&&(clearTimeout(u),u=null),t.getPlaceholder().css("cursor",i),t.pan({left:s-e.pageX,top:o-e.pageY})}function c(e,t){var i=e.getOptions();i.zoom.interactive&&(t[i.zoom.trigger](n),t.mousewheel(r)),i.pan.interactive&&(t.bind("dragstart",{distance:10},a),t.bind("drag",f),t.bind("dragend",l))}function h(e,t){t.unbind(e.getOptions().zoom.trigger,n),t.unbind("mousewheel",r),t.unbind("dragstart",a),t.unbind("drag",f),t.unbind("dragend",l),u&&clearTimeout(u)}var i="default",s=0,o=0,u=null;t.zoomOut=function(e){e||(e={}),e.amount||(e.amount=t.getOptions().zoom.amount),e.amount=1/e.amount,t.zoom(e)},t.zoom=function(n){n||(n={});var r=n.center,i=n.amount||t.getOptions().zoom.amount,s=t.width(),o=t.height();r||(r={left:s/2,top:o/2});var u=r.left/s,a=r.top/o,f={x:{min:r.left-u*s/i,max:r.left+(1-u)*s/i},y:{min:r.top-a*o/i,max:r.top+(1-a)*o/i}};e.each(t.getAxes(),function(e,t){var n=t.options,r=f[t.direction].min,i=f[t.direction].max,s=n.zoomRange,o=n.panRange;if(s===!1)return;r=t.c2p(r),i=t.c2p(i);if(r>i){var u=r;r=i,i=u}o&&(o[0]!=null&&r<o[0]&&(r=o[0]),o[1]!=null&&i>o[1]&&(i=o[1]));var a=i-r;if(s&&(s[0]!=null&&a<s[0]||s[1]!=null&&a>s[1]))return;n.min=r,n.max=i}),t.setupGrid(),t.draw(),n.preventEvent||t.getPlaceholder().trigger("plotzoom",[t,n])},t.pan=function(n){var r={x:+n.left,y:+n.top};isNaN(r.x)&&(r.x=0),isNaN(r.y)&&(r.y=0),e.each(t.getAxes(),function(e,t){var n=t.options,i,s,o=r[t.direction];i=t.c2p(t.p2c(t.min)+o),s=t.c2p(t.p2c(t.max)+o);var u=n.panRange;if(u===!1)return;u&&(u[0]!=null&&u[0]>i&&(o=u[0]-i,i+=o,s+=o),u[1]!=null&&u[1]<s&&(o=u[1]-s,i+=o,s+=o)),n.min=i,n.max=s}),t.setupGrid(),t.draw(),n.preventEvent||t.getPlaceholder().trigger("plotpan",[t,n])},t.hooks.bindEvents.push(c),t.hooks.shutdown.push(h)}var t={xaxis:{zoomRange:null,panRange:null},zoom:{interactive:!1,trigger:"dblclick",amount:1.5},pan:{interactive:!1,cursor:"move",frameRate:20}};e.plot.plugins.push({init:n,options:t,name:"navigate",version:"1.3"})}(jQuery);

		// Float Selection Plugin
		(function(e){function t(t){function s(e){n.active&&(h(e),t.getPlaceholder().trigger("plotselecting",[a()]))}function o(t){if(t.which!=1)return;document.body.focus(),document.onselectstart!==undefined&&r.onselectstart==null&&(r.onselectstart=document.onselectstart,document.onselectstart=function(){return!1}),document.ondrag!==undefined&&r.ondrag==null&&(r.ondrag=document.ondrag,document.ondrag=function(){return!1}),c(n.first,t),n.active=!0,i=function(e){u(e)},e(document).one("mouseup",i)}function u(e){return i=null,document.onselectstart!==undefined&&(document.onselectstart=r.onselectstart),document.ondrag!==undefined&&(document.ondrag=r.ondrag),n.active=!1,h(e),m()?f():(t.getPlaceholder().trigger("plotunselected",[]),t.getPlaceholder().trigger("plotselecting",[null])),!1}function a(){if(!m())return null;if(!n.show)return null;var r={},i=n.first,s=n.second;return e.each(t.getAxes(),function(e,t){if(t.used){var n=t.c2p(i[t.direction]),o=t.c2p(s[t.direction]);r[e]={from:Math.min(n,o),to:Math.max(n,o)}}}),r}function f(){var e=a();t.getPlaceholder().trigger("plotselected",[e]),e.xaxis&&e.yaxis&&t.getPlaceholder().trigger("selected",[{x1:e.xaxis.from,y1:e.yaxis.from,x2:e.xaxis.to,y2:e.yaxis.to}])}function l(e,t,n){return t<e?e:t>n?n:t}function c(e,r){var i=t.getOptions(),s=t.getPlaceholder().offset(),o=t.getPlotOffset();e.x=l(0,r.pageX-s.left-o.left,t.width()),e.y=l(0,r.pageY-s.top-o.top,t.height()),i.selection.mode=="y"&&(e.x=e==n.first?0:t.width()),i.selection.mode=="x"&&(e.y=e==n.first?0:t.height())}function h(e){if(e.pageX==null)return;c(n.second,e),m()?(n.show=!0,t.triggerRedrawOverlay()):p(!0)}function p(e){n.show&&(n.show=!1,t.triggerRedrawOverlay(),e||t.getPlaceholder().trigger("plotunselected",[]))}function d(e,n){var r,i,s,o,u=t.getAxes();for(var a in u){r=u[a];if(r.direction==n){o=n+r.n+"axis",!e[o]&&r.n==1&&(o=n+"axis");if(e[o]){i=e[o].from,s=e[o].to;break}}}e[o]||(r=n=="x"?t.getXAxes()[0]:t.getYAxes()[0],i=e[n+"1"],s=e[n+"2"]);if(i!=null&&s!=null&&i>s){var f=i;i=s,s=f}return{from:i,to:s,axis:r}}function v(e,r){var i,s,o=t.getOptions();o.selection.mode=="y"?(n.first.x=0,n.second.x=t.width()):(s=d(e,"x"),n.first.x=s.axis.p2c(s.from),n.second.x=s.axis.p2c(s.to)),o.selection.mode=="x"?(n.first.y=0,n.second.y=t.height()):(s=d(e,"y"),n.first.y=s.axis.p2c(s.from),n.second.y=s.axis.p2c(s.to)),n.show=!0,t.triggerRedrawOverlay(),!r&&m()&&f()}function m(){var e=t.getOptions().selection.minSize;return Math.abs(n.second.x-n.first.x)>=e&&Math.abs(n.second.y-n.first.y)>=e}var n={first:{x:-1,y:-1},second:{x:-1,y:-1},show:!1,active:!1},r={},i=null;t.clearSelection=p,t.setSelection=v,t.getSelection=a,t.hooks.bindEvents.push(function(e,t){var n=e.getOptions();n.selection.mode!=null&&(t.mousemove(s),t.mousedown(o))}),t.hooks.drawOverlay.push(function(t,r){if(n.show&&m()){var i=t.getPlotOffset(),s=t.getOptions();r.save(),r.translate(i.left,i.top);var o=e.color.parse(s.selection.color);r.strokeStyle=o.scale("a",.8).toString(),r.lineWidth=1,r.lineJoin=s.selection.shape,r.fillStyle=o.scale("a",.4).toString();var u=Math.min(n.first.x,n.second.x)+.5,a=Math.min(n.first.y,n.second.y)+.5,f=Math.abs(n.second.x-n.first.x)-1,l=Math.abs(n.second.y-n.first.y)-1;r.fillRect(u,a,f,l),r.strokeRect(u,a,f,l),r.restore()}}),t.hooks.shutdown.push(function(t,n){n.unbind("mousemove",s),n.unbind("mousedown",o),i&&e(document).unbind("mouseup",i)})}e.plot.plugins.push({init:t,options:{selection:{mode:null,color:"#e8cfac",shape:"round",minSize:5}},name:"selection",version:"1.1"})})(jQuery);

		// Float Threshold Plugin
		(function(e){function n(t){function n(t,n,r,i,s){var o=r.pointsize,u,a,f,l,c,h=e.extend({},n);h.datapoints={points:[],pointsize:o,format:r.format},h.label=null,h.color=s,h.threshold=null,h.originSeries=n,h.data=[];var p=r.points,d=n.lines.show,v=[],m=[],g;for(u=0;u<p.length;u+=o){a=p[u],f=p[u+1],c=l,f<i?l=v:l=m;if(d&&c!=l&&a!=null&&u>0&&p[u-o]!=null){var y=a+(i-f)*(a-p[u-o])/(f-p[u-o+1]);c.push(y),c.push(i);for(g=2;g<o;++g)c.push(p[u+g]);l.push(null),l.push(null);for(g=2;g<o;++g)l.push(p[u+g]);l.push(y),l.push(i);for(g=2;g<o;++g)l.push(p[u+g])}l.push(a),l.push(f);for(g=2;g<o;++g)l.push(p[u+g])}r.points=m,h.datapoints.points=v;if(h.datapoints.points.length>0){var b=e.inArray(n,t.getData());t.getData().splice(b+1,0,h)}}function r(t,r,i){if(!r.threshold)return;r.threshold instanceof Array?(r.threshold.sort(function(e,t){return e.below-t.below}),e(r.threshold).each(function(e,o){n(t,r,i,o.below,o.color)})):n(t,r,i,r.threshold.below,r.threshold.color)}t.hooks.processDatapoints.push(r)}var t={series:{threshold:null}};e.plot.plugins.push({init:n,options:t,name:"threshold",version:"1.2"})})(jQuery);
	
	}
    return {
        init: function () {
            runCharts();
			runChartPlugins();
        }
    };
}();