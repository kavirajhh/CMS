    
<?php session_start(); ?>


<?php include_once('db/conn.php'); ?>


<?php

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
        include_once('header.php');
      
        ?>
<body>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
  
<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
        <h2 class="pageheader-title"><i class="fa fa-globe" aria-hidden="true"></i> Manage Country</h2>
        
    </div>
  </div>
</div>

<!-- this is model button -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_data_Modal" data-whatever="@mdo">+ Add New Country</button>

<!-- model body start -->
<div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="add_data_Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_data_Modal">+ Add Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" id="insert_form">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Select Country:</label>
            <select name="country" id="country" class="form-control" require>
								<option selected disabled> Select Country</option>
								<?php
                              
                                $get_con = "SELECT * FROM country WHERE select_status=0 order by countryname";
                                $run_con = mysqli_query($conn, $get_con);
                                                    
                                while ($row_con=mysqli_fetch_array($run_con)) {
                                    $CountryName = $row_con['countryname'];
                                    $code = $row_con['code'];
                                                        
                                    echo "<option value='$code'> $CountryName </option>";
                                } ?>
								</select>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Currency Rate:</label>
            <input type="text" class="form-control" name="c_rate" id="c_rate">
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Share :</label>
            <input type="text" class="form-control" name="share" id="share" placeholder="%">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="insert" id="insert" value="add" class="btn btn-primary" />
      </div>
      </form>
    </div>
  </div>
</div>
<!-- model body end -->

<div class="tile mb-4">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
            <div class="table-responsive">
                    <table id="loadData1" class="table table-striped table-bordered table-hover display" ><!-- table table-striped table-bordered table-hover begin -->
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">count</th>
                                <!-- <th>Country ID</th> -->
                                <th>Country name: </th>
                                <th>Currency Rate: </th>
                                <th>Share: </th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
          
                                $i=0;
                                                    
                                $get_cou = "SELECT * FROM country WHERE select_status=1";
                                                        
                                $run_cou = mysqli_query($conn, $get_cou);
                                
                                while ($row_cou=mysqli_fetch_array($run_cou)) {
                                    $countrycode = $row_cou['countrycode'];
                                    $countryname = $row_cou['countryname'];
                                    $code = $row_cou['code'];
                                    $currency = $row_cou['currency'];
                                    $currency_rate = $row_cou['currency_rate'];
                      
                                    $i++; ?>
                            
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                
                                <td><?php echo $countryname; ?> </td>
                                <td>1 EUR = <?php echo $currency_rate; echo $currency; ?> </td>
                                <td>
                                <?php
                                    
                                    $get_sh = "SELECT * FROM share WHERE countrycode='$code'";             
                                    $run_sh = mysqli_query($conn, $get_sh);
                                    while ($row_sh=mysqli_fetch_array($run_sh)) {
                                        $share = $row_sh['share'];

                                    echo $share;

                                ?> %</td>
 
                                <td>
									<div class="dropdown">
										<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="fa fa-ellipsis-h"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="edit_currency.php?edit_currency=<?php echo $code;  ?>"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="dropdown-item d" href="delete.php?delete_country=<?php echo $code; ?>" onclick="return confirm('Do you want to delete..')"><i class="fa fa-trash"></i> Delete</a>
										</div>
									</div>
                                </td>
                            </tr>
                            <?php }} ?>   
                        </tbody>
                    </table>
                <div>
            </div>
		</div>            
	</div>
</div>
</div>
</div>
</div>
<?php include_once('footer.php') ?>

<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#country').val() == "")  
  {  
   alert("country is required");  
  }  
  
  else  
  {  
   $.ajax({  
    url:"add_countries.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
        $('#insert_form')[0].reset();  
        $('#add_data_Modal').modal('hide');
        location.reload();
    }  
   });  
  }  

 });

});  
 </script>
 <script type="text/javascript">
            $(document).ready(function(){
                $('#loadData1').DataTable();

            });
</script>
</body>
<?php 
 }?>