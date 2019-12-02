<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      @yield ("titulo")
    </title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <header>
      <ul>
        <li>Home</li>
        <li>Registracion</li>
        <li>Login</li>
      </ul>
    </header>
    <section>
      @yield("principal")
    </section>
    <footer>
      Digital House 2019
    </footer>
  </body>
</html>
