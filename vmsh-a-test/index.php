<?php

if(isset($_POST['submit']))
{
    
    # Сравниваем пароли
    if("circ" === $_POST['password'] and "vmsh-test" === $_POST['login'])
    {
        # Генерируем хеш для куки
        # $hash = md5('vmsh-test'.md5($_SERVER['REMOTE_ADDR']));
        
        # Ставим куки
        setcookie("in_vmsh", md5('in_vmsh'), time()+60*60*24*30, "/vmsh-a-test/");
        # Ставим куки
        setcookie("cond", md5('cond'), time()+60*60*24*30, "/vmsh-a-test/");
        
        # Переадресовываем браузер туда, куда мы и так собирались
        header("Location: //".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); exit();
    } elseif ("Shashkov" === $_POST['password'] and "admin" === $_POST['login']){
        # Ставим куки
        setcookie("in_vmsh", md5('in_vmsh'), time()+60*60*24*30, "/vmsh-a-test/");
        # Ставим куки
        setcookie("cond", md5('cond'), time()+60*60*24*30, "/vmsh-a-test/");
        # Ставим куки
        setcookie("admin", md5('admin57'), time()+60*60*24*30, "/vmsh-a-test/");
        
        # Переадресовываем браузер туда, куда мы и так собирались
        header("Location: //".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); exit();
    } elseif ("2910" === $_POST['password'] and "vmsh-testtest" === $_POST['login']) {
        # Генерируем хеш для куки
        # $hash = md5('vmsh-test'.md5($_SERVER['REMOTE_ADDR']));
        setcookie("in_vmsh", md5('in_vmsh'), time()+60*60*24*30, "/vmsh-a-test/");

        # Ставим куки
        # Ставим куки
	setcookie("test2910", md5('test2910'), time()+60*60*24*30, "/vmsh-a-test/");
        
        # Переадресовываем браузер туда, куда мы и так собирались
        header("Location: //".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); exit();
	}
 else   {
        setcookie("hash", "", time()+1, "/vmsh-a-test/");
#        print "Вы ввели неправильный логин/пароль";
    }
}
?>

<?php define('IN_VMSH', true);?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="keywords" content="VMSH">
  <meta name="description" content="VMSH">
  <title>ВМШ 2018-2019, 5, 6 класс, 179 школа</title>
  <style type="text/css">
   <?php require("c/vm-sh.min.css");?>
  </style>
  <script>
    <?php require("c/vm-sh.min.js");?>
  </script>
  <script src="//yastatic.net/jquery/2.1.4/jquery.min.js">  </script>
  <script>
    $( document ).ready(window.Conduit.init);
  </script>


      <?php
        if (((isset($_COOKIE['admin']) && md5('admin57') === $_COOKIE['admin'])) or (isset($_GET["show_secret_stat"]))){
          echo(
<<<ARTICLE
  <script type="text/javascript">
  function show_stat() {
    $('.stat').css('display', 'inline');
  }
  window.onload = show_stat;
  </script>
ARTICLE
          );
      }
      ?>

</head>

<body>
  <div id="layout">
    <div id="header">
      <div class="n-left-corner"></div>
      <div class="n-center">
        <ul>
          <li>
            <a href="//www.shashkovs.ru/vmsh-test">Начинающим</a>
          </li>
          <li>
            <a href="//www.shashkovs.ru/vmsh-a-test/about/">О&nbsp;ВМШ</a>
          </li>
          <li>
            <a href="//www.shashkovs.ru/vmsh-a-test/contact/">Контакты</a>
          </li>
          <li>
            <a href="http://179.ru/" target="_blank">Сайт школы</a>
          </li>
        </ul>
      </div>
      <div class="n-right-corner"></div>
    </div>

      <div class="b-first">
          <div class="lesson b-second">
            <h2 class="lesson_title">Занятия в понедельник 29 октября будут проводиться дистанционно. В понедельник 5-го ноября занятия кружка не будет. Ближайшее очное занятие состоится 12 ноября.</h2>
          </div>
      </div>


<!--
      <div class="b-first">
          <div class="lesson b-second">
            <h2 class="lesson_title">Первое занятие кружка состоится в понедельник 3-го сентября в 16:40.</h2>
            <p> Дальше кружок будет каждую неделю по понедельникам. Перед первым посещение желательно <a href="https://goo.gl/mNe5fr">предварительно зарегистрироваться</a>, заполнив анкету <a href="https://goo.gl/mNe5fr">https://goo.gl/mNe5fr</a>.
            Регистрация позволит нам оперативнее наладить работу кружка и избавит от лишней суеты.
            <p>
            <div width="100%"><img src="school-cinema.png" alt="school-cinema.png" width="400" style="text-align:center!important;"/></div> 
          </div>
      </div>
-->
<!--
      <div class="b-first">
          <div class="lesson b-second">
            <h2 class="lesson_title">На данный момент момент на кружке уже нет свободных мест.</h2>
            <p>К сожалению у нас больше нет возможности принимать на кружок «новых» участников, в школе просто не хватает помещений.
            Со временем места, скорее всего, освободятся. Если вы заполните анкету <a href="https://goo.gl/mNe5fr">https://goo.gl/mNe5fr</a>, то мы известим вас об этом по электронной почте.</p>
          </div>
      </div>
