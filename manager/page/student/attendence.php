<?php
 $db = new mysqli("localhost","root","","school");
$total_st=0;

 $data =$db->query("SELECT * FROM admission");
 if ($data->num_rows !=0) {
while($aa = $data->fetch_assoc()){
  $aa["id"];
  $total_st=$total_st+1;
}
 }

?>


<form class="row g-3 needs-validation" novalidate>
  <h1 class="text-center text-primary">Student Dashboard</h1>
<div class="col-md-4">
    <label for="validationCustom02" class="form-label">Total student</label>
    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $total_st; ?>" required disabled>
   
  </div>

  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Absent student</label>
    <input type="text" class="form-control" id="validationCustom01" value="Otto" required disabled>
   
  </div>

  <div class="col-md-4">
    <label for="validationCustom03" class="form-label">Parsent student</label>
    <input type="text" class="form-control" id="validationCustom03" value="Otto" required disabled>
  
  </div>

<div class="col-md-3">
    <label for="validationCustom04" class="form-label">Class</label>
    <select class="form-select t_s_c" id="validationCustom04" required>
      <option selected disabled value="">Choose...</option>
      <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
    </select>

</div>


  <div class="col-md-3">
    <label for="validationCustom02" class="form-label">Total student</label>
    <input type="text" class="form-control ts" id="validationCustom02" value="" required disabled>
  
  </div>
  
  
  
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Absent student</label>
    <input type="text" class="form-control" id="validationCustom05" value="Otto" required disabled>
   
  </div>

  <div class="col-md-3">
    <label for="validationCustom06" class="form-label">Parsent student</label>
    <input type="text" class="form-control" id="validationCustom06" value="Otto" required disabled>
  
  </div>

</form>

<script>
  $(document).ready(function(){
    $(".t_s_c").change(function(){
      var v = $(this).val();
      $.ajax({
          type:"POST",
          url:"php/to_st_ch.php",
          data:{
            v:v
          },
          success:function(res){
            $(".ts").val(res);
          }
      })
    })
  })
</script>