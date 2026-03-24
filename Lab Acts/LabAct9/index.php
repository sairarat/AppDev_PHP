<?php
include('database.php');

$stmt = $pdo->prepare('SELECT * FROM pets');
$stmt->execute();
$pets = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Information System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        /* ── General ── */
        * { box-sizing: border-box; }

        body {
            padding-top: 50px;   
            padding-bottom: 50px;
        }

        /* ── Sections ── */
        section {
            min-height: 100vh;
            padding: 60px 40px;
        }

        /* ── Top Navbar ── */
        .navbar-top {
            background-color: #2c3e50;
            border: none;
            border-radius: 0;
        }
        .navbar-top .navbar-brand {
            color: #fff !important;
            font-weight: bold;
            font-size: 20px;
        }
        .navbar-top .nav > li > a {
            color: #ccc !important;
            font-size: 15px;
        }
        .navbar-top .nav > li > a:hover,
        .navbar-top .nav > li.active > a {
            color: #fff !important;
            background-color: #e74c3c !important;
        }

        /* ── Bottom Navbar ── */
        .navbar-bottom {
            background-color: #1a252f;
            border: none;
            border-radius: 0;
            min-height: 40px;
        }
        .navbar-bottom .nav > li > a {
            color: #aaa !important;
            font-size: 13px;
            padding: 10px 15px;
        }
        .navbar-bottom .nav > li > a:hover {
            color: #fff !important;
            background-color: transparent !important;
        }
        .navbar-bottom p {
            color: #777;
            font-size: 12px;
            margin: 12px 15px;
        }

        /* ── HOME section ── */
        #home {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        #home h1 {
            font-size: 56px;
            font-weight: bold;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.3);
        }
        #home p {
            font-size: 20px;
            margin-top: 15px;
            opacity: 0.9;
        }
        #home .btn-home {
            margin-top: 30px;
            background: #fff;
            color: #e74c3c;
            font-weight: bold;
            border: none;
            padding: 12px 35px;
            font-size: 16px;
            border-radius: 30px;
        }
        #home .btn-home:hover {
            background: #f0f0f0;
        }

        /* ── ABOUT section ── */
        #about {
            background-color: #ecf0f1;
            display: flex;
            align-items: center;
        }
        #about h2 {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 20px;
        }
        #about p {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
        }
        .about-icon {
            font-size: 80px;
            color: #e74c3c;
            text-align: center;
        }

        /* ── PETS / Products section ── */
        #products {
            background-color: #fff;
        }
        #products h2 {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .section-divider {
            width: 60px;
            height: 4px;
            background: #e74c3c;
            margin: 10px 0 30px 0;
            border-radius: 2px;
        }
        .content-box {
            background: #f9f9f9;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        .table > tbody > tr > td {
            vertical-align: middle;
        }
        .table thead tr th {
            background-color: #2c3e50;
            color: #fff;
        }

        /* ── CONTACT section ── */
        #contact {
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            align-items: center;
        }
        #contact h2 {
            font-weight: bold;
            margin-bottom: 10px;
            color: #fff;
        }
        #contact p {
            font-size: 15px;
            color: #bdc3c7;
            line-height: 1.8;
        }
        #contact .glyphicon {
            color: #e74c3c;
            margin-right: 8px;
        }
        #contact .contact-card {
            background: #34495e;
            border-radius: 8px;
            padding: 25px;
            margin-top: 20px;
        }
        #contact .contact-item {
            margin-bottom: 15px;
            font-size: 15px;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".navbar-top" data-offset="60">

    <!-- ══════════════ TOP NAVBAR ══════════════ -->
    <nav class="navbar navbar-top navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#home">
                    <span class="glyphicon glyphicon-heart"></span> PetDB
                </a>
            </div>
            <div class="collapse navbar-collapse" id="top-nav">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#products">Our Pets</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ══════════════ HOME ══════════════ -->
    <section id="home">
        <div class="container">
            <div class="glyphicon glyphicon-heart" style="font-size:70px; opacity:0.4;"></div>
            <h1>Welcome to PetDB</h1>
            <p>Your one-stop system for managing and exploring pet information.</p>
            <a href="#products" class="btn btn-home">
                <span class="glyphicon glyphicon-search"></span> Browse Pets
            </a>
        </div>
    </section>

    <!-- ══════════════ ABOUT ══════════════ -->
    <section id="about">
        <div class="container">
            <div class="row" style="align-items: center; display: flex; flex-wrap: wrap;">
                <div class="col-md-3 hidden-sm hidden-xs">
                    <div class="about-icon">
                        <span class="glyphicon glyphicon-leaf"></span>
                    </div>
                </div>
                <div class="col-md-9">
                    <h2>About Us</h2>
                    <div class="section-divider"></div>
                    <p>
                        <strong>PetDB</strong> is a simple and intuitive pet information management system
                        built with PHP and Bootstrap. Our goal is to help pet owners, shelters, and
                        enthusiasts keep track of their beloved animals in one organized place.
                    </p>
                    <p>
                        With PetDB, you can add new pets, update their details, view their profiles,
                        and remove records — all through a clean and responsive interface.
                        Every pet deserves to be remembered. 🐾
                    </p>
                    <p>
                        <span class="label label-danger">PHP</span>&nbsp;
                        <span class="label label-primary">PDO</span>&nbsp;
                        <span class="label label-success">Bootstrap 3</span>&nbsp;
                        <span class="label label-warning">MySQL</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ PETS (Products) ══════════════ -->
    <section id="products">
        <div class="container">
            <h2><span class="glyphicon glyphicon-heart"></span> Our Pets</h2>
            <div class="section-divider"></div>

            <div class="content-box">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-6">
                        <p class="text-muted" style="margin:0; line-height: 34px;">
                            <?= count($pets) ?> pet(s) currently registered.
                        </p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="create.php" class="btn btn-danger">
                            <span class="glyphicon glyphicon-plus"></span> Add New Pet
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:12%; text-align:center;">Photo</th>
                                <th style="width:18%;">Pet Name</th>
                                <th style="width:14%;">Species</th>
                                <th style="width:16%;">Breed</th>
                                <th style="width:10%;">Age</th>
                                <th style="width:30%;">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pets as $pet): ?>
                            <tr>
                                <td class="text-center">
                                    <?php if ($pet['petPhoto']): ?>
                                        <img src="uploads/<?= htmlspecialchars($pet['petPhoto']) ?>"
                                             class="img-thumbnail"
                                             style="width: 75px; height: auto;" alt="Photo">
                                    <?php else: ?>
                                        <span class="text-muted"><i>No Photo</i></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="selected.php?id=<?= $pet['id'] ?>">
                                        <strong><?= htmlspecialchars($pet['petName']) ?></strong>
                                    </a>
                                </td>
                                <td><?= htmlspecialchars($pet['species']) ?></td>
                                <td><?= htmlspecialchars($pet['breed']) ?></td>
                                <td><?= htmlspecialchars($pet['age']) ?></td>
                                <td><?= htmlspecialchars($pet['descriptions']) ?></td>
                            </tr>
                            <?php endforeach; ?>

                            <?php if (empty($pets)): ?>
                            <tr>
                                <td colspan="6" class="text-center" style="padding: 40px; color: #aaa;">
                                    <span class="glyphicon glyphicon-inbox" style="font-size:40px;"></span><br><br>
                                    No pets found. Click <strong>"Add New Pet"</strong> to get started!
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

    <!-- ══════════════ CONTACT ══════════════ -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Contact Us</h2>
                    <div class="section-divider"></div>
                    <p>
                        Have questions about PetDB or want to report an issue?
                        We'd love to hear from you. Reach out through any of the
                        channels below and we'll get back to you as soon as possible.
                    </p>
                    <p>
                        Whether you're a pet owner, shelter volunteer, or just a
                        curious visitor — our team is always happy to help. 🐾
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="contact-card">
                        <div class="contact-item">
                            <span class="glyphicon glyphicon-envelope"></span>
                            <strong>Email:</strong> petdb@example.com
                        </div>
                        <div class="contact-item">
                            <span class="glyphicon glyphicon-phone"></span>
                            <strong>Phone:</strong> +63 912 345 6789
                        </div>
                        <div class="contact-item">
                            <span class="glyphicon glyphicon-map-marker"></span>
                            <strong>Address:</strong> Quezon City, Metro Manila, Philippines
                        </div>
                        <div class="contact-item">
                            <span class="glyphicon glyphicon-time"></span>
                            <strong>Hours:</strong> Mon – Fri, 8:00 AM – 5:00 PM
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav class="navbar navbar-bottom navbar-fixed-bottom">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#products">Our Pets</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
            <p class="navbar-text navbar-right" style="color:#666; font-size:12px;">
                &copy; <?= date('Y') ?> PetDB &mdash; All rights reserved.
            </p>
        </div>
    </nav>

</body>
</html>