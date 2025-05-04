<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$input = $_POST['expression'] ?? '';

if (!preg_match('/^[0-9+\-*\/(). ]+$/', $input)) {
    echo json_encode(['result' => 'Invalid input']);
    exit;
}

try {
    $result = evalExpression($input);
    echo json_encode(['result' => $result]);
} catch (Exception $e) {
    echo json_encode(['result' => 'Error']);
}

function evalExpression($expr) {
    $expr = str_replace(['--', '++', '+-', '-+'], ['+', '+', '-', '-'], $expr);
    $result = @eval('return ' . $expr . ';');
    if ($result === false) {
        throw new Exception('Eval error');
    }
    return $result;
}
?>


