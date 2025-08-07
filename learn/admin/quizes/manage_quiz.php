<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Manage Quiz</h2>
    <form id="addQuestionForm" action="add_question.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="quiz_id" id="quizId" value="">
        <div class="form-group">
            <label for="question">Question:</label>
            <textarea id="question" name="question" required></textarea>
        </div>
        <div class="form-group">
            <label for="question_image">Question Image:</label>
            <input type="file" id="question_image" name="question_image" accept="image/*">
        </div>
        <div class="form-group">
            <label for="option_1">Option 1:</label>
            <input type="text" id="option_1" name="option_1" required>
        </div>
        <div class="form-group">
            <label for="option_2">Option 2:</label>
            <input type="text" id="option_2" name="option_2" required>
        </div>
        <div class="form-group">
            <label for="option_3">Option 3:</label>
            <input type="text" id="option_3" name="option_3">
        </div>
        <div class="form-group">
            <label for="option_4">Option 4:</label>
            <input type="text" id="option_4" name="option_4">
        </div>
        <div class="form-group">
            <label for="correct_option">Correct Option:</label>
            <select id="correct_option" name="correct_option" required>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit">Add Question</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var urlParams = new URLSearchParams(window.location.search);
    var quizId = urlParams.get('id');
    document.getElementById('quizId').value = quizId;
});
</script>

</body>
</html>
