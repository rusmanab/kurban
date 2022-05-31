<script type="text/javascript">
   
    $(document).ready(function() {
       
     
		$('#highchart_3').highcharts({
        chart: {
            type: 'area',
            style: {
                fontFamily: 'Open Sans'
            }
        },
        title: {
            text: 'Revenue'
        },
        /*subtitle: {
            text: 'Source: Wikipedia.org'
        },*/
        xAxis: {
            categories: ['2 Maret', '3 Maret', '4 Maret', '5 Maret', '6 Maret', '7 Maret', '8 Maret'],
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Billions'
            },
            /*labels: {
                formatter: function () {
                   //return this.value / 1000;
                }
            }*/
        },
        tooltip: {
            shared: true,
            valueSuffix: ' millions'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
            name: 'Maret 2017',
            data: [502, 635, 809, 947, 1402, 3634, 5268]
        }]
    });
 
    
    var initChartSample6 = function() {
        var chart = AmCharts.makeChart("chart_6", {
            "type": "pie",
            "theme": "light",

            "fontFamily": 'Open Sans',
            
            "color":    '#888',

            "dataProvider": [{
                "country": "Lithuania",
                "litres": 501.9
            }, {
                "country": "Czech Republic",
                "litres": 301.9
            }, {
                "country": "Ireland",
                "litres": 201.1
            }, {
                "country": "Germany",
                "litres": 165.8
            }],
            "valueField": "litres",
            "titleField": "country",
            "exportConfig": {
                menuItems: [{
                    icon: App.getGlobalPluginsPath() + "amcharts/amcharts/images/export.png",
                    format: 'png'
                }]
            }
        });

        $('#chart_6').closest('.portlet').find('.fullscreen').click(function() {
            initChartSample6();
        });
    }
    initChartSample6();
    
  });
    
</script>