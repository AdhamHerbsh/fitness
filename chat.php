<?php
include("conn.php");
$sec = "20";
$admin_id = 1;
if (isset($_GET['s_id'])) {
  $student_id = $_GET['s_id'];
  $sql = "SELECT * FROM message WHERE (student_id=$student_id AND admin_id = $admin_id)";
  $query = mysqli_query($db, $sql);
}
if (isset($_GET['c_id'])) {
  $company_id = $_GET['c_id'];
  $sql = "SELECT * FROM message WHERE (company_id=$company_id AND admin_id = $admin_id)";
  $query = mysqli_query($db, $sql);
}


date_default_timezone_set('ASIA/Riyadh');

$date = date("Y-m-d");
$time = date("H:i:s");
if (isset($_POST['msg_send_btn'])) {
  $content = $_POST['content'];
  if (isset($_GET['s_id'])) {
    $sender = 'a';
    $sql1 = "INSERT INTO message(student_id,admin_id,sender,content,`time`,`date`)
 VALUES($student_id,$admin_id,'$sender','$content','$time','$date')";
    $query1 = mysqli_query($db, $sql1);
    header("Refresh:0");
  }
  if (isset($_GET['c_id'])) {
    $sender = 'a';
    $sql1 = "INSERT INTO message(company_id,admin_id,sender,content,`time`,`date`)
 VALUES($company_id,$admin_id,'$sender','$content','$time','$date')";
    $query1 = mysqli_query($db, $sql1);
    header("Refresh:0");
  }
}

?>
<html>

<head>

  <style>
    body {
      background-color: white;
      font-family: Times New Roman, Times, serif;
    }

    * {
      box-sizing: border-box;
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
      height: 550px;
      overflow-y: hidden;
    }

    .active_chat {
      background: #ebebeb;
    }

    .incoming_msg_img {
      display: inline-block;
      width: 6%;
    }

    .received_msg {
      display: inline-block;
      padding: 0 0 0 10px;
      vertical-align: top;
      width: 92%;
    }

    .received_withd_msg p {
      background: #ebebeb none repeat scroll 0 0;
      border-radius: 3px;
      color: #646464;
      font-size: 14px;
      margin: 0;
      padding: 5px 10px 5px 12px;
      width: 100%;
    }

    .time_date {
      color: #747474;
      display: block;
      font-size: 12px;
      margin: 8px 0 0;
    }

    .received_withd_msg {
      width: 57%;
    }

    .mesgs {
      float: left;
      padding: 30px 15px 0 25px;
      width: 99%;

    }

    .sent_msg p {
      background: #05728f none repeat scroll 0 0;
      border-radius: 3px;
      font-size: 14px;
      margin: 0;
      color: #fff;
      padding: 5px 10px 5px 12px;
      width: 77%;
    }

    .outgoing_msg {
      overflow: hidden;
      margin: 26px 0 26px;
    }

    .sent_msg {
      float: right;
      width: 46%;
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
      border-top: 1px solid #c4c4c4;
      position: relative;
    }

    .msg_send_btn {
      background: #05728f none repeat scroll 0 0;
      border: medium none;
      border-radius: 50%;
      color: #fff;
      cursor: pointer;
      font-size: 17px;
      height: 33px;
      position: absolute;
      right: 0;
      top: 11px;
      width: 33px;
    }

    .messaging {
      padding: 10px 0 50px 0;
    }

    .msg_history {
      height: 400px;
      overflow-y: auto;
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
</head>

<body>

  <?php
  include("header.php");
  ?>
  <div class="fluid_container" style="margin-bottom: 2em;padding-bottom: 1em;">
  <?php
      if (isset($_GET['s_id'])) {
        $s_id = $_GET['s_id'];
      ?>
        <form action="chat.php?s_id=<?=$s_id;?>" method="POST">
        <?php
      }
        ?>
      <?php
      if (isset($_GET['c_id'])) {
        $c_id = $_GET['c_id'];
      ?>
        <form action="chat.php?c_id=<?=$c_id;?>" method="POST">
        <?php
      }
        ?>   
      <div class="messaging">
        <div class="inbox_msg">
          <div class="inbox_people">


            <div class="mesgs" style="overflow-y: hidden;">
              <div class="msg_history">


                <?php
                foreach ($query as $row) {
                  $content = $row['content'];
                  $date_ = $row['date'];
                  $time_ = $row['time'];
                  $sender_ = $row['sender'];
                  if ($sender_ == 'a') {
                ?>





                    <div class="incoming_msg">
                      <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                      <div class="received_msg">
                        <div class="received_withd_msg">
                          <p>
                            <?= $content; ?>
                          </p>
                          <span class="time_date"> <?= $time_; ?> | <?= $date_; ?> </span>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  if (($sender_ == 's') || ($sender_ == 'c')) {
                  ?>
                    <div class="outgoing_msg" style="width: 90%;">
                      <div class="incoming_msg_img" style="float:right;">
                        <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                      </div>

                      <div class="sent_msg">
                        <p style="width: 90%;word-wrap: break-word;">
                          <?= $content; ?>
                        </p>
                        <span class="time_date"> <?= $time_; ?> | <?= $date_; ?> </span>
                      </div>
                    </div>

                <?php
                  }
                }
                ?>
              </div>


              <div class="type_msg">
                <div class="input_msg_write">
                  <input id="content" name="content" type="text" class="write_msg" placeholder="Type a message" />
                  <button class="msg_send_btn" id="msg_send_btn" name="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
          </div>



        </div>
      </div>
    </form>


  </div>


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