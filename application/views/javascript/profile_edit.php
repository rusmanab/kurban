    <script type="text/javascript">
    $(document).ready(function(e){
        var oBj = "";
        <?php if (isset($userInfo)){?> 
         
        $("#city_id").empty();
        $("#city_id").append( '<option value="0" selected="selected">--Pilih Kota--</option>' );
        var cityId = <?php echo $userInfo->kota_id ? $userInfo->kota_id : 0 ?>;
        
        $.ajax({
            url: "<?php echo site_url('apicatalog/getCity')?>",
            type: "post",
            data: "province_id=<?php echo $userInfo->provinsi_id ?>",
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
            
            $("#city_id").empty();
            $("#city_id").append( '<option value="0" selected="selected">--Pilih Kota--</option>' );
            var province = $(this).val();
            
            var provinceS = $( "#province_id option:selected" ).text();
            $("#province").val(provinceS);
            
            $.ajax({
                url: "<?php echo site_url('apicatalog/getCity')?>",
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