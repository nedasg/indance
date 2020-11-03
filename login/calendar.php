<?php
$calendar = [];
$sventes = ['16 February', '11 March', '21 April', '22 April', '1 May', '24 June', '6 July', '15 August', '1 November', '24 December', '25 December'];

for ($i = 0; $i < 12; $i++) {
    $year = date('Y', strtotime("+$i months"));
    $month_name = date('F', strtotime("+$i months"));
    $month_num = date('n', strtotime("+$i months"));
    $month_days = (int) date('t', strtotime("+$i months"));
    $start_date = '01 ' . $month_name . ' ' . $year;
    $first_weekday = (int) (date('w', strtotime($start_date)));
    $first_weekday = ($first_weekday == 0) ? 7 : $first_weekday;

    $month_day = 1;
    for ($field_num = 1; $field_num <= 42; $field_num++) {
        if ($field_num < $first_weekday OR $month_day > $month_days) {
            $calendar[$month_num][$field_num]['day'] = null;
            $calendar[$month_num][$field_num]['text'] = null;
            $calendar[$month_num][$field_num]['class'] = 'empty';
            if ($field_num == 36 && is_null($calendar[$month_num][$field_num]['day'])) {
                unset($calendar[$month_num][$field_num]);
                break;
            }
        } else {
            $calendar[$month_num][$field_num]['day'] = $month_day;
            $calendar[$month_num][$field_num]['text'] = $month_day;
            $this_weekday = date('w', strtotime("$month_day " . $month_name . ' ' . $year));
            $this_monthday = $month_day . ' ' . $month_name;

            if ($this_weekday == 6 OR $this_weekday == 0) {
                $calendar[$month_num][$field_num]['class'] = 'weekend';
            } else {
                $calendar[$month_num][$field_num]['class'] = 'workday';
            }

            if (in_array($this_monthday, $sventes)) {
                $calendar[$month_num][$field_num]['class'] .= ' svente';
                $calendar[$month_num][$field_num]['text'] = 'Šventė!';
            }

            $month_day++;
        }
    }
}

$keys = array_keys($calendar);
$calendar_to_show = [];

for ($i = 0; $i < 4; $i++) {
    $calendar_to_show[] = $calendar[$keys[$i]];
}
?>

<?php foreach ($calendar_to_show as $key => $month): ?>
    <h5 class="month-name">
        <?php print date('F', strtotime("+$key months")); ?>
    </h5>
    <div class="calendar-month">
        <?php foreach ($month as $value): ?>
            <p class="<?php print $value['class']; ?>" title="<?php print $value['text']; ?>"><?php print $value['day']; ?></p>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>