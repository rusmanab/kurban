<script>
var ChartsAmcharts = function(data) {


    var initChartSample6 = function(data) {
        var chart = AmCharts.makeChart("chart_6", {
            "type": "pie",
            "theme": "light",

            "fontFamily": 'Open Sans',
            
            "color":    '#888',

            "dataProvider": [{
                "country": "Done",
                "litres": data.done
            }, {
                "country": "Rejected",
                "litres": data.rejected
            }, {
                "country": "Onprogress",
                "litres": data.onprocess
            }],
            "valueField": "litres",
            "titleField": "country",
            /*"exportConfig": {
                menuItems: [{
                    icon: App.getGlobalPluginsPath() + "amcharts/amcharts/images/export.png",
                    format: 'png'
                }]
            }*/
        });

        $('#chart_6').closest('.portlet').find('.fullscreen').click(function() {
            chart.invalidateSize();
        });
    }

    

    return {
        //main function to initiate the module

        init: function(data) {

            initChartSample6(data);
           
        }

    };

}();

jQuery(document).ready(function() {   
    $.ajax({
        dataType : "json",
        type : "post",
        data : "userid=<?php echo $this->userid ?>",
        url : "<?php echo site_url('home/loadStatistik')?>",
        success: function(data){
            ChartsAmcharts.init(data);
            console.log(data.onprocess); 
        }
    })
   
});
</script>