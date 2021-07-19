<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BransKuy | Tambah Paket Trip</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/tambah.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/all.min.js"></script>
    <script type="text/javascript" src="js/SimpleImage.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- script datepicker -->
    <!-- script datepicker -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <script>
    $(document).ready(function() {
        var date_input = $('input[name="myrosterdate"]'); //our date input has the name "myrosterdate"
        var container =
            $(".bootstrap-iso form").length > 0 ?
            $(".bootstrap-iso form").parent() :
            "body";
        var options = {
            multidate: true,
            format: " yyyy-mm-dd",
            container: container,
            todayHighlight: true,
            autoclose: false,
        };
        date_input.datepicker(options);
    });
    </script>
</head>

<body>
    <div class="container-background">
        <div class="container">
            <?php
// require 'config.php';
session_start();
if (isset($_POST["save"])) {
    tambah($_POST["save"]);
}
// echo date('Y-m-d H:i:s', strtotime('04-13-2018 0:00:53'));

// if( $input_date != null ){
//     $geburtsdatum = '"'.date("Y-m-d H:i:s",strtotime($input_date)).'"';
// } else {
//     $geburtsdatum = "NULL";
// }
?>
            <form action="" method="POST">
                <h2>Tambah Paket</h2>
                <div class="foto-header">
                    <div class="foto-utama">
                        <h5>Foto Utama</h5>
                        <div class="foto-header-atas">
                            <div class="canvas-back">
                                <canvas id="can" class="orangeback">
                                </canvas>
                                <div>
                                    <h6 id="text-back">Upload image</h6>
                                    <p>
                                        <input type="file" multiple="off" accept="image/*" id="fotoUtama"
                                            name="fotoUtama" onchange="load()" />
                                    </p>
                                </div>
                            </div>
                            <div class="canvas-text">
                                <h6>Foto Utama</h6>
                                <ul>
                                    <li>Format gambar : jpeg, png, dan jpg.</li>
                                    <li>Untuk gambar optimal gunakan ukuran minimum 700 x 700 pixels.</li>
                                </ul>
                                <h6>Foto Tambahan</h6>
                                <ul>
                                    <li>Format gambar : jpeg, png, dan jpg.</li>
                                    <li>Untuk gambar optimal gunakan ukuran minimum 800 x 800 pixels.</li>
                                </ul>
                            </div>
                        </div>
                        <h5>Foto Tambahan</h5>
                        <div id="preview" class="foto-preview">
                            <h6 id="text-back2">Upload image</h6>
                        </div>
                        <input id="file-input" name="file[]" type="file" multiple />
                    </div>
                </div>
                <div class="form-bawah">
                    <div class="form-container">
                        <label for="judul">
                            <h5>Judul<span class="red">*</span></h5>
                        </label>
                        <input type="text" class="judul" id="judul" name="judul"
                            placeholder="Contoh : Pendakian Gunung Semeru" maxlength="75" autocomplete="off">
                        <div id="count" style="font-family: Open Sans; font-size: 14px;">
                            <span id="current_count">0</span>
                            <span id="maximum_count">/ 75</span>
                        </div>
                    </div>
                    <div class="form-container">
                        <label for="lokasi">
                            <h5>Lokasi</h5>
                        </label>
                        <input type="text" class="judul" name="lokasi" id="lokasi"
                            placeholder="Contoh : Lumajang, Jawa Timur" autocomplete="off">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-plus"></i>Add Map
                        </button>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <div class="lok-input">
                                    <textarea name="lokasi_iframe" id="lokasi_iframe"
                                        placeholder="Salin kode HTML dari Google Maps disini. (optional)"
                                        autocomplete="off"></textarea>
                                    <img src="img/map-gif.gif" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-container">
                        <label for="biaya">
                            <h5>Biaya</h5>
                        </label>
                        <div class="form-biaya">
                            <input type="text" name="biaya" id="rupiah1" class="biaya" placeholder="Contoh : 1.900.000"
                                autocomplete="off" required>
                            <div class="tes">
                                <p>Rupiah</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-container">
                        <label for="provinsi">
                            <h5>Provinsi</h5>
                        </label>
                        <select name="provinsi" id="provinsi" required>
                            <option disabled selected value>-- Pilih Provinsi --</option>
                            <option value="Sumatra">Sumatra</option>
                            <option value="Banten">Banten</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Bali">Bali</option>
                            <option value="Kalimantan">Kalimantan</option>
                            <option value="Nusa Tenggara">Nusa Tenggara</option>
                            <option value="Maluku">Maluku</option>
                            <option value="Papua">Papua</option>
                        </select>
                    </div>
                    <div class="form-container">
                        <label for="group">
                            <h5>Group Whatsapp/Telegram/Line</h5>
                        </label>
                        <input type="text" class="judul" name="group" id="group" placeholder="Salin link group disini"
                            autocomplete="off">
                    </div>
                </div>
                <div class="form-bawah">
                    <div class="form-container">
                        <label for="kuota">
                            <h5>Kuota</h5>
                        </label>
                        <div class="form-biaya">
                            <input type="number" class="biaya" placeholder="Contoh : 100 orang" name="kuota" id="kuota"
                                autocomplete="off">
                            <div class="tes">
                                <p>Orang</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-container">
                        <label for="durasi">
                            <h5>Durasi</h5>
                        </label>
                        <div class="form-biaya">
                            <input type="number" class="biaya" name="durasi" id="durasi" autocomplete="off"
                                placeholder="Contoh : 6 hari">
                            <div class="tes">
                                <p>Hari</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-container">
                        <label for="tanggal">
                            <h5>Tanggal</h5>
                        </label>
                        <input class="form-control" id="myrosterdate" name="myrosterdate" placeholder="MM/DD/YYY"
                            type="text" autocomplete="off" />
                        <!-- <div class="form-group fieldGroup">
                            <div class="input-group">
                                <input type="date" name="tanggal" class="form-control" id="tanggal-input"
                                    autocomplete="off" placeholder="Tanggal" />
                                <a href="javascript:void(0)" class="btn btn-success addMore">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-group fieldGroupCopy">
                            <div class="input-group">
                                <input type="text" name="tanggal" class="form-control" id="tanggal-input" />
                                <div class="input-group-addon">
                                    <a href="javascript:void(0)" class="btn btn-danger remove">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-container">
                        <label for="meepo">
                            <h5>Meeting Point</h5>
                        </label>
                        <div class="form-groupa fieldGroupa">
                            <div class="input-group">
                                <input type="text" name="meepo[]" id="meepo[]" class="form-control"
                                    placeholder="Contoh : Stasiun Pasar Senen, Jakarta" />
                                <a href="javascript:void(0)" class="btn btn-success addMorel">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-groupa fieldGroupCopya" style="display: none">
                            <div class="input-group">
                                <input type="text" name="meepo[]" id="meepo[]" class="form-control"
                                    placeholder="Contoh : Stasiun Pasar Senen, Jakarta" />
                                <div class="input-group-addon">
                                    <a href="javascript:void(0)" class="btn btn-danger remove">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-bawah">
                    <div class="row-2">
                        <div class="form-container">
                            <label for="include">
                                <h5>Include</h5>
                            </label>
                            <div class="inc1">
                                <textarea name="include" id="include"></textarea>
                            </div>
                        </div>
                        <div class="form-container">
                            <label for="">
                                <h5>Exclude</h5>
                            </label>
                            <div class="inc2">
                                <textarea name="exclude" id="exclude"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-container">
                        <label for="deskripsi">
                            <h5>Deskripsi</h5>
                        </label>
                        <div class="inc3">
                            <textarea name="deskripsi" id="deskripsi"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-bawah">
                    <div class="form-container">
                        <label for="peraturan">
                            <h5>Peraturan</h5>
                        </label>
                        <div class="inc3">
                            <textarea name="peraturan" id="peraturan"></textarea>
                        </div>
                    </div>
                    <div class="form-container">
                        <label for="jadwal">
                            <h5>Itinerary</h5>
                        </label>
                        <div class="form-group fieldGroup">
                            <div class="input-group">
                                <div class="input-group-column">
                                    <input type="text" name="jadwal[]" class="form-control" autocomplete="off"
                                        placeholder="Contoh: Day 1" />
                                    <textarea name="jadwal_text[]" id="jadwal"></textarea>
                                </div>
                                <div class="tombol">
                                    <a href="javascript:void(0)" class="btn btn-success addMore">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group fieldGroupCopy" style="display: none;">
                            <div class="input-group">
                                <div class="input-group-column">
                                    <input type="text" name="jadwal[]" class="form-control"
                                        placeholder="Contoh: Day 1" />
                                    <textarea name="jadwal_text[]" id="jadwal1"></textarea>
                                </div>
                                <div class="tombol">
                                    <div class="input-group-addon">
                                        <a href="javascript:void(0)" class="btn btn-danger remove">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-button">
                    <a href="myprofile.php">
                        <div class="cancel">Cancel</div>
                    </a>
                    <button type="submit" id="save" name="save" value="save" class="button">Save & Publish</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
    $("#judul").keyup(function() {
        var characterCount = $(this).val().length,
            current_count = $("#current_count"),
            maximum_count = $("#maximum_count"),
            count = $("#count");
        current_count.text(characterCount);
    });
    </script>
    <script src="js/ckeditor.js"></script>
    <script>
    ClassicEditor.create(document.querySelector("#deskripsi"))
        .then((editor) => {
            window.editor = editor;
        })
        .catch((error) => {
            console.error("There was a problem initializing the editor.", error);
        });
    ClassicEditor.create(document.querySelector("#peraturan"))
        .then((editor) => {
            window.editor = editor;
        })
        .catch((error) => {
            console.error("There was a problem initializing the editor.", error);
        });
    ClassicEditor.create(document.querySelector("#include"), {
        alignment: {
            options: ['left', 'right']
        },
        toolbar: [
            'heading', '|', 'bulletedList', 'numberedList', 'undo', 'redo'
        ]
    });
    ClassicEditor.create(document.querySelector("#exclude"), {
        alignment: {
            options: ['left', 'right']
        },
        toolbar: [
            'heading', '|', 'bulletedList', 'numberedList', 'alignment', 'undo', 'redo'
        ]
    });
    ClassicEditor.create(document.querySelector("#jadwal"), {
        alignment: {
            options: ['left', 'right']
        },
        toolbar: [
            'heading', '|', 'bulletedList', 'numberedList', 'alignment', 'undo', 'redo'
        ]
    });
    ClassicEditor.create(document.querySelector("#jadwal1"), {
        alignment: {
            options: ['right']
        },
        toolbar: [
            'heading', '|', 'bulletedList', 'numberedList', 'alignment', 'undo', 'redo'
        ]
    });
    </script>
    <script>
    function load() {
        var imagecanvas = document.getElementById("can");
        var fileinput = document.getElementById("fotoUtama");
        var image = new SimpleImage(fileinput);
        var text = document.getElementById("text-back");
        image.drawTo(imagecanvas);
        imagecanvas.style.border = "2px solid rgb(255, 68, 0)"
        if (image != null) {
            text.style.display = "none";
        }
    };

    function previewImages() {
        var preview = document.querySelector("#preview");

        if (this.files) {
            [].forEach.call(this.files, readAndPreview);
        }

        function readAndPreview(file) {
            // Make sure `file.name` matches our extensions criteria
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } // else...

            var reader = new FileReader();

            reader.addEventListener("load", function() {
                var text = document.getElementById("text-back2");
                var image = new Image();
                image.style.border = "2px solid rgb(255, 68, 0)"
                if (image != null) {
                    text.style.display = "none";
                }
                image.height = 150;
                image.width = 195;
                image.title = file.name;
                image.src = this.result;
                preview.appendChild(image);
            });

            reader.readAsDataURL(file);
        }
    };
    document.querySelector("#file-input").addEventListener("change", previewImages);
    </script>
    <script>
    $(document).ready(function() {
        // membatasi jumlah inputan
        var maxGroup = 10;

        //melakukan proses multiple input
        $(".addMore").click(function() {
            if ($("body").find(".fieldGroup").length < maxGroup) {
                var fieldHTML =
                    '<div class="form-group fieldGroup">' +
                    $(".fieldGroupCopy").html() +
                    "</div>";
                $("body").find(".fieldGroup:last").after(fieldHTML);
            } else {
                alert("Maximum " + maxGroup + " groups are allowed.");
            }
        });

        //remove fields group
        $("body").on("click", ".remove", function() {
            $(this).parents(".fieldGroup").remove();
        });
    });
    $(document).ready(function() {
        // membatasi jumlah inputan
        var maxGroup = 10;

        //melakukan proses multiple input
        $(".addMorel").click(function() {
            if ($("body").find(".fieldGroupa").length < maxGroup) {
                var fieldHTML =
                    '<div class="form-groupa fieldGroupa">' +
                    $(".fieldGroupCopya").html() +
                    "</div>";
                $("body").find(".fieldGroupa:last").after(fieldHTML);
            } else {
                alert("Maximum " + maxGroup + " groups are allowed.");
            }
        });

        //remove fields group
        $("body").on("click", ".remove", function() {
            $(this).parents(".fieldGroupa").remove();
        });
    });
    </script>
    <script type="text/javascript">
    var rupiah1 = document.getElementById("rupiah1");
    rupiah1.addEventListener("keyup", function(e) {
        rupiah1.value = convertRupiah(this.value);
    });

    function convertRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
    }
    </script>
    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
    </script>
</body>

</html>