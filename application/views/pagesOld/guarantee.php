<main role="main" class="mains mains-2" id="main-garansi">
        <div class="container">
            <!--<div class="row no-padding">-->
                
            <!--    <div class="col-xs-12 col-md-12 col-sm-12 col-xs-12 no-padding">-->
            <!--        <div class="for-banners">-->
            <!--            <div class="bg-white row detail-content-desc">-->
            <!--                <div class="col-md-12">-->
            <!--                    <img src="<?php echo base_url($catgory->image_big);?>">-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="container bg-white">
                <div class="related-product row product-featured">
                    
                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success" id="success-alert">
                        <a href="" class="close" data-dismiss="alert">&times;</a>
                        <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php }else if($this->session->flashdata('error')){  ?>
                        <div class="alert alert-danger" id="error-alert">
                            <a href="" class="close" data-dismiss="alert">&times;</a>
                            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } ?>
		
		<div class="wrap-contact100">
            <?php
            $attr = array(
                        'class' => "contact100-form validate-form"
                        );
            echo form_open('guarantee_submit',$attr);
            ?>
			
				<div class="text-center titlepadgaransi">
				    <span class="contact100-form-title">
    					Garansi Excellent Scale<hr>
    				</span>
				</div>

				<div class="form-group wrap-input100 rs1-wrap-input100 validate-input" data-validate="Nama tidak boleh kosong">
					<span class="label-input100">Nama Pembeli *</span>
					<input class="input100 form-control" type="text" name="name" placeholder="Masukkan Nama Pembeli">
				</div>

				<div class="form-group wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Email valid dibutuhkan: cnth.@abc.xyz">
					<span class="label-input100">Alamat Email *</span>
					<input class="input100 form-control" type="text" name="email" placeholder="Alamat Email Anda">
				</div>

				<div class="form-group wrap-input100 validate-input" data-validate="Alamat tidak boleh kosong">
					<span class="label-input100">Alamat Rumah 1*</span>
					<input class="input100 form-control" type="text" name="address1" placeholder="contoh: Jl. Jendral Sudirman No.32">
				</div>

				<div class="form-group wrap-input100 validate-input">
					<span class="label-input100">Alamat Rumah 2 (Optional)</span>
					<input class="input100 form-control" type="text" name="address2" placeholder="Alamat Optional">
				</div>

				<div class="form-group wrap-input100 rs1-wrap-input100 validate-input" data-validate="Provinsi tidak boleh kosong">
					<span class="label-input100">Provinsi*</span>
					<input class="input100 form-control" type="text" name="provinsi" placeholder="Masukkan nama Provinsi">
				</div>

				<div class="form-group wrap-input100 rs1-wrap-input100 validate-input" data-validate="Kode Pos tidak boleh kosong">
					<span class="label-input100">Kode Pos*</span>
					<input class="input100 form-control" type="text" name="kode_pos" placeholder="Masukkan Kode Pos">
				</div>

				<div class="form-group wrap-input100 validate-input" data-validate="Nomor Telpon tidak boleh kosong">
					<span class="label-input100">Nomor Telpon*</span>
					<input class="input100 form-control" type="text" name="notelp" placeholder="Masukkan Nomor Telpon">
				</div>

				<div class="form-group wrap-input100 rs1-wrap-input100 validate-input" data-validate="Kolom tidak boleh kosong">
					<span class="label-input100">Tipe Unit*</span>
					<input class="input100 form-control" type="text" name="tipe_unit" placeholder="Masukkan Tipe Unit Produk">
				</div>

				<div class="form-group wrap-input100 rs1-wrap-input100 validate-input" data-validate="Kolom tidak boleh kosong">
					<span class="label-input100">Tanggal Pembelian*</span>
					<input class="input100 form-control" type="date" name="date_buying" placeholder="Masukkan Tanggal Pembelian">
				</div>

				<div class="form-group wrap-input100 rs1-wrap-input100 validate-input" data-validate="Kolom tidak boleh kosong">
					<span class="label-input100">Serial Number*</span>
					<input class="input100 form-control" type="text" name="serial_number" placeholder="Serial Number Produk">
				</div>

				<div class="form-group wrap-input100 rs1-wrap-input100 validate-input" data-validate="Kolom tidak boleh kosong">
					<span class="label-input100">Model*</span>
					<input class="input100 form-control" type="text" name="model" placeholder="Model Produk">
				</div>

				<div class="form-group wrap-input100 validate-input" data-validate="Kolom tidak boleh kosong">
					<span class="label-input100">Outlet Pembelian*</span>
					<input class="input100 form-control" type="text" name="outlet" placeholder="Outlet Pembelian Produk">
				</div>

				<div class="container-contact100-form-btn text-center">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							Submit
						</button>
					</div>
				</div>
			<?php echo form_close()?>
		</div>
                    
                </div>
            </div>

        </div>
    </main>