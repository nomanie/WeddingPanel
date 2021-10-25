<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-90">

                    <h4 class="">
                        <div class="avatar avatar-md">
                                    <span class="avatar-title rounded-circle bg-info"> <i
                                            class="mdi mdi-desktop-mac"></i> </span>
                        </div>
                        Witaj, {{\Illuminate\Support\Facades\Auth::user()->name}}!
                    </h4>
                    <p class="opacity-75 ">
                        Znajdujesz się aktualnie na pulpicie swojego konta. Możesz tutaj w szybki sposób zarządzać
                        działaniem twojej firmy.
                    </p>
                    <p class="opacity-75 ">
                        I pamiętaj, zeżryj swoje negatywne nastawienie, Powodzenia!
                    </p>


                </div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row col-lg-12">
            <div class="card m-b-30 col-md-4">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h6 class="fw-600">Ilośc użytkowników</h6>
                            <p class="text-muted">
                                W dniu
                            </p>
                        </div>
                        <div class="col-md-5 my-auto text-right">
                            <h2 class="text-primary"><i class="mdi mdi-account-heart"></i></h2>

                        </div>
                    </div>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="0"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-md-7">

                            <p class="text-muted">
                                22.02.2020
                            </p>
                        </div>
                        <div class="col-md-5 text-right">
                            <p class="text-primary">{{\App\Models\User::count()}}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-b-30 col-md-4" style="left:1.5%">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h6 class="fw-600">Wkrótce</h6>
                            <p class="text-muted">
                                W dniu
                            </p>
                        </div>
                        <div class="col-md-5 my-auto text-right">
                            <h2 class="text-primary"><i class="mdi mdi-file-code"></i></h2>

                        </div>
                    </div>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="0"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-md-7">

                            <p class="text-muted">
                                22.02.2020
                            </p>
                        </div>
                        <div class="col-md-5 text-right">
                            <p class="text-primary">45 postów</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-b-30 col-md-4" style="left:3%">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h6 class="fw-600">Wkrótce</h6>
                            <p class="text-muted">
                                W dniu
                            </p>
                        </div>
                        <div class="col-md-5 my-auto text-right">
                            <h2 class="text-primary"><i class="mdi mdi-file-plus"></i></h2>

                        </div>
                    </div>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="0"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-md-7">

                            <p class="text-muted">
                                22.02.2020
                            </p>
                        </div>
                        <div class="col-md-5 text-right">
                            <p class="text-primary">45 postów</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>


