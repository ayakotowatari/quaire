<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- navbar -->
<div class="navigation">
        <i id="home" class="fas fa-home"></i>
        <ul class="flex">
            <li class="logged-in" style="display: none;">
                <a href="#" id="logout" class="nav-item">Logout</a>
            </li>
            <!-- <li class="admin">
                <a href="" id="create-event" class="nav-item">Create Event</a>
            </li> -->
            <li class="logged-out" style="display: none;">
                <a href="#modal-login" id="login" class="nav-item modal-trigger">Login</a>
            </li>
            <li class="logged-out" style="display: none;">
                <a href="#modal-signup" id="signup" class="nav-item modal-trigger">Sign up</a>
            </li>
        </ul>
</div>

<!-- form -->
<div class="wrapper">
    <div class="row">
        <form class="col s12" action="result.php" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder= "Name" type="text" name="name" class="validate">
                    <label for="name">Name</label>
                </div>
                <div class="input-field col s6">
                    <input type="email" name="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <label for="country">Country of residence</label>
                    <input type="text" name="country" size="20">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="destination" id="destination">
                        <option value="" disabled selected>Choose your destination</option>
                        <option value="1">UK</option>
                        <option value="2">USA</option>
                        <option value="3">Australia</option>
                        <option value="4">Canada</option>
                        <option value="5">New Zealand</option>
                        <option value="6">Japan</option>
                    </select>
                    <label for="destination">Study destinations</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="study-level" id="study-level">
                        <option value="" disabled selected>Choose study level</option>
                        <option value="1">Undergraduate</option>
                        <option value="2">Postgraduate</option>
                        <option value="3">MBA</option>
                    </select>
                    <label for="study-level">Level of study</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="subject" id="subject">
                        <option value="" disabled selected>Choose your subject area</option>
                        <option value="1">Agricultural Studies</option>
                        <option value="2">Architecture, Building and Urban Planning</option>
                        <option value="3">Computer and Mathematical Sciences</option>
                        <option value="4">Education and Training</option>
                        <option value="5">Science and Engineering</option>
                        <option value="6">Health and Medicine</option>
                        <option value="7">MBA</option>
                        <option value="8">Social Science and Communications</option>
                        <option value="9">Applied and Pure Sciences</option>
                        <option value="10">Business and Administrations</option>
                        <option value="11">Art and Design</option>
                        <option value="12">English as Foreign Language</option>
                        <option value="13">Legal Studies</option>
                        <option value="14">Arts and Humanities</option>
                        <option value="15">Travel, Tourism and Hospitality</option>
                    </select>
                    <label for="subject">Subject area</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="year" id="year">
                        <option value="" disabled selected>Choose year</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                    <label for="year">When are you planning to start your study?</label>
                </div>
            </div>
            <button id="btnS">Submit</button>
        </form>
    </div>
</div>

<footer class="footer">

<small>&copy; Out And Reach 2020</small>


</footer>

<!-- Materialize.js for form -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = document.querySelectorAll("option");
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
        });
    </script>
</body>
</html>