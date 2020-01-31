<div class="container">
    <div class="row mt-5">
        <h2 class="my-3">회원가입</h2>
        <div class="col-10 offset-1">
            <form method="post">
                <div class="form-group row">
                    <label for="userid" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <?php if(isset($errors['userid'])): ?>
                            <input type="text" class="form-control is-invalid" id="userid" name="userid" placeholder="사용자 ID를 입력하세요">
                            <div class="invalid-feedback">
                                <?=  $errors['userid']  ?>
                            </div>
                        <?php else: ?>
                            <input type="text" class="form-control" id="userid" name="userid" placeholder="사용자 ID를 입력하세요">
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>

                    <div class="col-sm-10">
                        <?php if(isset($errors['password'])): ?>
                            <input type="password" class="form-control is-invalid" id="password" name="password" placeholder="비밀번호를 입력하세요">
                            <div class="invalid-feedback">
                                <?=  $errors['password']  ?>
                            </div>
                        <?php else: ?>
                            <input type="password" class="form-control" id="password" name="password" placeholder="비밀번호를 입력하세요">
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="passwordc" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="passwordc" name="passwordc" placeholder="비밀번호 확인을 해주세요">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <?php if(isset($errors['username'])): ?>
                            <input type="text" class="form-control is-invalid" id="username" name="username" placeholder="사용자 이름을 입력하세요">
                            <div class="invalid-feedback">
                                <?=  $errors['username']  ?>
                            </div>
                        <?php else: ?>
                            <input type="text" class="form-control" id="username" name="username" placeholder="사용자 이름을 입력하세요">
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">회원가입</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>