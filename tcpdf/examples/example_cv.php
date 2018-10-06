<?php
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-01-25
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 061');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 061', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('freeserif', '', 12);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style
$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
    .cvp-content.two {
        width: 800px;
        height: auto;
        color: #333333;
        padding: 50px 0 20px 0px;
        background-color: rgb(43, 73, 94);
        font-size: 13px;
        min-height: 1116px;
    }
    .cv-containter .cvp-content {
        position: relative;
    }
    .seven .infor-user {
        width: 530px;
        float: left;
        background-color: #F6C500;
        min-height: 290px;
        padding: 35px 0px;
        padding-bottom: 0;
        position: relative;
    }
	h1 {
		color: navy;
		font-family: times;
		font-size: 24pt;
		text-decoration: underline;
	}
	p.first {
		color: #003300;
		font-family: helvetica;
		font-size: 12pt;
	}
	p.first span {
		color: #006600;
		font-style: italic;
	}
	p#second {
		color: rgb(00,63,127);
		font-family: times;
		font-size: 12pt;
		text-align: justify;
	}
	p#second > span {
		background-color: #FFFFAA;
	}
	table.first {
		color: #003300;
		font-family: helvetica;
		font-size: 8pt;
		border-left: 3px solid red;
		border-right: 3px solid #FF00FF;
		border-top: 3px solid green;
		border-bottom: 3px solid blue;
		background-color: #ccffcc;
	}
	td {
		border: 2px solid blue;
		background-color: #ffffee;
	}
	td.second {
		border: 2px dashed green;
	}
	div.test {
		color: #CC0000;
		background-color: #FFFF66;
		font-family: helvetica;
		font-size: 10pt;
		border-style: solid solid solid solid;
		border-width: 2px 2px 2px 2px;
		border-color: green #FF00FF blue red;
		text-align: center;
	}
	.lowercase {
		text-transform: lowercase;
	}
	.uppercase {
		text-transform: uppercase;
	}
	.capitalize {
		text-transform: capitalize;
	}
	.seven .ui-namebox {
	    margin-top: 1000px;
        display: block;
        margin-bottom: 10px;
        position: relative;
    }
    .seven .ph-title h3, .seven .ui-namebox h3 {
        display: inline-block !important;
        position: relative;
        background-color: #F6C500;
        margin: 0 !important;
        color: #fff;
        font-size: 38px;
        font-weight: 600;
    }
    .seven .ui-namebox > .line2 {
        content: "";
        position: absolute;
        top: 50%;
        margin-top: 2px!important;
        height: 1px;
        background: #fff;
        width: 100%;
        left: 0;
    }
    .seven .ui-namebox h3 {
        width: 340px;
        max-width: 418px;
        letter-spacing: 1px;
    }
    .seven .ui-namebox h4 {
        text-transform: uppercase;
        color: #fff;
        font-weight: 600;
        font-size: 18px;
    }
    .seven .ui-intro {
        padding: 10px 50px;
        position: relative;
    }
    .seven .ui-intro p {
        font-size: 14px;
        color: #fff;
        text-align: left;
    }
    .seven .cvp-left {
        width: 530px;
        float: left;
        padding: 0;
        padding-right: 40px;
        position: relative;
        border-right: 1px solid #B3B3B3;
        min-height: 300px;
    }
    .seven .ui-title {
        border-bottom: 1pt #B3B3B3 solid;
    }
    .seven .ui-cv .ui-title h3 {
        padding-left: 50px;
        font-size: 21px;
        text-transform: uppercase;
        color: rgb(246, 197, 0);
    }
