<!DOCTYPE html>
<html>
<head>
    <title>File Sharing App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgba(220, 203, 249, 0.58);
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .file-upload-label {
            background-color: #5268ff;
            color: white;
            padding: 10px 16px;
            border-radius: 50px;
            cursor: pointer;
        }

        .upload-icon {
            margin-right: 8px;
        }

        .git_link {
            background-color: #5268ff;
            color: white;
            border: none;
            text-decoration: none;
            padding: 10px 60px;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .card {
            width: 50rem;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            width: 100%;
            padding: 15px;
            border: none;
            height: 70px;
            resize: none;
            outline: none;
            border-radius: 5px;
        }

        .list-group-item {
            border: none;
            padding: 8px 16px;
            font-size: 16px;
        }

        .button-link {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card" style="width: 30rem;">
                <div class="card-body p-4">
                    <div class="form-group mb-4">
                        <input type="file" id="file" name="file" class="form-control" oninput="updateTargetInput(this.value)"  required />
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <input type="text" name="title" placeholder="Title" class="form-control" id="target-input"   >
                        </li>
                        <li class="list-group-item">
                            <textarea name="message" placeholder="Message" class="form-control"  ></textarea>
                        </li>
                        <li class="list-group-item">
                            <button class="git_link"><a  class="git_link" href="{{ route('home') }}" class="button-link">Get a Link</a></button>
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
