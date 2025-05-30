<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/triga.php';

$input = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['expression'])) {
    $input = $_POST['expression'];
} else {
    $expressionFile = __DIR__ . '/expression.txt';
    $input = file_exists($expressionFile) ? file_get_contents($expressionFile) : '';
}

if (!preg_match('/^[0-9+\-*\/().a-zA-Z ]+$/', $input)) {
    echo json_encode(['result' => 'Invalid input']);
    exit;
}

try {
    $result = evaluateMathExpression($input);
    echo json_encode(['result' => $result]);
} catch (Exception $e) {
    echo json_encode(['result' => 'Error: ' . $e->getMessage()]);
}

function evaluateMathExpression($expr) {
    $expr = str_replace(' ', '', strtolower($expr));

    while (preg_match('/([a-z]+)\(([^()]+)\)/', $expr, $match)) {
        $func = $match[1];
        $param = evaluateMathExpression($match[2]);
        $value = evaluateTrigFunction($func, $param);
        $expr = preg_replace('/' . preg_quote($match[0], '/') . '/', $value, $expr, 1);
    }

    return compute($expr);
}

function compute($expr) {
    while (preg_match('/\(([^()]+)\)/', $expr, $match)) {
        $inner = compute($match[1]);
        $expr = str_replace($match[0], $inner, $expr);
    }

    $expr = computeByOperators($expr, ['*', '/']);
    $expr = computeByOperators($expr, ['+', '-']);

    return $expr;
}

function computeByOperators($expr, $operators) {
    $pattern = '/(-?\d+\.?\d*)([\\' . implode('\\', $operators) . '])(-?\d+\.?\d*)/';
    while (preg_match($pattern, $expr, $match)) {
        [$full, $left, $op, $right] = $match;
        switch ($op) {
            case '*': $val = $left * $right; break;
            case '/':
                if ((float)$right == 0) throw new Exception("Division by zero");
                $val = $left / $right; break;
            case '+': $val = $left + $right; break;
            case '-': $val = $left - $right; break;
        }
        $expr = str_replace($full, $val, $expr);
    }
    return $expr;
}
?>
