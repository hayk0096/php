    <head>
        <title>Phone_item</title>
        <link rel="stylesheet" href="/public/css/style.css" />
    </head>
    <body>

    <a href="/registration"><h1>Please register</h1></a>

    <form action="/PhoneAdd" method="post">

        <table>
            <tr>
                <td>File upload</td>
                <td><input type="file" name="phoneImage" /></td>
            </tr>

            <tr>
                <td>Title</td>
                <td><input type="text" name="title" /></td>
            </tr>

            <tr>
                <td>Worth</td>
                <td><input type="text" name="price" /></td>
            </tr>

            <tr>
                <td>Description</td>
                <td><textarea name="description"></textarea></td>
            </tr>

            <tr>
                <td><input type="submit"/></td>
            </tr>
        </table>
    </form>

    </body>