</style>
<div class="cvp-content two c000000 seven cF6C500">
    <div class="logo-top">
        <img src="https://cdn.timviecnhanh.com/asset/home/img/logomau.png" alt="Logo Timviecnhanh">
    </div>
            <div class="logo-bottom">
            www.timviecnhanh.com
        </div>
        <div class="clearfix"></div>
    <div class="row">
        <div class="cvp-top">
            <div class="infor-user center-content change-bg-color" style="background-color: rgb(246, 197, 0);">
                <div class="ui-namebox">
                    <span class="line mb0 mt0"></span>
                    <span class="line2 mb0 mt0"></span>
                    <h3 class="change-line-height change-bg-color change-font-size" style="background-color: rgb(246, 197, 0);">Nguyễn Hồng Quân</h3>
                    <h4 placeholder="Nhập tiêu đề hồ sơ" class="allow-editable change-line-height change-font-size" contenteditable="true" data-name="resume[title]">Lập Trình Viên Php</h4>
                </div>
                <div class="ui-intro">
                    <p><span class="change-font-size change-line-height">Mục tiêu nghề nghiệp:</span> <span placeholder="Nhập mục tiêu nghề nghiệp" class="disNormal fontWeight-normal allow-editable change-font-size change-line-height" contenteditable="true" data-name="resume[career_obj]">
                            Mong muốn có cơ hội làm việc trong môi trường chuyên nghiệp, chế độ đãi ngộ tốt.<br>
Mức lương thỏa thuận để phù hợp với năng lực bản thân <br>
Phấn đấu để tương lai được làm việc ở một vị trí cao hơn phù hợp với khả năng của mình<br>
Tận tâm với công việc, yêu nghề, tôn trọng đồng nghiệp và luôn đặt lợi ích của tập thể lên trên hết.</span> </p>
                </div>
                <span class="line mb0 mt0"></span>
            </div>
            <div class="avatar-user position-relative" onmouseover="jQuery('.btn-change-img-avatar').css('opacity', 1)" onmouseout="jQuery('.btn-change-img-avatar').css('opacity', 0)">
                <div class="image-avatar" id="cvp-ava" style="width: 100%; height: 100%; background-image: url('https://cdn.timviecnhanh.com/asset/home/img/small-avatar1.png'); background-repeat: no-repeat; background-position: center center; background-size: cover;"></div>