-->

    <div id="content">
      <?php 
        require_once('data/dates.inc');
        $days =  array("", "понедельник", "вторник", "среду", "четверг", "пятницу", "субботу", "воскресенье");
        $month =  array("", "января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря");
        $curdt = new DateTime;
        $weekdt = new DateTime;
        $prev = "";
        reset($datesarr);
        foreach ($datesarr as $number => $lesdt) {
          if ($lesdt->format('Y-m-d H:i:s') <= $curdt->format('Y-m-d H:i:s')) {
            break;
          }
          $prev = $number;
        }
        $lesdt = $datesarr[$prev];
        if ($lesdt) {
          $textdt = $days[(int)($lesdt->format('N'))]." ".$lesdt->format('j')." ".$month[(int)($lesdt->format('m'))];
          echo(
<<<ARTICLE
      <div class="b-first">
          <div class="lesson b-second">
            <h2 class="lesson_title">Ближайшее занятие ВМШ для 5 и 6 классов в 179-й школе состоится в {$textdt} в 16:40.
            </h2>
	<!--	Внимание! Занятие 26 марта (в каникулы) будет проведено дистанционно (в школу приезжать не надо). </b>
            <a href = "http://2.92.247.41:1609">Ссылка на материалы занятия.</a>
		<p style = "font-size:small; color:red">Ссылка обновлена 26.03 в 19:00</p>

 
            Следующее обычное занятие будет 2 апреля.-->
          </div>
          </div>
      </div>
ARTICLE
          );
        }        
        # админу можно всё ;-)
        if (isset($_COOKIE['admin']) && md5('admin57') === $_COOKIE['admin']) {
          $curdt->modify('+1000 day');
          $weekdt->modify('+1000 day');
        } elseif (isset($_COOKIE['cond']) && md5('cond') === $_COOKIE['cond']) {
          $weekdt->modify('-7 day');
        } else {
          $weekdt = new DateTime("2016-09-20T19:00:00Z");
          # $curdt->modify('-28 day');
        }
      ?>

      <?php
        if ((isset($_COOKIE['admin']) && md5('admin57') === $_COOKIE['admin']) || (isset($_COOKIE['cond']) && md5('cond') === $_COOKIE['cond'])) {
          echo(
<<<ARTICLE
      <div class="b-first">
          <div class="lesson b-second">
            <h2 class="lesson_title">Адрес для связи</h2>
            <section class="lesson_data">
              <p><p>Если вы хотите задать вопрос, попросить перевести вас в другую аудиторию (к брату, сестре, другу, подруге и т.д.), 
               перейти с уровня для начинающих на уровень для продолжающих или обратно, 
               высказать предложение по оптимизации нашей работы, пожаловаться на непроставленный плюсик, то смело направляйте письмо по адресу <a href="mailto:c1819@179.ru">c1819@179.ru</a> (Андрею Юркову).
              </p></section>
          </div>
      </div>
ARTICLE
          );
      }
      ?>

      <?php
        if ((isset($_COOKIE['admin']) && md5('admin57') === $_COOKIE['admin']) || (isset($_COOKIE['cond']) && md5('cond') === $_COOKIE['cond'])) {
#          echo(
# <<<ARTICLE
#       <div class="b-first">
#           <div class="lesson b-second">
#             <h2 class="lesson_title">Новости</h2>
#             <section class="lesson_data">
#               <p>Наконец-таки мы написали и выложили решения почти всех задач нашего кружка. 
#               Напомним, ровно через неделю после занятия появляются решения самых важных задач.
#               Через четыре недели после занятия появляются решения всех задач.
#               До появления решений задачи можно решать дома и сдавать на занятиях.
#               <br/>
#               (Сданные с предыдущих занятий задачи записываются, но пока ещё не внесены в кондуиты. Мы скоро сделаем это)
#               </p></section>
#           </div>
#       </div>
# ARTICLE
#          );
        } else {
          echo(
<<<ARTICLE
      <div class="b-first">
          <div class="lesson b-second">
            <section class="lesson_data">
              <h2 class="lesson_title">Регистрация на кружок</h2>
              <p>
              Формальную информацию о кружке, а также информацию по регистрации и оформлению можно получить
              <a href="http://schc179.mskobr.ru/info_add/additional/matematicheskij_kruzhok_dlya_5-6_klassov/">на официальной странице кружка</a>.
              </p>
            </section>
          </div>
          <div class="lesson b-second">
            <section class="lesson_data">
              <h2 class="lesson_title">Я знаю логин и пароль!</h2>
<form method="POST" style="width: 200px; margin: 0 auto;">
<table>
<tr><td>Login</td><td> <input name="login" type="text"></td></tr>
<tr><td>Password</td><td> <input name="password" type="password"></td></tr>
<tr><td colspan="2" style="text-align: center;"><input name="submit" type="submit" value="Enter"></td></tr>
</table>
</form>
            </section>
          </div>
          <div class="lesson b-second">
            <h2 class="lesson_title">Что такое ВМШ в 179-й школе?</h2>
            <section class="lesson_data"><p>
              ВМШ &mdash; это Вечерняя Математическая Школа &mdash; кружок по математике для 5 и 6 классов в 179-й школе города Москвы.
              На занятиях кружка решаются и разбираются разнообразные задачи по математике: 
              арифметические, логические, комбинаторные, геометрические... 
              Большую часть времени школьники самостоятельно решают задачи и обсуждают свои решения и идеи с преподавателями. 
              Цель кружка &mdash; развитие интереса к математике, знакомство школьников с разными темами и задачами, 
              выходящими за рамки школьной программы. 
              Кружок рассчитан на школьников, которым интересна математика &mdash; 
              как на начинающих, которые имеют мало опыта в решении задач, так и на более продвинутых, 
              которые уже имеют какой-то опыт посещения кружков и олимпиад. 
              Однако преподаватели не ставят своей целью помощь в освоении стандартной школьной программы 
              (если таковая вызывает трудности) или специальную подготовку к поступлению в нашу школу.
              </p></section>
          </div>
          <div class="lesson b-second">
            <h2 class="lesson_title">Как проходит занятие?</h2>
            <section class="lesson_data">
              <p> Вначале школьникам раздаётся листок с основными задачами. 
              Разрешается решать задачи в любом порядке. 
              Лучше двигаться от начала задания к концу, а если какая-то задача долго не выходит &mdash; пропустить её и вернуться к ней позже.
              <br/> Если у школьника есть вопрос, или он хочет сдать задачу &mdash; он поднимает руку, к нему подходит один из преподавателей и беседует со школьником. 
              Задачи можно сдавать устно, но всегда полезно иметь хоть какие-то записи &mdash; какие-то необходимые рисунки, вычисления.  
              В середине занятия есть небольшой перерыв для желающих.
              <br/>  Ближе к середине занятия (до или после) у доски разбираются задачи с прошлого раза. 
              Разбор делается не в начале, чтобы школьники могли сдать задачи, которые они не успели решить на прошлом занятии, но доделали дома. 
              Попутно даются также пояснения к текущей теме, иногда они делаются и раньше, если тема идёт тяжело. 
              <br/> В общей сложности разговор преподавателя у доски занимает минут 20 из двух часов, остальное время школьники решают задачи и обсуждают их с преподавателями на местах индивидуально.
              <br/>  Школьникам, справившимся с основными задачами, выдаются дополнительные задачи. 
              Бывает, что у школьника никак не выходит, скажем, всего одна-две задачи из основных, а времени ещё много &mdash; тогда ему, при его желании, тоже выдаются дополнительные задачи, чтобы он не зацикливался на одной задаче. 
              В конце занятия дополнительные задачи могут получить уже все желающие.
              <br/>  Успехи каждого ученика заносятся в специальный кондуит (сданные задачи отмечаются плюсиками). 
              Мы стараемся не заострять внимание на этих плюсиках, так как цель совсем не в них. 
              Кондуиты больше нужны нам, чтобы видеть, насколько удачно составлено занятие.
              <br/>  Наш кружок для 5 и 6 классов, но мы не делим школьников по классам. 
              Вместо этого у нас есть деление начинающие/продолжающие.  
              Задачи начинающих и продолжающих пересекаются, но у продолжающих нет совсем простых задач, а у начинающих &mdash; совсем сложных.
              Продолжающих примерно четверть всех школьников.
              Ситуация, когда школьник решает 1-2-3-4 задачи за занятие, кажется нам неправильной, поэтому если это происходит в продолжающей группе, мы переводим к начинающим. 
              Если же школьник в начинающей группе решает по 12-15 задач, то переводим к продолжающим.
              Это деление &mdash; наше мнение о том, где школьнику будет полезнее заниматься.
              Если школьнику или родителям кажется, что лучше к продолжающим (или наоборот), то мы свободно переводим между группами.
              </p></section>
          </div>
          <div class="lesson b-second">
            <h2 class="lesson_title">Приходите к нам на кружок!</h2>
  <!--          <section class="lesson_data">
              <p> Посещающие кружок имеют доступ ко всем занятиям, а также к кондуитам (таблице сданных задач).
            Решения основных задач появляется через неделю после занятия, решения всех задач появляются через 4 недели.
              До появления решений задачи можно решать дома и сдавать на занятиях.-->
              </p></section>
          </div>
 <div class="lesson b-second">
            <h2 class="lesson_title">Другие кружки</h2>
            <section class="lesson_data">
              <p>Кроме данного кружка в Москве проводится множество других кружков по математике (и другим предметам), например:
              <ul>
              <li><a target="_blank" href="http://179.ru/index.php/school/Kruzhki-studii-kluby">Кружки в 179-й школе</a>;</li>
              <li><a target="_blank" href="http://sch57.ru/nightsch.html">Кружки в 57-й школе</a>;</li>
              <li><a target="_blank" href="http://www.mccme.ru/circles/mccme/2016/">Кружки МЦНМО</a>;</li>
              <li><a target="_blank" href="http://mmmf.msu.ru/">Кружки Малого мехмата</a>.</li>
              </ul>
              </p></section>
          </div>
          <div class="lesson b-second">
            <h2 class="lesson_title">Преподавателям</h2>
            <section class="lesson_data">
              <p>Если вы выпускник 57-й или 179-й школы, студент или аспирант мехмата, матфака или физтеха и хотите помочь нам принимать задачи у школьников, то пишите письмо по адресу <a href="mailto:c1819@179.ru">c1819@179.ru</a> (Сергею Шашкову). 
              </p></section>
          </div>
      </div> 
ARTICLE
          );
        }
      ?>




      <?php
        if ((isset($_COOKIE['admin']) && md5('admin57') === $_COOKIE['admin']) || (isset($_COOKIE['cond']) && md5('cond') === $_COOKIE['cond'])) {
          echo(
<<<ARTICLE
      <div class="b-first">
          <div class="lesson b-second">
            <h2 class="lesson_title" style="text-align:center;">Задачи для продолжающих</h2>
            <section class="lesson_data">
              <p>Наш кружок для 5 и 6 классов, но мы не делим школьников по классам. 
              Вместо этого у нас есть деление начинающие/продолжающие.  
              Задачи начинающих и продолжающих пересекаются, но у продолжающих нет совсем простых задач, а у начинающих &mdash; совсем сложных.
              Продолжающих примерно четверть всех школьников.
              Ситуация, когда школьник решает 1-2-3-4 задачи за занятие, кажется нам неправильной, поэтому если это происходит в продолжающей группе, мы переводим к начинающим. 
              Если же школьник в начинающей группе решает по 12-15 задач, то переводим к продолжающим.
              Это деление &mdash; наше мнение о том, где школьнику будет полезнее заниматься.
              Если школьнику или родителям кажется, что лучше к продолжающим (или наоборот), то мы свободно переводим между группами.
              Задачи для начинающих можно найти <a href="//www.shashkovs.ru/vmsh-test/">по ссылке</a>.
              </p></section>
          </div>
      </div>
<!--  <div class="b-first">
        <div class="lesson b-second">
            <h2 class="lesson_title" style="text-align:center;">Онлайн-лесенка 29 октября</h2>
            <h3 class="lesson_title" style="text-align:left;">Общее описание игры</h3>

            <section class="lesson_data">
              <p><ul>
<li>Онлайн-лесенка — мероприятие по решению задач. Всем, участвующим в лесенке, предлагаются в строгом порядке одни и те же вопросы, к которым нужно указывать верные ответы.</li>
<li>Система подсчета баллов такова, что не обязательно решить много задач. Важно дать много верных ответов подряд. Подробнее о правилах начисления баллов читайте ниже.</li>
</ul>              </p></section>
            <h3 class="lesson_title" style="text-align:left;">Ход игры и подведение её итогов</h3>
 <section class="lesson_data">
              <p><ul>
<li>Во время игры участник получает задачу, решает ее и дает ответ. Независимо от результата (верный ответ или нет), участник получает следующую задачу. И так далее.</li>
<li>Время на решение каждой задачи не ограничено. Всего на в онлайн-лесенке 20 задач, ориентировочное время их решения – 1,5-2 часа.</li>
<li>Процесс решения для участника заканчивается, если он прошёл все задачи (вне зависимости от правильности ответов).</li>
</ul>
</p></section>
<h3 class="lesson_title" style="text-align:left;">Начисление баллов</h3>
 <section class="lesson_data">
              <p><ul>
<li>Первая задача стоит 3 балла.</li>
<li>Если к задаче дан верный ответ, то команда получает ее стоимость, а следующая задача будет стоить на 1 балл больше. Если на задачу дан неверный ответ, то команда получает за решение 0 баллов, а следующая задача будет стоить на 3 балла меньше, но не менее 3 баллов.</li>

</ul>
</p></section>


<form class="nodisplay" name="name_surname_form" id="name_surname_form">
<h3 class="lesson_title" style="text-align:left;color:green">Представьтесь, пожалуйста:
</h3>
<input value="Фамилия Имя" size="40"
onfocus="this.value=''; this.onfocus=null;"
onkeypress="
if (event.which == 13 || event.keyCode == 13) {
	localStorage.setItem('_ВМШ_п_ФИО', document.name_surname_form.elements[0].value);
	localStorage.setItem('_ВМШ_п_Сумма_09_00', '0');
	localStorage.setItem('_ВМШ_п_09_открытая', '2');
	localStorage.setItem('_ВМШ_п_Ставка_09_00', '3');
	localStorage.setItem('_ВМШ_п_Счётчик', '0');
	vmsh_worker.start();
	return false;
}
return true;
">
<input type="button" value="Сохранить и начать решать задачи" 
onClick="
localStorage.setItem('_ВМШ_п_ФИО', document.name_surname_form.elements[0].value);
localStorage.setItem('_ВМШ_п_Сумма_09_00', '0');
localStorage.setItem('_ВМШ_п_Ставка_09_00', '3');
localStorage.setItem('_ВМШ_п_09_открытая', '2');
localStorage.setItem('_ВМШ_п_Счётчик', '0');
vmsh_worker.start();">
</form>


<p class="nodisplay" id="khown_pup_name">
</p>


<form class="nodisplay" name="prob_09_01_form" id="prob_09_01_form">
<p id="prob_09_01"> <span class="problem_num"><b>Задача 9.01.</b></span>
В трамвае ехали 60 человек: контролёры, кондукторы, лжекондукторы (граждане, выдававшие себя за кондукторов), лжеконтролёры (граждане, выдававшие себя за контролёров), и, возможно, обычные пассажиры. Общее количество лжеконтролёров и лжекондукторов в 4 раза меньше числа настоящих кондукторов и контролёров. Общее число контролёров и лжеконтролёров в 7 раз больше общего числа кондукторов и лжекондукторов. Сколько в трамвае было обычных пассажиров?</p>
Ответ на задачу: <input id="inputn01" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten01(this);">
<p id="n01alert"></p>
</form>





<form class="nodisplay" name="prob_09_02_form" id="prob_09_02_form">
<p id="prob_09_02"> <span class="problem_num"><b>Задача 9.02.</b></span>
В ста ящиках было по одинаковому количеству деталей. Когда из первого ящика взяли несколько деталей, из второго в два раза больше, из третьего в три раза больше и так далее, то в последнем ящике осталась одна деталь, а во всех ста вместе — 14950. Сколько деталей было в каждом ящике первоначально?</p>
Ответ на задачу: <input id="inputn02" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten02(this);">
<p id="n02alert"></p>

</form>




<form class="nodisplay" name="prob_09_03_form" id="prob_09_03_form">
<p id="prob_09_03"> <span class="problem_num"><b>Задача 9.03.</b></span>
На пальме сидело много мартышек. Вдруг 20 из них получили по пинку. Пнутая мартышка срывает с пальмы 3 финика и раздает подружкам. Мартышка, получившая 2 финика, съедает их и пинает другую мартышку. После того как произошло 30 новых пинков, мартышки успокоились. Сколько фиников осталось у мартышек?</p>
Ответ на задачу: <input id="inputn03" value="" size="10" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten03(this);">
<p id="n03alert"></p>

</form>

<form class="nodisplay" name="prob_09_04_form" id="prob_09_04_form">
<p id="prob_09_04"> <span class="problem_num"><b>Задача 9.04.</b></span>
Петя проснулся в восьмом часу утра и заметил, что часовая стрелка его будильника делит
пополам угол между минутной стрелкой и стрелкой звонка, показывающей на цифру 8. Через какое
время должен прозвенеть будильник? Ответ выразите в минутах.
</p>
Ответ на задачу: <input id="inputn04" value="" size="2" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten04(this);">
<p id="n04alert"></p>

</form>


<form class="nodisplay" name="prob_09_05_form" id="prob_09_05_form">
<p id="prob_09_05"> <span class="problem_num"><b>Задача 9.05.</b></span>
Придумайте натуральное число, делящееся на 14, с как можно меньшей суммой цифр.
</p>
Ответ на задачу: <input id="inputn05" value="" size="10" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten05(this);">
<p id="n05alert"></p>

</form>

<form class="nodisplay" name="prob_09_06_form" id="prob_09_06_form">
<p id="prob_09_06"> <span class="problem_num"><b>Задача 9.06.</b></span>
В вершинах правильного девятиугольника расставьте числа 1, 2, 3, 4, 5, 6, 7, 8, 9, после чего на каждой диагонали пишут произведение чисел, стоящих на её концах. Расставьте числа в вершинах так, чтобы все числа на диагоналях были разные.
</p>
Запишите ваш ответ, начиная с некоторой вершины, двигаясь по часовой стрелке: 
<center><input name="inputn06" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input name="inputn06" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input name="inputn06" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input name="inputn06" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input name="inputn06" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input name="inputn06" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input name="inputn06" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input name="inputn06" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input name="inputn06" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></center>
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten06(this);">
<p id="n06alert"></p>

</form>
<form class="nodisplay" name="prob_09_07_form" id="prob_09_07_form">
<p id="prob_09_07"> <span class="problem_num"><b>Задача 9.07.</b></span>
В клеточки впишите все десять цифр так, чтобы по горизонталям получились четыре квадрата натуральных чисел. Сколько существует способов это сделать?
</p>
<table align="center">
<tr>
<td>
</td>
<td>
</td>
<td>
</td>
<td><input id="inputn0711" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">

</td>
<td>
</td>
<td>
</td>
<td>
</td>
</tr>
<tr>
<td>
</td>
<td>
</td>
<td>
<input id="inputn0721" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">

</td>
<td>
</td>
<td><input id="inputn0722" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">

</td>
<td>
</td>
<td>
</td>
</tr>
<tr>
<td>
</td>
<td>
<input id="inputn0731" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">

</td>
<td>
</td>
<td><input id="inputn0732" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">

</td>
<td>
</td>
<td><input id="inputn0733" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">

</td>
<td>
</td>
</tr>
<tr>
<td><input id="inputn0741" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">

</td>
<td>
</td>
<td><input id="inputn0742" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">

</td>
<td>
</td>
<td><input id="inputn0743" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">

</td>
<td>
</td>
<td><input id="inputn0744" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">

</td>
</tr>

</table>
Количество способов:<input id="inputn07c" value="" size="10" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten07(this);">
<p id="n07alert"></p>

</form>
<form class="nodisplay" name="prob_09_08_form" id="prob_09_08_form">
<p id="prob_09_08"> <span class="problem_num"><b>Задача 9.08.</b></span>
На длинной ленте написаны цифры 201820182018…. Вася вырезал ножницами два куска ленты и составил из них положительное число, которое делится на 72. Приведите пример таких кусков и запишите число, составленное из них. 
</p>
Пусть Вася вырезал первый кусок, потом второй, и составил из них число в этом порядке. Запишите тогда, чему равен первый кусок и второй кусок (они могут начинаться с "0").
Первый кусок: <input id="inputn081" value="" size="2" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
Второй кусок: <input id="inputn082" value="" size="2" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten08(this);">
<p id="n08alert"></p>

</form>
<form class="nodisplay" name="prob_09_09_form" id="prob_09_09_form">
<p id="prob_09_09"> <span class="problem_num"><b>Задача 9.09.</b></span>
Даны 19 карточек. На каждой карточке напишите ненулевую цифру так, чтобы из этих карточек можно было сложить ровно одно 19-значное число, кратное на 11.
</p>
Запишите цифры на карточках в таком порядке, чтобы получилось это число, кратное 11: 
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>
<select size = "1" name="inputn09" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "1" >1</option>
<option value = "2" >2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
</select>

<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten09(this);">
<p id="n09alert"></p>

</form>
<form class="nodisplay" name="prob_09_10_form" id="prob_09_10_form">
<p id="prob_09_10"> <span class="problem_num"><b>Задача 9.10.</b></span>
В трёх ящиках лежат орехи. В первом на 6 орехов меньше, чем в двух других вместе, а во втором — на 10 меньше, чем в первом и третьем вместе. Сколько орехов в третьем ящике? 
</p>
Ответ на задачу: <input id="inputn10" value="" size="3" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten10(this);">
<p id="n10alert"></p>

</form>
<form class="nodisplay" name="prob_09_11_form" id="prob_09_11_form">
<p id="prob_09_11"> <span class="problem_num"><b>Задача 9.11.</b></span>
Был жаркий день, и четыре супружеские пары, гуляя, выпили в течение дня 44 стакана лимонада. Анна выпила 2 стакана, Мария — 3,Софья — 4, Дарья — 5. Андреев выпил столько же, сколько и его жена; Борисов выпил стаканов вдвое больше, чем его жена; Васильев — втрое больше своей жены, а Груздев выпил стаканов лимонада в четыре раза больше, чем его жена. Кто на ком женат?
</p>
<p>Андреев женат на <span><input name = "inputn11andreev"  type = "radio" value="anna" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Анне</span>
<span><input  name = "inputn11andreev" type = "radio" value="maria" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Марии</span>
<span><input  name = "inputn11andreev" type = "radio" value="sofia" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Софии</span>
<span><input  name = "inputn11andreev" type = "radio" value="daria" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Дарье</span>.
</p>
<p>Борисов женат на <span><input name = "inputn11borisov" type = "radio" value="anna" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Анне</span>
<span><input name = "inputn11borisov" type = "radio" value="maria" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Марии</span>
<span><input name = "inputn11borisov" type = "radio" value="sofia" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Софии</span>
<span><input name = "inputn11borisov" type = "radio" value="daria" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Дарье</span>.
</p>
<p>Васильев женат на <span><input name = "inputn11vasiliev" type = "radio" value="anna" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Анне</span>
<span><input name = "inputn11vasiliev" type = "radio" value="maria" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Марии</span>
<span><input name = "inputn11vasiliev" type = "radio" value="sofia" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Софии</span>
<span><input name = "inputn11vasiliev" type = "radio" value="daria" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Дарье</span>.
</p>

<p>Груздев женат на <span><input name = "inputn11gruzdev" type = "radio" value="anna" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Анне</span>
<span><input name = "inputn11gruzdev" type = "radio" value="maria" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Марии</span>
<span><input name = "inputn11gruzdev" type = "radio" value="sofia" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Софии</span>
<span><input name = "inputn11gruzdev" type = "radio" value="daria" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">Дарье</span>.
</p>


<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten11(this);">
<p id="n11alert"></p>

</form>
<form class="nodisplay" name="prob_09_12_form" id="prob_09_12_form">
<p id="prob_09_12"> <span class="problem_num"><b>Задача 9.12.</b></span>
Отметьте на доске 7 &times; 7 несколько клеток так, чтобы в любом квадрате 3 &times; 3 отмеченных клеток было ровно на одну больше, чем неотмеченных.
</p>
Поставьте галочки в тех клетках, которые вы отметили:
<table align = "center">
<tr>
<td> <input type="checkbox" id="inputn1211" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input type="checkbox" id="inputn1212" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1213" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1214" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1215" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1216" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1217" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
</tr>
<tr>
<td> <input type="checkbox" id="inputn1221" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input type="checkbox" id="inputn1222" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1223" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1224" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1225" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1226" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1227" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
</tr>
<tr>
<td> <input type="checkbox" id="inputn1231" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input type="checkbox" id="inputn1232" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1233" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1234" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1235" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1236" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1237" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
</tr>
<tr>
<td> <input type="checkbox" id="inputn1241" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input type="checkbox" id="inputn1242" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1243" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1244" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1245" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1246" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1247" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
</tr>
<tr>
<td> <input type="checkbox" id="inputn1251" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input type="checkbox" id="inputn1252" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1253" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1254" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1255" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1256" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1257" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
</tr>
<tr>
<td> <input type="checkbox" id="inputn1261" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input type="checkbox" id="inputn1262" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1263" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1264" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1265" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1266" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1267" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
</tr>
<tr>
<td> <input type="checkbox" id="inputn1271" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input type="checkbox" id="inputn1272" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1273" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1274" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1275" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1276" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
<td><input type="checkbox" id="inputn1277" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);"></td>
</tr>

</table>
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten12(this);">
<p id="n12alert"></p>

</form>
<form class="nodisplay" name="prob_09_13_form" id="prob_09_13_form">
<p id="prob_09_13"> <span class="problem_num"><b>Задача 9.13.</b></span>
Четыре юных филателиста Митя, Толя, Саша и Петя купили почтовые марки. Каждый из них покупал марки только одной страны, причём двое из них купили российские марки, один — болгарские, а один — чешские. Митя и Толя купили марки двух разных стран. Марки разных стран купили и Митя с Сашей, Петя с Сашей, Петя с Митей и Толя с Сашей. Кроме этого известно, что Митя купил не болгарские марки. Определите, марки каких стран купил каждый из них.
</p>
<p>Для каждого человека выберите вариант ответа.</p>
<p>Митя купил
<select size = "1" id = "inputn13mitia" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);" required >
<option value = "none"></option>
<option value="rus">российские</option>
<option value="cze">чешские</option>
<option value="bgr">болгарские</option>
</select>  марки.</p>
<p>Толя купил
<select size = "1" id = "inputn13tolia" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);" required >
<option value = "none"></option>
<option value="rus">российские</option>
<option value="cze">чешские</option>
<option value="bgr">болгарские</option>
</select>  марки.</p>
<p>Саша купил
<select  size = "1" id = "inputn13sasha" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);" required >
<option value = "none"></option>
<option value="rus">российские</option>
<option value="cze">чешские</option>
<option value="bgr">болгарские</option>
</select>  марки.</p>
<p>Петя купил
<select  size = "1" id = "inputn13petia" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);" required >
<option value = "none"></option>
<option value="rus">российские</option>
<option value="cze">чешские</option>
<option value="bgr">болгарские</option>
</select>  марки.</p>

