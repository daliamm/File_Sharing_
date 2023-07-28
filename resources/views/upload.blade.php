<!DOCTYPE html>
<html>

<head>
    <title>File Sharing App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <style>
    </style>
</head>

<body>

 
    <div class="container">
        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card" style="width: 30rem;">
                <div class="card-body p-4">
                    <div class="form-group mb-4">
                        <input type="file" id="file" name="file" class="form-control"
                            oninput="updateTargetInput(this.value)" required />
                        <!--oninput="updateTargetInput(this.value)"-->
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <input type="text" name="title" placeholder="Title" class="form-control" id="target-input">
                        </li>
                        <li class="list-group-item">
                            <textarea name="message" placeholder="Message" class="form-control"></textarea>
                        </li>
                        <li class="list-group-item">
                            <button class="git_link"><a class="git_link" href="{{ route('home') }}"
                                    class="button-link">Get a Link</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function updateTargetInput(value) {
        document.getElementById('target-input').value = value;
    }
    </script>
</body>

</html>