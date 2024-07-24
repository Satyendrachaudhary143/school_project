<form class="row g-3 needs-validation sp" novalidate>
  <h1 class="text-center text-primary">Fees Dashboard</h1>

<div class="col-md-3">
    <label for="validationCustom04" class="form-label">Class</label>
    <select class="form-select t_s_c" id="validationCustom04" required name="st_b">
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
    <label for="validationCustom02" class="form-label">Name</label>
    <input type="text" class="form-control ts" id="validationCustom02" value="" required name="st_name">
  
  </div>

  
  <div class="col-md-3">
    <label for="validationCustom010" class="form-label">Student id</label>
    <input type="text" class="form-control ts" id="validationCustom010" value="" required name="st_id">
  
  </div>
  
  
  
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label ">Email</label>
    <input type="email" class="form-control em" id="validationCustom05" value="" required name="email">
   
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">Fees type</label>
    <select class="form-select ad_c" id="validationCustom04" required name="cat">
      <option selected disabled value="">Choose...</option>
     
          <option>Admission</option>
          <option>Tuition</option>
          <option>other</option>
    </select>

</div>

  <div class="col-md-3">
    <label for="validationCustom06" class="form-label">Amount</label>
    <input type="number" class="form-control" id="validationCustom06" value="" name="amt">
  
  </div>
  <div class="col-12 text-center">
        <button class="btn btn-primary dsbl sub" type="submit">Pement now</button>
      </div>

</form>

<h1 class="text-center text-primary my-5">Pement history</h1>
<table class="table">
  <thead>
    <tr>
     
      <th scope="col">Email</th>
      
      <th scope="col">Amount</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      
    </tr>
    
  </tbody>
</table>

<Script>
    $(document).ready(function(){
       
       
            $(".ad_c").blur(function(){
                var admission= $(this).val();
                if (admission==="Admission") {
           var email=$(".em").val();
           
    // $.ajax({
    //     type:"POST",
    //     url:"php/chech_ad_f.php",
    //     data:{
    //         email:email

    //     },
    //     success:function(res){
    //        alert(res);
    //     }
    // })

 
        

  $(".sp").submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
   $.ajax({
    url: "php/fees_paid.php",
   type: "POST",
   data: formData,
     processData: false,
    contentType: false,
    success:function(res){
        alert(res);
    }
   })
    
  })
}
})
    })
</Script>