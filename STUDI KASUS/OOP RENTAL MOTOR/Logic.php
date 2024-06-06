<?php
class Data
{
    public $member, $jenis, $waktu, $diskon;
    protected $pajak;
    private $Mio, $Aerox, $BeatKarbu, $Revo, $ZX25R, $SupraBapack ;
    private $listMember = ['hana', 'Bintang', 'syra', 'ara'];

    public function __construct()
    {
        $this->pajak = 10000;
    }

    public function getMember()
    {
        if (in_array($this->member, $this->listMember)) {
            return "Member";
        } else {
            return "Non Member";
        }
    }

    public function setHarga($jenis1, $jenis2, $jenis3, $jenis4, $jenis5, $jenis6)
    {
        $this->Mio = $jenis1;
        $this->Aerox = $jenis2;
        $this->BeatKarbu = $jenis3;
        $this->Revo = $jenis4;
        $this->ZX25R = $jenis5;
        $this->SupraBapack = $jenis6;
    
    }

    public function getHarga()
    {
        $data['Mio'] = $this->Mio;
        $data['Aerox'] = $this->Aerox;
        $data['BeatKarbu'] = $this->BeatKarbu;
        $data['Revo'] = $this->Revo;
        $data['ZX25R'] = $this->ZX25R;
        $data['SupraBapack'] = $this->SupraBapack;

        return $data;
    }
}

class Rental extends Data
{
    public function Rental()
    {
        $dataHarga = $this->getHarga()[$this->jenis];
        $diskon = $this->getMember() == "Member" ? 5 : 0;
        if ($this->waktu === 1) {
            $bayar = ($dataHarga - ($dataHarga * $diskon / 100)) + $this->pajak;
        } else {
            $bayar = (($dataHarga * $this->waktu) - ($dataHarga * $diskon / 100) + $this->pajak);
        }
        return [$bayar, $diskon];
    }

    public function Pembayaran()
    {
        echo "<div class='hasil'>";
        echo $this->member . " berstatus sebagai " . $this->getMember() . " mendapatkan diskon sebesar " . $this->Rental()[1] . "%";
        echo "<br>";
        echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari";
        echo "<br>";
        echo "Harga rental per-harinya : Rp. " . number_format($this->getHarga()[$this->jenis]);
        echo "<br>";
        echo "<b>Besar yang harus dibayarkan adalah: Rp. ". number_format($this->Rental()[0]). " (<i>Termasuk Pajak)</i></b>";
        echo "</div>";
    }
}
?>
<html>
<style>
    .hasil {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 1rem 24rem;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        background-color: #fff;
        color: #ff4500;
    font-weight: bold;
    }

    .hasil-header,
    .hasil-footer {
        text-align: center;
    }

    .hasil-body {
        margin: 20px 0;
    }
</style>

</html>