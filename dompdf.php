<?php

require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->set_option('defaultFont', 'Roboto-Light');

$dompdf->loadHtml('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title>One Page Resume</title>

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; line-height: 24px; background: url(images/noise.jpg); }
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0; }
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 500px; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }
     </style>
</head>

<body>

    <div id="page-wrap">
    
        <img src="images/cthulu.png" alt="Photo of Cthulu" id="pic" />
    
        <div id="contact-info" class="vcard">
        
            <!-- Microformats! -->
        
            <h1 class="fn">Nguyen Hong Quan</h1>
        
            <p>
                Cell: <span class="tel">0163.822.3625</span><br />
                Email: <a class="email" href="mailto:quannguyen1456@gmail.com">quannguyen1456@gmail.com</a>
            </p>
        </div>
                
        <div id="objective">
            <p>
                To be a good staff. Try to learning as much as possible and doing my best in order to accompish my task. To have good opportunities to get promotion in my job. Develop my skills with development of company, I always want to prove myself
            </p>
        </div>
        
        <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt>Education</dt>
            <dd>
                <h2>Faculty of Computer Science and Engineering - ThuyLoi University</h2>
                <p><strong>Major:</strong> Software Engineering<br />
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Skills</dt>
            <dd>
                <h2>Computer skills</h2>
                <p>Magento, Javascript(Jquery, Knockoutjs), Linux, Git, Laravel, Mysql, Wordpress</p>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Experience</dt>
            <dd>
                <h2>Vicomage <span>PHP Developer - Ha Noi - May 2018- October 2018</span></h2>
                <ul>
                    <li>Working with foreigner customer. At that time, I was a web developer with skills Javascript(Jquery, Knockoutjs), Flatform(Magento 1 + 2), CMS(Wordpress), PHP(Laravel Framework). Here, almost tasks are collecting requirements, discussion with customers, technology suggestions to streamline  the work, develop company\'s idea to market segments to test ideas in real context. Especially, I have chance to study and work with new technologies to achieve possible approachs for outsource environment. They are really challenge for me but i really enjoy to do them. Js is my programming language\'s favorite. Becoming a JS full stack developer is my desire, I\'m try my best to make it out.</li>
    
                </ul>
    
                <h2>Wsoftpro <span>PHP Developer - Ha Noi - May 2017 - May 2018</span></h2>
                <ul>
                    <li>Working with foreigner customer. At that time, I was a web developer with skills Javascript(Jquery), CMS(Wordpress), Flatform(Magento 1), PHP(Laravel Framework).</li>
                </ul>
                <h2>Osworlds <span>PHP Developer - Ha Noi - August 2016- May 2017</span></h2>
                <ul>
                    <li>Working with foreigner customer. At that time, I was a web developer with skills Javascript(Jquery), CMS(Wordpress), Flatform(Magento 1), PHP(Laravel Framework).</li>
                </ul>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Hobbies</dt>
            <dd>Study, Play game, Listen music</dd>
            
            <dd class="clear"></dd>
            
            <dt>References</dt>
            <dd>Available on request</dd>
            
            <dd class="clear"></dd>
        </dl>
        
        <div class="clear"></div>
    
    </div>

</body>

</html>');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('PHP_NguyenHongQuan.pdf');
