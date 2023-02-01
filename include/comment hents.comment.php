<
?php 
    session_start();

    $title ="users";

    if(isset($_SESSION["username"])){
        include "include/intl.php";
         $do = isset($_GET["do"]) ? $_GET["do"]: "categories";

         if($do == "categories"){
             echo <a href="?do=add" class="btn btn-primry">add</a> ;
             
         }elseif ($do == "add"){


        }elseif ($do == "insert"){

         }elseif ($do == "edit"){

         }elseif ($do == "update"){



        }elseif ($do == "delete"){

         }elseif ($do == "active"){
         }}?>
         v class="container">
          <div class="row justify-content-space-between w-100">
              <div class="col text-right">
              <a class="navbar-brand" href="home.php"><h3 class="speical_heading"><?php la("heading_of_website"); ?></h3></a>

              </div>   
       <div class="col">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#jksanavigation">
             <span><i class="fa fa-bars"></i><span>
        </button>
        <div class="collapse navbar-collapse text-right" id="jksanavigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <a class="nav-link" href="home.php"><?php la("home")?> <span class="sr-only"> </span></a></li>
                  <?php 
                  $categories = checkExist("*" , "categories" , 1 ,true);
                //   print_r($categories);
                   foreach($categories as $catigoery){?>
                   <li class="nav-item"><a href="categories.php?pageName=<?php echo $catigoery["c_id"];?>" 
                   class="nav-link"><?php la($catigoery["c_name"])?></a></li>

                  <?php } ?>

                </li>
                <li class="nav-item ">
                <a class="nav-link" href="about.php"><?php la("about_us")?></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="about.php"><?php la("call_us")?></a>
                </li>
                
            </ul>
 
           
            </div>
       </div>
        </div>
        </nav>
        ارسل 
حفظ 

الاقسام 
المنشورات 
الاسم 
كلمه المرور 
ارسل 
احفظ ادخل حذف 
اضافه تعليق 
ابلاغ 
ادخل الاسم 
كتابه الاسم 
ادخل البريد الالكتروني 
عنوانالبريد الاكترواني 
المنشور 
المقال 
عنوان المقال 
وصف المقال 
صوره المقال 
من نحن 
تواصل معنا 
اتصل بنا 
سياسه الخصوصيه 
المقالات الاعلانات 
اخر الاخبار 
قراْءه المزيد 
عرض المزيد
عرض المنشور 
عرض المقال 
ادخل كلمه المرور
عرض الملفال الشخصي 
تعديل الملف الشخصي 
تسجيل الخروج
الريضيه الثقافيه الاجتماعي 
اسم الكاتب 
هل نسيت كلمه السر
يوم 
اسبوع شهر اسبوعين شهرين
اضافه تعديل حظر 

هل لديك حساب 
الاشتراك
الاقسام
اسم القسم
وصف القسم
عنوان القسم 
المستحدم
ااسم المستخدم
عنوان المستحدم
رقم المستخدم
صوره المستحدم
 
