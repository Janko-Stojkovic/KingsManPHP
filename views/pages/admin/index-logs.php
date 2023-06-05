<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <h1>Reports</h1>
            <?php if(count($fajl) > 0): ?>
                <div class="table-responsive">
                    <table id="foodTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>

                            <th>Visited Page</th>
                            <th>Visited At</th>
                            <th>IP address</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php  foreach($currentRecords as $key=>$red):
                            $red = trim($red);
                            list($visitedPage, $visitedAt, $ip)=explode("__", $red);
                            ?>
                            <tr>
                                <td><?= $key+1 ?></td>

                                <td><?= $visitedPage ?></td>
                                <td><?= $visitedAt ?></td>
                                <td><?= $ip ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="pagination">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a class="<?php if($currentPage == $i): ?>active<?php endif; ?>" href="index.php?page=admin-index-logs&pageNum=<?= $i ?>"><?= $i ?></a>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php else: ?>
                <h2 class="d-flex justify-content-center mt-5">You have no logs</h2>
            <?php endif; ?>

        </section>
    </div>

</div>

<script>
    const table = "usersTable";
</script>

</body>


