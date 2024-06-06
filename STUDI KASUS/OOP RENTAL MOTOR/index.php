<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rental Motor Bintang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            body {
                background-color: #FFB9B9;
            }

            form {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background-color: #E49BFF;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .form-label {
                color: #D20062;
            }

            .btn-primary {
                background-color: #C738BD ;
                border-color: #ff8c00;
            }

            .btn-primary:hover {
                background-color: #850F8D;
                border-color: #ff4500;
            }

            .form-group {
                margin-bottom: 15px;
            }
            .kanan {
                text-align: end;
            }
        </style>
    </head>

    <body>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama" class="form-label">Masukan nama :</label>
                <input type="text" name="member" id="nama" class="form-control" placeholder="Masukan nama" required>
            </div>
            <div class="form-group">
                <label for="jenis" class="form-label">Pilih Jenis Motor : </label>
                <select name="jenis" id="jenis" class="form-select" required>
                    <option value="default" selected disabled>Pilih Motor</option>
                    <optgroup label= "Matic">
                    <option value="Mio">Mio</option>
                    <option value="Aerox">Aerox</option>
                    <option value="Beat Karbu">Beat Karbu</option>
                    </optgroup>
                    <optgroup label= "Manual">
                    <option value="Revo">Revo</option>
                    <option value="ZX25R">ZX25R</option>
                    <option value="Supra Bapack">Supra Bapack</option>
                    </optgroup>
                
                </select>
            </div>
            <div class="form-group">
                <label for="waktu" class="form-label">Masukan waktu sewa : </label>
                <input type="number" name="waktu" id="waktu" class="form-control" min="1" placeholder="Minimal 1 hari" required>
            </div>
            <div class="kanan">
            <button type="submit" name="submit" class="btn btn-primary">Sewa</button>
            </div>  
        </form>

        <?php

        include 'Logic.php';

        $logic = new Rental();
        $logic->setHarga(50000, 150000, 100000, 75000, 500000, 100000);

        if (isset($_POST['submit'])) {
            $logic->member = $_POST['member'];
            $logic->jenis = $_POST['jenis'];
            $logic->waktu = $_POST['waktu'];

            $logic->Pembayaran();
        }
        ?>
    </body>

    </html>