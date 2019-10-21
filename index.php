<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .cont{
                margin-left: 350px;
                margin-top: 90px;
            }
            .formm{
/*                border-style: solid;
                border-color: red;
                border-radius: 30px;
                border-width: auto;*/
  border-style: solid;
  height: 300px;width:600px;
  
            }
            .formm p{
                                margin-top: 50px;
                                text-align: center;
                                margin-bottom: 50px;

            }
            .saer{
                margin-left: 45%;
            }
            table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
        </style>
    </head>
      <body>
        <form method="POST">
                    <div class="cont">

            <div class="formm">
                <div class="form-group"> 
            <p>Enter Country:<input type="text" name="inputtxt" id="fp" style="height:30px;width: 400px"></p>
                </div>
            <span class="saer"><input type="submit" name="submitebtn" id="btn" value="Search "></span>
            </div>
                    
        </form>
        
        </div>
            <p>
            <?php
 if (isset($_POST['submitebtn'])){
     if(empty($_POST['inputtxt'])){
         echo "<script> alert('please enter country')</script>";
     }else{
     
     $val=$_POST['inputtxt'];
     $hh="nigeria";
     echo $val;
$url = 'https://restcountries.eu/rest/v2/name/'.$val;

//$url = 'https://restcountries.eu/rest/v2/name/$val/';
$session = curl_init($url);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($session);
curl_close($session);
$search_results = json_decode($data, true);
if ($search_results === NULL) die('Error parsing json');
echo '<table style=width:33%>';
echo'<tr>';
echo '<th>NAME</th><th>Region</th><th>population</th><th>TimeZones</th>';
echo '</tr>';
foreach ($search_results as $myloop) {
$countryname = $myloop["name"];
$countrypopulation = $myloop["population"];
$coutryregion = $myloop["region"];
$coutrytime = $myloop["timezones"];
$coutrycurrency = $myloop["region"];
$coutrylanguage = $myloop["languages"];
$coutrycallcodes = $myloop["callingCodes"];

$strtime = implode(',',$coutrytime);
//$strcurency = implode(',',$coutrycurrency);
//$strlan = implode(',',$coutrylanguage);

echo '<tr>';
echo "<td>$countryname</td><td>$coutryregion</td><td>$countrypopulation</td><td>$strtime</td>";
echo '</tr>';
echo '</table>';

}
     }           
}
?>
            </p>
    </body>
</html>
