<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manil Site</title>

    <style>
        /* ----------- RESET ----------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f4f7fb;
            color: #333;
        }

        /* ----------- HEADER ----------- */
        header {
            width: 100%;
            padding: 15px 40px;
            background: #0d6efd;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }

        header h1 {
            font-size: 24px;
            font-weight: 600;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: 0.3s;
            padding: 8px 15px;
            border-radius: 6px;
        }

        nav ul li a:hover {
            background: rgba(255,255,255,0.25);
        }

        /* ----------- HERO SECTION ----------- */
        .hero {
            width: 100%;
            padding: 80px 20px;
            text-align: center;
        }

        .hero h2 {
            font-size: 38px;
            color: #0d6efd;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            color: #555;
            max-width: 600px;
            margin: auto;
        }

        /* ----------- CARD ----------- */
        .card {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin-top: 25px;
        }

        .stat-box {
            padding: 20px;
            background: #eef5ff;
            border-radius: 10px;
            width: 30%;
        }

        .stat-box h3 {
            font-size: 26px;
            color: #0d6efd;
        }

        .stat-box p {
            margin-top: 5px;
            color: #666;
        }

        /* ----------- FOOTER ----------- */
        footer {
            margin-top: 60px;
            background: #0d6efd;
            color: white;
            text-align: center;
            padding: 20px 10px;
            font-size: 14px;
        }

    </style>
</head>

<body>

<header>
    <h1>Manil Site</h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>