<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten13(this);">
<p id="n13alert"></p>

</form>
<form class="nodisplay" name="prob_09_14_form" id="prob_09_14_form">
<p id="prob_09_14"> <span class="problem_num"><b>Задача 9.14.</b></span><img align="right" style="width:80%; max-width:270px;" src = "i/09-n-I12.png">
В рамке 8 &times; 8 шириной в 2 клетки (см. рисунок) всего 48 клеточек. Сколько клеточек в рамке 254 &times; 254 шириной в 2 клетки? 

</p>
Ответ на задачу: <input id = "inputn14" value="" size="10" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten14(this);">
<p id="n14alert"></p>
</form>
<form class="nodisplay" name="prob_09_15_form" id="prob_09_15_form">
<p id="prob_09_15"> <span class="problem_num"><b>Задача 9.15.</b></span>
Использовав каждую из цифр от 0 до 9 ровно по разу, запишите 5 ненулевых чисел так, чтобы каждое делилось на предыдущее.
</p>
<p>Первое число: <input id="inputn151" value="" size="10" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">.</p>
<p>Второе число: <input id="inputn152" value="" size="10" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">.</p>
<p>Третье число: <input id="inputn153" value="" size="10" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">.</p>
<p>Четвёртое число: <input id="inputn154" value="" size="10" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">.</p>
<p>Пятое число: <input id="inputn155" value="" size="10" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">.</p>

