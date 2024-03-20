<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Đây là trang chủ</h1>
            <form action="?act=search" method="get">
                Chọn danh mục
                <select name="catalog" id="catalog">
                    <option value="">Chọn danh mục</option>
                    <?php foreach ($catalogues as $cate) : ?>
                        <option value="<?= $cate['id'] ?>">
                            <?= $cate['name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>

                <input type="text" name="keyword" placeholder="Nhập tên sản phẩm" id="keyword">

                <button type="submit" id="submit">Tìm kiếm</button>
            </form>

            <form action="?act=filter-price" method="post">
                <label for="">Chọn khoảng giá</label> <br>
                <?php foreach ($list_of_price as $key => $value) : ?>
                    <input type="radio" name="filter" value="<?= $key ?>" id="" <?= isset($filter) ? (($filter == $key) ? 'checked' : '') : '' ?> onclick="return this.form.submit()"> <?= $value ?>
                    <br>

                <?php endforeach ?>
            </form>
            <?php foreach ($products as $product) : ?>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img class="card-img-top img-responsive" height="300px" src="<?= BASE_URL . $product['img_thumbnail'] ?>">
                        <div class="card-body">
                            <h4 class="card-title"><?= $product['name'] ?></h4>
                            <p>
                                Giá: <?= number_format($product['price_regular'], 0, ',') ?> đ
                            </p>
                            <p class="card-text"><?= $product['overview'] ?></p>
                            <a href="#" class="btn btn-primary">Add to cart</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <script>
        let submit = document.querySelector('#submit');
        let catalog = document.querySelector('#catalog');
        let keyword = document.querySelector('#keyword');

        submit.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = "<?= BASE_URL ?>?act=search&keyword=" + keyword.value + "&catalog=" + catalog.value;
        })
    </script>
</body>

</html>