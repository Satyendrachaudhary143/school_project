<form class="row g-3 needs-validation sub mx-3" novalidate id ="admission">
  <h1 class ="text-primary text-center">Admission now</h1>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationCustom01" value=""name ="first" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationCustom02" value="" required name ="last">
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Email id</label>
    <div class="input-group has-validation">
      
      <input type="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required name ="email">
      <div class="invalid-feedback">
        Please provid a valid email.
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom03" class="form-label">Mobile No.</label>
    <input type="number" class="form-control" id="validationCustom03" required name ="number">
    <div class="invalid-feedback">
      Please provide a valid number.
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom03" class="form-label">Password</label>
    <input type="password" class="form-control" id="validationCustom03" required name ="password">
    <div class="invalid-feedback">
      Please provide a valid pssword.
    </div>
  </div>
  
  <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Class</label>
        <select
          class="form-select scv"
          id="validationCustom01"
           name="class"
          required
         
        >
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
       
        <div class="invalid-feedback">Please select a valid Category.</div>
        <div class="valid-feedback">Looks good!</div>
      </div>


      <div class="col-md-4">
    <label for="validationCustom03" class="form-label">Studend id</label>
    <input type="text" class="form-control stud_id" id="validationCustom03" required name ="student_id">
    <div class="invalid-feedback">
      Please provide a valid studend id.
    </div>
    <div class="text-danger d-none st_al">
      This student id already exist.
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationCustom05" class="form-label">Address</label>
    <input type="text" class="form-control" id="validationCustom05" required name ="address">
    <div class="invalid-feedback">
      Please provide a valid address.
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationCustom05" class="form-label">Admission fees</label>
    <input type="number" class="form-control" id="validationCustom05" required name ="admission_fees">
    <div class="invalid-feedback">
      Please provide a valid admission fees.
    </div>
  </div>
  
  <div class="col-md-4">
    <label for="validationCustom05" class="form-label">Tution fees (per month)</label>
    <input type="number" class="form-control" id="validationCustom05" required name ="tution_fees">
    <div class="invalid-feedback">
      Please provide a valid tution fees.
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationCustom05" class="form-label">Other fees (per month)</label>
    <input type="number" class="form-control" id="validationCustom05" required name ="other_fees"> 
    <div class="invalid-feedback">
      Please provide a valid fees.
    </div>
  </div>


  <div class="col-12 text-center">
    <button class="btn btn-primary subm" type="submit">Admission Now</button>
  </div>
</form>

<script>
    $(document).ready(function(){
   $(".sub").submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
                    $.ajax({
                      url: "php/admission.php",
                      type: "POST",
                      data: formData,
                      processData: false,
                      contentType: false,
                     
                      success: function (response) {
                        alert(response);
                        
                      },
                    });
   })
   $(".stud_id").blur(function(){
    var vl =$(this).val();
    $.ajax({
      url:"php/ch_std_id.php",
      type:"POST",
      data:{
    std_id:vl
      },
      success:function(res){
       if (res==="already exist") {
      $(".st_al").removeClass("d-none");
      $(".subm").attr("disabled","disabled");
        
       }
       else if (res==="new") {
        $(".st_al").addClass("d-none");
        $(".subm").removeAttr("disabled","disabled");
       }
       else{
        alert(res);
       }
      }
    })
   })
    })
</script>