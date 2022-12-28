   <?php $this->load->view('includes/common'); ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   </head>
   <body> 
   <?php $this->load->view('includes/header'); ?>
   <?php $this->load->view('includes/sidebar'); ?>
<div class="content-wrapper">
  <!-- New User Modal -->
  <div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h1>Users
                    <small>List</small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>
                </h1>
            </div>
             
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                  <?php  $sr_no = 1; ?>
                  <?php 
                if($h) {
            foreach ($h as $product) {
             
               ?>
                <tr>
                    <td><?php echo $sr_no; 
                    $sr_no += 1;?></td>
                    <td><?php echo $product->user_name; ?></td>
                    <td><?php echo $product->email ?></td>
                    <td><?php echo $product->phone_no ?></td>
                    <td><button class="btn btn-secondary edit_btn" id="edit_btn" data-id="<?php echo $product->id ?>" data-url="<?php echo $this->config->base_url('users/edit') ?>" >Edit</button></td>
                    <td><button class="delete-product btn btn-danger" id="delete_btn" data-id="<?php echo $product->id ?>" data-toggle="modal" data-target="#Modal_Delete">Delete</button></td>
                </tr>
            <?php }
        } else { ?>
            <td class="text-center" colspan="6">No data Available</td>
        <?php } ?>
                </tbody>
            </table>
            <?php echo validation_errors(); ?>
        </div>
    </div>
         
 </div>


         <!-- MODAL ADD -->
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form method="post" action="<?php echo $this->config->base_url('users/save') ?>">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">User Name:</label>
                            <div class="col-md-10">
                              <input type="text" name="user_name" id="user_name" class="form-control" placeholder="user name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email:</label>
                            <div class="col-md-10">
                              <input type="text" name="email" id="email" class="form-control" placeholder="user email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Phone No:</label>
                            <div class="col-md-10">
                              <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="phone_no">
                            </div>
                        </div>
                        <div >
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" id="btn_save" class="btn btn-primary">Save</button>
                        </div>
                      </form>
                    </div>

                </div>
              </div>
            </div>
        <!--END MODAL ADD-->
 
        <!-- MODAL EDIT -->
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <form method="get" action="<?php echo $this->config->base_url('users/update') ?>">
                    <input type="hidden" name="id" id="hidden_id_edit">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">User Name:</label>
                            <div class="col-md-10">
                              <input type="text" name="user_name_edit" id="user_name_edit" class="form-control" placeholder="user name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email:</label>
                            <div class="col-md-10">
                              <input type="text" name="email_edit" id="email_edit" class="form-control" placeholder="user email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Phone No:</label>
                            <div class="col-md-10">
                              <input type="text" name="phone_no_edit" id="phone_no_edit" class="form-control" placeholder="phone_no">
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
                        </form>
                      </div>
                </div>
              </div>
            </div>
        <!--END MODAL EDIT-->
 
        <!--MODAL DELETE-->
        <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <strong>Are you sure to delete this record?</strong>
                <form method="delete" action="<?php echo $this->config->base_url('users/delete') ?>">
                    <input type="hidden" name="id" id="id" >
                    <input type="hidden" name="user_name_delete" id="user_name_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                </form>
              </div>
                </div>
              </div>
            </div>
        <!--END MODAL DELETE-->
</div>
 

 
        <?php $this->load->view('includes/footer'); ?>

 
<script type="text/javascript">
$(document).ready(function(){
  $('.delete-product').on('click',function(){

   var id_val=($(this).attr('data-id'));
   $('#id').val(id_val);
  });
});


$('.edit_btn').on('click',function(e){
e.preventDefault();
$('#Modal_Edit').modal('show');
   var id=$(this).attr('data-id');

   $('#hidden_id_edit').val(id);
   id=$('#hidden_id_edit').val();
var url=$(this).attr('data-url');
   $.ajax({
    type: "GET",
    dataType: "text",  
         cache:false,
                    url: url,
                    data:{
                      'id':id,
                    },
                    error: function (request, error,text) {
        toastr.error(JSON.parse(request.responseText).message);
    },
                    success: function(response) {
                        var user_name=((JSON.parse(response))[0]).user_name;
                        var phone_no=((JSON.parse(response))[0]).phone_no;
                        var email=((JSON.parse(response))[0]).email;
                     $('#user_name_edit').val(user_name);
                     $('#email_edit').val(email);
                     $('#phone_no_edit').val(phone_no);
                     toastr.info('Edit your book details here!');
}

});
    });
</script>

</body>
   </html>