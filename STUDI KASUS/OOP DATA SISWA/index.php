<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>DATA SISWA</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .btn {
            border-radius: 5px;
        }

        .data-display {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .data-display table {
            width: 100  %;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .data-display th,
        .data-display td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-display th {
            background-color: #f2f2f2;
        }

        .data-display .btn {
            margin-left: 10px;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            .data-display,
            .data-display * {
                visibility: visible;
            }

            .data-display {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>
    <script>
        function printData() {
            window.print();
        }
    </script>
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card text-center">
                    <div class="card-body">
                        <h1>DATA SISWA</h1>
                        <?php
                        session_start();

                        
                        if (!isset($_SESSION['dataSiswa'])) {
                            $_SESSION['dataSiswa'] = array();
                        }

                        
                        $editMode = false;
                        $editIndex = null;

                        if (isset($_GET['edit'])) {
                            $editMode = true;
                            $editIndex = $_GET['edit'];
                            $editData = $_SESSION['dataSiswa'][$editIndex];
                        }

                        if (isset($_POST["kirim"])) {
                            if ($_POST['nama'] != "" && $_POST['nis'] != "" && $_POST['rayon'] != "") {
                                $siswa = array(
                                    "nama" => $_POST['nama'],
                                    "nis" => $_POST['nis'],
                                    "rayon" => $_POST['rayon']
                                );

                                if ($editMode) {
                                    $_SESSION['dataSiswa'][$editIndex] = $siswa;
                                } else {
                                    array_push($_SESSION['dataSiswa'], $siswa);
                                }

                                header('location: ' . $_SERVER['PHP_SELF']);
                                exit;
                            } else {
                                echo "Data tidak boleh kosong <br>";
                            }
                        }

                        if (isset($_GET['reset'])) {
                            $_SESSION['dataSiswa'] = array();
                            header('location: ' . $_SERVER['PHP_SELF']);
                            exit;
                        }

                        if (isset($_GET['hapus'])) {
                            $key = $_GET['hapus'];
                            unset($_SESSION['dataSiswa'][$key]);
                            $_SESSION['dataSiswa'] = array_values($_SESSION['dataSiswa']);
                            header('location: ' . $_SERVER['PHP_SELF']);
                            exit;
                        }
                        ?>
                        <form action="" method="POST" class="row d-flex align-items-center">
                            <label for="nama">Nama Siswa</label>
                            <input type="text" id="nama" placeholder="masukan nama siswa" name="nama" class="form-control"
                                value="<?php echo $editMode ? $editData['nama'] : ''; ?>">

                            <label for="nis">NIS Siswa</label>
                            <input type="number" id="nis" placeholder="masukan nis siswa" name="nis" class="form-control"
                                value="<?php echo $editMode ? $editData['nis'] : ''; ?>">

                            <label for="rayon" class="form-label">Pilih Rayon</label>
                            <select name="rayon" id="rayon" class="form-select" required>
                                <option value="default" disabled <?php echo $editMode ? '' : 'selected'; ?>>Pilih Rayonmu
                                </option>
                                <optgroup label="Tajur">
                                    <option value="Tajur 1" <?php echo $editMode && $editData['rayon'] == 'Tajur 1' ? 'selected' : ''; ?>>
                                        Tajur 1
                                    </option>
                                    <option value="Tajur 2" <?php echo $editMode && $editData['rayon'] == 'Tajur 2' ? 'selected' : ''; ?>>
                                        Tajur 2
                                    </option>
                                    <option value="Tajur 3" <?php echo $editMode && $editData['rayon'] == 'Tajur 3' ? 'selected' : ''; ?>>
                                        Tajur 3
                                    </option>
                                    <option value="Tajur 4" <?php echo $editMode && $editData['rayon'] == 'Tajur 4' ? 'selected' : ''; ?>>
                                        Tajur 4
                                    </option>
                                    <option value="Tajur 5" <?php echo $editMode && $editData['rayon'] == 'Tajur 5' ? 'selected' : ''; ?>>
                                        Tajur 5
                                    </option>
                                    <option value="Tajur 6" <?php echo $editMode && $editData['rayon'] == 'Tajur 6' ? 'selected' : ''; ?>>
                                        Tajur 6
                                    </option>
                                </optgroup>
                                <optgroup label="Sukasari">
                                    <option value="Sukasari 1" <?php echo $editMode && $editData['rayon'] == 'Tajur 1' ? 'selected' : ''; ?>>
                                      Sukasari 1
                                    </option>
                                    <option value="Sukasari 2" <?php echo $editMode && $editData['rayon'] == 'Tajur 2' ? 'selected' : ''; ?>>
                                    Sukasari 2
                                    </option>
                                </optgroup>
                                <optgroup label="Cibedug">
                                    <option value="Cibedug 1" <?php echo $editMode && $editData['rayon'] == 'Tajur 1' ? 'selected' : ''; ?>>
                                    Cibedug 1
                                    </option>
                                    <option value="Cibedug 2" <?php echo $editMode && $editData['rayon'] == 'Tajur 2' ? 'selected' : ''; ?>>
                                    Cibedug 2
                                    </option>
                                    <option value="Cibedug 3" <?php echo $editMode && $editData['rayon'] == 'Tajur 2' ? 'selected' : ''; ?>>
                                    Cibedug 3
                                    </option>
                                    <option value="Cibedug 4" <?php echo $editMode && $editData['rayon'] == 'Tajur 2' ? 'selected' : ''; ?>>
                                    Cibedug 4
                                    </option>
                                </optgroup>
                                <optgroup label="Cicurug">
                                    <option value="Cicurug 1" <?php echo $editMode && $editData['rayon'] == 'Tajur 1' ? 'selected' : ''; ?>>
                                        Cicurug 1
                                    </option>
                                    <option value="Cicurug 2" <?php echo $editMode && $editData['rayon'] == 'Tajur 2' ? 'selected' : ''; ?>>
                                        Cicurug 2
                                    </option>
                                    <option value="Cicurug 3" <?php echo $editMode && $editData['rayon'] == 'Tajur 3' ? 'selected' : ''; ?>>
                                        Cicurug 3
                                    </option>
                                    <option value="Cicurug 4" <?php echo $editMode && $editData['rayon'] == 'Tajur 4' ? 'selected' : ''; ?>>
                                        Cicurug 4
                                    </option>
                                    <option value="Cicurug 5" <?php echo $editMode && $editData['rayon'] == 'Tajur 5' ? 'selected' : ''; ?>>
                                        Cicurug 5
                                    </option>
                                    <option value="Cicurug 6" <?php echo $editMode && $editData['rayon'] == 'Tajur 6' ? 'selected' : ''; ?>>
                                        Cicurug 6
                                    </option>
                                    <option value="Cicurug 7" <?php echo $editMode && $editData['rayon'] == 'Tajur 6' ? 'selected' : ''; ?>>
                                        Cicurug 7
                                    </option>
                                    <option value="Cicurug 8" <?php echo $editMode && $editData['rayon'] == 'Tajur 6' ? 'selected' : ''; ?>>
                                        Cicurug 8
                                    </option>
                                    <option value="Cicurug 9" <?php echo $editMode && $editData['rayon'] == 'Tajur 6' ? 'selected' : ''; ?>>
                                        Cicurug 9
                                    </option>
                                    <option value="Cicurug 10" <?php echo $editMode && $editData['rayon'] == 'Tajur 6' ? 'selected' : ''; ?>>
                                        Cicurug 10
                                    </option>''
                                </optgroup>
                                <optgroup label="Ciawi">
                                    <option value="Ciawi 1" <?php echo $editMode && $editData['rayon'] == 'Tajur 1' ? 'selected' : ''; ?>>
                                        Ciawi 1
                                    </option>
                                    <option value="Ciawi 2" <?php echo $editMode && $editData['rayon'] == 'Tajur 2' ? 'selected' : ''; ?>>
                                        Ciawi 2
                                    </option>
                                    <option value="Ciawi 3" <?php echo $editMode && $editData['rayon'] == 'Tajur 3' ? 'selected' : ''; ?>>
                                        Ciawi 3
                                    </option>
                                    <option value="Ciawi 4" <?php echo $editMode && $editData['rayon'] == 'Tajur 4' ? 'selected' : ''; ?>>
                                        Ciawi 4
                                    </option>
                                    <option value="Ciawi 5" <?php echo $editMode && $editData['rayon'] == 'Tajur 5' ? 'selected' : ''; ?>>
                                        Ciawi 5
                                    </option>
                                    <option value="Ciawi 6" <?php echo $editMode && $editData['rayon'] == 'Tajur 6' ? 'selected' : ''; ?>>
                                        Ciawi 6
                                    </option>
                                </optgroup>
                                <optgroup label="Wikrama">
                                    <option value="Wikrama 1" <?php echo $editMode && $editData['rayon'] == 'Tajur 1' ? 'selected' : ''; ?>>
                                    Wikrama 1
                                    </option>
                                    <option value="Wikrama 2" <?php echo $editMode && $editData['rayon'] == 'Tajur 2' ? 'selected' : ''; ?>>
                                    Wikrama 2
                                    </option>
                                    <option value="Wikrama 3" <?php echo $editMode && $editData['rayon'] == 'Tajur 3' ? 'selected' : ''; ?>>
                                    Wikrama 3
                                    </option>
                                    <option value="Wikrama 4" <?php echo $editMode && $editData['rayon'] == 'Tajur 4' ? 'selected' : ''; ?>>
                                    Wikrama 4
                                    </option>
                                    <option value="Wikrama 5" <?php echo $editMode && $editData['rayon'] == 'Tajur 5' ? 'selected' : ''; ?>>
                                    Wikrama 5
                                    </option>
                                   
                                </optgroup>
                                <optgroup label="Cisarua">
                                    <option value="Cisarua 1" <?php echo $editMode && $editData['rayon'] == 'Tajur 1' ? 'selected' : ''; ?>>
                                        Cisarua 1
                                    </option>
                                    <option value="Cisarua 2" <?php echo $editMode && $editData['rayon'] == 'Tajur 2' ? 'selected' : ''; ?>>
                                    Cisarua 2
                                    </option>
                                    <option value="Cisarua 3" <?php echo $editMode && $editData['rayon'] == 'Tajur 3' ? 'selected' : ''; ?>>
                                    Cisarua 3
                                    </option>
                                    <option value="Cisarua 4" <?php echo $editMode && $editData['rayon'] == 'Tajur 4' ? 'selected' : ''; ?>>
                                    Cisarua 4
                                    </option>
                                    <option value="Cisarua 5" <?php echo $editMode && $editData['rayon'] == 'Tajur 5' ? 'selected' : ''; ?>>
                                    Cisarua 5
                                    </option>
                                    <option value="Cisarua 6" <?php echo $editMode && $editData['rayon'] == 'Tajur 6' ? 'selected' : ''; ?>>
                                    Cisarua 6
                                    </option>
                                    <option value="Cisarua 7" <?php echo $editMode && $editData['rayon'] == 'Tajur 6' ? 'selected' : ''; ?>>
                                    Cisarua 7
                                    </option>
                                </optgroup>
                                
                            </select>

                            <div class="col mt-3">
                                <button class="btn btn-primary" type="submit" name="kirim">
                                    <i class='bx bx-plus'></i> <?php echo $editMode ? 'Update' : 'Tambah'; ?>
                                </button>
                                <button class="btn btn-danger" type="button" onclick="printData()">
                                    <i class='bx bx-printer'></i> Print
                                </button>
                                <button class="btn btn-secondary" type="button" onclick="window.location.href='?reset=true'">
                                    <i class='bx bx-reset'></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="data-display">
                    <?php
                    if (!empty($_SESSION['dataSiswa'])) {
                        echo "<table>";
                        echo "<tr><th>Nama</th><th>NIS</th><th>Rayon</th><th>Aksi</th></tr>";
                        foreach ($_SESSION['dataSiswa'] as $key => $value) {
                            echo "<tr>";
                            echo "<td>" . $value["nama"] . "</td>";
                            echo "<td>" . $value["nis"] . "</td>";
                            echo "<td>" . $value["rayon"] . "</td>";
                            echo "<td>";
                            echo "<a href='?edit=" . $key . "' class='btn btn-warning btn-sm'>Edit</a> ";
                            echo "<a href='?hapus=" . $key . "' class='btn btn-danger btn-sm'>Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
