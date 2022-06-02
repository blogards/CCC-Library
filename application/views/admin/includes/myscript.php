<script>
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var year = new Date().getFullYear()
        config = {
                data: [{
                    month: year + '-01',
                    trans: <?php echo $tjan?>,
                }, {
                    month: year + '-02',
                    trans: <?php echo $tfeb?>,
                }, {
                    month: year + '-03',
                    trans: <?php echo $tmar?>,
                }, {
                    month: year + '-04',
                    trans: <?php echo $tapr?>,
                }, {
                    month: year + '-05',
                    trans: <?php echo $tmay?>,
                }, {
                    month: year + '-06',
                    trans: <?php echo $tjun?>,
                },
                {
                    month: year + '-07',
                    trans: <?php echo $tjul?>,
                },{
                    month: year + '-08',
                    trans: <?php echo $taug?>,
                }, {
                    month: year + '-09',
                    trans: <?php echo $tsep?>,
                }, {
                    month: year + '-10',
                    trans: <?php echo $toct?>,
                }, {
                    month: year + '-11',
                    trans: <?php echo $tnov?>,
                },
                {
                    month: year + '-12',
                    trans: <?php echo $tdec?>,
                }],
                xLabelFormat: function (x) { return months[x.getMonth()]; },
                xkey: 'month',
                ykeys: ['trans'],
                labels: ['Book transactions'],
                fillOpacity: 0.6,
                gridLineColor: '#e0e0e0',
                // lineWidth: 1,
                barColors: ['#006DF0', '#933EC5', '#65b12d'],
                hideHover: 'auto',
                behaveLikeLine: true,
                resize: true,
                pointFillColors:['#f8d18b1c'],
                pointStrokeColors:['blue'],
                lineColors:['orange','red']
            };
        
        config.element = 'area-chart';
        Morris.Area(config);
        
        config.element = 'line-chart';
        Morris.Line(config);
        </script>