<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten15(this);">
<p id="n15alert"></p>

</form>
<form class="nodisplay" name="prob_09_16_form" id="prob_09_16_form">
<p id="prob_09_16"> <span class="problem_num"><b>Задача 9.16.</b></span>
В первой строке таблицы записаны подряд все числа от 1 до 9. Заполните вторую строку этой таблицы теми же числами от 1 до 9 в каком-нибудь порядке так, чтобы сумма двух чисел в каждом столбце оказалась точным квадратом.
</p>
<table align = "center" border = "2px">
<tr>
<td align = "center">1
</td>
<td align = "center">2
</td>
<td align = "center">3
</td>
<td align = "center">4
</td>
<td align = "center">5
</td>
<td align = "center">6
</td>
<td align = "center">7
</td>
<td align = "center">8
</td>
<td align = "center">9
</td>
</tr>
<tr>
<td><input name = "inputn16" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input name = "inputn16" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input name = "inputn16" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input name = "inputn16" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input name = "inputn16" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input name = "inputn16" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>
<td><input name = "inputn16" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>

<td><input name = "inputn16" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>

<td><input name = "inputn16" value="" size="1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
</td>

</tr>

</table>
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten16(this);">
<p id="n16alert"></p>

</form>
<form class="nodisplay" name="prob_09_17_form" id="prob_09_17_form">
<p id="prob_09_17"> <span class="problem_num"><b>Задача 9.17.</b></span>
Астролог считает год удачным, если сумма первой и третьей цифры в его номере равна сумме второй и четвёртой. Например, 2013 год был удачным. Сколько удачных лет в 3-м тысячелетии?
</p>
Ответ на задачу: <input id="inputn17" value="" size="4" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten17(this);">
<p id="n17alert"></p>

</form>
<form class="nodisplay" name="prob_09_18_form" id="prob_09_18_form">
<p id="prob_09_18"> <span class="problem_num"><b>Задача 9.18.</b></span>Сколькими способами можно из клетчатого квадрата 4 &times; 4 (жестко закрепленного) вырезать по линиям сетки пять уголков из трех клеток?
</p>
Ответ на задачу: <input id="inputn18" value="" size="10" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten18(this);">
<p id="n18alert"></p>

</form>
<form class="nodisplay" name="prob_09_19_form" id="prob_09_19_form">
<p id="prob_09_19"> <span class="problem_num"><b>Задача 9.19.</b></span>
Расставьте (там, где это необходимо) знаки арифметических действий, чтобы равенство стало верным:
<p align = "center">1
<select name = "inputn19" size = "1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "+">+</option>
<option value = "-">-</option>
<option value = "*">*</option>
<option value = "/">/</option>
</select>
2 
<select name = "inputn19" size = "1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "+">+</option>
<option value = "-">-</option>
<option value = "*">*</option>
<option value = "/">/</option>
</select>
3
<select name = "inputn19" size = "1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "+">+</option>
<option value = "-">-</option>
<option value = "*">*</option>
<option value = "/">/</option>
</select>
4
<select name = "inputn19" size = "1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "+">+</option>
<option value = "-">-</option>
<option value = "*">*</option>
<option value = "/">/</option>
</select>
5
<select name = "inputn19" size = "1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "+">+</option>
<option value = "-">-</option>
<option value = "*">*</option>
<option value = "/">/</option>
</select>
6
<select name = "inputn19" size = "1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "+">+</option>
<option value = "-">-</option>
<option value = "*">*</option>
<option value = "/">/</option>
</select>
7
<select name = "inputn19" size = "1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "+">+</option>
<option value = "-">-</option>
<option value = "*">*</option>
<option value = "/">/</option>
</select>
8
<select name = "inputn19" size = "1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "+">+</option>
<option value = "-">-</option>
<option value = "*">*</option>
<option value = "/">/</option>
</select>
9
<select name = "inputn19" size = "1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "+">+</option>
<option value = "-">-</option>
<option value = "*">*</option>
<option value = "/">/</option>
</select>
1
<select name = "inputn19" size = "1" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">
<option value = ""></option>
<option value = "+">+</option>
<option value = "-">-</option>
<option value = "*">*</option>
<option value = "/">/</option>
</select>
0 = 2018</p>
</p>
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten19(this);">
<p id="n19alert"></p>

</form>
<form class="nodisplay" name="prob_09_20_form" id="prob_09_20_form">
<p id="prob_09_20"> <span class="problem_num"><b>Задача 9.20.</b></span>
Три брата вернулись с рыбалки. Мама спросила у каждого, сколько они вместе поймали рыб. Вася сказал: “Больше десяти”, Петя: “Больше восемнадцати”, Коля: “Больше пятнадцати”. Сколько могло быть поймано рыб (укажите все возможности), если известно, что два брата сказали правду, а третий – неправду?
</p>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">0</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">1</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">2</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">3</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">4</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">5</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">6</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">7</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">8</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">9</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">10</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">11</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">12</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">13</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">14</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">15</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">16</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">17</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">18</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">19</span>
<span><input name = "inputn20" type = "checkbox" value="" size="60" onfocus="this.value=''; this.onfocus=null;" onkeypress="return vmsh_worker.eform_all(this, event);">20</span>
<input type="button" value="Отправить ответ" onClick="vmsh_worker.validaten20(this);">
<p id="n20alert"></p>

</form>


<form class="nodisplay" name="prob_09_21_form" id="prob_09_21_form">
<p id="prob_09_21"> 
Ура! Это была последняя задача! Спасибо за участие!
<br/>
<br/>
<input type="button" value="Начать всё сначала" onClick="
localStorage.removeItem('_ВМШ_п_ФИО');
localStorage.removeItem('_ВМШ_п_09_открытая');
localStorage.removeItem('_ВМШ_п_09_Счётчик');
var i = 0;
while (i < 21) {
	var nums = ('00' + i).substr(-2,2);
	localStorage.removeItem('_ВМШ_п_09_' + nums + '_ответ');
	localStorage.removeItem('_ВМШ_п_09_' + nums + '_правильно');
	localStorage.removeItem('_ВМШ_п_Сумма_09_' + nums);
	localStorage.removeItem('_ВМШ_п_Ставка_09_' + nums);
	localStorage.removeItem('_ВМШ_п_Время_09_' + nums);

  	i++;
} 
window.location.href = '#09-p';
window.location.reload(true);
">
</p>
</form>






