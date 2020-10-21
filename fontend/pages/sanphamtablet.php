<?php
if (session_id() === '') {
    session_start();
}

?>
<?php
include_once(__DIR__ . '/../../dbconnect.php');

$itemId = $_GET["item"];
$slq = <<<OTE
SELECT sp.sp_ma, sp.sp_gia, sp.sp_giacu, sp.sp_hinhchitiet, tb.tablet_ten, tb.tablet_manhinh, tb.tablet_hedieuhanh,tb.tablet_cpu, tb.tablet_ram, tb.tablet_bonhotrong, tb.tablet_camerasau, tb.tablet_cameratruoc, tb.tablet_ketnoimang, tb.tablet_damthoai, tb.tablet_trongluong
FROM sanpham  sp
JOIN tablet tb ON tb.tablet_ma = sp.tablet_ma
WHERE sp.sp_ma = $itemId;
    

OTE;
$resultLaptopNoiBat = mysqli_query($conn, $slq);
$dataSanPhamHot = [];
while ($row = mysqli_fetch_array($resultLaptopNoiBat, MYSQLI_ASSOC)) {
    $dataSanPhamHot[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_gia' => $row['sp_gia'],
        'sp_giacu' => $row['sp_giacu'],
        'sp_hinhchitiet' => $row['sp_hinhchitiet'],
        'tablet_ten' => $row['tablet_ten'],
        'tablet_manhinh' => $row['tablet_manhinh'],
        'tablet_hedieuhanh' => $row['tablet_hedieuhanh'],
        'tablet_cpu' => $row['tablet_cpu'],
        'tablet_ram' => $row['tablet_ram'],
        'tablet_bonhotrong' => $row['tablet_bonhotrong'],
        'tablet_camerasau' => $row['tablet_camerasau'],
        'tablet_cameratruoc' => $row['tablet_cameratruoc'],
        'tablet_ketnoimang' => $row['tablet_ketnoimang'],
        'tablet_damthoai' => $row['tablet_damthoai'],
        'tablet_trongluong' => $row['tablet_trongluong']
    );
}

$data = $dataSanPhamHot[0];
?>
<!DOCTYPE html>
<html lang="en">
<title><?= $data['tablet_ten']; ?></title>

<head>
    <?php include_once(__DIR__ . '/../../backend/layouts/partials/config.php') ?>

    <?php
    include_once(__DIR__ . '/../../backend/layouts/styles.php');
    include_once(__DIR__ . '/../../dbconnect.php');
    ?>
    <style>
        .main-sp {
            margin-top: 50px;
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
            width: 100%;
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
        <div class="row main-sanpham">
            <!-- hình sản phẩm -->
            <div class="col-md-5" style="margin-top: 75px;"><img src="/nguyenanhthoai/fontend/images/tablet/<?= $data['sp_hinhchitiet']; ?>" class="hinh-sp-tablet"></div>
            <!-- end hình sản phẩm -->
            <!-- Thông tin sp -->
            <div class="col-md-7 thongtin-sp" style="margin-top: 75px;">
                <h1 class="tieude-sp display-4 mt-2"><?= $data['tablet_ten']; ?></h1>
                <hr>
                <h1 style="font-size:26px; margin-left: 10px;">Thông số kỹ thuật</h1>
                <div class="row kt-sp">
                    <div class="col-md-4">
                        Màn hình:
                    </div>
                    <div class="col-md-8">
                        <?= $data['tablet_manhinh']; ?>
                    </div>
                </div>
                <div class="row kt-sp">
                    <div class="col-md-4">
                        Hệ điều hành:
                    </div>
                    <div class="col-md-8">
                        <?= $data['tablet_hedieuhanh']; ?>
                    </div>
                </div>
                <div class="row kt-sp">
                    <div class="col-md-4">
                        CPU:
                    </div>
                    <div class="col-md-8">
                        <?= $data['tablet_cpu']; ?>
                    </div>
                </div>
                <div class="row kt-sp">
                    <div class="col-md-4">
                        RAM:
                    </div>
                    <div class="col-md-8">
                        <?= $data['tablet_ram']; ?>
                    </div>
                </div>
                <div class="row kt-sp">
                    <div class="col-md-4">
                        Bộ nhớ trong:
                    </div>
                    <div class="col-md-8">
                        <?= $data['tablet_bonhotrong']; ?>
                    </div>
                </div>
                <div class="row kt-sp">
                    <div class="col-md-4">
                        Camera sau:
                    </div>
                    <div class="col-md-8">
                        <?= $data['tablet_camerasau']; ?>
                    </div>
                </div>
                <div class="row kt-sp">
                    <div class="col-md-4">
                        Camera trước:
                    </div>
                    <div class="col-md-8">
                        <?= $data['tablet_cameratruoc']; ?>
                    </div>
                </div>
                <div class="row kt-sp">
                    <div class="col-md-4">
                        Kết nối mạng:
                    </div>
                    <div class="col-md-8">

                        <?= $data['tablet_ketnoimang']; ?>
                    </div>
                </div>
                <div class="row kt-sp">
                    <div class="col-md-4">
                        Đàm thoại:
                    </div>
                    <div class="col-md-8">
                        <?= $data['tablet_damthoai']; ?>
                    </div>
                </div>
                <div class="row kt-sp">
                    <div class="col-md-4">
                        Trọng lượng:
                    </div>
                    <div class="col-md-8">
                        <?= $data['tablet_trongluong']; ?>
                    </div>
                </div>
                <div class="row kt-sp">
                    <span class="gia-sp-goc">
                        <?= number_format($data['sp_gia'], 0, ".", ",") . ' vnđ'; ?>
                    </span>&emsp;
                    <span class="gia-sp-giam">
                        <del>
                            <?php
                            if ((($data['sp_giacu'] == null) || ($data['sp_giacu'] > $data['sp_gia'])))
                                echo number_format($data['sp_giacu'], 0, ".", ",") . ' vnđ';
                            ?>
                        </del>
                    </span>
                </div>
                <button type="button" onclick=muaHang() class="btn btn-warning btn-lg btn-block mb-2 mua-ngay">MUA NGAY</button>
            </div>
            <!-- end thông tin sp -->
        </div>
    </div>
    <div class="container-fluid">
        <?php include_once(__DIR__ . '/../../backend/layouts/partials/footer.php') ?>
    </div>
</body>

</html>