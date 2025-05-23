<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    $input = $_POST['expression'] ?? '';

    if (!preg_match('/^[0-9+\-*\/(). ]+$/', $input)) {
        echo json_encode(['result' => 'Invalid input']);
        exit;
    }

    try {
        $result = evaluateMathExpression($input);
        echo json_encode(['result' => $result]);
    } catch (Exception $e) {
        echo json_encode(['result' => 'Error']);
    }

    function evaluateMathExpression($expr) {
        $expr = str_replace(' ', '', $expr);
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





