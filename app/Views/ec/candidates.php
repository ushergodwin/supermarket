<div class="col p-4">
    <!-- Candidates -->
    <div class="card mt-3" style="height: 900px; overflow-y: auto;">
        <div class="card-header py-1">
            <h4 class="font-weight-bold">ALL CANDIDATES</h4>
        </div>
        <div class="card-body">
            <div class="row">

                <?php if (!empty($candidates)): ?>
                    <?php foreach ($candidates as $key => $candidate): ?>
                        <div class="col-md-12 col-lg-4 col-xl-4">
                            <div class="card py-1 mt-3">
                                <img src="<?= base_url( '/'. $candidate['photo'])?>" class="card-img-top rounded" alt="">
                                <div class="card-body">
                                    <h4><?=  $candidate['name']?></h4>
                                    <h4><?= $candidate['firstname'] . " ".$candidate['lastname']?></h4>
                                    <span class="text-muted"><?= $candidate['course']?></span>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <span class="text-warning">There are no candidates to show</span>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>