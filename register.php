<html>
<head>
    <meta charset="utf-8">
    <title>MovieLover Register </title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="js/page2.js"></script>
    <link rel="stylesheet" href="css/main_css.css" type="text/css"/>
</head>
<body>
    <?php
        // Pear Mail 扩展
        require_once('Mail.php');
        require_once('Mail/mime.php');
        require_once('Net/SMTP.php');
         
        $smtpinfo = array();
        $smtpinfo["host"] = "smtp.gmail.com";//SMTP服务器
        $smtpinfo["port"] = "587"; //SMTP服务器端口
        $smtpinfo["username"] = "movielover.jar@gmail.com"; //发件人邮箱
        $smtpinfo["password"] = "jarmovielover!";//发件人邮箱密码
        $smtpinfo["timeout"] = 10;//网络超时时间，秒
        $smtpinfo["auth"] = true;//登录验证
        //$smtpinfo["debug"] = true;//调试模式
         
        // 收件人列表
        $mailAddr = array('598437013@qq.com');
         
        // 发件人显示信息
        $from = "Movie Lover 2019 <movielover.jar@gmail.com>";
         
        // 收件人显示信息
        $to = implode(',',$mailAddr);
         
        // 邮件标题
        $subject = "Hi Movie Lover user";
         
        // 邮件正文
        $content = "<h3>You have successfuly subscribed to Movie lover membership!</h3>";
         
        // 邮件正文类型，格式和编码
        $contentType = "text/html; charset=utf-8";
         
        //换行符号 Linux: \n  Windows: \r\n
        $crlf = "\n";
        $mime = new Mail_mime($crlf);
        $mime->setHTMLBody($content);
         
        $param['text_charset'] = 'utf-8';
        $param['html_charset'] = 'utf-8';
        $param['head_charset'] = 'utf-8';
        $body = $mime->get($param);
         
        $headers = array();
        $headers["From"] = $from;
        $headers["To"] = $to;
        $headers["Subject"] = $subject;
        $headers["Content-Type"] = $contentType;
        $headers = $mime->headers($headers);
         
        $smtp = Mail::factory("smtp", $smtpinfo);
         
         
        $mail = $smtp->send($mailAddr, $headers, $body);
        $smtp->disconnect();
         
        if (PEAR::isError($mail)) {
            //发送失败
            echo 'Email sending failed: ' . $mail->getMessage()."\n";
        }
        else{
            //发送成功
            echo "success!\n";
        }
    ?>

    <div data-target=".navbar" data-offset="50">

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>  
                  <span class="icon-bar"></span>  
                  <span class="icon-bar"></span>  
                  <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="#"><img id="logo_pic" src="img/logomovielover.png"></a>
            </div>
            <div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li><a href="MovieLoverMainPage.html">Home</a></li>
                  <li><a href="moviedetails.html">Movies</a></li>
                  <li><a href="MovieLoverMainPage.html#section3">News</a></li>
                  <li><a href="MovieLoverMainPage.html#section4">Contact Us</a></li>
                  <li><a href="registerpage.html" target="_blank">Login/Register</a></li></ul>
                      <div class="search-container">
                    <form action="/action_page.php" id="searchbox">
                      <input type="text" placeholder="Search.." name="search">
                      <button type="submit"><img src="img/magnify.png" width=20px></i></button>
                    </form></div>                  
              </div>
            </div>
          </div></nav>
        </div>


    <div class="container" >
        <br>
        <br>
        <div class="row" id="register">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            
            </div>
            <div class="col-lg-8  col-md-8 col-sm-8 col-xs-8">
            <h1>Join us now!</h1>
            You will be able to get notification and book the new release movie only by being our 
            subscriber. <br> Subcription fee only <h4>$5 per month</h4>


            <form name="pay">
                    <div class="row form_align" id="radio_buttons">
                        <div id="cardtype_radios" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="radio" id="mastercard_check" name="card_type" value="Mastercard">
                                <img src="img/mastercard_logo.png" id="mastercard" width="150px" onclick="radio_button(this.id)">
                                <input type="radio" id="visa_check" name="card_type" value="Visa">
                                <img src="img/visa_logo.png" id="visa" width="150px" onclick="radio_button(this.id)">
                                <input type="radio" id="amex_check" name="card_type" value="amex">
                                <img src="img/amex.png" id="amex" width="150px" onclick="radio_button(this.id)">
                        </div>
                        </div>
                    <div class="row">
                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                            <div class="form-horizontal col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="credit_card">Credit card number:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" maxlength="16" id="cardno" name="input" class="text_field form-control" placeholder="Credit card number" onchange="input_check(this.id);checklen(this)">
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="name">Name on card:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="nameoncard" name="input" class="text_field form-control" placeholder="Name on the card" onchange="input_check(this.id)">
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="username">Username:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="username" name="input" class="text_field form-control" placeholder="username" onchange="input_check(this.id)">
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="password">Create password:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="formpassword" name="input" class="text_field form-control" placeholder="Password" onchange="input_check(this.id)">
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="area">Area:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="formarea" name="input" class="text_field form-control" placeholder="area" onchange="input_check(this.id)">
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-lable col-xs-2 col-sm-2 col-md-2 col-lg-2 lable_align" for="email">Email:</label>
                                        <div class="col-xs-10 col-sm-10 ol-md-10 col-lg-10">
                                                <input type="text" id="formemail" name="input" class="text_field form-control" placeholder="Email" onchange="input_check(this.id)">
                                        </div>
                                    </div>
                                <div class="form-group form_align col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <input type="checkbox" id="check">I have read the <a id="law_file">terms and conditions</a>.
                                    </div>
                                <div class="form-group form_align col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <input type="button" class="btn btn-default btn-md" value="Submit" onclick="submit_button_clicked()"></button>
                                    </div>
                            </div>
                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                        </div>
                        <div id="confirm_message">
                            <p class="alert alert-success">Hi, <a id="user_name"></a><br> thanks for the payment using your <a id="cardT"></a> 
                                &nbsp;&nbsp;credit card no. xxxx xxxx xxxx <a id="card_num"></a>. We will email your receipt on <a id="email"></a>.</p>
                        </div>
                        
                </form>

    </div></div> 
</div>

        <footer>
                <article>
                    <div class="container">
                        <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <br>
                    <p>Copyright © 2019 Movie Lover, All Rights Reserved </p></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <br>  
                    <img src="img/socialmedia.png" width="100px">
                    </div>
        
                </article>
            </footer>
</body>
</html>