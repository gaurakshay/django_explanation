<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Akshay Gaur </title>
        <link rel="icon" href="icon.png" type="image/png" />
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
                    <h1>Akshay's Blog (under construction)</h1>
                </div>
                <div class="navbar">
                    <!-- ><h4>Django</h4> -->
                    Django Tutorial<br>
                    &emsp;<a href="django-1.php"> Setup </a><br>
                    &emsp;<a href="django-2.php"> App and Models </a><br>
                    &emsp;<a href="django-3.php"> Admin Module </a><br>
                    &emsp;<a href="django-4.php"> Media Root </a><br>
                </div>
                <div class="content">
                    So far, we have worked on setting up our models and saved
                    some instances of it in the database. So, we have mostly
                    paid attention to the backend of our application.
                    <br>
                    Now, lets turn our attention to the frontend of our application!
                    <br>
                    First, let us make a basic page that we want to show as our
                    homepage. To do that, let us first make a folder named 'templates'
                    in our tutorial/students/ directory. Inside that directory, make
                    a blank html page named 'welcome.html'. So, our folder structure
                    should look like:<br>
                    &emsp;&emsp; manage.py<br>
                    &emsp;&emsp; tutorial/<br>
                    &emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp; &emsp;&emsp; settings.py<br>
                    &emsp;&emsp; &emsp;&emsp; urls.py<br>
                    &emsp;&emsp; &emsp;&emsp; wsgi.py<br>
                    &emsp;&emsp; students/<br>
                    &emsp;&emsp; &emsp;&emsp; templates/<br>
                    &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; welcome.html<br>
                    &emsp;&emsp; &emsp;&emsp; admin.py<br>
                    &emsp;&emsp; &emsp;&emsp; apps.py<br>
                    &emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp; &emsp;&emsp; migrations/<br>
                    &emsp;&emsp; &emsp;&emsp; models.py<br>
                    &emsp;&emsp; &emsp;&emsp; tests.py<br>
                    &emsp;&emsp; &emsp;&emsp; views.py<br>
                    <br>
                    Now, in the Welcome.html file, write out a skeleton of html5
                    page. Something like:<br>
                    &emsp;&emsp;&lt;!DOCTYPE html&gt;<br>
                    &emsp;&emsp;&lt;html lang="en"&gt;<br>
                    &emsp;&emsp;&lt;head&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;meta charset="UTF-8"&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;&lt;title&gt;Hi&lt;/title&gt;<br>
                    &emsp;&emsp;&lt;/head&gt;<br>
                    &emsp;&emsp;&lt;body&gt;<br>
                    &emsp;&emsp;&emsp;&emsp;Welcome!!!<br>
                    &emsp;&emsp;&lt;/body&gt;<br>
                    &emsp;&emsp;&lt;/html&gt;<br>
                    <br>
                    Now, that we have our basic webpage, we would like our
                    application to serve it. The way a django application works
                    is by defining views and then rendering those views when 
                    requested. So, we will also define a view and then tell
                    it to render this skeleton of a page that we just created.
                    <br>
                    To define a view, we must go to our students/views.py file.
                    In this file, we will define our most basic view:
                    <p class="terminal">
                    from django.shortcuts import render<br>
                    <br>
                    # import the template view.<br>
                    from django.views.generic import TemplateView<br>
                    <br>
                    <br>
                    class WelcomeView(TemplateView):<br>
                    &emsp;&emsp;&emsp;&emsp;template_name = 'welcome.html'<br>
                    <br>

                    </p>
                    <br>
                    As we will be serving web pages primarily, we want to define
                    the urls that we will be serving our pages in. In the default
                    setup that django framework provides us, which can be found in
                    the tutorial/urls.py file, you will see that only one url is
                    defined:
                    <p class="terminal">
                    from django.contrib import admin<br>
                    from django.urls import path<br>
                    <br>
                    urlpatterns = [<br>
                    &emsp;&emsp;&emsp;&emsp;path('admin/', admin.site.urls),<br>
                    ]<br>
                    </p>
                    urlpatterns is the place where we define all our urls that
                    will be served in the project. Since we don't have any other
                    url defined in the project, we see the default welcome page
                    when we go to 127.0.0.1:8000. When we point
                    our browser to 127.0.0.1:8000/admin/ we see the admin module
                    which is what is defined in the urls.py file.
                    <br>
                    Lets see what we need to do to change that. Let us define
                    a new urlpattern that points to the root path:
                    <p class="terminal">
                    from django.contrib import admin<br>
                    from django.urls import path<br>
                    from students import views<br>
                    <br>
                    urlpatterns = [<br>
                    &emsp;&emsp;&emsp;&emsp;path('admin/', admin.site.urls),<br>
                    &emsp;&emsp;&emsp;&emsp;path('', views.Welcome.as_view(), name),<br>
                    ]<br>
                    </p>
                    <br>
                    Now, making sure that our server is running, cross your fingers
                    go to 127.0.0.1:8000/ in your favourite browser. If this is the
                    page you see:
                    <br>
                    <img src="../assets/django-13-firstview.png" width="500">
                    <br>
                    Then you are doing amazing!!!
                    <br>
                    Let us now look at how to display the data that we have in the
                    database next...
                </div>
                <div class="footer">
                    <h4>Contact me at gaur{dot}akshay{at}gmail{dot}com if you found this
                        helpful or if you have any suggestions to improve.</h4>
                </div>
        </div>
    </body>
</html>