<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календарь 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .calendar-table {
            table-layout: fixed;
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }
        .month-name {
            font-weight: bold;
            font-size: 18px;
            background-color: #f8f9fa;
        }
        .weekday-header {
            color: red;
            font-weight: bold;
            background-color: #e9ecef;
        }
        .saturday, .sunday {
            color: red !important;
            font-weight: bold;
        }
        td {
            padding: 5px;
        }
        .empty {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body class="container my-4">

    <h1 class="text-center mb-4">Календарь на 2025 год</h1>

    <?php
    function generateCalendar($year) {
        $months = [
            1 => "ЯНВАРЬ", 2 => "ФЕВРАЛЬ", 3 => "МАРТ", 4 => "АПРЕЛЬ",
            5 => "МАЙ", 6 => "ИЮНЬ", 7 => "ИЮЛЬ", 8 => "АВГУСТ",
            9 => "СЕНТЯБРЬ", 10 => "ОКТЯБРЬ", 11 => "НОЯБРЬ", 12 => "ДЕКАБРЬ"
        ];

        echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
        foreach ($months as $monthNumber => $monthName) {
            echo '<div class="col">';
            echo '<div class="card">';
            echo '<div class="card-header month-name text-center">' . $monthName . '</div>';
            echo '<div class="card-body p-0">';
            renderMonth($monthNumber, $year);
            echo '</div></div></div>';
        }
        echo '</div>';
    }

    function renderMonth($month, $year) {
        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
        $daysInMonth = date('t', $firstDayOfMonth);
        $firstWeekday = date('N', $firstDayOfMonth);

        echo '<table class="calendar-table table table-bordered">';
        echo '<tr class="weekday-header"><th>ПН</th><th>ВТ</th><th>СР</th><th>ЧТ</th><th>ПТ</th><th class="saturday">СБ</th><th class="sunday">ВС</th></tr>';

        echo '<tr>';

        for ($i = 1; $i < $firstWeekday; $i++) {
            echo '<td class="empty"></td>';
        }

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $currentWeekday = ($firstWeekday + $day - 2) % 7 + 1;

            $class = '';
            if ($currentWeekday == 6) {
                $class = 'saturday';
            } elseif ($currentWeekday == 7) {
                $class = 'sunday';
            }

            echo "<td class='$class'>$day</td>";

            if ($currentWeekday == 7 && $day != $daysInMonth) {
                echo '</tr><tr>';
            }
        }

        $lastWeekday = ($firstWeekday + $daysInMonth - 1) % 7;
        if ($lastWeekday != 0) {
            for ($i = $lastWeekday + 1; $i <= 7; $i++) {
                echo '<td class="empty"></td>';
            }
        }
        echo '</tr>';
        echo '</table>';
    }

    generateCalendar(2025);
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