<script type="text/javascript">
var vmsh_worker = {
	MD5: function(s){function L(k,d){return(k<<d)|(k>>>(32-d))}function K(G,k){var I,d,F,H,x;F=(G&2147483648);H=(k&2147483648);I=(G&1073741824);d=(k&1073741824);x=(G&1073741823)+(k&1073741823);if(I&d){return(x^2147483648^F^H)}if(I|d){if(x&1073741824){return(x^3221225472^F^H)}else{return(x^1073741824^F^H)}}else{return(x^F^H)}}function r(d,F,k){return(d&F)|((~d)&k)}function q(d,F,k){return(d&k)|(F&(~k))}function p(d,F,k){return(d^F^k)}function n(d,F,k){return(F^(d|(~k)))}function u(G,F,aa,Z,k,H,I){G=K(G,K(K(r(F,aa,Z),k),I));return K(L(G,H),F)}function f(G,F,aa,Z,k,H,I){G=K(G,K(K(q(F,aa,Z),k),I));return K(L(G,H),F)}function D(G,F,aa,Z,k,H,I){G=K(G,K(K(p(F,aa,Z),k),I));return K(L(G,H),F)}function t(G,F,aa,Z,k,H,I){G=K(G,K(K(n(F,aa,Z),k),I));return K(L(G,H),F)}function e(G){var Z;var F=G.length;var x=F+8;var k=(x-(x%64))/64;var I=(k+1)*16;var aa=Array(I-1);var d=0;var H=0;while(H<F){Z=(H-(H%4))/4;d=(H%4)*8;aa[Z]=(aa[Z]| (G.charCodeAt(H)<<d));H++}Z=(H-(H%4))/4;d=(H%4)*8;aa[Z]=aa[Z]|(128<<d);aa[I-2]=F<<3;aa[I-1]=F>>>29;return aa}function B(x){var k="",F="",G,d;for(d=0;d<=3;d++){G=(x>>>(d*8))&255;F="0"+G.toString(16);k=k+F.substr(F.length-2,2)}return k}function J(k){k=k.replace(/rn/g,"n");var d="";for(var F=0;F<k.length;F++){var x=k.charCodeAt(F);if(x<128){d+=String.fromCharCode(x)}else{if((x>127)&&(x<2048)){d+=String.fromCharCode((x>>6)|192);d+=String.fromCharCode((x&63)|128)}else{d+=String.fromCharCode((x>>12)|224);d+=String.fromCharCode(((x>>6)&63)|128);d+=String.fromCharCode((x&63)|128)}}}return d}var C=Array();var P,h,E,v,g,Y,X,W,V;var S=7,Q=12,N=17,M=22;var A=5,z=9,y=14,w=20;var o=4,m=11,l=16,j=23;var U=6,T=10,R=15,O=21;s=J(s);C=e(s);Y=1732584193;X=4023233417;W=2562383102;V=271733878;for(P=0;P<C.length;P+=16){h=Y;E=X;v=W;g=V;Y=u(Y,X,W,V,C[P+0],S,3614090360);V=u(V,Y,X,W,C[P+1],Q,3905402710);W=u(W,V,Y,X,C[P+2],N,606105819);X=u(X,W,V,Y,C[P+3],M,3250441966);Y=u(Y,X,W,V,C[P+4],S,4118548399);V=u(V,Y,X,W,C[P+5],Q,1200080426);W=u(W,V,Y,X,C[P+6],N,2821735955);X=u(X,W,V,Y,C[P+7],M,4249261313);Y=u(Y,X,W,V,C[P+8],S,1770035416);V=u(V,Y,X,W,C[P+9],Q,2336552879);W=u(W,V,Y,X,C[P+10],N,4294925233);X=u(X,W,V,Y,C[P+11],M,2304563134);Y=u(Y,X,W,V,C[P+12],S,1804603682);V=u(V,Y,X,W,C[P+13],Q,4254626195);W=u(W,V,Y,X,C[P+14],N,2792965006);X=u(X,W,V,Y,C[P+15],M,1236535329);Y=f(Y,X,W,V,C[P+1],A,4129170786);V=f(V,Y,X,W,C[P+6],z,3225465664);W=f(W,V,Y,X,C[P+11],y,643717713);X=f(X,W,V,Y,C[P+0],w,3921069994);Y=f(Y,X,W,V,C[P+5],A,3593408605);V=f(V,Y,X,W,C[P+10],z,38016083);W=f(W,V,Y,X,C[P+15],y,3634488961);X=f(X,W,V,Y,C[P+4],w,3889429448);Y=f(Y,X,W,V,C[P+9],A,568446438);V=f(V,Y,X,W,C[P+14],z,3275163606);W=f(W,V,Y,X,C[P+3],y,4107603335);X=f(X,W,V,Y,C[P+8],w,1163531501);Y=f(Y,X,W,V,C[P+13],A,2850285829);V=f(V,Y,X,W,C[P+2],z,4243563512);W=f(W,V,Y,X,C[P+7],y,1735328473);X=f(X,W,V,Y,C[P+12],w,2368359562);Y=D(Y,X,W,V,C[P+5],o,4294588738);V=D(V,Y,X,W,C[P+8],m,2272392833);W=D(W,V,Y,X,C[P+11],l,1839030562);X=D(X,W,V,Y,C[P+14],j,4259657740);Y=D(Y,X,W,V,C[P+1],o,2763975236);V=D(V,Y,X,W,C[P+4],m,1272893353);W=D(W,V,Y,X,C[P+7],l,4139469664);X=D(X,W,V,Y,C[P+10],j,3200236656);Y=D(Y,X,W,V,C[P+13],o,681279174);V=D(V,Y,X,W,C[P+0],m,3936430074);W=D(W,V,Y,X,C[P+3],l,3572445317);X=D(X,W,V,Y,C[P+6],j,76029189);Y=D(Y,X,W,V,C[P+9],o,3654602809);V=D(V,Y,X,W,C[P+12],m,3873151461);W=D(W,V,Y,X,C[P+15],l,530742520);X=D(X,W,V,Y,C[P+2],j,3299628645);Y=t(Y,X,W,V,C[P+0],U,4096336452);V=t(V,Y,X,W,C[P+7],T,1126891415);W=t(W,V,Y,X,C[P+14],R,2878612391);X=t(X,W,V,Y,C[P+5],O,4237533241);Y=t(Y,X,W,V,C[P+12],U,1700485571);V=t(V,Y,X,W,C[P+3],T,2399980690);W=t(W,V,Y,X,C[P+10],R,4293915773);X=t(X,W,V,Y,C[P+1],O,2240044497);Y=t(Y,X,W,V,C[P+8],U,1873313359);V=t(V,Y,X,W,C[P+15],T,4264355552);W=t(W,V,Y,X,C[P+6],R,2734768916);X=t(X,W,V,Y,C[P+13],O,1309151649);Y=t(Y,X,W,V,C[P+4],U,4149444226);V=t(V,Y,X,W,C[P+11],T,3174756917);W=t(W,V,Y,X,C[P+2],R,718787259);X=t(X,W,V,Y,C[P+9],O,3951481745);Y=K(Y,h);X=K(X,E);W=K(W,v);V=K(V,g)}var i=B(Y)+B(X)+B(W)+B(V);return i.toLowerCase()},
	send_ans: function() {
	    var a = "";
	    for (var b in navigator) navigator[b] instanceof Object || "" === navigator[b] || (a += " " + b + ": " + navigator[b]);
	    var c = "";
	    for (var b in screen) navigator[b] instanceof Object || "" === screen[b] || (c += " " + b + ": " + screen[b]);
	    for (var d, e = "", f = 0; f < navigator.plugins.length; f++) {
	        var g = navigator.plugins[f],
	            g = g.name + " " + (g.version || "");
	        d != g && (e += " " + g, d = g)
	    }
	    var key = vmsh_worker.MD5(escape(a) + escape(c) + escape(e));
	    var name = "" + localStorage.getItem('_ВМШ_п_ФИО');
	    var ans = "" + localStorage.getItem('_ВМШ_п_ФИО') + "\t" +  localStorage.getItem('_ВМШ_п_Время_09_01') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_01') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_01') + "\t" +     localStorage.getItem('_ВМШ_п_09_01_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_02') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_02') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_02') + "\t" +     localStorage.getItem('_ВМШ_п_09_02_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_03') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_03') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_03') + "\t" +     localStorage.getItem('_ВМШ_п_09_03_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_04') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_04') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_04') + "\t" +     localStorage.getItem('_ВМШ_п_09_04_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_05') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_05') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_05') + "\t" +     localStorage.getItem('_ВМШ_п_09_05_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_06') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_06') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_06') + "\t" +     localStorage.getItem('_ВМШ_п_09_06_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_07') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_07') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_07') + "\t" +     localStorage.getItem('_ВМШ_п_09_07_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_08') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_08') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_08') + "\t" +     localStorage.getItem('_ВМШ_п_09_08_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_09') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_09') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_09') + "\t" +     localStorage.getItem('_ВМШ_п_09_09_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_10') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_10') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_10') + "\t" +     localStorage.getItem('_ВМШ_п_09_10_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_11') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_11') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_11') + "\t" +     localStorage.getItem('_ВМШ_п_09_11_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_12') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_12') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_12') + "\t" +     localStorage.getItem('_ВМШ_п_09_12_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_13') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_13') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_13') + "\t" +     localStorage.getItem('_ВМШ_п_09_13_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_14') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_14') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_14') + "\t" +     localStorage.getItem('_ВМШ_п_09_14_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_15') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_15') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_15') + "\t" +     localStorage.getItem('_ВМШ_п_09_15_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_16') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_16') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_16') + "\t" +     localStorage.getItem('_ВМШ_п_09_16_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_17') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_17') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_17') + "\t" +     localStorage.getItem('_ВМШ_п_09_17_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_18') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_18') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_18') + "\t" +     localStorage.getItem('_ВМШ_п_09_18_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_19') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_19') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_19') + "\t" +     localStorage.getItem('_ВМШ_п_09_19_ответ') + "\t" +     localStorage.getItem('_ВМШ_п_Время_09_20') + "\t" +     localStorage.getItem('_ВМШ_п_Ставка_09_20') + "\t" +    localStorage.getItem('_ВМШ_п_Сумма_09_20') + "\t" +     localStorage.getItem('_ВМШ_п_09_20_ответ'); 
	    var xhr = new XMLHttpRequest();
	    var url = "https://www.shashkovs.ru/vmsh-a-test/karusel/wrt_ans2.php";
	    // var url = "https://v.shashkovs.ru/karusel/wrt_ans2.php";
	    xhr.open("POST", url, true);
	    xhr.setRequestHeader("Content-type", "application/json");
	    xhr.onreadystatechange = function () {
	        if (xhr.readyState === 4 && xhr.status === 200) {
	            console.log('ReqOk');
	        }
	    };
	    var data = JSON.stringify({"key": key, "name": name, "ans": ans});
	    xhr.send(data);
	    console.log('Sent');
	},
	cor_ans: ['','true', 'true','true', 'true', 'true', 'true','true','true','true','true','true','true','true','true','true','true','true','true','true','true','true','true','true','true'],
	examples: ['', '43', '987987987987987', '19', '10', '21', '100', 'черные, русые, рыжие', '88', '13', '2', '10', 'Таня, 30', '5', '17', '6', '1234', '14', '200', '12, 49', '40'],
	start: function() {
		var pup_name = localStorage.getItem('_ВМШ_п_ФИО');
		if (!!pup_name && pup_name !== 'Фамилия Имя') {
			$( "#name_surname_form" ).toggleClass('nodisplay', true);
			$( "#khown_pup_name" ).html('<h3>' + pup_name + ', вы можете решать задачи!</h3><br/>');
			$( "#khown_pup_name" ).toggleClass('nodisplay', false);
			$( "#prob_09_01" ).prepend('<br /><br /><i>Стоимость задачи: ' + localStorage.getItem('_ВМШ_п_Ставка_09_00') + '; ' 
				                     + 'Сумма баллов: ' + localStorage.getItem('_ВМШ_п_Сумма_09_00') + '.</i><br />');
			$( "#prob_09_01_form" ).toggleClass('nodisplay', false);
		}
	},
	eform_all: function(obj, event) {
		if (event.which == 13 || event.keyCode == 13) {
			var num = +$(obj).closest('form').attr('id').substr(8,2);
			vmsh_worker.upd_and_call(num);
			return false;
		}
	    return true;
	},
	form_all: function(obj) {
		var num = +$(obj).closest('form').attr('id').substr(8,2);
		vmsh_worker.upd_and_call(num);
	},
	validaten01: function(obj) {
		var input01 = document.getElementById("inputn01").value;
		var x = Number(input01);

		var num = 1;

		if (Number.isInteger(x))
		{
		var paragr = document.getElementById("n01alert");
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());
		if(x == 20)
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
		var paragr = document.getElementById("n01alert");
		paragr.textContent = "Вы ввели:" + x + ". Ответ должен быть целым числом";
		}
	},	
	validaten02: function(obj) {
		
		var input02 = document.getElementById("inputn02").value;
		var x = Number(input02);

		var num = 2;

		if (Number.isInteger(x) && (input02 != ""))
		{
		var paragr = document.getElementById("n02alert");
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());
		if(x == 301)
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
		var paragr = document.getElementById("n02alert");
		paragr.textContent = "Вы ввели:" + x + ". Ответ должен быть целым числом";
		}
	},	
	validaten03: function(obj) {
		var input03 = document.getElementById("inputn03").value;
		console.log('Записали ответ' + input03)
		var x = Number(input03);

				console.log('Записали ответ' + x.toString());

		var num = 3;

		if (Number.isInteger(x))
		{
		var paragr = document.getElementById("n03alert");
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());
		if(x == 90)
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
		var paragr = document.getElementById("n03alert");
		paragr.textContent = "Вы ввели:" + x + ". Ответ должен быть целым числом";
		}
	},
	validaten04: function(obj) {
		var input = document.getElementById("inputn04").value;
		var x = Number(input);

		var num = 4;

		if (Number.isInteger(x))
		{
		var paragr = document.getElementById("n04alert");
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());
		if(x == 24)
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
		var paragr = document.getElementById("n04alert");
		paragr.textContent = "Вы ввели:" + x + ". Как ни странно, ответом является целое число (минут). Исправьте, пожалуйста.";
		}
	},
	validaten05: function(obj) {
		var input = document.getElementById("inputn05").value;
		var x = Number(input);

		var num = 5;

		if (Number.isInteger(x) && (input != "") && (x > 0))
		{
		var paragr = document.getElementById("n05alert");
		var sumdig= 0;
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());
		if ((x % 14) != 0)
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		while (x > 0)
		{
			sumdig += x % 10;
			x = Math.floor(x/10);
		}

		if(sumdig != 2)
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}	
		console.log('Правильный ответ');
		localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');

		vmsh_worker.prc_all(num, true);
		}
		else
		{
		var paragr = document.getElementById("n05alert");
		paragr.textContent = "Вы ввели:" + x + ". Ответом является натуральное число.";
		}
	},

	validaten06: function(obj) {
		var input = document.getElementsByName("inputn06");
		var x = [];
		var digits = [0,0,0,0,0,0,0,0,0];
		var products = [];
		for (i = 0;i<100;i++)
		{
			products[i] = 0;
		}

		var num = 6;
		for (i=0;i<9;i++)
		{
			x[i] = Number(input[i].value);
			if ((input[i].value == "") || (!Number.isInteger(x[i])) || (x <= 0) || (x > 9))
			{
				var paragr = document.getElementById("n06alert");
				paragr.textContent = "В каждой ячейке должно быть натуральное число от 1 до 9.";
				return;
			}
			digits[x[i]-1]++;
		}


		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());

		for (i=0;i<9;i++)
		{
			if (digits[i] != 1)
			{
							console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
					vmsh_worker.prc_all(num, true);
					return;
			}
		}


		for (i=0;i<9;i++)
		{
			for (j =2;j < 9 - i;j++)
			{
				if(!((i == 0) && (j==8)))
				{
					if (products[x[i]*x[i+j]]++ > 0)
					{
						console.log('Неправильный ответ');
						console.log(i + ' ' + (i+j));
						localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
						vmsh_worker.prc_all(num, true);
						return;
					}
					
				}
			}
		}
				
		console.log('Правильный ответ');
		localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		vmsh_worker.prc_all(num, true);

		
	},
