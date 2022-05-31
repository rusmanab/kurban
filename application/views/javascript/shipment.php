   <script type="text/javascript">
    $(document).ready(function(e){
      
        var oBj = "";
        var id = "<?php echo $addres->city_id?>";
        var totalWeight = "<?php echo $totalWeight?>";
        
        
        var totHarga = $("#totHarga").val();
        var totalOngkir = 0;
        
        var kurirName = "";
        
        //var  total_tagihan
        
        $("#total").html(totHarga);
        hitungTotal();
        
        
        
        function hitungTotal(){
            var total_tagihan = parseInt(totHarga) + parseInt(totalOngkir);
            $("#total_tagihan").html(total_tagihan);
            
            $('.money').simpleMoneyFormat();
            
        }
        
        $("#kurir").on("change", function(e){
            
            var kurir = $(this).val();
            kurirName = $(this).attr("data-kurir");
            
            $("#option-kurir").html("");
            
            $.ajax({
                url: "<?php echo site_url('Myaccount/getCost')?>",
                type: "post",
                data: "destination="+ id +"&weight=" + totalWeight + "&courier=" + kurir,
                success: function(response){
                    oBj = response.cost;
                    
                    for (i in oBj) {
                        var ob = '<div class="radio"><label class="rad-choose">';
                        ob+= '<input type="radio" name="priceShip" ';
                        ob+= ' data-service="' + oBj[i].service +'" class="pilihan" value="'+ oBj[i].cost[0].value +'"> ';
                        ob+= oBj[i].service + " / " + oBj[i].cost[0].value + " Ed " + oBj[i].cost[0].etd;
                        ob+= '</label></div>';
                        $("#option-kurir").append(ob);                        
                    }
                },
                beforeSend: function(){
                // Statement
                    $("#loadingProgress").show();
                },
                complete: function(){
                // Statement
                $("#loadingProgress").hide();
                }             
            })
        });
        
       
        $( "#option-kurir" ).on( "click", ".pilihan", function() {
           var v = $(this).val();
           var service = $(this).attr("data-service");
           totalOngkir = v;
           $("#ongkir").html(v);
           hitungTotal();
           $("#infokurir").val(service); 
        });
        
    })
    </script>