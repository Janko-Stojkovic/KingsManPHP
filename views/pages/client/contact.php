<?php
$errors = [];

if (isset($_POST["btnSubmitForm"])){


    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["number"];
    $message = $_POST["message"];

    if(!trim($name)){
        $errors["name"] = "Name field can't be empty";
    }
    else{
        $reName = "/^[A-Z][a-z]{2,}(\s[A-Z][a-z]{2,})+$/";
        if(!preg_match($reName,$name)){
            $errors["name"] = "Name is not valid (First name plus Last name)";
        }
    }
    if(!trim($email)){
        $errors["email"] = "Email field can't be empty";
    }
    else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors["email"] = "Email is not valid";
        }
    }
    if(!trim($phoneNumber)){
        $errors["number"] = "Number field can't be empty";
    }
    else{
        $reNumber = "/^06[0-9]\/[0-9]{3,4}\-[0-9]{3,4}$/";
        if(!preg_match($reNumber,$phoneNumber)){
            $errors["number"] = "Number is not valid";
        }
    }
    if(!trim($message)){
        $errors["message"] = "Message field can't be empty";
    }
    else{
        $reMessage = "/^.{4,200}$/";
        if(!preg_match($reMessage,$message)){
            $errors["message"] = "Message is not valid";
        }
    }

    if(count($errors) != 0){
        echo "";
    }
    else {
        $errors["success"] = "Report successfully submitted";
        $insertReportQuery = "INSERT INTO contacts (fullName, email, phoneNumber, report) VALUES (:fullName,:email,:phoneNumber,:message)";
        $stmt = $conn->prepare($insertReportQuery);
        $stmt->execute([
            ":fullName" => $name,
            ":email" => $email,
            ":phoneNumber" => $phoneNumber,
            ":message" => $message
        ]);
    }
}
?>
<section class="w3l-contacts-8">
    <div class="contacts-9 section-gap py-5">
      <div class="container py-lg-5">
        <div class="row top-map">
          <div class="col-lg-6 partners">
            <div class="cont-details">
              <h3 class="hny-title mb-0">Get in <span>touch</span></h3>
              <p class="mb-5">We're ready to lead you into the future with Business Services</p>
              <p class="margin-top"><span class="texthny">Call Us : </span> <a href="#">+(21)
                  255 999 8899</a></p>
              <p> <span class="texthny">Email : </span> <a href="#">
                  info@example.com</a></p>
              <p class="margin-top"> Zdravka Celara 16, 11000 Beograd </p>
            </div>
            <div class="hours">
              <h3 class="hny-title">Working <span>Hours</span></h3>
              <h6>Business Service:</h6>
              <p> Monday to Friday 8.00 am - 6.00 pm</p>
              <p> Saturday and Sunday - Closed</p>
              <h6 class="margin-top">Customer support:</h6>
              <p> Monday to Friday 8.00 am - 6.00 pm</p>
              <p> Saturday 10.00 am - 4.00 pm</p>
              <p> Sunday - Closed</p>
            </div>
          </div>
          <div class="col-lg-6 map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.3333267793428!2d20.482502215750962!3d44.81477358456091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7a95dfdba1fb%3A0x7dd3ed9b437a11d6!2z0JfQtNGA0LDQstC60LAg0KfQtdC70LDRgNCwIDE2LCDQkdC10L7Qs9GA0LDQtA!5e0!3m2!1ssr!2srs!4v1647011896887!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
    <div class="map-content-9 form-bg-img">
      <div class="layer section-gap py-5">
        <div class="container py-lg-5">
          <div class="form">
            <h3 class="hny-title two text-center">Fill out the form.</h3>
            <form action="index.php?page=contact" method="POST" id="form" class="contact-form" data-aos="fade-up">

              <div class="row">

                  <div class="col-lg-4 col-md-6 bx">
                      <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>

                      <input type="text" value="<?= value($_POST,"name") ?>" name="name" id="name" class="form-control" placeholder="Example: John Doe">

                      <?= error($errors,"name","danger") ?>
                  </div>

                  <div class="col-lg-4 col-md-6 bx">
                      <label for="email" class="form-label">Email <sup class="text-danger">*</sup></label>

                      <input type="text" style="text-transform: lowercase;" value="<?= value($_POST,"email") ?>" name="email" id="email" class="form-control" placeholder="Example:john.doe@gmail.com">

                      <?= error($errors,"email","danger") ?>
                  </div>
                  <div class="col-lg-4 col-md-12 bx">
                      <label for="number" class="form-label">Number <sup class="text-danger">*</sup></label>

                      <input type="text" value="<?= value($_POST,"number") ?>" name="number" id="number" class="form-control" placeholder="Example:060/xxxx-xxx">

                      <?= error($errors,"number","danger") ?>
                  </div>
                  <div class="col-12 my-4">
                      <label for="message" class="form-label">How can we help?</label>

                      <textarea name="message" value="<?= value($_POST,"message") ?>" rows="6" class="form-control" id="message" placeholder="Tell us something more" ></textarea>
                      <?= error($errors,"message","danger") ?>
                  </div>



              <div class="col-lg-3 col-md-7 col-sm-6 col-10 mx-auto mt-5 bt">

                  <input type="submit" id="btnSubmitForm" name="btnSubmitForm" value="Send Message">
                  <?= error($errors,"success","success") ?>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- //contacts -->











