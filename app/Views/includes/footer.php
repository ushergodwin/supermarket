<div class="container-fluid bg-dark text-light mt-3">
    <br/>
    <div class="row d-flex justify-content-between">
        <p>Copyright &copy; <?= date('Y') ?> SCIT VOTES</p>
        <div class="d-flex">
            <a href="#" class="footer-link text-muted">Privacy Policy</a> &nbsp;&nbsp;&nbsp;
            <a href="#" class="footer-link text-muted">Terms & Conditions</a>
        </div>
    </div>
    <br/>
</div>
<script src="<?= base_url('assets/bootstrap/js/jquery-3.5.1.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/pollsjs/pollsjs-v1.0.js') ?>"></script>
<script src="<?= base_url('assets/pollsjs/nav.js') ?>"></script>
<script>
    function extractFilename(path) {
        if (path.substr(0, 12) === "C:\\fakepath\\")
            return path.substr(12); // modern browser
        var x;
        x = path.lastIndexOf('/');
        if (x >= 0) // Unix-based path
            return path.substr(x+1);
        x = path.lastIndexOf('\\');
        if (x >= 0) // Windows-based path
            return path.substr(x+1);
        return path; // just the filename
    }
    $(window).on('load', function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
    $(document).ready(function(){
        $("#candidateForm").on('submit', function(e) {
            e.preventDefault();
            let url = $(this).attr('action');
            let form_data = new FormData(document.getElementById('candidateForm'));
            form_data.append('photo', $('#photo').val());
            $.ajax({
                url: url,
                type: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: form_data,
                enctype: 'multipart/form-date',
                beforeSend: ()=> {
                    $(".add-candidate-btn").attr("disabled", true);
                    $(".candidate-response").html("<span class='spinner-border spinner-border-sm text-primary'></span> adding...");
                },
                success: (data) => {
                    $(".candidate-response").html(data);
                },
                complete: () => {
                    $(".add-candidate-btn").attr('disabled', false);
                    $("#candidateForm").trigger('reset');
                }
            });
        });

        //vote
        $("#voteForm").on('submit', function (e) {
            e.preventDefault();
            let url = $(this).attr('action');
            $.ajax({
                url: url,
                type: 'post',
                data: $(this).serializeArray(),
                beforeSend: ()=> {
                    $("#vote-btn").attr('disabled', true);
                    $(".vote-response").html("<span class='spinner-border spinner-border-sm text-primary'></span> voting...")
                },
                success: (response)=> {
                    $(".vote-response").html(response);
                },
                complete: ()=> {
                    let xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (this.readyState === 4 && this.status === 200) {
                            document.getElementById('vote-count').innerHTML = this.responseText + ' Votes';
                        }
                    }
                    let cid = document.getElementById('cid');
                    let url = document.getElementById('base').value + "/";
                    xhr.open('get', url+'VoteController/voteCount?cid='+ cid.value);
                    xhr.send();
                }
            });
        });
    });
    setInterval(() => {
        if (document.getElementById('time')){
            let timeEl = document.getElementById('time');
            let time = new Date();
            let t = time.toLocaleTimeString();
            timeEl.innerHTML = t;
        }
    }, 1000);
</script>
</body>
</html>
