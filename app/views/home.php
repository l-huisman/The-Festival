<?php

namespace Views;

class Home
{
    public function render()
    {
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Home</title>
        </head>
        <body>
            <h1>Home</h1>
            <p>Welcome to the home page!</p>
        </body>
        </html>';
    }
}
