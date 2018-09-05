
<?php
$content = '
            <link href="css/style.css" rel="stylesheet"/>
            <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
            <script type="text/javascript" src="js/scrollpaging.js"></script>
            <script type="text/javascript">
              $(function() {
                      var offset = 2;
                    $(document).scrollPaging({
                                                url : \'content.php\', //required
                                                totalRecordCount : 20,//required
                                                offset :offset, //required
                                                data :\'key=value\',//you can pass extra params here
                                                beforeSend : function(){
                                                     var loader = $(\'<div id="scrollLoader">loading please wait ....</div>\')
                                                        $(\'#wrapper\').append(loader);
                                                },
                                                success : function(result) { //required
                                                    
                                                     $(\'#scrollLoader\').remove();
                                                     $(\'#wrapper\').append(result);
                                                }
                    });
                });
            </script>
            
                    <div class="outerWrapper">
            <div id="wrapper">
            <p>Today i am going to tell you about a nice bug reporting tool given by windows 7 and above. 
            Most of us don\'t know about this application its a very smart way of presenting your problems to someone or make step by step tutorial for someone.</p>

            <p>Its called Windows Program Steps Recorder in order to run PSR type psr search in or type psr.exe in run window. 
            Press record and do what ever you want to do on your computer it will record all the steps with description and complete documentation must try it.</p>
            <p>Google has many amazing services and today i have chosen Google cloud printing its a really amazing service for offices to manage there printings etc.

You have to set a printer with a computer and connect it with Google cloud printer and use this library on you web so any one can easily print from that website by uploading a file.</p>
           </div>
            </div>
';

$title = "How to Integrate jQuery Scroll Paging";
$heading = "How to Integrate jQuery Scroll Paging PHP example.";
$pre = 1;
include('html.inc');

