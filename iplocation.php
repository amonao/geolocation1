

<h2>Gdje je server?</h2>
   <form action='iplocation.php' method='post'>
      Domain <input type='text' name='domain'>
      <input type='submit'>
  
   </form>
<?php

require 'class.IPInfoDB.php';

//Get Domain from Form
$domain = $_POST['domain'];

//If Domain is NOT Empty Print Results
if($domain !=''){

    $result = shell_exec('ping -n 1 '.$domain);

    //Extract IP Address from Shell Exec Results
    preg_match('/'.$domain.'.*.bytes/',$result,$ipAddress);
    $ipAddress = implode(' ',$ipAddress);
    $ipAddress = explode(' ',$ipAddress);
    $ip = $ipAddress['1'];
    $ip = ltrim($ip,'[');
    $ip = rtrim($ip,']');

    echo "Domain: ".$domain."<br>";
    echo "IP Address: ".$ip."<br>";

    $ipinfodb = new IPInfoDB('514ef69cd6974b3b969d191e55218589fef6ff1aec8275492dd1b94fc2af9cc2');

    // Get country information only (Faster)
    $result = $ipinfodb->getCountry($ip);

    echo "<br>";
    echo 'Country Code : ' . $result['countryCode'] . '<br>';
    echo 'Country Name : ' . $result['countryName'] . '<br>';

    // Get city information (Slower)
    $result = $ipinfodb->getCity($ip);
 

    echo 'Country Code : ' . $result['countryCode'] . '<br>';
    echo 'Country Name : ' . $result['countryName'] . '<br>';
    echo 'Region Name  : ' . $result['regionName'] . '<br>';
    echo 'City Name    : ' . $result['cityName'] . '<br>';
    echo 'ZIP Code     : ' . $result['zipCode'] . '<br>';
    echo 'Latitude     : ' . $result['latitude'] . '<br>';
    echo 'Longitude    : ' . $result['longitude'] . '<br>';
    echo 'Time Zone    : ' . $result['timeZone'] . '<br>';
  



 
    

    
;
}
   $latitude = $result['latitude'];
   $longitude = $result['longitude'];
    include 'index.html'
  
?>

