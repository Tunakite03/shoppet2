<section class="section-content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12">
                <table id="table_products" class="table table-bordered table-" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Danh mục con</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data =  $data_categories->fetchAll();
                        foreach ($data as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td class="fw-bold"><?= $value['category_name'] ?></td>
                                <td><?= $value['subcategory_names'] ?></td>

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