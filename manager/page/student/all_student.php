

<style>
  .bt:hover{
cursor: pointer;
  }
</style>
<?php
 $db = new mysqli("localhost","root","","school");
?>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Class</th>
      <th scope="col">View</th>
      <th scope="col">Leave</th>
      
    </tr>
  </thead>
  <?php
 $data =$db->query("SELECT * FROM admission");
 if ($data->num_rows !=0) {
while($aa = $data->fetch_assoc()){
    echo '  <tbody>
    <tr>
 
      <td>'.$aa["full_name"].'</td>
      <td>'.$aa["class"].'</td>
        <td><i class=" ic cat_del bt" id="'.$aa['id'].'">View</i></td>
         <td><i class=" text-danger cat_del del bt" id="'.$aa['id'].'">Leave</i></td>
     
    </tr>';
}
 }
?>

  
  </tbody>
</table>

<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content  ">
      <div class="modal-header">
        <h5 class="modal-title">Student Information</h5>
        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
 <form class="row g-3 needs-validation sub mx-3" novalidate id ="admission">
 
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Full name</label>
    <input type="hide" class="form-control mdl first" id="validationCustom01" value=""name ="first" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Email id</label>
    <div class="input-group has-validation">
      
      <input type="email" class="form-control mdl email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required name ="email">
      <div class="invalid-feedback">
        Please provid a valid email.
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom03" class="form-label">Mobile No.</label>
    <input type="number" class="form-control mdl number" id="validationCustom03" required name ="number">
    <div class="invalid-feedback">
      Please provide a valid number.
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom03" class="form-label">Password</label>
    <input type="hide" class="form-control mdl pass" id="validationCustom03" required name ="password">
    <div class="invalid-feedback">
      Please provide a valid pssword.
    </div>
  </div>


  
  <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Class</label>
        <input type="number"
          class="form-control scv mdl class"
          id="validationCustom01"
           name="class"
          required
         
        >
        
       
        <div class="invalid-feedback">Please select a valid Category.</div>
        <div class="valid-feedback">Looks good!</div>
      </div>


      <div class="col-md-4">
    <label for="validationCustom03" class="form-label">Studend id</label>
    <input type="hide" class="form-control mdl std" id="validationCustom03" required name ="student_id" disabled>
    <div class="invalid-feedback">
      Please provide a valid studend id.
    </div>
    <div class="text-danger d-none st_al">
      This student id already exist.
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationCustom05" class="form-label">Address</label>
    <input type="hide" class="form-control mdl address" id="validationCustom05" required name ="address">
    <div class="invalid-feedback">
      Please provide a valid address.
    </div>
  </div>
  <input type="hidden" class="hide" name ="id">


</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary clos" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit subm">Update</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" id ="delt"tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger ">Delete student account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure delete account</p>
      </div>
      <div class="modal-footer d-flex  justify-content-between">
        <button type="button" class="btn btn-secondary del_cl" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger del_st">Delete</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){

    // find data from database
    $(".ic").each(function () {
          $(this).click(function () {
            var id=$(this).attr("id");
           
            $.ajax({
  type:"POST",
  url:"php/edit_st.php",
  data:{
    id:id
  },success:function(res){
   var aa = JSON.parse(res);
   var id = $(".hide").val(aa.id);
 var full_name=$(".first").val(aa.full_name);
 var email=$(".email").val(aa.email);
 var number=$(".number").val(aa.mobile);
 var pass =$(".pass").val(aa.password);
 var std_class =$(".class").val(aa.class);
 var std =$(".std").val(aa.student_id);
 var address=$(".address").val(aa.address);

  }
            });
            const my = new bootstrap.Modal('#myModal');
my.show();
           
          });
        });

// edit student
$(".edit").click(function(){
 
 $.ajax({
  url: "php/edit_st_databse.php",
   type: "POST",
   data:{
    id : $(".hide").val(),
  full_name:$(".first").val(),
 email:$(".email").val(),
  number:$(".number").val(),
pass :$(".pass").val(),
 std_class :$(".class").val(),
 std :$(".std").val(),
address:$(".address").val(),
   },
 success:function(res){
 
  alert(res);
  $(".clos").click();
  $("#all_std").click();

 }
  });

})
// delete student

$(".del").each(function () {
          $(this).click(function () {
            var id=$(this).attr("id");
            const delt = new bootstrap.Modal('#delt');
            delt.show();
            $(".del_st").click(function(){
              $.ajax({
  type:"POST",
  url:"php/del_st.php",
  data:{
    id:id
  },success:function(res){
   alert(res)
   $(".del_cl").click();
   $("#all_std").click();

  }
})
            })
   
 });

  })

  
});
</script>


