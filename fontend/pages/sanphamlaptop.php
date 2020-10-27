<?php
if (session_id() === '') {
    session_start();
}

?>
<?php
include_once(__DIR__ . '/../../dbconnect.php');

$itemId = $_GET["item"];
$slq = <<<OTE
    SELECT sp.sp_ma, sp.sp_gia, sp.sp_quangcao, sp.sp_giacu, sp.sp_hinhchitiet, lt.laptop_ten, lt.laptop_cpu, lt.laptop_ram,
    lt.laptop_ocung, lt.laptop_manhinh, lt.laptop_cardmanhinh, lt.laptop_congketnoi, lt.laptop_hedieuhanh,
    lt.laptop_thietke, lt.laptop_kichthuoc, lt.laptop_ramat
    FROM sanpham  sp
    JOIN laptop lt ON lt.laptop_ma = sp.laptop_ma
    WHERE sp.sp_ma = $itemId ;
OTE;
$resultLaptopNoiBat = mysqli_query($conn, $slq);
$dataSanPhamHot = [];
while ($row = mysqli_fetch_array($resultLaptopNoiBat, MYSQLI_ASSOC)) {
    $dataSanPhamHot[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_gia' => $row['sp_gia'],
        'sp_giacu' => $row['sp_giacu'],
        'sp_giacu' => $row['sp_giacu'],
        'sp_quangcao' => $row['sp_quangcao'],
        'laptop_ten' => $row['laptop_ten'],
        'laptop_cpu' => $row['laptop_cpu'],
        'laptop_ram' => $row['laptop_ram'],
        'laptop_ocung' => $row['laptop_ocung'],
        'laptop_manhinh' => $row['laptop_manhinh'],
        'laptop_cardmanhinh' => $row['laptop_cardmanhinh'],
        'laptop_congketnoi' => $row['laptop_congketnoi'],
        'laptop_hedieuhanh' => $row['laptop_hedieuhanh'],
        'laptop_thietke' => $row['laptop_thietke'],
        'sp_hinhchitiet' => $row['sp_hinhchitiet'],
        'laptop_kichthuoc' => $row['laptop_kichthuoc'],
        'laptop_ramat' => $row['laptop_ramat']
    );
}

$data = $dataSanPhamHot[0];
?>
<!DOCTYPE html>
<html lang="en">
<title><?= $data['laptop_ten']; ?></title>

<head>
    <?php include_once(__DIR__ . '/../../backend/layouts/partials/config.php') ?>

    <?php
    include_once(__DIR__ . '/../../backend/layouts/styles.php');
    include_once(__DIR__ . '/../../dbconnect.php');
    ?>
    <style>
        .main-sp {
            margin-top: 75px;
            background-color: white;
        }

        body {
            background-color: #f0f0f0;
        }

        .gia-sp-goc {
            color: red;
            font-size: 20px;
        }

        .gia-sp-giam {
            font-size: 20px;
        }

        .main-sanpham .hinh-sp {
            height: 500px;
            width: 500px;
            margin: 25px;
        }

        .thongtin-sp {
            border: 1px solid #f0f0f0;
        }

        .tieude-sp {
            font-size: 32px;
            text-align: center;
        }

        .kt-sp {
            margin-left: 70px;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 10px;
            font-size: 20px;
        }

        .mua-ngay {
            color: white;
            padding-left: 0px;
            padding-right: 50px;
        }

        .hinh-sp-laptop {
            height: 400px;
            width: 100%;
        }

        .hinh-sp-tablet {
            width: 100%;
            height: 600px;
            padding-top: 5px;
        }

        .hinh-dt-nbat {
            transition: 0.5s ease-in;
        }
    </style>
</head>

