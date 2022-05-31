    <script type="text/javascript">
    $(document).ready(function(e){
        var oBj = "";
        <?php if (isset($detail) && !empty($detail)){?> 
         
        $("#city_id").empty();
        $("#city_id").append( '<option value="0" selected="selected">--Pilih Kota--</option>' );
        var cityId = <?php echo $detail->city_id ? $detail->city_id : 0 ?>;
        
        $.ajax({
            url: "<?php echo site_url('Myaccount/getCity')?>",
            type: "post",
            data: "province_id=<?php echo $detail->province_id ?>",
            success: function(response){
                oBj = response.results;
                
                for (i in oBj) {
                  //x += results[i].city_id + "<br>";
                  var selected = "";
                  if( oBj[i].city_id == cityId){
                     selected = " selected ";
                  }
                  $("#city_id").append( '<option value="'+ oBj[i].city_id +'" ' + selected + ' >'+ oBj[i].type + " " + oBj[i].city_name +'</option>' );
                }
                
            }                
        })
        <?php }?>
        $("#province_id").on("change", function(e){
            var provinceS = $( "#province_id option:selected" ).text();
            $("#province").val(provinceS);
            
            $("#city_id").empty();
            $("#city_id").append( '<option value="0" selected="selected">--Pilih Kota--</option>' );
            var province = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Myaccount/getCity')?>",
                type: "post",
                data: "province_id=" + province,
                success: function(response){
                    oBj = response.results;
                    
                    for (i in oBj) {
                      //x += results[i].city_id + "<br>";
                      console.log( oBj[i].city_id );
                      $("#city_id").append( '<option value="'+ oBj[i].city_id +'" >'+ oBj[i].type + " " + oBj[i].city_name +'</option>' );
                    }
                    
                }                
            })
        })
        
        $("#city_id").on("change", function(e){
            var i = $("#city_id").prop("selectedIndex");
            var province = oBj[i].province;
            var kota = oBj[i].type + " " + oBj[i].city_name;
            
            $("#province").val(province);
            $("#city").val(kota);
             
        })
    })
    </script>