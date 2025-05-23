<?php
require_once 'db.php';

function showContacts($sort = 'added', $page = 1) {
    $perPage = 10;
    $offset = ($page - 1) * $perPage;

    $orderBy = 'id DESC';
    if ($sort == 'surname') $orderBy = 'surname ASC';
    if ($sort == 'date') $orderBy = 'date ASC';

    $output = '<form method="post" action="" style="margin-bottom:20px;">
        <input type="hidden" name="clear_db" value="1">
        <button type="submit" onclick="return confirm(\'Вы точно хотите очистить всю базу данных?\')">Очистить базу данных</button>
    </form>';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['clear_db'])) {
        mysqli_query($GLOBALS['conn'], "TRUNCATE TABLE contacts");
        header("Location: ?mode=view");
        exit();
    }

    $result = mysqli_query($GLOBALS['conn'], "SELECT * FROM contacts ORDER BY $orderBy LIMIT $offset, $perPage");
    $output .= '<table>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>';
        foreach ($row as $value) {
            $output .= '<td>' . htmlspecialchars($value) . '</td>';
        }
        $output .= '</tr>';
    }
    $output .= '</table>';

    $totalRes = mysqli_query($GLOBALS['conn'], "SELECT COUNT(*) FROM contacts");
    $totalRows = mysqli_fetch_row($totalRes)[0];
    $pages = ceil($totalRows / $perPage);

    for ($i = 1; $i <= $pages; $i++) {
        $output .= "<a href='?mode=view&sort=$sort&page=$i'>$i</a> ";
    }

    return $output;
}