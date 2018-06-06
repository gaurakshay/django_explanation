<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Akshay Gaur </title>
        <link rel="icon" href="../icon.png" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- ===============================FONTS================================== -->
        <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <!-- ================================= STYLES ================================= -->
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <!-- Testing.
                <?php echo ("THIS IS PHP BABY"); ?> -->
                <div class="header">
                    <h1>Akshay's Blog</h1>
                </div>
                <div class="navbar">
                    <!-- ><h4>Django</h4> -->
                    Django<br>
                    &emsp;<a href="django-1.php"> Setup </a><br>
                    &emsp;<a href="django-2.php"> App and Models </a>
                </div>
                <div class="content">
                    <p>
                    As a sanity check, we want to see the model on our website. For
                    that, there is a very handy "admin" site that is provided by the
                    framework. To view the admin site, the url that you want to
                    go to is "127.0.0.1:8000/admin" (you should have your server
                    running in the background as discussed earlier). You will see
                    a login screen:<br>
                    <img src="../assets/django-2-admin-login.png" width="1000" alt="Admin Login Screen"><br>
                    At this point, since we don't have an admin account setup in the
                    project, we will create one. To do that, just type the following
                    in the terminal:
                    </p>
                    <p class="terminal">
                    $ python manage.py createsuperuser --username akshay --email 
                    gaur.akshay@gmail.com&emsp;(Make sure you run this where
                    you have the manage.py file).
                    </p>
                    <p> You will be asked to provide the password for this admin account
                    which will create the admin account.<br>
                    Once you are done making the account, use the username and password
                    to login to the admin interface we visited earlier.<br>

                    <img src="../assets/django-3-admin-cred.png" width="300" alt="Entering Credentials"><br>
                    <img src="../assets/django-4-admin-screen.png" width="1000" alt="Admin Screen"><br>
                    Here you can see what things you can do. We can see that we can add
                    groups and users in this interface. BUT WAIT!!! Where is our model
                    that we added earlier? Where are my departments???<br>
                    To be able to see our models in this interface, we need to register
                    them in the project.<br>
                    To add our "Department" model so that we can access it in the admin
                    model, we need to go to students/admin.py class and register it there.
                    </p>
                    <p class="terminal">
                    from django.contrib import admin<br>
                    <br>
                    # Add this:<br>
                    from students.models import Department<br>
                    admin.site.register(Department)<br>
                    </p>
                    <p> And that's it! Now, if you go back to the admin screen, you should
                    see you model!<br>
                    <img src="../assets/django-5-admin-departments.png" width="400" alt="Admin Screen with Departments"><br>
                    If you click on the add link, you will be taken to "Add Department"
                    screen:<br>
                    <img src="../assets/django-6-add-dept.png" width="400" alt="Admin Screen with Departments"><br>
                    Here, you can see that django automatically guesses the field names
                    from the model entries that we made earlier (d_name, d_code, d_chair).
                    Since they don't look very good, we will change them. Just add the
                    keyword "verbose_name" followed by the name that you would like to be
                    displayed on the admin site like so:
                    </p>
                    <p class="terminal">
                    d_name = models.CharField(max_length=200, verbose_name="Department Name")<br>
                    d_code = models.CharField(max_length=5, primary_key=True, verbose_name="Department Code")<br>
                    d_chair = models.CharField(max_length=200, verbose_name="Department Chair")<br>
                    </p>
                    <p>
                    After saving these changes, let us refresh the page that we were on before:<br>
                    <img src="../assets/django-7-dept-name.png" width="400" alt="Fixed Department Names"><br>
                    Let us add a department as a model. Enter name, code and chair as you see fit.
                    I added them and then clicked on the save button provided.<br>
                    **NOTE** In the screenshot, the department is listed as "Department object (CS)" which is wrong. It should have said "Computer Science"
                    instead. This is because I was incorrectly using __unicode__ to return the string representation of the object which was the case
                    with python 2. Going forward with python 3, the only method that needs to be written for the string representation of the object is
                    __str__. <a href="https://docs.djangoproject.com/en/1.10/topics/python3/#str-and-unicode-methods">  Details here. </a><br>
                    <img src="../assets/django-8-dept-obj.png" width="400" alt="Successful department entry"><br>
                    If you click on the department object you can see its details. You can aldo
                    edit the object's details if you want to.<br>
                    <img src="../assets/django-9-dept-details.png" width="400" alt="Department's details."><br>
                </div>
                <div class="footer">
                    <h4>Contact me at gaur{dot}akshay{at}gmail{dot}com if you found this
                        helpful or if you have any suggestions to improve.</h4>
                </div>
        </div>
    </body>
</html>