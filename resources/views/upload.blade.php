<!DOCTYPE html>
<html>
<head>
    <title>File Sharing App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #fff;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
</head>
<body class="d-flex align-items-center bg-light" style="height: 100vh;">
<div class="container mt-5">
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
        
                <div class="col-md-6 col-lg-9 col-xl-4 offset-xl-1">
                    <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 fs-h1">File Sharing </p>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="file" id="file" name="file" class="form-control form-control-lg"
                                   placeholder="Select File"/>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem; background-color:rgba(107,87,139,0.58)">Upload
                            </button>
                            <a href="{{route('home')}}" class="btn btn-secondary"
                               style="padding-left: 2.5rem; padding-right: 2.5rem;  background-color:rgba(107,87,139,0.58)">home
                            </a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>