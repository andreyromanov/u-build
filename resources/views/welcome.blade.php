<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/App Icon.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/nunito-sans" type="text/css"/>
  <style type="text/css">body{font-family: 'NunitoSansRegular'!important;}</style>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


<title>U-Build</title>
</head>
<body>
  <div class="se-pre-con"></div>

  <div class="content bg">
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-tr">
      <a class="navbar-brand text-white" href="/">U-Build</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end h5" id="navbarNav">
        <ul class="navbar-nav navbar-right">
          <li class="nav-item mr-3">
            <a class="nav-link text-white" href="#features">Можливості</a>
          </li>
          <!--li class="nav-item mr-3">
            <a class="nav-link text-white" href="#review">Відгуки</a>
          </li-->
          <li class="nav-item mr-3">
            <a class="nav-link text-white" href="#price">Інтерфейс</a>
          </li>

          @guest
          <li class="nav-item">
           <a href="/register" class="button w-button text-dark lh">Кабінет</a>
         </li>
          @else
          <li class="nav-item">
           <a href="/home" class="button w-button text-dark lh">Кабінет</a>
         </li>
          @endguest 

       </ul>
     </div>
   </nav>
   <div class="row m-0 pb-5" >
    <div class="col-md-6 h-auto">
      <img class="mb-5 mt-5 h-75p" src="img/App Icon.png"> <br>
      <label class="text-white mb-5 h1"><b>U-Build.</b> Найкращий сервіс управління будівництвом</label> <br>
      <a href="#features" class="gradient-button w-button mr-3 text-white mb-5">Почати</a>
    </div>
    <div class="col-md-6 text-center h-400p">
    </div>
  </div>
</div>

<div class="content text-center sect-2 bg-grey">
  <h1 id="features" class="pt-5">Як працює U-Build</h1>
  <div class="row m-0 pb-5 pt-5">
   <div class="space"></div>
   <div class="col-md-3 text-center m-4 pt-5 div-box">
    <img src="img/icons/Reload Icon1.png"> <br>
    <label class="pt-3"><b>Всі обєкти разом</b></label> 
    <label class="pt-2">Всі Ваші будівельні  обєкти знаходяться у особистому кабінеті.</label>
  </div>
  <div class="col-md-3 text-center m-4 pt-5 div-box">
   <img src="img/icons/Inbox Icon1.png"> <br>
   <label class="pt-3"><b>Будь-які звіти</b></label>
   <label class="pt-2">Можливість швидко формувати звіти по статистиці та економіці.</label>
 </div>
 <div class="col-md-3 text-center m-4 pt-5 pb-4 div-box">
   <img src="img/icons/Notifications Icon.png"> <br>
   <label class="pt-3"><b>Зручність</b></label>
   <label class="pt-2">Доступ до застосування у будь-якій точці світу з будь-якого пристрою.</label>
 </div>
</div>
</div>

<!--div class="content bg-white">
  <div class="row ml-0 mr-0 p-5 text-center">
    <div class="col-md-2 pt-2 pb-2"><img src="img/press/wired.png"></div>
    <div class="col-md-2 pt-2 pb-2"><img src="img/press/lifehacker.png"></div>
    <div class="col-md-2 pt-2 pb-2"><img src="img/press/mashable.png"></div>
    <div class="col-md-2 pt-2 pb-2 "><img src="img/press/theverge.png"></div>
    <div class="col-md-2 pt-2 pb-2"><img src="img/press/gizmodo.png"></div>
    <div class="col-md-2 pt-2 pb-2"><img src="img/press/macworld.png"></div>
  </div>
</div-->