validaten07: function(obj) {
		var inputc = document.getElementById("inputn07c").value;
		var input11 = document.getElementById("inputn0711").value;
	var input21 = document.getElementById("inputn0721").value;
var input22 = document.getElementById("inputn0722").value;
var input31 = document.getElementById("inputn0731").value;
var input32 = document.getElementById("inputn0732").value;
var input33 = document.getElementById("inputn0733").value;
var input41 = document.getElementById("inputn0741").value;
var input42 = document.getElementById("inputn0742").value;
var input43 = document.getElementById("inputn0743").value;
var input44 = document.getElementById("inputn0744").value;

		var x = Number(inputc);
		var x11 = Number(input11);
		var x21 = Number(input21);
		var x22 = Number(input22);
		var x31 = Number(input31);
		var x32 = Number(input32);
		var x33 = Number(input33);
		var x41 = Number(input41);
		var x42 = Number(input42);
		var x43 = Number(input43);
		var x44 = Number(input44);

		var num = 7;

		if (Number.isInteger(x) && Number.isInteger(x11) && Number.isInteger(x21) && Number.isInteger(x22) && Number.isInteger(x31) && Number.isInteger(x32) && Number.isInteger(x33) && Number.isInteger(x41) && Number.isInteger(x42) && Number.isInteger(x43) && Number.isInteger(x44))
		{
		var paragr = document.getElementById("n07alert");
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString() + ' ' + x11.toString() + ' ' + x21.toString() + ' ' + x22.toString() + ' ' + x31.toString() + ' ' + x32.toString() + ' ' + x33.toString() + ' ' + x41.toString() + ' ' + x42.toString() + ' ' + x43.toString() + ' ' + x44.toString());
		console.log('Записали ответ' + nums + x.toString());
		if((x == 2) && (((x11 == 1) && (x21 == 3) && (x22 == 6) && (x31 == 7) && (x32 == 8) && (x33 == 4) && (x41 == 9) && (x42 == 0 ) && (x43 == 2) && (x44 == 5)) || ((x11 == 9) && (x21 == 1) && (x22 == 6) && (x31 == 7) && (x32 == 8) && (x33 == 4) && (x41 == 3) && (x42 == 0) && (x43 == 2) && (x43 == 2))))
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
		var paragr = document.getElementById("n07alert");
		paragr.textContent = "Все ответы должны быть целыми числами";
		}
	},
validaten08: function(obj) {
		var input01 = document.getElementById("inputn081").value;
		var input02 = document.getElementById("inputn082").value;
		var posl = ['2','0','1','8'];
		var sovp = false;
		var num = 8;
		var paragr = document.getElementById("n08alert");
	
		if (input01.length > 0)
		{
			for (i = 0;i < 4;i++)
			{
				if (input01[0] == posl[i])
				{
					sovp = true;
					for(j=0;j<input01.length;j++)
					{
						if(input01[j] != posl[(i+j)%4])
						{
							paragr.textContent = "Первая последовательность не является куском исходной последовательности. Исправьте, пожалуйста.";
							return;
						}
					}
					break;
				}
			}
		}
		else
		{
			sovp = true;
		}
		
		if (sovp == false)
		{
			paragr.textContent = "Первая последовательность не является куском исходной последовательности. Исправьте, пожалуйста.";
			return;
		}

		sovp = false;		
		if (input02.length > 0)
		{
			for (i = 0;i < 4;i++)
			{
				if (input02[0] == posl[i])
				{
					sovp = true;
					for(j=0;j<input02.length;j++)
					{
						if(input02[j] != posl[(i+j)%4])
						{
							paragr.textContent = "Вторая последовательность не является куском исходной последовательности. Исправьте, пожалуйста.";
							return;
						}
					}
					break;

				}
			}
		}
		else
		{
			sovp = true;
		}

		if (sovp == false)
		{
					
			paragr.textContent = "Вторая последовательность не является куском исходной последовательности. Исправьте, пожалуйста.";
			return;
		}
		
		var inputs = input01 + input02;
		var x = Number(inputs);
		if (Number.isInteger(x) && (inputs !=""))
		{
		var paragr = document.getElementById("n08alert");
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());

		if((x%72) == 0)
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
		var paragr = document.getElementById("n08alert");
		paragr.textContent = "Вы ввели " + input01 + " и " + input02 + ". Оба куска должны быть кусками исходной последовательности и вместе должны давать некоторое натуральное число (десятичная запись которого, возможно, начинается с нуля.";
		}
	},
validaten09: function(obj) {
		var input = document.getElementsByName("inputn09");
		console.log(input.length);
		var x = [];
		var digits = [0,0,0,0,0,0,0,0,0,0];
		var digcount = 0;
		var paragr = document.getElementById("n09alert");
		var N = 0;
		var num = 9;
		paragr.textContent = "";
		for (i = 0;i<19;i++)
		{
			if (input[i].value == "")
			{
				paragr.textContent = "Не выбран ответ для карточки с номером " + (i+1) + ".";
			}
			x[i] = Number(input[i].value);
			N += (2*(i%2)-1)*x[i];
		}
		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());


		for (i = 0;i<19;i++)
		{
			if (digits[x[i]]++ == 0)
			{
				if (digcount++ == 2)
				{
					console.log('Неправильный ответ');
					 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
					vmsh_worker.prc_all(num, true);
					return;
				}
			}
		}
		
		
		if ((N%11) != 0)
		{
			console.log('Неправильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
			vmsh_worker.prc_all(num, true);
			return;
		}

		
		console.log(1);

		for(i=0;i<17;i++)
		{
			if(x[i] != x[i+2])
			{
			console.log('Неправильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
			vmsh_worker.prc_all(num, true);
			return;
			}

		}
		
		var a = x[0];
		var b = x[1];

		for (i = 1;i<9;i++)
		{
			if( (((a*(10-i)+b*i) - (a*i + b*(9-i))) % 11) == 0)
			{
				console.log('Неправильный ответ');
				localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
				vmsh_worker.prc_all(num, true);
				return;
			}
		}
		


		console.log('Правильный ответ');
		localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		vmsh_worker.prc_all(num, true);

	},

validaten10: function(obj) {
		var input01 = document.getElementById("inputn10").value;
		var x = Number(input01);

		var num = 10;

		if (Number.isInteger(x))
		{
		var paragr = document.getElementById("n10alert");
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());
		if(x == 8)
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
		var paragr = document.getElementById("n10alert");
		paragr.textContent = "Вы ввели:" + x + ". Ответ должен быть целым числом";
		}
	},

