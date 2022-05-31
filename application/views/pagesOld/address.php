    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Daftar Alamat</h3>
        </div>
        <div class="panel-body">
            <a href="<?php echo site_url('myaccount/address/add') ?>" class="btn btn-primary">Tambah Alamat</a>
            <hr />
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Utama</th>
                            <th style="min-width: 165px;">Penerima</th>
                            <th>Alamat Pengiriman</th>
                            <th>Daerah Pengiriman</th>
                            <th style="min-width: 165px;"></th>
                        </tr>    
                    </thead>
                    <tbody>
                        <?php foreach($listAddress as $a){?> 
                        <tr>
                            <td><input type="radio" value="1" name="is_default" <?php echo $a->is_default ? "checked" :"" ?> /></td>
                            <td><strong><?php echo $a->recipient ?></strong><br /><?php echo $a->phone_number ?></td>
                            <td><strong><?php echo $a->nama_alamat ?></strong><br /><?php echo $a->address ?></td>
                            <td><?php echo $a->province ?>,<?php echo $a->city ?><br />Indonesia</td>
                            <td>
                                <a href="<?php echo site_url('myaccount/address/edit/'.$a->id)?>" class="btn btn-info btn-sm fa fa-pencil"> Ubah</a>
                                <a href="<?php echo site_url('myaccount/address/delete/'.$a->id)?>" class="btn btn-warning btn-sm fa fa-trash"> Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>