<!--div class="content text-center bg-grey">
  <div class="row m-0 pb-5 pt-5" >
    <div class="col-md-6 text-left m-auto">
      <div class="sect-4 pb-2 pt-3" onclick="tab1()">
        <img class="mr-3 ml-1 float-left w-25p" src="img/icons/Reload Icon.png">
        <label><b>Sync</b> across all devices</label>
        <p class="ml-5">This sounded nonsense to Alice, so she said nothing, but set off at once toward the Red Queen. To her surprise.</p>
      </div>

      <div class="sect-4 pb-2 pt-3" onclick="tab2()">
        <img class="mr-3 ml-1 float-left w-25p" src="img/icons/Inbox Icon.png">
        <label><b>All emails</b> in one place</label>
        <p class="ml-5">This sounded nonsense to Alice, so she said nothing, but set off at once toward the Red Queen. To her surprise.</p>
      </div>
      <div class="sect-4 pb-2 pt-3" onclick="tab3()">
        <img class="mr-3 ml-1 float-left w-25p" src="img/icons/Clock Icon.png">
        <label><b>Track</b> your time</label>
        <p class="ml-5">This sounded nonsense to Alice, so she said nothing, but set off at once toward the Red Queen. To her surprise.</p>
      </div>
    </div>
    <div class="col-md-6">
      <img id="pic1" class="tablet pr-box b-r" src="img/Tablet2.png">
    </div>
  </div>
</div-->

<div class="content bg">
  <div class="row m-0 pt-3">
    <div class="col-md-7 text-white m-auto">
      <h3><b>Початок роботи</b></h3>
  Почніть роботу з застосуванням та створіть свій особистий кабінет.
    </div>
    <div class="col-md-5 pt-5 text-center">
          @guest
           <a href="/register" class="button w-button text-dark mb-5">Кабінет</a>
          @else
           <a href="/home" class="button w-button text-dark mb-5">Кабінет</a>
          @endguest 
    </div>
  </div>
</div>

<div class="content text-center pb-5 pt-5 bg-grey">
  <div class="row ml-0 mr-0 mt-md-5 mb-md-5 div-box">
    <div class="col-md-6 bg rounded-left t3">
    </div>
    <div class="col-md-6 pt-5 m-auto" >
      <h2><b>Кращий</b> сервіс серед конкурентів</h2>
    </div>
    <div class="col-md-6 pt-5 m-auto" >
     <h2><b>Сучасні</b> методи та засоби розробки</h2>
   </div>
   <div class="col-md-6 bg rounded-right t3" >
   </div>
 </div>
</div>

<div id="video" class="content pt-5 pb-5 bg-v">
  <div class="row ml-0 mr-0 p-5 text-center text-white">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="height:200px;">
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<!--div id="review"  class="row ml-0 mr-0">
  <div class="col-md-4 text-left pt-5 content sect-8">
    <img class="mt-5" src="img/icons/Stars.png">
    <h3 class="mt-5 mb-5 pb-5">Відгуки користувачів</h3>
  </div>
  <div class="col-md-8 pr-5 pt-5 pb-5 bg-grey">

    <div class="p-4 mb-5 testim" >
      <img class="mr-md-4 rounded-circle float-left w-50p" src="img/photos/avatar-2.png">
      <p>This sounded nonsense to Alice, so she said nothing, but set off at once toward the Red Queen. To her surprise.  </p> 
      <hr>
      <label><b>Elisa Paul</b> - Web Designer</label> <img class="float-right" src="img/icons/Twitter Icon.png">
    </div>

    <div class="p-4 mb-5 text-right testim2" >
      <img class="ml-md-4 rounded-circle float-right w-50p" src="img/photos/avatar-3.png">
      <p>This sounded nonsense to Alice, so she said nothing, but set off at once toward the Red Queen. To her surprise.  </p> 
      <hr>
      <label><b>Juan Richards</b> - Photographer</label><img class="float-left" src="img/icons/Twitter Icon.png">
    </div>

    <div class="p-4 testim">
      <img class="mr-md-4 rounded-circle float-left w-50p" src="img/photos/avatar-4.png">
      <p>This sounded nonsense to Alice, so she said nothing, but set off at once toward the Red Queen. To her surprise.  </p> 
      <hr>
      <label><b>Marian McGuire</b> - Entepreneur</label> <img class="float-right" src="img/icons/Twitter Icon.png">
    </div>
  </div>
</div-->

