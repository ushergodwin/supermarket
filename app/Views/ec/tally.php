<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>">
        <img src="<?= base_url('assets/imgs/logo/16945365845.jpg') ?>" width="50" height="30" class="d-inline-block align-top" alt="">
        <span class="menu-collapsed">SCIT VOTES</span>
    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#top">Hi,  <?= $firstname ?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('auth/logout') ?>" onclick="return confirm('logout?')"> <i class="fas fa-power-off text-danger"></i> Logout</a>
            </li>
            <!-- This menu is hidden in bigger devices with d-sm-none.
           The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
            <li class="nav-item dropdown d-sm-block d-md-none">
                <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu </a>
                <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                    <a class="dropdown-item" href="#top">Candidates</a>
                    <a class="dropdown-item" href="#top">Charts</a>
                    <a class="dropdown-item" href="<?= base_url('admin/tally-center') ?>">Tally</a>
                    <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" onclick="return confirm('logout?')">logout</a>
                </div>
            </li><!-- Smaller devices menu END -->
        </ul>
    </div>
</nav><!-- NavBar END -->
<div class="container">
    <div class="card mt-2">
        <div class="card-header py-1">
            <div class="row justify-content-between">
                <h4>TALLY CENTER</h4>
            </div>
        </div>
    </div>
</div>
            <div class="container" id="tally1">  <!-- Presidents -->
                <div class="row">
                    <div class="col">
                        <div class="card mt-2">
                            <div class="card-header py-1"><h4>PRESIDENTS</h4></div>
                            <div class="card-body">
                                <?php if (!empty($presidents)): ?>
                                <div class="list-group list-group-horizontal flex-fill">
                                    <?php foreach ($presidents as $key => $president): ?>
                                        <div class="list-group-item col-md-12 col-lg-4 col-xl-4">
                                            <div class="card py-1 mt-3 border-0 shadow">
                                                <img src="<?= base_url( '/'. $president['photo'])?>" class="card-img-top rounded" alt=""/>
                                                <div class="card-body">
                                                    <h4><?=  $president['name']?></h4>
                                                    <h4><?= $president['firstname'] . " ".$president['lastname']?></h4>
                                                    <span class="text-muted"><?= $president['course']?></span>
                                                    <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $president['vote_count'] ?> votes(s)</h4></button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                        <h5 class="text-warning">There are no presidential candidates</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Presidents -->

            <!-- Speaker -->
            <div class="container" id="tally2">
                <div class="row">
                    <div class="col">
                        <div class="card mt-3">
                            <div class="card-header py-1"><h4>SPEAKER</h4></div>
                            <div class="card-body">
                                <?php if (!empty($speaker)): ?>
                                <div class="list-group list-group-horizontal mb-3">
                                    <?php foreach ($speaker as $key => $minister): ?>
                                        <div class="list-group-item flex-fill col-md-4">
                                            <div class="card py-1 mt-3 border-0 shadow">
                                                <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                <div class="card-body">
                                                    <h4><?= $minister['name']?></h4>
                                                    <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                    <span class="text-muted"><?= $minister['course']?></span>
                                                    <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                        <h5 class="text-warning">There are no candidates for the speaker position</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Speaker -->
                <!-- Vice Presidents -->
                <div class="container" id="tally3">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>VICE PRESIDENTS</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($vicePresident)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($vicePresident as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no vice presidential candidates</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Vice Presidents -->

                <!-- DEPUTY SPEAKER -->
                <div class="container" id="tally4">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>DEPUTY SPEAKER</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($deputySpeaker)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($deputySpeaker as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?= $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of deputy speaker</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Presidents -->

                <!-- Finance Minister -->
                <div class="container" id="tally5">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>FINANCE MINISTER</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($finance)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($finance as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of finance minister</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Finance Minister -->

                <!-- Academic Minister -->
                <div class="container" id="tally6">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>ACADEMIC MINISTER</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($academic)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($academic as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt="">
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of academic minister</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End academic Minister -->

                <!-- GENERAL SECRETARY -->
                <div class="container" id="tally7">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>GENERAL SECRETARY</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($generalSecretary)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($generalSecretary as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of general secretary</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End general secretary -->

                <!--Vice general secretary -->
                <div class="container" id="tally8">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>VICE GENERAL SECRETARY</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($viceGeneralSecretary)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($viceGeneralSecretary as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of vice general secretary</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End vice general secretary -->

                <!-- Constitution Affairs -->
                <div class="container" id="tally9">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>CONSTITUTION AFFAIRS / LEGAL MINISTER</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($constitution)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($constitution as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of constitution affairs </h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End constitution -->

                <!-- Ethics and integrity Minister -->
                <div class="container" id="tally10">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>ETHICS AND INTEGRITY MINISTER</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($ethics)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($ethics as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of ethics and integrity minister</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Ethics and Integrity Minister -->

                <!-- Sports Minister -->
                <div class="container" id="tally11">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>SPORTS MINISTER</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($sports)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($sports as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of sports minister</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Sports Minister -->

                <!-- Foreign affairs Minister -->
                <div class="container" id="tally12">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>FOREIGN AFFAIRS MINISTER</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($foreignAffairs)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($foreignAffairs as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of foreign affairs minister</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Foreign affairs Minister -->

                <!-- Information and Entertainment Minister -->
                <div class="container" id="tally13">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>INFORMATION AND ENTERTAINMENT MINISTER</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($information)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($information as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of information and entertainment minister</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End information and entertainment Minister -->

                <!-- Women affairs Minister -->
                <div class="container" id="tally14">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>WOMEN AFFAIRS MINISTER</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($womenAffairs)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($womenAffairs as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of women affairs minister</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End women affairs Minister -->

                <!-- general class rep Minister -->
                <div class="container" id="tally15">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>GENERAL CLASS REPRESENTATIVE / VICE ACADEMIC MINISTER</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($generalClassRep)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($generalClassRep as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of general class rep</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End general class rep Minister -->

                <!-- pwd Minister -->
                <div class="container" id="tally16">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>PERSONS WITH DISABILITIES (PWD) MINISTER</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($pwd)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($pwd as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of pwd</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End pwd Minister -->

                <!-- Projects coordinator  -->
                <div class="container" id="tally17">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header py-1"><h4>PROJECTS COORDINATOR</h4></div>
                                <div class="card-body">
                                    <?php if (!empty($projectsCoordinator)): ?>
                                    <div class="list-group list-group-horizontal mb-3">
                                        <?php foreach ($projectsCoordinator as $key => $minister): ?>
                                            <div class="list-group-item flex-fill col-md-4">
                                                <div class="card py-1 mt-3 border-0 shadow">
                                                    <img src="<?= base_url( '/'. $minister['photo'])?>" class="card-img-top rounded" alt=""/>
                                                    <div class="card-body">
                                                        <h4><?=  $minister['name']?></h4>
                                                        <h4><?= $minister['firstname'] . " ".$minister['lastname']?></h4>
                                                        <span class="text-muted"><?= $minister['course']?></span>
                                                        <button type="button" class="btn btn-light w-100"><h4 class="text-success"><?= $minister['vote_count'] ?> votes(s)</h4></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <h5 class="text-warning">There are no candidates for the position of projects coordinator</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End projects coordinator -->
            </div>
</div>
