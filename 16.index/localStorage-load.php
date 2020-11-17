<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form name="form1" onsubmit="return false">
        <input type="text" name="name" readonly>
        <br><br>
        <textarea name="content" col="30" rows="3" readonly></textarea>
        <input type="submit">
    </form>

    <script>
        let data = localStorage.setItem('mydata');

        if (data) {
            try {
                data = JSON.parse(data);
            } catch (ex) {
                data = {
                    name: '',
                    content: ''
                }
            }
            document.form1.name.value = data.name;
            document.form1.content.value = data.content;
        }
        
    </script>
</body>

</html>