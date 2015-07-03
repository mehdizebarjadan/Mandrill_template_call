<?php
require 'header.php';
try {
    //initialize the Mandrill class with API KEY
    $mandrill = new Mandrill('-7khFBuxhClaT3cDpLNw8Q');
    //the name for the new template - must be unique
    $name = 'Mandrill Template';
    //get the info of an existing template
    $result1 = $mandrill->templates->info($name);
    ?>
    <pre><?php print_r($result1);?></pre>


<?php
    //get the info of an existing template
    $name = 'First Mandrill Template';
    //a default sending address for emails sent using this template
    $from_email = 'mehdizebarjadan@gmail.com';
    //a default from name to be used
    $from_name = 'Mehdi Zebarjadan';
    //a default subject line to be used
    $subject = 'update Temalate';
    //the HTML code for the template with mc:edit attributes for the editable elements
    $code = '<div>Updated code</div>
                <h1>Hi Dear</h1>
                <p>please follow our tutorial.</p>
                <p>Regards</p>';
    //a default text part to be used when sending with this template
    $text = 'Update template';
    //set to false to add a draft template without publishing
    $publish = false;
    //an optional array of up to 10 labels to use for filtering templates
    $labels = array('New Mandrill Label');
    //Update the code for an existing template. If null is provided for any fields, the values will remain unchanged.
    $result = $mandrill->templates->update($name, $from_email, $from_name, $subject, $code, $text, $publish, $labels);
    //display the result
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
