<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if(!isset($_GET['token'])) {
    echo "You have no access to this page!";
    exit;
}
elseif($_GET['token'] === "DniinZiinD") {
    echo "This is a testing environment \n\n";
}
else {
    echo "You have no access to this page!";
    exit;
}


// $whatsapp_business_account_id = "250134741507437";
$whatsapp_business_account_id = "217432141458542";
$access_token = "EAAEiZAzZCZCr7kBO427hc1wfZCwY7dqHEu6RJmxZCRS7xVBMsvRRKPx3rU8i69CmLfJkxYZBBHhOGvQKFobnkHE7HgCT1tfaqosm3ZBCVigDTg9bbbZATLs5tFuZB1Cp73JAhycnu5InZAFr2Y8VxPBlth5XSLoC8ZCZBLZALjwo6XyOv74cjg0rl8QiUJizti4W5Mf1AATG5A53NXrD7dOeeK2TJLF3ZBqXUZD";

// $url = 'https://graph.facebook.com/v19.0/' . $whatsapp_business_account_id . '/message_templates?fields=id,name,message_templates,phone_numbers';
$url = 'https://graph.facebook.com/v19.0/' . $whatsapp_business_account_id . '?fields=id,name,message_templates,phone_numbers';
//$url = 'https://graph.facebook.com/v19.0/' . $whatsapp_business_account_id . '/message_templates';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $access_token
]);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code == 200) {
    // Success, $response contains the data
    // echo $response;
    $data = json_decode($response, true);
    //print_r($data);
    //exit;
} else {
    // Error handling
    echo "Error: HTTP status code $http_code";
    exit;
}

echo "<br/> meta endpoint: ";
echo $url;
echo "<br/>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp Business Account</title>
</head>
<body>
    <div>
        <h1>WhatsApp Business Account Details</h1>
        <p><h5>Business Business Account ID: <?php echo $data['id']; ?></h5></p>
        <p><h5>Display Name: <?php echo $data['name']; ?></h5></p>
        <hr>
        <h1>Phone Numbers</h1>
        <?php $phone_nummbers = $data['phone_numbers']['data']; ?>
        <?php foreach($phone_nummbers as $phone): ?>
        <p>
            <h5>Phone Number: <?php echo $phone['display_phone_number']; ?></h5>
            <h5>Phone Number ID: <?php echo $phone['id']; ?></h5>
            <h5>Verified Name: <?php echo $phone['verified_name']; ?></h5>
            <h5>Platform: <?php echo $phone['platform_type']; ?></h5>
            <h5>Quality Rating: <?php echo $phone['quality_rating']; ?></h5>
            <h5>Level: <?php echo $phone['throughput']['level']; ?></h5>
            <!-- <h5>Webhook: <?php echo $phone['webhook_configuration']['application']; ?></h5> -->
        </p>
        <hr>
        <?php endforeach; ?>
    </div>
    <!-- <hr> -->
    <div>
        <?php $message_templates = $data['message_templates']['data']; ?>
        <h1>Message Templates</h1>
        <?php foreach($message_templates as $template): ?>
            <h4>Name: <?php echo $template['name']; ?></h4>
            <p>Language: <?php echo $template['language']; ?></p>
            <p>Status: <?php echo $template['status']; ?></p>
            <p>Category: <?php echo $template['category']; ?></p>
            <p>ID: <?php echo $template['id']; ?></p>
            <p>Components: <?php echo json_encode($template['components']); ?></p>
            <hr>
        <?php endforeach; ?>
    </div>

    <div>
        <form>
            <h1>Send A message</h1>
            <label for="from">From</label>
            <select name="from" id="from">
                <?php foreach($phone_nummbers as $phone): ?>
                    <option value="<?php echo $phone['id']; ?>"><?php echo $phone['display_phone_number']; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="to">To</label>
            <!-- <input type="number" name="to" id="to"> -->
            <textarea type="text" name="to" id="to"></textarea>
            <br>
            <label for="template">Message Template</label>
            <select name="template" id="template">
                <script>
                    let templates = {};
                </script>
                <?php foreach($message_templates as $template): ?>
                    <option value="<?php echo $template['id']; ?>"><?php echo $template['name']; ?></option>
                    <script>
                        templates['<?php echo $template['id'];?>'] = { name: '<?php echo $template['name']; ?>', language: '<?php echo $template['language']; ?>'};
                    </script>
                <?php endforeach; ?>
            </select>
            <br>
            <button id="send_msg">Send Message</button>

        </form>

        <div>
            <p id="response">

            </p>
        </div>
    </div>

    <script>
        // const data = JSON.parse(<?php echo $response; ?>);
        // const data = <?php echo $response; ?>;
        // console.log(data);
        let sendMsgBtn = document.getElementById("send_msg");
        console.log(templates);
        sendMsgBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log("send btn clicked");
            let from = document.getElementById("from").value;
            let to = document.getElementById("to").value;
            console.log(to);
            let template = templates[document.getElementById("template").value];
            console.log(template['name']);
            // return;

            var xhr = new XMLHttpRequest();
            var url = 'https://dinzin.in/wa_business/send_msg.php';
            var method = 'POST';
            // Set up the request
            xhr.open(method, url, true);

            // Set up callback function
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Request was successful, handle response
                        var response = xhr.responseText;
                        document.getElementById('response').innerHTML = response;
                    } else {
                        // Request failed
                        document.getElementById('response').innerHTML = 'Error: HTTP status code ' + xhr.status;
                    }
                }
            };
            
            // Create request body
            var data = {
                from: from,
                to: to,
                template: {
                    name: template['name'],
                    language: {
                        code: template['language']
                    }
                }
            };

            console.log(data);
            
            // Send the request with JSON data
            xhr.send(JSON.stringify(data));

        });
    </script>
</body>
</html>