<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKOOKYU</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #6c3ea4;
            color: white;
            padding: 10px;
            text-align: left;
            position: relative;
        }
        .header button {
            position: absolute;
            right: 10px;
            top: 10px;
            background-color: #c9c9f0;
            border: none;
            padding: 10px;
            border-radius: 5px;
        }
        .search-box {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .search-box input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .search-box input[type="submit"] {
            background-color: red;
            color: white;
            border: none;
            padding: 10px;
            margin-left: 5px;
            border-radius: 5px;
        }
        .products {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }
        .product {
            background-color: white;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            width: 200px;
        }
        .product img {
            width: 100%;
            border-radius: 5px;
        }
        .product p {
            margin: 10px 0;
            font-weight: bold;
        }
        .login {
            padding: 10px; /* Ruang di dalam tombol logout */
            background-color: #d9534f; /* Warna merah untuk logout */
            color: white; /* Warna teks putih */
            border: none; /* Menghilangkan border */
            border-radius: 5px; /* Membulatkan sudut */
            cursor: pointer; /* Menunjukkan kursor pointer */
        }
    </style>
</head>
<body>

    <div class="header">
        <h1><a href="Home.php">TOKOOKYU</a></h1>
        <form action="login.php" method="post">
            <button type="submit" class="login">LOGIN</button>
        </form>
    </div>

    <div class="search-box">
        <input type="text" placeholder="Search Here">
        <input type="submit"  value="Search">
    </div>

    <div class="products">
        <div class="product">
            <img src="kopi.jpeg" alt="Kopi">
            <p>RP. 20.000</p>
            <p>Kopi Mactha lalu</p>
        </div>
        <div class="product">
            <img src="makaroni.jpeg" alt="Makaroni">
            <p>RP. 20.000</p>
            <p>Makaroni</p>
        </div>
        <div class="product">
            <img src="nasi.jpeg" alt="Paket Nasi">
            <p>RP. 20.000</p>
            <p>Paket Nasi</p>
        </div>
    </div>

</body>
</html>
