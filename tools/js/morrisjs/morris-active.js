// Dashboard 1 Morris-chart

Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2011',
            Python: 0,
            PHP: 0,
            Java: 0
        }, {
            period: '2013',
            Python: 100,
            PHP: 80,
            Java: 65
        }, {
            period: '2014',
            Python: 180,
            PHP: 150,
            Java: 120
        }, {
            period: '2015',
            Python: 100,
            PHP: 70,
            Java: 40
        }, {
            period: '2016',
            Python: 180,
            PHP: 150,
            Java: 120
        }, {
            period: '2017',
            Python: 100,
            PHP: 70,
            Java: 40
        },
         {
            period: '2018',
            Python: 180,
            PHP: 150,
            Java: 120
        }],
        xkey: 'period',
        ykeys: ['Python', 'PHP', 'Java'],
        labels: ['Python', 'PHP', 'Java'],
        pointSize: 0,
        fillOpacity: 0.99,
        pointStrokeColors:['#65b12d', '#933EC5 ', '#006DF0'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth:0,
        hideHover: 'auto',
        lineColors: ['#65b12d', '#933EC5 ', '#006DF0'],
        resize: true
        
    });


var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
var year = new Date().getFullYear()
// {<?php echo $tjan; ?>};
// var serries = JSON.parse(`<?php echo $chart_data; ?>`);
//   console.log(serries);
//   var data = serries,
// alert(JSON.parse('<?php echo $tjan; ?>'));
Morris.Area({

        element: 'extra-area-chart',
        data: [{
            month: year + '-01',
            trans: 0,
            // Accounting: 80,
            // Electrical: 20
        }, {
            month: year + '-02',
            trans: 130,
            // Accounting: 100,
            // Electrical: 80
        }, {
            month: year + '-03',
            trans: 80,
            // Accounting: 60,
            // Electrical: 70
        }, {
            month: year + '-04',
            trans: 70,
            // Accounting: 200,
            // Electrical: 140
        }, {
            month: year + '-05',
            trans: 180,
            // Accounting: 150,
            // Electrical: 140
        }, {
            month: year + '-06',
            trans: 105,
            // Accounting: 100,
            // Electrical: 80
        },
         {
            month: year + '-07',
            trans: 250,
            // Accounting: 150,
            // Electrical: 200
        },{
            month: year + '-08',
            trans: 80,
            // Accounting: 60,
            // Electrical: 70
        }, {
            month: year + '-09',
            trans: 70,
            // Accounting: 200,
            // Electrical: 140
        }, {
            month: year + '-10',
            trans: 180,
            // Accounting: 150,
            // Electrical: 140
        }, {
            month: year + '-11',
            trans: 105,
            // Accounting: 100,
            // Electrical: 80
        },
         {
            month: year + '-12',
            trans: 250,
            // Accounting: 150,
            // Electrical: 200
        }],
        // later on
        xLabelFormat: function (x) { return months[x.getMonth()]; },
        xkey: 'month',
        ykeys: ['trans'],
        labels: ['Book transactions'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#006DF0', '#933EC5', '#65b12d'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 1,
        hideHover: 'auto',
        barColors: ['#006DF0', '#933EC5', '#65b12d'],
        resize: true
        
    });