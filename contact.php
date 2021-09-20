<?php
if (!empty($_POST['name']) &&
  !empty($_POST['email']) &&
  !empty($_POST['message']) &&
  filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "admin@example.com";
    $subject = "Contact request submitted";

    // prepare email body text
    $body = "Name: ";
    $body .= $name;
    $body .= "\n";

    $body .= "Email: ";
    $body .= $email;
    $body .= "\n";

    $body .= "Message: ";
    $body .= $message;
    $body .= "\n";

    // send email
    $success = mail($to, $subject, $body, "From:" . $email);

    $status = $success ?
      'Thank you for contacting us. We will get back to you soon.' :
      'Oops! we could not send your contact request.';
}
?>

<?php include('./includes/top.php'); ?>
<?php include('./includes/nav.php'); ?>
<div>
    <h1>Contact Us</h1>

    <?php if (isset($status)) { ?>
    <div>
        <?php echo $status; ?>
    </div>
    <?php } ?>
    <form action="contact.php" method="post">
        <div>
            <label for="name">Name</label><br>
            <input type="text" name="name" value="">
        </div>
        <div>
            <label for="name">Email</label><br>
            <input type="email" name="email" value="">
        </div>
        <div>
            <label for="name">Message</label><br>
            <textarea name="message" rows="8" cols="80"></textarea>
        </div>
        <div>
            <input type="submit" name="" value="Send">
        </div>
    </form>
</div>
<?php include('./includes/footer.php'); ?>
<?php include('./includes/bottom.php'); ?>
