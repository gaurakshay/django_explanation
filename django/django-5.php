<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title> Akshay Gaur </title>
  <link rel="icon" href="icon.png" type="image/png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ===============================FONTS================================== -->
  <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=devanagari,latin-ext" rel="stylesheet">
  <!-- ================================= CSS ================================= -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/header-footer.css" rel="stylesheet">
  <link href="../css/prism-tn.css" rel="stylesheet">
  <link href="../css/prism-treeview.css" rel="stylesheet">
</head>

<!-- Header -->
<?php include('../header.html');?>

<!-- mid section -->
<main class="container-fluid" id="content">
  <div class="row">
    <!-- Navigation -->
    <?php include('./sidebar.html');?>
      <!-- content -->
      <div class="col-sm-9">
        <div class="container-fluid">
          So far, we have worked on setting up our models and saved some instances of it in the database. So, we have mostly paid attention
          to the backend of our application.
          <br> Now, lets turn our attention to the frontend of our application!
          <br> First, let us make a basic page that we want to show as our homepage. To do that, let us first make a folder named
          'templates' in our tutorial/students/ directory. Inside that directory, make a blank html page named 'welcome.html'.
          So, our folder structure should look like:
          <br>
          <pre><code class="language-treeview">tutorial//
      |-- assets//
      |-- manage.py*
      |-- students//
      |   |-- admin.py
      |   |-- apps.py
      |   |-- forms.py
      |   |-- __init__.py
      |   |-- migrations//
      |   |-- models.py
      |   |-- templates//
      |   |   `-- welcome.html       
      |   |-- tests.py
      |   `-- views.py
      `-- tutorial//</code></pre> Now, in the welcome.html file, write out a skeleton of html5 page. Something like:
          <br>
          <pre><code class="language-html">&lt;!doctype html&gt;
      &lt;html lang="en"&gt;
      &lt;head&gt;
          &lt;meta charset="UTF-8"&gt;
          &lt;title&gt;Hi&lt;/title&gt;
      &lt;/head&gt;
      &lt;body&gt;
          Welcome!!!
      &lt;/body&gt;
      &lt;/html&gt;</code></pre> Now, that we have our basic webpage, we would like our application to serve it. The way a django application works
          is by defining views and then rendering those views when requested. So, we will also define a view and then tell
          it to render this skeleton of a page that we just created.
          <br> To define a view, we must go to our students/views.py file. In this file, we will define our most basic view:
          <pre><code class="language-python">from django.views.generic import TemplateView
      
      class WelcomeView(TemplateView):
          """
          This is our welcome screen. Utilizes a
          template view.
          """
          template_name = 'welcome.html'</code></pre>
          <br> As we will be serving web pages primarily, we want to define the urls that we will be serving our pages in. In
          the default setup that django framework provides us, which can be found in the tutorial/urls.py file, you will
          see that only one url is defined:
          <pre><code class="language-python">from django.contrib import admin
      from django.urls import path, include
      
      urlpatterns = [
          path('admin/', admin.site.urls),
      ]</code></pre> urlpatterns is the place where we define all our urls that will be served in the project. Since we don't have
          any other url defined in the project, we see the default welcome page when we go to 127.0.0.1:8000. When we point
          our browser to 127.0.0.1:8000/admin/ we see the admin module which is what is defined in the urls.py file.
          <br> Lets see what we need to do to change that. Let us define a new urlpattern that points to the root path:
          <pre><code class="language-python">from django.contrib import admin
      from django.urls import path, include
      from students import views
      
      urlpatterns = [
          path('admin/', admin.site.urls),
          path('', views.WelcomeView.as_view(), name='welcome'),
      ]</code></pre>
          <br> Now, making sure that our server is running, cross your fingers go to 127.0.0.1:8000/ in your favourite browser.
          If this is the page you see:
          <br>
          <img src="../img/django-13-firstview.png" width="500">
          <br> Then you are doing amazing!!!
          <br> Let us now look at how to display the data that we have in the database next...
        </div>
      </div>
      <div class="col-sm-1">

      </div>
    </div>
  </main>
  <!-- footer -->
  <?php include('../footer.html');?>
  <!-- ===============================JS ================================ -->
  <script src="../js/prism-tn.js"></script>
  <script src="../js/prism-treeview.js"></script>
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script>
      $(document).ready(function () {
          $('a[href="\\.\\/django-5.php"]').attr("class", "nav-link active");
      })
  </script>
</body>

</html>