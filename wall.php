 <?
$_OPTIMIZATION["title"] = "Информация о пользователе";
 $usname = $_SESSION["user"];
 $usid = $_SESSION["user_id"];
 $date = time();
 $cena = 10; // Стоимость отзыва
 $rate = 0.1; // Колличество рейтинга за оставленный отзыв
 
 if(isset($_GET['name'])) {
 $name = htmlspecialchars($_GET['name']);
 $q = $db->Query("SELECT * FROM db_users_a WHERE user = '$name'");
 $us_inf = $db->FetchArray($q);
 $us = $us_inf['id'];
 $db->Query("SELECT * FROM db_users_b WHERE user = '$name'");
 $dat = $db->FetchArray();
 
 ?>

<div class="panel panel-info">
	<div class="panel-heading" style="padding: 5px 15px;">Информация о пользователе:</div>
	<div class="panel-body">
ID: <span class="pull-right"><?=$us_inf['id']; ?></span><br/>
Логин: <span class="pull-right"><?=$name; ?></span><br/>
Регистрация: <span class="pull-right"><?=date('d-m-Y', $us_inf['date_reg']); ?> г.</span><br/>
Заходил: <span class="pull-right"><?=date('d-m-Y', $us_inf['date_login']); ?> г.</span><br/>
Ввел денег: <span class="pull-right"><?=$dat['insert_sum']; ?> руб.</span><br/>
Вывел денег: <span class="pull-right"><?=$dat['payment_sum']; ?> руб.</span><br/>
Кто пригласил(РЕФЕРЕР): <span class="pull-right"><b><a href="<?=$us_inf['referer']; ?>"><?=$us_inf['referer']; ?></a></b></span><br/>
Принес рефереру: <span class="pull-right"><?=$dat['to_referer']; ?> руб.</span><br/>
Кол-во рефералов: <span class="pull-right"><?=$us_inf["referals"]; ?> чел.</span><br/>
Заработал на рефералах: <span class="pull-right"><?=$dat['from_referals']; ?> руб.</span><br/>
	</div>
</div>



</center>


<? } else {?>

 <div class="page-header">
	<h1>Стена пользователя</h1>
</div>
<div class="alert alert-info">	
Стена пользователя , это уникальная возможность быстро связаться с пользователем , стать его рефералом если еще не зарегистрированы и наблюдать за его активностью на проекте.
Надеемся, что это поможет вам не прогадать с человеком и отблагодарить реферала на проекте вашей активностью.<br><br>

За что начисляют рейтинг?<br>
1. За пополнение счета дается <b>2%</b> от суммы в рублях, рефереру идет же 1 % только в рейтинг.<br>
2. За вывод средств дается <b>1%</b> только пользователю.<br>
3. За покупку любого тарифа дается <b>0.1%</b> от суммы в рублях.<br>
4. За получение бонусов от <b>0.1 до 5</b> единицы рейтинга.<br><br>

</div>	

<? } ?>
