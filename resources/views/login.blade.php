<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DreamStuff | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="row">
        <div class="col-lg-4 mx-auto mt-5">
            <div class="card shadow-lg">
                <div class="card-header text-center text-white bg-primary">Form Login</div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-danger">{{ Session::get('message') }}</div>
                    @endif
                    <form action="/login" method="post">
                        @csrf
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" name="email" id="email">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <input type="submit" class="btn btn-success mt-2" value="Login">
                    </form>
                    <p>tidak punya akun? <a href="/register">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>