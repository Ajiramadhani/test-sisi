<?php 

include('simple_html_dom.php'); 
$cari = $_GET['cari'];
$link = "https://www.tokopedia.com/search?st=product&q=$cari";
$html = file_get_html($link); 
  
foreach($html->find('div.css-1f4mp12') as $title) { 
    echo $title->plaintext; 
 
echo "</br>"; 
} 

?>