<!--                <img src="--><!--"-->
<!--                     alt="Avatar" width="270" height="290" class="image-avatar" id="cvp-ava">-->

                <div class="btn-change-img-avatar fix-tp1" style="opacity: 0;"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh</div>
            </div>
        </div>
        <div class="cvp-bottom position-relative">
            <div class="cvp-left">
                <!--<span class="line-right"></span>-->
                                    <div class="ui-cv page-break-inside-avoid">
                        <div class="ui-title">
                            <h3 class="change-font-size change-line-height change-color" style="color: rgb(246, 197, 0);">Học vấn</h3>
                        </div>
                                                    <div class="ui-content">
                            <div class="ui-content-left">
                                <span class="line mb0 mt0"></span>
                                <div>
                                    <h4 class="change-font-size change-color line-height-38" style="color: rgb(246, 197, 0);">
                                        <span class="disNormal change-font-size change-color allow-editable" data-type="date" data-view="years" data-value-format="YYYY" data-name="diploma[2542256][year]" style="color: rgb(246, 197, 0);">2010</span>
                                        -
                                        <span class="disNormal change-font-size change-color allow-editable" data-type="date" data-view="years" data-value-format="YYYY" data-name="diploma[2542256][year_to]" style="color: rgb(246, 197, 0);">2015</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="ui-content-right">
                                <h4 placeholder="Nhập đơn vị đào tạo" class="allow-editable change-line-height change-color change-font-size" contenteditable="true" data-name="diploma[2542256][school_name]" style="color: rgb(246, 197, 0);">Đại Học Thủy Lợi</h4>
                                <p><span class="change-font-size change-line-height">Chuyên ngành: </span> <span placeholder="Nhập chuyên ngành" class="disNormal fontWeight-normal allow-editable change-line-height change-font-size" contenteditable="true" data-name="diploma[2542256][description]">Công Nghệ Thông Tin</span></p>
                                <p><span class="change-font-size change-line-height">Loại tốt nghiệp: </span> <span class="disNormal fontWeight-normal allow-editable change-line-height change-font-size" data-type="select" data-selection="[&quot;Gi\u1ecfi&quot;,&quot;Kh\u00e1&quot;,&quot;Trung b\u00ecnh&quot;]" data-name="diploma[2542256][gra_diploma]" data-value="2">Trung bình</span></p>
                                <p><span class="change-font-size change-line-height">Trình độ: </span> <span class="disNormal fontWeight-normal allow-editable change-line-height change-font-size" data-type="select" data-selection="{&quot;6&quot;:&quot;\u0110\u1ea1i h\u1ecdc&quot;,&quot;5&quot;:&quot;Cao \u0111\u1eb3ng&quot;,&quot;4&quot;:&quot;Trung c\u1ea5p&quot;,&quot;7&quot;:&quot;Cao h\u1ecdc&quot;,&quot;3&quot;:&quot;Trung h\u1ecdc&quot;,&quot;2&quot;:&quot;Ch\u1ee9ng ch\u1ec9&quot;,&quot;1&quot;:&quot;Lao \u0111\u1ed9ng ph\u1ed5 th\u00f4ng&quot;}" data-name="diploma[2542256][title]" data-value="6">Đại học</span></p>
                            </div>
                        </div>
                                            </div>
                
                                    <div class="ui-cv">
                        <div class="ui-title">
                            <h3 class="change-font-size change-line-height change-color" style="color: rgb(246, 197, 0);">kinh nghiệm</h3>
                        </div>
                                                    <div class="ui-content">
                                <div class="ui-content-left">
                                    <span class="line mb0 mt0"></span>
                                    <div>
                                        <h4 class="change-color change-font-size line-height-38" style="color: rgb(246, 197, 0);">
                                            <span class="disNormal allow-editable" data-type="date" data-view="months" data-name="experience[2380271][start_date]">1-2016</span>
                                            -
                                            <span class="disNormal allow-editable" data-type="date" data-view="months" data-name="experience[2380271][end_date]">8-2016</span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="ui-content-right">
                                    <h4 class="disNormal change-line-height change-color change-font-size" style="color: rgb(246, 197, 0);"><span placeholder="Nhập tên công ty" class="allow-editable" contenteditable="true" data-name="experience[2380271][company_name]">Oswords</span></h4>
                                    <p class="change-font-size change-line-height mar-bot20"> <span placeholder="Nhập chức danh" class="allow-editable" contenteditable="true" data-name="experience[2380271][position]">Lập Trình Viên</span>
                                    </p>
                                    <p class="change-font-size change-line-height mar0"><span>Mô tả:</span></p>
                                    <p class="mar-bot20"><span placeholder="Nhập mô tả công việc" class="fontWeight-normal allow-editable change-font-size change-line-height" contenteditable="true" data-name="experience[2380271][description]">- Lập trình web bằng php, magento, jquery<br>
