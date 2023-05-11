<section class="section-content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="d-flex justify-content-end">
                <button class="btn btn-success my-3">Thêm nguời dùng mới</button>
            </div>
            <div class="col-md-12">
                <table id="table_products" class="table table-bordered table-" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Danh mục con</th>
                            <th>phone</th>
                            <th>Địa chỉ</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data =  $data_customers->fetchAll();
                        foreach ($data as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td class="fw-bold"><?= $value['name'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['phone'] ?></td>
                                <td><?= $value['province'] . '-' . $value['district'] . '-' . $value['ward'] . '-' . $value['street']  ?></td>
                                <td>
                                    <a name="" id="" class="btn btn-primary my-2 mx-2" href="#" role="button">Sửa</a>
                                    <a name="" id="" class="btn btn-warning my-2 mx-2" href="#" role="button">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</section>