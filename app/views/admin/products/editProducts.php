<section class="section-content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12">
                <table id="table_products" class="table table-bordered table-" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên</th>
                            <th>Thú cưng</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data =  $data_products->fetchAll();
                        foreach ($data as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><img width="100px" src="<?= _WEB_ROOT ?>/public/assets/img/img_pet/<?= strtolower($value['pet_name']) . '/' . $value['image'] ?>" /></td>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['pet_name'] ?></td>
                                <td><?= $value['quantity'] ?></td>
                                <td><?= number_format($value['price'], 0, ".", ".") ?> VND</td>
                                <td>
                                    <a name="" id="" class="btn btn-primary my-2" href="#" role="button">Sửa</a>
                                    <a name="" id="" class="btn btn-warning  my-2" href="#" role="button">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</section>