validaten11: function(obj) {
		var andreev,borisov,vasiliev,gruzdev;
		var error;
		if (document.getElementsByName("inputn11andreev")[0].checked)
		{
			andreev = 'anna';
		}
		else if (document.getElementsByName("inputn11andreev")[1].checked)
		{
			andreev = 'maria';
		}
		else if (document.getElementsByName("inputn11andreev")[2].checked)
		{
			andreev = 'sofia';
		}
		else if (document.getElementsByName("inputn11andreev")[3].checked)
		{
			andreev = 'daria';

		}
		else
			error = true;
		if (document.getElementsByName("inputn11borisov")[0].checked)
		{
			borisov = 'anna';
		}
		else if (document.getElementsByName("inputn11borisov")[1].checked)
		{
			borisov = 'maria';
		}
		else if (document.getElementsByName("inputn11borisov")[2].checked)
		{
			borisov = 'sofia';
		}
		else if (document.getElementsByName("inputn11borisov")[3].checked)
		{
			borisov = 'daria';

		}
		else
			error = true;

		if (document.getElementsByName("inputn11vasiliev")[0].checked)
		{
			vasiliev = 'anna';
		}
		else if (document.getElementsByName("inputn11vasiliev")[1].checked)
		{
			vasiliev = 'maria';
		}
		else if (document.getElementsByName("inputn11vasiliev")[2].checked)
		{
			vasiliev = 'sofia';
		}
		else if (document.getElementsByName("inputn11vasiliev")[3].checked)
		{
			vasiliev = 'daria';

		}
		else
			error = true;

		if (document.getElementsByName("inputn11gruzdev")[0].checked)
		{
			gruzdev = 'anna';
		}
		else if (document.getElementsByName("inputn11gruzdev")[1].checked)
		{
			gruzdev = 'maria';
		}
		else if (document.getElementsByName("inputn11gruzdev")[2].checked)
		{
			gruzdev = 'sofia';
		}
		else if (document.getElementsByName("inputn11gruzdev")[3].checked)
		{
			gruzdev = 'daria';

		}
		else
			error = true;

console.log(andreev + ' ' + borisov + ' ' + vasiliev + ' ' + gruzdev);

		var num = 11;

		if ((andreev != borisov) && (andreev != vasiliev) && (andreev != gruzdev) && (borisov != vasiliev) && (borisov != gruzdev) && (vasiliev != gruzdev))
		{
		var paragr = document.getElementById("n11alert");
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', andreev + ' ' + borisov + ' ' + vasiliev + ' ' + gruzdev);
		console.log('Записали ответ' + nums +  andreev + ' ' + borisov + ' ' + vasiliev + ' ' + gruzdev);
		if((andreev == 'daria') && (borisov == 'sofia') && (vasiliev == 'maria') && (gruzdev == 'anna'))
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
		var paragr = document.getElementById("n11alert");
		paragr.textContent = "Вы поженили двух человек на одном и том же человеке. Исправьте, пожалуйста.";
		  	console.log('Невалидно');

		}
	},

	validaten12: function(obj) {
		var x = [[document.getElementById("inputn1211").checked?1:0,document.getElementById("inputn1212").checked?1:0,document.getElementById("inputn1213").checked?1:0,document.getElementById("inputn1214").checked?1:0,document.getElementById("inputn1215").checked?1:0,document.getElementById("inputn1216").checked?1:0,document.getElementById("inputn1217").checked?1:0],[document.getElementById("inputn1221").checked?1:0,document.getElementById("inputn1222").checked?1:0,document.getElementById("inputn1223").checked?1:0,document.getElementById("inputn1224").checked?1:0,document.getElementById("inputn1225").checked?1:0,document.getElementById("inputn1226").checked?1:0,document.getElementById("inputn1227").checked?1:0],[document.getElementById("inputn1231").checked?1:0,document.getElementById("inputn1232").checked?1:0,document.getElementById("inputn1233").checked?1:0,document.getElementById("inputn1234").checked?1:0,document.getElementById("inputn1235").checked?1:0,document.getElementById("inputn1236").checked?1:0,document.getElementById("inputn1237").checked?1:0],[document.getElementById("inputn1241").checked?1:0,document.getElementById("inputn1242").checked?1:0,document.getElementById("inputn1243").checked?1:0,document.getElementById("inputn1244").checked?1:0,document.getElementById("inputn1245").checked?1:0,document.getElementById("inputn1246").checked?1:0,document.getElementById("inputn1247").checked?1:0],[document.getElementById("inputn1251").checked?1:0,document.getElementById("inputn1252").checked?1:0,document.getElementById("inputn1253").checked?1:0,document.getElementById("inputn1254").checked?1:0,document.getElementById("inputn1255").checked?1:0,document.getElementById("inputn1256").checked?1:0,document.getElementById("inputn1257").checked?1:0],[document.getElementById("inputn1261").checked?1:0,document.getElementById("inputn1262").checked?1:0,document.getElementById("inputn1263").checked?1:0,document.getElementById("inputn1264").checked?1:0,document.getElementById("inputn1265").checked?1:0,document.getElementById("inputn1266").checked?1:0,document.getElementById("inputn1267").checked?1:0],[document.getElementById("inputn1271").checked?1:0,document.getElementById("inputn1272").checked?1:0,document.getElementById("inputn1273").checked?1:0,document.getElementById("inputn1274").checked?1:0,document.getElementById("inputn1275").checked?1:0,document.getElementById("inputn1276").checked?1:0,document.getElementById("inputn1277").checked?1:0]];		
		var num = 12;
		var counter;
		var nums = ("00" + num).substr(-2,2);

		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());

		for (i = 0; i < 5;i++)
		{
			for (j = 0;j<5;j++)
			{
				counter = 0;
				for (ii = 0;ii < 3;ii++)
				{
					for (jj =0;jj<3;jj++)
					{
						counter += x[i + ii][j + jj];
					}
				}
				if (counter != 5)
				{
					console.log('Неправильный ответ');
					localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
					vmsh_worker.prc_all(num, true);
					return;
				}
			}
		}
	  	
		console.log('Правильный ответ');
		localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		vmsh_worker.prc_all(num, true);

	},
	validaten13: function(obj) {
		var mitia = document.getElementById("inputn13mitia").value;
		var tolia = document.getElementById("inputn13tolia").value;
		var sasha = document.getElementById("inputn13sasha").value;
		var petia = document.getElementById("inputn13petia").value;		
		var num = 13;
		var error = (mitia!='none')?((tolia!='none')?((sasha!='none')?((petia!='none')?false:true):true):true):true;
		var paragr = document.getElementById("n13alert");
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		if(!error)
		{
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', mitia + ' ' + tolia + ' ' + sasha + ' ' + petia);
		console.log('Записали ответ' + nums + mitia + ' ' + tolia + ' ' + sasha + ' ' + petia);
		if((mitia == 'cze') && (tolia == 'rus') && (petia == 'rus') && (sasha = 'bgr'))
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
			paragr.textContent = "Выберите вариант для каждого человека";
		}
	},

	validaten14: function(obj) {
		var input = document.getElementById("inputn14").value;
		var x = Number(input);

		var num = 14;

		if (Number.isInteger(x))
		{
		var paragr = document.getElementById("n03alert");
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());
		if(x == 2016)
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
		var paragr = document.getElementById("n14alert");
		paragr.textContent = "Вы ввели:" + x + ". Ответ должен быть целым числом";
		}
	},

	validaten15: function(obj) {
		var input1 = document.getElementById("inputn151").value;
		var input2 = document.getElementById("inputn152").value;
		var input3 = document.getElementById("inputn153").value;
		var input4 = document.getElementById("inputn154").value;
		var input5 = document.getElementById("inputn155").value;
		
		var x1 = Number(input1);
		var x2 = Number(input2);
		var x3 = Number(input3);
		var x4 = Number(input4);
		var x5 = Number(input5);
		var num = 15;
		var paragr = document.getElementById("n15alert");
		paragr.textContent = "";	
		var digits = [0,0,0,0,0,0,0,0,0,0];
		var rest;
		if (Number.isInteger(x1) && Number.isInteger(x2) && Number.isInteger(x3) && Number.isInteger(x4) && Number.isInteger(x5) && (x1 > 0) && (x2 > 0) && (x3 > 0) && (x4 > 0) && (x5 > 0))
		{
		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x1.toString() + ' ' + x2.toString() + ' ' + x3.toString() + ' ' + x4.toString() + ' ' + x5.toString());
		console.log('Записали ответ' + nums + x1.toString() + ' ' + x2.toString() + ' ' + x3.toString() + ' ' + x4.toString() + ' ' + x5.toString());
		
		if ((x2 % x1 != 0) || (x3 % x2 != 0) || (x4 % x3 != 0) || (x5 % x4 != 0))
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
			vmsh_worker.prc_all(num, true);
			return;
		}
		
		while (x1 != 0)
		{
			digits[x1 % 10] += 1;
			x1 = Math.floor(x1/10)
		}
		while (x2 != 0)
		{
			digits[x2 % 10] += 1;
			x2 = Math.floor(x2/10)
		}
		while (x3 != 0)
		{
			digits[x3 % 10] += 1;
			x3 = Math.floor(x3/10)
		}
		while (x4 != 0)
		{
			digits[x4 % 10] += 1;
			x4 = Math.floor(x4/10)
		}
		while (x5 != 0)
		{
			digits[x5 % 10] += 1;
			x5 = Math.floor(x5/10)
		}
		for (i = 0;i<10;i++)
		{
			if (digits[i] != 1)
			{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
			vmsh_worker.prc_all(num, true);
			return;
			}
		}
		  	
		console.log('Правильный ответ');
		localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		vmsh_worker.prc_all(num, true);

		}
		else
		{
		paragr.textContent = "Ответ должен быть натуральным числом";
		}
	},