- Xử lý lỗi và làm việc trực tiếp với nhà cung cấp để xử lý các lỗi liên quan<br>
- Tham mưu cho cấp trên các giải pháp hiệu quả cho công việc</span></p>
                                                                    </div>
                            </div>
                                            </div>
                
                                                            </div>
            <div class="cvp-right">
                <div class="ui-content-right">
                    <div class="ui-infor page-break-inside-avoid">
                        <p><span class="change-line-height change-font-size">Giới tính:</span> <span class="fontWeight-normal change-line-height change-font-size">Nam</span></p>
                        <p><span class="change-line-height change-font-size">Ngày sinh:</span> <span class="fontWeight-normal change-line-height change-font-size">10/06/1991</span></p>
                        <p><span class="change-line-height change-font-size">Điện thoại:</span> <span class="fontWeight-normal change-line-height change-font-size">01674584840</span></p>
                        <p><span class="change-line-height change-font-size">Email:</span> <span class="fontWeight-normal change-line-height change-font-size">quannguyen1456@gmail.com</span></p>
                        <p><span class="change-line-height change-font-size">Địa chỉ:</span> <span class="fontWeight-normal change-line-height change-font-size">Hà Nội</span></p>
                    </div>

                                                <div class="ui-skills page-break-inside-avoid">
                                <div class="ui-title">
                                    <h3 class="change-color change-font-size" style="color: rgb(246, 197, 0);">Tiếng Anh</h3>
                                </div>
                                <div class="ui-skill-progess">
                                    <div class="part-content pc-skill">
                                        <p>
                                            <span class=" change-line-height change-font-size">nghe</span>
                                            <span class="progress-bar">
                                              <span class="pb-core change-bg-color" style="width: 100%; background-color: rgb(246, 197, 0);"></span>
                                          </span>
                                        </p>
                                        <p>
                                            <span class=" change-line-height change-font-size">nói</span>
                                            <span class="progress-bar">
                                                <span class="pb-core change-bg-color" style="width: 50%; background-color: rgb(246, 197, 0);"></span>
                                            </span>
                                        </p>
                                        <p>
                                            <span class=" change-line-height change-font-size">đọc</span>
                                            <span class="progress-bar">
                                                <span class="pb-core change-bg-color" style="width: 100%; background-color: rgb(246, 197, 0);"></span>
                                            </span>
                                        </p>
                                        <p>
                                            <span class=" change-line-height change-font-size">viết</span>
                                            <span class="progress-bar">
                                                <span class="pb-core change-bg-color" style="width: 100%; background-color: rgb(246, 197, 0);"></span>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                                            
                                                <div class="ui-skills page-break-inside-avoid">
                                <div class="ui-title">
                                    <h3 class="change-color change-font-size" style="color: rgb(246, 197, 0);">tin học</h3>
                                </div>
                                <div class="ui-skill-progess">
                                    <div class="part-content pc-skill">
                                        <p>
                                            <span class=" change-line-height change-font-size">word</span>
                                            <span class="progress-bar">
                                                <span class="pb-core change-bg-color" style="width: 75%; background-color: rgb(246, 197, 0);"></span>
                                            </span>
                                        </p>
                                        <p>
                                            <span class=" change-line-height change-font-size">excel</span>
                                            <span class="progress-bar">
                                                <span class="pb-core change-bg-color" style="width: 75%; background-color: rgb(246, 197, 0);"></span>
                                            </span>
                                        </p>
                                        <p>
                                            <span class=" change-line-height change-font-size">powerpoint</span>
                                            <span class="progress-bar">
                                                <span class="pb-core change-bg-color" style="width: 75%; background-color: rgb(246, 197, 0);"></span>
                                            </span>
                                        </p>
                                        <p>
                                            <span class=" change-line-height change-font-size">outlook</span>
                                            <span class="progress-bar">
                                                <span class="pb-core change-bg-color" style="width: 75%; background-color: rgb(246, 197, 0);"></span>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                                                                                        </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// add a page
$pdf->AddPage();

$html = '
<h1>HTML TIPS & TRICKS</h1>

<h3>REMOVE CELL PADDING</h3>
<pre>$pdf->SetCellPadding(0);</pre>
This is used to remove any additional vertical space inside a single cell of text.

<h3>REMOVE TAG TOP AND BOTTOM MARGINS</h3>
<pre>$tagvs = array(\'p\' => array(0 => array(\'h\' => 0, \'n\' => 0), 1 => array(\'h\' => 0, \'n\' => 0)));
$pdf->setHtmlVSpace($tagvs);</pre>
Since the CSS margin command is not yet implemented on TCPDF, you need to set the spacing of block tags using the following method.

<h3>SET LINE HEIGHT</h3>
<pre>$pdf->setCellHeightRatio(1.25);</pre>
You can use the following method to fine tune the line height (the number is a percentage relative to font height).

<h3>CHANGE THE PIXEL CONVERSION RATIO</h3>
<pre>$pdf->setImageScale(0.47);</pre>
This is used to adjust the conversion ratio between pixels and document units. Increase the value to get smaller objects.<br />
Since you are using pixel unit, this method is important to set theright zoom factor.<br /><br />
Suppose that you want to print a web page larger 1024 pixels to fill all the available page width.<br />
An A4 page is larger 210mm equivalent to 8.268 inches, if you subtract 13mm (0.512") of margins for each side, the remaining space is 184mm (7.244 inches).<br />
The default resolution for a PDF document is 300 DPI (dots per inch), so you have 7.244 * 300 = 2173.2 dots (this is the maximum number of points you can print at 300 DPI for the given width).<br />
The conversion ratio is approximatively 1024 / 2173.2 = 0.47 px/dots<br />
If the web page is larger 1280 pixels, on the same A4 page the conversion ratio to use is 1280 / 2173.2 = 0.59 pixels/dots';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
