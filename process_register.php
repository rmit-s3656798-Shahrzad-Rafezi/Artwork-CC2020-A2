<?php
    session_start();
    require 'vendor/autoload.php';

    use Aws\Lambda\LambdaClient;
    use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
    /////Added this package
    use Aws\Exception\AwsException;

    if (!isset($_SESSION['registerData'])) {
        header("Location:register.php");
        exit(0);
    }
    if (!isset($_POST['verify'])) {
        header("Location:register_confirm.php");
        exit(0);
    }
    

    $clientLambda = LambdaClient::factory([
    'version' => 'latest',
    'region'  => 'us-east-1',
    'profile' => 'default',
    ]);

    $clientCognito = new CognitoIdentityProviderClient([ 
        'version' => 'latest',
        'region'  => 'us-east-1',
        'profile' => 'default',
            
        'app_client_id' => '4g2h44ft1ums13l1v36g3sdapq',
        'user_pool_id' => 'us-east-1_rGEhLRyIM',
    ]);

    
    // TODO: Be able  to check if the input is not empty and make some fields required
    $username = $_SESSION['registerData']['username'];
    $first_name = $_SESSION['registerData']['first_name'];
    $last_name = $_SESSION['registerData']['last_name'];
    $sex = $_SESSION['registerData']['sex'];
    $dob = $_SESSION['registerData']['dob'];
    $email = $_SESSION['registerData']['email'];
    $phone = $_SESSION['registerData']['phone'];
    $password = $_SESSION['registerData']['password'];
    $confirmPassword = $_SESSION['registerData']['confirmPassword'];
    
    try {
        $clientCognito->confirmSignUp([
            'ClientId' => '4g2h44ft1ums13l1v36g3sdapq',
            'Username' => $_SESSION['registerData']['username'],
            'ConfirmationCode' => $_POST['verify'],
      ]);
      /////fixed the error I was getting that says "getAwsErrorMessage" doesn't exist
    } catch (AwsException $e) {
        $_SESSION['verifyError'] = $e->getAwsErrorMessage();
        header("Location:register_confirm.php");
        exit(0);
    }

    // Connect to the db server
    // TODO: Find a way to not display the host and the password in here
    $db = pg_connect("host=database-cc2020-a2.cjkzs400xcx4.us-east-1.rds.amazonaws.com dbname=artwork user=postgres password=FNH06upJc34i3hrm5h")
        or die('Could not connect: ' . pg_last_error());

    // Define the query
    // TODO: Find a way to make the password secure
    $query = "INSERT INTO users VALUES('$username', '$first_name ', '$last_name', '$sex', '$password', '$email', '$dob', '$phone')";

    // Run an insert query
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    

    $user_data = array($username, $first_name, $last_name, $email);
    $result2 = $clientLambda->invoke([
        'FunctionName' => 'arn:aws:lambda:us-east-1:013967530451:function:HelloWorldPython',
        'InvocationType' => 'Event',
        'LogType' => 'Tail',
        'Payload' => json_encode($user_data),
    ]); 
    $promise = $clientLambda->invokeAsync([
        'FunctionName' => 'arn:aws:lambda:us-east-1:013967530451:function:HelloWorldPython',
        'InvokeArgs' => json_encode($user_data),
    ]);

    // Redirect to home page
    header("Location:homepage.php");
    exit(0);
?>