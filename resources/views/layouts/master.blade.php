<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gentallela Alela! | </title>

        <!-- Bootstrap core CSS -->

        <link href="{{URL::asset('css')}}/bootstrap.min.css" rel="stylesheet">

        <link href="{{URL::asset('fonts')}}/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{URL::asset('css')}}/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="{{URL::asset('css')}}/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css')}}/maps/jquery-jvectormap-2.0.3.css" />
        <link href="{{URL::asset('css')}}/icheck/flat/green.css" rel="stylesheet" />
        <link href="{{URL::asset('css')}}/floatexamples.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('css')}}/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

        <script src="{{URL::asset('js')}}/jquery.min.js"></script>
        <script src="{{URL::asset('js')}}/nprogress.js"></script>

        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>


    <body class="nav-md">

        <div class="container body">


            <div class="main_container">

                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        @yield('menu')
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        @yield('header')
                    </div>
                </div>
                <!-- /top navigation -->


                <!-- page content -->
                <div class="right_col" role="main">
                    @yield('content')
                </div>
                <!-- /page content -->

            </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="{{URL::asset('js')}}/bootstrap.min.js"></script>

        <!-- gauge js -->
        <script type="text/javascript" src="{{URL::asset('js')}}/gauge/gauge.min.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/gauge/gauge_demo.js"></script>
        <!-- chart js -->
        <script src="{{URL::asset('js')}}/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="{{URL::asset('js')}}/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="{{URL::asset('js')}}/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="{{URL::asset('js')}}js/custom.js"></script>
        <script src="{{URL::asset('js')}}/icheck/icheck.min.js"></script>
        <!-- moris js -->
    <script src="{{URL::asset('js')}}/moris/raphael-min.js"></script>
    <script src="{{URL::asset('js')}}/moris/morris.js"></script>

    <!-- image cropping -->
    <script src="{{URL::asset('js')}}/cropping/cropper.min.js"></script>
    <script src="{{URL::asset('js')}}/cropping/main.js"></script>

        <!-- daterangepicker -->
        <script type="text/javascript" src="{{URL::asset('js')}}/moment.min.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/datepicker/daterangepicker.js"></script>

        <script src="{{URL::asset('js')}}/custom.js"></script>
        
        <!-- Datatables -->
        <script src="{{URL::asset('js')}}/datatables/js/jquery.dataTables.js"></script>
        <script src="{{URL::asset('js')}}/datatables/tools/js/dataTables.tableTools.js"></script>

        <!-- flot js -->
        <!--[if lte IE 8]><script type="text/javascript" src="{{URL::asset('js')}}/excanvas.min.js"></script><![endif]-->
        <script type="text/javascript" src="{{URL::asset('js')}}/flot/jquery.flot.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/flot/jquery.flot.pie.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/flot/jquery.flot.orderBars.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/flot/jquery.flot.time.min.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/flot/date.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/flot/jquery.flot.spline.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/flot/jquery.flot.stack.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/flot/curvedLines.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/flot/jquery.flot.resize.js"></script>

        <script>
        $(function () {
            var day_data = [
                {
                    "period": "Jan",
                    "Hours worked": 80
                },
                {
                    "period": "Feb",
                    "Hours worked": 125
                },
                {
                    "period": "Mar",
                    "Hours worked": 176
                },
                {
                    "period": "Apr",
                    "Hours worked": 224
                },
                {
                    "period": "May",
                    "Hours worked": 265
                },
                {
                    "period": "Jun",
                    "Hours worked": 314
                },
                {
                    "period": "Jul",
                    "Hours worked": 347
                },
                {
                    "period": "Aug",
                    "Hours worked": 287
                },
                {
                    "period": "Sep",
                    "Hours worked": 240
                },
                {
                    "period": "Oct",
                    "Hours worked": 211
                }
    ];
            Morris.Bar({
                element: 'graph_bar',
                data: day_data,
                xkey: 'period',
                hideHover: 'auto',
                barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                ykeys: ['Hours worked', 'sorned'],
                labels: ['Hours worked', 'SORN'],
                xLabelAngle: 60
            });
        });
    </script>

        <script>
            $(document).ready(function () {
                // [17, 74, 6, 39, 20, 85, 7]
                //[82, 23, 66, 9, 99, 6, 2]
                var data1 = [[gd(2012, 1, 1), 17], [gd(2012, 1, 2), 74], [gd(2012, 1, 3), 6], [gd(2012, 1, 4), 39], [gd(2012, 1, 5), 20], [gd(2012, 1, 6), 85], [gd(2012, 1, 7), 7]];

                var data2 = [[gd(2012, 1, 1), 82], [gd(2012, 1, 2), 23], [gd(2012, 1, 3), 66], [gd(2012, 1, 4), 9], [gd(2012, 1, 5), 119], [gd(2012, 1, 6), 6], [gd(2012, 1, 7), 9]];
                $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
                    data1, data2
                ], {
                    series: {
                        lines: {
                            show: false,
                            fill: true
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                        points: {
                            radius: 0,
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        verticalLines: true,
                        hoverable: true,
                        clickable: true,
                        tickColor: "#d5d5d5",
                        borderWidth: 1,
                        color: '#fff'
                    },
                    colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
                    xaxis: {
                        tickColor: "rgba(51, 51, 51, 0.06)",
                        mode: "time",
                        tickSize: [1, "day"],
                        //tickLength: 10,
                        axisLabel: "Date",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Verdana, Arial',
                        axisLabelPadding: 10
                                //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
                    },
                    yaxis: {
                        ticks: 8,
                        tickColor: "rgba(51, 51, 51, 0.06)",
                    },
                    tooltip: false
                });

                function gd(year, month, day) {
                    return new Date(year, month - 1, day).getTime();
                }
            });
        </script>

        <!-- worldmap -->
        <script type="text/javascript" src="{{URL::asset('js')}}/maps/jquery-jvectormap-2.0.3.min.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/maps/gdp-data.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/maps/jquery-jvectormap-world-mill-en.js"></script>
        <script type="text/javascript" src="{{URL::asset('js')}}/maps/jquery-jvectormap-us-aea-en.js"></script>
        <!-- pace -->
        <script src="{{URL::asset('js')}}/pace/pace.min.js"></script>
        <script>
            $(function () {
                $('#world-map-gdp').vectorMap({
                    map: 'world_mill_en',
                    backgroundColor: 'transparent',
                    zoomOnScroll: false,
                    series: {
                        regions: [{
                                values: gdpData,
                                scale: ['#E6F2F0', '#149B7E'],
                                normalizeFunction: 'polynomial'
                            }]
                    },
                    onRegionTipShow: function (e, el, code) {
                        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                    }
                });
            });
        </script>
        <!-- skycons -->
        <script src="{{URL::asset('js')}}/skycons/skycons.min.js"></script>
        <script>
            var icons = new Skycons({
                "color": "#73879C"
            }),
                    list = [
                        "clear-day", "clear-night", "partly-cloudy-day",
                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                        "fog"
                    ],
                    i;

            for (i = list.length; i--; )
                icons.set(list[i], list[i]);

            icons.play();
        </script>

        <!-- dashbord linegraph -->
        <script>
            var doughnutData = [
                {
                    value: 30,
                    color: "#455C73"
                },
                {
                    value: 30,
                    color: "#9B59B6"
                },
                {
                    value: 60,
                    color: "#BDC3C7"
                },
                {
                    value: 100,
                    color: "#26B99A"
                },
                {
                    value: 120,
                    color: "#3498DB"
                }
            ];
            var myDoughnut = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(doughnutData);
        </script>
        <!-- /dashbord linegraph -->
        <!-- datepicker -->
        <script type="text/javascript">
            $(document).ready(function () {

                var cb = function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
                }

                var optionSet1 = {
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2012',
                    maxDate: '12/31/2015',
                    dateLimit: {
                        days: 60
                    },
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    buttonClasses: ['btn btn-default'],
                    applyClass: 'btn-small btn-primary',
                    cancelClass: 'btn-small',
                    format: 'MM/DD/YYYY',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Clear',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                };
                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
                $('#reportrange').daterangepicker(optionSet1, cb);
                $('#reportrange').on('show.daterangepicker', function () {
                    console.log("show event fired");
                });
                $('#reportrange').on('hide.daterangepicker', function () {
                    console.log("hide event fired");
                });
                $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                    console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
                });
                $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                    console.log("cancel event fired");
                });
                $('#options1').click(function () {
                    $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
                });
                $('#options2').click(function () {
                    $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
                });
                $('#destroy').click(function () {
                    $('#reportrange').data('daterangepicker').remove();
                });
            });
        </script>
        <script>
            NProgress.done();
        </script>
        <!-- /datepicker -->
        <!-- /table -->
        <script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "<?php echo base_path('js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>
        <!-- /footer content -->
    </body>

</html>


