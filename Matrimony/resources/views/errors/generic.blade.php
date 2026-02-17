<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Error</title>
   <style>
       body, html {
           margin: 0;
           padding: 0;
           height: 100%;
           display: flex;
           justify-content: center;
           align-items: center;
           font-family: 'Arial', sans-serif;
           background: #fee4cb;
       }

       .container {
           text-align: center;
           padding: 20px;
           background: #fff;
           border-radius: 10px;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
       }

       .error-page h1 {
           font-size: 100px;
           margin: 0;
           color: #fee4cb;
       }

       .error-page h2 {
           font-size: 28px;
           margin: 10px 0;
           color: #333;
       }

       .error-page p {
           font-size: 16px;
           color: #666;
       }

       .home-button {
           display: inline-block;
           margin-top: 20px;
           padding: 10px 20px;
           font-size: 16px;
           color: #ffffff;
           background-color: #e6b805;
           text-decoration: none;
           border-radius: 5px;
           transition: background-color 0.3s ease;
       }

       .home-button:hover {
           background-color: #fee4cb;
       }

   </style>
</head>
<body>
<div class="container">
    <div class="error-page">
        <h2>Something went wrong</h2>
        <p>We're sorry, but the page you were looking for doesn't exist.</p>
        @if(auth()->check())
            @if (auth()->role_id == 7)
                <a href="v2/cc-support/summary" class="home-button">Go to Homepage</a>
            @else
                <a href="cc-support/dashboard" class="home-button">Go to Homepage</a>
            @endif
            <a href="/cc-support/logout" class="home-button" style="background-color: #c72e2e;">Logout</a>
        @endif
    </div>
</div>
</body>
</html>

