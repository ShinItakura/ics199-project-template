<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>ICS 199 Project Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified Bootstrap from a CDN -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
/>
<!-- Custom Stylesheet -->
<link rel="stylesheet" href="css/style.css" /> 
</head>
<body>
<!-- You activate bootstrap through class names. "container" sets up some padding and makes the webpage responsive. -->
<div class="container">
    <!-- "jumbotron" makes a jumbotron! -->
    <div class="jumbotron">
        <h1>ICS 199 Project Template</h1>
        <p>This project serves as a proof of concept and template for your 199 Project.</p>
    </div>
    <div class="row">
        <!-- col-md-6 sets up a two column layout in bootstrap. Bootstrap uses 12 columns on a page.
             by saying each column is 6 of the 12, you make two columns total! -->
        <div class="col-md-6">
            <p>The purpose of this project is to give you a bouncing off point for your own project.
            This project incorporates a front-end CSS framework called <a href="http://getbootstrap.com/">bootstrap</a>.
            You don't have to use this framework but this project gives you a small sample on how to use it.
            I won't be teaching it so you will have to learn it on your own if you wish to use it.
            It really isn't that hard!!
            </p>
            <p>This project also gives you an example of almost all the PHP Concepts that are in the slides as well as a review of the CSS and HTML5 that you learned in previous courses.
            </p>
            <p>This application is modelled using the <strong>MVC architecture</strong>.</p>
            <p><strong>The view</strong> is those files used purely for presentation of the model. They are stored under the view subfolder. In this case, it is the header and footer. The header contains the beginning HTML and left column content. Since this content is static, a PHP require statement can be used to include it on every page in the application. The footer contains the ending HTML and also contains static content. It too can be used in a PHP require statement to include it on every page.</p> 
            <p><strong>The controller</strong> sends and receives data to update the model and view. In this case, it is the index and name_form pages. First, the index page checks to see if the page is being loaded after someone submitted a name in the form. If so, it filters the two inputs from the form. It ensures that they are valid and uses PHP Session Tracking to determine if the user has already entered the same name this session. If so, inform the user. Otherwise, store the name in the database and inform the user what they entered. Then, display all names entered in the database. The index page has a link to a page which contains a form to enter a name. This form uses HTML5 client-side validation on the inputs. The form uses the POST method and sends the POST data back to the index page on submission.</p>
            <p><strong>The model</strong> stores the data. In this case, it is a MySQL Database that contains two columns: first_name and last_name. The schema and sql scripts are in the db folder.</p>
            <p class="copyright">&copy; <?php echo date("Y"); ?> Camosun College</p>
        </div>
        <!-- second column content starts here -->
        <div class="col-md-6" style="padding-left: 50px;">
        <!-- BEGIN SPECIFIC PAGE CONTENT -->
