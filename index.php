<?php

$get = $_GET;

$field_list = array(
  "sendSMSReq",
  "msgHdr",
  "msgId",
  "cnvId",
  "extRefId",
  "bizObjId",
  "appId",
  "timestamp",
  "msgBdy",
  "mbNb",
  "txt",
  "src",
  "typ",
  "dvsn",
  "subDvsnId",
  "alrt",
  "intFlg",
  "msgPrrty",
  "sts",
  "cntntTyp",
  "siURL",
  "rtryAttmpt",
  "txnMd",
  "eml",
  "dndFlg",
  "langId",
);
$required_array = array();
foreach ($field_list as $fl) {
    if (!array_key_exists($fl,$get)) {
      array_push($required_array,$fl);
    }
}

if (sizeof($required_array) > 0) {
  foreach ($required_array as $ra) {
    echo $ra." is required<br/>";
  }
  echo "err";
  return false;
}

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://localhost:81/target/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($get));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// grab URL and pass it to the browser
$response = curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);
var_dump($response);

?>
