<?php
require 'header.php';
try {
    $mandrill = new Mandrill('-7khFBuxhClaT3cDpLNw8Q');
    $name = 'Mandrill Template';
    $result1 = $mandrill->templates->info($name);
    ?>
    <pre><?php print_r($result1);?></pre>


<?php
    $name = 'First Mandrill Template';
    $from_email = 'mehdizebarjadan@gmail.com';
    $from_name = 'Mehdi Zebarjadan';
    $subject = 'update Temalate';
    $code = '<div>Updated code</div>
                <h1>Hi Dear</h1>
                <p>please follow our tutorial.</p>
                <p>Regards</p>';
    $text = 'Update template';
    $publish = false;
    $labels = array('New Mandrill Label');
    $result = $mandrill->templates->update($name, $from_email, $from_name, $subject, $code, $text, $publish, $labels);
    print_r($result);
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
