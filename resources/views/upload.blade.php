<!DOCTYPE html>
<html>

<head>
    <title>File Sharing App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .h-custom {
        height: calc(100vh - 73px);
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="text-center mb-4">File Sharing</h1>
                        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                               
                                <input type="file" id="file" name="file" class="form-control" />
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
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
