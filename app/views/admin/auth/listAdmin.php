<section class="section-content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12">
                <table id="table_products" class="table table-bordered table-" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Quản trị viên</th>
                            <th>Email</th>
                            <th>Quyền hạn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $data_customer->fetchAll();
                        foreach ($data as $key => $value) {
                        ?>
                            <tr>
                                <td>
                                    <?= $key ?>
                                </td>
                                <td class="">
                                    <?= $value['name'] ?>
                                </td>
                                <td class="">
                                    <?= $value['email'] ?>
                                </td>
                                <td>
                                    <a name="" id="" class="btn btn-primary" href="/admin/editcustomer/<?= $value['id'] ?>" role="button">Sửa</a>
                                    <a name="" id="" class="btn btn-warning my-2 delete-product" href="/admin/deletecustomer/<?= $value['id'] ?>" role="button">Xóa</a>
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