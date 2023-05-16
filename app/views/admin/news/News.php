<section class="section-content">
    <div class="container-fluid">
        <div>
            <a name="" id="" class="btn btn-primary" href="/admin/addnews" role="button">Thêm Tin Tức</a>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <table id="table_products" class="table table-bordered table-" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Id</th>
                            <th>Tiêu đề</th>
                            <th>Hình</th>
                            <th>Mô tả ngắn</th>
                            <th>Lượt xem</th>
                            <th>Ngày đăng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $data_news->fetchAll();
                        foreach ($data as $key => $value) {
                            ?>
                            <tr>
                                <td>
                                    <?= $key ?>
                                </td>
                                <td>
                                    <?= $value['id'] ?>
                                </td>
                                <td class="">
                                    <?= $value['name'] ?>
                                </td>
                                <td><img width="100px"
                                        src="<?= _WEB_ROOT ?>/public/assets/img/img_news/<?= $value['img_news'] ?>" />
                                </td>
                                <td class="">
                                    <?= $value['des_news'] ?>
                                </td>

                                <td>
                                    <?= $value['view'] ?>
                                </td>
                                <td>
                                    <?= $value['uptime'] ?>
                                </td>
                                <td>
                                    <a name="" id="" class="btn btn-primary" href="/admin/editnews/<?= $value['id']?>" role="button">Sửa</a>
                                    <a name="" id="" class="btn btn-warning my-2 delete-news"
                                        href="/admin/deleteNews/<?= $value['id'] ?>" role="button">Xóa</a>

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
    document.querySelectorAll('.delete-news').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            // Show the SweetAlert confirmation dialog
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa bài viết này?',
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