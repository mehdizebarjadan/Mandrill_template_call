<?php
require 'header.php';
try {
    $mandrill = new Mandrill('-7khFBuxhClaT3cDpLNw8Q');
    $name = 'Mandrill Template';
    $from_email = 'mehdizebarjadan@gmail.com';
    $from_name = 'Mehdi';
    $subject = 'Add Template';
    $code = '<div>Template code</div>
                <h1>Welcome</h1>
                <p>please follow our tutorial.</p>
                <p>Regards</p>
                <p>Mehdi</p>';
    $text = 'This is my first template.';
    $publish = false;
    $labels = array('Mandrill Label');
    $result = $mandrill->templates->add($name, $from_email, $from_name, $subject, $code, $text, $publish, $labels);
    ?>
    <pre><?php print_r($result); ?></pre>


<?php
} catch (Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
    throw $e;
}
?>

<?php
require 'footer.php';
?>
