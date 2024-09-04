<?php 
    session_start();
    include "connect.php";

    $STH = $connect->query('SELECT * FROM `products` WHERE `count` > 0
                            ORDER BY `created_at` DESC LIMIT 5');
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $data = '';
    while($row = $STH->fetch())
    $data .= '
            <div class="slide_col">
                <img src="'.$row['path'].'" alt="" />
                <h3><a href="product.php?id='.$row['product_id'].'">'.$row['name'].'</a></h3>
            </div>';
    if($data == "")
        $data = '<h3 class="text_center">Товары отсутствуют</h3>';
    include "header.php";
?>

<main>
    <div class="content">
        <div class="registr">
            <form class="form" action="../controllers/register.php" method="POST">
                <div class="head">Регистрация</div>
                <input type="text" placeholder="Имя" name="name" pattern="[а-яА-ЯёЁ\s\-]+" required>
                <input type="text" placeholder="Фамилия" name="surname" pattern="[а-яА-ЯёЁ\s\-]+" required>
                <input type="text" placeholder="Отчество" name="patronymic" pattern="[а-яА-ЯёЁ\s\-]+">
                <input type="text" placeholder="Логин" name="login" pattern="[a-zA-Z0\9\-]+" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Пароль" name="password" pattern=".{6,}" required>
                <input type="password" placeholder="Повтор пароля" name="password_repeat" required>
                    <div class="part">
                        <input type="checkbox" name="rules" required>
                        <p>Согласие с правилами регистрации</p>
                    </div>
                <button>Зарегистрироваться</button>
            </form>
        </div>
       
        <div class="login">
            <form class="form" action="../controllers/login.php" method="POST">
                <div class="head">Вход</div>
                <input type="text" placeholder="Логин" name="login" required>
                <input type="password" placeholder="Пароль" name="password" required>
                <button>Войти</button>
            </form>
        </div>
        
    </div>
</main>
<?php include "footer.php" ?>