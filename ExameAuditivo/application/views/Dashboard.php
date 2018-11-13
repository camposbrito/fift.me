<div class="col-sm-12  col-md-12  main">
    <p><?= @TratarMsg($this->session->flashdata('msg')); ?></p>  
    <? if  (($this->session->userdata['adm'] == false)  ||  ($this->session->userdata['adm'] == true)) { ?>
        <!-- top tiles -->
        <div class="row">
            <div class="row tile_count">
                <?
                foreach ($Stats as $stat) {
                    ?>
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-clock-o"></i><?= isset($stat[0]->msg) ? $stat[0]->msg : ''; ?></span>
                        <div class="count"><?= $stat[0]->count ?></div>             
                    </div> 
                <? } ?>
            </div>
        </div>
        <!-- /top tiles -->


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph x_panel">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>Consultas<small> últimos 15 dias</small></h3>
                        </div>
                 
                    </div>
                    <div class="x_content">
                        <div class="demo-container" style="height:250px">
                            <div id="placeholder3xx3" class="demo-placeholder" style="width: 100%; height:250px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <img src="<?= base_url('assets/img/CPAA.png'); ?>" class="img-responsive"/>
                </div>
                <div class="col-md-8">
                    <div class="row" style="text-align: center;">
                        <div class="col-md-3">
                            <canvas id="canvas1i" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                            <h4 style="margin:0">Total Consultas</h4>
                        </div>
                        <div class="col-md-3">
                            <canvas id="canvas1i2" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                            <h4 style="margin:0">Consultas Abertas</h4>
                        </div>
                        <div class="col-md-3">
                            <canvas id="canvas1i3" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                            <h4 style="margin:0">Consultas Fechadas</h4>
                        </div>
                        <div class="col-md-3">
                            <canvas id="canvas1i4" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                            <h4 style="margin:0">Consultas Inválidas</h4>
                        </div>
                    </div>
                </div>
            </div>
 
               <script>
                    $(document).ready(function () {
                        //random data.
                        
                         
                        <?
                    foreach ($consultas_por_data as $key => $value) {
//                        if ($cons->Consultas != '')
                        {  
                            echo 'var d'.$key.' = [];';
                            //echo "var l".$key." = ".$value['nome'].";";
                            foreach ($value as $cons) {
                                echo 'd'.$key.'.push([new Date("' . $cons->Data . '").getTime() ,' . $cons->Consultas . ']); ';
//                                _debug($cons);

                            }
                        }
                        
                    }
                        ?>
                     


                        var chartColours = ['#96CA59', '#3F97EB', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'];
                        var tickSize = [1, "day"];
                        var tformat = "%d/%m";


                        //graph options
                        var options = {
                            grid: {
                                show: true,
                                aboveData: true,
                                color: "#3f3f3f",
                                labelMargin: 10,
                                axisMargin: 0,
                                borderWidth: 0,
                                borderColor: null,
                                minBorderMargin: 5,
                                clickable: true,
                                hoverable: true,
                                autoHighlight: true,
                                mouseActiveRadius: 100
                            },
                            series: {
                                lines: {
                                    show: true,
                                    fill: true,
                                    lineWidth: 2,
                                    steps: false
                                },
                                points: {
                                    show: true,
                                    radius: 4.5,
                                    symbol: "circle",
                                    lineWidth: 3.0
                                }, curvedLines: {
                                    apply: false,
                                    active: true,
                                    monotonicFit: true
                                }
                            },
                            legend: {
                                position: "ne",
                                margin: [0, -10],
                                noColumns: 0,
                                labelBoxBorderColor: null,
                                labelFormatter: function (label, series) {
                                    // just add some space to labes
                                    return label + '&nbsp;&nbsp;';
                                },
                                width: 40,
                                height: 10
                            },
                            colors: chartColours,
                            shadowSize: 0,
                            tooltip: true, //activate tooltip
                            tooltipOpts: {
                                content: "%s: %y.0",
                                xDateFormat: "%d/%m",
                                shifts: {
                                    x: -30,
                                    y: -50
                                },
                                defaultTheme: true
                            },
                            yaxis: {
                                min: 0
                            },
                            xaxis: {
                                mode: "time",
                                minTickSize: tickSize,
                                timeformat: tformat
                            }
                        };
                        var plot = $.plot($("#placeholder3xx3"), [
                            <?
                              foreach ($consultas_por_data as $key => $value) {
//                             if ($value['nome'] != '')
                            {
                            
                                  echo '
                                        {
                                            label:"'.$value['nome'].'",
                                            data: d'.$key.',
                                            lines: {
                                                fillColor: "rgba(150, 202, 89, 0)",
                                                show: true
                                            }, //#96CA59 rgba(150, 202, 89, 0.42)
                                            points: {
                                                fillColor: "#fff"
                                            }
                                        },';
                                }
                              }
                            ?>
                        ], options);
                        $("<div id='tooltip'></div>").css({
			position: "absolute",
			display: "none",
			border: "1px solid #fdd",
			padding: "2px",
			"background-color": "#fee",
			opacity: 0.80
		}).appendTo("body");

		$("#placeholder3xx3").bind("plothover", function (event, pos, item) {

			 
				var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
				$("#hoverdata").text(str);
			 

			 
				if (item) {
					var x = item.datapoint[0].toFixed(2),
						y = item.datapoint[1].toFixed(2);

					$("#tooltip").html(item.series.label + " = " + y)
						.css({top: item.pageY+5, left: item.pageX+5})
						.fadeIn(200);
				} else {
					$("#tooltip").hide();
				}
			 
		});

		$("#placeholder3xx3").bind("plotclick", function (event, pos, item) {
			if (item) {
				$("#clickdata").text(" - click point " + item.dataIndex + " in " + item.series.label);
				plot.highlight(item.series, item.datapoint);
			}
		});

		// Add the Flot version string to the footer

//		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
                    });
                </script>

                <!-- Doughnut Chart -->
                <script>
                    $(document).ready(function () {
                        var canvasDoughnut,
                            options = {
                                legend: true,
                                responsive: true
                            };
                        var l0 = []
                        var d0 = []
                        <?
                        foreach ($consultas_total_funcionario as $cons) {
                            echo 'd0.push(' . $cons->Consultas . '); ';
                            echo 'l0.push("' . $cons->terceiro . '"); ';
                        }
//                        foreach ($consultas_total_funcionario1 as $cons) {
//                            echo 'd0.push(' . $cons->Consultas . '); ';
//                            echo 'l0.push("' . $cons->terceiro1 . '"); ';
//                        }
                        ?>
                        new Chart(document.getElementById("canvas1i"), {
                            type: 'polarArea',
                            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                            data: {
                                labels: l0,
                                datasets: [{
                                        data: d0,
                                        backgroundColor: [
                                            "#BDC3C7",
                                            "#9B59B6",
                                            "#E74C3C",
                                            "#26B99A",
                                            "#3498DB"
                                        ],
                                        hoverBackgroundColor: [
                                            "#CFD4D8",
                                            "#B370CF",
                                            "#E95E4F",
                                            "#36CAAB",
                                            "#49A9EA"
                                        ]

                                    }]
                            },
                            options: options
                        });
                        var l1 = []
                        var d1 = []
                        <?
                        foreach ($consultas_total_abertas as $cons) {
                            echo 'd1.push(' . $cons->Consultas . '); ';
                            echo 'l1.push("' . $cons->terceiro . '"); ';
                        }
                        ?>
                        new Chart(document.getElementById("canvas1i2"), {
                            type: 'polarArea',
                            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                            data: {
                                labels: l1,
                                datasets: [{
                                        data: d1,
                                        backgroundColor: [
                                            "#BDC3C7",
                                            "#9B59B6",
                                            "#E74C3C",
                                            "#26B99A",
                                            "#3498DB"
                                        ],
                                        hoverBackgroundColor: [
                                            "#CFD4D8",
                                            "#B370CF",
                                            "#E95E4F",
                                            "#36CAAB",
                                            "#49A9EA"
                                        ]

                                    }]
                            },
                            options: options
                        });
                        var l2 = []
                        var d2 = []
            <?
            foreach ($consultas_total_fechadas as $cons) {
                echo 'd2.push(' . $cons->Consultas . '); ';
                echo 'l2.push("' . $cons->terceiro . '"); ';
            }
            ?>
                        new Chart(document.getElementById("canvas1i3"), {
                            type: 'polarArea',
                            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                            data: {
                                labels: l2,
                                datasets: [{
                                        data: d2,
                                        backgroundColor: [
                                            "#BDC3C7",
                                            "#9B59B6",
                                            "#E74C3C",
                                            "#26B99A",
                                            "#3498DB"
                                        ],
                                        hoverBackgroundColor: [
                                            "#CFD4D8",
                                            "#B370CF",
                                            "#E95E4F",
                                            "#36CAAB",
                                            "#49A9EA"
                                        ]

                                    }]
                            },
                            options: options
                        });
                        var l3 = []
                        var d3 = []
                        <?
                        foreach ($consultas_total_invalidas as $cons) {
                            echo 'd3.push(' . $cons->Consultas . '); ';
                            echo 'l3.push("' . $cons->terceiro . '"); ';
                        }
                        ?>
                        new Chart(document.getElementById("canvas1i4"), {
                            type: 'polarArea',
                            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                            data: {
                                labels: l3,
                                datasets: [{
                                        data: d3,
                                        backgroundColor: [
                                            "#BDC3C7",
                                            "#9B59B6",
                                            "#E74C3C",
                                            "#26B99A",
                                            "#3498DB"
                                        ],
                                        hoverBackgroundColor: [
                                            "#CFD4D8",
                                            "#B370CF",
                                            "#E95E4F",
                                            "#36CAAB",
                                            "#49A9EA"
                                        ]

                                    }]
                            },
                            options: options
                        });

                        var label3 = []
                        var data1 = []
                        var data2 = []
                        var data3 = []
                        <?
                        foreach ($consultas_total_invalidas as $cons) {
                            echo 'data3.push(' . $cons->Consultas . '); ';
                            echo 'label3.push("' . $cons->terceiro . '"); ';
                        }
                        ?>
            //            new Chart(document.getElementById("linechart"), {
            //                type: 'line',
            //                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            //                data: {
            //                    labels: label3,
            //                    datasets: [{
            //                            data: data1,
            //                            backgroundColor: [
            //                                "#BDC3C7",
            //                                "#9B59B6",
            //                                "#E74C3C",
            //                                "#26B99A",
            //                                "#3498DB"
            //                            ],
            //                            hoverBackgroundColor: [
            //                                "#CFD4D8",
            //                                "#B370CF",
            //                                "#E95E4F",
            //                                "#36CAAB",
            //                                "#49A9EA"
            //                            ]
            //
            //                        },
            //                    {
            //                            data: data2,
            //                            backgroundColor: [
            //                                "#BDC3C7",
            //                                "#9B59B6",
            //                                "#E74C3C",
            //                                "#26B99A",
            //                                "#3498DB"
            //                            ],
            //                            hoverBackgroundColor: [
            //                                "#CFD4D8",
            //                                "#B370CF",
            //                                "#E95E4F",
            //                                "#36CAAB",
            //                                "#49A9EA"
            //                            ]
            //
            //                        },{
            //                            data: data3,
            //                            backgroundColor: [
            //                                "#BDC3C7",
            //                                "#9B59B6",
            //                                "#E74C3C",
            //                                "#26B99A",
            //                                "#3498DB"
            //                            ],
            //                            hoverBackgroundColor: [
            //                                "#CFD4D8",
            //                                "#B370CF",
            //                                "#E95E4F",
            //                                "#36CAAB",
            //                                "#49A9EA"
            //                            ]
            //
            //                        }
            //                    ]
            //                },
            //                options: options
            //            });
                    });
                </script>
            <?
        } else {
            ?>
            <div class="row">
                <div class="col-md-10 col-sm-4 col-xs-6 tile_stats_count">
                    <img src="<?= base_url('assets/img/CPAA.png'); ?>" class="img-responsive"/>
                </div>
            </div>
        </div>
        <?
    }
      
    ?>
 