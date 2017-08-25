<!-- include the header. -->
<?php
    require 'header.php';
?>
        <!-- divide this column into 3/4 again to decrease size of form fields (just on large or medium size viewports) -->
        <div class="col-md-9 col-lg-9" >
            <form action="../index.php" method="post">
                <fieldset class="nameFields">
                    <legend class="formLegend">Name Form</legend>
                    <div class="form-group">
                        <label for "firstName">First Name:</label>
                        <!-- do some client-side validation of form data -->
                        <input pattern="^[A-Z][a-z]+$" title="Must start with a capital letter followed by one or more small letters" type="text" required class="form-control" name="first_name" placeholder="Enter in your first name">
                    </div>
                    <div class="form-group">
                        <label for "lastName">Last Name:</label>
                        <!-- do some client-side validation of form data -->
                        <input pattern="^[A-Z]'?[- a-zA-Z]+$" title="Must start with a capital letter, with an optional ',  followed by one or more dashes, small letters, or spaces" type="text" required class="form-control" name="last_name" placeholder="Enter in your last name">
                    </div>
                    <p><button type="submit" class="btn btn-primary" id="submitButton">Submit</button></p>
                </fieldset>
             </form>
            <p style="padding-top: 25px;"><a href="../index.php">Back to the Names Table</a></p>
        </div>
    <!-- include the footer. -->
<?php require 'footer.html'; ?>