<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['submit'])) {

    $userId = $_POST['user_id'];

    $url = "https://bdgamesbazar.com/api/auth/player_id_login";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
   "x-datadome-clientid: DTQ-smwidCHmoB7w72gfWkARVwX~nAXDJhCDxkfb736NwsO~7mHd1j40V0N9ZXVGGqvAP09nRrZRixvN6CSOSDlQJCA-w7JtN5BaDs5ccuvAylVhDg2OIh55zOJw73O",
   "User-Agent: Mozilla/5.0 (Linux; Android 10) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36",
   "Content-Type: application/json",
   "Sec-GPC: 1",
   "Origin: https://bdgamesbazar.com",
   "Sec-Fetch-Site: same-origin",
   "Sec-Fetch-Mode: cors",
   "Sec-Fetch-Dest: empty",
   "Referer: https://bdgamesbazar.com/app/100067/idlogin",
   "Accept-Encoding: gzip, deflate, br",
   "Accept-Language: en-US,en;q=0.9",
   "Cookie: datadome=DTQ-smwidCHmoB7w72gfWkARVwX~nAXDJhCDxkfb736NwsO~7mHd1j40V0N9ZXVGGqvAP09nRrZRixvN6CSOSDlQJCA-w7JtN5BaDs5ccuvAylVhDg2OIh55zOJw73O; source=mb; b.bdpopup.undefined=1; session_key=t38tfue12c5zceth448cpmngvkc3r1h9",
);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = array(
      "app_id" => 100067,
      "login_id" => $userId,
      "app_server_id" => 0,
    );
    $jsonData = json_encode($data);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
  }
  $jsonDecode = json_decode($resp, true);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Free Fire API</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <form class="row g-12" action="index.php" method="POST">
          <div class="col-auto">
            <label for="user_id" class="visually-hidden">ID</label>
            <input type="text" name="user_id" class="form-control" id="user_id" placeholder="123456" value="<?php echo $_POST['user_id'] ?? ''; ?>">
          </div>
          <div class="col-auto">
            <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
          </div>
        </form>
        <div class="col-md-6">
        <table class="table table-responsive">
          <thead>
            <tr>
              <th class="text-center" scope="col">Region</th>
              <th class="text-center" scope="col">Name</th>
              <th class="text-center" scope="col">Open Id</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
