
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      .main_d {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      .main_otp {
        background-color: rgba(40, 37, 37, 0.3);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .container {
        position: absolute;
        margin: auto;
        width: 50%;
        border: 3px solid rgb(236, 23, 8);
        padding: 10px;
        width: 50%;
        height: 50vh;
        /* display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column; */
        background-color: rgb(237, 139, 12);
      }
      .cr:hover {
        cursor: pointer;
      }
      .otp {
        width: 300px;
      }
    </style>
</head>
<body>
     <!-- otp otp_verification -->
      <form action="" id="otp_sub">
     <div class="main_otp">
      <div class="container">
        <i class="fa-solid fa-circle-xmark text-right fs-5 cr"></i>
        <div class="main_d">
          <div class="otp text-center">
            <label for="otp" class="form-label fs-4">Enter your otp</label>
            <input type="number" name="otp" id="otp" class="form-control" />
            <button class="btn btn-primary my-3 w-100 otp_sub">submit</button>
          </div>
          <div class="change">
            <button class="btn btn-primary me-5">Resend otp</button>
            <button class="btn btn-primary">Change email</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    <script>
        $(Document).ready(function(){
                // icon close
      $(".cr").click(function () {
        window.location.href = "../regiter_verification.html";
      });
      //end

      $("#otp_sub").submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
      $.ajax({
     url: "mail.php",
     type: "POST",
     data: formData,
      processData: false,
      contentType: false,
      success:function(res){
        if (res==="success") {
            window.location.href="../../manager/manager.html";
            alert("Your account is under verification please login after 24 hour later");
            window.location.replace("../../login/login.html");
        }
      
        else{
            alert(res);
        }
      }
      })
     
        })

        })


    </script>
</body>
</html>