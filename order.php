<?php
session_start();
    if (!isset($_SESSION['userID'])) 
    {
        // $_SESSION['returnURL'] = $_SERVER['REQUEST_URI']; 
        $_SESSION['returnURL'] = 'cart.php'; 
        echo "<script>
            alert('Please login first.');
            window.location.href = 'login.php';
        </script>";
        // header("Location: login.php");
        // exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Exchange | Order</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;1,400;1,600&family=Poppins:wght@200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="order.css">
</head>
<body>
    <br>
    <br>
        <?php
            if (isset($_SESSION['user'])) {
                echo "<h1 class='welcomeMsg' style='text-align:center;'>Hello ". ucfirst($_SESSION['user']) ."</h1>";
            }
        ?>
    <div class="container">
        <h1>Payment Details</h1>
        <?php
            if (isset($_POST['final_amt'])) {
                unset($_SESSION['singleProd']);
                $amt = $_POST['final_amt'];
                echo'
                    <form id="paymentForm" action="payment_process.php" method="post">
                        <div class="form-group">
                            <label for="cardNumber">Card Number:</label>
                            <input type="text" id="cardNumber" placeholder="8481 5458 5541 1004" required>
                        </div>
                        <div class="form-group">
                            <label for="cardName">Cardholder`s Name:</label>
                            <input type="text" id="cardName" placeholder="Jayesh senu" required>
                        </div>
                        <div class="form-group">
                            <label for="expiryDate">Expiry Date:</label>
                            <input type="text" id="expiryDate" placeholder="MM/YY" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" placeholder="123" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                                <h1>'.$amt.'</h1>
                        </div>
                        <button type="submit" name="payButton" id="payButton">Pay Now</button>
                    </form>
                ';
            }
            if (isset($_SESSION['singleProd'])){
                $amt = $_SESSION['singleProd']['price'];
                echo'
                    <form id="paymentForm" action="payment_process.php" method="post">
                        <div class="form-group">
                            <label for="cardNumber">Card Number:</label>
                            <input type="text" id="cardNumber" placeholder="8481 5458 5541 1004" required>
                        </div>
                        <div class="form-group">
                            <label for="cardName">Cardholder`s Name:</label>
                            <input type="text" id="cardName" placeholder="Jayesh senu" required>
                        </div>
                        <div class="form-group">
                            <label for="expiryDate">Expiry Date:</label>
                            <input type="text" id="expiryDate" placeholder="MM/YY" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" placeholder="123" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                                <h1>'.$amt.'</h1>
                        </div>
                        <button type="submit" name="paySingleButton" id="payButton">Pay Now</button>
                    </form>
                ';
            }
            
        ?>
    </div>
</body>
</html>