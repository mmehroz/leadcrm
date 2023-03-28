<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Form Pfd Layout</title>
<style type="text/css">

body { margin: 0 auto;}
h1{
	font-size:26px;
	text-align:center;
}
.detailtable{ width:100%; margin-top:20px; }
.detailtable tr th{ padding:5px; font-size:16px; font-family:"Times New Roman"; color:#fff;}
.detailtable tr td { padding:5px; font-size:14px; font-family:"Times New Roman"; color:#111; border-bottom:2px solid #5F5F5F; text-align: center;}
.pricetable{
  font-size:12px;
  color:#111;
  font-family:"Times New Roman";
  width:100%;
  text-align:right;
  margin-top:20px;
}
.pricetable tr td{
  padding:5px;
  border-bottom:1px solid #111;
}
.pricetable tr td span strong{
  color:#b20738;
}
.detailtable p{
  padding:0 10px;
  font-size:12px;
  margin:5px 0;
}
.detailtable p u{
  font-weight:bold;
}
p.warning{
  color:#ff0000;
}
p.warning a{
  color:#ff0000;
}
.signatureimg{
  border-bottom:1px solid #333;
  padding:0 30px;
}
.legal p {font-size:14px !important; line-height:20px;}
.main_container{
   
    margin: 10px auto;
    padding: .2in .1in;
    min-height: 8in;
    max-width: 8in;
    min-height: 11in;
    background-color: #FFF;
    font-size: 13px;
    font-family: 'Times New Roman', Times, serif;
    
}

</style>

</head>

<body>
    <div class="wrapper main_container">
        <table class="header" style="border-bottom:4px solid #b20738; margin-top:10px; width:100%;">
            <tr class="logo" style="">
                <td style="width:25%;"><img src="<?php echo $logo; ?>" alt="logo" ></td> 
            
                <td class="tagline" style="width:30%;">
                  <h1>Form</h1>
                </td>
            </tr>
        </table>    
      
        <table>
          <tr>
              <td class="colone" style="padding:10px; border-right:4px solid #cbcbcb; width: 230px;vertical-align: top;">
                    <h1 style="font: bold 20px 'Times New Roman';text-align: left;">Sample Heading</h1>
                    <p style="font: 14px 'Times New Roman';margin-top:10px; line-height: 16px; color:#0c0c0c;">
                        Address will goes here...<br/>
                        <a style="color:#0c0c0c; text-decoration:none;" href="#">admin@admin.com</a><br/>
                        <a style="color:#0c0c0c; text-decoration:none;" href="#">http://www.domain.com</a>
                    </p>
                </td>
                <td class="persondetail" style="float:left;padding:10px;width: 180px;">
                    <h1 style="font: bold 20px 'Times New Roman'; text-align: left; color: #b20738;">Bill to</h1>
                    <p style="font: 14px 'Times New Roman';line-height: 16px; color:#0c0c0c;margin-top:10px;">
                    </p>
                </td>
                <td class="shopdetail" style="float:left;padding:10px;width: 180px;">
                    <h1 style="font: bold 20px 'Times New Roman'; text-align: left; color: #b20738;">Ship to</h1>
                    <p style="font: 14px 'Times New Roman';line-height: 16px; color:#0c0c0c;margin-top:10px;">
                    </p>
                </td>
            </tr>
        </table>
        
        <br>
        <div class="panel panel-primary">
         <div style="background:#5F5F5F;" class="panel-heading">
             <h3 style="margin:0 10px;padding:0;color:#fff;" class="panel-title">Note:</h3> 
          </div>
          <div class="panel-body legal" style="margin-top:10px;">

          </div>
          </div>
   
    </div>
</body>
</html>