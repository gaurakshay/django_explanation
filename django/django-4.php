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
                    <h1>Akshay's Blog</h1>
                </div>
                <div class="navbar">
                    <!-- ><h4>Django</h4> -->
                    Django<br>
                    &emsp;<a href="django-1.php"> Setup </a><br>
                    &emsp;<a href="django-2.php"> App and Models </a><br>
                    &emsp;<a href="django-3.php"> Admin Module </a>
                </div>
                <div class="content">

                    <p>
                    Now, we will create our other models along with department model. So, go back to
                    our students/models.py file and add the following model classes:

                    </p>
                    <p class="terminal">
                    1        &emsp;&emsp;class Course(models.Model):<br>
                    2        &emsp;&emsp;&emsp;&emsp;"""<br>
                    3        &emsp;&emsp;&emsp;&emsp;This model will store the details about coursespresent in the system.<br>
                    4        &emsp;&emsp;&emsp;&emsp;Primary key for this model is a combination of course code and department code (compound key)<br>
                    5        &emsp;&emsp;&emsp;&emsp;"""<br>
                    6        &emsp;&emsp;&emsp;&emsp;class Meta:<br>
                    7        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    8        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Compound key is defined by the keyword unique_together.<br>
                    9        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    10        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;db_table = "courses"<br>
                    11        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;unique_together = (('department', 'c_code'), )<br>
                    12        <br>
                    13        &emsp;&emsp;&emsp;&emsp;department = models.ForeignKey(Department, on_delete=models.CASCADE, verbose_name="Department Code")<br>
                    14        &emsp;&emsp;&emsp;&emsp;c_code = models.IntegerField(verbose_name="Course Code")<br>
                    15        &emsp;&emsp;&emsp;&emsp;c_name = models.CharField(max_length=200, verbose_name="Course Name")<br>
                    16        &emsp;&emsp;&emsp;&emsp;c_seats = models.IntegerField(verbose_name="Number of Seats")<br>
                    17        &emsp;&emsp;&emsp;&emsp;c_desc = models.CharField(blank=True, verbose_name="Course Description")<br>
                    18        <br>
                    19        &emsp;&emsp;&emsp;&emsp;def __str__(self):<br>
                    20        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    21        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;String representation of the object.<br>
                    22        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    23        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return self.d_name<br>
                    24        <br>
                    25        <br>
                    26        &emsp;&emsp;class Student(models.Model):<br>
                    27        &emsp;&emsp;&emsp;&emsp;"""<br>
                    28        &emsp;&emsp;&emsp;&emsp;This model will store students' details.<br>
                    29        &emsp;&emsp;&emsp;&emsp;Primary key will be students' id.<br>
                    30        &emsp;&emsp;&emsp;&emsp;"""<br>
                    31        &emsp;&emsp;&emsp;&emsp;class Meta:<br>
                    32        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;db_table = "students"<br>
                    33        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ordering = ['s_id']<br>
                    34        &emsp;&emsp;<br>
                    35        &emsp;&emsp;&emsp;&emsp;s_id = models.IntegerField(primary_key=True, verbose_name="Student ID") <br>
                    36        &emsp;&emsp;&emsp;&emsp;s_first_name = models.CharField(max_length=200, verbose_name="First Name") <br>
                    37        &emsp;&emsp;&emsp;&emsp;s_last_name = models.CharField(max_length=200, verbose_name="Last Name") <br>
                    38        &emsp;&emsp;&emsp;&emsp;s_pic = models.ImageField(upload_to='student_pics', blank=True, verbose_name="Student's pic") <br>
                    39        &emsp;&emsp;&emsp;&emsp;course = models.ManyToManyField(Course, blank=True, verbose_name="Courses") <br>
                    40        <br>
                    41        &emsp;&emsp;&emsp;&emsp;def __str__(self):<br>
                    42        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    43        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;String representation of the student object.<br>
                    44        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;"""<br>
                    45        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return "{0} {1}".format(self.s_first_name, self.s_last_name)<br>
                    </p>
                    <p>
                    There are a few thing to unpack here. Lets go through them one by one: <br>
                    Line 11: When our primary key is a combination of more than one attributes, we define a
                    compound key. To do so in django, we define it in the Meta class with the keyword
                    "unique_together".<br>
                    Line 13: A foreign key dependency is defined as models.ForeignKey
                    with argument having the model that the foreign key requires.<br>
                    Line 38: This is an implementation of FileField where the image is uploaded
                    to the "student_pics" folders. Django requires installation of Pillow to
                    work with images. So if not installed already, now would be a good time to
                    do soi ($ pip install pillow).<br>
                    Line 39: A many-to-many relationship is defined like this in Django.<br>

                    We also need to define where "student_pics" folder will reside. This is
                    defined with the help of MEDIA_URL and MEDIA_ROOT concepts. With the help
                    of these two variables, you can define where to store the media in the project
                    structure and also, how to form the urls in order to serve the media content.<br>
                    To define this, go to the end of your settings.py file and add the following:
                    </p>
                    <p class="terminal">
                    MEDIA_URL = '/assets/'<br>
                    MEDIA_ROOT = os.path.join(BASE_DIR, '&lt;any&gt;', '&lt;path&gt;', '&lt;you&gt;', '&lt;want&gt;')
                    </p>
                    <p>
                    BASE_DIR will be defined in the beginning of your settings.py file and corresponds to:<br>
                    &emsp;&emsp;tutorial/ &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&lt;---------- This is where BASE_DIR points to <br>
                    &emsp;&emsp;&emsp;&emsp; manage.py<br>
                    &emsp;&emsp;&emsp;&emsp; tutorial/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; settings.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; urls.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; wsgi.py<br>
                    &emsp;&emsp;&emsp;&emsp; students/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; admin.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; apps.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; migrations/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; models.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; tests.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; views.py<br>
                    I will set it as : <br>
                    MEDIA_ROOT = os.path.join(BASE_DIR, 'assets', 'media')<br>
                    This way, I can store all my assets such as images, javascript files, css files(will deal with
                    them later) in one place. My folder structure will now look like:<br>
                    &emsp;&emsp;tutorial/<br>
                    &emsp;&emsp;&emsp;&emsp; assets/<br>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; media/<br>
                    &emsp;&emsp;&emsp;&emsp; manage.py<br>
                    &emsp;&emsp;&emsp;&emsp; tutorial/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; settings.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; urls.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; wsgi.py<br>
                    &emsp;&emsp;&emsp;&emsp; students/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; admin.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; apps.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; __init__.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; migrations/<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; models.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; tests.py<br>
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; views.py<br>

                    <br>
                    At this point, because we added two new models, we need to prepare our migrations
                    and execute them:
                    </p>
                    <p class="terminal">
                    $ python manage.py makemigrations students<br>
                    $ python manage.py migrate
                    </p>

                    <p>
                    We also need to register our models so that we can see them in the admin
                    interface, so we will add them in our students/admin.py file:
                    </p>
                    <p class="terminal">
                    from django.contrib import admin<br>
                    <br>
                    # Add this:<br>
                    from students.models import Department, Course, Student<br>
                    admin.site.register(Department)<br>
                    admin.site.register(Course)<br>
                    admin.site.register(Student)<br>
                    </p>

                    <p> Your admin site should now look like this:<br>
                    <img src="../assets/django-10-admin-with-course-stud.png" width="500" alt="Admin site with Department, Course and Student objects listed."><br>

                    I went ahead and added an entry each for course and student:<br>
                    <img src="../assets/django-11-course-entry.png" width="500" alt="Sample course entry."><br>
                    <img src="../assets/django-12-student-entry.png" width="500" alt="Sample student entry."><br>
                    So now that we have saved our student with its pic, where is it? If you
                    remember, we defined the MEDIA_URL as tutorial/assets/media/. Now, when
                    we defined our model, we set the "upload_to" parameter in our students'
                    picture attribute as 'student_pics'. So, our pics will be uploaded to
                    'tutorial/assets/media/student_pics'. Please take a moment and check
                    if the picture was uploaded to the correct folder.

                </div>
                <div class="footer">
                    <h4>Contact me at gaur{dot}akshay{at}gmail{dot}com if you found this
                        helpful or if you have any suggestions to improve.</h4>
                </div>
        </div>
    </body>
</html>