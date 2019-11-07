<?php require_once __DIR__ . '/vendor/autoload.php'; ?>

<?php include_once('includes/header.php'); ?>

<?php
$bg_img = 'assets/img/page-title.jpg';
$page_title = 'Contact Us';
$page_desc = 'Malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.';
include_once('includes/banner.php');
?>
<div class="contact-area sp">
    <div class="container">
        <div class="row">
            <div class="col-md-5 contact-info">
                <div class="single-info">
                    <h5>Phone</h5>
                    <p>+(121) - 237 - 979 - 3580</p>
                </div>
                <div class="single-info">
                    <h5>Email</h5>
                    <p>esmeralda_walsh@lucy.name</p>
                </div>
                <div class="single-info">
                    <h5>Address</h5>
                    <p>30 Heathcote Vista, Cassinfort, LA</p>
                </div>
                <div class="single-info">
                    <h5>Social</h5>
                    <p>
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-linkedin"></a>
                        <a href="#" class="fa fa-pinterest"></a>
                    </p>
                </div>
            </div>
            <div class="col-md-7">

                <?php

                if ( isset($_POST['send_email']) ) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];

                    // Create the Transport
                    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                        ->setUsername('itonephp@gmail.com')
                        ->setPassword('it$one123php');

                    // Create the Mailer using your created Transport
                    $mailer = new Swift_Mailer($transport);

                    // Create a message
                    $message = (new Swift_Message($subject))
                        ->setFrom([$email => $name])
                        ->setTo(['itonephp@gmail.com' => 'IT ONE'])
                        ->setBody($message, 'text/html');

                    // Send the message
                    $result = $mailer->send($message);

                    if ($result) echo '<h1>Email Send Success!</h1>';
                    else echo 'Email Send Fail!';
                }



                ?>

                <form action="" method="post" class="contact-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" placeholder="Name" name="name">
                        </div>
                        <div class="col-lg-6">
                            <input type="email" placeholder="Email" name="email">
                        </div>
                        <div class="col-lg-12">
                            <input type="text" placeholder="Subject" name="subject">
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Message" name="message"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <input class="button" type="submit" name="send_email" value="Send Message">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d43546.86165317726!2d-0.1304800562216428!3d51.50205515285579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sbd!4v1506591318507"></iframe>
</div>

<?php include_once('includes/footer.php'); ?>