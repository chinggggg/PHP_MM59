<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form name="form1" onsubmit="saveData();return false">
        <input type="text" name="name" placeholder="姓名">
        <br><br>
        <textarea name="content" col="30" rows="3"></textarea>
        <input type="submit">
    </form>

    <script>
        function saveData() {
            const data = {
                name: document.form1.name.value,
                content: document.form1.content.value,
            }
            localStorage.setItem('mydata', JSON.stringify(data));
            alert('ok');
        }
    </script>
</body>

</html>