<div id="price"  class="row ml-0 mr-0 bg-grey border-top">
  <div class="col-md-4 pl-5 text-left m-auto" >
    <h2 class="mb-3 mt-3" ><b>Інтерфейс</b></h2>
    <p>Зручний інтерфейс користувача, виконаний за допомогою сучасних технологій, зробить Вашу роботу з сервісом легкою.</p>   
  </div>
  <div class="col-md-8 p-5 bg-grey">
    <div class="row p-md-5">
      <div class="col-md-6 p-0 text-center text-white bg roundedpr-box">
        <div class="mt-5 lbl-pr"><label class="pt-2 pb-2 m-auto">Бельетаж</label> </div>
        <h1 class="text-center pt-4 pb-4">999999 $</h1>
        <div class="text-left">
          <img class="mr-2 ml-5" src="img/icons/Success Icon.png"><label>Початок: 2019-10-10 </label> <br>
          <img class="mr-2 ml-5" src="img/icons/Success Icon.png"><label>Кінець: 2019-10-31</label> <br>
        </div>
        <div class="pl-5 pr-5 pt-3 pb-3"><a href="#" class="w-100 pl-5 pr-5 gradient-button w-button mr-3 text-white mb-5">Деталі</a></div>
      </div>

      <div class="col-md-6 mt-3 mb-3 text-center p-0 bg-white rounded pr-box">
        <div class="mt-5 lbl-pr"><label class="pt-2 pb-2 m-auto">Перлина</label> </div>
        <h1 class="text-center pt-4 pb-4">777777 $</h1>
        <div class="text-left">
          <img class="mr-2 ml-5" src="img/icons/Success Icon.png"><label>Початок: 2019-10-06 </label> <br>
          <img class="mr-2 ml-5" src="img/icons/Success Icon.png"><label>Кінець: 2019-11-11</label> <br>
          <div class="pl-5 pr-5 pt-3 pb-3"><a href="#" class="button w-button text-dark mb-5 btn-f">Деталі</a></div>
        </div>
      </div>
    </div>
  </div>
</div>



<!--div class="content pb-5 pt-5 bg" >
  <div class="row m-0" >
    <div class="col-md-8 text-white text-center mb-5 m-auto">
      <h2 class="mt-5"><b>Stay</b> in touch</h2>
      <label class="ml-md-5 mr-md-5 pl-md-5 pr-md-5 mb-5">This sounded nonsense to Alice, so she said nothing, but set off at once toward the Red Queen. To her surprise.</label>

      <form class="bg-white m-auto rounded" role="form" >
        <div class="row pl-5 pr-5 pt-5" >
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="first_name" id="first_name" class="form-control input-sm bg-grey" placeholder="First Name">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control input-sm bg-grey" placeholder="Email Address">
            </div>
          </div>
        </div>

        <div class="form-group pl-5 pr-5 pb-3">
          <textarea class="form-control bg-grey" placeholder="Message" rows="9"></textarea>
        </div>

        <div class="text-center">           
          <a href="#" class="gradient-button w-button mr-3 text-white mb-5">Download Now</a>
        </div>
      </form>

    </div>
  </div>
</div-->





<footer class="page-footer pt-3 pb-3">
  <div class="content text-center" >
    <div class="container-fluid text-center">
      <div class="row">
        <div class="col-sm-4 col-md-4 mt-md-0 mb-3 text-md-left text-sm-center">
          <h3>U-Build</h3>   
        </div>
        <div class="col-sm-4 col-md-4 mb-md-0 mb-3 text-center">
          <label>Розробив <b>Андрій Романов</b></label> <br>
          <label>U-Build</label>
        </div>
        <div class="col-sm-4 col-md-4 mb-md-0 mb-3 text-md-right text-sm-center">
          <a href="#"><i class="fab fa-twitter-square h3 text-secondary"></i></a>
          <a href="#"><i class="fab fa-facebook-square h3 text-secondary"></i></a>
          <a href="#"><i class="fab fa-instagram h3 text-secondary"></i></a>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="scripts/scripts.js"></script>

</body>
</html>