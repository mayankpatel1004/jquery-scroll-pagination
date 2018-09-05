<?php 
session_start();
$message = "";
if (isset($_POST['submit']))
{
    $number = floatval($_POST['number']);

    if ($number != $_SESSION['correctNumber'])
    {
        $message = "<br /><span class='errors'>The number you entered for the spam filter is incorrect.</span><br />";
    }
    else
    {
        $message = "<br /><span class='success'>CAPTCHA Verified!!!</span><br />";
    } 
}
// include the class
include "imagelessCaptcha.php";

// implement imageless
$imgLess        = new imagelessCaptcha();
$CaptchaPhrase  = $imgLess->formPhrase();
$correctNumber  = $imgLess->getInt();
$_SESSION['correctNumber'] = $correctNumber;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>How to create Image less CAPTCHA with PHP | PGPGang.com</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style>
        .main
        {
         margin-left:auto;
         margin-right:auto;
         width:625px;
        }
        .highlight {
            background:rgba(255,240,0,.2);
        }
        .submit,
        button {
            height:auto;
            width:120px;
            margin:0;
            padding:10px 20px;
            text-align:center;
            color:#fff;
            font:700 1.2em/1.0em Helvetica, Arial, Helvetica, sans-serif;
            background-color:#4d63bc;
            outline:none;
            border:none;
            cursor:pointer;
            position:relative;
            -webkit-border-radius:6px;
            -moz-border-radius:6px;
            border-radius:6px;
        }
        .textInput,
        textarea {
            width:80%;
            padding:5px 7px;
            margin:0;
            color:#4f4f4f;
            font:400 1.2em/1.2em Helvetica, Arial, Helvetica, sans-serif;
            background:#fff;
            outline:none;
            -webkit-box-sizing:border-box;
            -moz-box-sizing:border-box;
            box-sizing:border-box;
            position:relative;
            border:2px #4f4f4f solid;
            -webkit-border-radius:6px;
            -moz-border-radius:6px;
            border-radius:6px;
        }
        .errors {
            padding:20px 20px 20px 40px;
            background: rgba(255, 0, 0, .2);
            -webkit-border-radius:6px;
            -moz-border-radius:6px;
            border-radius:6px;
        }
        .success {
            padding:20px;
            background: rgba(0, 255, 0, .2);
            -webkit-border-radius:6px;
            -moz-border-radius:6px;
            border-radius:6px;
            list-style-type:none;
        }
    </style>
    </head>
    <body>
        <div class="main"><?php echo $message; ?><br />
            <form action="index.php" method="post">
                <label class="highlight"><span><?php echo $CaptchaPhrase; ?></span></label><br />
                <input type="number" name="number" step="0.1" class="textInput" />
                <input type="submit" value="Send" name="submit" class="submit" />
            </form>
        </div>
    </body>
</html>