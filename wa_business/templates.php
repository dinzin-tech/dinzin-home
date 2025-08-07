<?php

$whatsapp_business_id = '217432141458542';


// $url = "https://graph.facebook.com/v19.0/{$whatsapp_business_id}/message_templates?fields=id,name,status&limit=3";
$url = "https://graph.facebook.com/v19.0/{$whatsapp_business_id}/message_templates";
$access_token = 'EAAEiZAzZCZCr7kBO1eXywZBhe75IVC1CBTCFTw2jhctN5W3SDTkpymJfiDFYbiuzcrfLPTZBMBIwJBhwlHpXQvuZC9Ncy8a23AQwm1LCCmfic752M2UJZC9JePZAjMLN88NsjRcbWYQEInN7ZB70PEXag2pr0ZCnx2uUZCqzz3MMq2qjnF6io5ABRjjOSZAstAsWDJdyBosW0legvP4j56xfLmYZD'; // Replace this with your actual access token

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $access_token
));

$response = curl_exec($ch);
curl_close($ch);

// echo $response;
$templates = json_decode($response, true);

// print_r($templates);
// exit;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Templates</title>
</head>
<body>
    <div>
        <h1>All Templates</h1>
        <div>
            <table width="50%" style="border-collapse: collapse; border: 1px solid #ccc;">
                <thead style="background-color: #f2f2f2;">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    <?php foreach($templates['data'] as $template): ?>
                        <tr>
                            <td>
                                <?php echo $template['id']; ?>
                            </td>
                            <td>
                                <?php echo $template['name']; ?>
                            </td>
                            <td>
                                <?php echo $template['category']; ?>
                            </td>
                            <td>
                                <?php echo $template['status']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div>
        <h1>
            Create Template
        </h1>

        <div>
            <form>
                <label for="name">Template Name:</label><br>
                <input type="text" name="name" id="name"><br>

                <label>Select A Category:</label><br>
                <label>
                    <input type="radio" name="category" value="MARKETING">
                    Marketing
                </label><br>
                <label>
                    <input type="radio" name="category" value="UTILITY">
                    Utility
                </label><br>

                <label for="language">Select Language:</label><br>
                <select name="language" id="language">
                    <option value="en_US">English(US)</option>
                </select>

                <br>
                <button id="submit_template">Create</button>
            </form>
            <div id="response">

            </div>
        </div>
    </div>
    <script>
        let createBtn = document.getElementById("submit_template");
        
        createBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log("create btn clicked");

            var xhr = new XMLHttpRequest();
            var url = 'https://dinzin.in/wa_business/send_template.php';
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
                action: "template"
            };

            console.log(data);
            
            // Send the request with JSON data
            xhr.send(JSON.stringify(data));

        });
    </script>
</body>
</html>
