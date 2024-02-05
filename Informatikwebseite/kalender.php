<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W+F Münster | Terminkalender</title>
    <link rel="icon" type="image/jpg" href="Img/logo.jpg">
    <link rel="stylesheet" href="styles/kalender.css">
    <script src="Scripts/script1.js"></script>
</head>
<body>
    <header>
        <?php include('header.php'); ?>
    </header>
    <main>
        <section class="events">
            <h2>Termine</h2>
            <div class="event-calendar">
                <div class="month">
                    <span class="prev">&#10094;</span>
                    <span class="next">&#10095;</span>
                    <h2 id="month"></h2>
                </div>
                <ul class="weekdays">
                    <li>Mo</li>
                    <li>Di</li>
                    <li>Mi</li>
                    <li>Do</li>
                    <li>Fr</li>
                    <li>Sa</li>
                    <li>So</li>
                </ul>
                <ul class="days" id="days"></ul>
            </div>
            <div id="event-list"></div>
        </section>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>
