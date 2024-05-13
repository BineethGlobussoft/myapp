<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Calculator</title>
</head>
<body>
    <h2>Simple PHP Calculator</h2>
    <?php
    // Check if form is submitted
    if (isset($_POST['calculate'])) {
        // Retrieve form data
        $num1 = $_POST['num1'];
        $operator = $_POST['operator'];
        $num2 = $_POST['num2'];

        // Validate input
        if (is_numeric($num1) && is_numeric($num2)) {
            // Perform calculation based on operator
            switch ($operator) {
                case '+':
                    $result = $num1 + $num2;
                    break;
                case '-':
                    $result = $num1 - $num2;
                    break;
                case '*':
                    $result = $num1 * $num2;
                    break;
                case '/':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = 'Cannot divide by zero!';
                    }
                    break;
                default:
                    $result = 'Invalid operator';
                    break;
            }

            // Display result
            echo "<p>Result: $num1 $operator $num2 = $result</p>";
        } else {
            echo "<p>Please enter valid numeric values.</p>";
        }
    }
    ?>
    <a href="index.php">Back to Calculator</a>
</body>
</html>

ubuntu@ip-172-31-58-91:/var/www/html$ cat index.php 
<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Calculator</title>
</head>
<body>
    <h2>Simple PHP Calculator</h2>
    <form method="post" action="calculate.php">
        <input type="text" name="num1" placeholder="Enter number 1" required>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="num2" placeholder="Enter number 2" required>
        <button type="submit" name="calculate">Calculate</button>
    </form>
</body>
</html>

