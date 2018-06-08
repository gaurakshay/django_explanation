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
		   <a href="http://www.akshaygaur.org/"><h1>Akshay's Blog (under construction)</h1></a>
	   </div>
	   <div class="navbar">
		   Django Tutorial<br>
		   &emsp;&gt;<a href="django-1.php"> Setup </a><br>
		   &emsp;&gt;<a href="django-2.php"> App and Models </a><br>
		   &emsp;&gt;<a href="django-3.php"> Admin Module </a><br>
		   &emsp;&gt;<a href="django-4.php"> Media Root </a><br>
		   &emsp;&gt;<a href="django-5.php"> Template View </a><br>
		   &emsp;&gt;<a href="django-6.php"> List View </a><br>
		   &emsp;&gt;<a href="django-7.php"> Details View - 1 </a><br>
		   &emsp;&gt;<a href="django-8.php"> Details View - 2 </a><br>
	   </div>
	   <div class="content">
		   In this article, we are going to talk about adding new students
		   to our model. To do that, we are going to need to put together
		   a few things:
		   <ol>
			   <li> A form that will specify what data is required
				   for the creation of the student.</li>
			   <li> A url that will be served for entering data for
				   the new model.
			   </li>
			   <li> A view that will take an html template
				   and render for the requestor. </li>
			   <li> A template that will describe how to show the
				   input fields that will be required for
				   creation of the model. </li>
		   </ol>
		   <br>
		   <b>1. Setting up the form </b>
		   For this, we need to create a python file in the students directory named 'forms.py'. The directory after creating this file should
		   look like:
		   <br>
		   &emsp;&emsp; manage.py<br>
		   &emsp;&emsp; tutorial/<br>
		   &emsp;&emsp; &emsp;&emsp; __init__.py<br>
		   &emsp;&emsp; &emsp;&emsp; settings.py<br>
		   &emsp;&emsp; &emsp;&emsp; urls.py<br>
		   &emsp;&emsp; &emsp;&emsp; wsgi.py<br>
		   &emsp;&emsp; students/<br>
		   &emsp;&emsp; &emsp;&emsp; templates/<br>
		   &emsp;&emsp; &emsp;&emsp; admin.py<br>
		   &emsp;&emsp; &emsp;&emsp; apps.py<br>
		   &emsp;&emsp; &emsp;&emsp; __init__.py<br>
		   &emsp;&emsp; &emsp;&emsp; forms.py<br>
		   &emsp;&emsp; &emsp;&emsp; migrations/<br>
		   &emsp;&emsp; &emsp;&emsp; models.py<br>
		   &emsp;&emsp; &emsp;&emsp; tests.py<br>
		   &emsp;&emsp; &emsp;&emsp; views.py<br>
		   <br>
		   Inside this file, add the following:
		   <br>
		   <p class="terminal">
		   from django.forms import ModelForm <br>
		   <br>
		   # Import models <br>
		   from students.models import Student <br>
		   <br>
		   <br>
		   class StudentForm(ModelForm): <br>
		   &emsp;&emsp;&emsp;&emsp;""" <br>
		   &emsp;&emsp;&emsp;&emsp;This is the modelfrom for the student. <br>
		   &emsp;&emsp;&emsp;&emsp;""" <br>
		   &emsp;&emsp;&emsp;&emsp;class Meta: <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;model = Student <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;fields = ['s_id', 's_first_name', 's_last_name', 's_pic', 'course'] <br>
		   </p>
		   So, we have essentially told the framework that the student form is the default form type
		   in django (ModelForm) and that does all the heavylifting for us. We still need to tell
		   what model we will be using so that it knows where it will refer for the fields that we
		   list in the next line.
		   <br>
		   The 'fields' list just tells what attributes will participate in the form that we will see in a
		   moment.
		   <br>
		   <b>2. Setting up the URL </b>
		   <br>
		   To set up the url, we will go to the students/urls.py file and
		   add the following:
		   <br>
		   <p class="terminal">
		   from django.urls import path  <br>
		   from students import views <br>
		   <br>
		   urlpatterns = [ <br>
		   &emsp;&emsp;&emsp;&emsp;path('', views.WelcomeView.as_view(), name='welcome'), <br>
		   &emsp;&emsp;&emsp;&emsp;path('depts/', views.DeptListView.as_view(), name='dept_list'), <br>
		   &emsp;&emsp;&emsp;&emsp;path('depts/&lt;str:pk&gt;/details/', views.DeptDetailView.as_view(), name='dept_details'), <br>
		   &emsp;&emsp;&emsp;&emsp;path('students/', views.StudentListView.as_view(), name='stud_list') <br>
		   &emsp;&emsp;&emsp;&emsp;path('students/&lt;int:pk&gt;/details/', views.StudentDetailView.as_view(), name='stud_details'), <br>
		   &emsp;&emsp;&emsp;&emsp;path('students/edit/', views.StudentAddView.as_view(), name='stud_edit'), <br>
		   ] <br>
		   </p>
		   <br>
		   <b>3. Declaring the view </b>
		   Go to students/views.py and add the following to declare the view
		   for this view:
		   <br>
		   <p class="terminal">
		   # Required imports: <br>
		   <br>
		   # import the template view. <br>
		   from django.views.generic import CreateView <br>
		   <br>
		   # import department model <br>
		   from students.models import Student <br>
		   <br>
		   # import forms <br>
		   from students.forms import StudentForm <br>
		   <br>
		   class StudentAddView(CreateView): <br>
		   &emsp;&emsp;&emsp;&emsp;""" <br>
		   &emsp;&emsp;&emsp;&emsp;This class utilizes the default class based <br>
		   &emsp;&emsp;&emsp;&emsp;view provided by Django framework to add submitted <br>
		   &emsp;&emsp;&emsp;&emsp;data to backend database. <br>
		   &emsp;&emsp;&emsp;&emsp;""" <br>
		   &emsp;&emsp;&emsp;&emsp;template_name = 'stud-edit.html' <br>
		   &emsp;&emsp;&emsp;&emsp;model = Student <br>
		   &emsp;&emsp;&emsp;&emsp;form_class = StudentForm <br>
		   </p>
		   <br>
		   <b> 4. Designing the form </b>
		   <br>
		   Even though the heading says 'designing' we are going to design a very basic one. Later in the
		   tutorial, we will look how to use frameworks such as Bootstrap or Materialize to render the forms.
		   <br>
		   Create a file named 'stud-edit.html' in students/templates folder. Once created, add the following
		   to the file:
		   <p class="terminal">
		   &lt;!DOCTYPE html&gt; <br>
		   &lt;html lang="en"&gt; <br>
		   &lt;head&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;meta charset="UTF-8"&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;title&gt;Student details&lt;/title&gt; <br>
		   &lt;/head&gt; <br>
		   &lt;body&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;h2&gt;Student Add Screen&lt;/h2&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;br&gt;&lt;br&gt;&lt;br&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;form method="POST" enctype='multipart/form-data'&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{ form.as_p }} <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&lt;button type="submit"&gt; Save &lt;/button&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;/form&gt; <br>
		   &lt;/body&gt; <br>
		   &lt;/html&gt; <br>
		   </p>
		   <br>
		   *************** IMPORTANT ***************
		   <br>
		   <i><b> enctype='multipart/form-data' </b></i>
		   <br>
		   <i> Please note the 'enctype' attribute added to the form. This is required whenever uploading
			   media in your form. If you don't put this in the form, the pictures will not be
			   uploaded for the model instance.
		   </i>
		   <br>
		   <br>
		   So, now try going to the address '127.0.0.1:8000/students/edit/' and what do you see?
		   <br>
		   <img src="../assets/django-22-stud-details-with-pic.png" alt="Student form" width="500">
		   <br>
		   What is interesting here is that Django implements basic checks for you automatically. Such
		   as checking all the required fields in the form are entered or not. For us, for example,
		   entering the primary key for the student is very important. So, if I try to submit a form
		   without entering the primary key, I get the following error:
		   <br>
		   <img src="../assets/django-24-form-error.png" alt="Form check" width="500">
		   <br>
		   Isn't that nice?
		   <br>
		   So fill out all the details for this student and submit the form. What do you see?
		   <br>
		   <img src="../assets/django-25-csrf-error.png" alt="CSRF Error message" width="500">
		   <br>
		   <br>
		   This is the <i><a href="https://en.wikipedia.org/wiki/Cross-site_request_forgery"> CSRF </a></i>
		   handling that Django does for you automatically and is extremely handy feature of Django framework.
		   This also ensures that we follow basic security protocols to keep our site safe from malicious
		   agents.
		   <br>
		   To make sure that our site complies with Django's standards, we need to add {% csrf_token %} just
		   after our &lt;form&gt; tag.
		   <p class="terminal">
		   &lt;!DOCTYPE html&gt; <br>
		   &lt;html lang="en"&gt; <br>
		   &lt;head&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;meta charset="UTF-8"&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;title&gt;Student details&lt;/title&gt; <br>
		   &lt;/head&gt; <br>
		   &lt;body&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;h2&gt;Student Add Screen&lt;/h2&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;br&gt;&lt;br&gt;&lt;br&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;form method="POST"&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&lt;!--ADD THIS --&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{% csrf_token %} <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{ form.as_p }} <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&lt;button type="submit"&gt; Save &lt;/button&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;/form&gt; <br>
		   &lt;/body&gt; <br>
		   &lt;/html&gt; <br>
		   </p>
		   <br>
		   Now that we fixed that, let us enter some data in the form and try submitting again. Does the
		   form submit the data correctly?
		   <br>
		   Here is what I get:
		   <br>
		   <img src="../assets/django-26-improperly-configured-redirect-url.png" alt="Improperly configured
		   redirect url" width="500">
		   <br>
		   What this is tells us is that form has been submitted successfully, but it doesn't know which page
		   to redirect to upon a successful submission of a form.
		   <br>
		   To confirm our understanding, let us go and check list of students at 127.0.0.1:8000/students/
		   <br>
		   <img src="../assets/django-27-list-with-new-student.png" alt="List with new student" width="500">
		   <br>
		   Yay! Our new student is in the system!! Let us look at the student's details by clicking on the
		   Details link.
		   <br>
		   <img src="../assets/django-28-no-s_pic-attribute-error.png" alt="No pic with student" width="500">
		   <br>
		   This tells us that this student doesn't have an image and because we try to display the student's
		   pic using the {% student.s_pic.url %} Django tag when it doesn't exit, we get this error. You can
		   think of this as being similar to a null value error in regular programming.
		   <br>
		   So now we need to fix two things:
		   <br>
		   <ol>
			   <li> Redirect url on successful form submission </li>
			   <li> Handling the case when there is no image for the student </li>
		   </ol>
		   <b> 1. Setting up a redirect url on successful form submission </b>
		   <br>
		   This is fixed in multiple ways:
		   <ol type="a">
			   <li> Defining the success url in our view.
				   <br>
				   In our views.py, add the following to our existing code:
				   <p class="terminal">
				   # import this: <br>
				   from django.urls import reverse_lazy <br>
				   class StudentAddView(CreateView): <br>
				   &emsp;&emsp;&emsp;&emsp;""" <br>
				   &emsp;&emsp;&emsp;&emsp;This class utilizes the default class based <br>
				   &emsp;&emsp;&emsp;&emsp;view provided by Django framework to add submitted <br>
				   &emsp;&emsp;&emsp;&emsp;data to backend database. <br>
				   &emsp;&emsp;&emsp;&emsp;""" <br>
				   &emsp;&emsp;&emsp;&emsp;template_name = 'stud-edit.html' <br>
				   &emsp;&emsp;&emsp;&emsp;model = Student <br>
				   &emsp;&emsp;&emsp;&emsp;form_class = StudentForm <br>
				   &emsp;&emsp;&emsp;&emsp;# Use reverse lazy to create the url for our list view <br>
				   &emsp;&emsp;&emsp;&emsp;# the parameter is the named url in our urls.py file. <br>
				   &emsp;&emsp;&emsp;&emsp;success_url = reverse_lazy('stud_list') <br>
				   </p>
				   <br>
				   If you remember in our urls.py file, we defined the /students/ url with a 
				   name='stud_list', we pass this to our success_url variable in our view. After 
				   doing this, when we submit a student form, we will be redirected to the url
				   which has the name 'stud_edit'. Be careful and don't mix up your dashes and 
				   underscores and all will be fine &#9786;.
				   <br>
				   If all goes well, upon entering correct form data, you will see;
				   <br>
				   <img src="../assets/django-29-success-url-list.png" alt="Successful redirection
				   to student list" width="500">
				   <br>
			   </li>
			   <li> Defining the get_absolute_url in our model.
				   If we don't add the success_url in our view, Django by default tries to show the
				   added model instance on form submission. To view this model instance, it needs
				   to know which url displays the details of a model in our app.
				   <br>
				   So, we will define the get_absolute_url for our student model in students/models.py
				   file.
				   <br>
				   Change the Student model in models.py file as below:
				   <br>
				   <p class="terminal">
				   # import reverse_lazy <br>
				   from django.urls import reverse_lazy <br>
				   <br>
				   <br>
				   class Student(models.Model): <br>
				   &emsp;&emsp;&emsp;&emsp;""" <br>
				   &emsp;&emsp;&emsp;&emsp;This model will store students' details. <br>
				   &emsp;&emsp;&emsp;&emsp;Primary key will be the students' id. <br>
				   &emsp;&emsp;&emsp;&emsp;""" <br>
				   <br>
				   &emsp;&emsp;&emsp;&emsp;class Meta: <br>
				   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;db_table = 'students' <br>
				   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ordering = ['s_id'] <br>
				   <br>
				   &emsp;&emsp;&emsp;&emsp;s_id = models.IntegerField(primary_key=True, verbose_name="Student ID") <br>
				   &emsp;&emsp;&emsp;&emsp;s_first_name = models.CharField(max_length=200, verbose_name="First Name") <br>
				   &emsp;&emsp;&emsp;&emsp;s_last_name = models.CharField(max_length=200, verbose_name="Last Name") <br>
				   &emsp;&emsp;&emsp;&emsp;s_pic = models.ImageField(upload_to='student_pics', blank=True, verbose_name="Student's pic") <br>
				   &emsp;&emsp;&emsp;&emsp;course = models.ManyToManyField(Course, blank=True, verbose_name="Courses") <br>
				   <br>
				   &emsp;&emsp;&emsp;&emsp;def __str__(self): <br>
				   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;""" <br>
				   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;String representation of the student object. <br>
				   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;""" <br>
				   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return "{0} {1}".format(self.s_first_name, self.s_last_name) <br>
				   <br>
				   &emsp;&emsp;&emsp;&emsp;def get_absolute_url(self): <br>
				   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;""" <br>
				   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Returns the url to details for this object. <br>
				   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:return: URL to display object details. <br>
				   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;""" <br>
				   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return reverse_lazy('stud_details', kwargs={'pk': self.pk}) <br>
				   </p>
				   <br>
				   Now, assuming that success_url is not defined, when you again enter a student's
				   details in the form and submit, you will see:
				   <br>
				   <img src="../assets/django-30-success-url-details.png" alt="Successful redirect to
				   student details" width="500">
				   <br>
				   I have never seen a more beautiful error code! That is because we are being
				   redirected to the student's detail page and we are getting this error only because
				   it doesn't have a picture.
				   <br>
			   </li>
		   </ol>
		   <br>
		   <b> 2. Handling the case when there is no image for the student </b>
		   <br>
		   Here we can implement some basic validation in the template of ours like so:
		   <p class="terminal">		   
		   &lt;!DOCTYPE html&gt; <br>
		   &lt;html lang="en"&gt; <br>
		   &lt;head&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;meta charset="UTF-8"&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;title&gt;Student details&lt;/title&gt; <br>
		   &lt;/head&gt; <br>
		   &lt;body&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;h2&gt;Student Detail Screen&lt;/h2&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&lt;br&gt;&lt;br&gt;&lt;br&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;Student Name: &lt;h3&gt;{{ student }}&lt;/h3&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;Student ID: &lt;h3&gt;{{ student.s_id }}&lt;/h3&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;Student Pic:  <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&lt;!-- Basic validation in templates --&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{% if student.s_pic %} <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&lt;img src="{{ student.s_pic.url }}"&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{% else %} <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&lt;i&gt; No picture uploaded. &lt;/i&gt; <br>
		   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{% endif %} <br>
		   &lt;/body&gt; <br>
		   &lt;/html&gt; <br>
		   </p>
		   b
		   Now try and see the details of any student that doesn't have a picture:
		   b
		   <img src="../assets/django-31-template-validation.png" alt="Successful template validation" width="500">
		   b
	   </div>
	   <div class="footer">
		   <h4>Contact me at gaur{dot}akshay{at}gmail{dot}com if you found this
			   helpful or if you have any suggestions to improve.</h4>
	   </div>
		</div>
	</body>
</html>