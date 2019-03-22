<?php

// loads in the planet class to parse the etherscan data to 'readable' data
require './Planet.php';

// API docs:
// https://etherscan.io/apis
// https://github.com/EverexIO/Ethplorer/wiki/Ethplorer-API?from=etop
// you can use Postman (https://www.getpostman.com/) to test your actual calls

// **********************************************************************************
// This is meant to demonstrate the api-calls used to pull planet data from Etherscan
// **********************************************************************************


// A. Set variables to search/filter found planets

    // 1. block to start searching in
    $startBlock = 5744854;

    // 2. last block to search in
    // you might have to change this according to actual throughput, as this
    // might 'time-out' due to a possible 'longer-than-30-seconds'-call
    $toBlock = $startBlock + 2500;

    // 3. 0xUniverse contract address
    $contractAddress = "0x06a6a7af298129e3a2ab396c9c06f91d3c54aba8";

    // 4. Topic in tx to filter on (0xUniverse launches here)
    $topic0 = "0xf54657dd54b8d60149296317ff8dd81a5f9d0ed22aa82d92db76bc5ce97973c4";

    // 5. Your Etherscan API-key
    $apiKey = "JUK4FB6MMYQPT7PXABDC5TDE6J8R4X638T"; // this is mine but you can make your own at etherscan

    // API call link:
    $url = "https://api.etherscan.io/api?module=logs&action=getLogs&fromBlock=" . $startBlock . "&toBlock=" . $toBlock . "&address=" . $contractAddress ."&topic0=" . $topic0 . "&apikey=".$apiKey;

// B. Handle the API calls

    // 1. actual call to the api-link, this also puts the response in '$json'
    $json = file_get_contents(($url));

    // 2. decode the json response into '$planetInfo'
    $planetInfo = json_decode($json);

    // 3. check if the response's status was '1' cfr. OK
    if ($planetInfo->status == "1") {

      // loop counter
      $c=0;
      // loop over every 'new' planet in the Response

      foreach ($planetInfo->result as $planet) {
        $c++;
        // this $planet variable will contain all the data that was returned
        // into the $planetInfo->result variables
        //

        $newPlanet = new Planet($planet);

        // show tha planets data (this parses the planet object to json)
        echo json_encode($newPlanet);

        // now you can use the $newPlanet object for your own logic/data handling
        // I use a MySQL database but you can choose whatever fits your style...

      }//end foreach

    }//end if(status==1)
?>