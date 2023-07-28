<!DOCTYPE html>
<html>
<head>
    <title>File Sharing App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgba(220, 203, 249, 0.58);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            @foreach($files as $file)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $file->name }}</li>
                            <li class="list-group-item">
                                <input type="text" value="{{ route('file.download', ['link' => $file->download_link]) }}">
                                <button class="btn btn-sm btn-clean btn-icon" onclick="copyToClipboard('{{ route('file.download', ['link' => $file->download_link]) }}')">
                                    <p style="color: rgba(107, 87, 139, 0.58)">Copy</p>
                                </button>
                                <a href="{{ route('file.download', ['link' => $file->download_link]) }}" class="btn btn-sm btn-clean btn-icon">
                                    <p style="color: rgba(107, 87, 139, 0.58)">Download</p>
                                </a>
                                <form action="{{ route('file.delete', ['id' => $file->download_link]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-clean btn-icon" onclick="return confirm('Are you sure?');">
                                        <p style="color: rgba(107, 87, 139, 0.58)">Delete</p>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function copyToClipboard(text) {
            var tempInput = document.createElement('input');
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            toastr.success('Link Copied!');
        }
    </script>
</body>
</html>
