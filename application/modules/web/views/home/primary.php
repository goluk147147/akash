<style>
    .inpt_design {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<section class="inpt_design">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="input_form col-md-6 col-lg-4 m-auto">
                        <form action="<?= base_url('primary') ?>" method="post">
                            <div class="mb-3">
                                <label for="username">Enter Passkey</label>
                                <input type="text" class="form-control" id="Usernames" name="passKey">
                                <input type="hidden" class="form-control" id="refereri" value="<?= $referer ?>" name="referer">
                            </div>
                            <div class="mt-3 text-center">
                                <button type="submit" class="btn">Submit</button>
                            </div>
                        </form>
                        </>
                    </div>
                </div>
            </div>
        </div>
</section>