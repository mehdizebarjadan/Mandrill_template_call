<?php
require 'header.php';
try {
    //initialize the Mandrill class with API KEY
    $mandrill = new Mandrill('-7khFBuxhClaT3cDpLNw8Q');
    //the name for the new template - must be unique
    $name = 'Mandrill Template';
    //a default sending address for emails sent using this template
    $from_email = 'mehdizebarjadan@gmail.com';
    //a default from name to be used
    $from_name = 'Mehdi';
    //a default subject line to be used
    $subject = 'Add Template';
    //the HTML code for the template with mc:edit attributes for the editable elements
    $code = '<div>Template code</div>
                <h1>Welcome</h1>
                <p>please follow our tutorial.</p>
                <p>Regards</p>
                <p>Mehdi</p>';
    //a default text part to be used when sending with this template
    $text = 'This is my first template.';
    //set to false to add a draft template without publishing
    $publish = false;
    //an optional array of up to 10 labels to use for filtering templates
    $labels = array('Mandrill Label');
    //add new template
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
