<?php 
  date_default_timezone_set("Asia/Hong_Kong");
  $now = time();
  $now_string = date("Y-m-d-h-i-s",$now);
  if($_FILES["user"]["error"] > 0){
    echo "Error: " . $_FILES["user"]["error"] . "<br />";
  }else{
    move_uploaded_file($_FILES["user"]["tmp_name"], "./upload/" . $now_string . ".txt");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="吃货摇号系统">
    <meta name="author" content="Xiaoyu Tai">
    <title>吃货摇号系统 - 吃主儿</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/messenger.css" rel="stylesheet">
    <link href="./assets/css/messenger-theme-block.css" rel="stylesheet">
    <script src="./assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/js/messenger.min.js" type="text/javascript"></script>
    <style>
    body{
      background-image: url(./assets/media/bg.png);
    }
    .container{
      max-width: 600px;
    }
    hr{
      border-top: 1px solid #d9534f;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <br />
      <center>
        <h1 style="color: #d9534f;"><span class="glyphicon glyphicon-cutlery" style="font-size: 100px;"></span></h1>
        <hr />
        <h1>吃货摇号系统</h1>
        <hr />
        <div style="font-weight: 600;">
          <p>就是你了：<span id="1_1">?</span></p>
        </div>
        <button class="btn btn-lg btn-danger" onclick="c();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;抽奖!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
        <br />
        <hr />
        <p><?php echo "已上传：".$now_string.".txt"; ?></p>
        <p>用户列表：</p>
        <table class="table table-striped" style="text-align: center;">
          <thead>
            <tr>
              <th style="text-align: center;">编号</th>
              <th style="text-align: center;">用户名</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $file = fopen("upload/".$now_string.".txt", "r") or exit("Unable to open file!");
          $i = 0;
          while(!feof($file)){
            $i++;
            echo "<tr><td>".$i."</td><td id=\"user".$i."\">".fgets($file). "</td></tr>";
          }
          fclose($file);
          ?>
          </tbody>
        </table>
        <p>共 <span id="total"><?php echo $i; ?></span> 个吃货</p>
        <hr />
        <p>吃主儿抽奖官方指定XD</p>
      </center>
    </div>
    <script type="text/javascript">
    $total = $("#total").html();
    $total = parseInt($total);
    function c(){
      $a = parseInt(Math.random()*($total+1));
      $a_name = $("#user"+$a).html();
      $("#1_1").html($a_name);
    }
    </script>
  </body>
</html>