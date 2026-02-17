@extends('layout2.home')

@section('title')
Change password
@endsection

@section('content')
<main class="main">
    <section id="contactus" class="section ">
        <div class="container divpadding pt-4">
            <div class="row">
                <div class="col-lg-3 m-15px-tb">&nbsp;</div>
                <div class="col-lg-6 m-15px-tb" class="col-md-6 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <form>
                                <h5 class="text-center"><strong>Change password</h5>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Create new password</label>
                                    <input type="email" class="form-control" id="email" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Confirm new password</label>
                                    <input type="password" class="form-control" id="password" placeholder="">
                                </div>
                                <a href="#" type="submit" class="btn btn-danger w-40 ">Change Password</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
</main>
@endsection