validaten16: function(obj) {
		var input = document.getElementsByName("inputn16");
		var x = Array();
		var paragr = document.getElementById("n16alert");
		paragr.textContent = "";	
		for (i = 0;i<9;i++)
		{
			x[i] = Number(input[i].value);
			if ((input[i].value == "") || !Number.isInteger(x[i]))
			{
				paragr.textContent = "Ответ должен быть натуральным числом";
				return;
			}
				
		}

		
		var answer = [8,2,6,5,4,3,9,1,7];
		var num = 16;
		var nums = ("00" + num).substr(-2,2);
		
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString())	
		for (i =0;i<9;i++)
		{
			if (x[i] != answer[i])
			{
				console.log('Неправильный ответ');
			 	localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
				vmsh_worker.prc_all(num, true);
				return;
			}
				
		}
		console.log('Правильный ответ');
		localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		vmsh_worker.prc_all(num, true);

	},

	validaten17: function(obj) {
		var input = document.getElementById("inputn17").value;
		var x = Number(input);
		var num = 17;
		var paragr = document.getElementById("n17alert");
		paragr.textContent = "";	

		if ((input != "") && (Number.isInteger(x)))
		{
		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());
		if(x == 69)
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
			paragr.textContent = "Вы ввели:" + input + ". Ответ должен быть целым числом";
		}
	},
	validaten18: function(obj) {
		
		var input = document.getElementById("inputn18").value;
		var x = Number(input);

		var num = 18;

		if (Number.isInteger(x) && (input != ""))
		{
		var paragr = document.getElementById("n18alert");
		paragr.textContent = "";		
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', x.toString());
		console.log('Записали ответ' + nums + x.toString());
		if(x == 16)
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
		var paragr = document.getElementById("n18alert");
		paragr.textContent = "Вы ввели:" + x + ". Ответ должен быть целым числом";
		}
	},
	
	validaten19: function(obj) {
		var input = document.getElementsByName("inputn19");
		var evstr = "";
		for (i = 0;i<9;i++)
		{
			evstr += (i+1).toString() + input[i].value;
		}
		evstr += "1" + input[9].value + "0";

		console.log(evstr);
		var res = Number(eval(evstr));
		console.log(res);
		var num = 19;
		var paragr = document.getElementById("n19alert");
		paragr.textContent = "";	
		if (Number.isInteger(res))
		{
			paragr.textContent = "Значение вашего выражения (" + evstr + ") равно " + res + ".";
			var nums = ("00" + num).substr(-2,2);
			localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', input);
			console.log(evstr);
			console.log('Записали ответ' + nums + input);

		if(res == 2018)
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		}
		else
		{
			paragr.textContent = "Значение вашего выражения не определено. Выберите другие знаки.";
		}
	},

	validaten20: function(obj) {
		var input = document.getElementsByName("inputn20");
		var str = "";
		var error = false;
		for (i = 0;i<21;i++)
		{
			if (input[i].checked)
			{
				if (str == "")
				{
					str += i.toString();
				}
				else
				{
					str += ", " + i.toString(); 
				}
				if (!((i>=16) && (i<=18)))
				{
					error = true;
				}
			}
			else
			{
				if (((i>=16) && (i<=18)))
				{
					error = true;
				}	
			}
				
		}
		
		var num = 20;
		var paragr = document.getElementById("n20alert");
		var nums = ("00" + num).substr(-2,2);
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', str);
		console.log('Записали ответ' + nums + str);

		if (str == "")
		{
			paragr.textContent = "Вы ничего не выбрали.";
		}
		else
		{
			paragr.textContent = "Вы выбрали:" + str + ".";	
		}
		if(error == false)
		{
		  	console.log('Правильный ответ');
			localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'true');
		}
		else
		{
			console.log('Неправильный ответ');
			 localStorage.setItem('_ВМШ_п_09_' + nums + '_правильно', 'false');
		}
		vmsh_worker.prc_all(num, true);
		},











	upd_and_call: function(num) {
		var nums = ("00" + num).substr(-2,2);
		var ans = $('#prob_09_' + nums + '_form').children(':input')[0].value;
		localStorage.setItem('_ВМШ_п_09_' + nums + '_ответ', ans);
		vmsh_worker.prc_all(num, true);
	},
	prc_all: function(num, sendJ) {
		var nums = ("00" + num).substr(-2,2);
		var numsm1 = ("00" + (num-1)).substr(-2,2);
		var numsp1 = ("00" + (num+1)).substr(-2,2);
		var lastopened = Number(localStorage.getItem('_ВМШ_п_09_открытая'));
		var counter = Number(localStorage.getItem('_ВМШ_п_09_Счётчик'));
		if (sendJ){localStorage.setItem('_ВМШ_п_09_Счётчик',counter+1);}
		var nextopen = ("00" + (lastopened+1)).substr(-2,2);
		var cur_ans = localStorage.getItem('_ВМШ_п_09_' + nums + '_правильно');
		var example_text = '(например, «' + vmsh_worker.examples[num] + '»)';
		console.log('Обрабатываем ответ ' + cur_ans + ' ' + example_text);
		if (!!cur_ans && cur_ans !== example_text) {
			var cur_price = parseInt(localStorage.getItem('_ВМШ_п_Ставка_09_' + numsm1));
			var cur_total = parseInt(localStorage.getItem('_ВМШ_п_Сумма_09_' + numsm1));
			// Ответ уже дан. Блокируем форму, считаем баллы
			//$('#prob_09_' + nums + '_form').children(':input')[0].value = cur_ans;
			$('#prob_09_' + nums + '_form').children(':input').attr('disabled', 'disabled');
			// Тримим, удаляем лишнее
			var aft_cur_ans = cur_ans;			
			console.log('После преобразования: ' + aft_cur_ans);
			var cur_cor_ans = vmsh_worker.cor_ans[num];
console.log('Правильный: ' + cur_cor_ans);

			// if (/^\d+$/.test(cur_cor_ans)) {
			// 	aft_cur_ans = aft_cur_ans.replace(/[^\d.-,+]/g, '').replace(',','.').parseFloat();
			// 	cur_cor_ans = cur_cor_ans.parseFloat();
			// }
			if (aft_cur_ans == cur_cor_ans) { // Правильный ответ
				cur_total += cur_price;
				cur_price += 1;
				$( "#prob_09_" + nums + "_form" ).append('<br />Верно! :)');
			} else { // Неправильный ответ
				cur_price -= 3;
				if (cur_price < 3) {cur_price = 3;}
				$( "#prob_09_" + nums + "_form" ).append('<br />Неверно... :(');
			}
			localStorage.setItem('_ВМШ_п_Сумма_09_' + nums, cur_total.toString());
			localStorage.setItem('_ВМШ_п_Ставка_09_' + nums, cur_price.toString());
			localStorage.setItem('_ВМШ_п_Время_09_' + nums, (new Date()).toISOString());
			
			if (sendJ) 
			{ 
				vmsh_worker.send_ans();
				console.log(lastopened + ' ' + counter);
				$( "#prob_09_" + nums + "_form" ).append('<br /><br />Стоимость следующей задачи: ' + cur_price + ';' + 'Сумма баллов: ' + cur_total + '.<br />');
				console.log('Даём добро на задачу ' + numsp1 + '!');
				$( "#prob_09_" + numsp1 + "_form" ).toggleClass('nodisplay', false);
				localStorage.setItem('_ВМШ_п_09_открытая',nextopen);
			 }
			


		
		} else {
			console.log(nums);

			//$('#prob_09_' + nums + '_form').children(':input')[0].value = example_text;
		}
	},
};
</script>





<script type="text/javascript">
var i = 1;
while (i < 21) {
  vmsh_worker.prc_all(i, false);
  i++;
}
var pup_name = localStorage.getItem('_ВМШ_п_ФИО');
if (!pup_name || pup_name == 'Фамилия Имя') {
	$( "#name_surname_form" ).toggleClass('nodisplay', false);
} else {
	vmsh_worker.start();
	vmsh_worker.send_ans();
}
</script>

          </div>
      </div> -->


ARTICLE
          );
      } 
      ?>



      <div class="b-first">
      <?php 
        reset($datesarr);
        foreach ($datesarr as $number => $lesdt) {
          if ($lesdt->format('Y-m-d H:i:s') <= $curdt->format('Y-m-d H:i:s') && file_exists("data/{$number}-lesson.html")) {
            $i = (int)($number);
            $textdt = $lesdt->format('j')." ".$month[(int)($lesdt->format('m'))]." ".$lesdt->format('Y')." г.";
            echo(
<<<ARTICLE
<div class="lesson b-second" id="$number">
  <h2 class="lesson_title">Занятие {$i}. 
    <a href="#{$number}">#</a>
    <a class="inPDF" href="data/{$number}-lesson.pdf">pdf</a>
    <span class="lesDate">{$textdt}</span>
    
  </h2>
<div class="lesson_data">
ARTICLE
            );
            include "data/{$number}-lesson.html";
            echo(
<<<ARTICLE
</div>
ARTICLE
            );
            if ($lesdt->format('Y-m-d H:i:s') <= $weekdt->format('Y-m-d H:i:s')) {
              echo(
<<<ARTICLE
<!-- <div class="lesson_solution">
  <img class="spooler_img" src="//www.shashkovs.ru/vmsh-a-test/c/dw.gif" alt=""/><span class="spooler solution_spooler">Решения задач</span>
  <div class="solution_container nodisplay"><p>Подождите, решения загружаются.</p></div>
</div> -->
ARTICLE
              );
            }
            if (isset($_COOKIE['cond']) && md5('cond') === $_COOKIE['cond']) {
              echo(
<<<ARTICLE
<div class="lesson_conduit">
  <img class="spooler_img" src="//www.shashkovs.ru/vmsh-a-test/c/dw.gif" alt=""/><span class="spooler conduit_spooler">Кондуит</span>
  <div class="conduit_container nodisplay"><p>Ждите. Производится загрузка данных с сервера&hellip;</p></div>
</div>
ARTICLE
              );
            }
            echo('</div>');
          }
        }
      ?>
      </div>
    </div>


    <div id="footer">
    </div>

  </div>

<!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter32473920 = new Ya.Metrika({ id:32473920, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/32473920" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
</body>
</html>