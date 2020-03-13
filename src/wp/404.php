<?php 
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); // вырезаем первые две буквы
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESM-404</title>
    <link rel="stylesheet" href="/wp-content/themes/esm/assets/css/style.min.css">
</head>
<body>
    <section class="block-404">
        <div class="wrapper">
            <div class="block-404_text-block">
                <img src="/wp-content/themes/esm/assets/img/404.svg" alt="404">
                <p><?php if ($lang == 'ru') { echo 'Страница не найдена';} else { echo "Page not found";}?></p>
                <a href="<?php if ($lang == 'ru') { echo '/?lang=ru';} else { echo "/?lang=en";};?>"><?php if ($lang == 'ru') { echo 'Вернуться назад';} else { echo "Go back";};?></a>
            </div>
            <div class="block-404_image-block">
                <img src="/wp-content/themes/esm/assets/img/camera.png" alt="camera image">
            </div>
        </div>
    </section>
</body>
</html>
