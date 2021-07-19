<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Hoster</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/hoster.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="back-button">
        <div class="back-container" onclick="history.back()" title="Back">
            <img src="img/back-icon.svg" alt="">
        </div>
    </div>
    <?php
require 'config.php';
if (isset($_POST["daftar_hoster"])) {
    if (registrasi_hoster($_POST) > 0) {
    } else {
        echo mysqli_error($conn);
    }
}
?>
    <div class="container">
        <div class="container-form">
            <div class="overlay">
                <div class="progress-bar">
                    <div class="step">
                        <p>About</p>
                        <div class="bullet">
                            <span>1</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Address</p>
                        <div class="bullet">
                            <span>2</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Upload</p>
                        <div class="bullet">
                            <span>3</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                </div>
                <div class="form-outer">
                    <form action="#" method="post">
                        <div class="page slide-page">
                            <div class="field">
                                <label for="fullname" class="label">Nama Hoster</label>
                                <input type="text" name="fullname" id="fullname" placeholder="Enter your full name" />
                            </div>
                            <div class="field">
                                <label for="username" class="label">Username</label>
                                <input type="text" name="username" id="username" placeholder="Enter your username" />
                            </div>
                            <div class="field">
                                <label for="email" class="label">Email</label>
                                <input type="text" name="email" id="email" placeholder="Enter your email" />
                            </div>
                            <div class="field">
                                <label for="password" class="label">Password</label>
                                <input type="password" name="password" id="password"
                                    placeholder="Enter your password" />
                            </div>
                            <div class="field">
                                <label for="phoneNumber" class="label">Phone number</label>
                                <input type="text" name="phoneNumber" id="phoneNumber"
                                    placeholder="Enter your phone number" />
                            </div>
                            <div class="tombol">
                                <div class="field">
                                    <button class="firstNext next">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="page">
                            <div class="field">
                                <label for="address" class="label">Address</label>
                                <input type="text" name="address" id="address" placeholder="Enter your address" />
                            </div>
                            <div class="field">
                                <label for="country" class="label">Country</label>
                                <select name="country" id="country" class="selectpicker countrypicker"
                                    data-live-search="true"></select>
                            </div>
                            <div class="field">
                                <label for="city" class="label">City</label>
                                <input type="text" name="city" id="city" placeholder="Enter your city" />
                            </div>
                            <div class="field">
                                <label for="province" class="label">Province</label>
                                <input type="text" name="province" id="province" placeholder="Enter your province" />
                            </div>
                            <div class="field">
                                <label for="zipCode" class="label">Zip Code</label>
                                <input type="text" name="zipCode" id="zipCode" placeholder="Enter your zip code" />
                            </div>
                            <div class="field btns">
                                <button class="prev-1 prev">Back</button>
                                <button class="next-1 next">Next</button>
                            </div>
                        </div>
                        <div class="page">
                            <div class="field">
                                <label for="idCard" class="label">Id Card</label>
                                <input type="file" name="idCard" id="idCard" />
                            </div>
                            <div class="field">
                                <label for="photo" class="label">Photo Passport</label>
                                <input type="file" name="photo" id="photo" />
                            </div>
                            <div class="field">
                                <label for="bank" class="label">Bank</label>
                                <select name="bank" id="bank">
                                    <option>-- Pilih Bank --</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="MANDIRI">Mandiri</option>
                                    <option value="BCA">BCA</option>
                                </select>
                            </div>
                            <div class="field">
                                <label for="accountNumber" class="label">Account number</label>
                                <input type="number" name="accountNumber" id="accountNumber"
                                    placeholder="Enter your account number" />
                            </div>
                            <div class="field">
                                <label for="accountBook" class="label">Account Book</label>
                                <input type="file" name="accountBook" id="accountBook" />
                            </div>
                            <div class="field btns">
                                <button class="prev-2 prev">Back</button>
                                <button class="submit" type="submit" name="daftar_hoster">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Somehow I got an error, so I comment the script tag, just uncomment to use -->
    <!-- <script src="script.js"></script> -->
    <script src="js/form-step.js"></script>
    <script src="js/bootstrap-select-country.min.js"></script>
</body>

</html>