<?php
require_once 'db.php';

function editForm() {
    $output = '';
    $list = mysqli_query($GLOBALS['conn'], "SELECT id, surname, name FROM contacts ORDER BY surname, name");
    
    $currentId = $_GET['id'] ?? null;
    if (!$currentId && $row = mysqli_fetch_assoc($list)) {
        $currentId = $row['id'];
        mysqli_data_seek($list, 0);
    }
    
    while ($row = mysqli_fetch_assoc($list)) {
        $id = $row['id'];
        $text = $row['surname'] . ' ' . $row['name'];
        $style = $currentId == $id ? 'style="color:red; font-weight:bold;"' : '';
        $output .= "<a href='?mode=edit&id=$id' $style>$text</a><br>";
    }
    
    $data = [];
    if ($currentId) {
        $data = mysqli_fetch_assoc(mysqli_query($GLOBALS['conn'], "SELECT * FROM contacts WHERE id = $currentId"));
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $s = $_POST;
        $id = intval($_GET['id']);
        $query = "UPDATE contacts SET 
            surname='".mysqli_real_escape_string($GLOBALS['conn'], $s['surname'])."', 
            name='".mysqli_real_escape_string($GLOBALS['conn'], $s['name'])."', 
            lastname='".mysqli_real_escape_string($GLOBALS['conn'], $s['lastname'])."', 
            gender='".mysqli_real_escape_string($GLOBALS['conn'], $s['gender'])."', 
            date='".mysqli_real_escape_string($GLOBALS['conn'], $s['date'])."', 
            phone='".mysqli_real_escape_string($GLOBALS['conn'], $s['phone'])."', 
            location='".mysqli_real_escape_string($GLOBALS['conn'], $s['location'])."', 
            email='".mysqli_real_escape_string($GLOBALS['conn'], $s['email'])."', 
            comment='".mysqli_real_escape_string($GLOBALS['conn'], $s['comment'])."' 
            WHERE id=$id";
        mysqli_query($GLOBALS['conn'], $query);
        header("Location: ?mode=edit&id=$id");
        exit();
    }

    $row = $data;
    ob_start();
    include 'form.php';
    return $output . ob_get_clean();
}