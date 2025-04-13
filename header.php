# header.php
# @Bybyscan 2024
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Расписание мероприятий' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
    <header>
        <div id="barkane-animation">
            <img src="640360barkane.jpg" alt="Логотип">
        </div>
        <nav>
            <a href="index.php">Главная</a>
            <a href="events.php">Мероприятия</a>
            <a href="favourites.php">Избранное</a>
        </nav>
    </header>
    <main>
