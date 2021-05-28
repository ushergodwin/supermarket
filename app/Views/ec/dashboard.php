<!-- MAIN -->
<div class="col p-4">
    <h3 class="text-success">SCIT E-VOTING ADMIN PANEL</h3>
    <div class="card py-1">
        <div class="card-header py-1"><h5>VOTING CONTROL</h5></div>
        <div class="card-body">
            <div class="row justify-content-between">
                <button type="button" class="btn btn-success">START VOTING PROCESS</button>
                <button type="button" class="btn btn-warning">CANCEL VOTING PROCESS</button>
                <button type="button" class="btn btn-info">END VOTING PROCESS</button>
            </div>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header font-weight-light">ADD CANDIDATES</h5>
        <div class="card-body">
            <form action="<?= site_url('EcController/candidate') ?>" method="post" id="candidateForm">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="firstname">FirstName</label>
                            <input type="text" name="firstname" class="form-control" autocomplete="off" required/>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="lastname">LastName</label>
                            <input type="text" name="lastname" class="form-control" autocomplete="off" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="course">COURSE/PROGRAM</label>
                            <select name="course" class="custom-select" required>
                                <option selected>--- select program ---</option>
                                <option>BACHELOR OF SOFTWARE ENGINEERING</option>
                                <option>BACHELOR OF COMPUTER SCIENCE</option>
                                <option>BACHELOR OF INFORMATION SYSTEMS AND TECHNOLOGY</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <label for="photo" class="custom-file-label">SELECT PHOTO</label>
                        <span class="custom-file-input">
                                <input type="file" name="photo" id="photo" class="custom-file-input" onchange="document.getElementById('photo-name').innerHTML = extractFilename(this.value)" required>
                            </span>
                        <span id="photo-name"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <label for="position">POSITION</label>
                        <select name="position" class="custom-select">
                            <option selected>--- select position ---</option>

                            <?php foreach ($positions as $key => $position): ?>
                                <option><?= $position['name'] ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="col-md-12 col-lg-6 col-lg-6">
                        <div class="form-group">
                            <label for="cid">Candidate ID <button type="button" class="btn btn-success btn-sm" onclick="document.getElementById('cid').value = 'C' + Math.ceil(Math.random() * 99999).toString()">GENERATE</button> </label>
                            <input type="text" name="cid" class="form-control" autocomplete="off" id="cid" readonly>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">

                    <div class="form-group">
                        <input type="hidden" name="add_candidate" value="1"/>
                        <button type="submit" class="btn btn-success w-100 add-candidate-btn">ADD CANDIDATE</button>
                    </div>
                    <div class="candidate-response"></div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger">CLEAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- Main Col END -->