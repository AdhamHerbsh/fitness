<?php
include("conn.php");
$id = $_SESSION['id'];
if (isset($_POST['save_btn'])) {
  $question = $_POST['question'];
  // chatbot
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "127.0.0.1:5000/chatbot_route");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt(
    $ch,
    CURLOPT_POSTFIELDS,
    "user_input=$question"
  );
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $server_output = curl_exec($ch);
  curl_close($ch);
  $res = json_decode($server_output);
  $answer = "$res->response";
  $answer2 = str_replace('"', '', $answer);
  $answer3 = str_replace("'", "", $answer2);

  $sql = "INSERT INTO chats(question,answer,user_id)VALUES('$question','$answer3','$id')";
  if ($query = mysqli_query($db, $sql)) {
    $chat_id = mysqli_insert_id($db);
    $sql_chat = "SELECT * FROM chats WHERE id=$chat_id";
    $query_chat = mysqli_query($db, $sql_chat);
    header("location:add_chat.php");
  } else {
    echo "<script>alert('Question Doesnot Added Successfully')</script>";
  }
}

$sql_chats = "SELECT * FROM chats WHERE user_id = $id ORDER BY id DESC";
$query_chats = mysqli_query($db, $sql_chats);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Fitness Level</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">
  <!-- Favicon -->
  <link href="images/logo.png" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/aos/aos.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
 
 
 
 <style>
    .btn-danger {
      background: #FB5B21 !important;
    }

    /* Button used to open the chat form - fixed at the bottom of the page */
    .open-button {
      border: 2px solid black;
      border-radius: 30px;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
    }

    /* The popup chat - hidden by default */
    .chat-popup {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      z-index: 9;
    }

    /* Add styles to the form container */

    .form-container {
      max-width: 300px;
      padding: 10px;
      border: 2px solid black;
      border-radius: 30px;
      background-color: white;
    }

    /* Full-width textarea */
    .form-container textarea {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
      resize: none;
      min-height: 200px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/send button */
    .form-container .btn {
      height: 45px;
      background: #162938;
      border: none;
      outline: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: lem;
      color: #fff;
      font-weight: 500;
      width: 70px;
      background-color: #87CEFA;
      font-family: Times New Roman;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: #808080;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
      opacity: 1;
    }

    #t {
      border: 2px solid black;
      border-radius: 5px;
    }

    .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
    }


    .container {
      max-width: 1170px;
      margin: auto;
    }

    img {
      max-width: 100%;
    }

    .inbox_people {
      background: #f8f8f8 none repeat scroll 0 0;
      float: left;
      overflow: hidden;
      width: 80%;
      border-right: 1px solid #c4c4c4;
      margin-left: 10em;
    }

    .inbox_msg {
      /* border: 1px solid #c4c4c4; */
      clear: both;
      overflow: hidden;
    }

    .top_spac {
      margin: 20px 0 0;
    }


    .recent_heading {
      float: left;
      width: 40%;
    }

    .srch_bar {
      display: inline-block;
      text-align: right;
      width: 60%;
      padding: 0em;
    }

    .headind_srch {
      padding: 10px 29px 10px 20px;
      overflow: hidden;
      border-bottom: 1px solid #c4c4c4;
    }

    .recent_heading h4 {
      color: #05728f;
      font-size: 21px;
      margin: auto;
    }

    .srch_bar input {
      border: 1px solid #cdcdcd;
      border-width: 0 0 1px 0;
      width: 80%;
      padding: 2px 0 4px 6px;
      background: none;
    }

    .srch_bar .input-group-addon button {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
      padding: 0;
      color: #707070;
      font-size: 18px;
    }

    .srch_bar .input-group-addon {
      margin: 0 0 0 -27px;
    }

    .chat_ib h5 {
      font-size: 15px;
      color: #464646;
      margin: 0 0 8px 0;
    }

    .chat_ib h5 span {
      font-size: 13px;
      float: right;
    }

    .chat_ib p {
      font-size: 14px;
      color: #989898;
      margin: auto
    }

    .chat_img {
      float: left;
      width: 11%;
    }

    .chat_ib {
      float: left;
      padding: 0 0 0 15px;
      width: 88%;
    }

    .chat_people {
      overflow: hidden;
      clear: both;
    }

    .chat_list {
      border-bottom: 1px solid #c4c4c4;
      margin: 0;
      padding: 18px 16px 10px;
    }

    .inbox_chat {
      height: 450px;
      overflow-y: hidden;
    }

    .active_chat {
      background: #ebebeb;
    }

    .incoming_msg_img {
      display: inline-block;
      width: 5%;
    }

    .received_msg {
      display: inline-block;
      padding: 25px;
      vertical-align: top;
      width: 90%;
    }

    .time_date {
      color: #747474;
      display: block;
      font-size: 12px;
      margin: 8px 0 0;
    }


    .mesgs {
      float: left;
      padding: 30px 15px 0 25px;
      width: 99%;

    }


    .outgoing_msg {
      overflow: hidden;
    }

    .sent_msg {
      float: right;
    }

    .input_msg_write input {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
      color: #4c4c4c;
      font-size: 15px;
      min-height: 48px;
      width: 100%;
    }

    .type_msg {
      border: 1px solid var(--primary);
      position: relative;
    }

    .msg_send_btn {
      background: #fb5b21 none repeat scroll 0 0;
      border: medium none;
      border-radius: 50%;
      color: #fff;
      cursor: pointer;
      font-size: 20px;
      position: absolute;
      top: 10px;
      right: 25px;
      width: 40px;
      height: 40px;
    }

    .messaging {
      padding: 10px 0 50px 0;
    }

    .msg_history {
      height: 60vh;
      overflow-y: auto;
      display: flex;
      flex-direction: column-reverse;
      align-items: center;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .navbar {
      width: 100%;
      background-color: #174f96;

      overflow: auto;
    }

    .navbar a {
      float: right;
      padding: 10px;
      color: white;
      text-decoration: none;
      font-size: 17px;
    }


    .active {
      background-color: #4CAF50;
    }

    @media screen and (max-width: 500px) {
      .navbar a {
        float: none;
        display: block;
      }
    }


    .grid-container {
      display: grid;
      grid-template-columns: auto auto auto auto auto;
      background-color: rgb(41, 85, 24);
      padding: 0px;
    }

    .grid-item {
      background-color: rgb(41, 85, 24);
      padding: 2px;
      font-size: 20px;
      text-align: center;
      color: #fff;
    }

    .row {
      margin-left: 0px;
      margin-right: 0px;
    }
  </style>

  </style>

</head>

<body>
    <!-- Header Start -->
    <!-- Main Layout -->
    <div class="container-fluid bg-dark px-0 fixed-top">
        <div class="row">
            <!-- Sidebar (Left Side) -->
            <div class="col-lg-4 bg-dark d-none d-lg-block px-5">
                <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center">
                    <h1 class="m-0 display-10 text-primary text-uppercase">Fitness Assistant</h1>
                </a>
            </div>

            <!-- Navbar (Right Side) -->
            <div class="col-lg-8">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                    <!-- Mobile Logo -->
                    <a href="index.php" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-10 text-primary text-uppercase">Fitness Assistant</h1>
                    </a>

                    <!-- Mobile Menu Toggle Button -->
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Include Navbar Items -->
                    <?php include("header.php"); ?>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->    



<main>
  <!-- ChatBot Start -->
  <section class="bg-dark">
          <!-- Page Title Start -->
  <div class="container-fluid p-3" data-aos="fade">
    <div class="mb-1 text-center">
      <h5 class="display-5 text-uppercase mb-0 text-primary">Chat Bot</h5>
    </div>
  </div>
  <!-- Page Title End -->

  <div class="container" data-aos="zoom-in">    
    <form action="add_chat.php" method="POST">
      <div class="messaging bg-white rounded-4">
        <div class="inbox_msg">
            <div id="mesgs" class="mesgs" style="overflow-y: hidden;">
              <div id="msg_history" class="msg_history">
                <?php
                foreach ($query_chats as $row_chat) {
                  $question = $row_chat['question'];
                  $answer = $row_chat['answer'];

                ?>
                    <div class="outgoing_msg col-10 bg-primary p-4 rounded-4 text-break shadow m-3 float-end">
                      <div class="incoming_msg_img" style="float:right;">
                        <img src="images/chatlogo.png" alt="sunil">
                      </div>
  
                      <div class="sent_msg">
                        <p style="width: 90%;word-wrap: break-word;">
                          <?= $answer; ?>
                        </p>
                      </div>
                    </div>
                  <div class="incoming_msg col-10 bg-light p-4 rounded-4 text-break shadow m-3" style="display: flow-root;">
                    <div class="incoming_msg_img"> <img src="images/user-profile.png" alt="sunil"> </div>
                    <div class="received_msg">
                      <div class="received_withd_msg">
                        <p>
                          <?= $question; ?>
                        </p>
                      </div>
                    </div>
                  </div>

                <?php
                }
                ?>
              </div>
              <div class="type_msg bg-light p-2 rounded-4">
                <div class="input_msg_write">
                  <input id="content" name="question" type="text" class="write_msg" placeholder="Ask a Question" />
                  <button class="msg_send_btn" id="msg_send_btn" name="save_btn" type="submit"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
        </div>
      </div>
    </form>


  </div>
    </section>
<!-- ChatBot End -->
</main>



    <!-- Footer Start -->
    <div class="container-fluid py-4 py-lg-0 px-5 bg-dark">
        <div class="row gx-5">
            <div class="col-lg-12">
                <div class="py-lg-4 text-center">
                    <p class="text-secondary mb-0"> Fitness Website All
                        Rights Reserved.</p>
                </div>
            </div>

        </div>
    </div>
    <!-- Footer End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-dark py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/aos/aos.js"></script>


  <!-- Template Javascript -->
  <script src="js/main.js"></script>

  <script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }

    function showContactUs() {
      document.getElementById("customerService").style.display = "block";
      document.getElementById("contactUs").style.display = "none";
      document.getElementById("dome").innerHTML = "";
    }

    function showCustomerService() {
      document.getElementById("customerService").style.display = "none";
      document.getElementById("contactUs").style.display = "block";
      document.getElementById("dome").innerHTML = "";
    }
  </script>




</body>

</html>