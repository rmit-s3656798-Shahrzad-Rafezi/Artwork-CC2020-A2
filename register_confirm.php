<?php
    session_start();
    require 'vendor/autoload.php';

    use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;

    if (!isset($_SESSION['registerData']) ){
        if (!isset($_POST['id']) ||
            !isset($_POST['firstname']) ||
            !isset($_POST['lastname']) ||
            !isset($_POST['dob']) ||
            !isset($_POST['email']) ||
            !isset($_POST['phone']) ||
            !isset($_POST['password']) ||
            !isset($_POST['confirmPassword']) ||
            strcmp($_POST['password'],$_POST['confirmPassword']) != 0){
                echo "go to register";
                // header("Location:register.php");
                exit(0);
        }
        $registerData = array(
            'username'=>$_POST['id'],
            'first_name'=>$_POST['firstname'],
            'last_name'=>$_POST['lastname'],
            'sex'=>$_POST['sex'],
            'dob'=>$_POST['dob'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'password'=>$_POST['password'],
            'confirmPassword'=>$_POST['confirmPassword']);
    
        $_SESSION['registerData'] = $registerData; 
    }

    $clientCognito = new CognitoIdentityProviderClient([ 
        'version' => 'latest',
        'region'  => 'us-east-1',
        'profile' => 'default',
            
        'app_client_id' => '4g2h44ft1ums13l1v36g3sdapq',
        'user_pool_id' => 'us-east-1_rGEhLRyIM',
    ]);
    if (!isset($_SESSION['verifyError'])) {
        $result = $clientCognito->signUp([
            'ClientId' => '4g2h44ft1ums13l1v36g3sdapq', // REQUIRED
            'Password' => $_SESSION['registerData']['password'], // REQUIRED
            'Username' => $_SESSION['registerData']['username'], // REQUIRED
            'UserAttributes' => [
                [
                'Name' => 'name',
                'Value' => $_SESSION['registerData']['username']
                ],
                [
                'Name' => 'email',
                'Value' => $_SESSION['registerData']['email']
                ]
            ],
            'ValidationData' => [
                [
                    'Name' => 'email', // REQUIRED
                    'Value' => $_SESSION['registerData']['email'],
                ],
                // ...
            ],
        ]);
    }        
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Confirm Registration Page</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container register d-flex align-items-center min-vh-100">
    <form method="post" action="process_register.php" class="register_form">

    <span class="glyphicon register glyphicon-user"></span>
      <h1>Confirm Account Creation</h1>
      <?php if (isset($_SESSION['verifyError'])) echo "<p>".$_SESSION['verifyError']."</p>";?>
      <div class="form-group">
        <label for="verify">Verification Code: </label>
        <input type="text" class="form-control" placeholder="Enter Verification Code" name="verify" required>
      </div>
      <button type="submit" class="btn btn-default register">Verify Account</button>
    </form>
  </div>
</body>

</html>