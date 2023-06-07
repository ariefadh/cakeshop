<?php include 'theme/header.php'; ?>

     
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
           
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
          <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="index.php">
                 <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li> 
            <li>
            <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=bonus">
                <i class="glyphicon glyphicon-usd"></i> <span>Hitung Bonus</span>  
              </a>
            </li> 
            <li class="float-right menu-arrow" >
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=pegawai"class="waves-effect">
                <i class="fa fa-database"></i> <span>Detail - Menu</span>  
              </a>
              <ul class="submenu">
                <li class="float-right menu-arrow"><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=departemen"><i class="fa fa-user"></i> <span>Departemen</span></li>
              </ul>
              <ul class="submenu">
                <li class="float-right menu-arrow"><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=jabatan"><i class="fa fa-user"></i> <span>Jabatan</span></li>
              </ul>
              <ul class="submenu">
                <li class="float-right menu-arrow"><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=emp"><i class="fa fa-user"></i> <span>Pegawai</span></li>
              </ul>
              <ul class="submenu">
                <li class="float-right menu-arrow"><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=izin"><i class="fa fa-calendar-minus-o"></i> <span>Izin/Cuti</span></li>
              </ul>
            </li> 
            <li class="active" >
            <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=admin">
                <i class="fa fa-square"></i> <span>Kelola Akses</span>  
              </a>
            </li> 
           
           </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             PEGAWAI
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Pegawai</a></li>
            <li class="active">List pegawai</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
            
                        $id_pegawai=$_GET['id_pegawai'];
                        $sql="SELECT  * FROM pegawai where id_pegawai='$id_pegawai' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                Edit Pegawai
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="aksi.php?sender=editemp" method="POST">
                  <div class="box-body">
                        <div class="row">
                    <div class="col-md-12 form-group">
                    <label>ID Pegawai</label>
                    <input readonly="" type="hidden" name="id_pegawai" value="<?php echo $row['id_pegawai'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="id_pegawai" value="<?php echo $row['id_pegawai'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>  
                     <div class="col-md-12 form-group">
                         <label>ID Departement</label>
                         <textarea class="form-control" placeholder="Enter..." name="id_departemen" type="text"><?php echo $row['id_departemen'];?></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                         <label>ID Jabatan</label>
                         <textarea class="form-control" placeholder="Enter..." name="id_jabatan" type="text"><?php echo $row['id_jabatan'];?></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                         <label>Nama Pegawai</label>
                         <textarea class="form-control" placeholder="Enter..." name="nama_pegawai" type="text"><?php echo $row['nama_pegawai'];?></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                         <label>Tanggal Lahir</label>
                         <textarea class="form-control" placeholder="Enter..." name="tanggal_lahir" type="text"><?php echo $row['tanggal_lahir'];?></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                         <label>Alamat</label>
                         <textarea class="form-control" placeholder="Enter..." name="alamat" type="text"><?php echo $row['alamat'];?></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                         <label>Tanggal Masuk</label>
                         <textarea class="form-control" placeholder="Enter..." name="tanggal_masuk" type="text"><?php echo $row['tanggal_masuk'];?></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                         <label>Status</label>
                         <textarea class="form-control" placeholder="Enter..." name="status" type="text"><?php echo $row['status'];?></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                         <label>Kontak</label>
                         <textarea class="form-control" placeholder="Enter..." name="kontak" type="text"><?php echo $row['kontak'];?></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                         <label>Gaji</label>
                         <textarea class="form-control" placeholder="Enter..." name="gaji" type="text"><?php echo $row['gaji'];?></textarea>
                    </div>
                    </div>
                    
                 <div class="col-md-12 form-group"> 
                   <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-send"></span> Simpan</button>
                 </div>
                </div> 
                  </div></form>
              </div>
                   <?php                
                       }      
                    }  else {
                    echo '';    
                    }
                    }?> 
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li> Tambah</a></h3>
              <div class="box-tools pull-right">
                 </div>
            </div>
            <div class="table-responsive">
                               <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr>        
                      <th>ID pegawai</th>          
                        <th>ID Departement</th>
                        <th>ID Jabatan</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Kontak</th>
                        <th>Gaji</th>
                        <th>Aksi</th>

                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM pegawai";
                       
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                        <td><?php echo $row['id_pegawai'];?></td>
                            <td><?php echo $row['id_departemen'];?></td>
                            <td><?php echo $row['id_jabatan'];?></td>
                            <td><?php echo $row['nama_pegawai'];?></td>
                            <td><?php echo $row['tanggal_lahir'];?></td>
                            <td><?php echo $row['alamat'];?></td>
                            <td><?php echo $row['tanggal_masuk'];?></td>
                            <td><?php echo $row['status'];?></td>
                            <td><?php echo $row['kontak'];?></td>
                            <td><?php echo $row['gaji'];?></td>
                            <td>
                            <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=emp&edit&id_pegawai=<?php echo $row['id_pegawai'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                                <a href="aksi.php?sender=hapusemp&id_pegawai=<?php echo $row['id_pegawai']; ?>" class="btn btn-danger"><li class="fa fa-trash-o"></li> Hapus</a> 
                             </td>
                        </tr> 
                        
                            <?php    
                  
                        }
                    }  else {
                    echo '';    
                    }
                    }?>
                    
                    </tbody>
                   
                     
                  </table>
            </div><!-- /.box-body -->

          </div><!-- /.box --> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
      
       <!-- To Add New Record -->
<!-- ADD -->
<form action="aksi.php?sender=addemp" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title" id="myModalLabel">Tambah Pegawai</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 
 <div class="form-group">
      <label>ID Pegawai</label>
      <textarea type="text" name="id_pegawai" class="form-control" placeholder="Enter ..."></textarea> 
    </div>

    <div class="form-group">
      <label>ID Departemen</label>
      <input type="text" name="id_departemen" class="form-control" required="" placeholder="Enter ...">
    </div>
 

    <div class="form-group">
      <label>ID Jabatan</label>
      <textarea type="text" name="id_jabatan" class="form-control" placeholder="Enter ..."></textarea> 
    </div>

    <div class="form-group">
      <label>Nama Pegawai</label>
      <textarea type="text" name="nama_pegawai" class="form-control" placeholder="Enter ..."></textarea>
    </div>
    <div class="form-group">
      <label>Tanggal Lahir</label>
      <textarea type="text" name="tanggal_lahir" class="form-control" placeholder="Enter ..."></textarea>
    </div>
    <div class="form-group">
      <label>Alamat</label>
      <textarea type="text" name="alamat" class="form-control" placeholder="Enter ..."></textarea>
    </div>
    <div class="form-group">
      <label>Tanggal Masuk</label>
      <textarea type="text" name="tanggal_masuk" class="form-control" placeholder="Enter ..."></textarea>
    </div>
    <div class="form-group">
      <label>Status</label>
      <textarea type="text" name="status" class="form-control" placeholder="Enter ..."></textarea>
    </div>
    <div class="form-group">
      <label>Kontak</label>
      <textarea type="text" name="kontak" class="form-control" placeholder="Enter ..."></textarea>
    </div>
    <div class="form-group">
      <label>Gaji</label>
      <textarea type="text" name="gaji" class="form-control" placeholder="Enter ..."></textarea>
    </div>
 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
<button type="submit" class="btn btn-info"> Simpan</button> 
  
</div>
   
</div>
</div>
</div>
</form>

      <!-- Content Wrapper. Contains page content -->

<?php include 'theme/footer.php'; ?>