
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Tiket Konser </title>
    <style>
        body {
            background-color: 	#E49BFF;
        }

        .container {
            margin-top: 5rem;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: 	#C738BD;
        }

        .card-body {
            padding: 2rem;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #000000;
        }

        label {
            font-weight: bold;
            color: #000000;
        }

        .form-control {
            border-radius: 5px;
            margin-bottom: 1rem;
            border: 1px solid #000000;
        }

        .btn {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #000000;
            border-color: #000000;
        }

        .btn-primary:hover {
            background-color: #000000;
            border-color: #000000;
        }

        .btn-danger {
            background-color: #000000;
            border-color: #000000;
        }

        .btn-danger:hover {
            background-color: #000000;
            border-color: #000000;
        }

        .output {
            margin-top: 20px;
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 20px auto;
        }

        .output p {
            margin: 0;
            font-size: 16px;
        }

        .output hr {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card text-center">
                    <div class="card-body">
                        <h1>Tiket Konser </h1>
                        <?php
                        include 'logika.php';
                        if (isset($_POST["kirim"])) {
                            $proses = new Bayar();
                            $proses->setHarga(1000000, 2300000, 3000000, 3700000);
                            $proses->jenis = $_POST['jenis'];
                            $proses->jumlah = $_POST['jumlah'];
                            $proses->hargaTiket();
                            $proses->cetakBayar();
                        }
                        ?>
                        <form action="" method="POST" class="row d-flex align-items-center">
                            <label for="jumlah">Jumlah Tiket</label>
                            <input type="number" id="jumlah" name="jumlah" min=1 class="form-control mb-2">

                            <label for="jenis">Pilih Tiket</label>
                            <select name="jenis" id="jenis" class="form-control mb-2">
                                <option value="Silver">Silver</option>
                                <option value="Platinum">Platinum</option>
                                <option value="Premium">Premium</option>
                                <option value="VIP">VIP</option>
                            </select>

                            <button class="btn btn-primary mt-3" type="submit" name="kirim">Beli Tiket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>