<?php
    session_start();
    
    require 'view/header.php';
    require_once 'model/db_connect.php';
    require_once 'model/db_functions.php';

    // Setup the error_message - empty string to start
    $error_message = '';
        
    // Get Names from Form -- use server-side validation (the filter_input function)
    $firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        
    // See if this page is being loaded after a user has entered a name in the form
    if (isset($firstName) && isset($lastName)) {
            
        // Get result of filter_input() and check for invalid data
        if ($firstName === false) {
            $error_message = 'Invalid first name. ';
        } elseif ($lastName === false) {
            $error_message = 'Invalid last name.';
        }

        // Check if there is an error. Print it and then stop
        // the Script.
        if (!empty($error_message)) {
            echo $error_message . '<p>Go <a href="name_form.php">back to the form</a></p>';
            exit();
        }

        $fullName = "$firstName $lastName";
    
        // Has the user already entered the same name this session?
        $duplicateName = false;
        // Has the $_SESSION var already been set?
        if (isset($_SESSION['names'])) {
            // names is an array. Loop through it and see if there is a match
            foreach($_SESSION['names'] as $name) {
                if ($fullName == $name) {
                    $duplicateName = true;
                    // found a match, no need to keep looping
                    break;
                }
            }
        } else {
            // $_SESSION is an associative array. At key => names, will be a regular array
            $_SESSION['names'] = array();
        }
      
        // Store Name in DB as long as it isn't a duplicate
        if (!$duplicateName) {
            storeName($firstName, $lastName);
        
            // add this name to the $_SESSION 'names' array 
            $_SESSION['names'][] = $fullName; // add name to end of names array
            echo "<h4 class=\"name\">The Name You entered was: $fullName</h4>";
        } else {
            echo "<p>You already entered this name so it won't be stored in the DB.</p>";
        }
    }
    
    // Get Names from DB
    $names = getAllNames();
?>
    <table class="table table-bordered table-striped" id="names">
        <caption>Names Stored in DB:</caption>
        <thead>
            <tr>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
            </tr>
        </thead>
        <tbody>
            <!-- use foreach loop to fetch contents of each row -->
            <?php foreach ($names as $name) { ?>
            <tr>
                <td><?php echo $name['last_name']; ?></td>
                <td><?php echo $name['first_name']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <p><a href="view/name_form.php">Enter a Name</a></p>
    <!-- include the footer. -->
<?php require 'view/footer.html'; ?>