<body>
    <?php include_once(__DIR__ . '/../layouts/partials/header.php') ?>
    <div class="container-fluid mt-3 main-sp">
        <form action="xulymuahang.php?sp_ma=<?= $data['sp_ma']; ?>" method="POST" name="frmSanPham">
            <div class="row main-sanpham">
                <!-- hình sản phẩm -->
                <div class="col-md-5" style="margin-top: 75px;">
                    <?php
                    if ($data['sp_quangcao'] != null) {
                        echo '<img src="/nguyenanhthoai/fontend/images/hinhquangcao/' . $data['sp_hinhchitiet'] . ' "class="hinh-sp-laptop" >';
                    } else {
                        echo '<img src="/nguyenanhthoai/fontend/images/laptop/' . $data['sp_hinhchitiet'] . ' " class="hinh-sp-laptop">';
                    }
                    ?>
                </div>
                <!-- end hình sản phẩm -->
                <!-- Thông tin sp -->
                <div class="col-md-7 thongtin-sp" style="margin-top: 75px;">
                    <h1 class="tieude-sp display-4 mt-2"><?= $data['laptop_ten']; ?></h1>
                    <hr>
                    <h1 style="font-size:26px; margin-left: 10px;">Thông số kỹ thuật</h1>
                    <div class="row kt-sp">
                        <div class="col-md-4">
                            CPU:
                        </div>
                        <div class="col-md-8">
                            <?= $data['laptop_cpu']; ?>
                        </div>
                    </div>
                    <div class="row kt-sp">
                        <div class="col-md-4">
                            RAM:
                        </div>
                        <div class="col-md-8">
                            <?= $data['laptop_ram']; ?>
                        </div>
                    </div>
                    <div class="row kt-sp">
                        <div class="col-md-4">
                            Ổ cứng:
                        </div>
                        <div class="col-md-8">
                            <?= $data['laptop_ocung']; ?>
                        </div>
                    </div>
                    <div class="row kt-sp">
                        <div class="col-md-4">
                            Màn hình:
                        </div>
                        <div class="col-md-8">
                            <?= $data['laptop_manhinh']; ?>
                        </div>
                    </div>
                    <div class="row kt-sp">
                        <div class="col-md-4">
                            Card màn hình:
                        </div>
                        <div class="col-md-8">
                            <?= $data['laptop_cardmanhinh']; ?>
                        </div>
                    </div>
                    <div class="row kt-sp">
                        <div class="col-md-4">
                            Cổng kết nối:
                        </div>
                        <div class="col-md-8">
                            <?= $data['laptop_congketnoi']; ?>
                        </div>
                    </div>
                    <div class="row kt-sp">
                        <div class="col-md-4">
                            Hệ điều hành:
                        </div>
                        <div class="col-md-8">
                            <?= $data['laptop_hedieuhanh']; ?>
                        </div>
                    </div>
                    <div class="row kt-sp">
                        <div class="col-md-4">
                            Thiết kế:
                        </div>
                        <div class="col-md-8">

                            <?= $data['laptop_thietke']; ?>
                        </div>
                    </div>
                    <div class="row kt-sp">
                        <div class="col-md-4">
                            Kích thước:
                        </div>
                        <div class="col-md-8">
                            <?= $data['laptop_kichthuoc']; ?>
                        </div>
                    </div>
                    <div class="row kt-sp">
                        <div class="col-md-4">
                            Thời điểm ra mắt:
                        </div>
                        <div class="col-md-8">
                            <?= $data['laptop_ramat']; ?>
                        </div>
                    </div>
                    <div class="row kt-sp">
                        <span class="gia-sp-goc">
                            <?= number_format($data['sp_gia'], 0, ".", ",") . ' vnđ'; ?>
                        </span>&emsp;
                        <span class="gia-sp-giam">
                            <del>
                                <?php
                                if ((($data['sp_giacu'] != null) && ($data['sp_giacu'] > $data['sp_gia'])))
                                    echo number_format($data['sp_giacu'], 0, ".", ",") . ' vnđ';
                                ?>
                            </del>
                        </span>
                    </div>
                    <div class="row kt-sp">
                        <label for="soluong">Số lượng đặt mua:</label>
                        <button type="button" id="btn-Tru" name="btn-Tru" style="width:50px;" onclick="tru()">
                            <i class="fa fa-minus"></i>
                        </button>
                        <input type="number" min="1" max="9" class="form-control" id="soluongmua" name="soluongmua" style="width:100px; text-align:center;" value="1">
                        <button type="button" id="btn-Cong" name="btn-Cong" style="width:50px;" onclick="cong()">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <button type="submit" class="btn btn-warning btn-lg btn-block mb-2 mua-ngay">MUA NGAY</button>
                </div>
                <!-- end thông tin sp -->
            </div>
        </form>
    </div>
    <div class="container-fluid">
        <?php include_once(__DIR__ . '/../../backend/layouts/partials/footer.php') ?>
    </div>
</body>

<script>
    var dem = 1;

    function cong() {
        dem = dem + 1;
        if (dem < 10) {
            document.getElementById("soluongmua").value = dem;

        } else {
            dem = 9;
        }
    }

    function tru() {
        dem = dem - 1;
        if (dem > 0) {
            document.getElementById("soluongmua").value = dem;
        } else {
            dem = 1;
        }
    }
</script>

</html>