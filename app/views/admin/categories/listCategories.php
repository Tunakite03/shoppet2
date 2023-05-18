<section class="section-content">
    <div class="container-fluid">
        <div class="row mt-5">

            <div class="col-md-12">
                <table id="table_products" class="table table-bordered table-" style="width:100%">
                    <thead>
                        <tr>
                            <th>Stt</th>    
                            <th>Mã Đơn Hàng</th>
                            <th>Họ tên</th>
                            <th>Tổng Tiền</th>
                            <th>Ngày tạo đơn</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data =$data_orders->fetchAll();
                        foreach ($data as $key =>$value) {
                        ?>
                            <tr>
                                <td>
                                    <?= $key ?>
                                </td>
                                <td><?= $value['id'] ?></td>
                                <td class="fw-bold"><?= $value['name'] ?></td>
                                <td class="fw-bold"><?= number_format($value["total"], 0, ',', '.') ?>đ</td>
                                <td><?= $value['date'] ?></td>

                                <td>
                                    <a name="" id="" class="btn btn-warning my-2 mx-2" href="/admin/ListCustomersOrdersID/<?= $value['id']  ?>" role="button">Xem chi tiết</a>
                                </td>
                            </tr>
                        <?php } ?>

                        
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</section>
<script>
    // Add an event listener to the delete button
    document.querySelectorAll('.delete-product').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            // Show the SweetAlert confirmation dialog
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa sản phẩm này?',
                text: "Hành động này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                // If the user clicked "OK", redirect to the delete URL
                if (result.isConfirmed) {
                    window.location.href = button.href;
                }
            });
        });
    });
</script>