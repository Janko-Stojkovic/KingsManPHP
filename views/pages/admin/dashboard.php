<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1>Welcome back, <?= $_SESSION["user"]->username ?>!</h1>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach($infoBoxes as $i): ?>
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box <?= $i['colorClass'] ?>">
                                <div class="inner">
                                    <h3><?= $i['value'] ?></h3>
                                    <p><?= $i['text'] ?></p>
                                </div>
                                <div class="icon">
                                    <i class="<?= $i['icon'] ?>"></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <section class="content">
                        <h1>Reports</h1>


                        <?php if(count($access_count) > 0): ?>
                            <div class="table-responsive">
                                <table id="foodTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>

                                        <th>Visited Page</th>
                                        <th>Access count</th>
                                        <th>Access percentage</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($currentRecords as $page=>$count):
                                        $percentage = ($count / $total_access) * 100;
                                        $percentage = number_format($percentage,2);
                                    ?>
                                        <tr>
                                            <td><?= $page ?></td>
                                            <td><?= $count ?></td>
                                            <td><?= $percentage ?>%</td>

                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <a class="<?php if($currentPage == $i): ?>active<?php endif; ?>" href="index.php?page=admin-dashboard&pageNum=<?= $i ?>"><?= $i ?></a>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <h2 class="d-flex justify-content-center mt-5">You have no logs</h2>
                        <?php endif; ?>

                    </section>
                </div>
            </div>
        </section>
    </div>

</div>

</body>

   
